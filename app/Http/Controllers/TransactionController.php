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
     * @return string
     */
    public function create()
    {
        return view('inventory.index', compact('equipment_id'));
    }

    public function store(TransactionRequest $request)
    {
        $lastTransaction = Transaction::findLatest($request->equipment_id);
        $request->merge(['user' => 'Test', 'in_or_out' => 'OUT',
            'transaction_id' => $this->generateTransactionId('OUT')]);
        if($lastTransaction->get()->isEmpty() ||  $lastTransaction->in_or_out == 'IN') {
            $transaction = new Transaction;
            $transaction->save($request->all());
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
        $people = Person::select(DB::raw("CONCAT(first_name,' ', last_name) AS full_name, id"))->lists('full_name', 'id');
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
            $transaction->user = "Test"; // temporary
            $transaction->person_id = 1; // temporary
            $transaction->save();
            return redirect()->route('inventory.index');
        }
        else
            return redirect()->route('inventory.index');
    }

    protected function generateTransactionId($inOrOut)
    {
        return 'ITCLL-' . $inOrOut . '-' . str_random();
    }
}
