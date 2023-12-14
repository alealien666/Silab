<!-- resources/views/coa.blade.php -->

<!DOCTYPE html>
<html>

<head>
    <title>Certificate of Analysis</title>
</head>

<body>

    <h1>Certificate of Analysis</h1>

    <p>Order Number: {{ $order->id }}</p>
    <p>Nama Customer: {{ $order->nama_pemesan }}</p>

    <!-- Menampilkan PDF atau link ke PDF -->
    @if (isset($pdfPath))
        <a href="{{ url($pdfPath) }}" download="Certificate_of_Analysis.pdf">
            <button>Download Certificate</button>
        </a>
    @else
        <p>COA not available</p>
    @endif

</body>

</html>
