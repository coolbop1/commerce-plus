@section('uploads-card')
<div class="card">
    <form id="sort_uploads" action="">
        <div class="card-header row gutters-5">
            <div class="col">
                <h5 class="mb-0 h6">All files</h5>
            </div>
			<div class="dropdown mb-2 mb-md-0">
                <button class="btn border dropdown-toggle" type="button" data-toggle="dropdown">
                    Bulk Action
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a id="bulk-delete-button"  class="dropdown-item confirm-alert" href="javascript:void(0)" data-href="/seller/uploads/delete-multiple" data-target="#delete-modal"> Delete selection</a>
                </div>
            </div>
            <div class="col-md-3 ml-auto mr-0">
                <select class="form-control form-control-xs aiz-selectpicker" name="sort" onchange="sort_uploads()">
                    <option value="newest" >Sort by newest</option>
                    <option value="oldest" >Sort by oldest</option>
                    <option value="smallest" >Sort by smallest</option>
                    <option value="largest" >Sort by largest</option>
                </select>
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control form-control-xs" name="search" placeholder="Search your files" value="">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    
		<div class="card-body">
			<div class="form-group">
				<div class="aiz-checkbox-inline">
					<label class="aiz-checkbox">
						Select All
						<input onchange="selectAllFile(this)" type="checkbox" class="check-all">
						<span class="aiz-square-check"></span>
					</label>
				</div>
			</div>

			<div class="row gutters-5">

                @foreach ($uploads as $temporaryFiles)
                @php
                    $name = str_replace('uploads/', '', $temporaryFiles->file_path);
                    $name_array = explode('.', $name);
                @endphp
                    <div class="col-auto w-140px w-lg-220px">
                        <div class="aiz-file-box">
                            <div class="dropdown-file" >
                                <a class="dropdown-link" data-toggle="dropdown">
                                    <i class="la la-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="/{{ $temporaryFiles->file_path }}" target="_blank" download="comerce_plus_{{ $name_array[0] }}.{{ $name_array[1] }}" class="dropdown-item">
                                        <i class="la la-download mr-2"></i>
                                        <span>Download</span>
                                    </a>
                                    <a href="javascript:void(0)" class="dropdown-item" onclick="copyUrl(this)" data-url="{{ $temporaryFiles->file_path }}">
                                        <i class="las la-clipboard mr-2"></i>
                                        <span>Copy Link</span>
                                    </a>
                                    <a href="javascript:void(0)" class="dropdown-item confirm-alert" data-href="/seller/uploads/destroy/{{ $temporaryFiles->id }}" data-target="#delete-modal">
                                        <i class="las la-trash mr-2"></i>
                                        <span>Delete</span>
                                    </a>
                                </div>
                            </div>

                            <div class="select-box">
                                <div class="aiz-checkbox-inline">
                                    <label class="aiz-checkbox">
                                        <input type="checkbox" onclick="checkOne(this)"  class="check-one" name="id[]" value="{{ $temporaryFiles->id }}">
                                        <span class="aiz-square-check "></span>
                                    </label>
                                </div>
                            </div>

                            <div class="card card-file aiz-uploader-select c-default" title="{{ $name_array[0] }}.{{ $name_array[1] }}">
                                <div class="card-file-thumb">
                                    <img src="/{{ $temporaryFiles->file_path }}" class="img-fit">
                                </div>
                                <div class="card-body">
                                    <h6 class="d-flex">
                                        <span class="text-truncate title">{{ $name_array[0] }}</span>
                                        <span class="ext">.{{ $name_array[1] }}</span>
                                    </h6>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


                




			</div>
			<div class="aiz-pagination mt-3">
				
			</div>
		</div>
	</form>
</div>
@endsection