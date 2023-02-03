@extends("admin.layouts.default")
@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route("admin.device.index") }}">Device</a></li>
    @if(isset($data))
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_edit')}}</li>
    @else
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_add')}}</li>
    @endIf
@endsection
@section('pageTitle')
<h1>Device</h1>
@endsection
@section('pageInfo')
@endsection
@section('backBtn')
<a href="{{ route("admin.device.index") }}"><i class="fas fa-angle-left"></i> {{trans('admiko.page_back_btn')}}</a>
@endsection
@section('content')
<div class="card formPage device_manage admikoForm">
    <legend class="action">{{ isset($data) ? trans('admiko.update') : trans('admiko.add_new') }}</legend>
    <form method="POST" action="{{ $admiko_data['formAction'] }}" enctype="multipart/form-data" class="needs-validation" novalidate>
        @if(isset($data)) @method('PUT') @endIf
        @csrf
        <div class="card-body">
            @if ($errors->any())<div class="row"><div class="col-2"></div><div class="col"><div class="invalid-feedback d-block">@foreach($errors->all() as $error) {{$error}}<br> @endforeach</div></div></div>@endif
            <div class="row">
                
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="make" class="col-md-2 col-form-label">Make:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="make" name="make"  placeholder="Make"  value="{{{ old('make', isset($data)?$data->make : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('make')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="make_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="ice_id" class="col-md-2 col-form-label">ICE ID:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="ice_id" name="ice_id"  placeholder="ICE ID"  value="{{{ old('ice_id', isset($data)?$data->ice_id : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('ice_id')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="ice_id_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="imei" class="col-md-2 col-form-label">IMEI:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="imei" name="imei"  placeholder="IMEI"  value="{{{ old('imei', isset($data)?$data->imei : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('imei')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="imei_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="sim1" class="col-md-2 col-form-label">SIM1:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="sim1" name="sim1"  placeholder="SIM1"  value="{{{ old('sim1', isset($data)?$data->sim1 : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('sim1')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="sim1_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="sim_1_type" class="col-md-2 col-form-label">SIM 1 Type:</label>
                        <div class="col-md-10">
                            <select class="form-select" id="sim_1_type" name="sim_1_type" >
                                <option value="">{{trans("admiko.select")}}</option>
                                @foreach($sim_types_all as $id => $value)
                                    <option value="{{ $id }}" {{ (old('sim_1_type') ? old('sim_1_type') : $data->sim_1_type ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback @if ($errors->has('sim_1_type')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="sim_1_type_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>

                <div class=" col-12">
                    <div class="form-group row">
                        <label for="sim2" class="col-md-2 col-form-label">SIM2:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="sim2" name="sim2"  placeholder="SIM2"  value="{{{ old('sim2', isset($data)?$data->sim2 : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('sim2')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="sim2_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="sim_2_type" class="col-md-2 col-form-label">SIM 2 Type:</label>
                        <div class="col-md-10">
                            <select class="form-select" id="sim_2_type" name="sim_2_type" >
                                <option value="">{{trans("admiko.select")}}</option>
                                @foreach($sim_types_all as $id => $value)
                                    <option value="{{ $id }}" {{ (old('sim_2_type') ? old('sim_2_type') : $data->sim_2_type ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback @if ($errors->has('sim_2_type')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="sim_2_type_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>

                <div class=" col-12">
                    <div class="form-group row">
                        <label for="activation_date" class="col-md-2 col-form-label">Activation Date:</label>
                        <div class="col-md-10">
                            <div class="input-group" id="datePicker_activation_date" data-target-input="nearest">
                                <input type="text" autocomplete="off" style="max-width: 170px;border-right: unset;"
                                       data-date_time_format="{{config('admiko_config.form_date_format')}}"
                                       class="form-control datetimepicker-input datePicker"
                                       data-target="#datePicker_activation_date"  id="activation_date" data-toggle="datetimepicker"
                                       placeholder="Activation Date" name="activation_date" value="{{{ old('activation_date', isset($data)?$data->activation_date : '') }}}">
                                <div class="input-group-append input-group-text" data-target="#datePicker_activation_date" data-toggle="datetimepicker">
                                    <i class="fas fa-calendar-alt fa-fw"></i>
                                </div>
                            </div>
                            <div class="invalid-feedback @if ($errors->has('activation_date')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="activation_date_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="received_date" class="col-md-2 col-form-label">Received Date:</label>
                        <div class="col-md-10">
                            <div class="input-group" id="datePicker_received_date" data-target-input="nearest">
                                <input type="text" autocomplete="off" style="max-width: 170px;border-right: unset;"
                                       data-date_time_format="{{config('admiko_config.form_date_format')}}"
                                       class="form-control datetimepicker-input datePicker"
                                       data-target="#datePicker_received_date"  id="received_date" data-toggle="datetimepicker"
                                       placeholder="Received Date" name="received_date" value="{{{ old('received_date', isset($data)?$data->received_date : '') }}}">
                                <div class="input-group-append input-group-text" data-target="#datePicker_received_date" data-toggle="datetimepicker">
                                    <i class="fas fa-calendar-alt fa-fw"></i>
                                </div>
                            </div>
                            <div class="invalid-feedback @if ($errors->has('received_date')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="received_date_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="renewal_date" class="col-md-2 col-form-label">Renewal Date:</label>
                        <div class="col-md-10">
                            <div class="input-group" id="datePicker_renewal_date" data-target-input="nearest">
                                <input type="text" autocomplete="off" style="max-width: 170px;border-right: unset;"
                                       data-date_time_format="{{config('admiko_config.form_date_format')}}"
                                       class="form-control datetimepicker-input datePicker"
                                       data-target="#datePicker_renewal_date"  id="renewal_date" data-toggle="datetimepicker"
                                       placeholder="Renewal Date" name="renewal_date" value="{{{ old('renewal_date', isset($data)?$data->renewal_date : '') }}}">
                                <div class="input-group-append input-group-text" data-target="#datePicker_renewal_date" data-toggle="datetimepicker">
                                    <i class="fas fa-calendar-alt fa-fw"></i>
                                </div>
                            </div>
                            <div class="invalid-feedback @if ($errors->has('renewal_date')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="renewal_date_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="asset_id_type" class="col-md-2 col-form-label">Asset ID Type:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="asset_id_type" name="asset_id_type"  placeholder="Asset ID Type"  value="{{{ old('asset_id_type', isset($data)?$data->asset_id_type : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('asset_id_type')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="asset_id_type_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="user_id" class="col-md-2 col-form-label">User Id:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="user_id" name="user_id"  placeholder="User Id"  value="{{{ old('user_id', isset($data)?$data->user_id : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('user_id')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="user_id_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="customer_id" class="col-md-2 col-form-label">Customer Id:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="customer_id" name="customer_id"  placeholder="Customer Id"  value="{{{ old('customer_id', isset($data)?$data->customer_id : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('customer_id')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="customer_id_help" class="text-muted"></small>
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
                    <a href="{{ route("admin.device.index") }}" class="btn btn-secondary float-end" role="button">{{trans('admiko.table_cancel')}}</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection