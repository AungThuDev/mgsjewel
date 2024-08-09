<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Image</title>
</head>
<style>
    html,
    body {
        height: 100vh;
    }

    body {
        display: grid;
        place-items: center;
    }
</style>

<body>
    <div>

        {{-- <img src="data:image/png;base64,{{ $qr }}" alt=""> --}}
        <div>
            {{-- <h3>Product Name - {{ $name }}</h3>
            <p>Mass - {{ $mass }}</p>
            <p>Density - {{ $density }}</p>
            <p>Refractive Index - {{ $refractive_index }}</p>
            <p>Cut & Shape - {{ $cut_shape }}</p>
            <p>Color - {{ $color }}</p>
            <p>Measurement - {{ $measurement }}</p>
            <p>Text Conclusion - {{ $text_conclusion }}</p>
            <p>Image - {{ $image }}</p> --}}
            <img src="data:image/png;base64,,{{ $image }}" alt="">
        </div>
    </div>
</body>

</html>
