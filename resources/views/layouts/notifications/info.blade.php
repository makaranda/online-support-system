@if (session()->has('info'))
    <div class="alert alert-info alert-dismissible" id="infoMessage" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-info-circle"></i> Info!</h4>
        {{ session()->get('info') }}
    </div>
@endif
