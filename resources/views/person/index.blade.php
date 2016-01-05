@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">People</h3>
                </div>
                <div class="panel-body table-responsive">
                    <table id="current_inventory" class="table table-striped table-hover table-condensed">
                        <thead>
                        <tr>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Address</td>
                            <td>City</td>
                            <td>State</td>
                            <td>Phone Number</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($people as $person)
                            <tr>
                                <td>{{ Html::linkRoute('person.show', $person->first_name . ' ' . $person->last_name,
                                 $person->id) }}</td>
                                <td>{{ $person->email }}</td>
                                <td>{{ $person->address }}{{ is_null($person->address_2) ? '' :  ' ' . $person->address_2 }}</td>
                                <td>{{ $person->city }}</td>
                                <td>{{ $person->state }}</td>
                                <td>{{ phone_format($person->phone_number, 'US') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <a href="{{ URL::route('person.create') }}" class="btn btn-primary btn-circle btn-bottomright">
                        <span class="glyphicon glyphicon-plus"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop