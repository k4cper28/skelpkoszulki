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
            margin-top: 10px;
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

        .input_change {
            margin-bottom: 10px;
        }

        #edit section div h2 {
            margin-bottom: 20px;
        }

        #info {
            margin-bottom: 15px;
        }


        #srodek {
            text-align: center;
        }

        input {
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
            align-items: center;
            gap: 15px;
        }

        th {
            width: 120px;
        }

        .button {
            text-align: center;
            border-radius: 40px;
            width: 100px;
            font-family: Georgia, serif;
            height: 30px;
        }

        .zalogujsie {
            display: flex;
            flex-direction: row;
            text-align: center;
            align-items: center;
            justify-content: center;
            color: white;
            font-family: Georgia, serif;
            font-size: 30px;
            border: solid 1px black;
            margin: 300px 0 300px 0;
            padding: 0 50px 0 50px;
            border-radius: 20px;
            background: linear-gradient(to right bottom, var(--dark), var(--blue));
        }
    </style>
</head>
<body>
@include('layouts.navbar')
<div id="center">
    <div class="container3">
        @auth
            @include('layouts.profilenavbar')
            <div id="edit">
                <section>
                    <div id="info">
                        <h2 id="srodek">
                            {{ __('Zaktualizuj hasło') }}
                        </h2>

                        <p>
                            {{ __('Aby zachować bezpieczeństwo, upewnij się, że Twoje konto używa długiego, losowego hasła.') }}
                        </p>
                    </div>

                    <form method="post" action="{{ route('password.update') }}" id="aktualizuj_form">
                        @csrf
                        @method('put')

                        <table class="input_table">
                            <tr>
                                <th>
                                    <x-input-label for="current_password" :value="__('Aktualne hasło: ')"/>
                                </th>
                                <td>
                                    <x-text-input id="current_password" name="current_password" type="password"
                                                  class="input" autocomplete="current-password"/>
                                    <x-input-error :messages="$errors->updatePassword->get('current_password')"
                                                   class="mt-2"/>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <x-input-label for="password" :value="__('Nowe hasło:')"/>
                                </th>
                                <td>
                                    <x-text-input id="password" name="password" type="password" class="input"
                                                  autocomplete="new-password"/>
                                    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2"/>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <x-input-label for="password_confirmation" :value="__('Potwierdz hasło: ')"/>
                                </th>
                                <td>
                                    <x-text-input id="password_confirmation" name="password_confirmation"
                                                  type="password"
                                                  class="input" autocomplete="new-password"/>
                                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')"
                                                   class="mt-2"/>
                                </td>
                            </tr>
                        </table>

                        <div id="guzik">
                            <button class="button">{{ __('Zapisz') }}</button>

                            @if (session('status') === 'password-updated')
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600 dark:text-gray-400"
                                >{{ __('Saved.') }}</p>
                            @endif
                        </div>
                    </form>
                </section>

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
