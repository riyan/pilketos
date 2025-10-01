<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Aplikasi Pemilihan Ketua OSIS</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">

        <!-- Styles -->
        <style>
            body {
                background-image: url("{{asset('storage/bg-pliketos.png')}}");
                background-position: top;
                background-repeat: no-repeat;
                z-index: 1;
            }
           .text-black {
                color: rgb(0 0 0)
            }
            .bg-black\/90 {
                background-color: rgb(0 0 0 / 0.90)
            }
            .bg-red {
                background-color: rgb(256 0 0 / 0.5)
            }
            .h-32{ height: 8rem; }
            .mt-3 { margin-top: 1rem; }
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
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen selection:bg-red-500 selection:text-white">
            <div class="max-w-7xl mx-auto p-1">
                <div class="flex justify-center">
                    <a href="/">
                        <img class="h-32 w-auto text-center" src="{{ asset('storage/panitia_osis_logo.png') }}" alt="pilketos">
                    </a>
                </div>
                <div class="flex justify-center">
                    <h2 class="mt-3 text-center text-xl font-semibold text-gray-900">PEMILIHAN KETUA OSIS SMPN 23 BANJARMASIN</h2>
                </div>

                <div class="mt-3">
                    <div class="grid grid-cols-1">
                        <div id="qr-reader"></div>
                    </div>
                </div>

                <div class="flex justify-center mt-3 px-0 sm:items-center sm:justify-between">
                    <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-left">
                        <div class="flex items-center gap-4">
                            <a href="#" class="group inline-flex items-center hover:text-gray-700 dark:hover:text-red focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="-mt-px mr-1 w-5 h-5 stroke-gray-400 dark:stroke-gray-600 group-hover:stroke-gray-600 dark:group-hover:stroke-gray-400">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                </svg>
                                Made by Riyan Maulana, S.Kom for SMPN 23 Banjarmasin
                            </a>
                        </div>
                    </div>

                    <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                        PILKETOS v.1.0 (PHP v{{ PHP_VERSION }})
                    </div>
                </div>
            </div>
        </div>

        <div id="loading">
            <div>
            <svg class="loading-image" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" width="200" height="200" style="shape-rendering: auto; display: block; background: transparent;" xmlns:xlink="http://www.w3.org/1999/xlink"><g><circle stroke-linecap="round" fill="none" stroke-dasharray="50.26548245743669 50.26548245743669" stroke="#ff0011" stroke-width="8" r="32" cy="50" cx="50">
                <animateTransform values="0 50 50;360 50 50" keyTimes="0;1" repeatCount="indefinite" dur="1s" type="rotate" attributeName="transform"></animateTransform>
              </circle>
              <circle stroke-linecap="round" fill="none" stroke-dashoffset="36.12831551628262" stroke-dasharray="36.12831551628262 36.12831551628262" stroke="#ffffff" stroke-width="8" r="23" cy="50" cx="50">
                <animateTransform values="0 50 50;-360 50 50" keyTimes="0;1" repeatCount="indefinite" dur="1s" type="rotate" attributeName="transform"></animateTransform>
              </circle><g></g></g><!-- [ldio] generated by https://loading.io -->
            </svg>
            <h3>SEDANG DIPROSES MOHON MENUNGGU...</h3>
        </div>
        </div>

        <script type="text/javascript" src="{{asset('js/html5-qrcode.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/jquery-3.7.1.min.js')}}"></script>
        <script>
            function docReady(fn) {
                $('#loading').hide();
                // see if DOM is already available
                if (document.readyState === "complete"
                    || document.readyState === "interactive") {
                    // call on next available tick
                    setTimeout(fn, 1);
                } else {
                    document.addEventListener("DOMContentLoaded", fn);
                }
            }

            docReady(function () {
                //var resultContainer = document.getElementById('qr-reader-results');
                var lastResult, countResults = 0, base_url = window.location.origin;
                var config = {
                        fps: 10,
                        qrbox: {width: 200, height: 200},
                        rememberLastUsedCamera: true,
                        // Only support camera scan type.
                        supportedScanTypes: [Html5QrcodeScanType.SCAN_TYPE_CAMERA]
                    }

                function onScanSuccess(decodedText, decodedResult) {
                    $('#loading').show();
                    if (decodedText !== lastResult) {
                        ++countResults;
                        lastResult = decodedText;
                        // Handle on success condition with the decoded message.
                        console.log(`Scan result ${decodedText}`, decodedResult);
                        window.location = decodedText;
                    }
                }

                var html5QrcodeScanner = new Html5QrcodeScanner("qr-reader", config, false);
                html5QrcodeScanner.render(onScanSuccess);
                console.log(base_url);
            });
        </script>
    </body>
</html>
