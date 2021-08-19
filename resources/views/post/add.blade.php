<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Login </title>
</head>

<body>
    <div class="container">
        <h1>THÊM BÀI VIÊT </h1>
        {!! Form::open(['url' => 'post/store', 'method' => 'POST', 'files' => true]) !!}
        @csrf
        <div class="form-group">
            {!! Form::label('Title', null, ['for' => 'title']) !!}
            {!! Form::text('title', null, ['id' => 'title', 'class' => 'form-control', 'placeholder' => 'Enter Title']) !!}

            @error('title')
                <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            {{-- cú pháp laravel colective Form::tên thẻ('name', value, [id, class, hoặc bất cứ thứ gì]) --}}

            {!! Form::label('content', null, ['for' => 'content']) !!}
            {!! Form::textarea('content', null, ['id' => 'content', 'class' => 'form-control', 'placeholder' => 'Enter Content']) !!}
            {!! Form::file('fileUpload', ['class' => 'form-control-file']) !!}
            @error('content')
                <small class="alert alert-danger">{{ $message }}</small>
            @enderror


        </div>

        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}


        {!! Form::close() !!}
    </div>





    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <script src="https://cdn.tiny.cloud/1/cnix2sz22fu4vyvrtryxa2askzg23vxiodt6jfeejf46eind/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>

    <script>
        var editor_config = {
            path_absolute: "http://localhost/LARAVEL_PRO/blog/",
            selector: 'textarea',
            relative_urls: false,
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table directionality",
                "emoticons template paste textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            file_picker_callback: function(callback, value, meta) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName(
                    'body')[0].clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document
                    .getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
                if (meta.filetype == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.openUrl({
                    url: cmsURL,
                    title: 'Filemanager',
                    width: x * 0.8,
                    height: y * 0.8,
                    resizable: "yes",
                    close_previous: "no",
                    onMessage: (api, message) => {
                        callback(message.content);
                    }
                });
            }
        };

        tinymce.init(editor_config);
    </script>
</body>

</html>
