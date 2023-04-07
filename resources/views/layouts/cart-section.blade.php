@section('cart-section')


        
        <!-- Modal -->
        <div class="modal fade" id="order_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <div id="order-details-modal-body">

                    </div>
                </div>
            </div>
        </div>

         <!-- Steps -->
         <section class="pt-5 mb-4">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 mx-auto">
                        <div class="row gutters-5 sm-gutters-10">
                            <div class="col active">
                                <div class="text-center border border-bottom-6px p-2 text-primary">
                                    <i class="la-3x mb-2 las la-shopping-cart cart-animate"></i>
                                    <h3 class="fs-14 fw-600 d-none d-lg-block">1. My Cart</h3>
                                </div>
                            </div>
                            <div class="col">
                                <div class="text-center border border-bottom-6px p-2">
                                    <i class="la-3x mb-2 opacity-50 las la-map"></i>
                                    <h3 class="fs-14 fw-600 d-none d-lg-block opacity-50">2. Shipping info
                                    </h3>
                                </div>
                            </div>
                            <div class="col">
                                <div class="text-center border border-bottom-6px p-2">
                                    <i class="la-3x mb-2 opacity-50 las la-truck"></i>
                                    <h3 class="fs-14 fw-600 d-none d-lg-block opacity-50">3. Delivery info
                                    </h3>
                                </div>
                            </div>
                            <div class="col">
                                <div class="text-center border border-bottom-6px p-2">
                                    <i class="la-3x mb-2 opacity-50 las la-credit-card"></i>
                                    <h3 class="fs-14 fw-600 d-none d-lg-block opacity-50">4. Payment</h3>
                                </div>
                            </div>
                            <div class="col">
                                <div class="text-center border border-bottom-6px p-2">
                                    <i class="la-3x mb-2 opacity-50 las la-check-circle"></i>
                                    <h3 class="fs-14 fw-600 d-none d-lg-block opacity-50">5. Confirmation
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Cart Details -->
    <section class="mb-4" id="cart-summary">
        <div class="container">
            <div class="row">
            <div class="col-xxl-8 col-xl-10 mx-auto">
                <div class="border bg-white p-3 p-lg-4 text-left">
                    <div class="mb-4">
                        <!-- Headers -->
                        <div class="row gutters-5 d-none d-lg-flex border-bottom mb-3 pb-3 text-secondary fs-12">
                            <div class="col col-md-1 fw-600">Qty</div>
                            <div class="col-md-5 fw-600">Product</div>
                            <div class="col fw-600">Price</div>
                            <div class="col fw-600">Tax</div>
                            <div class="col fw-600">Total</div>
                            <div class="col-auto fw-600">Remove</div>
                        </div>
                        <!-- Cart Items -->
                        <ul id="cart-list-on-page" class="list-group list-group-flush">
                                
                        </ul>
                    </div>

                    <!-- Subtotal -->
                    <div class="px-0 py-2 mb-4 border-top d-flex justify-content-between">
                        <span class="opacity-60 fs-14">Subtotal</span>
                        <span id="cart-list-page-subtotal" class="fw-700 fs-16">$49.000</span>
                    </div>
                    <div class="row align-items-center">
                        <!-- Return to shop -->
                        <div class="col-md-6 text-center text-md-left order-1 order-md-0">
                            <a href="/" class="btn btn-link fs-14 fw-700 px-0">
                                <i class="las la-arrow-left fs-16"></i>
                                Return to shop
                            </a>
                        </div>
                        <!-- Continue to Shipping -->
                        <div class="col-md-6 text-center text-md-right">
                            <button class="btn btn-primary fs-14 fw-700 rounded-0 px-4" onclick="window.location.href = '/checkout'">Continue to Shipping</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection
























