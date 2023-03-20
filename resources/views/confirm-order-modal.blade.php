<div id="order-confirm" class="modal fade">
        <div class="modal-dialog modal-dialog-centered modal-dialog-zoom modal-xl">
            <div class="modal-content" id="variants">
                <div class="modal-header bord-btm">
                    <h4 class="modal-title h6">Order Summary</h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body" id="order-confirmation">
                    <div class="p-4 text-center">
                        <i class="las la-spinner la-spin la-3x"></i>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-base-3" data-dismiss="modal">Close</button>
                    <button type="button" onclick="oflinePayment()" class="btn btn-base-1 btn-warning">Offline payment</button>
                    <button type="button" onclick="submitOrder('cash_on_delivery')" class="btn btn-base-1 btn-info">Confirm with COD</button>
                    <button type="button" onclick="submitOrder('cash')" class="btn btn-base-1 btn-success">Confirm with Cash</button>
                </div>
            </div>
        </div>
    </div>

    
    <div id="offlin_payment" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-zoom" role="document">
            <div class="modal-content">
                <div class="modal-header bord-btm">
                    <h4 class="modal-title h6">Offline Payment Info</h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class=" row">
                            <label class="col-sm-3 control-label" for="offline_payment_method">Payment method</label>
                            <div class="col-sm-9">
                                <input placeholder="Name" id="offline_payment_method" name="offline_payment_method" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class=" row">
                            <label class="col-sm-3 control-label" for="offline_payment_amount">Amount</label>
                            <div class="col-sm-9">
                                <input placeholder="Amount" id="offline_payment_amount" name="offline_payment_amount" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <label class="col-sm-3 control-label" for="trx_id">Transaction ID</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control mb-3" id="trx_id" name="trx_id" placeholder="Transaction ID" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Payment Proof</label>
                        <div class="col-md-9">
                            <div class="input-group" data-toggle="aizuploader" data-type="image">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                </div>
                                <div class="form-control file-amount">Choose image</div>
                                <input type="hidden" name="payment_proof" class="selected-files">
                            </div>
                            <div class="file-preview box sm">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-base-3" data-dismiss="modal">Close</button>
                    <button type="button" onclick="submitOrder('offline_payment')" class="btn btn-styled btn-base-1 btn-success">Confirm</button>
                </div>
            </div>
        </div>
    </div>



    <div id="new-customer" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-zoom" role="document">
            <div class="modal-content">
                <div class="modal-header bord-btm">
                    <h4 class="modal-title h6">Shipping address</h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <form id="shipping_form">
                    <div class="modal-body" id="shipping_address">


                    </div>
                </form>
                <div id="add_new_address_button" data-customer-set="" data-customer="" class="" onclick="add_new_address(this)">
                    <div class="border p-3 rounded mb-3 bord-all pad-all c-pointer text-center bg-white">
                        <i class="fa fa-plus fa-2x"></i>
                        <div class="alpha-7">Add New Address</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-styled btn-base-3" data-dismiss="modal" id="close-button">Close</button>
                    <button type="button" class="btn btn-primary btn-styled btn-base-1" id="confirm-address" data-dismiss="modal">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <!-- new address modal -->
    <div id="new-address-modal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-zoom" role="document">
            <div class="modal-content">
                <div class="modal-header bord-btm">
                    <h4 class="modal-title h6">Shipping address</h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <form class="form-horizontal">                   <div class="modal-body">
                    <input type="hidden" name="customer_store_id" id="customer_store_id" value="{{ $store->id }}">
                        <input type="hidden" name="customer_id" id="customer_id" value="">
                        <div class="form-group">
                            <div class=" row">
                                <label class="col-sm-2 control-label" for="postal_code">Customer Name</label>
                                <div class="col-sm-10">
                                    <input type="text" placeholder="Customer Name" id="customer_name" name="customer_name" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class=" row">
                                <label class="col-sm-2 control-label" for="address">Address</label>
                                <div class="col-sm-10">
                                    <textarea placeholder="Address" id="customer_address" name="address" class="form-control" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2 control-label"">
                                    <label>State</label>
                                </div>
                                <div class="col-sm-10">
                                    <select class="form-control mb-3 aiz-selectpicker" id="customer_state_id" data-live-search="true" name="state_id" required>
                                        @foreach ($states as $state)
                                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class=" row">
                                <label class="col-sm-2 control-label" for="phone">Phone</label>
                                <div class="col-sm-10">
                                    <input type="number" min="0" placeholder="Phone" id="customer_phone" name="phone" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-styled btn-base-3" data-dismiss="modal">Close</button>
                        <button onclick="addCustomer()" type="submit" class="btn btn-primary btn-styled btn-base-1">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <script type="text/javascript">

        var products = null;

        // $(document).ready(function(){
        //     $('body').addClass('side-menu-closed');
        //     $('#product-list').on('click','.add-plus:not(.c-not-allowed)',function(){
        //         var stock_id = $(this).data('stock-id');
        //         $.post('https://demo.activeitzone.com/ecommerce/add-to-cart-pos',{_token:AIZ.data.csrf, stock_id:stock_id}, function(data){
        //             if(data.success == 1){
        //                 updateCart(data.view);
        //             }else{
        //                 AIZ.plugins.notify('danger', data.message);
        //             }
                    
        //         });
        //     });
        //     filterProducts();
        //     getShippingAddress();
        // });
        
        //
        $("#confirm-address").click(function (){
            document.getElementById('add_new_address_button').setAttribute('data-customer', document.getElementById('add_new_address_button').getAttribute('data-customer-set')) 
        });

        // function updateCart(data){
        //     $('#cart-details').html(data);
        //     AIZ.extra.plusMinus();
        // }

        // function filterProducts(){
        //     var keyword = $('input[name=keyword]').val();
        //     var category = $('select[name=poscategory]').val();
        //     var brand = $('select[name=brand]').val();
        //     $.get('https://demo.activeitzone.com/ecommerce/pos/products',{
        //         keyword : keyword, 
        //         category : category, 
        //         brand : brand
        //     }, function(data){
        //         products = data;
        //         $('#product-list').html(null);
        //         setProductList(data);
        //     });
        // }

        // function loadMoreProduct(){
        //     if(products != null && products.links.next != null){
        //         $('#load-more').find('.btn').html('Loading..');
        //         $.get(products.links.next,{}, function(data){
        //             products = data;
        //             setProductList(data);
        //         });
        //     }
        // }

        // function setProductList(data){
        //     for (var i = 0; i < data.data.length; i++) {
        //         $('#product-list').append(
        //             `<div class="w-140px w-xl-180px w-xxl-210px mx-2">
        //                 <div class="card bg-white c-pointer product-card hov-container">
        //                     <div class="position-relative">
        //                         <span class="absolute-top-left mt-1 ml-1 mr-0">
        //                             ${data.data[i].qty > 0
        //                                 ? `<span class="badge badge-inline badge-success fs-13">In stock`
        //                                 : `<span class="badge badge-inline badge-danger fs-13">Out of Stock` }
        //                             : ${data.data[i].qty}</span>
        //                         </span>
        //                         ${data.data[i].variant != null
        //                             ? `<span class="badge badge-inline badge-warning absolute-bottom-left mb-1 ml-1 mr-0 fs-13 text-truncate">${data.data[i].variant}</span>`
        //                             : '' }
        //                         <img src="${data.data[i].thumbnail_image }" class="card-img-top img-fit h-120px h-xl-180px h-xxl-210px mw-100 mx-auto" >
        //                     </div>
        //                     <div class="card-body p-2 p-xl-3">
        //                         <div class="text-truncate fw-600 fs-14 mb-2">${data.data[i].name}</div>
        //                         <div class="">
        //                             ${data.data[i].price != data.data[i].base_price
        //                                 ? `<del class="mr-2 ml-0">${data.data[i].base_price}</del><span>${data.data[i].price}</span>`
        //                                 : `<span>${data.data[i].base_price}</span>`
        //                             }
        //                         </div>
        //                     </div>
        //                     <div class="add-plus absolute-full rounded overflow-hidden hov-box ${data.data[i].qty <= 0 ? 'c-not-allowed' : '' }" data-stock-id="${data.data[i].stock_id}">
        //                         <div class="absolute-full bg-dark opacity-50">
        //                         </div>
        //                         <i class="las la-plus absolute-center la-6x text-white"></i>
        //                     </div>
        //                 </div>
        //             </div>`
        //         );
        //     }
        //     if (data.links.next != null) {
        //         $('#load-more').find('.btn').html('Load More.');
        //     }
        //     else {
        //         $('#load-more').find('.btn').html('Nothing more found.');
        //     }
        // }

        // function removeFromCart(key){
        //     $.post('https://demo.activeitzone.com/ecommerce/remove-from-cart-pos', {_token:AIZ.data.csrf, key:key}, function(data){
        //         updateCart(data);
        //     });
        // }

        // function addToCart(product_id, variant, quantity){
        //     $.post('https://demo.activeitzone.com/ecommerce/add-to-cart-pos',{_token:AIZ.data.csrf, product_id:product_id, variant:variant, quantity, quantity}, function(data){
        //         $('#cart-details').html(data);
        //         $('#product-variation').modal('hide');
        //     });
        // }

        // function updateQuantity(key){
        //     $.post('https://demo.activeitzone.com/ecommerce/update-quantity-cart-pos',{_token:AIZ.data.csrf, key:key, quantity: $('#qty-'+key).val()}, function(data){
        //         if(data.success == 1){
        //             updateCart(data.view);
        //         }else{
        //             AIZ.plugins.notify('danger', data.message);
        //         }
        //     });
        // }

        function setDiscount(){
            // var discount = $('input[name=discount]').val();
            // $.post('https://demo.activeitzone.com/ecommerce/setDiscount',{_token:AIZ.data.csrf, discount:discount}, function(data){
            //     updateCart(data);
            // });
        }

        function setShipping(){
            // var shipping = $('input[name=shipping]').val();
            // $.post('https://demo.activeitzone.com/ecommerce/setShipping',{_token:AIZ.data.csrf, shipping:shipping}, function(data){
            //     updateCart(data);
            // });
        }

        function getShippingAddress(element){
            let element_value = element.value;
            let shipping_address_button = document.getElementById('address-button-icon');
            if (element_value != '') {
                let customer = JSON.parse(element.value);
                document.getElementById('add_new_address_button').setAttribute('data-customer-set', element.value);
                document.getElementById('shipping_address').innerHTML = `
                    <label class="aiz-megabox d-block bg-white" style="display:block">
                            <input type="radio" name="address_id" value="9" checked="" required="">
                            <span class="d-flex p-3 pad-all aiz-megabox-elem">
                                <span class="aiz-rounded-check flex-shrink-0 mt-1"></span>
                                <span class="flex-grow-1 pl-3 pad-lft">
                                    <div>
                                        <span class="alpha-6">Address:</span>
                                        <span class="strong-600 ml-2">`+customer.address+`</span>
                                    </div>
                                    <div>
                                        <span class="alpha-6">State:</span>
                                        <span class="strong-600 ml-2">`+customer.state.name+`</span>
                                    </div>
                                    <div>
                                        <span class="alpha-6">Country:</span>
                                        <span class="strong-600 ml-2">Nigeria</span>
                                    </div>
                                    <div>
                                        <span class="alpha-6">Phone:</span>
                                        <span class="strong-600 ml-2">`+customer.phone+`</span>
                                    </div>
                                </span>
                            </span>
                        </label>

                `;
                
                shipping_address_button.setAttribute('data-target', '#new-customer');
                document.getElementById('customer_id').value = customer.id;
                document.getElementById('customer_name').value = customer.customer_name; 
                document.getElementById('customer_address').value = customer.address;
                document.getElementById('customer_state_id').value = customer.state_id;
                document.getElementById('customer_phone').value = customer.phone;
 
            } else {
                document.getElementById('add_new_address_button').setAttribute('data-customer', '');
                shipping_address_button.setAttribute('data-target', '#new-address-modal');
                document.getElementById('customer_id').value = '';
                document.getElementById('customer_name').value = ''; 
                document.getElementById('customer_address').value = '';
                document.getElementById('customer_state_id').value = '';
                document.getElementById('customer_phone').value = '';
            }

            //
            //$('#address-modal').modal('show');
            // $.post('https://demo.activeitzone.com/ecommerce/get_shipping_address',{_token:AIZ.data.csrf, id:$('select[name=user_id]').val()}, function(data){
            //     $('#shipping_address').html(data);
            // });
        }

        function add_new_address(){
             var customer_id = $('#customer_id').val();
            $('#set_customer_id').val(customer_id);
            $('#new-address-modal').modal('show');
            $("#close-button").click();
        }

        function orderConfirmation(){
            $('#order-confirmation').html(`<div class="p-4 text-center"><i class="las la-spinner la-spin la-3x"></i></div>`);
            $('#order-confirm').modal('show');
            // $.post('https://demo.activeitzone.com/ecommerce/pos-order-summary',{_token:AIZ.data.csrf}, function(data){
            //     $('#order-confirmation').html(data);
            // });
            orderConfirmationList('order-confirmation', <?php echo $store->id; ?>)
        }

        function oflinePayment(){
            $('#offlin_payment').modal('show');
        }

        function submitOrder(payment_type){
            // var user_id = $('select[name=user_id]').val();
            // var shipping = $('input[name=shipping]:checked').val();
            // var discount = $('input[name=discount]').val();
            // var shipping_address = $('input[name=address_id]:checked').val();
            // var offline_payment_method = $('input[name=offline_payment_method]').val();
            // var offline_payment_amount = $('input[name=offline_payment_amount]').val();
            // var offline_trx_id = $('input[name=trx_id]').val();
            // var offline_payment_proof = $('input[name=payment_proof]').val();
            
            // $.post('https://demo.activeitzone.com/ecommerce/pos-order',{
            //     _token                  : AIZ.data.csrf, 
            //     user_id                 : user_id,
            //     shipping_address        : shipping_address, 
            //     payment_type            : payment_type,
            //     shipping                : shipping, 
            //     discount                : discount,
            //     offline_payment_method  : offline_payment_method,
            //     offline_payment_amount  : offline_payment_amount,
            //     offline_trx_id          : offline_trx_id,
            //     offline_payment_proof   : offline_payment_proof

            // }, function(data){
            //     if(data.success == 1){
            //         AIZ.plugins.notify('success', data.message );
            //         location.reload();
            //     }
            //     else{
            //         AIZ.plugins.notify('danger', data.message );
            //     }
            // });
            console.log('payment_type ',payment_type);
            console.log('Order payload ', sessionStorage.getItem('COMMERCE_PLUS_POS_ORDER_PAYLOAD'));
        }

        //address
        $(document).on('change', '[name=country_id]', function() {
            var country_id = $(this).val();
            get_states(country_id);
        });

        $(document).on('change', '[name=state_id]', function() {
            var state_id = $(this).val();
            get_city(state_id);
        });
        
        function get_states(country_id) {
            $('[name="state"]').html("");
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "https://demo.activeitzone.com/ecommerce/get-states",
                type: 'POST',
                data: {
                    country_id  : country_id
                },
                success: function (response) {
                    var obj = JSON.parse(response);
                    if(obj != '') {
                        $('[name="state_id"]').html(obj);
                        AIZ.plugins.bootstrapSelect('refresh');
                    }
                }
            });
        }

        function get_city(state_id) {
            $('[name="city"]').html("");
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "https://demo.activeitzone.com/ecommerce/get-cities",
                type: 'POST',
                data: {
                    state_id: state_id
                },
                success: function (response) {
                    var obj = JSON.parse(response);
                    if(obj != '') {
                        $('[name="city_id"]').html(obj);
                        AIZ.plugins.bootstrapSelect('refresh');
                    }
                }
            });
        }
    </script>