@section('admin-category-list')
<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="h3">All Categories</h1>
        </div>
        <div class="col-md-6 text-md-right">
            <a href="/admin/categories/create" class="btn btn-primary">
                <span>Add New category</span>
            </a>
        </div>
    </div>
</div>






<div class="card">
    <div class="card-header d-block d-md-flex">
        <h5 class="mb-0 h6">Categories</h5>
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
                    <th data-breakpoints="lg">Parent Category</th>
                    <th data-breakpoints="lg">Level</th>
                    <th data-breakpoints="lg">Banner</th>
                    <th data-breakpoints="lg">Icon</th>
                    <th data-breakpoints="lg">Featured</th>
                    <th width="10%" class="text-right">Options</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $num = 0;
                @endphp
                @foreach ($categories as $category)
                @php
                    $num += 1;
                @endphp
                <tr>
                    <td>{{ $num }}</td>
                    <td>{{ $category->name }}</td>
                    <td>—</td>
                    <td>0</td>
                    <td> <img src="/{{ $category->banner }}" alt="Banner" class="h-50px">
                                                </td>
                    <td>
                                                        <span class="avatar avatar-square avatar-xs">
                                <img src="/{{ $category->icon }}" alt="Icon">
                            </span>
                                                </td>
                    
                    <td>
                        <label class="aiz-switch aiz-switch-success mb-0">
                            <input type="checkbox" onchange="update_featured(this)" value="{{ $category->id }}" {{ $category->verified ? 'checked' : ''}} >
                            <span></span>
                        </label>
                    </td>
                    <td class="text-right">
                                                        <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="/admin/categories/edit/{{ $category->id }}" title="Edit">
                                <i class="las la-edit"></i>
                            </a>
                                                                                    <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="/admin/categories/destroy/{{ $category->id }}" title="Delete">
                                <i class="las la-trash"></i>
                            </a>
                    </td>
                </tr>
                @foreach ($category->subCategories as $sub_category)
                @php
                    $num += 1;
                @endphp
                <tr>
                    <td>{{ $num }}</td>
                    <td>{{ $sub_category->name }}</td>
                    <td>{{ $category->name }}</td>
                    <td> Sub Category</td>
                    <td>
                                                        <img src="/{{ $sub_category->banner }}" alt="Banner" class="h-50px">
                                                </td>
                    <td>
                                                        <span class="avatar avatar-square avatar-xs">
                                <img src="/{{ $sub_category->icon }}" alt="Icon">
                            </span>
                                                </td>
                    
                    <td>
                        <label class="aiz-switch aiz-switch-success mb-0">
                            <input type="checkbox" onchange="update_featured(this)" value="{{ $category->id }}_{{ $sub_category->id }}" {{ $sub_category->verified ? 'checked' : '' }}>
                            <span></span>
                        </label>
                    </td>
                    <td class="text-right">
                                                        <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="/admin/categories/edit/{{ $category->id }}_{{ $sub_category->id }}" title="Edit">
                                <i class="las la-edit"></i>
                            </a>
                                                                                    <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="/admin/categories/destroy/{{ $category->id }}_{{ $sub_category->id }}" title="Delete">
                                <i class="las la-trash"></i>
                            </a>
                    </td>
                </tr>
                @foreach ($sub_category->sections as $section)
                @php
                    $num += 1;
                @endphp
                <tr>
                    <td>{{ $num }}</td>
                    <td>{{ $section->name }}</td>
                    <td>{{ $sub_category->name }}</td>
                    <td> Section</td>
                    <td>
                                                        <img src="/{{ $section->banner }}" alt="Banner" class="h-50px">
                                                </td>
                    <td>
                                                        <span class="avatar avatar-square avatar-xs">
                                <img src="/{{ $section->icon }}" alt="Icon">
                            </span>
                                                </td>
                    
                    <td>
                        <label class="aiz-switch aiz-switch-success mb-0">
                            <input type="checkbox" onchange="update_featured(this)" value="{{ $category->id }}_{{ $sub_category->id }}_{{ $section->id }}" {{ $section->verified ? 'checked' : '' }}>
                            <span></span>
                        </label>
                    </td>
                    <td class="text-right">
                                                        <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="/admin/categories/edit/{{ $category->id }}_{{ $sub_category->id }}_{{ $section->id }}" title="Edit">
                                <i class="las la-edit"></i>
                            </a>
                                                                                    <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="/admin/categories/destroy/{{ $category->id }}_{{ $sub_category->id }}_{{ $section->id }}" title="Delete">
                                <i class="las la-trash"></i>
                            </a>
                    </td>
                </tr>
                    
                @endforeach
                    
                @endforeach
                    
                @endforeach
                                    
                                    
            </tbody>
        </table>
    </div>
</div>
@endsection