<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        .form-group label{
            width: 120px;
            justify-content: center;
            align-items: center;
            display: flex;
            gap: 10px;
        }

        .form-group{
            display: flex;
            flex-direction: row;
            margin-bottom: 15px;
        }

        #addres-form{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            font-family: Georgia, serif;
            border: solid 1px black;
            margin: 0 30% 0 30%;
            padding: 30px 30px 30px 30px;
            border-radius: 20px;
            background-color: #1f2937;
        }

        input, select{
            width: 250px;
            height: 30px;
            font-size: 15px;
            font-family: Georgia, serif;
            background: linear-gradient(to right top, var(--dark3), var(--dark2));
            color: white;
            border-radius: 10px;
            color: white;
            padding-left: 10px;
            border: solid 1px white;
        }

        select option{

            font-family: Georgia, serif;
            color: white;
            background-color: #1f2937;
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
            <form role="form" action="{{ route('storeAdres') }}" id="addres-form"
                  method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                <label for="country">Państwo:</label>
                <select name="country" id="country">
                    <option value="Poland">Polska</option>
                    <option value="USA">Stany Zjednoczone</option>
                    <option value="Germany">Niemcy</option>
                    <option value="France">Francja</option>
                    <option value="Spain">Hiszpania</option>
                    <option value="Italy">Włochy</option>
                    <option value="United Kingdom">Wielka Brytania</option>
                    <option value="Canada">Kanada</option>
                    <option value="Australia">Australia</option>
                    <option value="Brazil">Brazylia</option>
                </select>
                </div>
                <div class="form-group">
                    <label for="city">Miasto:</label>
                    <input type="text" name="city" id="city" required>
                </div>

                <div class="form-group">
                    <label for="street">Ulica:</label>
                    <input type="text" name="street" id="street" required placeholder="Jagodowa 10">
                </div>

                <div class="form-group">
                    <label for="postal_code">Kod pocztowy:</label>
                    <input type="text" name="zipcode" id="zipcode" required placeholder="00-000">
                </div>

                <button type="submit" class="button">Dodaj adres</button>
            </form>

            @if($errors->has('error'))
                <div class="alert alert-danger">
                    {{ $errors->first('error') }}
                </div>
            @endif

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
