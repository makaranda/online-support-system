@if (session()->has('warnings'))
    <div class="alert alert-warning alert-dismissible" id="warningMessage" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-warning"></i> Alert!</h4>
        {{ session()->get('warnings') }}
    </div>
@endif
