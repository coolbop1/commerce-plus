@extends('layouts.app')
@include('layouts.cart-section')
@section('content')
@yield('cart-section')
<script>
    viewMyCart(true)
</script>
@endsection