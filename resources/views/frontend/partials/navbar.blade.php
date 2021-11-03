<nav id="nav">
    <ul class="main">
        <li><a href="{{ route('frontend.index') }}">Home</a></li>
        @if ($services)
            <li>
                <a data-toggle="collapse" href="#submenu1" role="button" aria-expanded="false" aria-controls="submenu1">Services</a>
                <ul class="collapse" id="submenu1">
                    @foreach ($services as $item)
                        <li><a href="{{ route('frontend.services.show', $item) }}">{{ $item->name }}</a></li>
                    @endforeach
                </ul>
            </li>
        @endif
        {{-- <li><a href="{{ route('frontend.portfolios.index') }}">Portfolios</a></li> --}}
        <li><a href="{{ route('frontend.contact-us') }}">Contact us</a></li>
        <li><a href="{{ route('frontend.our-story') }}">Our story</a></li>
        <li><a href="{{ route('frontend.packages.index') }}">Packages</a></li>
        <li><a href="#" class="ar">عربي</a></li>
    </ul>
</nav>
