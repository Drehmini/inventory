<?php

namespace App\Http\Controllers;

use App\Equipment;
use App\Http\Requests\NoteRequest;
use App\Note;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create($id)
    {
        $item = Equipment::findorfail($id);
        return view('note.create', compact('item'));
    }

    public function store(NoteRequest $request)
    {
        $note = new Note;
        $note->fill($request->all());
        $note->user_id = Auth::id();
        $note->save();
        return redirect()->route('inventory.show', ['id' => $request->equipment_id]);
    }

    public function destroy($id)
    {
        $note = Note::findorfail($id);
        $note->delete();
        return redirect()->route('inventory.show', ['id' => $note->equipment_id]);
    }

    public function edit($id)
    {
        $note = Note::findorfail($id);
        $item = $note->equipment;
        return view('note.edit', compact('note', 'item'));
    }

    public function update($id, NoteRequest $request)
    {
        $note = Note::findorfail($id);
        $note->update($request->all());
        return redirect()->route('inventory.show', ['id' => $note->equipment_id]);
    }
}
