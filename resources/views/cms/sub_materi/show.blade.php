@extends('layout.main')

@section('title', 'Detail Sub Materi')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden border-top border-4 border-primary">
                    <div class="card-header bg-white py-3 d-flex align-items-center">
                        <a href="{{ route('sub-materi.index', $subMateri->materi_id) }}"
                            class="btn btn-light rounded-circle me-3 shadow-sm text-secondary">
                            <i class="bi bi-arrow-left"></i>
                        </a>
                        <h5 class="fw-bold text-primary mb-0">Detail Sub Materi</h5>
                    </div>
                    <div class="row g-0">
                        <div
                            class="col-md-5 bg-primary bg-opacity-10 d-flex align-items-center justify-content-center p-4 position-relative">
                            @if ($subMateri->gambar)
                                <img src="{{ asset($subMateri->gambar) }}" alt="{{ $subMateri->judul }}"
                                    class="img-fluid rounded-4 shadow"
                                    style="max-height: 400px; width: 100%; object-fit: cover;">
                            @else
                                <div class="text-center text-muted opacity-50">
                                    <i class="bi bi-image fs-1 display-1"></i>
                                    <p class="mt-2">Tidak ada gambar</p>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-7">
                            <div class="card-body p-4 p-lg-5 h-100 d-flex flex-column">
                                <div class="mb-auto">
                                    <div class="d-flex align-items-center mb-3">
                                        <span class="badge bg-primary text-white rounded-pill px-3 py-2 me-2">
                                            <i class="bi bi-collection-play me-1"></i>
                                            {{ $subMateri->materi->judul ?? 'Tanpa Induk' }}
                                        </span>
                                        <small class="text-muted">
                                            <i class="bi bi-clock me-1"></i> {{ $subMateri->updated_at->diffForHumans() }}
                                        </small>
                                    </div>

                                    <h5 class="fw-bold text-dark mb-3">{{ $subMateri->judul }}</h5>

                                    <div class="mb-4">
                                        @if ($subMateri->harga > 0)
                                            <h4 class="text-success fw-bold">Rp
                                                {{ number_format($subMateri->harga, 0, ',', '.') }}</h4>
                                        @else
                                            <h4 class="text-success fw-bold">Gratis</h4>
                                        @endif
                                    </div>

                                    <h6 class="fw-bold text-secondary text-uppercase small mb-3">Deskripsi</h6>
                                    <p class="text-muted lh-lg" style="white-space: pre-line;">
                                        {{ $subMateri->deskripsi ?? 'Belum ada deskripsi untuk sub materi ini.' }}
                                    </p>

                                    @if ($subMateri->link)
                                        <div class="mt-4">
                                            <h6 class="fw-bold text-secondary text-uppercase small mb-2">Link Materi</h6>
                                            <a href="{{ $subMateri->link }}" target="_blank"
                                                class="btn btn-outline-primary rounded-pill px-4">
                                                <i class="bi bi-link-45deg me-2"></i>Buka Link
                                            </a>
                                        </div>
                                    @endif
                                </div>

                                <div class="mt-5 pt-4 border-top d-flex gap-3">
                                    <a href="{{ route('sub-materi.edit', $subMateri->id) }}"
                                        class="btn btn-warning rounded-pill px-4 fw-bold shadow-sm">
                                        <i class="bi bi-pencil-square me-2"></i> Edit
                                    </a>
                                    <form action="{{ route('sub-materi.destroy', $subMateri->id) }}" method="POST"
                                        onsubmit="return confirm('Hapus sub materi ini?')">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger rounded-pill px-4">
                                            <i class="bi bi-trash me-2"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
