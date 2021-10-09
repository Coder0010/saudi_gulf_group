<div class="container">
    @foreach (["info", "success", "warning", "danger", "status"] as $item)
        @if ($message = Session::get($item))
            <div class="alert alert-{{ $item == 'status' ? 'success' : $item }} alert-dismissible fade show" role="alert">
                <strong>{{ $item }}</strong> {{ $message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif
    @endforeach

    @if ($errors->any())
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <ul>
                <li>
                    <span> Please check the form below for errors </span>
                    <ul>
                        @foreach ($errors->all() as $item)
                            <li> {{ $item }} </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif
</div>
