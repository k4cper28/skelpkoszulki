<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        .przedmiot{
            display: flex;
            flex-direction: column;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            align-content: center;
            gap: 10px;
            border: solid 1px black;
            padding: 20px 20px 20px 20px;
            background: #1f2937;
            border-radius: 20px;
        }

        #przedmioty{
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            margin-top: 30px;
            color: white;
        }

        #desctiption{
            width: 150px;
            height: 90px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }

    </style>

</head>
<body class="antialiased">
@include('layouts.navbar')
<div id="center">
    <div class="container2">
        <div id="przedmioty">
        @foreach($products as $product)
            <div class="przedmiot">
                <img src="{{ asset('storage/images/' . $product->images) }}" alt="{{ $product->name }}" width="128"
                     height="128">
                <p> {{ $product->title }}</p>
                <p> {{ $product->price }}</p>
                <p id="desctiption"> {{ $product->description }}</p>
            </div>
        @endforeach
    </div>
    </div>
</div>
</body>
</html>
