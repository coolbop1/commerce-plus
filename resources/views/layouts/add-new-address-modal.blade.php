
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                
                <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
            </div>

            <div class="modal-body">
                <p>Delete confirmation message</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary rounded-0" data-dismiss="modal">Cancel</button>
                <a id="delete_link" class="btn btn-danger btn-ok rounded-0">Delete</a>
            </div>
        </div>
    </div>
</div>

<!-- Login Modal -->
<div class="modal fade" id="login_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
    <div class="modal-dialog modal-dialog-zoom" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title fw-600">Login</h6>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="p-3">
                    <form class="form-default" role="form" action="https://demo.activeitzone.com/ecommerce/users/login/cart" method="POST">
                        <input type="hidden" name="_token" value="ZNp8HVB3zukTRYbPiEpgCKTs12abJmcuNdZ3PAuW">
                                                    <!-- Use Email Instead -->
                            <div class="form-group">
                                <input type="email"
                                    class="form-control"
                                    value="" placeholder="Email" name="email"
                                    id="email" autocomplete="off">
                                                            </div>
                        
                        <!-- Password -->
                        <div class="form-group">
                            <input type="password" name="password" class="form-control h-auto rounded-0 form-control-lg"
                                placeholder="Password">
                        </div>

                        <!-- Remember Me & Forgot password -->
                        <div class="row mb-2">
                            <div class="col-6">
                                <label class="aiz-checkbox">
                                    <input type="checkbox" name="remember" >
                                    <span class=opacity-60>Remember Me</span>
                                    <span class="aiz-square-check"></span>
                                </label>
                            </div>
                            <div class="col-6 text-right">
                                <a href="https://demo.activeitzone.com/ecommerce/password/reset"
                                    class="text-reset opacity-60 hov-opacity-100 fs-14">Forgot password?</a>
                            </div>
                        </div>

                        <!-- Login Button -->
                        <div class="mb-5">
                            <button type="submit"
                                class="btn btn-primary btn-block fw-600 rounded-0">Login</button>
                        </div>
                    </form>

                    <!-- Register Now -->
                    <div class="text-center mb-3">
                        <p class="text-muted mb-0">Dont have an account?</p>
                        <a href="https://demo.activeitzone.com/ecommerce/users/registration">Register Now</a>
                    </div>
                    
                    <!-- Social Login -->
                                            <div class="separator mb-3">
                            <span class="bg-white px-3 opacity-60">Or Login With</span>
                        </div>
                        <ul class="list-inline social colored text-center mb-5">
                            <!-- Facebook -->
                                                            <li class="list-inline-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/social-login/redirect/facebook"
                                        class="facebook">
                                        <i class="lab la-facebook-f"></i>
                                    </a>
                                </li>
                                                        <!-- Google -->
                                                            <li class="list-inline-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/social-login/redirect/google"
                                        class="google">
                                        <i class="lab la-google"></i>
                                    </a>
                                </li>
                                                        <!-- Twitter -->
                                                            <li class="list-inline-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/social-login/redirect/twitter"
                                        class="twitter">
                                        <i class="lab la-twitter"></i>
                                    </a>
                                </li>
                                                        <!-- Apple -->
                                                            <li class="list-inline-item">
                                    <a href="https://demo.activeitzone.com/ecommerce/social-login/redirect/apple"
                                        class="apple">
                                        <i class="lab la-apple"></i>
                                    </a>
                                </li>
                                                    </ul>
                                    </div>
            </div>
        </div>
    </div>
</div>
<!-- Bid Modal -->
<div class="modal fade" id="bid_for_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bid For Product <small id="min_bid_amount"></small> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="https://demo.activeitzone.com/ecommerce/auction_product_bids" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="ZNp8HVB3zukTRYbPiEpgCKTs12abJmcuNdZ3PAuW">                    <input type="hidden" name="product_id" id="bid_product_id" value="">
                    <div class="form-group">
                        <label class="form-label">
                            Place Bid Price
                            <span class="text-danger">*</span>
                        </label>
                        <div class="form-group">
                            <input type="number" step="0.01" class="form-control form-control-sm" name="amount" id="bid_amount" min="" placeholder="Enter Amount" required>
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-sm btn-primary transition-3d-hover mr-1">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    
    <script>
    function account_delete_confirm_modal(delete_url)
    {
        jQuery('#account_delete_confirm').modal('show', {backdrop: 'static'});
        document.getElementById('account_delete_link').setAttribute('href' , delete_url);
    }
</script>

