@section('admin-hubs-list')
<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="h3">All Hubs & Stations</h1>
        </div>
        <div class="col-md-6 text-md-right">
            <a href="/admin/hub/create" class="btn btn-primary">
                <span>Add New Hub</span>
            </a>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header d-block d-md-flex">
        <h5 class="mb-0 h6">Hubs & Stations</h5>
        <form class="" id="sort_categories" action="" method="GET">
            <div class="box-inline pad-rgt pull-left">
                <div class="" style="min-width: 200px;">
                    <input type="text" class="form-control" id="search" name="search" placeholder="Type name &amp; Enter">
                </div>
            </div>
        </form>
    </div>
    <div class="card-body">
        <table class="table aiz-table mb-0">
            <thead>
                <tr>
                    <th data-breakpoints="lg">#</th>
                    <th>Name</th>
                    <th data-breakpoints="lg">Hub/Station</th>
                    <th width="10%" class="text-right">Options</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $num = 0;
                @endphp
                @foreach ($hubs as $hub)
                @php
                    $num += 1;
                    $stations = App\Models\Hub::where('parent_id', $hub->id)->get();
                @endphp
                <tr>
                    <td>{{ $num }}</td>
                    <td>{{ '(Hub)'.$hub->name }}</td>
                    
                    <td>
                        Hub
                    </td>
                    <td class="text-right">
                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="/admin/hubs/edit/{{ $hub->id }}" title="Edit">
                                <i class="las la-edit"></i>
                            </a>
                            <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="/admin/hubs/destroy/{{ $hub->id }}" title="Delete">
                                <i class="las la-trash"></i>
                            </a>
                    </td>
                </tr>
                @foreach ($stations as $station)
                @php
                    $num += 1;
                @endphp
                    <tr>
                        <td>{{ $num }}</td>
                        <td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;{{ ' (Station)'.$station->name }}</td>
                        
                        <td>
                            Station
                        </td>
                        <td class="text-right">
                                <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="/admin/hubs/edit/{{ $station->id }}" title="Edit">
                                    <i class="las la-edit"></i>
                                </a>
                                <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="/admin/hubs/destroy/{{ $station->id }}" title="Delete">
                                    <i class="las la-trash"></i>
                                </a>
                        </td>
                    </tr>
                @endforeach

                    
                @endforeach
                                    
                                    
            </tbody>
        </table>
    </div>
</div>
@endsection