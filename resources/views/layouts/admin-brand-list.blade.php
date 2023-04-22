@section('admin-brand-list')
<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="align-items-center">
		<h1 class="h3">All Brands</h1>
	</div>
</div>

<div class="row">
	<div class=" col-lg-7 ">
		<div class="card">
		    <div class="card-header row gutters-5">
				<div class="col text-center text-md-left">
					<h5 class="mb-md-0 h6">Brands</h5>
				</div>
				<div class="col-md-4">
					<form class="" id="sort_brands" action="" method="GET">
						<div class="input-group input-group-sm">
					  		<input type="text" class="form-control" id="search" name="search" placeholder="Type name &amp; Enter">
						</div>
					</form>
				</div>
		    </div>
		    <div class="card-body">
		        <table class="table aiz-table mb-0">
		            <thead>
		                <tr>
		                    <th>#</th>
		                    <th>Name</th>
		                    <th>Logo</th>
		                    <th class="text-right">Options</th>
		                </tr>
		            </thead>
		            <tbody>
                        @foreach ($brands ?? [] as $key => $brand )
                            @php
                                $key++;
                            @endphp
                             <tr>
		                        <td>{{ $key }}</td>
		                        <td>{{ $brand->name }}</td>
								<td>
                                    @if ($brand->logo)
                                        <img src="/{{ $brand->logo }}" alt="Brand" class="h-50px">
                                    @endif
		                        </td>
		                        <td class="text-right">
                                    <a href="/admin/brands/edit/{{ $brand->id }}" class="btn btn-soft-primary btn-icon btn-circle btn-sm" title="Edit">
                                        <i class="las la-edit"></i>
                                    </a>
                                        <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="/admin/brands/destroy/{{ $brand->id }}" title="Delete">
                                        <i class="las la-trash"></i>
                                    </a>
								</td>
		                    </tr>
                        @endforeach
		            </tbody>
		        </table>
		        <div class="aiz-pagination">
    {{-- <nav>
        <ul class="pagination">
            <li class="page-item disabled" aria-disabled="true" aria-label="« Previous">
                <span class="page-link" aria-hidden="true">&lsaquo;</span>
            </li>
             <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
            <li class="page-item"><a class="page-link" href="https://demo.activeitzone.com/ecommerce/admin/brands?page=2">2</a></li>
            <li class="page-item"><a class="page-link" href="https://demo.activeitzone.com/ecommerce/admin/brands?page=3">3</a></li>
            <li class="page-item"><a class="page-link" href="https://demo.activeitzone.com/ecommerce/admin/brands?page=4">4</a></li>
            <li class="page-item"><a class="page-link" href="https://demo.activeitzone.com/ecommerce/admin/brands?page=5">5</a></li>
            <li class="page-item"><a class="page-link" href="https://demo.activeitzone.com/ecommerce/admin/brands?page=6">6</a></li>
            <li class="page-item"><a class="page-link" href="https://demo.activeitzone.com/ecommerce/admin/brands?page=7">7</a></li>
                                                                        
            
            <li class="page-item">
                <a class="page-link" href="https://demo.activeitzone.com/ecommerce/admin/brands?page=2" rel="next" aria-label="Next »">&rsaquo;</a>
            </li>
        </ul>
    </nav> --}}

            	</div>
		    </div>
		</div>
	</div>
			<div class="col-md-5">
			<div class="card">
				<div class="card-header">
					<h5 class="mb-0 h6">Add New Brand</h5>
				</div>
				<div class="card-body">
					<form onsubmit="return submitForm(this, url = '/api/create-brand', 'POST', 'add-brand')">
						<div class="form-group mb-3">
							<label for="name">Name</label>
							<input type="text" placeholder="Name" name="name" class="form-control" required>
						</div>
						<div class="form-group mb-3">
							<label for="name">Logo <small>(120x80)</small></label>
							<div class="input-group" onclick="openFileModal(this, 'brand_logo_input')" data-type="image">
								<div class="input-group-prepend">
										<div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
								</div>
								<div class="form-control file-amount">Choose file</div>
								<input id="brand_logo_input" type="hidden" name="logo" class="selected-files">
							</div>
							<div id="preview_brand_logo_input" class="file-preview box sm">
							</div>
						</div>
						<div class="form-group mb-3 text-right">
							<button id="add-brand" type="submit" class="btn btn-primary">Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection













@section('admin-edit-brand')
<div class="aiz-titlebar text-left mt-2 mb-3">
    <h5 class="mb-0 h6">Brand Information</h5>
</div>

<div class="col-lg-8 mx-auto">
    <div class="card">
        <div class="card-body p-0">
            <form class="p-4" onsubmit="return submitForm(this, url = '/api/create-brand', 'POST', 'add-brand')">
                <input type="hidden" name="id" value="{{ $brand->id }}">              <div class="form-group row">
                    <label class="col-sm-3 col-from-label" for="name">Name </label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="Name" id="name" name="name" value="{{ $brand->name }}" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="signinSrEmail">Logo <small>(120x80)</small></label>
                    <div class="col-md-9">
                        <div class="input-group" onclick="openFileModal(this, 'brand_logo_input')" data-type="image">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                            </div>
                            <div class="form-control file-amount">Choose file</div>
                            <input id="brand_logo_input" type="hidden" name="logo" value="{{ $brand->logo }}" class="selected-files">
                        </div>
                        <div id="preview_brand_logo_input" class="file-preview box sm">
                            @if (optional($brand)->logo)
                                <div class="d-flex justify-content-between align-items-center mt-2 file-preview-item">
                                    <div class="align-items-center align-self-stretch d-flex justify-content-center thumb">
                                        <img src="/{{ optional($brand)->logo }}" class="img-fit">
                                    </div>
                                    <div class="col body"><h6 class="d-flex"><span class="text-truncate title">{{ '' }}</span><span class="ext flex-shrink-0">{{ '' }}</span></h6><p></p></div>
                                    <div class="remove"><button class="btn btn-sm btn-link remove-attachment" type="button"><i class="la la-close"></i></button></div>
                                </div>
                                @endif
                        </div>
                    </div>
                </div>
                <div class="form-group mb-0 text-right">
                    <button id="add-brand" type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection