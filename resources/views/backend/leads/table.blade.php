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
                            <th scope="row">type</th>
                            <td>name</td>
                            <td>phone</td>
                            <td>email</td>
                            <td>description</td>
                        </tr>
                    @empty
                        <tr>
                            <th scope="row">type</th>
                            <td>name</td>
                            <td>phone</td>
                            <td>email</td>
                            <td>description</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