<div class="modal fade" id="account_delete_confirm" tabindex="-1" role="dialog" aria-labelledby="account_delete_confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header d-block py-4">
                <div class="d-flex justify-content-center">
                    <span class="avatar avatar-md mb-2 mt-2">
                                                    <img src="https://demo.activeitzone.com/ecommerce/public/uploads/all/5XVyeLGw5zRpb63bqgn2dtIOjCktLgBltNSQIPG3.png" class="m-auto"
                                onerror="this.onerror=null;this.src='https://demo.activeitzone.com/ecommerce/public/assets/img/avatar-place.png';">
                                            </span>
                </div>
                <h4 class="modal-title text-center fw-700" id="account_delete_confirmModalLabel" style="color: #ff9819;">Delete Your Account</h4>
                <p class="fs-16 fw-600 text-center" style="color: #8d8d8d;">Warning: You cannot undo this action</p>
            </div>

            <div class="modal-body pt-3 pb-5 px-xl-5">
                <p class="text-danger mt-3"><i><strong>Note:&nbsp;Don&#039;t Click to any button or don&#039;t do any action during account Deletion, it may takes some times.</strong></i></p>
                <p class="fs-14 fw-700" style="color: #8d8d8d;">Deleting Account Means:</p>
                <div class="row bg-soft-warning py-2 mb-2 ml-0 mr-0 border-left border-width-2 border-danger">
                    <div class="col-1">
                        <img src="https://demo.activeitzone.com/ecommerce/public/assets/img/warning.png" class="h-20px">
                    </div>
                    <div class="col">
                        <p class="fw-600 mb-0">If you create any classified ptoducts, after deleting your account, those products will no longer in our system</p>
                    </div>
                </div>
                <div class="row bg-soft-warning py-3 ml-0 mr-0 border-left border-width-2 border-danger">
                    <div class="col-1">
                        <img src="https://demo.activeitzone.com/ecommerce/public/assets/img/warning.png" class="h-20px">
                    </div>
                    <div class="col">
                        <p class="fw-600 mb-0">After deleting your account, wallet balance will no longer in our system</p>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary rounded-0 w-150px" data-dismiss="modal">Cancel</button>
                <a id="account_delete_link" class="btn btn-danger rounded-0 w-150px">Delete Account</a>
            </div>
        </div>
    </div>
</div>

    <div class="modal fade" id="addToCart">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size" role="document">
            <div class="modal-content position-relative">
                <div class="c-preloader text-center p-3">
                    <i class="las la-spinner la-spin la-3x"></i>
                </div>
                <button type="button" class="close absolute-top-right btn-icon close z-1 btn-circle bg-gray mr-2 mt-2 d-flex justify-content-center align-items-center" data-dismiss="modal" aria-label="Close" style="background: #ededf2; width: calc(2rem + 2px); height: calc(2rem + 2px);">
                    <span aria-hidden="true" class="fs-24 fw-700" style="margin-left: 2px;">&times;</span>
                </button>
                <div id="addToCart-modal-body">

                </div>
            </div>
        </div>
    </div>

        <!-- Address Modal -->
    <!-- New Address Modal -->
<div class="modal fade" id="new-address-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Address</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            
            @if (is_null($user))
            <form onsubmit="return submitForm(this, url = '/api/user-customer', 'POST', 'add-user-customer')">
            @else
            <form onsubmit="return submitForm(this, url = '/api/user-customer-auth', 'POST', 'add-user-customer')">
            @endif
            
             <div class="modal-body c-scrollbar-light">
                <input type="hidden" value="" id="cus_id" name="customer_id">
                    <div class="p-3">
                        @if (is_null($user))
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Name</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control mb-3 rounded-0" placeholder="Full Name" name="name" value="" required>
                                </div>
                            </div>
                        @endif
                        <!-- Address -->
                        <div class="row">
                            <div class="col-md-2">
                                <label>Address</label>
                            </div>
                            <div class="col-md-10">
                                <textarea id="cus_address" class="form-control mb-3 rounded-0" placeholder="Your Address" rows="2" name="address" required></textarea>
                            </div>
                        </div>


                        <!-- State -->
                        <div class="row">
                            <div class="col-md-2">
                                <label>State</label>
                            </div>
                            <div class="col-md-10">
                                <select id="cus_state" class="form-control mb-3 aiz-selectpicker rounded-0" data-live-search="true" name="state_id" required>
                                    @foreach ($states as $state)
                                        <option id="cus_state_{{ $state->id }}" value="{{ $state->id }}">{{ $state->name }}</option>   
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- <!-- City -->
                        <div class="row">
                            <div class="col-md-2">
                                <label>City</label>
                            </div>
                            <div class="col-md-10">
                                <select class="form-control mb-3 aiz-selectpicker rounded-0" data-live-search="true" name="city_id" required>

                                </select>
                            </div>
                        </div> --}}

                                                
                        {{-- <!-- Postal code -->
                        <div class="row">
                            <div class="col-md-2">
                                <label>Postal Code</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control mb-3 rounded-0" placeholder="Your Postal Code" name="postal_code" value="" required>
                            </div>
                        </div> --}}

                        <!-- Phone -->
                        <div class="row">
                            <div class="col-md-2">
                                <label>Phone</label>
                            </div>
                            <div class="col-md-10">
                                <input id="cus_phone" type="text" class="form-control mb-3 rounded-0" placeholder="080" name="phone" value="" required>
                            </div>
                        </div>
                        @if (is_null($user))
                        <div class="row">
                            <div class="col-md-2">
                                <label>Email</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control mb-3 rounded-0" placeholder="Email" name="email" value="" required>
                            </div>
                        </div>
                        <!-- Phone -->
                        <div class="row">
                            <div class="col-md-2">
                                <label>Password</label>
                            </div>
                            <div class="col-md-10">
                                <input type="password" class="form-control mb-3 rounded-0" placeholder="***" name="password" value="" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <label>Confirm Password</label>
                            </div>
                            <div class="col-md-10">
                                <input type="password" class="form-control mb-3 rounded-0" placeholder="***" name="c_password" value="" required>
                            </div>
                        </div>
                        @endif
                        <!-- Save button -->
                        <div class="form-group text-right">
                            <button id="add-user-customer" type="submit" class="btn btn-primary rounded-0 w-150px">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Address Modal -->
