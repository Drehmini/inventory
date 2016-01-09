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

    /**
     * @param NoteRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(NoteRequest $request)
    {
        $note = new Note;
        $note->fill($request->all());
        $note->user_id = Auth::id();
        $note->save();
        return redirect()->route('inventory.show', ['id' => $request->equipment_id]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $note = Note::findorfail($id);
        $note->delete();
        return redirect()->route('inventory.show', ['id' => $note->equipment_id]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $note = Note::findorfail($id);
        if($note->user_id == Auth::id())
        {
            $item = $note->equipment;
            return view('note.edit', compact('note', 'item'));
        }
        return redirect()->route('inventory.show', compact('id'))
                        ->withErrors(['user_id' => 'You are not authorized to edit this note.']);
    }

    /**
     * @param $id
     * @param NoteRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, NoteRequest $request)
    {
        $note = Note::findorfail($id);
        $note->update($request->all());
        return redirect()->route('inventory.show', ['id' => $note->equipment_id]);
    }
}
