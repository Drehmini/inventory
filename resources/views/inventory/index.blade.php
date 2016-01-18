@extends('app')
@section('content')
    @if(!$overdue->isEmpty())
        @include('partials.overdue')
    @endif
    <div class="row">
        <div class="col-md-6 center-block">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Current Inventory</h3>
                </div>
                <div class="panel-body table-responsive">
                    <table id="current_inventory" class="table table-striped table-hover table-condensed">
                        <thead>
                        <tr>
                            <td>Serial #</td>
                            <td>Make</td>
                            <td>Model</td>
                            <td>Type</td>
                            <td class="text-center">Check In/Out</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($equipment as $item)
                        <tr>
                            <td>{{ Html::linkRoute('inventory.show', $item->serial, $item->id) }}</td>
                            <td>{{ $item->make }}</td>
                            <td>{{ $item->model }}</td>
                            <td>{{ $item->type }}</td>
                            @if($item->transactions->isEmpty())
                                <td class="text-center">@include('partials.button',
                                ['item' => $item, 'inOrOut' => 'IN'])</td>
                            @else
                                <td class="text-center">@include('partials.button',
                                ['item' => $item, 'inOrOut' => $item->transactions()->findLatest($item->id)->in_or_out])
                                </td>
                            @endif
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <a href="{{ URL::route('inventory.create') }}" class="btn btn-primary btn-circle btn-bottomright">
                        <span class="glyphicon glyphicon-plus"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop