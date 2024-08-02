@extends('front.layouts.app')
@section('title', 'Product Detail Page')

@section('content')
    <div class="site-wrapper" id="top">
        <section class="breadcrumb-section">
            <h2 class="sr-only">Site Breadcrumb</h2>
            <div class="container">
                <div class="breadcrumb-contents">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">Product Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <main class="inner-page-sec-padding-bottom">
            <div class="container">
                <div class="row mb--60">
                    <div class="col-lg-5 mb--30">
                        <!-- Product Details Slider Big Image-->
                        <div class="product-details-slider sb-slick-slider arrow-type-two"
                            data-slick-setting='{
              "slidesToShow": 1,
              "arrows": false,
              "fade": true,
              "draggable": false,
              "swipe": false,
              "asNavFor": ".product-slider-nav"
              }'>
                            @foreach ($product->images as $image)
                                <div class="single-slide">
                                    <img src={{ $image->imageUrl }} alt="" />
                                </div>
                            @endforeach
                        </div>
                        <!-- Product Details Slider Nav -->
                        <div class="mt--30 product-slider-nav sb-slick-slider arrow-type-two"
                            data-slick-setting='{
            "infinite":true,
              "autoplay": true,
              "autoplaySpeed": 8000,
              "slidesToShow": 4,
              "arrows": true,
              "prevArrow":{"buttonClass": "slick-prev","iconClass":"fa fa-chevron-left"},
              "nextArrow":{"buttonClass": "slick-next","iconClass":"fa fa-chevron-right"},
              "asNavFor": ".product-details-slider",
              "focusOnSelect": true
              }'>
                            @foreach ($product->images as $image)
                                <div class="single-slide">
                                    <img src={{ $image->imageUrl }} alt="" />
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="product-details-info pl-lg--30">
                            <p class="tag-block">
                                Tags:
                                @foreach ($product->tags as $tag)
                                    <a href="#">{{ $tag->name }}</a>{{ $loop->last ? '' : ',' }}
                                @endforeach
                            </p>
                            <h3 class="product-title">
                                {{ $product->title }}
                            </h3>
                            <ul class="list-unstyled">
                                <li>Ex Tax: <span class="list-value"> £
                                        {{ $product->price - ($product->price * $product->taxPercent) / 100 }}</span></li>
                                <li>
                                    Brands:
                                    <a href="#" class="list-value font-weight-bold">
                                        {{ $product->GetCategoryName($product->id) }}</a>
                                </li>
                                <li>Product Code: <span class="list-value"> {{ $product->productCode }}</span></li>
                                <li>Reward Points: <span class="list-value"> {{ $product->rewardsPoints }}</span></li>
                                <li>
                                    Availability: <span class="list-value">
                                        {{ $product->inStock == 1 ? 'In Stock' : 'Out of Stock' }} </span>
                                </li>
                            </ul>
                            <div class="price-block">
                                <span class="price-new">£
                                    {{ $product->price - ($product->price * $product->discountPercent) / 100 }} </span>
                                <del class="price-old">£ {{ $product->price }}</del>
                            </div>
                            @php
                                $averageRating = $product->reviews()->average('rating');
                            @endphp
                            <div class="rating-widget">
                                <div class="rating-block">
                                    @for ($i = 1; $i <= $averageRating; $i++)
                                        <span class="ion-android-star-outline star_on"></span>
                                    @endfor

                                    @for ($i = $averageRating + 1; $i <= 5; $i++)
                                        <span class="ion-android-star-outline"></span>
                                    @endfor
                                </div>
                                <div class="review-widget">
                                    <a href="">({{ $product->reviews()->count() }} Reviews)</a> <span>|</span>
                                    <a href="">Write a review</a>
                                </div>
                            </div>
                            <article class="product-details-article">
                                <h4 class="sr-only">Product Summery</h4>
                                <p>
                                    {{ $product->text }}
                                </p>
                            </article>
                            <div class="add-to-cart-row">
                                <div class="count-input-block">
                                    <span class="widget-label">Qty</span>
                                    <input type="number" class="form-control text-center" value="1" />
                                </div>
                                <div class="add-cart-btn">
                                    <a href="" class="btn btn-outlined--primary"><span class="plus-icon">+</span>Add
                                        to Cart</a>
                                </div>
                            </div>
                            <div class="compare-wishlist-row">
                                <a href="" class="add-link"><i class="fas fa-heart"></i>Add to Wish List</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sb-custom-tab review-tab section-padding">
                    <ul class="nav nav-tabs nav-style-2" id="myTab2" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="tab1" data-toggle="tab" href="#tab-1" role="tab"
                                aria-controls="tab-1" aria-selected="true">
                                DESCRIPTION
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab2" data-toggle="tab" href="#tab-2" role="tab"
                                aria-controls="tab-2" aria-selected="true">
                                REVIEWS ({{ $product->reviews->count() }})
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content space-db--20" id="myTabContent">
                        <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab1">
                            <article class="review-article">
                                <h1 class="sr-only">Tab Article</h1>
                                <p>
                                    {{ $product->description }}
                                </p>
                            </article>
                        </div>
                        <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab2">
                            <div class="review-wrapper">
                                <h2 class="title-lg mb--20">
                                    {{ $product->reviews->count() }} REVIEW FOR AUCTOR GRAVIDA ENIM
                                </h2>
                                @foreach ($product->reviews as $review)
                                    <div class="review-comment mb--20">
                                        <div class="avatar">
                                            <img src="assets/image/icon/author-logo.png" alt="" />
                                        </div>
                                        <div class="text">
                                            <div class="rating-block mb--15">
                                                <div class="rating">
                                                    @for ($i = 1; $i <= $review->rating; $i++)
                                                        <span class="ion-android-star-outline star_on"></span>
                                                    @endfor

                                                    @for ($i = $review->rating + 1; $i <= 5; $i++)
                                                        <span class="ion-android-star-outline"></span>
                                                    @endfor
                                                </div>
                                            </div>
                                            <h6 class="author">
                                                {{ $review->user->name }} –
                                                <span
                                                    class="font-weight-400">{{ $review->created_at->translatedFormat('d F, Y') }}</span>
                                            </h6>
                                            <p>
                                                {{ $review->text }}
                                            </p>
                                            <form action="{{ route('delete', ['id' => $review->id]) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                @if ($userId==$review->user_id)
                                                <button type="submit">🗑️</button>
                                                @else
                                                @endif
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                                <h2 class="title-lg mb--20 pt--15">ADD A REVIEW</h2>
                                <div class="rating-row pt-2">

                                    <form action="{{ route('comment') }}" method="POST" class="mt--15 site-form">
                                        @csrf
                                        <div class="d-flex">
                                            <p class="d-block mx-3">Your Rating</p>
                                            <span class="rating-widget-block d-flex gap-2">
                                                <input type="radio" name="rating" id="star5" value="5" />
                                                <label for="star5"></label>
                                                <input type="radio" name="rating" id="star4" value="4" />
                                                <label for="star4"></label>
                                                <input type="radio" name="rating" id="star3" value="3" />
                                                <label for="star3"></label>
                                                <input type="radio" name="rating" id="star2" value="2" />
                                                <label for="star2"></label>
                                                <input type="radio" name="rating" id="star1" value="1" />
                                                <label for="star1"></label>
                                            </span>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="message">Comment</label>
                                                    <textarea name="text" id="message" cols="30" rows="10" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <input type="hidden" value="{{ $product->id }}" name="product_id">
                                            <div class="col-lg-4">
                                                <div class="submit-btn">
                                                    <button type="submit" class="btn btn-black">Post Comment</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="tab-product-details">

                                                        </div>
                                                        <!--=================================
                                                        RELATED PRODUCTS BOOKS
                                                    ===================================== -->
                <section class="">
                    <div class="container">
                        <div class="section-title section-title--bordered">
                            <h2>RELATED PRODUCTS</h2>
                        </div>
                        <div class="product-slider sb-slick-slider slider-border-single-row"
                            data-slick-setting='{
                "autoplay": true,
                "autoplaySpeed": 8000,
                "slidesToShow": 4,
                "dots":true
            }'
                            data-slick-responsive='[
                {"breakpoint":1200, "settings": {"slidesToShow": 4} },
                {"breakpoint":992, "settings": {"slidesToShow": 3} },
                {"breakpoint":768, "settings": {"slidesToShow": 2} },
                {"breakpoint":480, "settings": {"slidesToShow": 1} }
            ]'>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author"> Lpple </a>
                                        <h3>
                                            <a href="product-details.html">Revolutionize Your BOOK With</a>
                                        </h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="assets/image/products/product-10.jpg" alt="" />
                                            <div class="hover-contents">
                                                <a href="product-details.html" class="hover-image">
                                                    <img src="assets/image/products/product-1.jpg" alt="" />
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="cart.html" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal"
                                                        class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author"> Jpple </a>
                                        <h3>
                                            <a href="product-details.html">Turn Your BOOK Into High Machine</a>
                                        </h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="assets/image/products/product-2.jpg" alt="" />
                                            <div class="hover-contents">
                                                <a href="product-details.html" class="hover-image">
                                                    <img src="assets/image/products/product-1.jpg" alt="" />
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="cart.html" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal"
                                                        class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author"> Wpple </a>
                                        <h3>
                                            <a href="product-details.html">3 Ways Create Better BOOK With</a>
                                        </h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="assets/image/products/product-3.jpg" alt="" />
                                            <div class="hover-contents">
                                                <a href="product-details.html" class="hover-image">
                                                    <img src="assets/image/products/product-2.jpg" alt="" />
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="cart.html" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal"
                                                        class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author"> Epple </a>
                                        <h3>
                                            <a href="product-details.html">What You Can Learn From Bill Gates</a>
                                        </h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="assets/image/products/product-5.jpg" alt="" />
                                            <div class="hover-contents">
                                                <a href="product-details.html" class="hover-image">
                                                    <img src="assets/image/products/product-4.jpg" alt="" />
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="cart.html" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal"
                                                        class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author"> Hpple </a>
                                        <h3>
                                            <a href="product-details.html">a Half Very Simple Things You To</a>
                                        </h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="assets/image/products/product-6.jpg" alt="" />
                                            <div class="hover-contents">
                                                <a href="product-details.html" class="hover-image">
                                                    <img src="assets/image/products/product-4.jpg" alt="" />
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="cart.html" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal"
                                                        class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Modal -->
                <div class="modal fade modal-quick-view" id="quickModal" tabindex="-1" role="dialog"
                    aria-labelledby="quickModal" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <button type="button" class="close modal-close-btn ml-auto" data-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="product-details-modal">
                                <div class="row">
                                    <div class="col-lg-5">
                                        <!-- Product Details Slider Big Image-->
                                        <div class="product-details-slider sb-slick-slider arrow-type-two"
                                            data-slick-setting='{
              "slidesToShow": 1,
              "arrows": false,
              "fade": true,
              "draggable": false,
              "swipe": false,
              "asNavFor": ".product-slider-nav"
              }'>
                                            <div class="single-slide">
                                                <img src="assets/image/products/product-details-1.jpg" alt="" />
                                            </div>
                                            <div class="single-slide">
                                                <img src="assets/image/products/product-details-2.jpg" alt="" />
                                            </div>
                                            <div class="single-slide">
                                                <img src="assets/image/products/product-details-3.jpg" alt="" />
                                            </div>
                                            <div class="single-slide">
                                                <img src="assets/image/products/product-details-4.jpg" alt="" />
                                            </div>
                                            <div class="single-slide">
                                                <img src="assets/image/products/product-details-5.jpg" alt="" />
                                            </div>
                                        </div>
                                        <!-- Product Details Slider Nav -->
                                        <div class="mt--30 product-slider-nav sb-slick-slider arrow-type-two"
                                            data-slick-setting='{
            "infinite":true,
              "autoplay": true,
              "autoplaySpeed": 8000,
              "slidesToShow": 4,
              "arrows": true,
              "prevArrow":{"buttonClass": "slick-prev","iconClass":"fa fa-chevron-left"},
              "nextArrow":{"buttonClass": "slick-next","iconClass":"fa fa-chevron-right"},
              "asNavFor": ".product-details-slider",
              "focusOnSelect": true
              }'>
                                            <div class="single-slide">
                                                <img src="assets/image/products/product-details-1.jpg" alt="" />
                                            </div>
                                            <div class="single-slide">
                                                <img src="assets/image/products/product-details-2.jpg" alt="" />
                                            </div>
                                            <div class="single-slide">
                                                <img src="assets/image/products/product-details-3.jpg" alt="" />
                                            </div>
                                            <div class="single-slide">
                                                <img src="assets/image/products/product-details-4.jpg" alt="" />
                                            </div>
                                            <div class="single-slide">
                                                <img src="assets/image/products/product-details-5.jpg" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 mt--30 mt-lg--30">
                                        <div class="product-details-info pl-lg--30">
                                            <p class="tag-block">
                                                Tags: <a href="#">Movado</a>, <a href="#">Omega</a>
                                            </p>
                                            <h3 class="product-title">
                                                Beats EP Wired On-Ear Headphone-Black
                                            </h3>
                                            <ul class="list-unstyled">
                                                <li>Ex Tax: <span class="list-value"> £60.24</span></li>
                                                <li>
                                                    Brands:
                                                    <a href="#" class="list-value font-weight-bold">
                                                        Canon</a>
                                                </li>
                                                <li>
                                                    Product Code: <span class="list-value"> model1</span>
                                                </li>
                                                <li>
                                                    Reward Points: <span class="list-value"> 200</span>
                                                </li>
                                                <li>
                                                    Availability:
                                                    <span class="list-value"> In Stock</span>
                                                </li>
                                            </ul>
                                            <div class="price-block">
                                                <span class="price-new">£73.79</span>
                                                <del class="price-old">£91.86</del>
                                            </div>

                                            <article class="product-details-article">
                                                <h4 class="sr-only">Product Summery</h4>
                                                <p>
                                                    Long printed dress with thin adjustable straps.
                                                    V-neckline and wiring under the Dust with ruffles at
                                                    the bottom of the dress.
                                                </p>
                                            </article>
                                            <div class="add-to-cart-row">
                                                <div class="count-input-block">
                                                    <span class="widget-label">Qty</span>
                                                    <input type="number" class="form-control text-center"
                                                        value="1" />
                                                </div>
                                                <div class="add-cart-btn">
                                                    <a href="" class="btn btn-outlined--primary"><span
                                                            class="plus-icon">+</span>Add to Cart</a>
                                                </div>
                                            </div>
                                            <div class="compare-wishlist-row">
                                                <a href="" class="add-link"><i class="fas fa-heart"></i>Add to
                                                    Wish List</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="widget-social-share">
                                    <span class="widget-label">Share:</span>
                                    <div class="modal-social-share">
                                        <a href="#" class="single-icon"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#" class="single-icon"><i class="fab fa-twitter"></i></a>
                                        <a href="#" class="single-icon"><i class="fab fa-youtube"></i></a>
                                        <a href="#" class="single-icon"><i class="fab fa-google-plus-g"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </main>
    </div>
    <!--=================================
                                                      Brands Slider
                                                    ===================================== -->
    <section class="section-margin">
        <h2 class="sr-only">Brand Slider</h2>
        <div class="container">
            <div class="brand-slider sb-slick-slider border-top border-bottom"
                data-slick-setting='{
                                            "autoplay": true,
                                            "autoplaySpeed": 8000,
                                            "slidesToShow": 6
                                            }'
                data-slick-responsive='[
                {"breakpoint":992, "settings": {"slidesToShow": 4} },
                {"breakpoint":768, "settings": {"slidesToShow": 3} },
                {"breakpoint":575, "settings": {"slidesToShow": 3} },
                {"breakpoint":480, "settings": {"slidesToShow": 2} },
                {"breakpoint":320, "settings": {"slidesToShow": 1} }
            ]'>
                <div class="single-slide">
                    <img src="assets/image/others/brand-1.jpg" alt="" />
                </div>
                <div class="single-slide">
                    <img src="assets/image/others/brand-2.jpg" alt="" />
                </div>
                <div class="single-slide">
                    <img src="assets/image/others/brand-3.jpg" alt="" />
                </div>
                <div class="single-slide">
                    <img src="assets/image/others/brand-4.jpg" alt="" />
                </div>
                <div class="single-slide">
                    <img src="assets/image/others/brand-5.jpg" alt="" />
                </div>
                <div class="single-slide">
                    <img src="assets/image/others/brand-6.jpg" alt="" />
                </div>
                <div class="single-slide">
                    <img src="assets/image/others/brand-1.jpg" alt="" />
                </div>
                <div class="single-slide">
                    <img src="assets/image/others/brand-2.jpg" alt="" />
                </div>
            </div>
        </div>
    </section>
@endsection
