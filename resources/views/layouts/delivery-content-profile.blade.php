@section('delivery-content-profile')
<div class="aiz-user-panel">
    <div class="aiz-titlebar mb-4">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="fs-20 fw-700 text-dark">Manage Profile</h1>
            </div>
        </div>
    </div>



    <!-- Basic Info -->
    <div class="card shadow-none rounded-0 border">
        <div class="card-header border-bottom-0">
            <h5 class="mb-0 fs-16 fw-700 text-dark">Basic Info</h5>
        </div>
        <div class="card-body">
            <form onsubmit="return submitForm(this, url = '/api/update-delivery-profile', 'POST', 'update-delivery-boy-button-d')">
                <input type="hidden" name="id" value="{{ $delivery_boy->id }}" >
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Your Name</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control rounded-0" placeholder="Your Name" name="name" value="{{ $delivery_boy->user->name }}">
                    </div>
                </div>
                <!-- Phone -->
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Your Phone</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control rounded-0" placeholder="Your Phone" name="phone" value="{{ $delivery_boy->phone }}">
                    </div>
                </div>
                <!-- Photo -->
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Photo</label>
                    <div class="col-md-10">
                        <div class="input-group" onclick="openFileModal(this, 'avatar_original')" data-toggle="aizuploader" data-type="image" data-multiple="false">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-soft-secondary font-weight-medium rounded-0">Browse</div>
                            </div>
                            <div class="form-control file-amount">Choose file</div>
                            <input id="avatar_original" type="hidden" name="image" value="{{ $delivery_boy->image }}" class="selected-files">
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
                    <label class="col-md-2 col-form-label">Email</label>
                    <div class="col-md-10">
                        <input type="email" class="form-control rounded-0" placeholder="Your Email" name="email" value="{{ $delivery_boy->user->email }}" />
                    </div>
                </div>
                <!-- Password -->
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Your Password</label>
                    <div class="col-md-10">
                        <input type="password" class="form-control rounded-0" placeholder="New Password" name="new_password">
                    </div>
                </div>
                <!-- Confirm Password -->
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Confirm Password</label>
                    <div class="col-md-10">
                        <input type="password" class="form-control rounded-0" placeholder="Confirm Password" name="c_password">
                    </div>
                </div>
                <!-- Address -->
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Your Address</label>
                    <div class="col-md-10">
                        <textarea class="form-control rounded-0 mb-3" placeholder="Your Address" rows="3" name="address" required>{{ $delivery_boy->address }}</textarea>
                    </div>
                </div>
                <!-- Update Profile Button -->
                <div class="form-group mb-0 text-right">
                    <button id="update-delivery-boy-button-d" type="submit" class="btn btn-primary rounded-0 w-150px">Update Profile</button>
                </div>
            </form>
        </div>
    </div>

    

</div>
@endsection