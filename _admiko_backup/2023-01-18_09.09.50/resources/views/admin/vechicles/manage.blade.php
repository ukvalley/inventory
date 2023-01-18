@extends("admin.layouts.default")
@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route("admin.vechicles.index") }}">Vechicles</a></li>
    @if(isset($data))
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_edit')}}</li>
    @else
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_add')}}</li>
    @endIf
@endsection
@section('pageTitle')
<h1>Vechicles</h1>
@endsection
@section('pageInfo')
@endsection
@section('backBtn')
<a href="{{ route("admin.vechicles.index") }}"><i class="fas fa-angle-left"></i> {{trans('admiko.page_back_btn')}}</a>
@endsection
@section('content')
<div class="card formPage vechicles_manage admikoForm">
    <legend class="action">{{ isset($data) ? trans('admiko.update') : trans('admiko.add_new') }}</legend>
    <form method="POST" action="{{ $admiko_data['formAction'] }}" enctype="multipart/form-data" class="needs-validation" novalidate>
        @if(isset($data)) @method('PUT') @endIf
        @csrf
        <div class="card-body">
            @if ($errors->any())<div class="row"><div class="col-2"></div><div class="col"><div class="invalid-feedback d-block">@foreach($errors->all() as $error) {{$error}}<br> @endforeach</div></div></div>@endif
            <div class="row">
                
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="vechicle_number" class="col-md-2 col-form-label">Vechicle Number:*</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="vechicle_number" name="vechicle_number" required="true" placeholder="Vechicle Number"  value="{{{ old('vechicle_number', isset($data)?$data->vechicle_number : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('vechicle_number')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="vechicle_number_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="customer" class="col-md-2 col-form-label">Customer:*</label>
                        <div class="col-md-10">
                            <select class="form-select" id="customer" name="customer" required="true">
                                
                                @foreach($customer_all as $id => $value)
                                    <option value="{{ $id }}" {{ (old('customer') ? old('customer') : $data->customer ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback @if ($errors->has('customer')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="customer_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>

                <div class=" col-12">
                    <div class="form-group row">
                        <label for="rc_book_file" class="col-md-2 col-form-label">RC Book File:</label>
                        <div class="col-md-10">
                            @if (isset($data->rc_book_file) && Storage::disk(config("admiko_config.filesystem"))->exists($admiko_data['fileInfo']["rc_book_file"]['original']["folder"].$data->rc_book_file))
                            <a href="{{ Storage::disk(config("admiko_config.filesystem"))->url($admiko_data['fileInfo']["rc_book_file"]['original']["folder"].$data->rc_book_file)}}" target="_blank">{{$data->rc_book_file}}</a><br>
                                <div class="form-check form-checkbox">
                                <input class="form-check-input" type="checkbox" name="rc_book_file_admiko_delete" id="rc_book_file_admiko_delete" value="1">
                                <label class="form-check-label" for="rc_book_file_admiko_delete"> {{trans('admiko.remove_file')}}</label>
                            </div>
                            @endif
                            <input type="file" class="fileUpload mt-1" id="rc_book_file"  name="rc_book_file" >
                            <input type="hidden" id="rc_book_file_admiko_current" name="rc_book_file_admiko_current" value="{{$data->rc_book_file??''}}">
                            <div class="invalid-feedback @if ($errors->has('rc_book_file')) d-block @endif" data-required="{{trans('admiko.required_text')}}" data-size="{{trans('admiko.required_size')}}" data-type="{{trans('admiko.required_type')}}">
                                @if ($errors->has('rc_book_file')){{ $errors->first('rc_book_file') }}@endif
                            </div>
                            <small id="rc_book_file_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="vehicle_image_1" class="col-md-2 col-form-label">Vehicle Image 1:</label>
                        <div class="col-md-10">
                            @if (isset($data->vehicle_image_1) && Storage::disk(config("admiko_config.filesystem"))->exists($admiko_data['fileInfo']["vehicle_image_1"]['original']["folder"].$data->vehicle_image_1))
                            <a href="{{ Storage::disk(config("admiko_config.filesystem"))->url($admiko_data['fileInfo']["vehicle_image_1"]['original']["folder"].$data->vehicle_image_1) }}" target="_blank" class="tableImage">
                                    <img src="{{ Storage::disk(config("admiko_config.filesystem"))->url($admiko_data['fileInfo']["vehicle_image_1"]['original']["folder"].$data->vehicle_image_1) }}">
                                </a><br>
                                <div class="form-check form-checkbox">
                                <input class="form-check-input" type="checkbox" name="vehicle_image_1_admiko_delete" id="vehicle_image_1_admiko_delete" value="1">
                                <label class="form-check-label" for="vehicle_image_1_admiko_delete"> {{trans('admiko.remove_file')}}</label>
                            </div>
                            @endif
                            <input type="file" class="imageUpload mt-1" id="vehicle_image_1" accept=".jpg,.png,.jpeg" data-type=".jpg,.png,.jpeg"  name="vehicle_image_1"  data-selected="{{trans('admiko.selected_image_preview')}}" >
                            <input type="hidden" id="vehicle_image_1_admiko_current" name="vehicle_image_1_admiko_current" value="{{$data->vehicle_image_1??''}}">
                            <div class="invalid-feedback @if ($errors->has('vehicle_image_1')) d-block @endif" data-required="{{trans('admiko.required_image')}}" data-size="{{trans('admiko.required_size')}}" data-type="{{trans('admiko.required_type')}}">
                                @if ($errors->has('vehicle_image_1')){{ $errors->first('vehicle_image_1') }}@endif
                            </div>
                            <small id="vehicle_image_1_help" class="text-muted">{{trans("admiko.file_extension_limit")}}.jpg,.png,.jpeg. {{trans("admiko.recommended")}}{{trans("admiko.width")}}1920px, {{trans("admiko.height")}}1080px. {{trans("admiko.image_action")}}{{trans("admiko.image_action_resize")}}.</small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="vehicle_image_2" class="col-md-2 col-form-label">Vehicle image 2:</label>
                        <div class="col-md-10">
                            @if (isset($data->vehicle_image_2) && Storage::disk(config("admiko_config.filesystem"))->exists($admiko_data['fileInfo']["vehicle_image_2"]['original']["folder"].$data->vehicle_image_2))
                            <a href="{{ Storage::disk(config("admiko_config.filesystem"))->url($admiko_data['fileInfo']["vehicle_image_2"]['original']["folder"].$data->vehicle_image_2) }}" target="_blank" class="tableImage">
                                    <img src="{{ Storage::disk(config("admiko_config.filesystem"))->url($admiko_data['fileInfo']["vehicle_image_2"]['original']["folder"].$data->vehicle_image_2) }}">
                                </a><br>
                                <div class="form-check form-checkbox">
                                <input class="form-check-input" type="checkbox" name="vehicle_image_2_admiko_delete" id="vehicle_image_2_admiko_delete" value="1">
                                <label class="form-check-label" for="vehicle_image_2_admiko_delete"> {{trans('admiko.remove_file')}}</label>
                            </div>
                            @endif
                            <input type="file" class="imageUpload mt-1" id="vehicle_image_2" accept=".jpg,.png,.jpeg" data-type=".jpg,.png,.jpeg"  name="vehicle_image_2"  data-selected="{{trans('admiko.selected_image_preview')}}" >
                            <input type="hidden" id="vehicle_image_2_admiko_current" name="vehicle_image_2_admiko_current" value="{{$data->vehicle_image_2??''}}">
                            <div class="invalid-feedback @if ($errors->has('vehicle_image_2')) d-block @endif" data-required="{{trans('admiko.required_image')}}" data-size="{{trans('admiko.required_size')}}" data-type="{{trans('admiko.required_type')}}">
                                @if ($errors->has('vehicle_image_2')){{ $errors->first('vehicle_image_2') }}@endif
                            </div>
                            <small id="vehicle_image_2_help" class="text-muted">{{trans("admiko.file_extension_limit")}}.jpg,.png,.jpeg. {{trans("admiko.recommended")}}{{trans("admiko.width")}}1920px, {{trans("admiko.height")}}1080px. {{trans("admiko.image_action")}}{{trans("admiko.image_action_resize")}}.</small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="vehicle_image_3" class="col-md-2 col-form-label">Vehicle Image 3:</label>
                        <div class="col-md-10">
                            @if (isset($data->vehicle_image_3) && Storage::disk(config("admiko_config.filesystem"))->exists($admiko_data['fileInfo']["vehicle_image_3"]['original']["folder"].$data->vehicle_image_3))
                            <a href="{{ Storage::disk(config("admiko_config.filesystem"))->url($admiko_data['fileInfo']["vehicle_image_3"]['original']["folder"].$data->vehicle_image_3) }}" target="_blank" class="tableImage">
                                    <img src="{{ Storage::disk(config("admiko_config.filesystem"))->url($admiko_data['fileInfo']["vehicle_image_3"]['original']["folder"].$data->vehicle_image_3) }}">
                                </a><br>
                                <div class="form-check form-checkbox">
                                <input class="form-check-input" type="checkbox" name="vehicle_image_3_admiko_delete" id="vehicle_image_3_admiko_delete" value="1">
                                <label class="form-check-label" for="vehicle_image_3_admiko_delete"> {{trans('admiko.remove_file')}}</label>
                            </div>
                            @endif
                            <input type="file" class="imageUpload mt-1" id="vehicle_image_3" accept=".jpg,.png,.jpeg" data-type=".jpg,.png,.jpeg"  name="vehicle_image_3"  data-selected="{{trans('admiko.selected_image_preview')}}" >
                            <input type="hidden" id="vehicle_image_3_admiko_current" name="vehicle_image_3_admiko_current" value="{{$data->vehicle_image_3??''}}">
                            <div class="invalid-feedback @if ($errors->has('vehicle_image_3')) d-block @endif" data-required="{{trans('admiko.required_image')}}" data-size="{{trans('admiko.required_size')}}" data-type="{{trans('admiko.required_type')}}">
                                @if ($errors->has('vehicle_image_3')){{ $errors->first('vehicle_image_3') }}@endif
                            </div>
                            <small id="vehicle_image_3_help" class="text-muted">{{trans("admiko.file_extension_limit")}}.jpg,.png,.jpeg. {{trans("admiko.recommended")}}{{trans("admiko.width")}}1920px, {{trans("admiko.height")}}1080px. {{trans("admiko.image_action")}}{{trans("admiko.image_action_resize")}}.</small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="vehicle_image_4" class="col-md-2 col-form-label">Vehicle Image 4:</label>
                        <div class="col-md-10">
                            @if (isset($data->vehicle_image_4) && Storage::disk(config("admiko_config.filesystem"))->exists($admiko_data['fileInfo']["vehicle_image_4"]['original']["folder"].$data->vehicle_image_4))
                            <a href="{{ Storage::disk(config("admiko_config.filesystem"))->url($admiko_data['fileInfo']["vehicle_image_4"]['original']["folder"].$data->vehicle_image_4) }}" target="_blank" class="tableImage">
                                    <img src="{{ Storage::disk(config("admiko_config.filesystem"))->url($admiko_data['fileInfo']["vehicle_image_4"]['original']["folder"].$data->vehicle_image_4) }}">
                                </a><br>
                                <div class="form-check form-checkbox">
                                <input class="form-check-input" type="checkbox" name="vehicle_image_4_admiko_delete" id="vehicle_image_4_admiko_delete" value="1">
                                <label class="form-check-label" for="vehicle_image_4_admiko_delete"> {{trans('admiko.remove_file')}}</label>
                            </div>
                            @endif
                            <input type="file" class="imageUpload mt-1" id="vehicle_image_4" accept=".jpg,.png,.jpeg" data-type=".jpg,.png,.jpeg"  name="vehicle_image_4"  data-selected="{{trans('admiko.selected_image_preview')}}" >
                            <input type="hidden" id="vehicle_image_4_admiko_current" name="vehicle_image_4_admiko_current" value="{{$data->vehicle_image_4??''}}">
                            <div class="invalid-feedback @if ($errors->has('vehicle_image_4')) d-block @endif" data-required="{{trans('admiko.required_image')}}" data-size="{{trans('admiko.required_size')}}" data-type="{{trans('admiko.required_type')}}">
                                @if ($errors->has('vehicle_image_4')){{ $errors->first('vehicle_image_4') }}@endif
                            </div>
                            <small id="vehicle_image_4_help" class="text-muted">{{trans("admiko.file_extension_limit")}}.jpg,.png,.jpeg. {{trans("admiko.recommended")}}{{trans("admiko.width")}}1920px, {{trans("admiko.height")}}1080px. {{trans("admiko.image_action")}}{{trans("admiko.image_action_resize")}}.</small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="vehicle_image_5" class="col-md-2 col-form-label">Vehicle Image 5:</label>
                        <div class="col-md-10">
                            @if (isset($data->vehicle_image_5) && Storage::disk(config("admiko_config.filesystem"))->exists($admiko_data['fileInfo']["vehicle_image_5"]['original']["folder"].$data->vehicle_image_5))
                            <a href="{{ Storage::disk(config("admiko_config.filesystem"))->url($admiko_data['fileInfo']["vehicle_image_5"]['original']["folder"].$data->vehicle_image_5) }}" target="_blank" class="tableImage">
                                    <img src="{{ Storage::disk(config("admiko_config.filesystem"))->url($admiko_data['fileInfo']["vehicle_image_5"]['original']["folder"].$data->vehicle_image_5) }}">
                                </a><br>
                                <div class="form-check form-checkbox">
                                <input class="form-check-input" type="checkbox" name="vehicle_image_5_admiko_delete" id="vehicle_image_5_admiko_delete" value="1">
                                <label class="form-check-label" for="vehicle_image_5_admiko_delete"> {{trans('admiko.remove_file')}}</label>
                            </div>
                            @endif
                            <input type="file" class="imageUpload mt-1" id="vehicle_image_5" accept=".jpg,.png,.jpeg" data-type=".jpg,.png,.jpeg"  name="vehicle_image_5"  data-selected="{{trans('admiko.selected_image_preview')}}" >
                            <input type="hidden" id="vehicle_image_5_admiko_current" name="vehicle_image_5_admiko_current" value="{{$data->vehicle_image_5??''}}">
                            <div class="invalid-feedback @if ($errors->has('vehicle_image_5')) d-block @endif" data-required="{{trans('admiko.required_image')}}" data-size="{{trans('admiko.required_size')}}" data-type="{{trans('admiko.required_type')}}">
                                @if ($errors->has('vehicle_image_5')){{ $errors->first('vehicle_image_5') }}@endif
                            </div>
                            <small id="vehicle_image_5_help" class="text-muted">{{trans("admiko.file_extension_limit")}}.jpg,.png,.jpeg. {{trans("admiko.recommended")}}{{trans("admiko.width")}}1920px, {{trans("admiko.height")}}1080px. {{trans("admiko.image_action")}}{{trans("admiko.image_action_resize")}}.</small>
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
                    <a href="{{ route("admin.vechicles.index") }}" class="btn btn-secondary float-end" role="button">{{trans('admiko.table_cancel')}}</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection