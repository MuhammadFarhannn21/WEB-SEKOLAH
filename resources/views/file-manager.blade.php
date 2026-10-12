<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>File Manager</title>
    <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        html, body { height: 100%; overflow: hidden; }
        #app { height: 100vh; }
    </style>
</head>
<body>
    <div id="app"></div>
    <script>
        window.Laravel = { csrfToken: '{{ csrf_token() }}' };
        window.axios_base_url = '{{ url('/') }}';
    </script>
    <script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
</body>
</html>