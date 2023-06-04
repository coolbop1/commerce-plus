@section('add-hub-form')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">{{ optional($hub)->parent_id ? 'Station Information' : 'Hub Information' }}</h5>
            </div>
            <div class="card-body">
                @php
                    $subCategoryId = null;
                    $categoryId = null;
                    $sectionId = null;
                    $category = null;
                @endphp
                @if (isset($category_id))
                    @if (is_numeric($category_id))
                        @php
                            $category = $categories->where('id', $category_id)->first();
                        @endphp
                    @else
                        @php
                            $cat_ids =  explode('_',$category_id);
                            $categoryId = $cat_ids[0];
                            $cat = $categories->where('id', $categoryId)->first();
                            $subCategoryId = $cat_ids[1];
                            $sub = $cat->subCategories()->where('id', $subCategoryId)->first();
                            $sectionId = $cat_ids[2] ?? null;
                            if ($sectionId) {
                                $category = $sub->sections()->where('id', $sectionId)->first();
                            } else {
                                $category = $sub;
                            }
                        @endphp
                        
                    @endif
                
                    
                @endif
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
                            <select onchange="if(this.value > 0) {document.getElementById('local_gov').classList.remove('hide'); disableInputs(); document.getElementById('rate').classList.remove('hide');  document.getElementById('rate').classList.add('hide') } else { document.getElementById('local_gov').classList.remove('hide'); document.getElementById('local_gov').classList.add('hide'); document.getElementById('rate').classList.remove('hide'); $('#local_gov :input').attr('disabled', true);}" class="select2 form-control aiz-selectpicker" name="parent_id" data-toggle="select2" data-placeholder="Choose ..." data-live-search="true">
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
                    <div  id="local_gov" class="{{ optional($hub)->parent_id ? '' : 'hide' }}">
                    <div class="form-group row">
                        <div class="col-md-6">
                            Select State to add all it's LGA to the list or just one LGA 
                            <select onchange="return populateLocalGovt(this)" class="select2 form-control aiz-selectpicker" data-toggle="select2" data-placeholder="Choose ..." data-live-search="true">
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
                            {{-- <input type="text" value="{{ $val }}" class="form-control aiz-tag-input" name="local_govts"
                                placeholder="Type and hit enter to add a tag"> --}}
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
                        {{-- <div class="col-md-1">
                            <a onclick="return removeLast()" class="btn btn-primary"><i style="color: white" class="la la-backspace"></i></a>
                        </div> --}}
                    </div>

                    </div>
                    @if (is_null($hub) || is_null(optional($hub)->parent_id) || optional($hub)->parent_id == 0)
                    <div id="rate">
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
                    </div>
                    @endif
                    

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
@if ($hub && optional($hub)->parent_id == null)
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