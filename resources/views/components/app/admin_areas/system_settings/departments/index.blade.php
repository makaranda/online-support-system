@extends('layouts.system_settings',[
    'parentSection' => 'System Settings',
    'childSection' => 'Departments',
])
@section('styles')

@endsection

@section("title") Departments @endsection
@section('content')
    <div class="tw-bg-white tw-p-6 tw-rounded-lg tw-shadow-lg">
        <h2 class="tw-text-2xl tw-font-bold tw-mb-2 tw-text-blue-600 tw-float-left">Departments</h2>

        <a data-toggle="modal" title="Add New Department"
           data-target="#create_modal"
           role="button"
           class="btn btn-sm tw-float-right tw-bg-gradient-to-r tw-text-white tw-from-green-400 tw-to-blue-400 hover:tw-from-blue-400 hover:tw-to-green-500 focus:tw-from-purple-400 focus:tw-to-pink-500 focus:tw-text-white">
            <i class="fa fa-plus-circle"></i>&nbsp;Add New Department
        </a>

        <hr class="mt-5"/>

        <div class="table-responsive">
            <div class="tw-bg-white tw-p-6 tw-rounded-lg tw-shadow-lg">
                <div class="row">
                    <div class="col-sm-12">
                        <input type="text" class="form-control form-control-sm" placeholder="Enter what you want to search" id="search"/>
                    </div>
                </div>
            </div>
            <table class="tw-w-full tw-table-auto" id="tbl_department">
                <thead>
                <tr class="tw-bg-gray-200 tw-text-gray-600 tw-uppercase tw-text-sm tw-leading-normal">
                    <th class="tw-py-3 tw-px-6 tw-text-left">Code</th>
                    <th class="tw-py-3 tw-px-6 tw-text-left">Name</th>
                    <th class="tw-py-3 tw-px-6 tw-text-center">Status</th>
                    <th class="tw-py-3 tw-px-6 tw-text-center">Actions</th>
                </tr>
                </thead>
                <tbody class="tw-text-gray-600 tw-text-sm tw-font-light">
                @forelse($departments as $department)
                    <tr class="tw-border-b tw-border-gray-200 hover:tw-bg-gray-100">
                        <td class="tw-py-3 tw-px-6 tw-text-left">{{$department->code}}</td>
                        <td>{{$department->name}}</td>
                        <td class="tw-py-3 tw-px-6 tw-text-center">
                                <span
                                    class="{{($department->status == 1)?'tw-bg-green-200 tw-text-green-600 tw-py-1 tw-px-3 tw-rounded-full tw-text-xs ':'tw-bg-red-200 tw-text-red-600 tw-py-1 tw-px-3 tw-rounded-full tw-text-xs'}}">
                                    {{$department->get_status($department->status)}}</span>
                        </td>
                        <td class="tw-py-3 tw-px-6 tw-text-center">
                            @include('layouts.common.deactivate_form',  [ "form_id"=>"form_delete_".$department->id, "action"=>route("departments.destroy",$department)])
                            <div class="btn-group btn-group-sm btn-group-toggle tw-ml-3">
                                <div class="tw-flex tw-item-center tw-justify-center">

                                    @if(Auth::user()->isGranted('departments.edit'))
                                        @if(Auth::user()->isGranted('departments.update'))
                                            <div class="btn-group btn-group-sm btn-group-toggle tw-ml-3">
                                                <div class="tw-flex tw-item-center tw-justify-center">
                                                    @include('app.admin_areas.system_settings.departments.edit')
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                    <div
                                        class="tw-w-4 tw-ml-5 tw-mr-5 tw-transform hover:tw-text-purple-500 hover:tw-scale-110">
                                        @if(Auth::user()->is_super_admin() && $department->status == 1)
                                            @if(Auth::user()->isGranted('departments.destroy'))
                                                <button id="btnDelete" class="btn btn-sm"
                                                        type="submit"
                                                        form="form_delete_{{$department->id}}"
                                                        title="De Activate Department">
                                                    <i class="fa fa-times-circle tw-text-red-500"></i>
                                                </button>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="tw-py-3 tw-px-6 tw-text-center tw-bg-purple-200 tw-text-purple-600" colspan="4">
                            No Date Found Yet !!!
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

    </div>
    <div class="tw-bg-white tw-p-6 tw-rounded-lg tw-shadow-lg">
        <div class="tw-row-auto">
{{--            <x-pagination :items="$departments"/>--}}
            <div class="row">
                <div class="col-sm-8">
                    {{ $departments->onEachSide(2)->withQueryString()->links() }}
                </div>

                <div class="col-sm-4">
                    Showing {{ $departments->firstItem() }} to {{ $departments->lastItem() }} out
                    of {{ $departments->total() }} results
                </div>
            </div>
        </div>
    </div>
@endsection

@include('app.admin_areas.system_settings.departments.create')

@section('scripts')
    <script>
        $(document).ready(function (){
            $('#search').keyup(function (){
                if($(this).val()) search_table($(this).val());
            });

            function search_table(value){
                $('#tbl_department tr').each(function (){
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
