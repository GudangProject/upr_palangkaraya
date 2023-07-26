@section('title')
    Kategori -
@endsection
<x-master-layouts>
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-7 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h3 class="content-header-title float-left mb-0">Kategori</h3>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{ route('images.index') }}">List Promosi</a>
                                    </li>
                                    <li class="breadcrumb-item active">List Category
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-5">
                    <div class="form-group breadcrumb-right">
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#create-modal">
                            Buat Kategori Image
                        </button>
                    </div>
                </div>
            </div>
            <div class="content-body">
                @if (session()->has('message'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <div class="alert-body"><strong>{{ session('message') }}</strong></div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @livewire('image-category-table')
            </div>
        </div>
    </div>

    @include('admin.images.categories.modal-create')

    @push('scripts')
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
        window.addEventListener('openModalStatus', event => {
            $("#status-modal").modal('show');
        });

        window.addEventListener('closeModalStatus', event => {
            $("#status-modal").modal('hide');
        });
        window.addEventListener('openModalEdit', event => {
            $("#edit-modal").modal('show');
        });

        window.addEventListener('closeModalEdit', event => {
            $("#edit-modal").modal('hide');
        });
    </script>
    @endpush


</x-master-layouts>
