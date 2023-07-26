<x-master-layouts>

<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-7 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Users</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/dashboard">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="/users">Users</a>
                                </li>
                                <li class="breadcrumb-item active">Recycle
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
                        <livewire:user-trashed></livewire:user-trashed>
                    </div>
                </div>
            </div>
            @include('admin.modals.alert')
        </div>
    </div>
</div>
@push('custom-scripts')
<script>
    window.addEventListener('confirmDeleteForever', event => {
        $("#confirm").modal('show');
        $("#message").html(event.detail.message);

    });
    window.addEventListener('success', event => {
        $("#successAlert").modal('show');
        $("#message").html(event.detail.message);

    });
</script>
@endpush

</x-master-layouts>
