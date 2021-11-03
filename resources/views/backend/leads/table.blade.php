<div class="card">
    <div class="card-header">leads</div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-dark m-0">
                <thead>
                    <tr>
                        <th scope="col">type</th>
                        <th scope="col">name</th>
                        <th scope="col">phone</th>
                        <th scope="col">email</th>
                        <th scope="col">description</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($leads as $lead)
                        <tr>
                            <th scope="row">{{ $lead->type }}</th>
                            <td>{{ $lead->name }}</td>
                            <td>{{ $lead->phone }}</td>
                            <td>{{ $lead->email }}</td>
                            <td>{{ $lead->description }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="30" class="text-center"> no data </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
