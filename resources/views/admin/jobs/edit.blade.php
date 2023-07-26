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
                            <h2 class="content-header-title float-left mb-0">Edit Jobs</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{ route('jobs.index') }}">Jobs</a>
                                    </li>
                                    <li class="breadcrumb-item active">Edit
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <div class="blog-edit-wrapper">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media mb-4">
                                        <div class="avatar mr-75">
                                            <img src="{{ asset('storage/images/users').'/'.auth()->user()->profile_photo_path }}" width="38" height="38" alt="Avatar" />
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mb-25">{{ auth()->user()->name }}</h6>
                                            <p class="card-text">{{ \Carbon\Carbon::now()->format('D, d M Y') }}</p>
                                        </div>
                                    </div>
                                    <!-- Form -->
                                    <form action="{{ route('jobs.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                            <div class="form-group">
                                                <label class="form-label" for="basic-icon-default-fullname">Job Title</label>
                                                <input type="text" class="form-control dt-full-name" name="jobTitle" value="{{ $data->title }}" id="basic-icon-default-fullname" placeholder="Web Developer" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" />
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="user-role">Category</label>
                                                <select id="category" class="select2 form-control" name="jobCategory">
                                                    @if ($data->category_id > 0)
                                                        <option value="{{ $data->category_id }}">{{ ucwords($data->getCategory->title) }}</option>
                                                    @endif
                                                    <optgroup label="Minimum">
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                                                        @endforeach
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="basic-icon-default-fullname">Company Name</label>
                                            <input type="text" class="form-control dt-full-name" name="jobCompany" value="{{ $data->company_name }}" id="basic-icon-default-fullname" placeholder="PT.Citamedia" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" />
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="basic-icon-default-uname">Type of role</label>
                                                <div class="demo-inline-spacing">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio1" name="jobType" class="custom-control-input" value="Full-Time" {{ $data->type == 'Full-Time' ? 'checked' : '' }} />
                                                        <label class="custom-control-label" for="customRadio1">Full-Time</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio2" name="jobType" class="custom-control-input"value="Part-Time" {{ $data->type == 'Part-Time' ? 'checked' : '' }}/>
                                                        <label class="custom-control-label" for="customRadio2">Part-Time</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio3" name="jobType" class="custom-control-input"value="Contract" {{ $data->type == 'Contract' ? 'checked' : '' }} />
                                                        <label class="custom-control-label" for="customRadio3">Contract</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio4" name="jobType" class="custom-control-input"value="Temporary" {{ $data->type == 'Temporary' ? 'checked' : '' }} />
                                                        <label class="custom-control-label" for="customRadio4">Temporary</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio5" name="jobType" class="custom-control-input"value="Internship" {{ $data->type == 'Internship' ? 'checked' : '' }}/>
                                                        <label class="custom-control-label" for="customRadio5">Internship</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="user-role">Position</label>
                                                <select id="jobsposition" class="select2 form-control" name="jobPosition">
                                                    @if ($data->position > 0)
                                                        <option value="{{ $data->position }}">{{ ucwords($data->position) }}</option>
                                                    @endif
                                                    <optgroup label="Position">
                                                        <option value="trial">Trial</option>
                                                        <option value="junior">Junior</option>
                                                        <option value="senior">Senior</option>
                                                    </optgroup>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="user-role">Experience</label>
                                                <select id="user-role" class="select2 form-control" name="jobExperience">
                                                    @if ($data->experience > 0)
                                                        <option value="{{ $data->experience }}">{{ ucwords($data->experience) }} Year</option>
                                                    @endif
                                                    <optgroup label="Minimum">
                                                        <option value="1">1 Year</option>
                                                        <option value="2">2 Year</option>
                                                        <option value="3">3 Year</option>
                                                        <option value="4">4 Year</option>
                                                        <option value="5">5 Year</option>
                                                        <option value="6">6 Year</option>
                                                        <option value="7">7 Year</option>
                                                        <option value="8">8 Year</option>
                                                        <option value="9">9 Year</option>
                                                        <option value="10">10 Year</option>
                                                        <option value="10>">More than 10</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="user-role">Work Location</label>
                                                <textarea class="form-control" name="jobLocation" id="" cols="30" rows="3">{{ $data->work_location }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="user-role">Budget</label>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="input-group mb-2">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">IDR</span>
                                                            </div>
                                                            <input type="number" class="form-control" name="jobBudgetMin" value="{{ $data->budget_min }}" placeholder="Minimum" aria-label="Amount (to the nearest dollar)"/>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="input-group mb-2">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">IDR</span>
                                                            </div>
                                                            <input type="number" class="form-control" name="jobBudgetMax"  value="{{ $data->budget_max }}" placeholder="Maximum" aria-label="Amount (to the nearest dollar)"/>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="user-role">Description</label>
                                                <textarea class="form-control ckeditor" wire:name="jobDescription" id="" cols="30" rows="3">{{ $data->description }}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="basic-icon-default-fullname">Tags</label>
                                                <input type="text" class="form-control dt-full-name" name="jobTags" value="{{ $data->tags }}" id="basic-icon-default-fullname" placeholder="web, teacher, writer" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" />
                                            </div>
                                            <div class="form-group">
                                                <div class="border rounded p-2">
                                                    <h4 class="mb-1">Company Logo</h4>
                                                    <div class="media flex-column flex-md-row">
                                                        @if ($data->image != null)
                                                            <img src="{{ asset('storage') }}/jobs/images/{{ $data->image }}" id="blog-feature-image" class="rounded mr-2 mb-1 mb-md-0" width="170" height="110" alt="Blog Featured Image" />
                                                        @else
                                                            <img src="{{ asset('assets') }}/images/slider/03.jpg" id="blog-feature-image" class="rounded mr-2 mb-1 mb-md-0" width="170" height="110" alt="Blog Featured Image" />
                                                        @endif
                                                        <div class="media-body">
                                                            <div class="d-inline-block">
                                                                <div class="form-group mb-0">
                                                                    <input class="w-50" type="file" id="pic-form" name="logo" enctype="multipart/form-data">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary mr-1 data-submit">Submit</button>
                                            <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>
    <script>
        function edValueKeyPress() {
            var edValue = document.getElementById("title");
            var s = edValue.value;

            var lblValue = document.getElementById("slug");
            lblValue.value = s.toLowerCase().replace(/[^\w-]+/g, '-');
        }

    </script>

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

