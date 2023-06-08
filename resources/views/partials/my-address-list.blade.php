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
                                                            <span class="fs-14 text-dark fw-500 ml-2 col">{{$customer->lga->name." , ".$customer->address }}</span>
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