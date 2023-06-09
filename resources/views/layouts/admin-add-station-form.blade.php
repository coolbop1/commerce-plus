@section('add-hub-form')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">Station Information</h5>
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
                        <label class="col-md-3 col-form-label">Parent Hub</label>
                        <div class="col-md-9">
                            <select class="select2 form-control aiz-selectpicker" name="parent_id" data-toggle="select2" data-placeholder="Choose ..." data-live-search="true">
                                <option value="0">No Parent</option>
                                @php
                                    if($hub) {
                                        $hubs = $hubs->where('id', '<>', $hub->id);
                                    }
                                @endphp
                                @foreach ($hubs as $hub_)
                                    <option {{ optional($hub)->parent_id == $hub_->id ? 'selected' : ''   }} value="{{ $hub_->id }}">{{ $hub_->name }}</option>
                                @endforeach
                            </select>
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
                <script>
                    function populateLocalGovt(ele) {
                        let local_govt_input = document.getElementById('local_govt_input').value;
                        let local_govt_input_array = local_govt_input.split(',')[0] == '' ? [] : local_govt_input.split(',');
                        let new_input = ele.value;
                        if(new_input != 0)
                        local_govt_input_array.push(new_input);
                        //document.getElementById('local_govt_input').classList.remove('aiz-tag-input');
                        document.getElementById('local_govt_input').value = local_govt_input_array.join(',');
                        //document.getElementById('local_govt_input').classList.add('aiz-tag-input');
                        document.getElementById('lga_view').innerHTML = `<option value="">(Added : `+local_govt_input_array.length+`) Pick to remove</option>`;
                        local_govt_input_array.forEach(element => {
                            document.getElementById('lga_view').innerHTML += `<option>`+element+`</option>`;
                        });
                    }

                    function removeLast(ele) {
                        let local_govt_input = document.getElementById('local_govt_input').value;
                        let local_govt_input_array = local_govt_input.split(',')[0] == '' ? [] : local_govt_input.split(',');
                        //local_govt_input_array.pop();
                        const index = local_govt_input_array.indexOf(ele.value);
                        if (index > -1) { // only splice array when item is found
                            local_govt_input_array.splice(index, 1); // 2nd parameter means remove one item only
                        }
                        //document.getElementById('local_govt_input').classList.remove('aiz-tag-input');
                        document.getElementById('local_govt_input').value = local_govt_input_array.join(',');
                        //document.getElementById('local_govt_input').classList.add('aiz-tag-input');
                        document.getElementById('lga_view').innerHTML = `<option value="">(Added : `+local_govt_input_array.length+`) Pick to remove</option>`;
                        local_govt_input_array.forEach(element => {
                            document.getElementById('lga_view').innerHTML += `<option value="`+element+`">`+element+`</option>`;
                        });
                    }

                    function disableInputs() {
                        console.log("called disable");
                        $("#rate :input").attr("disabled", true);
                    }
                </script>



                <br>
                <div class="form-group row">
                    <div class="col-md-2">
                        <label>State</label>
                    </div>
                    <div class="col-md-10">
                        <select onchange="getLocalGovt(this, 'lga_view_selector', is_hub = true)" class="form-control mb-3 aiz-selectpicker rounded-0" data-live-search="true" >
                            @foreach ($states as $state)
                                <option value="{{ $state->id }}">{{ $state->name }}</option> 
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <div class="col-md-2">
                        <label>Town.</label>
                    </div>
                    <div class="col-md-10">
                        <select id="lga_view_selector" onchange="addLocalGovtToHub(this, {{ $hub->id }})" class="form-control mb-3 rounded-0" data-live-search="true" >
                            <option value={{ null }}>Pick to add</option>
                        </select>
                    </div>
                </div>

                


                {{-- <div class="form-group row">
                    <div class="col-md-6">
                        Select State to add all it's LGA to the list or just one LGA 
                        <select id="lga_view_selector" onchange="return populateLocalGovt(this)" class="select2 form-control " data-toggle="select2" data-placeholder="Choose ..." data-live-search="true">
                            <option value="0">Pick to add</option>
                            @php
                                if($hub) {
                                    $hubs = $hubs->where('id', '<>', $hub->id);
                                }
                            @endphp
                            @foreach ($states as $state)
                                @php
                                    $local_govts = $state->localGovts;
                                    $local_govts_names = $state->localGovts->pluck('name')->toarray();
                                    $local_govts_names = implode(',', $local_govts_names);
                                @endphp
                                <option  value="{{ $local_govts_names }}">{{ $state->name }}</option>
                                @foreach ($local_govts as $local_govt)
                                    <option style="color: gray" value="{{ $local_govt->name }}">{{ $local_govt->name }}</option>
                                @endforeach
                            @endforeach
                            
                        </select>
                    </div>
                    <div class="col-md-6">
                        @if ($hub)
                          @php
                              $val_ = $hub->localGovts->pluck('name')->toArray();
                              $val = implode(',', $val_);
                          @endphp
                        @else
                            @php
                                $val_ = [];
                                $val = '';
                            @endphp
                        @endif
                            <input readonly id="local_govt_input" type="hidden" value="{{ $val }}" class="form-control" placeholder="Station Local Govt."  name="local_govts"
                            placeholder="pick local govt from the drop down">
                            Select LGA to Remove from List 
                            <select id="lga_view" onchange="removeLast(this)" class="form-control"  >
                                <option value="">(Added : {{ count($val_) }}) Pick to remove</option>
                                @foreach ($val_ as $valName)
                                    <option value="{{ $valName }}">{{ $valName }}</option>
                                @endforeach
                            </select>

                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>

@if ($hub && optional($hub)->parent_id)
<div id="attached_lga_card" class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">({{ $hub->localGovts->count() }}) Town under ({{ $hub->name }}) station <br>
                    <small>Save On forwarding rate on LGA or remove LGA from Station</small></h5>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Towns</label>
                    <div class="col-md-3">
                        On Forwarding Rate
                    </div>
                    <div class="col-md-3">
                        Action
                    </div>
                    <div class="col-md-3">
                        <button onclick="detachLgaFromStation(`{{ implode(',', $hub->localGovts->pluck('id')->toArray()) }}`, this, {{ $hub->id }})" class="btn btn-danger">Delete All</button>
                    </div>
                </div>
                @foreach ($hub->localGovts as $local_govt)
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">{{ $local_govt->name }}</label>
                    <div class="col-md-3">
                        <input id="onforwarding_{{ $local_govt->id }}" value="{{ $local_govt->on_forwarding }}" placeholder="Enter on_forwarding Rate" name="small" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <button onclick="saveOnForwardingRate({{ $local_govt->id }}, this)" class="btn btn-primary">Save</button>
                    </div>
                    <div class="col-md-3">
                        <button onclick="detachLgaFromStation({{ $local_govt->id }}, this, {{ $hub->id }})" class="btn btn-danger "><i class="las la-trash"></i></button>
                    </div>
                </div>
                @endforeach


            </div>
        </div>
    </div>
</div>
@endif
@endsection