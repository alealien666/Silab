@extends('layouts.silab')
@section('konten')
    <a href="{{ route('order', ['slug' => $datas->slug]) }}" class="btn btn-danger" style="margin: 10rem">Pesan Sekarang</a>
@endsection
