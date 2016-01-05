@if ($errors->any())
    <div class="alert alert-dismissible alert-danger">
        <button type="button" class="close" data-dismiss="alert">
            <span class="glyphicon glyphicon-remove"></span>
        </button>
        <h4>Uh oh, something went wrong</h4>
        <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif