@extends('layouts.app')
@include('layouts.brand-section')
@section('content')
<!-- Breadcrumb -->
<section class="mb-4 pt-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 text-lg-left text-center">
                <h1 class="fw-700 fs-20 fs-md-24 text-dark">All Brands</h1>
            </div>
            <div class="col-lg-6">
                <ul class="breadcrumb justify-content-center justify-content-lg-end bg-transparent p-0">
                    <li class="breadcrumb-item has-transition opacity-60 hov-opacity-100">
                        <a class="text-reset" href="/">Home</a>
                    </li>
                    <li class="text-dark fw-600 breadcrumb-item">
                        "All Brands"
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
@yield('brand-section')
@endsection