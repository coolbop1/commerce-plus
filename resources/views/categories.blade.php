@php
    session_start();
@endphp
@extends('layouts.app')
@section('content')
<section class="pt-4 mb-4">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-6 text-center text-lg-left">
                <h1 class="fw-600 h4">All Categories</h1>
            </div>
            <div class="col-lg-6">
                <ul class="breadcrumb bg-transparent p-0 justify-content-center justify-content-lg-end">
                    <li class="breadcrumb-item opacity-50">
                        <a class="text-reset" href="https://demo.activeitzone.com/ecommerce">Home</a>
                    </li>
                    <li class="text-dark fw-600 breadcrumb-item">
                        <a class="text-reset" href="https://demo.activeitzone.com/ecommerce/categories">"All Categories"</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>


<section class="mb-4">
    <div class="container">
        @foreach ($categories as $category)
            @php
                $category_name = $category->name;
                $subcategories = optional($category)->subCategories ?? [];
            @endphp
        
            <div class="mb-3 bg-white shadow-sm rounded">
                <div class="p-3 border-bottom fs-16 fw-600">
                    <a href="https://demo.activeitzone.com/ecommerce/category/{{ $category_name }}" class="text-reset">{{$category_name }}</a>
                </div>
                <div class="p-3 p-lg-4">
                    <div class="row">
                        @foreach ($subcategories as $subcategory)
                            @php
                                $sections = optional($subcategory)->sections ?? [];
                            @endphp
                            <div class="col-lg-4 col-6 text-left">
                                <h6 class="mb-3"><a class="text-reset fw-600 fs-14" href="https://demo.activeitzone.com/ecommerce/category/">{{ $subcategory->name }}</a></h6>
                                <ul class="mb-3 list-unstyled pl-2">
                                    @foreach ($sections as $section)
                                        <li class="mb-2">
                                            <a class="text-reset" href="https://demo.activeitzone.com/ecommerce/category/Party-Dress">{{ $section->name }}</a>
                                        </li> 
                                    @endforeach

                                </ul>
                            </div>
                            
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection