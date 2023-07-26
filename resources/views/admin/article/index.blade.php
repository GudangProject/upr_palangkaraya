<x-master-layouts>

<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-7 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Articles</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/dashboard">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Article List
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-right col-md-5 col-12">
                <div class="form-group">
                    <a href="{{ route('articles.create') }}" class="btn-icon btn btn-primary btn-round"><i data-feather="edit"></i> Create New Article</a>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="row" id="basic-table">
                <div class="col-12">
                    <div class="card p-1">
                        <div class="row" id="table-hover-row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="table-responsive">
                                        <livewire:articles-table></livewire:articles-table>
                                        {{-- <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Project</th>
                                                    <th>Client</th>
                                                    <th>Users</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <img src="{{asset('assets')}}/images/icons/angular.svg" class="mr-75" height="20" width="20" alt="Angular" />
                                                        <span class="font-weight-bold">Angular Project</span>
                                                    </td>
                                                    <td>Peter Charls</td>
                                                    <td>
                                                        <div class="avatar-group">
                                                            <div data-toggle="tooltip" data-popup="tooltip-custom" data-placement="top" title="" class="avatar pull-up my-0" data-original-title="Lilian Nenez">
                                                                <img src="{{asset('assets')}}/images/portrait/small/avatar-s-5.jpg" alt="Avatar" height="26" width="26" />
                                                            </div>
                                                            <div data-toggle="tooltip" data-popup="tooltip-custom" data-placement="top" title="" class="avatar pull-up my-0" data-original-title="Alberto Glotzbach">
                                                                <img src="{{asset('assets')}}/images/portrait/small/avatar-s-6.jpg" alt="Avatar" height="26" width="26" />
                                                            </div>
                                                            <div data-toggle="tooltip" data-popup="tooltip-custom" data-placement="top" title="" class="avatar pull-up my-0" data-original-title="Alberto Glotzbach">
                                                                <img src="{{asset('assets')}}/images/portrait/small/avatar-s-7.jpg" alt="Avatar" height="26" width="26" />
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge badge-pill badge-light-primary mr-1">Active</span></td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                                                <i data-feather="more-vertical"></i>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="javascript:void(0);">
                                                                    <i data-feather="edit-2" class="mr-50"></i>
                                                                    <span>Edit</span>
                                                                </a>
                                                                <a class="dropdown-item" href="javascript:void(0);">
                                                                    <i data-feather="trash" class="mr-50"></i>
                                                                    <span>Delete</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <livewire:user-table></livewire:user-table> --}}
                    </div>
                </div>
            </div>
            @include('admin.article.modal')
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
<script>
    document.addEventListener("DOMContentLoaded", () => {
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
        Livewire.hook('message.processed', (message, component) => {
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })
        })
    });

    window.addEventListener('openModalDelete', event => {
        $("#delete-modal").modal('show');
    });

    window.addEventListener('closeModalDelete', event => {
        $("#delete-modal").modal('hide');
    });
</script>
@endpush

</x-master-layouts>
