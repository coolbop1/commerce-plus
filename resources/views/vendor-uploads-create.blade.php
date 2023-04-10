@extends('layouts.vendor')
@include('layouts.vendor-side-bar')
@include('layouts.vendor-top-bar')
@include('layouts.vendor-uploads-card')
@section('body')
	<div class="aiz-main-wrapper">
        <div id="alert-modal" class="alert hide" role="alert"></div>
        @yield('vendor-side-bar-menu')
		<div class="aiz-content-wrapper">
            @yield('vendor-top-bar')
        <div class="aiz-main-content">
            <div class="px-15px px-lg-25px">
{{-- content start   --}}



<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="row align-items-center">
		<div class="col-md-6">
			<h1 class="h3">Upload New File</h1>
		</div>
		<div class="col-md-6 text-md-right">
			<a href="/seller/uploads" class="btn btn-link text-reset">
				<i class="las la-angle-left"></i>
				<span>Back to uploaded files</span>
			</a>
		</div>
	</div>
</div>



<div class="card">
    <div class="card-header">
        <h5 class="mb-0 h6">Drag &amp; drop your files</h5>
    </div>
    <div class="card-body">
    	<div id="aiz-upload-files" class="h-420px" style="min-height: 65vh">

    		
    		
            <div class="uppy-Root uppy-Dashboard uppy-Dashboard--animateOpenClose uppy-size--md uppy-size--lg uppy-Dashboard--isInnerWrapVisible masked" style="position: relative"  aria-hidden="false" aria-label="File Uploader">
                <input onchange="return upload(this, 'uploading_loader_page')"  type="file" name="files[]" multiple="" style="z-index: 1500;">
                <div class="uppy-Dashboard-overlay" tabindex="-1"></div>
                <div class="uppy-Dashboard-inner" style="width: 750px; height: 550px;">
                    <div class="uppy-Dashboard-innerWrap">
                        <div class="uppy-Dashboard-dropFilesHereHint">Drop your files here</div>
                        <div class="uppy-DashboardAddFiles">
                           <span style="font-size: 30px" id="uploading_loader_page"></span>
                            <div class="uppy-DashboardTabs"><div class="uppy-Dashboard-dropFilesTitle">Drop files here, paste or <button type="button" class="uppy-u-reset uppy-Dashboard-browse">Browse</button></div></div>
                            <div class="uppy-DashboardAddFiles-info"></div>
                        </div>
                        <span></span><span></span><span></span>
                        <div class="uppy-Dashboard-progressindicators">
                            <div class="uppy-StatusBar is-waiting" aria-hidden="true">
                                <div class="uppy-StatusBar-progress " role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="width: 0%;"></div>
                                <div class="uppy-StatusBar-actions"></div>
                            </div>
                            <div class="uppy uppy-Informer" aria-hidden="true"><p role="alert"> </p></div>
                        </div>
                    </div>
                </div>
            </div>



    	</div>
    </div>
</div>



























{{--  content end --}}

</div>
<div class="bg-white text-center py-3 px-15px px-lg-25px mt-auto border-sm-top">
    <p class="mb-0">&copy; Commerce Plus <script> document.write((new Date).getFullYear()) </script></p>
</div>
</div>
</div>
</div>
@endsection





