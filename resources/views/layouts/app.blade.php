<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Simple CMS</title>
</head>

<body class="hold-transition sidebar-mini layout-fixed">



        <div class="wrapper">




            {{--  START HEADER --}}
            @include('layouts.header')
            {{--  END HEADER --}}

            {{--  MAIN SIDEBAR --}}
            @include('layouts.sidebar')
            {{--  /.Main Sidebar --}}

            {{-- START CONTENT WRAPPER --}}
            <div class="content-wrapper">
                @yield('content')
            </div>
            {{-- END CONTENT WRAPPER --}}
            {{-- START FOOTER --}}
            @include('layouts.footer')
            {{-- END FOOTER --}}

    </div>
    @include('layouts.script')
</body>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
</html>
