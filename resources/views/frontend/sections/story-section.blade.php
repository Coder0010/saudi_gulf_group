<section class="story">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4  d-flex align-content-center flex-wrap">
                <div class="story-img">
                    <span> {{ $storySection->sub_name }} </span>
                    <img src="frontend/images/undraw_Working_re_ddwy.svg">
                </div>
            </div>
            <div class="col-lg-6 d-flex align-content-center flex-wrap">
                <div class="story-text">
                    <h5>{{ $storySection->name }}</h5>
                    <br>
                    <p> {!! $storySection->description !!} </p>
                    <a href="route('frontend.story')"> Discover More <i class="fa long-arrow-alt-right"></i> </a>
                </div>
            </div>
        </div>
    </div>
</section>
