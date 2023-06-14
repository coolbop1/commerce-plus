@section('delivery-boy-form')
<div class="col-lg-8 mx-auto">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6">Delivery Boy Information</h5>
        </div>

        @if ($delivery_boy)
        <form onsubmit="return submitForm(this, url = '/api/update-delivery-boy', 'POST', 'update-delivery-boy-button')">
            <input type="hidden" name="id" value="{{ $delivery_boy->id }}" >
        @else
        <form onsubmit="return submitForm(this, url = '/api/create-delivery-boy', 'POST', 'create-delivery-boy-button')">
        @endif          
            <div class="card-body">	
                <div class="form-group row">
                    <label class="col-sm-2 col-from-label" for="name">
                        Name <span class="text-danger">*</span>
                    </label>
                    <div class="col-sm-10">
                        <input type="text" value="{{ $delivery_boy ? $delivery_boy->user->name : ''}}" class="form-control" name="name" placeholder="Name" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-from-label" for="email">
                        Email <span class="text-danger">*</span>
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="email" value="{{ $delivery_boy ? $delivery_boy->user->email : ''}}" placeholder="Email" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-from-label" for="phone">
                        Phone <span class="text-danger">*</span>
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="phone" value="{{ $delivery_boy ? $delivery_boy->user->phone : ''}}" placeholder="Phone" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label>State</label>
                    </div>
                    <div class="col-md-10">
                        <select class="form-control mb-3 aiz-selectpicker" data-live-search="true" name="state_id" required>
                            @foreach ($states as $state)
                                <option {{ $delivery_boy && $delivery_boy->state_id ==  $state->id ? 'selected' : ''}}  value="{{ $state->id }}">{{ $state->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label>Hub</label>
                    </div>
                    <div class="col-md-10">
                        <select class="form-control mb-3 aiz-selectpicker" data-live-search="true" name="hub_id">
                            <option value={{ null }}>Choose hub</option>
                            @foreach ($hubs as $hub)
                                <option {{ $delivery_boy && $delivery_boy->hub_id ==  $hub->id ? 'selected' : ''}}  value="{{ $hub->id }}">{{ $hub->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="signinSrEmail">
                        Image
                    </label>
                    <div class="col-md-10">
                        <div class="input-group" onclick="openFileModal(this, 'avatar_original')" data-type="image" data-multiple="false">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                            </div>
                            <div class="form-control file-amount">Choose file</div>
                            <input type="hidden" id="avatar_original" name="image" class="selected-files">
                        </div>
                        <div  id="preview_avatar_original"  class="file-preview box sm">
                            @if ($delivery_boy && $delivery_boy->image)
                                <div class="d-flex justify-content-between align-items-center mt-2 file-preview-item">
                                    <div id="preview_shop_logo_input" class="align-items-center align-self-stretch d-flex justify-content-center thumb">
                                        <img src="/{{ $delivery_boy->image }}" class="img-fit">
                                    </div>
                                    <div class="col body"><h6 class="d-flex"><span class="text-truncate title"></span><span class="ext flex-shrink-0"></span></h6><p></p></div>
                                    <div class="remove"><button class="btn btn-sm btn-link remove-attachment" type="button"><i class="la la-close"></i></button></div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-from-label">Address</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="address">{{ $delivery_boy ? $delivery_boy->address : '' }}</textarea>
                    </div>
                </div>

                <div class="form-group mb-3 text-right">
                    @if ($delivery_boy)
                    <button id="update-delivery-boy-button" type="submit" class="btn btn-primary">Update</button>
                    @else
                    <button id="create-delivery-boy-button" type="submit" class="btn btn-primary">Save</button>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>
@endsection