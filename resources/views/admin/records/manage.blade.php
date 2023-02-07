@extends("admin.layouts.default")
@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route("admin.records.index") }}">Records</a></li>
    @if(isset($data))
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_edit')}}</li>
    @else
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_add')}}</li>
    @endIf
@endsection
@section('pageTitle')
<h1>Records</h1>
@endsection
@section('pageInfo')
@endsection
@section('backBtn')
<a href="{{ route("admin.records.index") }}"><i class="fas fa-angle-left"></i> {{trans('admiko.page_back_btn')}}</a>
@endsection
@section('content')
<div class="card formPage records_manage admikoForm">
    <legend class="action">{{ isset($data) ? trans('admiko.update') : trans('admiko.add_new') }}</legend>
    <form method="POST" action="{{ $admiko_data['formAction'] }}" enctype="multipart/form-data" class="needs-validation" novalidate>
        @if(isset($data)) @method('PUT') @endIf
        @csrf
        <div class="card-body">
            @if ($errors->any())<div class="row"><div class="col-2"></div><div class="col"><div class="invalid-feedback d-block">@foreach($errors->all() as $error) {{$error}}<br> @endforeach</div></div></div>@endif
            <div class="row">
                
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="device_count" class="col-md-2 col-form-label">Device Count:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="device_count" name="device_count"  placeholder="Device Count"  value="{{{ old('device_count', isset($data)?$data->device_count : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('device_count')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="device_count_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="user_id" class="col-md-2 col-form-label">User_id:</label>
                        <div class="col-md-10">
                            <select class="form-select" id="user_id" name="user_id" >
                                <option value="">{{trans("admiko.select")}}</option>
                                @foreach($users_all as $id => $value)
                                    <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $data->user_id ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback @if ($errors->has('user_id')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="user_id_help" class="text-muted"></small>
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
                    <a href="{{ route("admin.records.index") }}" class="btn btn-secondary float-end" role="button">{{trans('admiko.table_cancel')}}</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection