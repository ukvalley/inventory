@extends("admin.layouts.default")
@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route("admin.customer.index") }}">Customer</a></li>
    @if(isset($data))
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_edit')}}</li>
    @else
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_add')}}</li>
    @endIf
@endsection
@section('pageTitle')
<h1>Customer</h1>
@endsection
@section('pageInfo')
@endsection
@section('backBtn')
<a href="{{ route("admin.customer.index") }}"><i class="fas fa-angle-left"></i> {{trans('admiko.page_back_btn')}}</a>
@endsection
@section('content')
<div class="card formPage customer_manage admikoForm">
    <legend class="action">{{ isset($data) ? trans('admiko.update') : trans('admiko.add_new') }}</legend>
    <form method="POST" action="{{ $admiko_data['formAction'] }}" enctype="multipart/form-data" class="needs-validation" novalidate>
        @if(isset($data)) @method('PUT') @endIf
        @csrf
        <div class="card-body">
            @if ($errors->any())<div class="row"><div class="col-2"></div><div class="col"><div class="invalid-feedback d-block">@foreach($errors->all() as $error) {{$error}}<br> @endforeach</div></div></div>@endif
            <div class="row">
                
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">Name:*</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="name" name="name" required="true" placeholder="Name"  value="{{{ old('name', isset($data)?$data->name : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('name')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="name_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="address" class="col-md-2 col-form-label">Address:*</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="address" name="address" required="true" placeholder="Address"  value="{{{ old('address', isset($data)?$data->address : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('address')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="address_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="adhar_number" class="col-md-2 col-form-label">Adhar Number:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="adhar_number" name="adhar_number"  placeholder="Adhar Number"  value="{{{ old('adhar_number', isset($data)?$data->adhar_number : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('adhar_number')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="adhar_number_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="adhar_front_image" class="col-md-2 col-form-label">Adhar Front Image:</label>
                        <div class="col-md-10">
                            @if (isset($data->adhar_front_image) && Storage::disk(config("admiko_config.filesystem"))->exists($admiko_data['fileInfo']["adhar_front_image"]['original']["folder"].$data->adhar_front_image))
                            <a href="{{ Storage::disk(config("admiko_config.filesystem"))->url($admiko_data['fileInfo']["adhar_front_image"]['original']["folder"].$data->adhar_front_image) }}" target="_blank" class="tableImage">
                                    <img src="{{ Storage::disk(config("admiko_config.filesystem"))->url($admiko_data['fileInfo']["adhar_front_image"]['original']["folder"].$data->adhar_front_image) }}">
                                </a><br>
                                <div class="form-check form-checkbox">
                                <input class="form-check-input" type="checkbox" name="adhar_front_image_admiko_delete" id="adhar_front_image_admiko_delete" value="1">
                                <label class="form-check-label" for="adhar_front_image_admiko_delete"> {{trans('admiko.remove_file')}}</label>
                            </div>
                            @endif
                            <input type="file" class="imageUpload mt-1" id="adhar_front_image" accept=".jpg,.png,.jpeg" data-type=".jpg,.png,.jpeg"  name="adhar_front_image"  data-selected="{{trans('admiko.selected_image_preview')}}" >
                            <input type="hidden" id="adhar_front_image_admiko_current" name="adhar_front_image_admiko_current" value="{{$data->adhar_front_image??''}}">
                            <div class="invalid-feedback @if ($errors->has('adhar_front_image')) d-block @endif" data-required="{{trans('admiko.required_image')}}" data-size="{{trans('admiko.required_size')}}" data-type="{{trans('admiko.required_type')}}">
                                @if ($errors->has('adhar_front_image')){{ $errors->first('adhar_front_image') }}@endif
                            </div>
                            <small id="adhar_front_image_help" class="text-muted">{{trans("admiko.file_extension_limit")}}.jpg,.png,.jpeg. {{trans("admiko.recommended")}}{{trans("admiko.width")}}1920px, {{trans("admiko.height")}}1080px. {{trans("admiko.image_action")}}{{trans("admiko.image_action_resize")}}.</small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="adhar_back_image" class="col-md-2 col-form-label">Adhar Back Image:</label>
                        <div class="col-md-10">
                            @if (isset($data->adhar_back_image) && Storage::disk(config("admiko_config.filesystem"))->exists($admiko_data['fileInfo']["adhar_back_image"]['original']["folder"].$data->adhar_back_image))
                            <a href="{{ Storage::disk(config("admiko_config.filesystem"))->url($admiko_data['fileInfo']["adhar_back_image"]['original']["folder"].$data->adhar_back_image) }}" target="_blank" class="tableImage">
                                    <img src="{{ Storage::disk(config("admiko_config.filesystem"))->url($admiko_data['fileInfo']["adhar_back_image"]['original']["folder"].$data->adhar_back_image) }}">
                                </a><br>
                                <div class="form-check form-checkbox">
                                <input class="form-check-input" type="checkbox" name="adhar_back_image_admiko_delete" id="adhar_back_image_admiko_delete" value="1">
                                <label class="form-check-label" for="adhar_back_image_admiko_delete"> {{trans('admiko.remove_file')}}</label>
                            </div>
                            @endif
                            <input type="file" class="imageUpload mt-1" id="adhar_back_image" accept=".jpg,.png,.jpeg" data-type=".jpg,.png,.jpeg"  name="adhar_back_image"  data-selected="{{trans('admiko.selected_image_preview')}}" >
                            <input type="hidden" id="adhar_back_image_admiko_current" name="adhar_back_image_admiko_current" value="{{$data->adhar_back_image??''}}">
                            <div class="invalid-feedback @if ($errors->has('adhar_back_image')) d-block @endif" data-required="{{trans('admiko.required_image')}}" data-size="{{trans('admiko.required_size')}}" data-type="{{trans('admiko.required_type')}}">
                                @if ($errors->has('adhar_back_image')){{ $errors->first('adhar_back_image') }}@endif
                            </div>
                            <small id="adhar_back_image_help" class="text-muted">{{trans("admiko.file_extension_limit")}}.jpg,.png,.jpeg. {{trans("admiko.recommended")}}{{trans("admiko.width")}}1920px, {{trans("admiko.height")}}1080px. {{trans("admiko.image_action")}}{{trans("admiko.image_action_resize")}}.</small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="mobile" class="col-md-2 col-form-label">Mobile:*</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="mobile" name="mobile" required="true" placeholder="Mobile"  value="{{{ old('mobile', isset($data)?$data->mobile : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('mobile')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="mobile_help" class="text-muted"></small>
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
                    <a href="{{ route("admin.customer.index") }}" class="btn btn-secondary float-end" role="button">{{trans('admiko.table_cancel')}}</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection