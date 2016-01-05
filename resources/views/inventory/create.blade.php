@extends('app')
@section('content')
    <h1>Add item to inventory</h1>
    <hr/>
    {!! Form::open(['url' => 'inventory']) !!}
    @include('partials.form', ['submitButtonText' => 'Add Item'])
    {!! Form::close() !!}
    @include('errors.list')
@stop