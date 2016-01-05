@extends('app')
@section('content')
    <h1>Add item to inventory</h1>
    <hr/>
    {!! Form::open(['route' => 'inventory.store']) !!}
    @include('partials.form', ['submitButtonText' => 'Add Item'])
    {!! Form::close() !!}
    @include('errors.list')
@stop