<nav id="nav">
    <ul class="main">
        <li><a href="{{ route('frontend.index') }}">{{ __("translate.home") }}</a></li>
        <li><a href="{{ route('frontend.our-story') }}">{{ __("translate.our-story") }}</a></li>
        @if ($services)
            <li>
                <a data-toggle="collapse" href="#submenu1" role="button" aria-expanded="false" aria-controls="submenu1">{{ __("translate.services") }}</a>
                <ul class="collapse" id="submenu1">
                    @foreach ($services as $item)
                        <li><a href="{{ route('frontend.services.show', $item) }}">{{ $item->name }}</a></li>
                    @endforeach
                </ul>
            </li>
        @endif
        {{-- <li><a href="{{ route('frontend.portfolios.index') }}">Portfolios</a></li> --}}
        <li><a href="{{ route('frontend.packages.index') }}">{{ __("translate.packages") }}</a></li>
        <li><a href="{{ route('frontend.contact-us') }}">{{ __("translate.contact-us") }}</a></li>
        @if (App::isLocale('en'))
            <li><a href="{{ route('frontend.language', 'ar') }}" class="ar">عربي</a></li>
        @elseif (App::isLocale('ar'))
            <li><a href="{{ route('frontend.language', 'en') }}" class="ar">English</a></li>
        @endif
    </ul>
</nav>
