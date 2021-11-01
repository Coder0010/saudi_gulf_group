<div class="top-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-2 col-2">
                <a href="{{ route('frontend.index') }}">
                    <img src="{{ asset('frontend/images/Logo-white.png') }}">
                </a>
            </div>
            <div class="col-lg-6 offset-lg-3 col-7">
                <div class="social-icons ">
                    @foreach (['facebook', 'instagram'] as $item)
                        <a href="{{ @$generalSection->data[$item] }}" target="_blank"><i class="fa fa-{{ $item }}"></i></a>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-1 col-1">
                <div class="menu"> <span></span> </div>
            </div>
        </div>
    </div>
</div>
