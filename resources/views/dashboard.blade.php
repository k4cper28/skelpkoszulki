<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        #guzik {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            flex-direction: column;
        }

        #aktualizuj_form {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .input_change label {
            /*display: flex;*/
            padding-right: 20px;
        }

        #edit section div h2 {
            margin-bottom: 20px;
        }

        #info {
            margin-bottom: 15px;
        }

        #wynik {
            margin: 0;
        }

        h2 {
            text-align: center;
        }

        .button {
            text-align: center;
            border-radius: 40px;
            width: 100px;
            font-family: Georgia, serif;
            height: 30px;
        }

        #name, #email {
            width: 250px;
            height: 30px;
            font-size: 15px;
            font-family: Georgia, serif;
            background: linear-gradient(to right top, var(--dark3), var(--dark2));
            /*background: #262626;*/
            border-radius: 10px;
            color: white;
            padding-left: 10px;
            border: solid 1px white;
        }

        tbody {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        th {
            width: 60px;
        }

        table {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
@include('layouts.navbar')
<div id="center">
    <div class="container3">
        @include('layouts.profilenavbar')
        <div id="edit">
            <section>
                <div id="info">
                    <h2>
                        {{ __('Informacje profilu') }}
                    </h2>
                    <p>
                        {{ __("Zaktualizuj informacje profilowe i adres e-mail swojego konta.") }}
                    </p>
                </div>
                <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                    @csrf
                </form>
                <form method="post" action="{{ route('profile.update') }}" id="aktualizuj_form">
                    @csrf
                    @method('patch')

                    <table class="input_table">
                        <tr>
                            <th>
                                <x-input-label for="name" :value="__('Nick: ')"/>
                            </th>
                            <td>
                                <x-text-input id="name" name="name" type="text" class="input"
                                              :value="old('name', $user->name)" required autofocus autocomplete="name"/>
                                <x-input-error class="mt-2" :messages="$errors->get('name')"/>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <x-input-label for="email" :value="__('Email: ')"/>
                            </th>
                            <td>
                                <x-text-input id="email" name="email" type="email" class="input"
                                              :value="old('email', $user->email)" required autocomplete="username"/>
                                <x-input-error class="mt-2" :messages="$errors->get('email')"/>
                            </td>
                        </tr>
                    </table>

                    <div id="guzik">
                        <button class="button">{{ __('Zapisz') }}</button>

                        @if (session('status') === 'profile-updated')
                            <p id="wynik"
                               x-data="{ show: true }"
                               x-show="show"
                               x-transition
                               x-init="setTimeout(() => show = false, 2000)"
                            >{{ __('ZAPISANO') }}</p>
                        @endif
                    </div>
                </form>
            </section>


        </div>
    </div>
</div>
</body>
</html>
