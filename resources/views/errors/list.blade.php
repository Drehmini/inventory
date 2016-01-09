@if ($errors->any())
    <div class="row">
        <div class="col-sm-5 center-block">
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
        </div>
    </div>
@endif