@section('checkout-section')
<!-- Steps -->
<section class="pt-5 mb-4">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 mx-auto">
                <div class="row gutters-5 sm-gutters-10">
                    <div class="col done">
                        <div class="text-center border border-bottom-6px p-2 text-success">
                            <i class="la-3x mb-2 las la-shopping-cart cart-animate"></i>
                            <h3 class="fs-14 fw-600 d-none d-lg-block">1. My Cart</h3>
                        </div>
                    </div>
                    <div class="col active">
                        <div class="text-center border border-bottom-6px p-2 text-primary">
                            <i class="la-3x mb-2 opacity-50 las la-map"></i>
                            <h3 class="fs-14 fw-600 d-none d-lg-block opacity-50">2. Shipping info
                            </h3>
                        </div>
                    </div>
                    <div class="col">
                        <div class="text-center border border-bottom-6px p-2">
                            <i class="la-3x mb-2 opacity-50 las la-truck"></i>
                            <h3 class="fs-14 fw-600 d-none d-lg-block opacity-50">3. Delivery info
                            </h3>
                        </div>
                    </div>
                    <div class="col">
                        <div class="text-center border border-bottom-6px p-2">
                            <i class="la-3x mb-2 opacity-50 las la-credit-card"></i>
                            <h3 class="fs-14 fw-600 d-none d-lg-block opacity-50">4. Payment</h3>
                        </div>
                    </div>
                    <div class="col">
                        <div class="text-center border border-bottom-6px p-2">
                            <i class="la-3x mb-2 opacity-50 las la-check-circle"></i>
                            <h3 class="fs-14 fw-600 d-none d-lg-block opacity-50">5. Confirmation
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>









 <!-- Shipping Info -->
 <section class="mb-4 gry-bg">
    <div class="container">
        <div class="row cols-xs-space cols-sm-space cols-md-space">
            <div class="col-xxl-8 col-xl-10 mx-auto">
                <form onsubmit="return deliveryInfo(this)">
                        <div class="border bg-white p-4 mb-4">
                            @foreach ($customers as $customer)
                                <div class="border mb-4">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <label class="aiz-megabox d-block bg-white mb-0">
                                                <input type="radio" name="customer_id" value="{{ $customer->id }}"                                                     checked
                                                required>
                                                <span class="d-flex p-3 aiz-megabox-elem border-0">
                                                    <!-- Checkbox -->
                                                    <span class="aiz-rounded-check flex-shrink-0 mt-1"></span>
                                                    <!-- Address -->
                                                    <span class="flex-grow-1 pl-3 text-left">
                                                        <div class="row">
                                                            <span class="fs-14 text-secondary col-3">Address</span>
                                                            <span class="fs-14 text-dark fw-500 ml-2 col">{{ $customer->address }}</span>
                                                        </div>
                                                        {{-- <div class="row">
                                                            <span class="fs-14 text-secondary col-3">Postal Code</span>
                                                            <span class="fs-14 text-dark fw-500 ml-2 col">1254</span>
                                                        </div>
                                                        <div class="row">
                                                            <span class="fs-14 text-secondary col-3">City</span>
                                                            <span class="fs-14 text-dark fw-500 ml-2 col">College</span>
                                                        </div> --}}
                                                        <div class="row">
                                                            <span class="fs-14 text-secondary col-3">State</span>
                                                            <span class="fs-14 text-dark fw-500 ml-2 col">{{ $customer->state->name }}</span>
                                                        </div>
                                                        <div class="row">
                                                            <span class="fs-14 text-secondary col-3">Country</span>
                                                            <span class="fs-14 text-dark fw-500 ml-2 col">Nigeria</span>
                                                        </div>
                                                        <div class="row">
                                                            <span class="fs-14 text-secondary col-3">Phone</span>
                                                            <span class="fs-14 text-dark fw-500 ml-2 col">{{ $customer->phone }}</span>
                                                        </div>
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                                        <!-- Edit Address Button -->
                                        <div class="col-md-4 p-3 text-right">
                                            <a class="btn btn-sm btn-warning text-white mr-4 rounded-0 px-4" onclick="edit_address({{ $customer->id }})">Change</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                                                            
                            <input type="hidden" name="checkout_type" value="logged">
                            <!-- Add New Address -->
                            <div class="mb-5" >
                                <div class="border p-3 c-pointer text-center bg-light has-transition hov-bg-soft-light h-100 d-flex flex-column justify-content-center" onclick="add_new_address()">
                                    <i class="las la-plus la-2x mb-3"></i>
                                    <div class="alpha-7 fw-700">Add New Address</div>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <!-- Return to shop -->
                                <div class="col-md-6 text-center text-md-left order-1 order-md-0">
                                    <a href="/" class="btn btn-link fs-14 fw-700 px-0">
                                        <i class="las la-arrow-left fs-16"></i>
                                        Return to shop
                                    </a>
                                </div>
                                <!-- Continue to Delivery Info -->
                                <div class="col-md-6 text-center text-md-right">
                                    <button type="submit" class="btn btn-primary fs-14 fw-700 rounded-0 px-4">Continue to Delivery Info</a>
                                </div>
                            </div>
                        </div>
                                        </form>
            </div>
        </div>
    </div>
</section>
@endsection






















@section('delivery-info-section')
<!-- Steps -->
<section class="pt-5 mb-4">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 mx-auto">
                <div class="row gutters-5 sm-gutters-10">
                    <div class="col done">
                        <div class="text-center border border-bottom-6px p-2 text-success">
                            <i class="la-3x mb-2 las la-shopping-cart cart-animate"></i>
                            <h3 class="fs-14 fw-600 d-none d-lg-block">1. My Cart</h3>
                        </div>
                    </div>
                    <div class="col done">
                        <div class="text-center border border-bottom-6px p-2 text-success">
                            <i class="la-3x mb-2 opacity-50 las la-map"></i>
                            <h3 class="fs-14 fw-600 d-none d-lg-block opacity-50">2. Shipping info
                            </h3>
                        </div>
                    </div>
                    <div class="col active">
                        <div class="text-center border border-bottom-6px p-2 text-primary">
                            <i class="la-3x mb-2 opacity-50 las la-truck"></i>
                            <h3 class="fs-14 fw-600 d-none d-lg-block opacity-50">3. Delivery info
                            </h3>
                        </div>
                    </div>
                    <div class="col">
                        <div class="text-center border border-bottom-6px p-2">
                            <i class="la-3x mb-2 opacity-50 las la-credit-card"></i>
                            <h3 class="fs-14 fw-600 d-none d-lg-block opacity-50">4. Payment</h3>
                        </div>
                    </div>
                    <div class="col">
                        <div class="text-center border border-bottom-6px p-2">
                            <i class="la-3x mb-2 opacity-50 las la-check-circle"></i>
                            <h3 class="fs-14 fw-600 d-none d-lg-block opacity-50">5. Confirmation
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Delivery Info -->
<section class="py-4 gry-bg">
    <div class="container">
        <div class="row">
            <div class="col-xxl-8 col-xl-10 mx-auto">
                <div class="border bg-white p-4 mb-4">
                    <form onsubmit="return moveToPayment(this)">                         
                        <!-- Inhouse Products -->
                                                    <div class="card mb-5 border-0 rounded-0 shadow-none">
                            <div class="card-header py-3 px-0 border-bottom-0">
                                <h5 class="fs-16 fw-700 text-dark mb-0"> Checkout Products</h5>
                            </div>
                            <div class="card-body p-0">
                                <!-- Product List -->
                                <ul id="checkout-point-product-list" class="list-group list-group-flush border p-3 mb-3">
                                      
                                </ul>
                                <!-- Choose Delivery Type -->
                                <div class="row pt-3">
                                        <div class="col-md-6">
                                            <h6 class="fs-14 fw-700 mt-3">Choose Delivery Type</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row gutters-5">
                                                <!-- Home Delivery -->
                                                                                                    <div class="col-6">
                                                    <label class="aiz-megabox d-block bg-white mb-0">
                                                        <input
                                                            type="radio"
                                                            name="shipping_type_9"
                                                            value="home_delivery"
                                                            onchange="document.getElementById('pickup_point_id_admin').classList.replace('addp', 'd-none')"
                                                            data-target=".pickup_point_id_admin"
                                                            checked
                                                        >
                                                        <span class="d-flex aiz-megabox-elem rounded-0" style="padding: 0.75rem 1.2rem;">
                                                            <span class="aiz-rounded-check flex-shrink-0 mt-1"></span>
                                                            <span class="flex-grow-1 pl-3 fw-600">Home Delivery</span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <!-- Carrier -->
                                                                                                    <!-- Local Pickup -->
                                                                                                    <div class="col-6">
                                                    <label class="aiz-megabox d-block bg-white mb-0">
                                                        <input
                                                            type="radio"
                                                            name="shipping_type_9"
                                                            value="pickup_point"
                                                            onchange="document.getElementById('pickup_point_id_admin').classList.replace('d-none', 'addp')"
                                                            data-target=".pickup_point_id_admin"
                                                        >
                                                        <span class="d-flex aiz-megabox-elem rounded-0" style="padding: 0.75rem 1.2rem;">
                                                            <span class="aiz-rounded-check flex-shrink-0 mt-1"></span>
                                                            <span class="flex-grow-1 pl-3 fw-600">Local Pickup</span>
                                                        </span>
                                                    </label>
                                                </div>
                                                                                                </div>

                                            <!-- Pickup Point List -->
                                                <div id="pickup_point_id_admin" class="mt-3 pickup_point_id_admin d-none">
                                                    <select
                                                        class="form-control aiz-selectpicker rounded-0"
                                                        name="pickup_point_id_9"
                                                        data-live-search="true"
                                                        >
                                                        <option value="">Select your nearest pickup point</option>
                                                        @foreach ($pickup_stations as $pickupstation)
                                                        <option
                                                                value="{{ $pickupstation->id }}"
                                                                data-content="<span class='d-block'>
                                                                                <span class='d-block fs-16 fw-600 mb-2'>{{ $pickupstation->name }}</span>
                                                                                <span class='d-block opacity-50 fs-12'><i class='las la-map-marker'></i> {{ $pickupstation->address }}</span>
                                                                                <span class='d-block opacity-50 fs-12'><i class='las la-phone'></i>{{ $pickupstation->phone }}</span>
                                                                            </span>"
                                                            >
                                                            </option>
                                                            
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                    </div>

                                    <!-- Carrier Wise Shipping -->
                                </div>
                        </div>
                        
                        <!-- Seller Products -->
                        
                        <div class="pt-4 d-flex justify-content-between align-items-center">
                            <!-- Return to shop -->
                            <a href="/"  class="btn btn-link fs-14 fw-700 px-0">
                                <i class="la la-arrow-left fs-16"></i>
                                Return to shop
                            </a>
                            <!-- Continue to Payment -->
                            <button type="submit" class="btn btn-primary fs-14 fw-700 rounded-0 px-4">Continue to Payment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>






@endsection





























@section('payment-section')

<!-- Steps -->
<section class="pt-5 mb-4">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 mx-auto">
                <div class="row gutters-5 sm-gutters-10">
                    <div class="col done">
                        <div class="text-center border border-bottom-6px p-2 text-success">
                            <i class="la-3x mb-2 las la-shopping-cart cart-animate"></i>
                            <h3 class="fs-14 fw-600 d-none d-lg-block">1. My Cart</h3>
                        </div>
                    </div>
                    <div class="col done">
                        <div class="text-center border border-bottom-6px p-2 text-success">
                            <i class="la-3x mb-2 opacity-50 las la-map"></i>
                            <h3 class="fs-14 fw-600 d-none d-lg-block opacity-50">2. Shipping info
                            </h3>
                        </div>
                    </div>
                    <div class="col done">
                        <div class="text-center border border-bottom-6px p-2 text-success">
                            <i class="la-3x mb-2 opacity-50 las la-truck"></i>
                            <h3 class="fs-14 fw-600 d-none d-lg-block opacity-50">3. Delivery info
                            </h3>
                        </div>
                    </div>
                    <div class="col active">
                        <div class="text-center border border-bottom-6px p-2 text-primary">
                            <i class="la-3x mb-2 opacity-50 las la-credit-card"></i>
                            <h3 class="fs-14 fw-600 d-none d-lg-block opacity-50">4. Payment</h3>
                        </div>
                    </div>
                    <div class="col">
                        <div class="text-center border border-bottom-6px p-2">
                            <i class="la-3x mb-2 opacity-50 las la-check-circle"></i>
                            <h3 class="fs-14 fw-600 d-none d-lg-block opacity-50">5. Confirmation
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>







<!-- Payment Info -->
<section class="mb-4">
    <div class="container text-left">
        <div class="row">
            <div class="col-lg-8">
                <form onsubmit="return pickPaymentType(this)" id="checkout-form">
                    <div class="card rounded-0 border shadow-none">
                        {{-- <!-- Additional Info -->
                        <div class="card-header p-4 border-bottom-0">
                            <h3 class="fs-16 fw-700 text-dark mb-0">
                                Any additional info?
                            </h3>
                        </div>
                        <div class="form-group px-4">
                            <textarea name="additional_info" rows="5" class="form-control rounded-0" placeholder="Type your text"></textarea>
                        </div> --}}

                        <div class="card-header p-4 border-bottom-0">
                            <h3 class="fs-16 fw-700 text-dark mb-0">
                                Select a payment option
                            </h3>
                        </div>
                        <input id="email-address" type="hidden" value="{{ $user->email }}" >
                        <!-- Payment Options -->
                        <div class="card-body text-center px-4 pt-0">
                            <div class="row gutters-10">
                                          
                                                                    <!-- paystack -->
                                                                        <div class="col-6 col-xl-3 col-md-4">
                                        <label class="aiz-megabox d-block mb-3">
                                            <input value="paystack" class="online_payment" type="radio"
                                                name="payment_option" >
                                            <span class="d-block aiz-megabox-elem rounded-0 p-3">
                                                <img src="/assets/img/cards/paystack.png"
                                                    class="img-fit mb-2">
                                                <span class="d-block text-center">
                                                    <span
                                                    
                                                        class="d-block fw-600 fs-15">Paystack</span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    
                                                                    <!-- African Payment Getaway -->
                                                                        <!-- flutterwave -->
                                                                                <div class="col-6 col-xl-3 col-md-4">
                                            <label class="aiz-megabox d-block mb-3">
                                                <input value="flutterwave" class="online_payment"
                                                    type="radio" name="payment_option">
                                                <span class="d-block aiz-megabox-elem rounded-0 p-3">
                                                    <img src="/assets/img/cards/flutterwave.png"
                                                        class="img-fit mb-2">
                                                    <span class="d-block text-center">
                                                        <span
                                                            class="d-block fw-600 fs-15">flutterwave</span>
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                                                                 <!-- khalti -->
                                                                    <!-- Cash Payment -->
                                        <div class="col-6 col-xl-3 col-md-4">
                                            <label class="aiz-megabox d-block mb-3">
                                                <input value="cod" class="online_payment"
                                                    type="radio" name="payment_option" >
                                                <span class="d-block aiz-megabox-elem rounded-0 p-3">
                                                    <img src="/assets/img/cards/cod.png"
                                                        class="img-fit mb-2">
                                                    <span class="d-block text-center">
                                                        <span
                                                            class="d-block fw-600 fs-15">Cash On Delivery</span>
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                                        <div id="use_wallet_card" data-value="{{ $user->balance }}" class="col-6 col-xl-3 col-md-4">
                                            <label class="aiz-megabox d-block mb-3">
                                                <input value="wallet" class="online_payment"
                                                    type="radio" name="payment_option" >
                                                <span class="d-block aiz-megabox-elem rounded-0 p-3">
                                                    <h5 style="background-color: teal; color: white">BALANCE  <small>₦{{ number_format($user->balance) }}</small></h5>
                                                    <span class="d-block text-center">
                                                        <span
                                                            class="d-block fw-600 fs-15">Pay With Wallet</span>
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                                                                                                                                                    <!-- Offline Payment -->
                                                                                
                                                                                                                                                    </div>
                            
                            <!-- Offline Payment Fields -->
                                <div class="d-none mb-3 rounded border bg-white p-3 text-left">
                                    <div id="manual_payment_description">

                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Transaction ID <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control mb-3" name="trx_id"
                                                id="trx_id" placeholder="Transaction ID"
                                                >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Photo</label>
                                        <div class="col-md-9">
                                            <div class="input-group" data-toggle="aizuploader" data-type="image">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text bg-soft-secondary font-weight-medium">
                                                        Browse</div>
                                                </div>
                                                <div class="form-control file-amount">Choose image
                                                </div>
                                                <input type="hidden" name="photo" class="selected-files">
                                            </div>
                                            <div class="file-preview box sm">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                            <!-- Wallet Payment -->
                                                                {{-- <div class="py-4 px-4 text-center bg-soft-warning mt-4">
                                    <div class="fs-14 mb-3">
                                        <span class="opacity-80">Or, Your wallet balance :</span>
                                        <span class="fw-700">₦{{ $user->balance ?? 0.00 }}</span>
                                    </div>
                                        <button type="button" onclick="use_wallet()" class="btn btn-primary fs-14 fw-700 px-5 rounded-0">
                                            Pay with wallet
                                        </button>
                                                                        </div> --}}
                                                        </div>

                        <!-- Agree Box -->
                        <div class="pt-3 px-4 fs-14">
                            <label class="aiz-checkbox">
                                <input type="checkbox" required id="agree_checkbox">
                                <span class="aiz-square-check"></span>
                                <span>I agree to the</span>
                            </label>
                            <a href="https://demo.activeitzone.com/ecommerce/terms" class="fw-700">terms and conditions</a>,
                            <a href="https://demo.activeitzone.com/ecommerce/return-policy" class="fw-700">Return Policy</a> &
                            <a href="https://demo.activeitzone.com/ecommerce/privacy-policy" class="fw-700">Privacy Policy</a>
                        </div>

                        <div class="row align-items-center pt-3 px-4 mb-4">
                            <!-- Return to shop -->
                            <div class="col-6">
                                <a href="https://demo.activeitzone.com/ecommerce" class="btn btn-link fs-14 fw-700 px-0">
                                    <i class="las la-arrow-left fs-16"></i>
                                    Return to shop
                                </a>
                            </div>
                            <!-- Complete Ordert -->
                            <div class="col-6 text-right">
                                <button type="submit"
                                    class="btn btn-primary fs-14 fw-700 rounded-0 px-4">Complete Order</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Cart Summary -->
            <div class="col-lg-4 mt-lg-0 mt-4" id="cart_summary">
                <div class="card rounded-0 border shadow-none">

                   
                <div class="card-header pt-4 pb-1 border-bottom-0">
                    <h3 class="fs-16 fw-700 mb-0">Summary</h3>
                    <div class="text-right">
                        <!-- Items Count -->
                        <span id="payment-cart-card-count" class="badge badge-inline badge-primary fs-12 rounded-0 px-2">
                            
                        </span> Items
                        
                        <!-- Minimum Order Amount -->
                                                    
                                                                                    
                                        
                                                                                        
                    </div>
                </div>


                <div class="card-body">
                    <!-- Products Info -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="product-name border-top-0 border-bottom-1 pl-0 fs-12 fw-400 opacity-60">Product</th>
                                <th class="product-total text-right border-top-0 border-bottom-1 pr-0 fs-12 fw-400 opacity-60">Total</th>
                            </tr>
                        </thead>
                        <tbody id="payment-cart-list-card">
                               
                        </tbody>
                    </table>

                    <input type="hidden" id="sub_total" value="25">

                    <table class="table" style="margin-top: 2rem!important;">
                        <tfoot>
                            <!-- Subtotal -->
                            <tr class="cart-subtotal">
                                <th class="pl-0 fs-14 pt-0 pb-2 text-dark fw-600 border-top-0">Subtotal</th>
                                <td class="text-right pr-0 fs-14 pt-0 pb-2 fw-600 text-primary border-top-0">
                                    <span id="cart-subtotal-card" class="fw-600"></span>
                                </td>
                            </tr>
                            <!-- Tax -->
                            <tr class="cart-shipping">
                                <th class="pl-0 fs-14 pt-0 pb-2 text-dark fw-600 border-top-0">Tax</th>
                                <td class="text-right pr-0 fs-14 pt-0 pb-2 fw-600 text-primary border-top-0">
                                    <span id="cart-tax-card"  class="fw-600"></span>
                                </td>
                            </tr>
                            <!-- Total Shipping -->
                            <tr class="cart-shipping">
                                <th class="pl-0 fs-14 pt-0 pb-2 text-dark fw-600 border-top-0">Total Shipping</th>
                                <td class="text-right pr-0 fs-14 pt-0 pb-2 fw-600 text-primary border-top-0">
                                    <span id="cart-total-shipping-card" class="fw-600"></span>
                                </td>
                            </tr>
                            <!-- Redeem point -->
                                            <!-- Coupon Discount -->
                            
                                            <!-- Total -->
                            <tr class="cart-total">
                                <th class="pl-0 fs-14 text-dark fw-600"><span class="strong-600">Total</span></th>
                                <td class="text-right pr-0 fs-14 fw-600 text-primary">
                                    <strong><span id="cart-total-card"></span></strong>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                                
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://js.paystack.co/v1/inline.js"></script>
@endsection





















