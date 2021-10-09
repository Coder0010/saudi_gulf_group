<section class="discount">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <span>{{ $couponSection->name }}</span>
                <p> {!! $couponSection->description !!} </p>
            </div>
            <div class="col-lg-4 d-flex align-content-center flex-wrap">
                <div class="action">
                    <a href="#" data-toggle="modal" data-target="#couponSectioneModal">Get your coupon</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="couponSectioneModal" tabindex="-1" aria-labelledby="couponSectioneModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3 class="title text-center">Get your coupon</h3>
                <p class="text-center">Enter your E-mail</p>
                <form method="POST" action="{{ route('frontend.coupons.request') }}">
                    @csrf
                    @method('post')
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Your Name" class="@error('name') is-invalid @enderror form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" name="email" placeholder="Your E-mail" class="@error('email') is-invalid @enderror form-control">
                    </div>
                    <button class="btn" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>
@if($errors->has("name") || $errors->has("email"))
    <script>
        window.onload = function() {
            $('#couponSectioneModal').modal('show');
        };
    </script>
@endif
