@extends('admin.admin_master')
@section('admin-home')
<div class="row-fluid">
    <div class="span12">
        <!-- BEGIN SAMPLE FORMPORTLET-->
        <div class="widget green">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i>Create New Admin</h4>
                <span class="tools">
                <a href="javascript:;" class="icon-chevron-down"></a>
                <a href="javascript:;" class="icon-remove"></a>
                </span>
            </div>
        <h3 align="center" style="color:green">{{Session::get('message')}}</h3>
            <div class="widget-body">
                <!-- BEGIN FORM-->
            <form action="{{route('save-admin')}}" method="post" class="form-horizontal"> 
                @csrf
                    <div class="control-group">
                        <label class="control-label">Admin Name</label>
                        <div class="controls">
                            <input type="text" name="name" placeholder="Enter a admin name" class="input-xxlarge" />
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Admin Email</label>
                        <div class="controls">
                            <input type="email" name="email" placeholder="Enter a admin email" class="input-xxlarge" />
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Admin Password</label>
                        <div class="controls">
                            <input type="password" name="password" placeholder="Enter a admin password" class="input-xxlarge" />
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
                        <button type="reset" class="btn"><i class=" icon-remove"></i> Cancel</button>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
        </div>
        <!-- END SAMPLE FORM PORTLET-->
    </div>
</div>
@endsection