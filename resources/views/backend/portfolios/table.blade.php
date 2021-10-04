<div class="table-responsive">
    <table class="table table-dark m-0">
        <thead>
            <tr>
                <th scope="col">name</th>
                <th>description</th>
                <th>category</th>
                <th>location</th>
                <th>image</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($portfolios as $row)
                <tr>
                    <th class="align-middle" scope="row">{{ $row->name }}</th>
                    <td class="align-middle">{{ \Str::words(strip_tags($row->description), 20) }}</td>
                    <td class="align-middle">{{ $row->category }}</td>
                    <td class="align-middle">{{ $row->location }}</td>
                    <td class="align-middle">
                        @if ($row->getModelMedia())
                            <img src="{{ $row->getModelMedia() }}" width="100" height="100">
                        @else
                            no image
                        @endif
                    </td>
                    <td class="align-middle">
                        <a href="{{ route('portfolios.edit', $row) }}">
                            <i class="fa fa-edit fa-fw fa-1x"></i>
                        </a>
                        <a href="javascript:;" onclick="event.preventDefault(); document.getElementById('portfolio-destory-form-{{ $row->id }}').submit();">
                            <i class="fa fa-trash fa-fw fa-1x"></i>
                        </a>
                        <form id="portfolio-destory-form-{{ $row->id }}" action="{{ route('portfolios.destroy', $row) }}" method="POST" class="none"> @method('delete') @csrf </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="30" class="text-center"> no data </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
