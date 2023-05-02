@extends("admin.layouts.default")
@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route("admin.sales.index") }}">Sales</a></li>
    @if(isset($data))
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_edit')}}</li>
    @else
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_add')}}</li>
    @endIf
@endsection
@section('pageTitle')
<h1>Sales</h1>
@endsection
@section('pageInfo')
@endsection
@section('backBtn')
<a href="{{ route("admin.sales.index") }}"><i class="fas fa-angle-left"></i> {{trans('admiko.page_back_btn')}}</a>
@endsection
@section('content')
<div class="card formPage sales_manage admikoForm">
    <legend class="action">{{ isset($data) ? trans('admiko.update') : trans('admiko.add_new') }}</legend>
    <form method="POST" action="{{ $admiko_data['formAction'] }}" enctype="multipart/form-data" class="needs-validation" novalidate>
        @if(isset($data)) @method('PUT') @endIf
        @csrf
        <div class="card-body">
            @if ($errors->any())<div class="row"><div class="col-2"></div><div class="col"><div class="invalid-feedback d-block">@foreach($errors->all() as $error) {{$error}}<br> @endforeach</div></div></div>@endif
            <div class="row">
                
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="date" class="col-md-2 col-form-label">Date:</label>
                        <div class="col-md-10">
                            <div class="input-group" id="datePicker_date" data-target-input="nearest">
                                <input type="text" autocomplete="off" style="max-width: 170px;border-right: unset;"
                                       data-date_time_format="{{config('admiko_config.form_date_format')}}"
                                       class="form-control datetimepicker-input datePicker"
                                       data-target="#datePicker_date"  id="date" data-toggle="datetimepicker"
                                       placeholder="Date" name="date" value="{{{ old('date', isset($data)?$data->date : '') }}}">
                                <div class="input-group-append input-group-text" data-target="#datePicker_date" data-toggle="datetimepicker">
                                    <i class="fas fa-calendar-alt fa-fw"></i>
                                </div>
                            </div>
                            <div class="invalid-feedback @if ($errors->has('date')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="date_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="device_id" class="col-md-2 col-form-label">Device Id:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="device_id" name="device_id"  placeholder="Device Id"  value="{{{ old('device_id', isset($data)?$data->device_id : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('device_id')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="device_id_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="device_number" class="col-md-2 col-form-label">Device Number:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="device_number" name="device_number"  placeholder="Device Number"  value="{{{ old('device_number', isset($data)?$data->device_number : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('device_number')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="device_number_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="allocated_to" class="col-md-2 col-form-label">Allocated To:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="allocated_to" name="allocated_to"  placeholder="Allocated To"  value="{{{ old('allocated_to', isset($data)?$data->allocated_to : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('allocated_to')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="allocated_to_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="user_id" class="col-md-2 col-form-label">User Id:</label>
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
                    <a href="{{ route("admin.sales.index") }}" class="btn btn-secondary float-end" role="button">{{trans('admiko.table_cancel')}}</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection