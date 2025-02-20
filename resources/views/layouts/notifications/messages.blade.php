@if (session()->has('messages'))
    <div class="alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-envelope-open"></i> Message!</h4>
        {{ session()->get('messages') }}
    </div>
@endif
