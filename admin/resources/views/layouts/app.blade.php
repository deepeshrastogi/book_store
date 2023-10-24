<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
        {{-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" /> --}}
        <link href="{{ asset('admin/css/styles.css') }}" rel="stylesheet" />
        <link href="{{ asset('admin/css/custom.css') }}" rel="stylesheet" />
    </head>
    <body class="font-sans antialiased">
        <div class="main">
            <div>
                @include('layouts.inc.header')
                <div id="layoutSidenav">
                    @include('layouts.inc.sidebar')
                    <div id="layoutSidenav_content">
                        <main>
                            {{ $slot }}
                        </main>
                        @include('layouts.inc.footer')
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('admin/js/all.min.js') }}"></script>
        <script src="{{ asset('admin/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ asset('admin/js/scripts.js') }}"></script>
        <script src="{{ asset('admin/js/jquery.min.js') }}"></script>
        <script src="{{ asset('admin/js/custom.js') }}"></script>
        @yield('scripts')
    </body>
</html>
