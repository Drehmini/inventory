<div class="row">
    <div class=" col-sm-6 col-md-4 center-block">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Transaction History</h3>
            </div>
            <div class="panel-body table-responsive">
                <table id="current_inventory" class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <td>Transaction</td>
                        <td>In/Out</td>
                        <td>Date</td>
                        <td>{{ ($showPerson) ? 'Person' : 'Item' }}</td>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!$transactions->isEmpty())
                        @foreach($transactions as $transaction)
                            <tr>
                                <td>{{ $transaction->transaction_id }}</td>
                                <td>{{ $transaction->in_or_out == 'IN' ? 'IN' : 'OUT' }}</td>
                                <td>{{ $transaction->created_at->toDateString() }}</td>
                                @if($showPerson)
                                <td><a href=" {{ URL::route('person.show',
                                                array($transaction->person->id)) }}">
                                        {{ $transaction->person->first_name . ' ' . $transaction->person->last_name }}
                                    </a></td>
                                @else
                                <td><a href=" {{ URL::route('inventory.show',
                                                        array($transaction->equipment_id)) }}">
                                        {{ $transaction->equipment->serial }}</a></td>
                                @endif
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>