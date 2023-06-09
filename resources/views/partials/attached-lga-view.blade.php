<div class="col-lg-8 mx-auto">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6">({{ optional(optional($hub)->localGovts)->count() ?? 0 }}) Town under ({{ $hub->name }}) station <br>
                <small>Save On forwarding rate on Town or remove Town from Station</small></h5>
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
            @foreach (optional($hub)->localGovts ?? [] as $local_govt)
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