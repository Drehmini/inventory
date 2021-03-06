<?php

namespace App\Http\Controllers;

use App\Equipment;
use App\Http\Requests\EquipmentRequest;
use App\Person;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Transaction;
use App\Http\Requests\TransactionRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class TransactionController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $transactions = Transaction::getOrdered();
        return view('transaction.index', compact('transactions'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('inventory.index', compact('equipment_id'));
    }

    /**
     * @param TransactionRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TransactionRequest $request)
    {
        $lastTransaction = Transaction::findLatest($request->equipment_id);
        if ($lastTransaction->get()->isEmpty() ||  $lastTransaction->in_or_out == 'IN') {
            $transaction = new Transaction;
            $transaction->fill($request->all());
            $transaction->username = Auth::id();
            $transaction->in_or_out = 'OUT';
            $transaction->transaction_id = $this->generateTransactionId('OUT');
            $transaction->save();
            $this->generateReceiptEmail($transaction);
        }
        return redirect()->route('inventory.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function checkout($id)
    {
        $item = Equipment::findorfail($id);
        $people = Person::select(DB::raw("CONCAT(first_name,' ', last_name) AS full_name, id"))
                                            ->lists('full_name', 'id');
        return view('transaction.checkout', compact('item', 'people'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function checkin($id)
    {
        $lastTransaction = Transaction::findLatest($id);
        if (!$lastTransaction->get()->isEmpty() && $lastTransaction->in_or_out == 'OUT') {
            $transaction = new Transaction;
            $transaction->in_or_out = 'IN';
            $transaction->transaction_id = $this->generateTransactionId($transaction->in_or_out);
            $transaction->due_date = NULL;
            $transaction->equipment_id = $id;
            $transaction->username = Auth::id(); // temporary
            $transaction->person_id = $lastTransaction->person_id; // temporary
            $transaction->save();
            $this->generateReceiptEmail($transaction);
            return redirect()->route('inventory.index');
        }
        else
            return redirect()->route('inventory.index');
    }

    public function overdue()
    {
        $equipment = Equipment::with('transactions')->get();
        $overdue = $equipment->filter(function($item) {
            $lastTransaction = $item->transactions->last();
            if(!is_null($lastTransaction) &&
                !is_null($lastTransaction->due_date) &&
                $lastTransaction->due_date->lt(Carbon::today())
            ) {
                return true;
            }
        });
        if(!$overdue->isEmpty()) {
            foreach($overdue as $item) {
                $this->generateOverdueEmail($item->transactions->last());
            }
        }
        return;
    }

    /**
     * @param $inOrOut
     * @return string
     */
    protected function generateTransactionId($inOrOut)
    {
        return 'ITCLL-' . $inOrOut . '-' . str_random();
    }

    /**
     * This function generates an overdue email remainder  and queues it for immediate dispatch.
     * @param Transaction $transaction
     */
    protected function generateOverdueEmail(Transaction $transaction)
    {
        $emailFrom = 'itclendinglibrary@bluefieldstate.edu';
        $emailName = 'ITC Lending Library';
        $data = [
            'serial' => $transaction->equipment->serial,
            'due_date' => $transaction->due_date->toFormattedDatestring(),
            'transaction_id' => $transaction->transaction_id,
            'type' => $transaction->equipment->type,
        ];
        Mail::queue('emails.overdue', $data, function($m) use ($transaction, $emailFrom, $emailName) {
            $m->from($emailFrom, $emailName);
            $m->to($transaction->person->email)->subject('The item you\'ve checked out is overdue');
        });
    }

    /**
     * This function generates the receipt email and queues it for immediate dispatch.
     * @param Transaction $transaction
     */
    protected function generateReceiptEmail(Transaction $transaction)
    {
        $emailFrom = 'itclendinglibrary@bluefieldstate.edu';
        $emailName = 'ITC Lending Library';
        $data = [
            'serial' => $transaction->equipment->serial,
            'in_or_out' => $transaction->in_or_out,
            'due_date' => (!is_null($transaction->due_date)) ? $transaction->due_date->toFormattedDateString() : null,
            'transaction_id' => $transaction->transaction_id,
            'type' => $transaction->equipment->type,
        ];
        Mail::queue('emails.receipt', $data, function ($m) use ($transaction, $emailFrom, $emailName) {
            $m->from($emailFrom, $emailName);
            $m->to($transaction->person->email)->subject('Your Lending Library Transaction Receipt');
        });
    }
}
