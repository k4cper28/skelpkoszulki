<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        .container2 {
            justify-content: center;
            align-items: center;
            color: white;
            align-items: center;
            justify-content: center;
            gap: 70px;
        }

        .error1 {
            font-size: 10px;
            color: red;
        }

        tbody {
            display: flex;
            flex-direction: column;
            gap: 10px;
            text-align: center;
        }

        td {
            width: 120px;
        }

        textarea {
            resize: none;
            width: 250px;
            height: 120px;
            font-size: 15px;
            font-family: Georgia, serif;
            padding-top: 5px;
        }

        input {
            width: 250px;
            height: 30px;
            font-size: 15px;
            font-family: Georgia, serif;
        }

        .text-input {
            background: linear-gradient(to right top, var(--dark3), var(--dark2));
            /*background: #262626;*/
            border-radius: 10px;
            color: white;
            padding-left: 10px;
            border: solid 1px white;
        }

        label {
            font-size: 20px;
            font-family: Georgia, serif;
        }

        .button {
            text-align: center;
            border-radius: 40px;
            width: 100px;
            font-family: Georgia, serif;
        }

        #myform {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        #opis {
            display: flex;
            flex-direction: column;
            align-items: center;
            font-family: Georgia, serif;
            gap: 10px;
        }

        .success {
            font-size: 30px;
            font-family: Georgia, serif;
        }

        #flex {
            display: flex;
            flex-direction: column;
            gap: 40px;
        }

    </style>
</head>
<body class="antialiased">
@include('layouts.navbar')
<div id="center">
    <div class="container2">
        <div id="flex">
            <div id="opis">
                <h1>Masz Problem?</h1>
                <h2>Napisz do Nas już teraz!</h2>
                <h2>Pomożemy ci jak najszybciej możemy</h2>
            </div>
            <form action="" method="post" action="{{ route('contact.store') }}" id="myform">
                @csrf
                <table>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label>Imie</label>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="text-input {{ $errors->has('name') ? 'error' : '' }}"
                                       name="name"
                                       id="name">
                                <!-- Error -->
                                @if ($errors->has('name'))
                                    <div class="error1">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label>Email</label>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="email" class="text-input {{ $errors->has('email') ? 'error' : '' }}"
                                       name="email" id="email">
                                @if ($errors->has('email'))
                                    <div class="error1">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label>Telefon</label>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="text-input {{ $errors->has('phone') ? 'error' : '' }}"
                                       name="phone" id="phone">
                                @if ($errors->has('phone'))
                                    <div class="error1">
                                        {{ $errors->first('phone') }}
                                    </div>
                                @endif
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label>Tytuł</label>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="text-input {{ $errors->has('subject') ? 'error' : '' }}"
                                       name="subject" id="subject">
                                @if ($errors->has('subject'))
                                    <div class="error1">
                                        {{ $errors->first('subject') }}
                                    </div>
                                @endif
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label>Wiadomość</label>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                            <textarea class="text-input {{ $errors->has('message') ? 'error' : '' }}" name="message"
                                      id="message" rows="4"></textarea>
                                @if ($errors->has('message'))
                                    <div class="error1">
                                        {{ $errors->first('message') }}
                                    </div>
                                @endif
                            </div>
                        </td>
                    </tr>
                </table>
                <input type="submit" name="send" value="Submit" class="button">
            </form>

            <!-- Success message -->
            @if(Session::has('success'))
                <div class="success">
                    {{Session::get('success')}}
                </div>
            @endif
        </div>
    </div>
</div>

</body>
</html>
