<?php

namespace App\Http\Controllers;

use App\Transaction;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\EquipmentRequest;
use App\Equipment;

class EquipmentController extends Controller
{
    /**
     * @return View
     */
    public function index()
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
        return view('inventory.index', compact('equipment', 'overdue'));
    }

    /**
     * @return View
     */
    public function create()
    {
        return view('inventory.create');
    }

    /**
     * @param EquipmentRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(EquipmentRequest $request)
    {
        Equipment::create($request->all());
        return redirect()->route('inventory.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $item = Equipment::findorfail($id);
        return view('inventory.edit', compact('item'));
    }

    /**
     * @param $id
     * @param EquipmentRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, EquipmentRequest $request)
    {
        $item = Equipment::findorfail($id);
        $item->update($request->all());
        return redirect()->route('inventory.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $item = Equipment::findorfail($id);
        $transactions = $item->transactions()->getOrdered();
        $notes = $item->notes()->getOrdered();
        return view('inventory.show', compact('item', 'transactions', 'notes'));
    }
}
