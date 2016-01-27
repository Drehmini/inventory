<html>
<body>
    The {{ $type }} with serial number: <em>{{ $serial }}</em> has been
    @if($in_or_out === 'OUT')
        checked out. <br>
        This item is due <time><strong><span style="color:red">{{ $due_date }}</span></strong></time> <br>
    @else
        checked in. <br>
        Thank you. <br>
    @endif
    <br>
    <small>Your transaction number is <strong>{{ $transaction_id }}</strong></small>
</body>
</html>
