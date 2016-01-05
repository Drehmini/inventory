@extends('app')
@section('content')
    <h3>Check an item Out/In</h3>
    <hr/>
    {!! Form::open(['url' => 'inventory/transactions']) !!}
    @include('partials.form', ['submitButtonText' => 'Check Out'])
    {!! Form::close() !!}
    @include('errors.list')
@stop