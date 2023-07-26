$(function(){
    $("#pic-form").fileinput({
        showCaption: false,
        showUpload: false,
        dropZoneEnabled: false,
        maxImageWidth: 3072,
        maxImageHeight: 2304,
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

                if(width > 5440 || height > 3810){
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
