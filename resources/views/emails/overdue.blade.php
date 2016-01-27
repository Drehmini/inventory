<html>
    <body>
        <strong>Attention:</strong><br>
        The {{ $type }} with the serial number: {{ $serial }} is <strong><span style="color:red">overdue</span></strong>. <br>
        The {{ $type }} was due on <strong><span style="color:red">{{ $due_date }}</span></strong><br>
        Please return the {{ $type }} immediately. <br>
        <br><br>
        <small>Referencing transaction: <strong>{{ $transaction_id }}</strong></small>=
    </body>
</html>