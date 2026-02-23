@extends('layout.main')

@section('title', 'Tambah Sub Materi')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4 border-top border-4 border-primary">
                    <div class="card-header bg-white py-3 d-flex align-items-center">
                        <a href="{{ route('sub-materi.index', $materi_id) }}"
                            class="btn btn-light rounded-circle me-3 shadow-sm text-secondary">
                            <i class="bi bi-arrow-left"></i>
                        </a>
                        <h5 class="fw-bold text-primary mb-0">Buat Sub Materi Baru</h5>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        <form action="{{ route('sub-materi.store', $materi_id) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row g-4">
                                <div class="col-12">
                                    <label for="materi_id"
                                        class="form-label fw-bold text-secondary small text-uppercase">Materi Induk</label>
                                    <select class="form-select form-select-lg bg-light border-0" id="materi_id"
                                        name="materi_id">
                                        <option value="" selected disabled>Pilih Materi Induk</option>
                                        @foreach ($materis as $materi)
                                            <option value="{{ $materi->id }}"
                                                {{ old('materi_id') == $materi->id || $materiId == $materi->id ? 'selected' : '' }}>
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
                                        id="judul" name="judul" value="{{ old('judul') }}"
                                        placeholder="Misal: Video Pembelajaran 1">
                                    @error('judul')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="gambar"
                                        class="form-label fw-bold text-secondary small text-uppercase">Gambar Sampul</label>
                                    <input type="file" class="form-control form-control-lg bg-light border-0"
                                        id="gambar" name="gambar" accept="image/*">
                                    <div class="form-text small">Format: JPG, PNG, GIF. Maks: 2MB.</div>
                                    @error('gambar')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="harga"
                                        class="form-label fw-bold text-secondary small text-uppercase">Harga (Rp)</label>
                                    <input type="number" class="form-control form-control-lg bg-light border-0"
                                        id="harga" name="harga" value="{{ old('harga', 0) }}" min="0">
                                    <div class="form-text small">Isi 0 jika gratis.</div>
                                    @error('harga')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- link --}}
                                <div class="col-12">
                                    <label for="link"
                                        class="form-label fw-bold text-secondary small text-uppercase">Link Video /
                                        Materi</label>
                                    <input type="url" class="form-control form-control-lg bg-light border-0"
                                        id="link" name="link" value="{{ old('link') }}">
                                    @error('link')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="deskripsi"
                                        class="form-label fw-bold text-secondary small text-uppercase">Deskripsi</label>
                                    <textarea class="form-control bg-light border-0" id="deskripsi" name="deskripsi" rows="4"
                                        placeholder="Ceritakan sedikit tentang materi ini...">{{ old('deskripsi') }}</textarea>
                                    @error('deskripsi')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 mt-4">
                                    <button type="submit"
                                        class="btn btn-primary btn-lg rounded-pill px-5 w-100 w-md-auto shadow-sm">
                                        <i class="bi bi-save me-2"></i> Simpan Sub Materi
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
