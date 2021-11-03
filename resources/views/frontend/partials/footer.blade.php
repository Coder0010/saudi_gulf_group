<footer>
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-6">
                <div class="footer-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-2 col-3 mb-2">
                                <img src="{{ asset('frontend/images/Logo-white.png') }}">
                            </div>
                            <div class="col-lg-9">
                                {!! $aboutUsSection->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="footer-links">
                    <h5>Get touch</h5>
                    <a href="{{ route('frontend.contact-us') }}">Contact us</a>
                    <div class="social-icons">
                        @foreach (['facebook', 'instagram'] as $item)
                            <a href="{{ @$aboutUsSection->data[$item] }}" target="_blank"><i class="fa fa-{{ $item }}"></i></a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="copyright">
                    <span> © 2021 Copyright <span class="saudi"> ©saudigulfgroup. </span> All rights reserved, </span>
                    <span> Made with <i class="fa fa-heart"></i> by <a href="#">Ahmed Afify</a></span>
                </div>
            </div>
        </div>
    </div>
</footer>
