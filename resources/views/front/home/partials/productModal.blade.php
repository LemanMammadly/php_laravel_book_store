<div class="modal fade modal-quick-view" id="quickModal" tabindex="-1" role="dialog" aria-labelledby="quickModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close modal-close-btn ml-auto" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="product-details-modal">
                <div class="row">
                    <div class="col-lg-5">
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
                                <img id="modal-product-image" src="" alt="">
                            </div>
                        </div>
                        <div class="mt--30 product-slider-nav sb-slick-slider arrow-type-two"
                            data-slick-setting='{
                                "infinite": true,
                                "autoplay": true,
                                "autoplaySpeed": 8000,
                                "slidesToShow": 4,
                                "arrows": true,
                                "prevArrow": {"buttonClass": "slick-prev", "iconClass": "fa fa-chevron-left"},
                                "nextArrow": {"buttonClass": "slick-next", "iconClass": "fa fa-chevron-right"},
                                "asNavFor": ".product-details-slider",
                                "focusOnSelect": true
                            }'>
                            <div class="single-slide">
                                <img src="" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 mt--30 mt-lg--30">
                        <div class="product-details-info pl-lg--30 ">
                            <p class="tag-block">Tags:
                                <span id="modal-product-tags"></span>
                            </p>
                            <h3 id="modal-product-title" class="product-title"></h3>
                            <ul class="list-unstyled">
                                <li>Ex Tax: <span id="modal-product-price" class="list-value"></span></li>
                                <li>Product Code: <span id="modal-product-code" class="list-value"></span></li>
                                <li>Availability: <span id="modal-product-stock" class="list-value"></span></li>
                            </ul>
                            <div class="price-block">
                                <span id="modal-product-new-price" class="price-new"></span>
                                <del id="modal-product-old-price" class="price-old"></del>
                            </div>
                            <article class="product-details-article">
                                <h4 class="sr-only">Product Summery</h4>
                                <p id="modal-product-description"></p>
                            </article>
                            <div class="add-to-cart-row">
                                <div class="count-input-block">
                                    <span class="widget-label">Qty</span>
                                    <input type="number" class="form-control text-center" value="1">
                                </div>
                                <div class="add-cart-btn">
                                    <a href="" class="btn btn-outlined--primary"><span class="plus-icon">+</span>Add to Cart</a>
                                </div>
                            </div>
                            <div class="compare-wishlist-row">
                                <a href="" class="add-link"><i class="fas fa-heart"></i>Add to Wish List</a>
                                <a href="" class="add-link"><i class="fas fa-random"></i>Add to Compare</a>
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

@push('js')
<script>
    $(document).ready(function() {
        function openModal(product) {
            document.getElementById('modal-product-image').src = product.mainImageUrl;
            document.getElementById('modal-product-title').innerText = product.title;
            document.getElementById('modal-product-price').innerText = '£' + product.price;
            document.getElementById('modal-product-code').innerText = product.productCode;
            document.getElementById('modal-product-stock').innerText = product.inStock ? 'In Stock' : 'Out of Stock';
            document.getElementById('modal-product-new-price').innerText = '£' + (product.price - (product.price * product.discountPercent / 100)).toFixed(2);
            document.getElementById('modal-product-old-price').innerText = '£' + product.price;
            document.getElementById('modal-product-description').innerText = product.description;

            let tags = product.tags.map(tag => `<a href="#">${tag.name}</a>`).join(', ');
            document.getElementById('modal-product-tags').innerHTML = tags;

            $('#quickModal').modal('show');
        }

        window.openModal = openModal;
    });
</script>
@endpush

@foreach ($products as $product)
    <div class="single-slide">
        <div class="product-card">
            <div class="product-header">
                <a href="" class="author">jpple</a>
                <h3><a href="product-details.html">{{ $product->title }}</a></h3>
            </div>
            <div class="product-card--body">
                <div class="card-image">
                    <img src="{{ $product->mainImageUrl }}" alt="">
                    <div class="hover-contents">
                        <a href="{{ route('productDetail', ['slug' => $product->slug]) }}" class="hover-image">
                            <img src="{{ $product->mainImageUrl }}" alt="">
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
                            <a href="#"
                                onclick="openModal({{ json_encode($product) }})"
                                data-toggle="modal" data-target="#quickModal"
                                class="single-btn">
                                <i class="fas fa-eye"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="price-block">
                    <span class="price">£{{ number_format($product->price - ($product->price * $product->discountPercent) / 100, 2) }}</span>
                    <del class="price-old">£{{ $product->price }}</del>
                    <span class="price-discount">{{ $product->discountPercent }}%</span>
                </div>
            </div>
        </div>
    </div>
@endforeach
