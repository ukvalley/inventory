@extends("admin.layouts.default")
@section('breadcrumbs')
    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route("admin.users.index") }}">Users</a></li>
    @foreach(App\Models\Admin\Users::buildParentChildrenBreadcrumbs(Request()->id) as $id => $title)
        <li class="breadcrumb-item active" aria-current="page">
                <a href="{{ route("admin.users.index",$id) }}">{{$title}}</a>
        </li>
    @endforeach
    @if(isset($data))
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_edit')}}</li>
    @else
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_add')}}</li>
    @endIf
@endsection
@section('pageTitle')
<h1>Users</h1>
@endsection
@section('pageInfo')
@endsection
@section('backBtn')
<a href="{{ route("admin.users.index",$data->admiko_parent_child??Request()->id) }}"><i class="fas fa-angle-left"></i> {{trans('admiko.page_back_btn')}}</a>
@endsection
@section('content')
<div class="card formPage users_manage admikoForm">
    <legend class="action">{{ isset($data) ? trans('admiko.update') : trans('admiko.add_new') }}</legend>
    <form method="POST" action="{{ $admiko_data['formAction'] }}" enctype="multipart/form-data" class="needs-validation" novalidate>
        @if(isset($data)) @method('PUT') @endIf
        @csrf
        <div class="card-body">
            @if ($errors->any())<div class="row"><div class="col-2"></div><div class="col"><div class="invalid-feedback d-block">@foreach($errors->all() as $error) {{$error}}<br> @endforeach</div></div></div>@endif
            <div class="row">
                
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">Name:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="name" name="name"  placeholder="Name"  value="{{{ old('name', isset($data)?$data->name : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('name')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="name_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="mobile" class="col-md-2 col-form-label">Mobile:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="mobile" name="mobile"  placeholder="Mobile"  value="{{{ old('mobile', isset($data)?$data->mobile : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('mobile')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="mobile_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="city" class="col-md-2 col-form-label">City:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="city" name="city"  placeholder="City"  value="{{{ old('city', isset($data)?$data->city : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('city')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="city_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="admiko_parent_child" class="col-md-2 col-form-label">Higher Authority:</label>
                        <div class="col-md-10">
                            <select class="form-select" id="admiko_parent_child" name="admiko_parent_child">
                                <option value="0">{{trans('admiko.parent_title')}}</option>
                                @foreach($data_admiko_parent_child as $id => $value)
                                <option value="{{ $id }}" @if(isset($data) && $id == Request()->id)disabled="disabled"@endif {{ (old('admiko_parent_child') ? old('admiko_parent_child') : $data->admiko_parent_child ?? (Request()->id??0)) == $id ? 'selected' : '' }}>{{ $value}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback @if ($errors->has('admiko_parent_child')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="admiko_parent_child_help" class="text-muted"></small>
                            <input type="hidden" name="return_page" value="{{$data->admiko_parent_child??(Request()->id??'')}}">
                            <input type="hidden" name="admiko_parent_id" value="{{$data->admiko_parent_child??''}}">
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="basic_amount" class="col-md-2 col-form-label">Basic Amount:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="basic_amount" name="basic_amount"  placeholder="Basic Amount"  value="{{{ old('basic_amount', isset($data)?$data->basic_amount : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('basic_amount')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="basic_amount_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="user_type" class="col-md-2 col-form-label">User Type:*</label>
                        <div class="col-md-10">
                            <select class="form-select" id="user_type" name="user_type" required="true">
                                
                                @foreach($user_type_all as $id => $value)
                                    <option value="{{ $id }}" {{ (old('user_type') ? old('user_type') : $data->user_type ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback @if ($errors->has('user_type')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="user_type_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="card-footer form-actions" id="form-group-buttons">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary float-start me-1 mb-1 mb-sm-0 save-button">{{trans('admiko.table_save')}}</button>
                    <a href="{{ route("admin.users.index",$data->admiko_parent_child??Request()->id) }}" class="btn btn-secondary float-end" role="button">{{trans('admiko.table_cancel')}}</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection