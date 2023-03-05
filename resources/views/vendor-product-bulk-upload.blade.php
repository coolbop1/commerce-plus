@extends('layouts.vendor')
@include('layouts.vendor-side-bar')
@include('layouts.vendor-top-bar')
{{-- @include('layouts.vendor-products-list-card')
@include('layouts.vendor-product-form') --}}
@section('body')
	<div class="aiz-main-wrapper">
        <div id="alert-modal" class="alert hide" role="alert"></div>
        @yield('vendor-side-bar-menu')
		<div class="aiz-content-wrapper">
            @yield('vendor-top-bar')
        <div class="aiz-main-content">
            <div class="px-15px px-lg-25px">
{{-- content start   --}}





<div class="aiz-titlebar mt-2 mb-4">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="h3">Bulk Products Upload</h1>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <table class="table aiz-table mb-0" style="font-size:14px; background-color: #cce5ff; border-color: #b8daff">
            <tr>
                <td>1. Download the skeleton file and fill it with data.:</td>
            </tr>
            <tr >
                <td>2. You can download the example file to understand how the data must be filled.:</td>
            </tr>
            <tr>
                <td>3. Once you have downloaded and filled the skeleton file, upload it in the form below and submit.:</td>
            </tr>
            <tr>
                <td>4. After uploading products you need to edit them and set products images and choices.</td>
            </tr>
        </table>
        <a href="/download/product_bulk_demo.xlsx" download><button class="btn btn-primary mt-2">Download CSV</button></a>
    </div>
</div>

{{-- <div class="card">
    <div class="card-body">
        <table class="table aiz-table mb-0" style="font-size:14px;background-color: #cce5ff;border-color: #b8daff">
            <tr>
                <td>1. Category and Brand should be in numerical id.:</td>
            </tr>
            <tr >
                <td>2. You can download the pdf to get Category and Brand id.:</td>
            </tr>
        </table>
        <a href="https://demo.activeitzone.com/ecommerce/seller/bulk-upload/download/category"><button class="btn btn-primary mt-2">Download Category</button></a>
        <a href="https://demo.activeitzone.com/ecommerce/seller/bulk-upload/download/brand"><button class="btn btn-primary mt-2">Download Brand</button></a>
    </div>
</div> --}}

<div class="card">
    <div class="card-header">
        <div class="col text-center text-md-left">
            <h5 class="mb-md-0 h6">Upload CSV File</h5>
        </div>
    </div>
    <div class="card-body">
        <form class="form-horizontal" onsubmit="return importData(document.getElementById('product_excel'), 'import-products')">
            <input type="hidden" name="_token" value="8CwIaLTJY0BToE52VONPoKv2jAM5fxUruYwbTHm2">                <div class="form-group row">
                <label class="col-md-2 col-form-label">CSV</label>
                <div class="col-sm-10">
                    <div class="custom-file">
                        <label class="custom-file-label">
                            <input id="product_excel" type="file" name="bulk_file" class="custom-file-input" required>
                            <span class="custom-file-name">Choose file</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group mb-0 text-right">
                <button id="import-products" type="submit" class="btn btn-primary">Upload CSV</button>
            </div>
        </form>
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