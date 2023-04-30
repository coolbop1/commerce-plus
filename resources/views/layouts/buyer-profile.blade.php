@section('buyer-profile')
<div class="aiz-titlebar mb-4">
    <div class="row align-items-center">
      <div class="col-md-6">
          <h1 class="fs-20 fw-700 text-dark">Manage Profile</h1>
      </div>
    </div>
  </div>

  <!-- Basic Info-->
  <div class="card rounded-0 shadow-none border">
      <div class="card-header pt-4 border-bottom-0">
          <h5 class="mb-0 fs-18 fw-700 text-dark">Basic Info</h5>
      </div>
      <div class="card-body">
          <form onsubmit="return updateProfile(this)">            <!-- Name-->
              <div class="form-group row">
                  <label class="col-md-2 col-form-label fs-14 fs-14">Your Name</label>
                  <div class="col-md-10">
                      <input type="text" class="form-control rounded-0" placeholder="Your Name" name="name" value="{{ $user->name }}">
                  </div>
              </div>
              <div class="form-group row">
                <label class="col-md-2 col-form-label fs-14">Your Email</label>
                <div class="col-md-10">
                    <input disabled type="text" class="form-control rounded-0" placeholder="Your Phone"  value="{{ $user->email }}">
                </div>
            </div>
              <!-- Phone-->
              <div class="form-group row">
                  <label class="col-md-2 col-form-label fs-14">Your Phone</label>
                  <div class="col-md-10">
                      <input type="text" class="form-control rounded-0" placeholder="Your Phone" name="phone" value="{{ $user->phone }}">
                  </div>
              </div>
              <!-- Password-->
              <div class="form-group row">
                  <label class="col-md-2 col-form-label fs-14">Your Password</label>
                  <div class="col-md-10">
                      <input type="password" class="form-control rounded-0" placeholder="New Password" name="new_password">
                  </div>
              </div>
              <!-- Confirm Password-->
              <div class="form-group row">
                  <label class="col-md-2 col-form-label fs-14">Confirm Password</label>
                  <div class="col-md-10">
                      <input type="password" class="form-control rounded-0" placeholder="Confirm Password" name="confirm_password">
                  </div>
              </div>
              <!-- Submit Button-->
              <div class="form-group mb-0 text-right">
                  <button type="submit" class="btn btn-primary rounded-0 w-150px mt-3">Update Profile</button>
              </div>
          </form>
      </div>
  </div>

  <!-- Address -->
  <div class="card rounded-0 shadow-none border">
      <div class="card-header pt-4 border-bottom-0">
          <h5 class="mb-0 fs-18 fw-700 text-dark">Address</h5>
      </div>
      <div class="card-body">
        @php
            $customers = $user->customers;
        @endphp
        @foreach ($customers as $customer)
        <div class="">
            <div class="border p-4 mb-4 position-relative">
                <div class="row fs-14 mb-2 mb-md-0">
                    <span class="col-md-2 text-secondary">Address:</span>
                    <span class="col-md-8 text-dark">{{ $customer->address }}</span>
                </div>
                {{-- <div class="row fs-14 mb-2 mb-md-0">
                    <span class="col-md-2 text-secondary">City:</span>
                    <span class="col-md-10 text-dark">College</span>
                </div> --}}
                <div class="row fs-14 mb-2 mb-md-0">
                    <span class="col-md-2 text-secondary">State:</span>
                    <span class="col-md-10 text-dark">{{ optional(optional($customer)->state)->name }}</span>
                </div>
                <div class="row fs-14 mb-2 mb-md-0">
                    <span class="col-md-2 text-secondary">Country:</span>
                    <span class="col-md-10 text-dark">Nigeria</span>
                </div>
                <div class="row fs-14 mb-2 mb-md-0">
                    <span class="col-md-2 text-secondary text-secondary">Phone:</span>
                    <span class="col-md-10 text-dark">{{ $customer->phone }}</span>
                </div>
                                  
                <div class="dropdown position-absolute right-0 top-0 pt-4 mr-1">
                    <button class="btn bg-gray text-white px-1 py-1" type="button" data-toggle="dropdown">
                        <i class="la la-ellipsis-v"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" onclick="edit_address('{{ $customer->id }}')">
                            Edit
                        </a>
                         <a class="dropdown-item" href="/addresses/destroy/{{ $customer->id }}">Delete</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
                      <!-- Add New Address -->
          {{-- <div class="" onclick="add_new_address()">
              <div class="border p-3 mb-3 c-pointer text-center bg-light has-transition hov-bg-soft-light">
                  <i class="la la-plus la-2x"></i>
                  <div class="alpha-7 fs-14 fw-700">Add New Address</div>
              </div>
          </div> --}}
      </div>
  </div>
@endsection