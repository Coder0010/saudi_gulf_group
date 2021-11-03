<section class="potfolio">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="head-title">
                    <div class="head-title">
                        <span>{{ $portfolioSection->name }}</span>
                        <h3>{{ $portfolioSection->sub_name }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="owl-carousel portfolio-carousel">
        @foreach ($portfolios as $portfolio)
            <div class="item">
                <a href="{{ $portfolio->image }}" data-toggle="lightbox" class="prtfolio-item" data-gallery="{{ $portfolio->name }}" class="prtfolio-item">
                    <img src="{{ $portfolio->image }}" class="img-fluid">
                    <span>{{ $portfolio->category }}</span>
                    <div class="item-info">
                        <h3>{{ $portfolio->name }}</h3>
                        <p>{{ $portfolio->location }}</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <a href="{{ route('frontend.portfolios.index') }}" class="action">Discover All portfolio</a>
            </div>
        </div>
    </div>
</section>
