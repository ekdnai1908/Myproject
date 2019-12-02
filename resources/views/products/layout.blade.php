<!DOCTYPE html>
<html>
<head>

    <link href="{{url('/bootstrap.min.css')}}" rel="stylesheet">
{{--    <link rel="stylesheet" type="text/css" href="{{asset('DataTables/datatables.min.css')}}"/>--}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" integrity="sha384-KA6wR/X5RY4zFAHpv/CnoG2UW1uogYfdnP67Uv7eULvTveboZJg0qUpmJZb5VqzN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"/>
</head>
<body>

<div class="container">
    @yield('content')

</div>
{{--<script type="text/javascript" charset="utf8" src="{{url('/')}}/datatables.js"></script>--}}
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
@yield('sc_js')
</body>
</html>
