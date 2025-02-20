@if (session()->has('error_messages'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="errorMessages">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-ban"></i> Whoops!</h4>
        <hr>
        Please fix following problem(s)
        <ul style="margin-top: 10px">
            @foreach(session()->get('error_messages') as $key => $message)
                <li>{{$message}}</li>
            @endforeach
        </ul>
    </div>
@endif
