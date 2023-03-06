<div class="modal fade" id="aizUploaderModal" data-backdrop="static" role="dialog" aria-hidden="true" >
	<div class="modal-dialog modal-adaptive" role="document">
		<div class="modal-content h-100">
			<div class="modal-header pb-0 bg-light">
				<div class="uppy-modal-nav">
					<ul class="nav nav-tabs border-0">
						<li class="nav-item">
							<a class="nav-link active font-weight-medium text-dark" data-toggle="tab" href="#aiz-select-file">Select File</a>
						</li>
						<li class="nav-item">
							<a class="nav-link font-weight-medium text-dark" data-toggle="tab" href="#aiz-upload-new">Upload New</a>
						</li>
					</ul>
				</div>
				<button onclick="closeFileselctor()" type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"></span>
				</button>
			</div>
			<div class="modal-body">
				<div class="tab-content h-100">
					<div class="tab-pane active h-100" id="aiz-select-file">
						<div class="aiz-uploader-filter pt-1 pb-3 border-bottom mb-4">
							<div class="row align-items-center gutters-5 gutters-md-10 position-relative">
								<div class="col-xl-2 col-md-3 col-5">
									<div class="">
										<!-- Input -->
										<select class="form-control form-control-xs aiz-selectpicker" name="aiz-uploader-sort">
											<option value="newest" selected>Sort by newest</option>
											<option value="oldest">Sort by oldest</option>
											<option value="smallest">Sort by smallest</option>
											<option value="largest">Sort by largest</option>
										</select>
										<!-- End Input -->
									</div>
								</div>
								<div class="col-md-3 col-5">
									<div class="custom-control custom-radio">
										<input type="checkbox" class="custom-control-input" name="aiz-show-selected" id="aiz-show-selected" name="stylishRadio">
										<label class="custom-control-label" for="aiz-show-selected">
										Selected Only
										</label>
									</div>
								</div>
								<div class="col-md-4 col-xl-3 ml-auto mr-0 col-2 position-static">
									<div class="aiz-uploader-search text-right">
										<input type="text" class="form-control form-control-xs" name="aiz-uploader-search" placeholder="Search your files">
										<i class="search-icon d-md-none"><span></span></i>
									</div>
								</div>
							</div>
						</div>
						<div class="aiz-uploader-all clearfix c-scrollbar-light">
                            
							@if (!isset($files) || $files->count() == 0)
                                <div class="align-items-center d-flex h-100 justify-content-center w-100">
                                    <div class="text-center">
                                        <h3>No files found</h3>
                                    </div>
                                </div>
                            @else
                                @foreach ($files as $file)
                                
                                    @php
                                        $name = str_replace('uploads/', '', $file->file_path);
                                        $name_array = explode('.', $name);
                                    @endphp
                                    @if (!in_array($name_array[1], ['jpg', 'jpeg', 'png']))
                                        @continue
                                    @endif
                                    <div class="aiz-file-box-wrap" data-value="{{ $file->id }}" data-preview="{{ $file->file_path }}" onclick="imagePicked(this)" aria-hidden="false" data-selected="false">
                                        <div class="aiz-file-box">
                                            <div class="card card-file aiz-uploader-select" title="{{ $name_array[0] }}" data-value-last="{{ $file->id }}">
                                                <div class="card-file-thumb">
                                                    <img src="/{{ $file->file_path }}" class="img-fit">
                                                </div>
                                                <div class="card-body">
                                                    <h6 class="d-flex">
                                                        <span class="text-truncate title">{{ $name_array[0] }}</span>
                                                        <span class="ext flex-shrink-0">.{{ $name_array[1] }}</span>
                                                    </h6>
                                                    {{-- <p>15 KB</p> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            
						</div>
					</div>

					<div class="tab-pane h-100" id="aiz-upload-new">
						<div id="aiz-upload-files" class="h-100">
                            
						<div class="uppy-Root uppy-Dashboard uppy-Dashboard--animateOpenClose uppy-size--md uppy-Dashboard--isInnerWrapVisible masked" style="position: relative" aria-hidden="false" aria-label="File Uploader">
                            <input  type="file" name="files[]" multiple="" style="z-index: 1500;">
                            <div class="uppy-Dashboard-overlay" tabindex="-1">
                                </div><div class="uppy-Dashboard-inner" style="width: 750px; height: 550px;">
                                    <div class="uppy-Dashboard-innerWrap">
                                        <div class="uppy-Dashboard-dropFilesHereHint">Drop your files here</div>
                                        <div class="uppy-DashboardAddFiles">
                                            
                                            <div class="uppy-DashboardTabs">
                                                <div class="uppy-Dashboard-dropFilesTitle">Drop files here, paste or <button type="button" class="uppy-u-reset uppy-Dashboard-browse">Browse</button>
                                                </div>
                                            </div>
                                            <div class="uppy-DashboardAddFiles-info">
                                            </div>
                                        </div>
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                            <div class="uppy-Dashboard-progressindicators">
                                                <div class="uppy-StatusBar is-waiting show" aria-hidden="false">
                                                    <div class="uppy-StatusBar-progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="70" style="width: 70%;">
                                                    </div>
                                                    <div class="uppy-StatusBar-actions">
                                                        </div>
                                                    </div>
                                                    <div class="uppy uppy-Informer" aria-hidden="true"><p role="alert"> </p></div></div>
                                        </div></div></div>
                                                </div>
					</div>
				</div>
			</div>
			<div class="modal-footer justify-content-between bg-light">
				<div class="flex-grow-1 overflow-hidden d-flex">
					<div class="">
						<div class="aiz-uploader-selected"><span id="file-select-counter">0</span> File selected</div>
						<button onclick="clearSelected()" type="button" class="btn-link btn btn-sm p-0 aiz-uploader-selected-clear">Clear</button>
					</div>
					<div class="mb-0 ml-3">
						<button type="button" class="btn btn-sm btn-primary" id="uploader_prev_btn">Prev</button>
						<button type="button" class="btn btn-sm btn-primary" id="uploader_next_btn">Next</button>
					</div>
				</div>
				<button onclick="addSelectedFiles()" type="button" class="btn btn-sm btn-primary" data-toggle="aizUploaderAddSelected">Add Files</button>
			</div>
		</div>
	</div>
</div>
<div id="modal-backdrop"></div>
