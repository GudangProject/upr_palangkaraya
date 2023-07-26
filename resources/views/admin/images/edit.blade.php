<x-master-layouts>
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-7 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h3 class="content-header-title float-left mb-0">Image</h3>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('images.index') }}">List Image</a>
                                    </li>
                                    <li class="breadcrumb-item active">Edit</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section id="multiple-column-form">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <form class="form" method="POST" enctype="multipart/form-data" action="{{ route('images.update', $data->id) }}">
                                    @method('PUT')
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-8 col-12">


                                                <div class="form-group">
                                                    <h5 class="text-primary">JUDUL</h5>
                                                    <input id="title" name="title" type="text" class="form-control" placeholder="Judul Image" value="{{ $data->title }}"/>
                                                    @if ($errors->has('title'))<span class="text-danger">{{$errors->first('title')}}</span>@endif
                                                </div>


                                                <div class="form-group">
                                                    <h5 class="text-primary">LINK/URL</h5>
                                                    <input id="url" name="url" type="url" class="form-control" placeholder="https://" value="{{ $data->url }}"/>
                                                    @if ($errors->has('url'))<span class="text-danger">{{$errors->first('url')}}</span>@endif
                                                </div>
                                                {{-- <div class="form-group">
                                                    <h5 class="text-primary">SLUG</h5>
                                                    <div class="alert alert-primary" role="alert">
                                                        <div class="alert-body"><strong id="text-slug"> {{ $data->slug }}</strong></div>
                                                    </div>
                                                    <span id="input-slug" style="display:none;">
                                                        <input name="slug" type="text" id="slug" class="form-control mb-1" value="{{ $data->slug }}"/>
                                                        <button type="button" class="btn btn-primary btn-xs" id="simpan_slug">OK</button>
                                                        <button type="button" class="btn btn-secondary btn-xs" id="close_slug">Cancel</button>
                                                    </span>
                                                    @if ($errors->has('slug'))<span class="text-danger">{{$errors->first('slug')}}</span>@endif
                                                </div> --}}

                                                <div class="form-group">
                                                    <h5 class="text-primary">KATEGORI</h5>
                                                    <select name="category_id" class="form-control" id="basicSelect">
                                                        <option value="">-- Pilih Kategori --</option>
                                                        @foreach ($categories as $item)
                                                        <option value="{{ $item->id }}" {{ ($item->id == $data->category_id ? 'selected' : '') }}>{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('category_id'))
                                                    <span class="text-danger">
                                                        {{ $errors->first('category_id') }}
                                                    </span>
                                                    @endif
                                                </div>

                                                <div class="form-group">
                                                    <h5 class="text-primary">DESKRIPSI</h5>
                                                    <textarea name="description" class="form-control">{{ $data->description }}</textarea>
                                                    @if ($errors->has('description'))<span class="text-danger">{{$errors->first('description')}}</span>@endif
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12">

                                                <div class="form-group form-group border rounded p-1">
                                                    <h5 class="text-primary">IMAGE</h5>
                                                    <div class="custom-file text-center">
                                                        <img name="image" src="{{ asset($data->image) }}" alt="users avatar" class="user-avatar users-avatar-shadow rounded my-25 cursor-pointer" width="100%" />
                                                        <div class="media-body mt-50">
                                                            <label class="btn btn-primary mb-0" for="change-picture">
                                                                <span class="d-none d-sm-block">Pilih Image</span>
                                                                <input class="form-control" name="image" type="file" accept="image/*" id="change-picture" hidden/>
                                                                <span class="d-block d-sm-none">
                                                                    <i class="mr-0" data-feather="edit"></i>
                                                                </span>
                                                            </label>
                                                        </div>
                                                        @if ($errors->has('image'))
                                                        <span class="text-danger">
                                                            {{ $errors->first('image') }}
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group border rounded p-1">
                                                    <h5 class="text-primary">STATUS</h5>
                                                    <div class="d-flex flex-row">
                                                        <div class="custom-control custom-radio">
                                                            <input name="status" type="radio" id="customRadio4" class="custom-control-input" value="1" {{ ($data->status == 1 ? 'checked' : '') }}/>
                                                            <label class="custom-control-label" for="customRadio4">Terbit</label>
                                                        </div>
                                                        <div class="custom-control custom-radio ml-2">
                                                            <input name="status" type="radio" id="customRadio5" class="custom-control-input" value="2" {{ ($data->status == 2 ? 'checked' : '') }}/>
                                                            <label class="custom-control-label" for="customRadio5">Tidak</label>
                                                        </div>
                                                    </div>
                                                    @if ($errors->has('status'))<span class="text-danger">{{$errors->first('status')}}</span>@endif
                                                </div>
                                                <div class="form-group border rounded p-1">
                                                    <button type="submit" class="btn btn-primary mr-1">Simpan</button>
                                                    <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    @include('admin.components.imagecrop')
    @include('admin.components.slug')
    @include('admin.components.texteditor')

    @push('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/pickers/form-flat-pickr.css')}}">
    @endpush

    @push('scripts')
    <script src="{{asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/forms/pickers/form-pickers.js')}}"></script>
    <script>
        $(function () {
            var changePicture = $('#change-picture'),
                userAvatar = $('.user-avatar'),
                languageSelect = $('#users-language-select2'),
                form = $('.form-validate'),
                birthdayPickr = $('.birthdate-picker');

            // Change user profile picture
            if (changePicture.length) {
                $(changePicture).on('change', function (e) {
                var reader = new FileReader(),
                    files = e.target.files;
                reader.onload = function () {
                    if (userAvatar.length) {
                    userAvatar.attr('src', reader.result);
                    }
                };
                reader.readAsDataURL(files[0]);
                });
            }
        });
    </script>
    @endpush
</x-master-layouts>
