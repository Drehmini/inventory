<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonRequest;
use App\Person;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PersonController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $people = Person::all();
        return view('person.index', compact('people'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $person = Person::findorfail($id);
        $transactions = $person->transactions()->getOrdered();
        return view('person.show', compact('person', 'transactions'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $states = DB::table('us_states')->lists('code');

        return view('person.create', compact('states'));
    }

    /**
     * @param PersonRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(PersonRequest $request)
    {
        Person::create($request->all());
        return redirect()->route('person.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $states = DB::table('us_states')->lists('code');
        $person = Person::findorfail($id);
        return view('person.edit', compact('states', 'person'));
    }

    /**
     * @param $id
     * @param PersonRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, PersonRequest $request)
    {
        $person = Person::findorfail($id);
        $person->update($request->all());
        return redirect()->route('person.edit');
    }
}
