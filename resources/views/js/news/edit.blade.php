
<!-- Dropzone js -->
<script src="{{asset('assets/js/dropzone/dropzone.js')}}"></script>
<script>
var Path_main_image = '';
var Path_main_image_old = '{{$data->thumbnail}}';
var DropzoneExample = function() {
    var DropzoneDemos = function() {
        // Upload ảnh chính phòng trọ
        Dropzone.options.UploadThumnailNews = {
            paramName: "file",
            maxFiles: 1,
            maxFilesize: 5,
            acceptedFiles: "image/*",
            addRemoveLinks: true,
            renameFile: function(file) {

                const d = new Date();
                return "anh_bai_viet_id"+ d.getTime() + file.name;
            },
            removedfile: function(file) {
                var name = file.upload.filename;
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'PUT',
                    url: `{{ route('delete_image', ':path') }}`.replace(":path",
                        'thumbnail_news'),
                    data: {
                        filename: name
                    },
                    success: function(data) {
                        $('#bg-img').attr('src', '{{ asset('images/thumbnail_news') }}'+'/'+Path_main_image_old)
                $('#UploadThumnailNews').css('background-image', `url("{{ asset('images/thumbnail_news') }}`+'/'+Path_main_image_old+`")`)
                        Path_main_image = "";
                        console.log(data);
                    },
                    error: function(e) {
                        console.log(e);
                    }
                });
                var fileRef;
                return (fileRef = file.previewElement) != null ?
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
            },
            success: function(file, response) {
                Path_main_image = response.success;
                $('#bg-img').attr('src', '{{ asset('images/thumbnail_news') }}'+'/'+Path_main_image)
                $('#UploadThumnailNews').css('background-image', `url("{{ asset('images/thumbnail_news') }}`+'/'+Path_main_image+`")`)
                console.log(response.success);
            },
            error: function(file, response) {
                console.log(response);
                return false;
            },
            init: function() {
                this.on("addedfile", function() {
                    if (this.files[1] != null) {
                        this.removeFile(this.files[0]);
                    }
                });
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
</script>
<script>
    $('#submit').on('click', function(ev) {
           var content = tinymce.get("content").getContent();
           var slug = '{{ $data->slug }}';
           var data = {
               slug: slug,
               author_id : '{{ $user->id }}',
               name : $('#name').val(),
               category_id: $('#category_id').val(),
               short_content: $('#short_content').val(),
               content : content,
               thumbnail: Path_main_image != '' ? Path_main_image : Path_main_image_old,
               keyword : allKeywords,
           }
           console.log(data);
           $.ajax({
               type: "post",
               dataType: "json",
               data: data,
               url: `{{ route('news.api.update') }}`,
               success: function(data) {
                   slug = data.slug;
                   window.location="{{ route('news.confirm_update', ':slug') }}".replace(':slug', slug)

               },
               error: function(e) {
                   if (typeof e.responseJSON.errors !== 'undefined') {
                       for (const [key, value] of Object.entries(e.responseJSON.errors)) {
                           makeToast(value, "red");
                       }

                   }else {
                           makeToast("Lỗi, thử lại sau !!!", "red");
                           console.log(e.responseJSON.error);
                       }

               }
           });
       });
</script>