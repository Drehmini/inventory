@extends('app')
@section('content')
    {!! Form::open(['route' => 'inventory.store', 'class' => 'form-horizontal']) !!}
    @include('partials.inventoryform', ['submitButtonText' => 'Add Item', 'panelTitle' => 'Add Item'])
    {!! Form::close() !!}
@stop