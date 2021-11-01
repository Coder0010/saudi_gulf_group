<nav id="nav">
    <ul class="main">
        <li><a class="text-success" href="{{ route('frontend.index') }}">Home</a></li>
        {{-- <li><a class="text-success" href="{{ route('frontend.services.index') }}">Services</a></li> --}}
        <li>
            <a data-toggle="collapse" href="#submenu1" role="button" aria-expanded="false" aria-controls="submenu1">Services</a>
            <ul class="collapse" id="submenu1">
                @foreach ($services as $item)
                    <li><a href="{{ route('frontend.services.show', $item) }}">{{ $item->name }}</a></li>
                @endforeach
            </ul>
        </li>
        <li><a class="text-success" href="{{ route('frontend.portfolios.index') }}">Portfolios</a></li>
        <li><a class="text-success" href="{{ route('frontend.contact-us') }}">Contact us</a></li>
        <li><a href="route('frontend.story')">Our story</a></li>
        <li><a href="route('frontend.prices')">Prices</a></li>
        <li><a href="#" class="ar">عربي</a></li>
    </ul>
</nav>
