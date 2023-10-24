<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link href="{{ asset('admin/css/styles.css') }}" rel="stylesheet" />
        <link href="{{ asset('admin/css/custom.css') }}" rel="stylesheet" />
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">@yield('form_title')</h3></div>
                                        <div class="card-body">
                                    {{ $slot }}
                                        </div>
                                    </div>
                                </div>
                         </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                @include('layouts/inc/footer')
            </div>
        </div>
    </body>
</html>
