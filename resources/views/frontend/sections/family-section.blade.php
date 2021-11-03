<section class="video">
    @if ($familySection->video)
        <video autoplay muted loop class="sg-video">
            <source src="{{ $familySection->video }}" type="video/mp4">
        </video>
    @endif
    <div class="overlay text-center"> </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h1>{{ $familySection->name }}</h1>
                <p>{{ $familySection->description }}</p>
                <a href="#">Get your qutation</a>
            </div>
        </div>
    </div>
</section>
