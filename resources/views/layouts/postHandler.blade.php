@if (!$modal)

    <html lang="{{ app()->getLocale() }}">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="x-ua-compatible" content="ie=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover, minimum-scale=1.0, user-scalable=yes">
            <meta name="theme-color" content="#008dc9">

        </head>

        <body hidden style="display:none">
            @yield('content')

            <script id="postHandlerRedirect">
                var pathname = window.location.pathname;

                window.location = '/?postHandler=' + pathname + window.location.search;

            </script>
        </body>
    </html>
@else
    @yield('content')
@endif
