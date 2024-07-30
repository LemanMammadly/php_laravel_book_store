<section class="section-margin">
    <h2 class="sr-only">Brand Slider</h2>
    <div class="container">
        <div class="brand-slider sb-slick-slider border-top border-bottom"
            data-slick-setting='{"autoplay": true,"autoplaySpeed": 8000,"slidesToShow": 6}'data-slick-responsive='[
        {"breakpoint":992, "settings": {"slidesToShow": 4} },
        {"breakpoint":768, "settings": {"slidesToShow": 3} },
        {"breakpoint":575, "settings": {"slidesToShow": 3} },
        {"breakpoint":480, "settings": {"slidesToShow": 2} },
        {"breakpoint":320, "settings": {"slidesToShow": 1} }
    ]'>
            @foreach ($brands as $brand)
                <div class="single-slide">
                    <img src="{{ asset($brand->image_path) }}" alt="">
                </div>
            @endforeach
        </div>
    </div>
</section>
