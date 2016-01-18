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
            return redirect()->route('inventory.index');
        }
        else
            return redirect()->route('inventory.index');
    }

    /**
     * @param $inOrOut
     * @return string
     */
    protected function generateTransactionId($inOrOut)
    {
        return 'ITCLL-' . $inOrOut . '-' . str_random();
    }
}
