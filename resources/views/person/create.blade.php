@extends('app')
@section('content')
    {{ session()->reflash() }}
    {!! Form::open(['route' => 'person.store', 'class' => 'form-horizontal']) !!}
    @include('partials.peopleform', ['panelTitle' => 'Add Person', 'submitButtonText' => 'Add Person'])
    {!! Form::close() !!}
@stop