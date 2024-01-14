<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>


    </style>
</head>
<body>
@include('layouts.navbar')
<div id="center">
    <div class="container2">
        @auth
            <form role="form" action="{{ route('dodajPrzedmiot') }}" id="item-form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Przedmiot: </label>
                    <input type="text" name="title" id="title" required>
                    @error('title')
                    <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="price">Cena: </label>
                    <input type="text" name="price" id="price" required>
                    @error('price')
                    <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Opis: </label>
                    <textarea type="text" name="description" id="description" required></textarea>
                    @error('description')
                    <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="images">Obraz: </label>
                    <input type="file" name="images" id="images" required>
                    @error('images')
                    <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category_id">Kategoria:</label>
                    <select name="category_id" id="category_id">
                        <option value="1">Ekstraklasa</option>
                        <option value="2">La Liga</option>
                        <option value="3">Premier League</option>
                        <option value="4">BundesLiga</option>
                        <option value="5">League One</option>
                        <option value="6">Serie A</option>
                        <option value="7">Inne</option>
                    </select>
                    @error('category_id')
                    <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="button">Dodaj przedmiot</button>
            </form>
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
