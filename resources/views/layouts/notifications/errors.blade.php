@if ($errors->any())
    <div class="alert alert-danger alert-dismissible" id="errorMessages" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-ban"></i> Whoops!</h4>
        <hr>
        Please fix following problem(s)
        <ul style="margin-top: 10px">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
