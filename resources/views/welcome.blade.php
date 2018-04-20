<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <title>{{ config('app.name') }}</title>
    </head>
    <body>
        <section class="hero is-success is-fullheight">
            <div class="hero-body">
                <div class="container has-text-centered">
                    <h1 class="title">
                        {{ config('app.name') }}
                    </h1>
                </div>
            </div>
        </section>
    </body>
</html>
