@extends('app')

@section('content')
    {!! Form::model($item, ['route' => ['inventory.note.store', $item->id], 'class' => 'form-horizontal']) !!}
    @include('partials.noteform', ['submitButtonText' => 'Add Note', 'panelTitle' => 'Add Note to ' . $item->serial])
    {!! Form::close() !!}

@stop