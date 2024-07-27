<!DOCTYPE html>
<html>

<head>
    <title>@yield('title', 'CRUD Application TK4 - Team 1')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
</head>

<body>
    <header>
        <h1>CRUD Application TK4 - Team 1</h1>
        @include('layouts.nav')
    </header>

    <main>
        @yield('content')
    </main>

    <script>
        $(document).ready(function() {
            $('#productTable').DataTable({
                "pageLength": 5
            });
        });
    </script>
</body>

</html>
