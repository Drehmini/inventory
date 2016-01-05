@if($inOrOut == 'IN')
{{ Html::linkRoute('inventory.transactions.checkout', 'Check out', ['id' => $item->id],
                    ['class' => 'btn btn-mini btn-success'])  }}

@elseif($inOrOut == 'OUT')
{{ Html::linkRoute('inventory.transactions.checkin', 'Check In', ['id' => $item->id],
                    ['class' => 'btn btn-mini btn-danger'])  }}
@endif