@section('admin-town-list')
<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="h3">Towns</h1>
        </div>
        <div class="col-md-6 text-md-right">
            
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header d-block d-md-flex">
        <div class="mb-0 ">
            <table>
                <tr>
                    <td>
                        <input type="text" class="form-control" id="new_town" name="new_town" placeholder="Town Name">
                    </td>
                    <td>
                        <a onclick="return addNewTown()" class="btn btn-primary">
                            <span>Add Town</span>
                        </a>
                    </td>
                </tr>
            </table>
    </div>
    <div class="box-inline pad-rgt pull-left">
        <div class="" style="min-width: 200px;">
            <select id="town_list_state" onchange="getLocalGovt(this, 'town_list')" 
                class="form-control mb-3 aiz-selectpicker rounded-0" data-live-search="true" name="state_id" required>
                @foreach ($states as $state)
                    <option value="{{ $state->id }}" >{{ $state->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    </div>
    <div class="card-body">
        <table class="table aiz-table mb-0">
            <thead>
                <tr>
                    <th data-breakpoints="lg">#</th>
                    <th>Name</th>
                    <th width="10%" class="text-right">Options</th>
                </tr>
            </thead>
            <tbody id="town_list">
                @php
                    $num = 0;
                @endphp
                @foreach ($states->first()->localGovts as $local_govt)
                @php
                    $num += 1;
                @endphp
                <tr>
                    <td>{{ $num }}</td>
                    <td><input style="padding: 5px; border-radius: 5px;{{ $local_govt->hub_id ? 'border:green 3px solid' : '' }}" id="town_name_input_{{ $local_govt->id }}" value="{{ $local_govt->name }}" ></td>
                    
                    <td class="text-right">
                            <a onclick="return addNewTown({{ $local_govt->id }})" class="btn btn-soft-primary btn-icon btn-circle btn-sm" title="Edit">
                                <i class="las la-edit"></i>
                            </a>
                            <a data-onclick="return deleteTown({{ $local_govt->id }})" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-deletes" data-href="/admin/town/destroy/{{ $local_govt->id }}" title="Delete">
                                <i class="las la-trash"></i>
                            </a>
                    </td>
                </tr>
                @endforeach
                                    
                                    
            </tbody>
        </table>
    </div>
</div>
@endsection