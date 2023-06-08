@section('add-hub-form')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">Hub Information</h5>
            </div>
            <div class="card-body">
                @if (isset($hub))
                <form class="form-horizontal" onsubmit="return submitForm(this, url = '/api/update-hub', 'POST', 'add-hub')">
                    <input type="hidden" value="{{ $hub->id }}"  name="hub_id"/>
                @else
                <form class="form-horizontal" onsubmit="return submitForm(this, url = '/api/create-hub', 'POST', 'add-hub')">
                @endif
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Name</label>
                        <div class="col-md-9">
                            <input value="{{ optional($hub)->name }}" type="text" placeholder="Name" id="name" name="name" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Phone Number</label>
                        <div class="col-md-9">
                            <input value="{{ optional($hub)->phone }}" type="tel" placeholder="Phone Number" id="phone" name="phone" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Small (0 - 2kg)</label>
                        <div class="col-md-7">
                            <input id="small_input" value="{{ optional($hub)->small }}" type="{{ optional($hub)->small && !is_numeric(optional($hub)->small) ? 'text' : 'number' }}" placeholder="Enter Rate" name="small" class="form-control" required>
                        </div>
                        <div class="col-md-2">
                            <a style="color: white" onclick="if(this.innerText == 'Formula'){this.innerText = 'Fixed'; document.getElementById('small_input').type = 'text'; document.getElementById('small_input').placeholder = 'Enter fomula (Valid variables: kg, km)'; } else { this.innerText = 'Formula'; document.getElementById('small_input').type = 'number'; document.getElementById('small_input').placeholder = 'Enter Rate'; }" class="btn btn-primary">{{is_null($hub) || optional($hub)->small && is_numeric(optional($hub)->small) ? 'Formula' : 'Fixed' }}</a>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Medium (2.1 - 7kg)</label>
                        <div class="col-md-7">
                            <input id="medium_input" value="{{ optional($hub)->medium }}" type="{{ optional($hub)->medium && !is_numeric(optional($hub)->medium) ? 'text' : 'number' }}" placeholder="Enter Rate" name="medium" class="form-control" required>
                        </div>
                        <div class="col-md-2">
                            <a style="color: white" onclick="if(this.innerText == 'Formula'){this.innerText = 'Fixed'; document.getElementById('medium_input').type = 'text'; document.getElementById('medium_input').placeholder = 'Enter fomula (Valid variables: kg, km)'; } else { this.innerText = 'Formula'; document.getElementById('medium_input').type = 'number'; document.getElementById('medium_input').placeholder = 'Enter Rate'; }" class="btn btn-primary">{{is_null($hub) || optional($hub)->medium && is_numeric(optional($hub)->medium) ? 'Formula' : 'Fixed' }}</a>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Large (7.1 - 10kg)</label>
                        <div class="col-md-7">
                            <input id="large_input" value="{{ optional($hub)->large }}" type="{{ optional($hub)->large && !is_numeric(optional($hub)->large) ? 'text' : 'number' }}" placeholder="Enter Rate" name="large" class="form-control" required>
                        </div>
                        <div class="col-md-2">
                            <a style="color: white" onclick="if(this.innerText == 'Formula'){this.innerText = 'Fixed'; document.getElementById('large_input').type = 'text'; document.getElementById('large_input').placeholder = 'Enter fomula (Valid variables: kg, km)'; } else { this.innerText = 'Formula'; document.getElementById('large_input').type = 'number'; document.getElementById('large_input').placeholder = 'Enter Rate'; }" class="btn btn-primary">{{is_null($hub) || optional($hub)->large && is_numeric(optional($hub)->large) ? 'Formula' : 'Fixed' }}</a>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Heavy (> than 10kg)</label>
                        <div class="col-md-7">
                            <input id="heavy_input" value="{{ optional($hub)->heavy }}" type="{{ optional($hub)->heavy && !is_numeric(optional($hub)->heavy) ? 'text' : 'number' }}" placeholder="Enter Rate" name="heavy" class="form-control" required>
                        </div>
                        <div class="col-md-2">
                            <a style="color: white" onclick="if(this.innerText == 'Formula'){this.innerText = 'Fixed'; document.getElementById('heavy_input').type = 'text'; document.getElementById('heavy_input').placeholder = 'Enter fomula (Valid variables: kg, km)'; } else { this.innerText = 'Formula'; document.getElementById('heavy_input').type = 'number'; document.getElementById('heavy_input').placeholder = 'Enter Rate'; }" class="btn btn-primary">{{is_null($hub) || optional($hub)->heavy && is_numeric(optional($hub)->heavy) ? 'Formula' : 'Fixed' }}</a>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Delivery Period (min days)</label>
                        <div class="col-md-9">
                            <input value="{{ optional($hub)->sla_min }}" type="number" placeholder="Enter Rate" name="sla_min" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Delivery Period (max days)</label>
                        <div class="col-md-9">
                            <input value="{{ optional($hub)->sla_max }}" type="number" placeholder="Enter Rate" name="sla_max" class="form-control" required>
                        </div>
                    </div>
                    

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Address</label>
                        <div class="col-md-9">
                            <textarea required name="address" rows="5" class="form-control">{{ optional($hub)->address }}</textarea>
                        </div>
                    </div>

                    
                    <div class="form-group mb-0 text-right">
                        <button  id="add-hub" type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@if ($hub )
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">({{ $hub->name }})Hub to Other Hub Rate</h5>
            </div>
            <div class="card-body">
                @php
                    $hub_connect = App\Models\HubConnect::where('from', $hub->id)->get();
                    $hubs = $hubs->where('id', '<>', $hub->id);
                @endphp
                @foreach ($hubs as $hub_)
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">{{ $hub_->name }}</label>
                    <div class="col-md-3">
                        @php
                            $the_rate = $hub_connect->where('from', $hub->id)->where('to', $hub_->id)->first()
                        @endphp
                        <input id="connect_rate_{{ $hub_->id }}" value="{{ optional($the_rate)->rate }}" placeholder="Enter Rate" name="small" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <button from-id="{{ $hub->id }}" onclick="saveConnectRate({{ $hub_->id }}, this)" class="btn btn-primary">Save</button>
                    </div>
                    <div class="col-md-3">
                        <button from-id="{{ $hub->id }}" onclick="saveConnectRate({{ $hub_->id }}, this, true)" class="btn btn-primary">Save Both</button>
                    </div>
                </div>
                @endforeach


            </div>
        </div>
    </div>
</div>
    
@endif
@endsection