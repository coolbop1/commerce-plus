     <!-- Select Payment Type Modal -->
     <div class="modal fade" id="select_payment_type_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Select Payment Type</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <input type="hidden" id="package_id" name="package_id" value="">
                 <div class="row">
                     <div class="col-md-2">
                         <label>Payment Type</label>
                     </div>
                     <div class="col-md-10">
                         <div class="mb-3">
                             <select class="form-control aiz-selectpicker" onchange="payment_type(this.value)"
                                 data-minimum-results-for-search="Infinity">
                                 <option value="">Select One</option>
                                 <option value="online">Online payment</option>
                                 <option value="offline">Offline payment</option>
                             </select>
                         </div>
                     </div>
                 </div>
                 <div class="form-group text-right">
                     <button type="button" class="btn btn-sm btn-primary transition-3d-hover mr-1"
                         id="select_type_cancel" data-dismiss="modal">Cancel</button>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <!-- Online payment Modal-->
 <div class="modal fade" id="price_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Purchase Your Package</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
             </div>
             <form class="" id="package_payment_form" action="https://demo.activeitzone.com/ecommerce/seller_packages/purchase"
                 method="post">
                 <input type="hidden" name="_token" value="4CBDYDg4cXafcWK6JXKJu7UEcXf89683XqmmXdke">                    
                 <input type="hidden" name="seller_package_id" value="">
                 <div class="modal-body" style="overflow-y: unset;">
                     <div class="row">
                         <div class="col-md-2">
                             <label>Payment method</label>
                         </div>
                         <div class="col-md-10">
                             <div class="mb-3">
                                 <select class="form-control aiz-selectpicker" data-live-search="true"
                                     name="payment_option">
                                                                                 <option value="paypal">Paypal</option>
                                                                                                                         <option value="stripe">Stripe</option>
                                                                                                                         <option value="mercadopago">Mercadopago</option>
                                         <option value="paypal">Paypal</option>
                                                                                                                         <option value="toyyibpay">ToyyibPay</option>
                                                                                                                         <option value="sslcommerz">sslcommerz</option>
                                                                                                                         <option value="instamojo">Instamojo</option>
                                                                                                                         <option value="razorpay">Razorpay</option>
                                                                                                                         <option value="paystack">Paystack</option>
                                                                                                                         <option value="payhere">payhere</option>
                                                                                                                         <option value="ngenius">ngenius</option>
                                                                                                                         <option value="iyzico">Iyzico</option>
                                                                                                                         <option value="nagad">Nagad</option>
                                                                                                                         <option value="bkash">Bkash</option>
                                                                                                                         <option value="aamarpay">Amarpay</option>
                                                                                                                                                                                                                     <option value="flutterwave">flutterwave</option>
                                                                                                                                     <option value="payfast">payfast</option>
                                                                                                                                                                                                                     <option value="myfatoorah">MyFatoorah</option>
                                                                                                                     </select>
                             </div>
                         </div>
                     </div>
                     <div class="form-group text-right">
                         <button type="button" class="btn btn-sm btn-secondary transition-3d-hover mr-1"
                             data-dismiss="modal">Cancel</button>
                         <button type="submit"
                             class="btn btn-sm btn-primary transition-3d-hover mr-1">Confirm</button>
                     </div>
                 </div>
             </form>
         </div>
     </div>
 </div>

 <!-- offline payment Modal -->
 <div class="modal fade" id="offline_seller_package_purchase_modal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title strong-600 heading-5">Offline Package Payment</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div id="offline_seller_package_purchase_modal_body">
                <div class="modal-body gry-bg px-3 pt-3 mx-auto">
                    <div class="align-items-center gutters-5 row">
                                </div>
            
                    <div id="manual_payment_data">
                        <div class="card mb-3 p-3 d-none">
                            <div id="manual_payment_description">
            
                            </div>
                        </div>
            
                        <div class="card mb-3 p-3">
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Transaction ID <span class="text-danger">*</span></label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control mb-3" name="trx_id" placeholder="Transaction ID" required="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Photo</label>
                                <div class="col-md-9">
                                    <div class="input-group" data-toggle="aizuploader" data-type="image">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                        </div>
                                        <div class="form-control file-amount">Choose image</div>
                                        <input type="hidden" name="photo" class="selected-files">
                                    </div>
                                    <div class="file-preview box sm">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-sm btn-primary transition-3d-hover mr-1">Confirm</button>
                    </div>
                </div>
             </div>
         </div>
     </div>
 </div>


 <script type="text/javascript">
    function select_payment_type(id) {
        $('input[name=package_id]').val(id);
        $('#select_payment_type_modal').modal('show');
    }

    function payment_type(type) {
        var package_id = $('#package_id').val();
        if (type == 'online') {
            $("#select_type_cancel").click();
            show_price_modal(package_id);
        } else if (type == 'offline') {
            $("#select_type_cancel").click();
            // $.post('https://demo.activeitzone.com/ecommerce/seller/offline-seller-package-purchase-modal', {
            //     _token: '4CBDYDg4cXafcWK6JXKJu7UEcXf89683XqmmXdke',
            //     package_id: package_id
            // }, function(data) {
            //     $('#offline_seller_package_purchase_modal_body').html(data);
            //     $('#offline_seller_package_purchase_modal').modal('show');
            // });
            //$('#offline_seller_package_purchase_modal_body').html(data);
            $('#offline_seller_package_purchase_modal').modal('show');
        }
    }

    function show_price_modal(id) {
        $('input[name=seller_package_id]').val(id);
        $('#price_modal').modal('show');
    }

    function get_free_package(id) {
        $('input[name=seller_package_id]').val(id);
        $('#package_payment_form').submit();
    }
</script>