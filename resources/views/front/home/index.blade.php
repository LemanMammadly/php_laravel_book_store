@extends('front.layouts.app')
@section('title', 'Home Page')

@section('content')
    @include('front.home.partials.slider')
    @include('front.home.partials.category')
    @include('front.home.partials.promotion')
    @include('front.home.partials.productModal')
    @include('front.home.partials.brand')
@endsection
