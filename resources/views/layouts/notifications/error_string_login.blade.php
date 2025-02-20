@if (session()->has('error_string'))
    <div class="alert alert-danger alert-dismissible fade show small" role="alert" id="errorStringMessage">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <ul style="margin: 0px;padding: 0px;">
            <li>{{ session()->get('error_string') }}</li>
        </ul>
    </div>
@endif
