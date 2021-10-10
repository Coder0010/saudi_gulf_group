
@extends("layouts.frontend")

@section("title", "services")

@section("content")
    <body class="main">

        @include('frontend.partials.header')

        @include('frontend.partials.navbar')

        <div class="overlay"></div>

        <section class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <a href="{{ route('frontend.index') }}">Home </a>
                        <p>contact us</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="inner-page">
            <div class="contact-page">
                <div class="container-fluid">
                    <div class="row row-eq-height justify-content-center">
                        <div class="col-lg-3">
                            <div class="info-box">
                                <i class="fa fa-map"></i>
                                <strong>Address</strong>
                                <p> {{ $contactUsSection->data['address'] }} </p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="info-box">
                                <i class="fa fa-clock-o"></i>
                                <strong>Work time</strong>
                                <p> {{ $contactUsSection->data['work_time'] }} </p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="info-box">
                                <i class="fa fa-thumbs-up"></i>
                                <strong>Let's get in touch</strong>
                                <div class="numbers">
                                    @foreach (['phone_1', 'phone_2'] as $item)
                                        <div>
                                            <span><i class="fa fa-mobile-alt"></i> {{ @$contactUsSection->data[$item] }}</span>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="social">
                                    @foreach (['facebook', 'instagram'] as $item)
                                        <a href="{{ @$generalSection->data[$item] }}" target="_blank"><i class="fa fa-{{ $item }}"></i></a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-2">
                        <div class="col-lg-9">
                            <div class="contact-box">
                                {{-- <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3453.166015921346!2d31.347292884253346!3d30.06077542475458!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583f9a722d8d4f%3A0xa9b1a81a4c1b2330!2sSaudi%20Gulf%20Group!5e0!3m2!1sar!2seg!4v1624456587480!5m2!1sar!2seg"
                                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid mt-2">
                    <div class="row justify-content-center">
                        <div class="col-lg-9">
                            @include('flashs')
                            <div class="contact-box">
                                <form method="POST" action="{{ route('frontend.contact-us.request') }}">
                                    @csrf
                                    @method('post')
                                    <div class="form-row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Your name <span class="text-danger">*</span></label>
                                                <input type="text" name="name" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Your Phone <span class="text-danger">*</span></label>
                                                <input type="text" name="phone" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Your E-mail</label>
                                                <input type="text" name="email" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Select Service</label>
                                                <select id="services" class="select-2 form-control" name="services[]" multiple="multiple">
                                                    @foreach ($services as $item)
                                                        <option value="{{ $item->name }}">{{ $item->id }} - {{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Your company name</label>
                                                <input type="text" name="company" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>subject</label>
                                                <input type="text" name="subject" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>description</label>
                                                <textarea class="form-control" name="description" rows="6"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-block btn-info">SEND</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('frontend.partials.footer')
    </body>
@endsection
