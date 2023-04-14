@section('buyer-dashboard')
<div class="row gutters-16">
    <!-- Wallet summary -->
            <div class="col-xl-12 col-md-6 mb-4">
        <div class="h-100" style="background-image: url('/assets/img/wallet-bg.png'); background-size: cover; background-position: center center;">
            <div class="p-4 h-100 w-100 w-xl-50">
                <p style="color: gray"  class="fs-14 fw-400 text-gray mb-3">Wallet Balance</p>
                <h1 class="fs-30 fw-700 text-white ">₦{{ number_format($user->balance, 2) }}</h1>
                <hr class="border border-dashed border-white opacity-40 ml-0 mt-4 mb-4">
                                    <p style="color: gray" class="fs-14 fw-400 text-gray mb-1">Last Recharge <strong>{{ optional($last_credit_transaction)->updated_at ? Carbon\Carbon::parse(optional($last_credit_transaction)->updated_at)->format('d.m.Y') : '----' }}</strong></p>
                <h3 class="fs-20 fw-700 text-white ">₦{{ number_format(optional($last_credit_transaction)->amount, 2) }}</h3>
                <button class="btn btn-block border border-soft-light hov-bg-dark text-white mt-5 py-3" onclick="show_wallet_modal()" style="border-radius: 30px; background: rgba(255, 255, 255, 0.1);">
                    <i class="la la-plus fs-18 fw-700 mr-2"></i>
                    Recharge Wallet
                </button>
            </div>
        </div>
    </div>
   
</div>













