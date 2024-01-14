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
            color: white;
            text-align: center;
            margin-top: 20px;
        }

        .info{
            display: flex;
            flex-direction: column;
            color: white;
            font-family: Georgia, serif;
            gap: 20px;
        }

        #onas{
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        .banerinfo{
            width: 80vw;
            height: 70%;
        }

        li{
            list-style: none;
        }

        .tekst{
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-left: 20px;
            margin-right: 20px;
        }
        .zdjecie{
            display: flex;
            justify-content: center;
            align-items: center;
        }

        li{
            margin-bottom: 10px;
        }
    </style>
</head>
<body class="antialiased">
@include('layouts.navbar')
<div id="center">
    <div class="container2">
        <div id="onas">
            <h1>Kim jestesmy?</h1>
            <div class="info">
                <div class="tekst">
                    <p>Witaj w sklepie <strong>Soccer Shirts</strong>, miejscu, gdzie pasja do piłki nożnej spotyka się z najnowszymi trendami w modzie. Jesteśmy dumni z tego, że możemy dostarczać oryginalne koszulki piłkarskie, które nie tylko świetnie wyglądają, ale także odzwierciedlają miłość do tego sportu.</p>

                    <p>Nasz zespół składa się z prawdziwych fanów piłki nożnej, którzy dokładają wszelkich starań, aby zapewnić Ci najwyższą jakość produktów. Wierzymy, że każdy, kto nosi nasze koszulki, może poczuć się częścią nie tylko modowej rewolucji, ale także piłkarskiej historii.</p>

                    <h3>Co nas wyróżnia?</h3>

                    <ul>
                        <li><strong>Unikalny Design:</strong> Nasze koszulki to nie tylko ubrania, ale również wyraz sztuki. Każdy projekt jest starannie zaprojektowany, aby zadowolić nawet najbardziej wymagających fanów piłki nożnej.</li>
                        <li><strong>Wysoka Jakość:</strong> Stawiamy na trwałość i komfort. Nasze koszulki są wykonane z najlepszych materiałów, aby zapewnić Ci nie tylko styl, ale także wygodę noszenia.</li>
                        <li><strong>Obsługa Klienta:</strong> Jesteśmy tu, aby pomóc. Nasz zespół obsługi klienta zawsze służy radą i pomocą. Zależy nam na tym, abyś był zadowolony z zakupów w naszym sklepie.</li>
                    </ul>

                    <p>Dołącz do naszej społeczności piłkarskich entuzjastów i wyraź swoją pasję poprzez modę! Dziękujemy za wybór <strong>Soccer Shirts</strong> - Twojego źródła oryginalnych koszulek piłkarskich.</p>
                </div>
                <div class="zdjecie">
                    <img class="banerinfo" src="{{ URL('storage/banerinfo1.jpg') }}">
                </div>

        </div>
    </div>
</div>

</body>
</html>
