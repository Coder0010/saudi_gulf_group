
@extends("layouts.frontend")

@section("title", "services")

@section("content")
    <body class="main">

        @include('frontend.partials.header')

        @include('frontend.partials.navbar')

        <div class="overlay"></div>

        @include('frontend.partials.breadcrumb', ['title' => __('translate.contact-us')])

        <section class="inner-page">
            <div class="contact-page">
                <div class="container-fluid">
                    <div class="row row-eq-height justify-content-center">
                        <div class="col-lg-3">
                            <div class="info-box">
                                <i class="fa fa-map"></i>
                                <strong>Address</strong>
                                <p> {{ @$contactUsSection->data['address'][app()->getLocale()] }} </p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="info-box">
                                <i class="fa fa-clock-o"></i>
                                <strong>Work time</strong>
                                <p> {{ @$contactUsSection->data['work_time'] }} </p>
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
                                        <a href="{{ @$aboutUsSection->data[$item] }}" target="_blank"><i class="fa fa-{{ $item }}"></i></a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-2">
                        <div class="col-lg-9">
                            <div class="contact-box">
                                <iframe src="{{ @$contactUsSection->data['iframe_url'] }}" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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

@section('js_scripts')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