<div class="row gutters-16 mt-2">

    <!-- count summary -->
    <div class="col-xl-4 col-md-6 mb-6">
        <div class="px-4 bg-white border h-100">

            <!-- Wishlist summary -->
            <div class="d-flex align-items-center py-6 border-bottom">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
                    <g id="Group_25000" data-name="Group 25000" transform="translate(-1367 -499)">
                    <path id="Path_32309" data-name="Path 32309" d="M24,0A24,24,0,1,1,0,24,24,24,0,0,1,24,0Z" transform="translate(1367 499)" fill="#3490f3"/>
                    <g id="Group_24772" data-name="Group 24772" transform="translate(1383 515)">
                        <g id="Wooden" transform="translate(0 1)">
                        <path id="Path_25676" data-name="Path 25676" d="M290.82,413.6a4.5,4.5,0,0,0-6.364,0l-.318.318-.318-.318a4.5,4.5,0,1,0-6.364,6.364l6.046,6.054a.9.9,0,0,0,1.272,0l6.046-6.054A4.5,4.5,0,0,0,290.82,413.6Zm-.707,5.657-5.975,5.984-5.975-5.984a3.5,3.5,0,1,1,4.95-4.95l.389.389a.9.9,0,0,0,1.272,0l.389-.389a3.5,3.5,0,1,1,4.95,4.95Z" transform="translate(-276.138 -412.286)" fill="#fff"/>
                        </g>
                        <rect id="Rectangle_1603" data-name="Rectangle 1603" width="16" height="16" transform="translate(0)" fill="none"/>
                    </g>
                    </g>
                </svg>
                <div class="ml-3 d-flex flex-column justify-content-between">
                                            <span class="fs-20 fw-700 mb-1">{{ $user->wishList->count() }}</span>
                    <span class="fs-14 fw-400 text-secondary">Products in Wishlist</span>
                </div>
            </div>

            <!-- Order summary -->
            <div class="d-flex align-items-center py-6">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
                    <g id="Group_25000" data-name="Group 25000" transform="translate(-1367 -576)">
                    <path id="Path_32315" data-name="Path 32315" d="M24,0A24,24,0,1,1,0,24,24,24,0,0,1,24,0Z" transform="translate(1367 576)" fill="#85b567"/>
                    <path id="_2e746ddacacf202af82cf4480bae6173" data-name="2e746ddacacf202af82cf4480bae6173" d="M11.483,3h-.009a.308.308,0,0,0-.1.026L4.26,6.068A.308.308,0,0,0,4,6.376V15.6a.308.308,0,0,0,.026.127v0l.009.017a.308.308,0,0,0,.157.147l7.116,3.042a.338.338,0,0,0,.382,0L18.8,15.9a.308.308,0,0,0,.189-.243q0-.008,0-.017s0-.01,0-.015,0-.01,0-.015,0,0,0,0V6.376a.308.308,0,0,0-.255-.306L11.632,3.031l-.007,0a.308.308,0,0,0-.05-.017l-.009,0-.022,0h-.062Zm.014.643L13,4.287,6.614,7.02,6.6,7.029,5.088,6.383,11.5,3.643Zm2.29.979,1.829.782L9.108,8.188a.414.414,0,0,0-.186.349v3.291l-.667-1a.308.308,0,0,0-.393-.1l-.786.392V7.493l6.712-2.87ZM16.4,5.738l1.509.645L11.5,9.124,9.99,8.48l6.39-2.733.018-.009ZM4.615,6.85l1.846.789v3.975a.308.308,0,0,0,.445.275l.987-.494,1.064,1.595v0a.308.308,0,0,0,.155.14h0l.027.009a.308.308,0,0,0,.057.012h.036l.036,0,.025,0,.018,0,.015,0a.308.308,0,0,0,.05-.022h0a.308.308,0,0,0,.156-.309V8.955l1.654.707v8.56L4.615,15.411Zm13.765,0v8.56L11.8,18.223V9.662Z" transform="translate(1379.5 588.5)" fill="#fff" stroke="#fff" stroke-width="0.25" fill-rule="evenodd"/>
                    </g>
                </svg>
                <div class="ml-3 d-flex flex-column justify-content-between">
                                            <span class="fs-20 fw-700 mb-1">{{ $user->carts->count() }}</span>
                    <span class="fs-14 fw-400 text-secondary">Total Products Ordered</span>
                </div>
            </div>

        </div>
    </div>

   
            
    <!-- Default Shipping Address -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="p-4 border h-100">
            <h6 class="fw-700 mb-3 text-dark">Last Shipping Address</h6>
            @if ($customer)
                <ul class="list-unstyled mb-5">
                    <li class="fs-14 fw-400 text-derk pb-1"><span>{{ $customer->address }},</span></li>
                    <li class="fs-14 fw-400 text-derk pb-1"><span>{{ $customer->state->name }}</span></li>
                    <li class="fs-14 fw-400 text-derk pb-1"><span>Nigeria.</span></li>
                    <li class="fs-14 fw-400 text-derk pb-1"><span>{{ $customer->phone }}</span></li>
                </ul>
            @endif
            {{-- <button class="btn btn-dark btn-block fs-14 fw-500" onclick="add_new_address()" style="border-radius: 25px;">
                <i class="la la-plus fs-18 fw-700 mr-2"></i>
                Add New Address
            </button> --}}
        </div>
    </div>

</div>



 <!-- Wallet Recharge Modal -->
 <div class="modal fade" id="wallet_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Recharge Wallet</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body gry-bg px-3 pt-3" style="overflow-y: inherit;">
                <form onsubmit="return rechargeWallet(document.getElementById('rechagarge_amount').value, '{{ $user->email }}')">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Payment method <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <select class="form-control selectpicker rounded-0" data-minimum-results-for-search="Infinity"
                                    name="payment_option" data-live-search="true">
                                    <option value="paypal">Paypal</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Amount <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-8">
                            <input id="rechagarge_amount" type="number" class="form-control mb-3 rounded-0" name="amount" placeholder="Amount" required>
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <button type="submit"
                            class="btn btn-sm btn-primary rounded-0 transition-3d-hover mr-1">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>  
<script src="https://js.paystack.co/v1/inline.js"></script>
<script type="text/javascript">
    function show_wallet_modal() {
        $('#wallet_modal').modal('show');
    }
</script>
@endsection