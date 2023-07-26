<x-master-layouts>
    @include('sweetalert::alert')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Configuration CMS</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Configuration</a>
                                    </li>
                                    <li class="breadcrumb-item active">Setting
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrumb-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="app-todo.html"><i class="mr-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i class="mr-1" data-feather="message-square"></i><span class="align-middle">Chat</span></a><a class="dropdown-item" href="app-email.html"><i class="mr-1" data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item" href="app-calendar.html"><i class="mr-1" data-feather="calendar"></i><span class="align-middle">Calendar</span></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section class="modern-vertical-wizard">
                    <div class="bs-stepper vertical wizard-modern modern-vertical-wizard-example">
                        <div class="bs-stepper-header">
                            <div class="step" data-target="#account-details-vertical-modern">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">
                                        <i data-feather="file-text" class="font-medium-3"></i>
                                    </span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Website Details</span>
                                        <span class="bs-stepper-subtitle">Setup Web App Details</span>
                                    </span>
                                </button>
                            </div>
                            <div class="step" data-target="#personal-info-vertical-modern">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">
                                        <i data-feather="user" class="font-medium-3"></i>
                                    </span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Owner Name</span>
                                        <span class="bs-stepper-subtitle">Select Owner Name</span>
                                    </span>
                                </button>
                            </div>
                            <div class="step" data-target="#address-step-vertical-modern">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">
                                        <i data-feather="map-pin" class="font-medium-3"></i>
                                    </span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Address</span>
                                        <span class="bs-stepper-subtitle">Add Address</span>
                                    </span>
                                </button>
                            </div>
                            <div class="step" data-target="#social-links-vertical-modern">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">
                                        <i data-feather="link" class="font-medium-3"></i>
                                    </span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Social Links</span>
                                        <span class="bs-stepper-subtitle">Add Social Links</span>
                                    </span>
                                </button>
                            </div>
                        </div>
                        <div class="bs-stepper-content">
                            <form action="{{ route('configuration.update', 1) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div id="account-details-vertical-modern" class="content">
                                    <div class="content-header">
                                        <h5 class="mb-0">Website Details</h5>
                                        <small class="text-muted">Enter Your Aplication or CMS Details.</small>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="vertical-modern-username">Name</label>
                                            <input type="text" value="{{ $data->name ? $data->name : old('name') }}" id="vertical-modern-username" class="form-control" name="name" placeholder="Jarwonotech Cafe" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="vertical-modern-username">SEO Tags</label>
                                            <input type="text" value="{{ $data->tags ? $data->tags : old('tags') }}" id="vertical-modern-username" class="form-control" name="tags" placeholder="startup, company, trendy" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group form-password-toggle col-md-12">
                                            <label class="form-label" for="vertical-modern-confirm-password">Description</label>
                                            <textarea name="description" id="" cols="30" rows="5" class="form-control">{{ $data->description ? $data->description : 'Insert your descripton web app'}}</textarea>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-12 mb-2">
                                            <div class="border rounded p-2">
                                                <h4 class="mb-1">Logo</h4>
                                                <div class="media flex-column flex-md-row">
                                                    <div class="media-body">
                                                        @if (isset($data->logo))
                                                            <img src="{{ asset('storage/images/logo').'/'.$data->logo }}" id="blog-feature-image" class="rounded mr-2 mb-1 mb-md-0 bg-secondary" alt="Blog Featured Image" />
                                                        @endif
                                                        <p class="my-50">
                                                            <small class="text-muted">Required 228px x 36px Image max size 2MB.</small>
                                                            <br>
                                                            <a href="javascript:void(0);" id="blog-image-text">{{ $data->logo ? asset('storage/images/logo').'/'.$data->logo : 'C:\fakepath\Logo.jpg' }}</a>
                                                        </p>
                                                        <div class="d-inline-block">
                                                            <div class="form-group mb-0">
                                                                    <input class="w-50" type="file" id="pic-form" name="logo" enctype="image/*">
                                                                    <input type="hidden" name="16_9_width" id="16_9_width"/>
                                                                    <input type="hidden" name="16_9_height" id="16_9_height"/>
                                                                    <input type="hidden" name="16_9_x" id="16_9_x"/>
                                                                    <input type="hidden" name="16_9_y" id="16_9_y"/>

                                                                    <input type="hidden" name="4_3_width" id="4_3_width"/>
                                                                    <input type="hidden" name="4_3_height" id="4_3_height"/>
                                                                    <input type="hidden" name="4_3_x" id="4_3_x"/>
                                                                    <input type="hidden" name="4_3_y" id="4_3_y"/>

                                                                    <input type="hidden" name="1_1_width" id="1_1_width"/>
                                                                    <input type="hidden" name="1_1_height" id="1_1_height"/>
                                                                    <input type="hidden" name="1_1_x" id="1_1_x"/>
                                                                    <input type="hidden" name="1_1_y" id="1_1_y"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <a class="btn btn-outline-secondary btn-prev" disabled>
                                            <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
                                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                        </a>
                                        <a class="btn btn-primary btn-next">
                                            <span class="align-middle d-sm-inline-block d-none">Next</span>
                                            <i data-feather="arrow-right" class="align-middle ml-sm-25 ml-0"></i>
                                        </a>
                                    </div>
                                </div>
                                <div id="personal-info-vertical-modern" class="content">
                                    <div class="content-header">
                                        <h5 class="mb-0">Owner</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mb-1">
                                            <a href="{{ route('users.create') }}" class="btn btn-primary btn-block">Create New User</a>
                                        </div>
                                        <div class="col-md-12 mb-1">
                                            <label>Get from data user</label>
                                            <select class="select2 form-control" name="owner_id">
                                                @if (isset($data))
                                                    <option value="{{ $data->owner_id }}">{{ $data->getOwner->name }}</option>
                                                @endif
                                                @foreach ($users as $user)
                                                     <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <a class="btn btn-primary btn-prev">
                                            <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
                                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                        </a>
                                        <a class="btn btn-primary btn-next">
                                            <span class="align-middle d-sm-inline-block d-none">Next</span>
                                            <i data-feather="arrow-right" class="align-middle ml-sm-25 ml-0"></i>
                                        </a>
                                    </div>
                                </div>
                                <div id="address-step-vertical-modern" class="content">
                                    <div class="content-header">
                                        <h5 class="mb-0">Address Google Maps</h5>
                                        <small>Copy embed url google maps.</small>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <textarea name="address_map" id="" cols="30" rows="1" class="form-control">{!! $data->address_map ?? 'https://www.google.com/maps/embed?pb=...' !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="content-header">
                                        <h5 class="mb-0">Address</h5>
                                        <small>Enter Your Address.</small>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <textarea name="address" id="" cols="30" rows="5" class="form-control">{!! $data->address !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <a class="btn btn-primary btn-prev">
                                            <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
                                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                        </a>
                                        <a class="btn btn-primary btn-next">
                                            <span class="align-middle d-sm-inline-block d-none">Next</span>
                                            <i data-feather="arrow-right" class="align-middle ml-sm-25 ml-0"></i>
                                        </a>
                                    </div>
                                </div>
                                <div id="social-links-vertical-modern" class="content">
                                    <div class="content-header">
                                        <h5 class="mb-0">Social Links</h5>
                                        <small>Enter Your Social Links.</small>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="vertical-modern-email">Email</label>
                                            <input type="email" id="vertical-modern-email" class="form-control" name="email" value="{{ $data->email ? $data->email : old('email') }}" placeholder="jarwonozt@email.com" aria-label="jarwonoztr" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="vertical-modern-facebook">WhatsApp Number</label>
                                            <input type="number" name="whatsapp" id="vertical-modern-facebook" class="form-control" placeholder="0821234567" value="{{ $data->whatsapp ? $data->whatsapp : old('whatsapp') }}"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="vertical-modern-twitter">Twitter</label>
                                            <input type="text" name="twitter" id="vertical-modern-twitter" class="form-control" placeholder="@myname" value="{{ $data->twitter ? $data->twitter : old('twitter') }}"/>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="vertical-modern-facebook">Facebook</label>
                                            <input type="url" name="facebook" id="vertical-modern-facebook" class="form-control" placeholder="https://facebook.com/abc" value="{{ $data->facebook ? $data->facebook : old('facebook') }}"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="vertical-modern-twitter">Instagram</label>
                                            <input type="text" name="instagram" id="vertical-modern-twitter" class="form-control" placeholder="@yourig" value="{{ $data->instagram ? $data->instagram : old('instagram') }}"/>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="vertical-modern-facebook">Tiktok</label>
                                            <input type="url" name="tiktok" id="vertical-modern-facebook" class="form-control" placeholder="https://tiktok.com/abc" value="{{ $data->tiktok ? $data->tiktok : old('tiktok') }}"/>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <a class="btn btn-primary btn-prev">
                                            <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
                                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                        </a>
                                        <button type="submit" class="btn btn-success btn-submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@push('vendor-css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendors/css/vendors.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendors/css/forms/wizard/bs-stepper.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendors/css/forms/select/select2.min.css">
@endpush
@push('page-css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/core/menu/menu-types/vertical-menu.css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/plugins/forms/form-validation.css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/plugins/forms/form-wizard.css">
<link rel="stylesheet" href="{{asset('backend/plugins/bootstrap-fileinput/css/fileinput.css')}}">
@endpush
@push('page-js')
<script src="{{asset('backend/plugins/bootstrap-fileinput/js/fileinput.js')}}"></script>
<script src="{{asset('backend/plugins/bootstrap-fileinput/themes/fa/theme.js')}}"></script>
<script src="{{ asset('assets') }}/vendors/js/forms/wizard/bs-stepper.min.js"></script>
<script src="{{ asset('assets') }}/vendors/js/forms/select/select2.full.min.js"></script>
<script src="{{ asset('assets') }}/vendors/js/forms/validation/jquery.validate.min.js"></script>
<script src="{{ asset('assets') }}/js/scripts/forms/form-wizard.js"></script>
<script>
    $(function(){
        $("#pic-form").fileinput({
            showCaption: false,
            showUpload: false,
            dropZoneEnabled: false,
            maxImageWidth: 1024,
            maxImageHeight: 768,
            browseLabel: "Pick Image",
            mainClass: "input-group",
            browseIcon: "<i class=\"fa fa-picture-o\"></i> ",
            allowedFileExtensions: ["jpg", "png", "gif", "jpeg"]
        }).on('fileloaded', function(event, file, previewId, index, reader){
            var t_file = file.type;
            if(t_file){
                var img = new Image();
                img.src = reader.result;
                img.onload = (e) => {
                    width = e.target.naturalWidth;
                    height = e.target.naturalHeight;

                    if(width > 1440 || height > 810){
                        alert('dimension image terlalu besar');
                        $("#pic-form").fileinput('clear');
                    }else{
                        var fileImg = reader.result;

                        $('#16-9-show').attr("src", fileImg);
                        $('#4-3-show').attr("src", fileImg);
                        $('#1-1-show').attr("src", fileImg);

                        const image16_9         = document.getElementById('16-9-show');
                        var previews16_9        = document.getElementById('preview-16-9');
                        var preview16_9Ready    = false;

                        var cropper16_9       = new Cropper(image16_9, {
                            viewMode: 2,
                            ready: function(){
                                var clone = this.cloneNode();
                                clone.className = '';
                                clone.style.cssText = (
                                    'display: block;' +
                                    'width: 178px;' +
                                    'min-width: 0;' +
                                    'min-height: 0;' +
                                    'max-width: none;' +
                                    'max-height: none;'
                                );
                                previews16_9.appendChild(clone.cloneNode());
                                var cropBoxData = cropper16_9.getCropBoxData();
                                var imageData   = cropper16_9.getImageData();
                                var data        = cropper16_9.getData();

                                var previewAspectRatio = data.width / data.height;
                                var previewImage = previews16_9.getElementsByTagName('img').item(0);
                                var previewWidth = 178;
                                var previewHeight = previewWidth / previewAspectRatio;
                                var imageScaledRatio = data.width / previewWidth;

                                previews16_9.style.height = previewHeight + 'px';
                                previewImage.style.width = imageData.naturalWidth / imageScaledRatio + 'px';
                                previewImage.style.height = imageData.naturalHeight / imageScaledRatio + 'px';
                                previewImage.style.marginLeft = -data.x / imageScaledRatio + 'px';
                                previewImage.style.marginTop = -data.y / imageScaledRatio + 'px';

                                $('#16_9_width').val(data.width);
                                $('#16_9_height').val(data.height);
                                $('#16_9_x').val(data.x);
                                $('#16_9_y').val(data.y);

                                preview16_9Ready = true;
                            },
                            crop: function(event) {
                                if (!preview16_9Ready) {
                                    return;
                                }
                                var data = event.detail;
                                var imageData = cropper16_9.getImageData();
                                var previewAspectRatio = data.width / data.height;

                                var previewImage = previews16_9.getElementsByTagName('img').item(0);
                                var previewWidth = previews16_9.offsetWidth;
                                var previewHeight = previewWidth / previewAspectRatio;
                                var imageScaledRatio = data.width / previewWidth;

                                previews16_9.style.height = previewHeight + 'px';
                                previewImage.style.width = imageData.naturalWidth / imageScaledRatio + 'px';
                                previewImage.style.height = imageData.naturalHeight / imageScaledRatio + 'px';
                                previewImage.style.marginLeft = -data.x / imageScaledRatio + 'px';
                                previewImage.style.marginTop = -data.y / imageScaledRatio + 'px';

                                $('#16_9_width').val(event.detail.width);
                                $('#16_9_height').val(event.detail.height);
                                $('#16_9_x').val(event.detail.x);
                                $('#16_9_y').val(event.detail.y);
                            },
                            responsive: true,
                            rotatable: false,
                            scalable: false,
                            zoomable: false,
                            zoomOnTouch: false,
                            zoomOnWheel: false,
                            minContainerWidth: 570,
                            minContainerHeight: 300,
                            aspectRatio: 16 / 9,
                        });
                        const image4_3 = document.getElementById('4-3-show');
                        var previews4_3        = document.getElementById('preview-4-3');
                        var preview4_3Ready    = false;
                        var cropper4_3 = new Cropper(image4_3, {
                            ready: function(event){
                                var clone = this.cloneNode();
                                clone.className = '';
                                clone.style.cssText = (
                                    'display: block;' +
                                    'width: 178px;' +
                                    'min-width: 0;' +
                                    'min-height: 0;' +
                                    'max-width: none;' +
                                    'max-height: none;'
                                );

                                previews4_3.appendChild(clone.cloneNode());
                                var cropBoxData = cropper4_3.getCropBoxData();
                                var imageData   = cropper4_3.getImageData();
                                var data        = cropper4_3.getData();

                                var previewAspectRatio = data.width / data.height;
                                var previewImage = previews4_3.getElementsByTagName('img').item(0);
                                var previewWidth = 178;
                                var previewHeight = previewWidth / previewAspectRatio;
                                var imageScaledRatio = data.width / previewWidth;

                                previews4_3.style.height = previewHeight + 'px';
                                previewImage.style.width = imageData.naturalWidth / imageScaledRatio + 'px';
                                previewImage.style.height = imageData.naturalHeight / imageScaledRatio + 'px';
                                previewImage.style.marginLeft = -data.x / imageScaledRatio + 'px';
                                previewImage.style.marginTop = -data.y / imageScaledRatio + 'px';

                                $('#4_3_width').val(data.width);
                                $('#4_3_height').val(data.height);
                                $('#4_3_x').val(data.x);
                                $('#4_3_y').val(data.y);

                                preview4_3Ready = true;
                            },
                            crop: function(event) {
                                if (!preview4_3Ready) {
                                    return;
                                }
                                var data = event.detail;
                                var imageData = cropper4_3.getImageData();
                                var previewAspectRatio = data.width / data.height;

                                var previewImage = previews4_3.getElementsByTagName('img').item(0);
                                var previewWidth = previews4_3.offsetWidth;
                                var previewHeight = previewWidth / previewAspectRatio;
                                var imageScaledRatio = data.width / previewWidth;

                                previews4_3.style.height = previewHeight + 'px';
                                previewImage.style.width = imageData.naturalWidth / imageScaledRatio + 'px';
                                previewImage.style.height = imageData.naturalHeight / imageScaledRatio + 'px';
                                previewImage.style.marginLeft = -data.x / imageScaledRatio + 'px';
                                previewImage.style.marginTop = -data.y / imageScaledRatio + 'px';

                                $('#4_3_width').val(event.detail.width);
                                $('#4_3_height').val(event.detail.height);
                                $('#4_3_x').val(event.detail.x);
                                $('#4_3_y').val(event.detail.y);
                            },
                            responsive: true,
                            rotatable: false,
                            scalable: false,
                            zoomable: false,
                            zoomOnTouch: false,
                            zoomOnWheel: false,
                            minContainerWidth: 570,
                            minContainerHeight: 300,
                            aspectRatio: 4 / 3,
                        });
                        const image1_1 = document.getElementById('1-1-show');
                        var previews1_1        = document.getElementById('preview-1-1');
                        var preview1_1Ready    = false;
                        var cropper1_1 = new Cropper(image1_1, {
                            ready: function(event){
                                var clone = this.cloneNode();
                                clone.className = '';
                                clone.style.cssText = (
                                    'display: block;' +
                                    'width: 178px;' +
                                    'min-width: 0;' +
                                    'min-height: 0;' +
                                    'max-width: none;' +
                                    'max-height: none;'
                                );
                                previews1_1.appendChild(clone.cloneNode());
                                var cropBoxData = cropper1_1.getCropBoxData();
                                var imageData   = cropper1_1.getImageData();
                                var data        = cropper1_1.getData();

                                var previewAspectRatio = data.width / data.height;
                                var previewImage = previews1_1.getElementsByTagName('img').item(0);
                                var previewWidth = 178;
                                var previewHeight = previewWidth / previewAspectRatio;
                                var imageScaledRatio = data.width / previewWidth;

                                previews1_1.style.height = previewHeight + 'px';
                                previewImage.style.width = imageData.naturalWidth / imageScaledRatio + 'px';
                                previewImage.style.height = imageData.naturalHeight / imageScaledRatio + 'px';
                                previewImage.style.marginLeft = -data.x / imageScaledRatio + 'px';
                                previewImage.style.marginTop = -data.y / imageScaledRatio + 'px';

                                $('#1_1_width').val(data.width);
                                $('#1_1_height').val(data.height);
                                $('#1_1_x').val(data.x);
                                $('#1_1_y').val(data.y);

                                preview1_1Ready = true;
                            },
                            crop: function(event) {
                                if (!preview1_1Ready) {
                                    return;
                                }
                                var data = event.detail;
                                var imageData = cropper1_1.getImageData();
                                var previewAspectRatio = data.width / data.height;

                                var previewImage = previews1_1.getElementsByTagName('img').item(0);
                                var previewWidth = previews1_1.offsetWidth;
                                var previewHeight = previewWidth / previewAspectRatio;
                                var imageScaledRatio = data.width / previewWidth;

                                previews1_1.style.height = previewHeight + 'px';
                                previewImage.style.width = imageData.naturalWidth / imageScaledRatio + 'px';
                                previewImage.style.height = imageData.naturalHeight / imageScaledRatio + 'px';
                                previewImage.style.marginLeft = -data.x / imageScaledRatio + 'px';
                                previewImage.style.marginTop = -data.y / imageScaledRatio + 'px';

                                $('#1_1_width').val(event.detail.width);
                                $('#1_1_height').val(event.detail.height);
                                $('#1_1_x').val(event.detail.x);
                                $('#1_1_y').val(event.detail.y);
                            },
                            responsive: true,
                            rotatable: false,
                            scalable: false,
                            zoomable: false,
                            zoomOnTouch: false,
                            zoomOnWheel: false,
                            minContainerWidth: 570,
                            minContainerHeight: 300,
                            aspectRatio: 1 / 1,
                        });
                        $('#modal-default').modal({
                            show: true,
                            keyboard: false,
                            backdrop: 'static'
                        }).on('hidden.bs.modal', function (e) {

                            $('#preview-16-9').html('');
                            var preview16_9Ready    = false;
                            $('#16-9-show').attr('src','#');
                            cropper16_9.destroy();

                            $('#preview-4-3').html('');
                            var preview4_3Ready    = false;
                            $('#4-3-show').attr('src','#');
                            cropper4_3.destroy();

                            $('#preview-1-1').html('');
                            var preview1_1Ready    = false;
                            $('#1-1-show').attr('src','#');
                            cropper1_1.destroy();

                            $('.cropper-container').remove();
                        });
                        $('#onClose').on('click', function(){
                            $('#modal-default').modal('hide');

                            $('#preview-16-9').html('');
                            var preview16_9Ready    = false;
                            $('#16_9_width').val('');
                            $('#16_9_height').val('');
                            $('#16_9_x').val('');
                            $('#16_9_y').val('');

                            $('#16-9-show').attr('src','#');
                            cropper16_9.destroy();

                            $('#preview-4-3').html('');
                            var preview4_3Ready    = false;
                            $('#4_3_width').val('');
                            $('#4_3_height').val('');
                            $('#4_3_x').val('');
                            $('#4_3_y').val('');
                            $('#4-3-show').attr('src','#');
                            cropper4_3.destroy();

                            $('#preview-1-1').html('');
                            var preview1_1Ready    = false;
                            $('#1_1_width').val('');
                            $('#1_1_height').val('');
                            $('#1_1_x').val('');
                            $('#1_1_y').val('');
                            $('#1-1-show').attr('src','#');
                            cropper1_1.destroy();

                            $('.cropper-container').remove();
                            $("#pic-form").fileinput('clear');
                        });
                        $('#closeAtas').on('click', function(){
                            $('#modal-default').modal('hide');

                            $('#preview-16-9').html('');
                            var preview16_9Ready    = false;
                            $('#16_9_width').val('');
                            $('#16_9_height').val('');
                            $('#16_9_x').val('');
                            $('#16_9_y').val('');

                            $('#16-9-show').attr('src','#');
                            cropper16_9.destroy();

                            $('#preview-4-3').html('');
                            var preview4_3Ready    = false;
                            $('#4_3_width').val('');
                            $('#4_3_height').val('');
                            $('#4_3_x').val('');
                            $('#4_3_y').val('');
                            $('#4-3-show').attr('src','#');
                            cropper4_3.destroy();

                            $('#preview-1-1').html('');
                            var preview1_1Ready    = false;
                            $('#1_1_width').val('');
                            $('#1_1_height').val('');
                            $('#1_1_x').val('');
                            $('#1_1_y').val('');
                            $('#1-1-show').attr('src','#');
                            cropper1_1.destroy();

                            $('.cropper-container').remove();
                            $("#pic-form").fileinput('clear');
                        });
                    }
                };
            }
        });
    })
</script>
@endpush
</x-master-layouts>

