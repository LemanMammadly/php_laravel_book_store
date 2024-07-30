<section class="hero-area hero-slider-4 ">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 offset-lg-3">
                <div class="sb-slick-slider"
                    data-slick-setting='{"autoplay": true,"autoplaySpeed": 8000,"slidesToShow": 1,"dots":true}'>
                    @foreach ($sliders as $slider)
                    <div class="single-slide bg-image bg-overlay--white"
                        data-bg="{{ asset($slider->image_url) }}">
                        <div class="home-content text-left pl--30">
                            <div class="row">
                                <div class="col-lg-5">
                                    <span class="title-small">Magazine Cover</span>
                                    <h1>{{$slider->title}}</h1>
                                    <p>
                                        {{$slider->description}}
                                    </p>
                                    <a href="{{$slider->link_url}}" class="btn btn-outlined--pink">
                                        Shop Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
