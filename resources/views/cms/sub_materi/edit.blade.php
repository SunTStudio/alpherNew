@extends('layout.main')

@section('title', 'Edit Sub Materi')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4 border-top border-4 border-warning">
                    <div class="card-header bg-white py-3 d-flex align-items-center">
                        <a href="{{ route('sub-materi.index', $subMateri->materi_id) }}"
                            class="btn btn-light rounded-circle me-3 shadow-sm text-secondary">
                            <i class="bi bi-arrow-left"></i>
                        </a>
                        <h5 class="fw-bold text-warning mb-0">Edit Sub Materi</h5>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        <form action="{{ route('sub-materi.update', $subMateri->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="row g-4">
                                <div class="col-12">
                                    <label for="materi_id"
                                        class="form-label fw-bold text-secondary small text-uppercase">Materi Induk</label>
                                    <select class="form-select form-select-lg bg-light border-0" id="materi_id"
                                        name="materi_id">
                                        <option value="" disabled>Pilih Materi Induk</option>
                                        @foreach ($materis as $materi)
                                            <option value="{{ $materi->id }}"
                                                {{ old('materi_id', $subMateri->materi_id) == $materi->id ? 'selected' : '' }}>
                                                {{ $materi->judul }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('materi_id')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="judul"
                                        class="form-label fw-bold text-secondary small text-uppercase">Judul Sub
                                        Materi</label>
                                    <input type="text" class="form-control form-control-lg bg-light border-0"
                                        id="judul" name="judul" value="{{ old('judul', $subMateri->judul) }}">
                                    @error('judul')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="gambar"
                                        class="form-label fw-bold text-secondary small text-uppercase">Gambar Sampul</label>
                                    <input type="file" class="form-control form-control-lg bg-light border-0"
                                        id="gambar" name="gambar" accept="image/*">
                                    <div class="form-text small">Biarkan kosong jika tidak ingin mengganti.</div>
                                    @error('gambar')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="harga"
                                        class="form-label fw-bold text-secondary small text-uppercase">Harga (Rp)</label>
                                    <input type="number" class="form-control form-control-lg bg-light border-0"
                                        id="harga" name="harga" value="{{ old('harga', $subMateri->harga) }}"
                                        min="0">
                                    <div class="form-text small">Isi 0 jika gratis.</div>
                                    @error('harga')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                @if ($subMateri->gambar)
                                    <div class="col-12">
                                        <div class="p-3 bg-light rounded-3 border border-dashed text-center">
                                            <p class="small text-muted mb-2">Gambar Saat Ini:</p>
                                            <img src="{{ asset($subMateri->gambar) }}" alt="Current Image"
                                                class="img-fluid rounded-3 shadow-sm" style="max-height: 200px;">
                                        </div>
                                    </div>
                                @endif

                                {{-- link --}}
                                <div class="col-12">
                                    <label for="link"
                                        class="form-label fw-bold text-secondary small text-uppercase">Link Video /
                                        Materi</label>
                                    <input type="url" class="form-control form-control-lg bg-light border-0"
                                        id="link" name="link" value="{{ old('link', $subMateri->link) }}">
                                    @error('link')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="deskripsi"
                                        class="form-label fw-bold text-secondary small text-uppercase">Deskripsi</label>
                                    <textarea class="form-control bg-light border-0" id="deskripsi" name="deskripsi" rows="4">{{ old('deskripsi', $subMateri->deskripsi) }}</textarea>
                                    @error('deskripsi')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 mt-4 text-end">
                                    <a href="{{ route('sub-materi.index', $subMateri->materi_id) }}"
                                        class="btn btn-light btn-lg rounded-pill px-4 me-2">Batal</a>
                                    <button type="submit"
                                        class="btn btn-warning btn-lg rounded-pill px-5 shadow-sm text-dark fw-bold">
                                        <i class="bi bi-check-circle-fill me-2"></i> Perbarui
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
