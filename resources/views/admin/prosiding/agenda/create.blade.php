@section('title')
    Agenda Baru -
@endsection
<x-master-layouts>
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Agenda Baru</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a href="{{ route('agenda.index') }}">Agenda</a>
                                    </li>
                                    <li class="breadcrumb-item active">Tambah
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
                        <div class="card p-1">
                            <div class="content-body">
                                <div class="row" id="basic-table">
                                    <div class="col-12">
                                        <div class="card">
                                            <form action="{{ route('agenda.store') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label><h5>Judul</h5></label>
                                                        <input type="text" name="title" class="form-control" placeholder="Judul Agenda" value="{{ old('title') }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><h5>Keterangan</h5></label>
                                                        <textarea name="description" class="ckeditor" id="" cols="30" rows="10">{{ old('keterangan') }}</textarea>
                                                    </div>
                                                    <div class="form-group mb-2">
                                                        <label><h5>Waktu</h5></label>
                                                        <input type="text" name="date" id="fp-date-time" class="form-control flatpickr-date-time" placeholder="YYYY-MM-DD HH:MM" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label><h5>Link (opsional)</h5></label>
                                                        <input type="text" name="url" class="form-control" placeholder="https://example.com">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary mt-2"><i data-feather="save"></i> SIMPAN</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Crop Photo</h5>
                                            <button type="button" class="close" id="closeAtas" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row" style="overflow: hidden;">
                                                <div class="col-md-4" style="width:25%;">
                                                    <div class="nav nav-tabs" style="display: inline;" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                        <a id="16-9-tab" data-toggle="pill" href="#v-16-9" role="tab" aria-controls="v-16-9" aria-selected="true" style="padding:0px;color:#3a3a3a;">
                                                            <button class="btn btn-primary btn-block">16:9</button>
                                                            <div id="preview-16-9" class="text-center" style="visibility: hidden;"></div>
                                                        </a>
                                                        <a id="4-3-tab" data-toggle="pill" href="#v-4-3" role="tab" aria-controls="v-4-3" aria-selected="false" style="padding:0px;color:#3a3a3a;">
                                                            <button class="btn btn-primary btn-block">4:3</button>
                                                            <div id="preview-4-3" class="text-center" style="visibility: hidden;"></div>
                                                        </a>
                                                        <a id="1-1-tab" data-toggle="pill" href="#v-1-1" role="tab" aria-controls="v-1-1" aria-selected="false" style="padding:0px;color:#3a3a3a;">
                                                            <button class="btn btn-primary btn-block">1:1</button>
                                                            <div id="preview-1-1" style="visibility: hidden;"></div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="tab-content" id="v-pills-tabContent">
                                                        <div class="tab-pane fade show active text-center" id="v-16-9" role="tabpanel" aria-labelledby="16-9-tab">
                                                            <div class="bg-primary text-white">16:9</div>
                                                            <img src="" id="16-9-show">
                                                        </div>
                                                        <div class="tab-pane fade text-center" id="v-4-3" role="tabpanel" aria-labelledby="4-3-tab">
                                                            <div class="bg-primary text-white">4:3</div>
                                                            <img src="" id="4-3-show"/>4:3</div>
                                                        <div class="tab-pane fade text-center" id="v-1-1" role="tabpanel" aria-labelledby="1-1-tab">
                                                            <div class="bg-primary text-white">1:1</div>
                                                            <img src="" id="1-1-show"/>1:1</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Crop</button>
                                            <button type="button" class="btn btn-secondary" aria-label="Close" id="onClose">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @push('vendor-css')
                            <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendors/css/vendors.min.css">
                            <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendors/css/forms/select/select2.min.css">
                            <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendors/css/editors/quill/katex.min.css">
                            <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendors/css/editors/quill/monokai-sublime.min.css">
                            <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendors/css/editors/quill/quill.snow.css">
                            <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendors/css/pickers/pickadate/pickadate.css">
                            <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendors/css/pickers/flatpickr/flatpickr.min.css">
                            @endpush
                            @push('page-css')
                            <link rel="stylesheet" href="{{asset('backend/plugins/bootstrap-fileinput/css/fileinput.css')}}">
                            <link rel="stylesheet" href="{{ asset('assets') }}/vendors/cropperjs/cropper.css">
                            <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/core/menu/menu-types/vertical-menu.css">
                            <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/plugins/forms/form-quill-editor.css">
                            <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/plugins/forms/pickers/form-flat-pickr.css">
                            <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/plugins/forms/pickers/form-pickadate.css">
                            @endpush
                            @push('custom-scripts')
                            <script src="{{ asset('assets') }}/vendors/js/pickers/pickadate/picker.js"></script>
                            <script src="{{ asset('assets') }}/vendors/js/pickers/pickadate/picker.date.js"></script>
                            <script src="{{ asset('assets') }}/vendors/js/pickers/pickadate/picker.time.js"></script>
                            <script src="{{ asset('assets') }}/vendors/js/pickers/pickadate/legacy.js"></script>
                            <script src="{{ asset('assets') }}/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
                            <script src="{{ asset('assets') }}/vendors/js/forms/select/select2.full.min.js"></script>
                            <script src="{{ asset('assets') }}/vendors/js/editors/quill/katex.min.js"></script>
                            <script src="{{ asset('assets') }}/vendors/js/editors/quill/highlight.min.js"></script>
                            <script src="{{ asset('assets') }}/vendors/js/editors/quill/quill.min.js"></script>
                            @endpush
                            @push('page-js')
                            <script src="{{asset('backend/plugins/bootstrap-fileinput/js/fileinput.js')}}"></script>
                            <script src="{{asset('backend/plugins/bootstrap-fileinput/themes/fa/theme.js')}}"></script>
                            <script src="{{ asset('assets') }}/vendors/cropperjs/cropper.js"></script>
                            <script src="{{ asset('assets') }}/js/scripts/pages/page-blog-edit.js"></script>
                            <script src="{{ asset('assets') }}/ckeditorx/ckeditor.js"></script>
                            <script src="{{ asset('assets') }}/js/scripts/forms/pickers/form-pickers.js"></script>
                            <script src="{{ asset('assets') }}/js/scripts/forms/form-select2.js"></script>
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    $('.ckeditor').ckeditor();
                                });
                            </script>
                            <script>
                                window.addEventListener('addNaskah', event => {
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
                            <script src="{{ asset('assets') }}/js/scripts/forms/form-crop-image.js"></script>
                            @endpush
                        </div>
                    </div>
                </div>
                @include('admin.modals.alert')
            </div>
        </div>
    </div>
</x-master-layouts>
