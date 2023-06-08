@extends('layouts.vendor')
@include('layouts.vendor-side-bar')
@include('layouts.vendor-top-bar')
@section('body')
	<div class="aiz-main-wrapper">
        <div id="alert-modal" class="alert hide" role="alert"></div>
        @yield('vendor-side-bar-menu')
		<div class="aiz-content-wrapper">
            @yield('vendor-top-bar')
        <div class="aiz-main-content">
            <div class="px-15px px-lg-25px">
                
<div class="aiz-titlebar mt-2 mb-4">
  <div class="row align-items-center">
    <div class="col-md-6">
        <h1 class="h3">Shop Settings
            @php
                $store_name = str_replace(' ', '-',$store->name);
            @endphp
            <a href="/shop/{{ $store_name }}" class="btn btn-link btn-sm" target="_blank">(Visit Shop)<i class="la la-external-link"></i>)</a>
        </h1>
    </div>
  </div>
</div>


<div class="card">
    <div class="card-header">
        <h5 class="mb-0 h6">Basic Info</h5>
    </div>
    <div class="card-body">
        <form id="edit-shop" class="" onsubmit="return submitForm(this, url = '/api/edit-store/{{ $store->id }}', 'POST', 'edit-shop-details-button')">
            <div class="row">
                <label class="col-md-2 col-form-label">Shop Name<span class="text-danger text-danger">*</span> <span id="validate-name" class="alert-danger"></span></label>
                <div class="col-md-10">
                    <input type="text" class="form-control mb-3" placeholder="Shop Name" name="name" value="{{ $store->name }}" >
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-2 col-form-label">Shop Logo</label>
                <div class="col-md-10">
                    <div onclick="openFileModal(this, 'shop_logo_input')" class="input-group"  data-type="image" data-multiple="false">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                        </div>
                        <div class="form-control file-amount"></div>
                        <input id="shop_logo_input" type="hidden" name="shop_logo" class="selected-files">
                    </div>
                    <div id="preview_shop_logo_input" class="file-preview box sm"><div class="d-flex justify-content-between align-items-center mt-2 file-preview-item">
                        <div class="align-items-center align-self-stretch d-flex justify-content-center thumb">
                            @if ($store->shop_logo)
                                <img src="/{{ $store->shop_logo }}" class="img-fit">
                            @endif   
                        </div>
                        <div class="col body"><h6 class="d-flex"><span class="text-truncate title">{{ '' }}</span><span class="ext flex-shrink-0">{{ '' }}</span></h6><p></p></div><div class="remove"><button class="btn btn-sm btn-link remove-attachment" type="button"><i class="la la-close"></i></button></div></div></div>
                </div>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">
                    Shop Phone <span id="validate-shop_phone" class="alert-danger"></span>
                </label>
                <div class="col-md-10">
                    <input type="text" class="form-control mb-3" placeholder="Phone" name="shop_phone" value="{{ $store->shop_phone }}" >
                </div>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">Shop State <span class="text-danger text-danger">*</span> <span id="validate-state_id" class="alert-danger"></span></label>
                <div class="col-md-10">
                    <select name="state_id" onchange="getLocalGovt(this, 'shop_lga_select')" required class="select2 form-control aiz-selectpicker" data-toggle="select2" data-placeholder="Choose ..." data-live-search="true" required>
                        <option value="">Pick to add</option>
                        @foreach ($states as $state)
                            <option {{ $store->state_id == $state->id ? 'selected' : '' }}   value="{{ $state->id }}">{{ $state->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br/>
            <div class="row">
                <label class="col-md-2 col-form-label">Shop LGA <span class="text-danger text-danger">*</span> <span id="validate-state_id" class="alert-danger"></span></label>
                <div class="col-md-10">
                    <select id="shop_lga_select" name="local_govt_id" required class="select2 form-control" data-toggle="select2" data-placeholder="Choose ..." data-live-search="true" required>
                        @if ($store->local_govt_id)
                        @foreach (optional(optional($store)->state)->localGovts ?? [] as $local_govt)
                        <option {{ $store->local_govt_id == $local_govt->id ? 'selected' : '' }}  value="{{ $local_govt->id }}">{{ $local_govt->name }}</option>
                        @endforeach
                        @else
                        <option value={{ null }}>Please Select a state first</option>
                        @endif
                    </select>
                </div>
            </div>
            <br/>
            <div class="row">
                <label class="col-md-2 col-form-label">Shop Address <span class="text-danger text-danger">*</span> <span id="validate-shop_address" class="alert-danger"></span></label>
                <div class="col-md-10">
                    <input type="text" class="form-control mb-3" placeholder="Address" name="shop_address" value="{{ $store->shop_address }}" >
                </div>
            </div>
             
            <div class="row">
                <label class="col-md-2 col-form-label">Meta Title<span class="text-danger text-danger">*</span> <span id="validate-meta_title" class="alert-danger"></span></label>
                <div class="col-md-10">
                    <input type="text" class="form-control mb-3" placeholder="Meta Title" name="meta_title" value="{{ $store->meta_title }}" >
                </div>
            </div>
            <div class="row">
                <label class="col-md-2 col-form-label">Meta Description<span class="text-danger text-danger">*</span> <span id="validate-meta_description" class="alert-danger"></span></label>
                <div class="col-md-10">
                    <textarea name="meta_description" rows="3" class="form-control mb-3" >{{ $store->meta_description }}</textarea>
                </div>
            </div>
            <div class="form-group mb-0 text-right">
                <button id="edit-shop-details-button" type="submit" class="btn btn-sm btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>

        <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6">Delivery Boy Pickup Point</h5>
            <div class="form-group mb-0 text-right">
                <button class="btn btn-sm btn-primary" onclick="return getCurrentLocation()">Use my current location</button>
            </div>
        </div>
        <div class="card-body">
            <form id="edit-location" class="" onsubmit="return submitForm(this, url = '/api/edit-store/{{ $store->id }}', 'POST', 'edit-shop-location-button')">
                    <div class="row">
                        <div class="col-md-2" id="">
                            <label for="exampleInputuname">Longitude</label>
                        </div>
                        <div class="col-md-10" id="">
                            <input id="long_" onchange="document.getElementById('long').value = this.value" type="text" class="form-control mb-3" name="long_" value="{{ $store->long }}">
                            <input id="long" type="hidden"  name="long" value="{{ $store->long }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2" id="">
                            <label for="exampleInputuname">Latitude</label>
                        </div>
                        <div class="col-md-10" id="">
                            <input id="lat_" onchange="document.getElementById('lat').value = this.value" type="text" class="form-control mb-3" name="lat_" value="{{ $store->lat }}">
                            <input id="lat" type="hidden"  name="lat" value="{{ $store->lat }}">
                        </div>
                    </div>
                
                <div class="form-group mb-0 text-right">
                    <button id="edit-shop-location-button" type="submit" class="btn btn-sm btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>


<div class="card">
    <div class="card-header">
        <h5 class="mb-0 h6">Banner Settings</h5>
    </div>
    <div class="card-body">
        <form class="" onsubmit="return submitForm(this, url = '/api/edit-store/{{ $store->id }}', 'POST', 'edit-shop-banner-button')">
            <div class="row mb-3">
                <label class="col-md-2 col-form-label">Banners (1500x450)</label>
                <div class="col-md-10">
                    <div onclick="openFileModal(this, 'store_banner_input')" class="input-group"  data-type="image" data-multiple="true" >
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                        </div>
                        <div class="form-control file-amount"></div>
                        <input id="store_banner_input" type="hidden" value="{{ $store->banner }}" name="banner" >
                    </div>
                    <div id="preview_store_banner_input" class="file-preview box sm">
                        @php
                            $shop_banner_string = $store->banner;
                            $shop_banners = $shop_banner_string ? explode(',', $shop_banner_string) : [];
                        @endphp
                        @foreach ($shop_banners as $shop_banner)
                            <div class="d-flex justify-content-between align-items-center mt-2 file-preview-item">
                                <div class="align-items-center align-self-stretch d-flex justify-content-center thumb">
                                    <img src="/{{ $shop_banner }}" class="img-fit">
                                </div>
                                <div class="remove">
                                    <button class="btn btn-sm btn-link remove-attachment" type="button">
                                        <i class="la la-close"></i>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <small class="text-muted">We had to limit height to maintian consistancy. In some device both side of the banner might be cropped for height limitation.</small>
                </div>
            </div>

            <div class="form-group mb-0 text-right">
                <button id="edit-shop-banner-button" type="submit" class="btn btn-sm btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>


<div class="card">
    <div class="card-header">
        <h5 class="mb-0 h6">Social Media Link</h5>
    </div>
    <div class="card-body">
        <form class="" onsubmit="return submitForm(this, url = '/api/edit-store/{{ $store->id }}', 'POST', 'edit-shop-socials-button')">
            <div class="form-box-content p-3">
                <div class="row mb-3">
                    <label class="col-md-2 col-form-label">Facebook</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" placeholder="Facebook" name="facebook" value="{{ $store->facebook }}">
                        <small class="text-muted">Insert link with https</small>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-md-2 col-form-label">Instagram</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" placeholder="Instagram" name="instagram" value="{{ $store->instagram }}">
                        <small class="text-muted">Insert link with https</small>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-md-2 col-form-label">Twitter</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" placeholder="Twitter" name="twitter" value="{{ $store->twitter }}">
                        <small class="text-muted">Insert link with https</small>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-md-2 col-form-label">Google</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" placeholder="Google" name="google" value="{{ $store->google }}">
                        <small class="text-muted">Insert link with https</small>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-md-2 col-form-label">Youtube</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" placeholder="Youtube" name="youtube" value="{{ $store->youtube }}">
                        <small class="text-muted">Insert link with https</small>
                    </div>
                </div>
            </div>
            <div class="form-group mb-0 text-right">
                <button id="edit-shop-socials-button" type="submit" class="btn btn-sm btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>

            </div>
            <div class="bg-white text-center py-3 px-15px px-lg-25px mt-auto border-sm-top">
                <p class="mb-0">&copy; Commerce Plus <script> document.write((new Date).getFullYear()) </script></p>
            </div>
        </div><!-- .aiz-main-content -->
    </div><!-- .aiz-content-wrapper -->
</div>
@endsection