@section('order-confirmation')
<!-- Steps -->
@if (isset($checkout))
<section class="pt-5 mb-4">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 mx-auto">
                <div class="row gutters-5 sm-gutters-10">
                    <div class="col done">
                        <div class="text-center border border-bottom-6px p-2 text-success">
                            <i class="la-3x mb-2 las la-shopping-cart cart-animate"></i>
                            <h3 class="fs-14 fw-600 d-none d-lg-block">1. My Cart</h3>
                        </div>
                    </div>
                    <div class="col done">
                        <div class="text-center border border-bottom-6px p-2 text-success">
                            <i class="la-3x mb-2 opacity-50 las la-map"></i>
                            <h3 class="fs-14 fw-600 d-none d-lg-block opacity-50">2. Shipping info
                            </h3>
                        </div>
                    </div>
                    <div class="col done">
                        <div class="text-center border border-bottom-6px p-2 text-success">
                            <i class="la-3x mb-2 opacity-50 las la-truck"></i>
                            <h3 class="fs-14 fw-600 d-none d-lg-block opacity-50">3. Delivery info
                            </h3>
                        </div>
                    </div>
                    <div class="col done">
                        <div class="text-center border border-bottom-6px p-2 text-success">
                            <i class="la-3x mb-2 opacity-50 las la-credit-card"></i>
                            <h3 class="fs-14 fw-600 d-none d-lg-block opacity-50">4. Payment</h3>
                        </div>
                    </div>
                    <div class="col active">
                        <div class="text-center border border-bottom-6px p-2 text-primary">
                            <i class="la-3x mb-2 opacity-50 las la-check-circle"></i>
                            <h3 class="fs-14 fw-600 d-none d-lg-block opacity-50">5. Confirmation
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>








