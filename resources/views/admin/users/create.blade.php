<x-master-layouts>

<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Create New Users</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/dashboard">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('users.index') }}">List User</a>
                                </li>
                                <li class="breadcrumb-item active">Create
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-header row">
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="content-body">
            <div class="row" id="basic-table">
                <div class="col-12">
                    <div class="card p-1">
                        <section id="basic-horizontal-layouts">
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <form class="form form-horizontal" action="{{ route('users.store') }}" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-sm-3 col-form-label">
                                                                <label for="first-name">Full Name</label>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <input type="text" id="first-name" class="form-control" name="name" placeholder="First Name" required/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-sm-3 col-form-label">
                                                                <label for="email-id">Email</label>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <input type="email" id="email-id" class="form-control" name="email" placeholder="Email" required/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-sm-3 col-form-label">
                                                                <label for="email-id">Role</label>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <select class="form-control mb-1" id="selectDefault" name="role">
                                                                    <option value="0" selected>-- SELECT ROLES --</option>
                                                                    @foreach ($data['roles'] as $role)
                                                                        <option value="{{ $role->name }}">{{ strtoupper($role->name) }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-9 offset-sm-3">
                                                        <button type="submit" class="btn btn-primary mr-1">Create</button>
                                                        <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
            @include('admin.modals.alert')
        </div>
    </div>
</div>
@push('custom-scripts')
<script>
    window.addEventListener('success', event => {
        $("#successAlert").modal('show');
        $("#message").html(event.detail.message);

    });
</script>
@endpush

</x-master-layouts>
