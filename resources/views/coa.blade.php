{{-- @dd($order) --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Sertifikat</h1>
    <p>Order Number: {{ $pdfData['order_number'] }}</p>
    <p>Nama Pemesan: {{ $pdfData['nama_pemesan'] }}</p>
    <p>status {{ $pdfData['hasil_analisis']['status'] }}</p>
    {{-- <p>{{ asset('sertifikat/' . $pdfPath) }}</p> --}}
    {{-- <embed src="{{ asset($pdfPath) }}" type="aplication/pdf" width="100%" height="600px"> --}}
</body>

</html>
