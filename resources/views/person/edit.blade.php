@extends('app')
@section('content')
    {!! Form::model($person, ['route' => ['person.update', $person->id],
                    'method' => 'PATCH', 'class' => 'form-horizontal']) !!}
    @include('partials.peopleform', ['panelTitle' => 'Edit: ' . $person->first_name . ' ' . $person->last_name,
                                    'submitButtonText' => 'Update Person'])
    {!! Form::close() !!}
@stop