@section('buyer-wallet')
<div class="aiz-titlebar mb-4">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="fs-20 fw-700 text-dark">My Wallet</h1>
        </div>
    </div>
</div>

<div class="row gutters-16 mb-2">
    <!-- Wallet Balance -->
    <div class="col-md-4 mx-auto mb-4">
        <div class="bg-dark text-white overflow-hidden text-center p-4 h-100">
            <img src="https://demo.activeitzone.com/ecommerce/public/assets/img/wallet-icon.png" alt="">
            <div class="py-2">
                <div class="fs-14 fw-400 text-center">Wallet Balance</div>
                <div class="fs-30 fw-700 text-center">₦{{ number_format($user->balance, 2) }}</div>
            </div>
        </div>
    </div>

    <!-- Recharge Wallet -->
    <div class="col-md-4 mx-auto mb-4">
        <div class="p-4 mb-3 c-pointer text-center bg-light has-transition border h-100 hov-bg-soft-light"
            onclick="show_wallet_modal()">
            <span
                class="size-60px rounded-circle mx-auto bg-dark d-flex align-items-center justify-content-center mb-3">
                <i class="las la-plus la-3x text-white"></i>
            </span>
            <div class="fs-14 fw-600 text-dark">Recharge Wallet</div>
        </div>
    </div>

    <!-- Offline Recharge Wallet -->
                <div class="col-md-4 mx-auto mb-4">
            <div class="p-4 mb-3 c-pointer text-center bg-light has-transition border h-100 hov-bg-soft-light"
                >
                <span
                    class="size-60px rounded-circle mx-auto bg-dark d-flex align-items-center justify-content-center mb-3">
                    <i class="las la-credit-card la-3x text-white"></i>
                </span>
                <div class="fs-14 fw-600 text-dark">{{ $recharge_histories->count() }} Transactions</div>
            </div>
        </div>
</div>


 <!-- Wallet Recharge History -->
 <div class="card rounded-0 shadow-none border">
    <div class="card-header border-bottom-0">
        <h5 class="mb-0 fs-20 fw-700 text-dark text-center text-md-left">Wallet Recharge History</h5>
    </div>
    <div class="card-body py-0">
        <table class="table aiz-table mb-4">
            <thead class="text-gray fs-12">
                <tr>
                    <th class="pl-0">#</th>
                    <th data-breakpoints="lg">Date</th>
                    <th>Amount</th>
                    <th data-breakpoints="lg">Payment method</th>
                    <th class="text-right pr-0">Status</th>
                </tr>
            </thead>
            <tbody class="fs-14">
                @foreach ($recharge_histories as $key => $recharge_history)
                <tr>
                    <td class="pl-0">{{ $key + 1 }}</td>
                    <td>{{ Carbon\Carbon::parse($recharge_history->created_at)->format('d-m-Y') }}</td>
                    <td class="fw-700">₦{{ $recharge_history->amount }}</td>
                    <td>{{ $recharge_history->payment_reference ? 'card' : 'offline' }}</td>
                    <td class="text-right pr-0">N/A</td>
                </tr>
                @endforeach
                                        
            </tbody>
        </table>
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