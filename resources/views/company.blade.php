@extends('layouts.silab')
@section('konten')
    <button type="button" style="margin-top: 10rem" class="btn btn-primary btn-sm" id="sa-success" onclick="ningen()">Click
        me</button>
    {{-- <script src="{{ asset('vendor/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets1/script.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('vendor/sweetalert2/sweetalert2.min.css') }}"> --}}
    <script>
        const ningen = () => {
            alert('aokaokwokao')
        }
    </script>
@endsection