<div class="modal fade" id="edit-address-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Address</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body c-scrollbar-light" id="edit_modal_body">

            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
if(window.location.pathname == '/checkout' || window.location.pathname == '/checkout/delivery_info')
{
    let customer_address_string = '';
    let cart_storage =  'COMMERCE_PLUS_CART';
    cart_storage = localStorage.getItem(cart_storage);
    let cartItems = JSON.parse(cart_storage);
    if (cartItems.length == 0) {
        window.location.href = '/';
    } else if(cartItems[0].is_digital) {
        sessionStorage.setItem('COMMERCE_PLUS_ORDER_PAYLOAD', cart_storage+';;;'+customer_address_string);
        window.location.href = '/checkout/payment_select';
    }
}
populateCartCount();
populateCheckoutProductList();
populatePaymentCartCard();
    function add_new_address(){
        $('#new-address-modal').modal('show');
    }

    function edit_address(address) {
        let picked = null;
        let all_customer_account = JSON.parse(JSON.stringify(<?php echo json_encode($customers); ?>))
        console.log("$all_customer_account",all_customer_account);
        picked = all_customer_account.find(item => item.id == address);
        
        document.getElementById('cus_id').value = picked?.id;
        document.getElementById('cus_address').value = picked?.address;
        document.getElementById('cus_state').value = picked?.state_id;
        document.getElementById('cus_phone').value = picked?.phone;

        
        

        console.log( "picked ", picked)
        $('#new-address-modal').modal('show');

    }
    function getAllLoadedCustomers() {
        return JSON.parse(JSON.stringify(<?php echo json_encode($customers); ?>));
    }
    
    function deliveryInfo(formElement) {
        let params = new FormData(formElement);

        let customer_address_string = ''
        let cart_storage =  'COMMERCE_PLUS_CART';
        cart_storage = localStorage.getItem(cart_storage);
        let picked = null;
        var object = {};
        let all_customer_account = getAllLoadedCustomers();
        console.log("$all_customer_account",all_customer_account);
       
        
        params.forEach((val, key) => {
            object[key] = val;
        });
        picked = all_customer_account.find(item => item.id == object.customer_id);
        customer_address_string = JSON.stringify(picked);
        if(customer_address_string !== '' && cart_storage !== '') {
            sessionStorage.setItem('COMMERCE_PLUS_ORDER_PAYLOAD', cart_storage+';;;'+customer_address_string);
            window.location.href = '/checkout/delivery_info';
        } else {
            sessionStorage.removeItem('COMMERCE_PLUS_ORDER_PAYLOAD');
        }


        return false;
    }

    function moveToPayment(formElement) {
        let params = new FormData(formElement);
        var object = {};
        let pale = {};
        params.forEach((val, key) => {
            object[key] = val;
        });
        if(object.shipping_type_9  == 'home_delivery') {
            pale['shipping_type'] = 'home_delivery';
            pale['address'] = 'home_delivery';
        } else if (object.shipping_type_9  == 'pickup_point') {
            pale['shipping_type'] = 'pickup_point';
            if (object.pickup_point_id_9 == '') {
                showAlert("Please select a pick up point", 'alert-warning', []);
                return false
            } else {
                pale['address'] = object.pickup_point_id_9;
            }
        } else {
            showAlert("Please select a shipping typet", 'alert-warning', []);
            return false
        }
        let delivery_info = JSON.stringify(pale);
        let order_payload = sessionStorage.getItem('COMMERCE_PLUS_ORDER_PAYLOAD');
        let order_payload_array = order_payload.split(';;;');

        sessionStorage.setItem('COMMERCE_PLUS_ORDER_PAYLOAD', order_payload_array[0]+';;;'+order_payload_array[1]+';;;'+delivery_info);
        
        window.location.href = '/checkout/payment_select';

        return false;
    }

    function populateCheckoutProductList(){
        if(window.location.pathname == '/checkout/delivery_info')
        {
            let cart_storage =  'COMMERCE_PLUS_CART';
            cart_storage = localStorage.getItem(cart_storage);
            let cartItems = JSON.parse(cart_storage);

            
            cartItems.forEach(item => {
                document.getElementById('checkout-point-product-list').innerHTML += `
                    <li class="list-group-item">
                        <div class="d-flex align-items-center">
                            <span class="mr-2 mr-md-3">
                                <img src="/`+item.thumbnail_img+`"
                                    class="img-fit size-60px"
                                    alt="`+item.name+`"
                                    onerror="this.onerror=null;this.src='/assets/img/placeholder.jpg';">
                            </span>
                            <span class="fs-14 fw-400 text-dark">
                                `+item.name+`
                                <br>
                            </span>
                        </div>
                    </li>
                `;
            })
            
        }
    }

    function populatePaymentCartCard(){
        if(window.location.pathname == '/checkout/payment_select')
        {
            let cart_storage =  'COMMERCE_PLUS_CART';
            cart_storage = localStorage.getItem(cart_storage);
            let cartItems = JSON.parse(cart_storage);
            document.getElementById('payment-cart-card-count').innerText = cartItems.length;
            let cart_total = cartItems?.reduce((a, b) => a + (((b.new_price || b.price) * (b.quantity_added || 1)) || 0), 0) ?? 0.00;
            let tax_total = cartItems?.reduce((a, b) => a + ((b.tax * (b.quantity_added || 1)) || 0), 0) ?? 0.00;
            let shipping_total = cartItems?.reduce((a, b) => a + ((b.shipping * (b.quantity_added || 1)) || 0), 0) ?? 0.00;
            let total_total = cart_total + tax_total + shipping_total;
            document.getElementById('sub_total').value = cart_total;
            document.getElementById('cart-subtotal-card').innerText = '₦'+cart_total;
            document.getElementById('cart-tax-card').innerText = '₦'+(tax_total ?? 0.00);
            document.getElementById('cart-total-shipping-card').innerText = '₦'+(shipping_total ?? 0.00);
            document.getElementById('cart-total-card').innerText = '₦'+(total_total ?? 0.00);
            cartItems.forEach(item => {
                document.getElementById('payment-cart-list-card').innerHTML += `
                <tr class="cart_item">
                    <td class="product-name pl-0 fs-14 text-dark fw-400 border-top-0 border-bottom">
                        `+item.name+`
                        <strong class="product-quantity">
                            × `+(item.quantity_added || 1)+`
                        </strong>
                    </td>
                    <td class="product-total text-right pr-0 fs-14 text-primary fw-600 border-top-0 border-bottom">
                        <span
                            class="pl-4 pr-0">₦`+(item.new_price || item.price)+`</span>
                    </td>
                </tr>
                `;
            });
            let balance = document.getElementById('use_wallet_card').getAttribute('data-value');
            if(balance < cart_total){
                document.getElementById('use_wallet_card').remove();
            }
            let use_cod_card = document.getElementById('use_cod');
            if(cartItems.length > 0 && cartItems[0].is_digital == true) {
                document.getElementById('use_cod').remove();
            }

        }
    }
    
    // $(document).on('change', '[name=country_id]', function() {
    //     var country_id = $(this).val();
    //     get_states(country_id);
    // });

    // $(document).on('change', '[name=state_id]', function() {
    //     var state_id = $(this).val();
    //     get_city(state_id);
    // });
    
    // function get_states(country_id) {
    //     $('[name="state"]').html("");
    //     $.ajax({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         url: "https://demo.activeitzone.com/ecommerce/get-states",
    //         type: 'POST',
    //         data: {
    //             country_id  : country_id
    //         },
    //         success: function (response) {
    //             var obj = JSON.parse(response);
    //             if(obj != '') {
    //                 $('[name="state_id"]').html(obj);
    //                 AIZ.plugins.bootstrapSelect('refresh');
    //             }
    //         }
    //     });
    // }

    // function get_city(state_id) {
    //     $('[name="city"]').html("");
    //     $.ajax({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         url: "https://demo.activeitzone.com/ecommerce/get-cities",
    //         type: 'POST',
    //         data: {
    //             state_id: state_id
    //         },
    //         success: function (response) {
    //             var obj = JSON.parse(response);
    //             if(obj != '') {
    //                 $('[name="city_id"]').html(obj);
    //                 AIZ.plugins.bootstrapSelect('refresh');
    //             }
    //         }
    //     });
    // }
    
</script>