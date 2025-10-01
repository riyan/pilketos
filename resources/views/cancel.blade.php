<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Aplikasi Pemilihan Ketua OSIS</title>
    <link href="{{asset('css/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
    <style>
        html {
            font-size: 14px;
        }
        @media (min-width: 768px) {
            html {
                font-size: 16px;
            }
        }

        body {
            background-image: url("{{asset('storage/bg-pliketos.png')}}");
            background-position: top;
            background-repeat: no-repeat;
            z-index: 1;
        }

        .container {
            max-width: 960px;
        }

        .pricing-header {
            max-width: 700px;
        }

        .card-deck .card {
            min-width: 220px;
        }
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
        .h-32{ height: 8rem; }
        #loading {
            position: fixed;
            display: flex;
            text-align: center;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            opacity: 0.7;
            background-color: #000;
            z-index: 99;
        }

        .loading-image {
            z-index: 100;
            margin: auto;
        }
    </style>
  </head>
  <body>
    <div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <a href="/">
            <img class="h-32 w-auto text-center" src="{{ asset('storage/panitia_osis_logo.png') }}" alt="pilketos">
        </a>
        <h3 class="mt-1">PEMILIHAN KETUA OSIS SMPN 23 BANJARMASIN</h3>
    </div>

    <div class="container">

        <div id="info" class="card mb-4 shadow-sm">
            <div class="card-header bg-danger">
                <h3 class="my-0 font-extrabold text-center text-white">INFORMASI</h3>
            </div>
            <div class="card-body text-center">
                {!! $pesan !!}
            </div>
        </div>

        <footer class="pt-4 my-md-2 pt-md-5 border-top">
            <div class="row">

            </div>
        </footer>
    </div>
    <script type="text/javascript" src="{{asset('js/jquery-3.7.1.min.js')}}"></script>
    <script>
        $(function() {
            setTimeout(() => {
                window.location = '/';
            }, 5000);
        });
    </script>
  </body>
</html>
