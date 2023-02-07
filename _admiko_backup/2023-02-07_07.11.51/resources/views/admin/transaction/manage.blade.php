@extends("admin.layouts.default")
@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route("admin.transaction.index") }}">Transaction</a></li>
    @if(isset($data))
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_edit')}}</li>
    @else
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_add')}}</li>
    @endIf
@endsection
@section('pageTitle')
<h1>Transaction</h1>
@endsection
@section('pageInfo')
@endsection
@section('backBtn')
<a href="{{ route("admin.transaction.index") }}"><i class="fas fa-angle-left"></i> {{trans('admiko.page_back_btn')}}</a>
@endsection
@section('content')
<div class="card formPage transaction_manage admikoForm">
    <legend class="action">{{ isset($data) ? trans('admiko.update') : trans('admiko.add_new') }}</legend>
    <form method="POST" action="{{ $admiko_data['formAction'] }}" enctype="multipart/form-data" class="needs-validation" novalidate>
        @if(isset($data)) @method('PUT') @endIf
        @csrf
        <div class="card-body">
            @if ($errors->any())<div class="row"><div class="col-2"></div><div class="col"><div class="invalid-feedback d-block">@foreach($errors->all() as $error) {{$error}}<br> @endforeach</div></div></div>@endif
            <div class="row">
                
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="sender" class="col-md-2 col-form-label">Sender:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="sender" name="sender"  placeholder="Sender"  value="{{{ old('sender', isset($data)?$data->sender : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('sender')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="sender_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="receiver" class="col-md-2 col-form-label">Receiver:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="receiver" name="receiver"  placeholder="Receiver"  value="{{{ old('receiver', isset($data)?$data->receiver : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('receiver')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="receiver_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
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
                        <label for="transaction_type" class="col-md-2 col-form-label">Transaction Type:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="transaction_type" name="transaction_type"  placeholder="Transaction Type"  value="{{{ old('transaction_type', isset($data)?$data->transaction_type : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('transaction_type')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="transaction_type_help" class="text-muted"></small>
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
            </div>
        </div>
        <div class="card-footer form-actions" id="form-group-buttons">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary float-start me-1 mb-1 mb-sm-0 save-button">{{trans('admiko.table_save')}}</button>
                    <a href="{{ route("admin.transaction.index") }}" class="btn btn-secondary float-end" role="button">{{trans('admiko.table_cancel')}}</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection