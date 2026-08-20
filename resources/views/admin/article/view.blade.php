<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{$data['title']}}</title>
        <meta property="og:url"           content="{{$data['url']}}" />
        <meta property="og:type"          content="website" />
        <meta property="og:title"         content="{{$data['title']}}" />
        <meta property="og:description"   content="{{$data['description']}}" />
        <meta property="og:image"         content="{{$data['image']}}" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    </head>
    <body>
            <div class="container">
            <h2><b>{{$data['title']}}</b></h2>
            <div><img src="{{$data['image']}}" alt="" width="100%"></div>
            {!! $shareComponent !!}
            <div>{{$data['description']}}</div>
        </div>
    </body>
</html>