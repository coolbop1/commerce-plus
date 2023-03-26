@section('delivery-panel-modal')

<script>
    function confirm_modal(delete_url)
    {
        jQuery('#confirm-delete').modal('show', {backdrop: 'static'});
        document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
    </script>
    
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
                        <input type="hidden" name="_token" value="9paYpvwyIMyIYq11AaayieqkqNTNli05XLlc0kRP">
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
                    <input type="hidden" name="_token" value="9paYpvwyIMyIYq11AaayieqkqNTNli05XLlc0kRP">                    <input type="hidden" name="product_id" id="bid_product_id" value="">
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
    
    
    <!-- SCRIPTS -->
    <script src="https://demo.activeitzone.com/ecommerce/public/assets/js/vendors.js"></script>
    <script src="https://demo.activeitzone.com/ecommerce/public/assets/js/aiz-core.js"></script>
    
    <script>
            </script>
    
    <script>
        $(".hover-user-top-menu .aiz-user-top-menu").on("mouseover", function (event) {
            $(".hover-user-top-menu").addClass('active');
        })
        .on("mouseout", function (event) {
            $(".hover-user-top-menu").removeClass('active');
        });
    </script>
    
    <script type="text/javascript">
        // Country Code
        var isPhoneShown = true,
            countryData = window.intlTelInputGlobals.getCountryData(),
            input = document.querySelector("#phone-code");
    
        for (var i = 0; i < countryData.length; i++) {
            var country = countryData[i];
            if (country.iso2 == 'bd') {
                country.dialCode = '88';
            }
        }
    </script>
    
        <script type="text/javascript">
        function show_order_details(order_id)
        {
            $('#order-details-modal-body').html(null);
    
            if(!$('#modal-size').hasClass('modal-lg')){
                $('#modal-size').addClass('modal-lg');
            }
    
            $.post('https://demo.activeitzone.com/ecommerce/admin/orders/details', { _token : AIZ.data.csrf, order_id : order_id}, function(data){
                $('#order-details-modal-body').html(data);
                $('#order_details').modal();
                $('.c-preloader').hide();
                AIZ.plugins.bootstrapSelect('refresh');
            });
        }
    </script>
    
@endsection