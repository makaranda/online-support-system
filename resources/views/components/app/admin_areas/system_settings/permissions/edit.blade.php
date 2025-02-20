@extends('layouts.system_settings',[
    'parentSection' => 'System Settings',
    'childSection' => 'Users',
])
@section('styles')

@endsection

@section("title") Edit Users @endsection

@section('content')

    <div class="container">
        <div class="tw-bg-white tw-p-6 tw-rounded-lg tw-shadow-lg">
            <div class="card tw-border-white tw-rounded">
            <div class="card-header tw-bg-white">
                <h2 class="tw-text-2xl tw-font-bold tw-mb-2 tw-text-blue-600 tw-float-left">Edit Permissions of <span class="tw-text-green-500">{{$user->full_name}}</span></h2>
                <a href="{{route("users.index")}}" role="button"
                   class="btn btn-sm tw-float-right tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-400 hover:tw-from-blue-400 hover:tw-to-green-500 focus:tw-from-pink-400 focus:tw-to-purple-500 focus:tw-text-white">
                    <i class="fa fa-list"></i>&nbsp;System Users
                </a>
            </div>
            <div class="card-body">
                <form action="{{route('permissions.update',$user)}}" method="POST" id="permission_form" class="form_edit">
                    @csrf
                    @method('PUT')

                    <div class="table-responsive">
                        <div class="row">
                            <div class="col-sm-11 float-right mb-3">
                                <input type="text" class="form-control form-group-sm float-right" id="search" placeholder="Search Table Data"/>
                            </div>
                            <div class="col-sm-1 float-right mb-3">
                                <a href="{{route('permissions.edit',$user)}}" class="btn btn-secondary"><i class="fa fa-undo"></i></a>
                            </div>
                        </div>

                        <table class="table table-bordered tw-border-rounded-full" id="tbl_permission">
                            @forelse($permissions as $key => $permission_data)
                                <tr class="tw-bg-gradient-to-r tw-from-green-400 tw-to-blue-500 tw-h-2">
                                    <th colspan="2" class="text-center font-weight-bold tw-text-white tw-uppercase" style="height: 5px;">{{$key}}</th>
                                </tr>

                                @foreach($permission_data as $permission)
                                    <tr>
                                        <th class="tw-text-gray-500">{{$permission->module->sub_module}}</th>
                                        <th class="h6">
                                            <input type="hidden" name="permissions_data[]" value="{{$permission->id}}"/>
                                            <input type="checkbox" class="checkbox i-check-flat-green" name="permissions[{{$permission->id}}][granted]" id="granted" {{$permission->granted ==1?'checked':''}} />&nbsp;
                                        </th>
                                    </tr>
                                @endforeach
                            @empty
                                <tr>
                                    <td colspan="2" class="text-center">
                                        This User has no assigned permissions yet. If you are not the Admin, please contact admin!!!
                                    </td>
                                </tr>
                            @endforelse
                        </table>
                    </div>

                </form>
            </div>
            <div class="card-footer tw-bg-white ">
                <button type="submit" role="button" form="permission_form"
                        class="btn btn-sm tw-mt-3 tw-float-left tw-float-right tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-500 hover:tw-from-blue-400 hover:tw-to-green-500 focus:tw-from-pink-400 focus:tw-to-purple-500 focus:tw-text-white">
                    <i class="fa fa-save"></i>&nbsp;Save
                </button>
            </div>
        </div>
        </div>
    </div>



@endsection

@section('scripts')
    <script>
        $(document).ready(function (){
            $('#search').keyup(function (){
                if($(this).val()) search_table($(this).val());
            });

            function search_table(value){
                $('#tbl_permission tr').each(function (){
                    let found = false;

                    $(this).each(function (){
                        if($(this).text().toLowerCase().indexOf(value.toLowerCase()) > 0){
                            found = true;
                        }
                    });

                    if(found === true){
                        $(this).show();
                    }else{
                        $(this).hide();
                    }

                });
            }
        });

    </script>
@endsection
