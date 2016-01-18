<div class="row">
    <div class="col-md-6 center-block">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Overdue Equipment</h3>
            </div>
            <div class="panel-body table-responsive">
                <table id="overdue_equipment" class="table table-striped table-hover table-condensed">
                    <thead>
                    <tr>
                        <td>Serial #</td>
                        <td>Make</td>
                        <td>Model</td>
                        <td>Type</td>
                        <td class="text-center">Check In</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($overdue as $item)
                        <tr>
                            <td>{{ Html::linkRoute('inventory.show', $item->serial, $item->id) }}</td>
                            <td>{{ $item->make }}</td>
                            <td>{{ $item->model }}</td>
                            <td>{{ $item->type }}</td>
                            <td class="text-center">@include('partials.button', ['item' => $item, 'inOrOut' => 'OUT'])
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>