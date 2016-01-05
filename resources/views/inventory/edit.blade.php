@extends('app')

@section('content')
    <h1>Edit: {{ $item->serial_number }}</h1>
    <hr/>
    {!! Form::model($item, ['method' => 'PATCH', 'action' => ['EquipmentController@update', $item->id]]) !!}
    @include('partials.form', ['submitButtonText' => 'Update Item'])
    {!! Form::close() !!}
    @include('errors.list')
@stop