<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>

    @include('components.layouts.partials._head')
</head>

<body>
    {{ $slot }}


    @include('components.layouts.partials._foot')
</body>

</html>
