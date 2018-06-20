<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Test Laravel</title>
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ URL::asset('public/css/main.css') }}">
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
        <script src="{{ URL::asset('public/js/main.js') }}"></script>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="m-b-md">
                    <label for="file">Paste Url</label>
                    <input type="text" id="file" name="file">
                </div>

                <div class="files">
                    @foreach ($files as $file)
                    <div class="box">
                        <a class="download" href="{{ $file->path }}" download>{{ basename($file->url) }} </a>
                        <a id="destroy{{ $file->id }}" class="destroy" href="/destroy/{{ $file->id }}"> remove</a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </body>
</html>
