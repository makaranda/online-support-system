@if (session()->has('error_string'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="errorStringMessage">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-ban"></i> Whoops!</h4>
        <hr>
        Please fix following problem(s)
        <ul style="margin-top: 10px">
                <li>{{ session()->get('error_string') }}</li>
        </ul>
    </div>
@endif
