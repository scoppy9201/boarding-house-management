 function ChangeToSlug(title)
{
    var slug;
 
    //Lấy text từ thẻ input title 
 
    //Đổi chữ hoa thành chữ thường
    slug = title.toLowerCase();
 
    //Đổi ký tự có dấu thành không dấu
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    //Xóa các ký tự đặt biệt
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    //Đổi khoảng trắng thành ký tự gạch ngang
    slug = slug.replace(/ /gi, "-");
    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    //Xóa các ký tự gạch ngang ở đầu và cuối
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
    //In slug ra textbox có id “slug”
    return slug;
}

var DropzoneExample = function () {
    var DropzoneDemos = function () {
        Dropzone.options.singleFileUpload = {
            paramName: "file",
            maxFiles: 1,
            maxFilesize: 5,
            acceptedFiles: "image/*",
            addRemoveLinks: true,
            renameFile: function (file) {
                var name = ChangeToSlug(document.getElementById('name_room').value);
                return name+ "___" + file.name;
            },
            removedfile: function(file) 
            {
                var name = file.upload.filename;
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                    type: 'POST',
                    url: 'delete-anh',
                    data: {filename: name},
                    success: function (data){
                        console.log(data);
                    },
                    error: function(e) {

                        console.log(e);
                    }});
                    var fileRef;
                    return (fileRef = file.previewElement) != null ? 
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
            },
            success: function (file, response) {
                $('#path_img').val(response.success);
                console.log(response.success);
            },
            error: function (file, response) {
                console.log(response);
                return false;
            }
        };
        Dropzone.options.singleFileUploadAvatar = {
            paramName: "file",
            maxFiles: 1,
            maxFilesize: 5,
            acceptedFiles: "image/*",
            addRemoveLinks: true,
            renameFile: function (file) {
                const d = new Date();
                var name = ChangeToSlug(document.getElementById('name').value);
                return name + d.getTime() + file.name;
            },
            removedfile: function(file) 
            {
                var name = file.upload.filename;
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                    type: 'POST',
                    url: 'api/delete-image-user',
                    data: {filename: name},
                    success: function (data){
                        console.log(data);
                    },
                    error: function(e) {

                        console.log(e);
                    }});
                    var fileRef;
                    return (fileRef = file.previewElement) != null ? 
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
            },
            success: function (file, response) {
                $('#path_img').val(response.success);
                console.log(response.success);
            },
            error: function (file, response) {
                console.log(response);
                return false;
            }
        };
// Upload ảnh chính phòng trọ
        Dropzone.options.singleFileUploadRoom = {
            paramName: "file",
            maxFiles: 1,
            maxFilesize: 5,
            acceptedFiles: "image/*",
            addRemoveLinks: true,
            renameFile: function (file) {
               
                const d = new Date();
                return "anh_phong_id_"+id + d.getTime() + file.name;
            },
            removedfile: function(file) 
            {
                var name = file.upload.filename;
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                    type: 'POST',
                    url: 'api/delete-main-image-room',
                    data: {filename: name},
                    success: function (data){
                        console.log(data);
                    },
                    error: function(e) {

                        console.log(e);
                    }});
                    var fileRef;
                    return (fileRef = file.previewElement) != null ? 
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
            },
            success: function (file, response) {
                $('#path_img').val(response.success);
                console.log(response.success);
            },
            error: function (file, response) {
                console.log(response);
                return false;
            }
        };
        Dropzone.options.multiFileUploadRoom = {
            paramName: "file",
            maxFiles: 5,
            maxFilesize: 5,
            acceptedFiles: "image/*",
            addRemoveLinks: true,
            renameFile: function (file) {
                const d = new Date();
                var name = ChangeToSlug(document.getElementById('name').value);
                return name + d.getTime() + file.name;
            },
            removedfile: function(file) 
            {
                var name = file.upload.filename;
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                    type: 'POST',
                    url: 'api/delete-image-user',
                    data: {filename: name},
                    success: function (data){
                        console.log(data);
                    },
                    error: function(e) {

                        console.log(e);
                    }});
                    var fileRef;
                    return (fileRef = file.previewElement) != null ? 
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
            },
            success: function (file, response) {
                $('#path_img').val(response.success);
                console.log(response.success);
            },
            error: function (file, response) {
                console.log(response);
                return false;
            }
        };
        Dropzone.options.multiFileUpload = {
            paramName: "file",
            maxFiles: 10,
            maxFilesize: 10,
            accept: function(file, done) {
                if (file.name == "justinbieber.jpg") {
                    done("Naha, you don't.");
                } else {
                    done();
                }
            }
        };
        Dropzone.options.fileTypeValidation = {
            paramName: "file",
            maxFiles: 10,
            maxFilesize: 10, 
            acceptedFiles: "image/*,application/pdf,.psd",
            accept: function(file, done) {
                if (file.name == "justinbieber.jpg") {
                    done("Naha, you don't.");
                } else {
                    done();
                }
            }
        };
    }
    return {
        init: function() {
            DropzoneDemos();
        }
    };
}();
DropzoneExample.init();

