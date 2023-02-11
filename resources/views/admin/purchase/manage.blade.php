@extends("admin.layouts.default")
@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route("admin.purchase.index") }}">Purchase</a></li>
    @if(isset($data))
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_edit')}}</li>
    @else
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_add')}}</li>
    @endIf
@endsection
@section('pageTitle')
<h1>Purchase</h1>
@endsection
@section('pageInfo')
@endsection
@section('backBtn')
<a href="{{ route("admin.purchase.index") }}"><i class="fas fa-angle-left"></i> {{trans('admiko.page_back_btn')}}</a>
@endsection
@section('content')
<div class="card formPage purchase_manage admikoForm">
    <legend class="action">{{ isset($data) ? trans('admiko.update') : trans('admiko.add_new') }}</legend>
    <form method="POST" action="{{ $admiko_data['formAction'] }}" enctype="multipart/form-data" class="needs-validation" novalidate>
        @if(isset($data)) @method('PUT') @endIf
        @csrf
        <div class="card-body">
            @if ($errors->any())<div class="row"><div class="col-2"></div><div class="col"><div class="invalid-feedback d-block">@foreach($errors->all() as $error) {{$error}}<br> @endforeach</div></div></div>@endif
            <div class="row">
                
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="date" class="col-md-2 col-form-label">Date &amp; Time:</label>
                        <div class="col-md-10">
                            <div class="input-group" id="datePicker_date" data-target-input="nearest">
                                <input type="text" autocomplete="off" style="max-width: 170px;border-right: unset;"
                                       data-date_time_format="{{config('admiko_config.form_date_format')}}"
                                       class="form-control datetimepicker-input datePicker"
                                       data-target="#datePicker_date"  id="date" data-toggle="datetimepicker"
                                       placeholder="Date &amp; Time" name="date" value="{{{ old('date', isset($data)?$data->date : '') }}}">
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
                        <label for="ice_id" class="col-md-2 col-form-label">ICE Id:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="ice_id" name="ice_id"  placeholder="ICE Id"  value="{{{ old('ice_id', isset($data)?$data->ice_id : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('ice_id')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="ice_id_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="manufactured_by" class="col-md-2 col-form-label">Manufactured By:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="manufactured_by" name="manufactured_by"  placeholder="Manufactured By"  value="{{{ old('manufactured_by', isset($data)?$data->manufactured_by : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('manufactured_by')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="manufactured_by_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="quantity" class="col-md-2 col-form-label">Quantity:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="quantity" name="quantity"  placeholder="Quantity"  value="{{{ old('quantity', isset($data)?$data->quantity : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('quantity')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="quantity_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="amount" class="col-md-2 col-form-label">Amount:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="amount" name="amount"  placeholder="Amount"  value="{{{ old('amount', isset($data)?$data->amount : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('amount')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="amount_help" class="text-muted"></small>
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
                        <label for="device_status" class="col-md-2 col-form-label">Device Status:</label>
                        <div class="col-md-10">
                            <select class="form-select" id="device_status" name="device_status" >
                                <option value="">{{trans("admiko.select")}}</option>
                                @foreach($device_status_all as $id => $value)
                                    <option value="{{ $id }}" {{ (old('device_status') ? old('device_status') : $data->device_status ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback @if ($errors->has('device_status')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="device_status_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>

                <div class=" col-12">
                    <div class="form-group row">
                        <label for="sim1_number" class="col-md-2 col-form-label">Sim1 Number:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="sim1_number" name="sim1_number"  placeholder="Sim1 Number"  value="{{{ old('sim1_number', isset($data)?$data->sim1_number : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('sim1_number')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="sim1_number_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="sim_1_type" class="col-md-2 col-form-label">SIm_1_Type:</label>
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
                        <label for="sim2_number" class="col-md-2 col-form-label">Sim2 Number:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="sim2_number" name="sim2_number"  placeholder="Sim2 Number"  value="{{{ old('sim2_number', isset($data)?$data->sim2_number : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('sim2_number')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="sim2_number_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="sim_2_type" class="col-md-2 col-form-label">Sim_2_type:</label>
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

                <div class=" col-12">
                    <div class="form-group row">
                        <label for="customer_id" class="col-md-2 col-form-label">Customer Id:</label>
                        <div class="col-md-10">
                            <select class="form-select" id="customer_id" name="customer_id" >
                                <option value="">{{trans("admiko.select")}}</option>
                                @foreach($customer_all as $id => $value)
                                    <option value="{{ $id }}" {{ (old('customer_id') ? old('customer_id') : $data->customer_id ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
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
                    <a href="{{ route("admin.purchase.index") }}" class="btn btn-secondary float-end" role="button">{{trans('admiko.table_cancel')}}</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection