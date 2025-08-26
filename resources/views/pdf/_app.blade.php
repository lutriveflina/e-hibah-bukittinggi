<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Resmi</title>
    @include('pdf._style')
    @stack('style')
</head>

<body>
    @yield('pdf-content')
    @stack('scripts')
</body>

</html>
