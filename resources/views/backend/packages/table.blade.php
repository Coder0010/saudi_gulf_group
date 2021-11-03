<div class="table-responsive text-center">
    <table class="table table-dark m-0">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th>name</th>
                {{-- <th>sub_name</th>
                <th>description</th>
                <th>sub_description</th>
                <th>image</th> --}}
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($packages as $row)
                <tr>
                    <th class="align-middle" scope="row">{{ $row->id }}</th>
                    <th class="align-middle">{{ $row->name }}</th>
                    {{-- <th class="align-middle">{{ $row->sub_name ?? '-' }}</th>
                    <td class="align-middle">{{ \Str::words(strip_tags($row->description), 20) }}</td>
                    <td class="align-middle">{{ $row->sub_description ? \Str::words(strip_tags($row->sub_description), 20) : '-'  }}</td>
                    <td class="align-middle">
                        <img src="{{ $row->image }}" width="100" height="100">
                    </td> --}}
                    <td class="align-middle">
                        <a href="{{ route('backend.packages.edit', $row) }}">
                            <i class="fa fa-edit fa-fw fa-1x"></i>
                        </a>
                        <a href="javascript:;" onclick="event.preventDefault(); document.getElementById('package-destory-form-{{ $row->id }}').submit();">
                            <i class="fa fa-trash fa-fw fa-1x"></i>
                        </a>
                        <form id="package-destory-form-{{ $row->id }}" action="{{ route('backend.packages.destroy', $row) }}" method="POST" class="none"> @method('delete') @csrf </form>
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
