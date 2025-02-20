@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible tw-bg-green-500 tw-text-white" id="successMessage" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check-circle"></i> Success!</h4>
        {{ session()->get('success') }}
    </div>
@endif
