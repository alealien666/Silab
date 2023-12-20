<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate of Analysis</title>
    <style>
        /* body {
            font-family: arial;
        } */

        .container {
            width: 70%;
            margin: 0px auto;
        }

        .header {
            display: flex;
            border-bottom: 3px solid black;
        }

        .detail {
            /* margin: 0px auto; */
            margin-left: 19%;
            text-align: center;
        }

        .info {
            font-weight: bold;
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>

<body>
    <div class="container">
        <section class="header">
            <img src="{{ asset('img/logo.png') }}" alt="logo" height="50px" width="110px">
            <div class="detail">
                <h3>PT SILAB</h3>
                <p>KRAJAN, AJUNG RT 100 / RW 20, JEMBER JAWA TIMUR</p>
                <P>Phone: 08864678392, Email: silab@gmail.com</P>
            </div>
        </section>

        <h1 style="text-align: center">Certificate of Analysis</h1>

        @if (isset($order))
            <section class="info">
                <div class="info1">
                    <p>Nama Sample: {{ $order->analisis->jenis_pengujian }}</p>
                    <p>Jenis Analisis: {{ $order->analisis->jenis_analisa }}</p>
                    <p>Nama Customer: {{ $order->nama_pemesan }}</p>
                    <p>Id Sample: {{ $order->analisis->id }}</p>
                </div>

                <div class="info2">
                    <p>Tanggal Terbit: {{ $order->hasilAnalisis->tanggal_terbit }}</p>
                </div>
            </section>

            <h2 style="text-align: center">Hasil Analisis</h2>
            <section class="hasil">
                <p>Status: {{ $order->hasilAnalisis->status }}</p>
                <p>Tanggal Pelaksanaan Analisa: {{ $order->order }}</p>
                <p>Kondisi Sample: {{ $order->hasilAnalisis->kondisi_sample }}</p>
            </section>
            <a href="{{ route('download-sertifikat', ['id' => $order->id]) }}">Download Sertifikat</a>
        @endif

    </div>
</body>

</html>
