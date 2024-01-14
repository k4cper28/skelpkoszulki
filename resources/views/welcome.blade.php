<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        h1 {
            text-align: center;
            color: white;
            margin-top: 15px;
            font-family: Georgia, serif;
        }

        #baner {
            width: 86vw;
            height: 84vh;
        }

        #minibaner {
            background: black;
            width: 86vw;
            height: 150px;
            color: white;
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            align-items: center;
            font-family: Georgia, serif;
            border-radius: 10px;
        }

        .element {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 10px;
        }

        #podzial {
            display: flex;
            flex-direction: row;
            justify-content: space-evenly
        }

        #onas h2{
            text-align: center;
            color: white;
        }
    </style>
</head>
<body class="antialiased">
@include('layouts.navbar')
<div id="center">
    <div class="container2">
        <a href="{{ url('/sklep') }}"><img id="baner" src="{{ URL('storage/Baner.png') }}"></a>
        <div id="minibaner">
            <div class="element">
                <img src="{{ URL('storage/buzka.png') }}" width="32" height="32">
                <p>100% zadowolonia</p>
            </div>
            <div class="element">
                <img src="{{ URL('storage/koszulka.png') }}" width="32" height="32">
                <p>orginalne koszulki</p>
            </div>
            <div class="element">
                <img src="{{ URL('storage/karta.png') }}" width="32" height="32">
                <p>szybkie płatności</p>
            </div>
        </div>
{{--        <div id="onas">--}}
{{--            <h2> Informacje O nas</h2>--}}
{{--            <div id="podzial">--}}
{{--                <div id="leftonas">--}}
{{--                    <p>hej</p>--}}
{{--                </div>--}}
{{--                <div id="righonas">--}}
{{--                    <p>hej</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
</div>

</body>
</html>
