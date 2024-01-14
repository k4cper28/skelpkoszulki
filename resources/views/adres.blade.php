<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        #adresy {
            display: flex;
            flex-direction: row;
            gap: 10px;
            padding: 50px 20px 50px 20px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .adres-info {
            width: 250px;
            height: 250px;
            background: linear-gradient(to right top, var(--dark), var(--blue));
            display: flex;
            flex-direction: column;
            align-items: center;
            color: white;
            border: solid 2px black;
            border-radius: 20px;
            justify-content: space-between;
            padding-top: 20px;
            padding-bottom: 20px;
        }

        .adres-info-plus{
            width: 250px;
            height: 250px;
            background: linear-gradient(to right top, var(--dark), var(--blue));
            display: flex;
            flex-direction: column;
            align-items: center;
            color: white;
            border: solid 2px black;
            border-radius: 20px;
            justify-content: center;
        }
        .opis {
            width: 100px;
        }

        .wynik {
            width: 100px;
        }

        td {
            padding-bottom: 10px;
        }

        .container3{
            justify-content: flex-start;
        }

        .button {
            text-align: center;
            border-radius: 40px;
            width: 100px;
            font-family: Georgia, serif;
            height: 30px;
        }
    </style>
</head>
<body>
@include('layouts.navbar')
<div id="center">
    <div class="container3">
        @auth
            @include('layouts.profilenavbar')
            <div id="adresy">
                @foreach($address as $adres)
                    <div class="adres-info">
                        <table>
                            <tr>
                                <td class="opis">Kraj</td>
                                <td class="wynik">{{$adres->country}}</td>
                            </tr>
                            <tr>
                                <td class="opis">Miasto</td>
                                <td class="wynik">{{$adres->city}}</td>
                            </tr>
                            <tr>
                                <td class="opis">Ulica</td>
                                <td class="wynik">{{$adres->street}}</td>
                            </tr>
                            <tr>
                                <td class="opis">Kod Pocztowy</td>
                                <td class="wynik">{{$adres->zipcode}}</td>
                            </tr>
                        </table>

                        <form action="{{ route('deleteAdres', $adres->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button" onclick="return confirm('Jesteś pewien?')">Usuń</button>
                        </form>

                    </div>
                @endforeach
                <div class="adres-info-plus">
                    <a href="{{ url('/adres-create') }}"><img id="plus" src="{{ URL('storage/plus.png') }}" width="96"
                                                              height="96"></a>
                </div>
            </div>
        @endauth

        @guest
            <div class="zalogujsie">
                <p>Zaloguj sie aby mięć dostęp do tych funkcji!</p>
            </div>
        @endguest
    </div>
</div>
</body>
</html>
