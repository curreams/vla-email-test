<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Test Email') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/vue-multiselect@2.1.0/dist/vue-multiselect.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        body {
            padding-top: 65px;
            padding-bottom: 20px;
        }

        /* Set padding to keep content from hitting the edges */
        .body-content {
            padding-left: 15px;
            padding-right: 15px;
        }

        /* Override the default bootstrap behavior where horizontal description lists
        will truncate terms that are too long to fit in the left column.
        Also, add a 8pm to the bottom margin
        */
        .dl-horizontal dt {
            white-space: normal;
            margin-bottom: 8px;
        }

        /* Set width on the form input elements since they're 100% wide by default */
        input,
        select,
        textarea,
        .uploaded-file-group,
        .input-width-input {
            max-width: 380px;
        }

        .input-delete-container {
            width: 46px !important;
        }

        /* Vertically align the table cells inside body-panel */
        .panel-body .table > tr > td
        {
            vertical-align: middle;
        }

        .panel-body-with-table
        {
            padding: 0;
        }

        .mt-5 {
            margin-top: 5px !important;
        }

        .mb-5 {
            margin-bottom: 5px !important;
        }
    </style>

</head>

<body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar">A</span>
            <span class="icon-bar">B</span>
            <span class="icon-bar">C</span>
        </button>
        <a href="#" class="navbar-brand">{{ config('app.name', 'booking-engine') }}</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <!-- Authentication Links -->
            <ul class="nav navbar-nav">

            </ul>
        </div><!--/.nav-collapse -->
    </div>
    </nav>

    <div class="container body-content">
        @yield('content')
    </div>

    <!-- Scripts -->

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    @yield('scripts')

</body>
</html>
