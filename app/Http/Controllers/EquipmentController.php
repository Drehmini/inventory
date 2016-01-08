<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\EquipmentRequest;
use App\Equipment;
use Illuminate\Support\Facades\URL;

class EquipmentController extends Controller
{
    /**
     * @return View
     */
    public function index()
    {
        $equipment = Equipment::all();
        return view('inventory.index', compact('equipment'));
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
