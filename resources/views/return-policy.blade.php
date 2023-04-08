@extends('layouts.app')
@include('layouts.terms-section')
@section('content')
<section class="pt-4 mb-4">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-6 text-center text-lg-left">
                <h1 class="fw-600 h4">Return Policy Page</h1>
            </div>
            <div class="col-lg-6">
                <ul class="breadcrumb bg-transparent p-0 justify-content-center justify-content-lg-end">
                    <li class="breadcrumb-item has-transition opacity-50 hov-opacity-100">
                        <a class="text-reset" href="/">Home</a>
                    </li>
                    <li class="text-dark fw-600 breadcrumb-item">
                        "Return Policy"
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
@yield('return-policy-section')
@endsection