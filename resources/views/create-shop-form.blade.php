@section('form')
<section class="pt-4 mb-4">
    <div class="container">
        <div class="row">
            <div class="col-xxl-5 col-xl-6 col-md-8 mx-auto">
                 
                    @if ($show_user_form)
                    <form id="shop" class="" onsubmit="return submitForm(this, url = '/api/create-shop', 'POST', 'create-shop-button')">  
                        <div class="bg-white rounded shadow-sm mb-3">
                            <div class="fs-15 fw-600 p-3 border-bottom">
                                Personal Info 
                            </div>
                            <div class="p-3">
                                <div class="form-group">
                                    <label>Your Name <span class="text-primary">*</span> <span id="validate-name" class="alert-danger"></span></label>
                                    <input type="text" class="form-control" value="" placeholder="Name" name="name">
                                </div>
                                <div class="form-group">
                                    <label>Your Email <span class="text-primary">*</span> <span id="validate-email" class="alert-danger"></span></label>
                                    <input type="email" class="form-control" value="" placeholder="Email" name="email">
                                </div>
                                <div class="form-group">
                                    <label>Your Password <span class="text-primary">*</span> <span id="validate-password" class="alert-danger"></span></label>
                                    <input type="password" class="form-control" placeholder="Password" name="password">
                                </div>
                                <div class="form-group">
                                    <label>Repeat Password <span class="text-primary">*</span> <span id="validate-c_password" class="alert-danger"></span></label>
                                    <input type="password" class="form-control" placeholder="Confirm Password" name="c_password">
                                </div>
                            </div>
                        </div>
                    @else
                    <form id="shop" class="" onsubmit="return submitForm(this, url = '/api/create-store', 'POST', 'create-shop-button')">  
                    @endif

                    <div class="bg-white rounded shadow-sm mb-4">
                        <div class="fs-15 fw-600 p-3 border-bottom">
                            Basic Info
                        </div>
                        <div class="p-3">
                            <div class="form-group">
                                <label>Shop Name <span class="text-primary">*</span> <span id="validate-shop_name" class="alert-danger"></span></label>
                                <input type="text" class="form-control" placeholder="Shop Name" name="shop_name" >
                            </div>
                            <div class="form-group">
                                <label>Address <span id="validate-address" class="alert-danger"></span></label>
                                <input type="text" class="form-control mb-3" placeholder="Address" name="address" >
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-right">
                        <button id="create-shop-button" type="submit" class="btn btn-primary fw-600">Register your shop</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection