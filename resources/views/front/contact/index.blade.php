@extends('front.layouts.app')
@section('title', 'Contact Page')

@section('content')
    <div class="site-wrapper" id="top">
        <section class="breadcrumb-section">
            <h2 class="sr-only">Site Breadcrumb</h2>
            <div class="container">
                <div class="breadcrumb-contents">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">Contact</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <!-- Cart Page Start -->
        <main class="contact_area inner-page-sec-padding-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div id="google-map">
                            {!! $contact->map_url !!}
                        </div>
                    </div>
                </div>
                <div class="row mt--60">
                    <div class="col-lg-5 col-md-5 col-12">
                        <div class="contact_adress">
                            <div class="ct_address">
                                <h3 class="ct_title">Location & Details</h3>
                                <p>
                                    {{ $contact->description }}
                                </p>
                            </div>
                            <div class="address_wrapper">
                                <div class="address">
                                    <div class="icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <div class="contact-info-text">
                                        <p>
                                            <span>Address:</span> {{ $contact->address }}
                                        </p>
                                    </div>
                                </div>
                                <div class="address">
                                    <div class="icon">
                                        <i class="far fa-envelope"></i>
                                    </div>
                                    <div class="contact-info-text">
                                        <p><span>Email: </span>{{ $contact->email }}</p>
                                    </div>
                                </div>
                                <div class="address">
                                    <div class="icon">
                                        <i class="fas fa-mobile-alt"></i>
                                    </div>
                                    <div class="contact-info-text">
                                        <p><span>Phone:</span> {{ $contact->phone }} </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-12 mt--30 mt-md--0">
                        <div class="contact_form">
                            <h3 class="ct_title">Send Us a Message</h3>
                            <form id="contact-form" method="POST" action="{{ route('message') }}" class="contact-form">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Your Name <span class="required">*</span></label>
                                            <input type="text" id="name" name="name" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Your Email <span class="required">*</span></label>
                                            <input type="email" id="email" name="email" class="form-control"
                                                required />
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Your Phone*</label>
                                            <input type="text" id="phone" name="phone" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Your Message</label>
                                            <textarea id="message" name="message" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-btn">
                                            <button type="submit" value="submit" id="submit" class="btn btn-black"
                                                name="submit">
                                                send
                                            </button>
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- Cart Page End -->
    </div>
@endsection
