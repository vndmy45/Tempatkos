@extends('layouts.sidebar')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Detail Kos: {{ $kos->nama_kos }}</h4>
        </div>
        <div class="card-body row">
            <div class="col-md-6">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Alamat:</strong> {{ $kos->alamat }}</li>
                    <li class="list-group-item"><strong>Harga:</strong> Rp{{ number_format($kos->harga, 0, ',', '.') }}</li>
                    <li class="list-group-item"><strong>Jenis Kost:</strong> {{ $kos->jenis_kost }}</li>
                    <li class="list-group-item"><strong>Rating:</strong> {{ $kos->nilai_rating ?? '-' }}</li>
                    <li class="list-group-item"><strong>Kontak Pemilik:</strong> {{ $kos->kontak_pemilik }}</li>
                    <li class="list-group-item"><strong>Longitude:</strong> {{ $kos->longitude }}</li>
                    <li class="list-group-item"><strong>Latitude:</strong> {{ $kos->latitude }}</li>
                     <li class="list-group-item">
                        <strong>Fasilitas:</strong>
                        @if($kos->fasilitas->isNotEmpty())
                            <ul class="mb-0 ps-3">
                                @foreach($kos->fasilitas as $fasilitas)
                                    <li>{{ $fasilitas->nama_fasilitas }}</li>
                                @endforeach
                            </ul>
                        @else
                            <span class="text-muted">Tidak ada fasilitas</span>
                        @endif
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <div class="row">
                    @forelse ($kos->gambarKos as $gambar)
                    <div class="col-md-3 col-6 mb-3">
                        <img src="{{ $gambar->link_foto }}" class="rounded shadow-sm" alt="{{ $gambar->nama_foto }}" style="height: 180px; width: 100%; object-fit: cover;">
                    </div>
                    @empty
                    <p class="text-muted">Belum ada gambar.</p>
                    @endforelse
                </div>
            </div>
        <div class="card-footer text-end">
            <a href="{{ route('kos.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