<section class="py-4">
    <div class="container text-left">
        <div class="row">
            <div class="col-xl-8 mx-auto">
                @php
                    $first_order = $checkout->carts->first();
                    //$orders = $checkout->orders;
                @endphp
                <div class="text-center py-4 mb-4">
                    <i class="la la-check-circle la-3x text-success mb-3"></i>
                    <h1 class="h3 mb-3 fw-600">Thank You for Your Order!</h1>
                    <p class="opacity-70 font-italic">A copy or your order summary has been sent to {{ json_decode($first_order->user)->email }}</p>
                </div>
                <div class="mb-4 bg-white p-4 rounded shadow-sm">
                    <h5 class="fw-600 mb-3 fs-17 pb-2">Order Summary</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table">
                                <tr>
                                    <td class="w-50 fw-600">Order date:</td>
                                    <td>{{ date('d-m-Y H:i A', $first_order->created_at) }}</td>
                                </tr>
                                <tr>
                                    <td class="w-50 fw-600">Name:</td>
                                    <td>{{ json_decode($first_order->user)->name }}</td>
                                </tr>
                                <tr>
                                    <td class="w-50 fw-600">Email:</td>
                                    <td>{{ json_decode($first_order->user)->email }}</td>
                                </tr>
                                <tr>
                                    <td class="w-50 fw-600">Shipping address:</td>
                                    <td>{{ json_decode($first_order->customer)->address }}, {{ json_decode($first_order->customer->state)->name }}, Nigeria</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table">
                                <tr>
                                    <td class="w-50 fw-600">Order status:</td>
                                    <td>{{ ucfirst(str_replace('_', ' ', $orders->first()->status)) }}</td>
                                </tr>
                                <tr>
                                    <td class="w-50 fw-600">Total order amount:</td>
                                    <td>₦{{ number_format($orders->sum('amount'), 2) }}</td>
                                </tr>
                                <tr>
                                    <td class="w-50 fw-600">Shipping:</td>
                                    <td>Flat shipping rate</td>
                                </tr>
                                <tr>
                                    <td class="w-50 fw-600">Payment method:</td>
                                    <td>{{ ucfirst(str_replace('_', ' ', $checkout->order_type)) }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                @foreach ($orders as $order)
                    <div class="card shadow-sm border-0 rounded">
                        <div class="card-body">
                            <div class="text-center py-4 mb-4">
                                <h2 class="h5"> Order Code:  <span class="fw-700 text-primary">{{ $order->order_code }}</span></h2>
                            </div>
                            <div>
                                <h5 class="fw-600 mb-3 fs-17 pb-2">Order Details</h5>
                                <div>
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th width="30%">Product</th>
                                                <th>Variation</th>
                                                <th>Quantity</th>
                                                <th>Delivery Type</th>
                                                <th class="text-right">Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($order->orderCarts() as $key => $orderDetail)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>
                                                        @if ($orderDetail->product != null)
                                                            <a href="/product/{{ $orderDetail->product->slug }}" target="_blank" class="text-reset">
                                                                {{ $orderDetail->product->name }}
                                                            </a>
                                                        @else
                                                            <strong>Product Unavailable</strong>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $orderDetail->variation ?? '' }}
                                                    </td>
                                                    <td>
                                                        {{ $orderDetail->qty }}
                                                    </td>
                                                    <td>
                                                        @if ($checkout->shipping_type && $checkout->shipping_type == 'home_delivery')
                                                            Home Delivery
                                                        @elseif ($checkout->shipping_type && $checkout->shipping_type == 'carrier')
                                                           Carrier
                                                        @else
                                                            @if ($checkout->pickup_point)
                                                                {{ $checkout->pickup_point->name }}
                                                            @endif
                                                            Pickip Point
                                                        @endif
                                                    </td>
                                                    <td class="text-right">₦{{ number_format($orderDetail->product->newPrice(), 2) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-xl-5 col-md-6 ml-auto mr-0">
                                        <table class="table ">
                                            <tbody>
                                                <tr>
                                                    <th>Subtotal</th>
                                                    <td class="text-right">
                                                        <span class="fw-600">₦{{ number_format($order->amount, 2) }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Shipping</th>
                                                    <td class="text-right">
                                                        <span class="font-italic">₦{{ number_format($order->shipping, 2) }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Tax</th>
                                                    <td class="text-right">
                                                        <span class="font-italic">₦{{ number_format($order->tax, 2) }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th><span class="fw-600">Total</span></th>
                                                    <td class="text-right">
                                                        <strong><span>₦{{ number_format(($order->amount + $order->shipping + $order->tax), 2) }}</span></strong>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
    
@endif


@endsection