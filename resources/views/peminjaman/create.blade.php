@extends('layouts.app')

@section('content')
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0">Tambah Peminjaman Buku</h5>
                </div>
                <div class="card-body">
                    <!-- TODO 9: Membuat formulir peminjaman dengan pilihan anggota, buku, dan tanggal pinjam -->
                    <form action="{{ route('peminjaman.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="anggota_id" class="form-label">Anggota</label>
                            <select class="form-select @error('anggota_id') is-invalid @enderror" id="anggota_id" name="anggota_id" required>
                                <option value="" disabled selected>-- Pilih Anggota --</option>
                                @foreach($anggota as $item)
                                    <option value="{{ $item->id }}" {{ old('anggota_id') == $item->id ? 'selected' : '' }}>
                                        {{ $item->nama }} ({{ $item->email }})
                                    </option>
                                @endforeach
                            </select>
                            @error('anggota_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="buku_id" class="form-label">Buku</label>
                            <select class="form-select @error('buku_id') is-invalid @enderror" id="buku_id" name="buku_id" required>
                                <option value="" disabled selected>-- Pilih Buku --</option>
                                @foreach($buku as $item)
                                    <option value="{{ $item->id }}" {{ old('buku_id') == $item->id ? 'selected' : '' }}>
                                        {{ $item->judul }} (Stok: {{ $item->stok }})
                                    </option>
                                @endforeach
                            </select>
                            @error('buku_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
                            <input type="date" class="form-control @error('tanggal_pinjam') is-invalid @enderror" id="tanggal_pinjam" name="tanggal_pinjam" value="{{ old('tanggal_pinjam', date('Y-m-d')) }}" required>
                            @error('tanggal_pinjam')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan Peminjaman</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection