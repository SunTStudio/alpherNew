@extends('layout.main')

@section('title', 'Edit Materi')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4 border-top border-4 border-warning">
                    <div class="card-header bg-white py-3 d-flex align-items-center">
                        <a href="{{ route('materi.index') }}"
                            class="btn btn-light rounded-circle me-3 shadow-sm text-secondary">
                            <i class="bi bi-arrow-left"></i>
                        </a>
                        <h5 class="fw-bold text-warning mb-0">Edit Materi</h5>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        <form action="{{ route('materi.update', $materi->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="row g-4">
                                <div class="col-12">
                                    <label for="judul"
                                        class="form-label fw-bold text-secondary small text-uppercase">Judul Materi</label>
                                    <input type="text" class="form-control form-control-lg bg-light border-0"
                                        id="judul" name="judul" value="{{ old('judul', $materi->judul) }}">
                                    @error('judul')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="kategori"
                                        class="form-label fw-bold text-secondary small text-uppercase">Kategori</label>
                                    <input type="text" class="form-control form-control-lg bg-light border-0"
                                        id="kategori" name="kategori" value="{{ old('kategori', $materi->kategori) }}">
                                    @error('kategori')
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

                                @if ($materi->gambar)
                                    <div class="col-12">
                                        <div class="p-3 bg-light rounded-3 border border-dashed text-center">
                                            <p class="small text-muted mb-2">Gambar Saat Ini:</p>
                                            <img src="{{ asset($materi->gambar) }}" alt="Current Image"
                                                class="img-fluid rounded-3 shadow-sm" style="max-height: 200px;">
                                        </div>
                                    </div>
                                @endif

                                {{-- link --}}
                                <div class="col-12">
                                    <label for="link"
                                        class="form-label fw-bold text-secondary small text-uppercase">Link Materi</label>
                                    <input type="url" class="form-control form-control-lg bg-light border-0"
                                        id="link" name="link" value="{{ old('link', $materi->link) }}">
                                    @error('link')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="deskripsi"
                                        class="form-label fw-bold text-secondary small text-uppercase">Deskripsi</label>
                                    <textarea class="form-control bg-light border-0" id="deskripsi" name="deskripsi" rows="6">{{ old('deskripsi', $materi->deskripsi) }}</textarea>
                                    @error('deskripsi')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 mt-4 text-end">
                                    <a href="{{ route('materi.index') }}"
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
