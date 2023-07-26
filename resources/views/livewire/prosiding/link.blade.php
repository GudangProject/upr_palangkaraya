<div>
    <div class="content-header row">
        <div class="content-header-left col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-7">
                    <h2 class="content-header-title float-left mb-0">Link Prosiding</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">Prosiding
                            </li>
                            <li class="breadcrumb-item active">Link Prosiding
                            </li>
                        </ol>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="row" id="basic-table">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-sm-12">
                                @role('super admin|admin')
                                <button class="btn-icon btn btn-primary btn-round"  data-toggle="modal" data-target="#create-modal"><i data-feather="plus"></i> Tambah Link Prosiding</button>
                                <div wire:ignore.self class="modal fade text-left" id="create-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel16">Link Prosiding</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form wire:submit.prevent='createLinkProsiding' enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>
                                                            <h5>Title </h5>
                                                        </label>
                                                        <input type="text" wire:model='title' class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                            <h5>Link Url </h5>
                                                        </label>
                                                        <input type="url" wire:model='url' class="form-control" placeholder="https://prosiding.com" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                            <h5>Kategori </h5>
                                                        </label>
                                                        <select class="form-control" wire:model='category'>
                                                            <option value="">-- PILIH --</option>
                                                            <option value="nasional">Nasional</option>
                                                            <option value="internasional">Internasional</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary"><i data-feather="save"></i> Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endrole
                            </div>
                            <div class="col-lg-4 col-sm-12 d-flex justify-content-end">

                            </div>
                            <div class="col-lg-2 col-sm-12 d-flex justify-content-end">

                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Url</th>
                                    <th>Kategori</th>
                                    @role('super admin|admin')
                                    <th>Action</th>
                                    @endrole
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $row)
                                    <tr>
                                        <td>
                                            <span class="font-weight-bold">{{ $row->title }}</span>
                                        </td>
                                        <td><span class="badge badge-light-primary"><a href="{{ $row->url }}" target="_blank" class="text-primary">{{ $row->url }}</a></span></td>
                                        <td>{{ $row->category }}</td>
                                        @role('super admin|admin')
                                            <td><button type="button" class="btn btn-sm btn-danger" wire:click='delete({{ $row->id }})'><i data-feather="trash"></i></button></td>
                                        @endrole
                                        </tr>
                                    </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="pt-2 pb-1"><strong>Data not found !</strong></td>
                                </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('vendor-css')
        <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendors/css/vendors.min.css">
    @endpush
    @push('page-js')
        <script src="{{ asset('assets') }}/ckeditorx/ckeditor.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $('.ckeditor').ckeditor();
            });
        </script>
        <script>
            window.addEventListener('openCategoryModal', event => {
                $("#create-modal").modal('show');
            })

            window.addEventListener('closeModal', event => {
                $("#create-modal").modal('hide');
            })

            window.addEventListener('iconLoad', event => {
                if (feather) {
                    feather.replace({
                        width: 14,
                        height: 14
                    });
                }
            })
        </script>
    @endpush

</div>
