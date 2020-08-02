@extends('admin.admin_master')
@section('admin-home')
<div class="row-fluid">
    <div class="span12">
        <!-- BEGIN BASIC PORTLET-->
        <div class="widget orange">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i> Manage All Admin</h4>
            <span class="tools">
                <a href="javascript:;" class="icon-chevron-down"></a>
                <a href="javascript:;" class="icon-remove"></a>
            </span>
            </div>
        <h3 align="center" style="color:red">{{Session::get('message')}}</h3>
            <div class="widget-body">
                <table class="table table-striped table-bordered table-advance table-hover">
                    <thead>
                    <tr>
                        <th><i class="icon-bullhorn"></i> serial</th>
                        <th class="hidden-phone"><i class="icon-question-sign"></i> name</th>
                        <th><i class="icon-bookmark"></i>email</th>
                        <th><i class=" icon-edit"></i> Status</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @php($i =1)
                        @foreach($admin as $v_admin)
                    <tr>
                    <td>{{$i++}}</td>
                    <td class="hidden-phone">{{$v_admin->name}}</td>
                    <td>{{$v_admin->email}}</td>
                        @if($v_admin->activity ==1)
                        <td><span class="label label-important label-mini">Active</span></td>
                        @else 
                        <td><span class="label label-important label-mini">Inactive</span></td>

                        @endif
                        <td>
                            @if($v_admin->activity ==1)
                            <a href="{{route('admin-deactive',['id'=> $v_admin->id])}}" class="btn btn-success"><i class="icon-thumbs-down"></i></a>
                            @else
                            <a href="{{route('admin-active',['id'=> $v_admin->id])}}" class="btn btn-danger"><i class="icon-thumbs-up"></i></a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END BASIC PORTLET-->
    </div>
</div>
@endsection