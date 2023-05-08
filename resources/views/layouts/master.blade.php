<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>E-commerce</title>
</head>
<body>
    <div id="wrapper" class="overflow-auto">

        <x-header />
        <x-sidebar />

        <div class="content-page">
            <div class="content">
                @yield('content')
            </div>
        </div>
        <x-footer />
    </div>
</body>
<script>

</script>
</html>
