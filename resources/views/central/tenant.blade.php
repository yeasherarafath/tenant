<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tenant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">


</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1>Tenant Page</h1>
                <p class="lead">This is a tenant-specific page.</p>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @session('success')
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endsession
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Domain</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tenants as $tenant)
                                    <tr>
                                        <td>{{ $tenant->id }}</td>
                                        <td>{{ $tenant->name }}</td>
                                        <td>
                                            <ul>
                                                @forelse ($tenant->domains as $domain)
                                                    <li>
                                                        <a href="//{{ $domain->domain }}"
                                                            target="_blank">{{ $domain->domain }}</a>
                                                    </li>
                                                @empty
                                                    <li>No Domains</li>
                                                @endforelse

                                            </ul>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Tenant Dashboard</h5>
                                <p class="card-text">Welcome to the tenant dashboard!</p>
                                <div class="">
                                    <form action="" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Name</label>
                                            <input type="text" name="name" class="form-control"
                                                id="exampleFormControlInput1" placeholder="name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Subdomain</label>
                                            <div class="input-group">
                                                <input name="domain" type="text" class="form-control"
                                                    id="exampleFormControlInput1" placeholder="subdomain">
                                                <span class="input-group-text">.{{ request()->host() }}</span>
                                            </div>
                                        </div>


                                        <button type="submit" class="btn btn-primary">Perform Tenant Action</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
</script>

</html>
