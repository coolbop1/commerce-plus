<form onsubmit="return submitForm(this, url = '/api/save-customer-adress/{{ $customer->id }}', 'POST', 'edit-customer-address')">
    <div class="row">
        <div class="col-md-2">
            <label>Phone</label>
        </div>
        <div class="col-md-10">
            <input id="cus_phone" type="text" class="form-control mb-3 rounded-0" placeholder="080" name="phone" value="{{ $customer->phone }}" required>
        </div>
    </div>
     <!-- State -->
     <div class="row">
        <div class="col-md-2">
            <label>State</label>
        </div>
        <div class="col-md-10">
            <select id="cus_state_edit" onchange="getLocalGovt(this, 'cus_lga_edit')" class="form-control mb-3 aiz-selectpicker rounded-0" data-live-search="true" name="state_id" required>
                @foreach ($states as $state)
                    <option {{ $customer->state_id == $state->id ? 'selected' : '' }} value="{{ $state->id }}">{{ $state->name }}</option> 
                @endforeach
            </select>
        </div>
    </div>
     <!-- lGA-->
     <div class="row">
        <div class="col-md-2">
            <label>Town</label>
        </div>
        <div class="col-md-10">
            <select id="cus_lga_edit" class="form-control mb-3 rounded-0" data-live-search="true" name="local_govt_id" required>
                @foreach (optional(optional($customer)->state)->localGovts ?? [] as $local_govt)
                <option value="{{ $local_govt->id }}">{{ $local_govt->name }}</option>
                {{ $customer->local_govt_id == $local_govt->id ? 'selected' : '' }} 
                @endforeach
            </select>
        </div>
    </div>
    <!-- Address -->
    <div class="row">
        <div class="col-md-2">
            <label>Address</label>
        </div>
        <div class="col-md-10">
            <textarea id="cus_address" class="form-control mb-3 rounded-0" placeholder="Your Address" rows="2" name="address" required>{{ $customer->address }}</textarea>
        </div>
    </div>
    <!-- Save button -->
    <div class="form-group text-right">
        <button id="edit-customer-address" type="submit" class="btn btn-primary rounded-0 w-150px">Save</button>
    </div>
</form>