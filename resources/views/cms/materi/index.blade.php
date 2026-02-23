@extends('layout.main')

@section('title', 'Data Materi')

@section('content')
    <div class="container-fluid">
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden border-top border-4 border-primary">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h5 class="fw-bold text-primary mb-0">📚 Manajemen Materi</h5>
                <a href="{{ route('materi.create') }}" class="btn btn-primary rounded-pill px-4 shadow-sm">
                    <i class="bi bi-plus-lg me-2"></i>Tambah Materi
                </a>
            </div>
            <div class="card-body p-0">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show m-3 rounded-3" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-primary bg-opacity-10">
                            <tr>
                                <th class="px-4 py-3 border-0 text-uppercase small fw-bold text-primary" width="5%">No
                                </th>
                                <th class="px-4 py-3 border-0 text-uppercase small fw-bold text-primary" width="15%">
                                    Visual</th>
                                <th class="px-4 py-3 border-0 text-uppercase small fw-bold text-primary">Detail Materi</th>
                                <th class="px-4 py-3 border-0 text-uppercase small fw-bold text-primary">Kategori</th>
                                <th class="px-4 py-3 border-0 text-uppercase small fw-bold text-primary">Sub Materi</th>
                                <th class="px-4 py-3 border-0 text-uppercase small fw-bold text-end text-primary"
                                    width="15%">Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($materi as $item)
                                <tr>
                                    <td class="px-4 text-muted">{{ $loop->iteration }}</td>
                                    <td class="px-4">
                                        <div class="position-relative d-inline-block">
                                            @if ($item->gambar)
                                                <img src="{{ asset($item->gambar) }}" alt="Gambar"
                                                    class="rounded-3 shadow-sm object-fit-cover"
                                                    style="height: 60px; width: 60px;">
                                            @else
                                                <div class="bg-light rounded-3 d-flex align-items-center justify-content-center text-muted border"
                                                    style="height: 60px; width: 60px;">
                                                    <i class="bi bi-image"></i>
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-4">
                                        <h6 class="mb-0 fw-bold text-dark">{{ $item->judul }}</h6>
                                        <small class="text-muted text-truncate d-block" style="max-width: 250px;">
                                            {{ Str::limit($item->deskripsi, 50) }}
                                        </small>
                                    </td>
                                    <td class="px-4">
                                        <span
                                            class="badge bg-light text-primary border border-primary-subtle rounded-pill px-3 py-2 fw-normal">
                                            {{ $item->kategori ?? 'Umum' }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('sub-materi.index', $item->id) }}"
                                            class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                            <i class="bi bi-list-task me-1"></i> Lihat Sub Materi
                                        </a>
                                    </td>
                                    <td class="px-4 text-end">
                                        <div class="d-flex justify-content-end gap-2">
                                            <a href="{{ route('materi.show', $item->id) }}"
                                                class="btn btn-sm btn-light text-secondary rounded-circle"
                                                data-bs-toggle="tooltip" title="Lihat">
                                                <i class="bi bi-eye-fill"></i>
                                            </a>
                                            <a href="{{ route('materi.edit', $item->id) }}"
                                                class="btn btn-sm btn-light text-warning rounded-circle"
                                                data-bs-toggle="tooltip" title="Edit">
                                                <i class="bi bi-pencil-fill"></i>
                                            </a>
                                            <form action="{{ route('materi.destroy', $item->id) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                @csrf
                                                <button type="submit"
                                                    class="btn btn-sm btn-light text-danger rounded-circle"
                                                    data-bs-toggle="tooltip" title="Hapus">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-5">
                                        <div class="text-muted">
                                            <i class="bi bi-inbox fs-1 d-block mb-2 opacity-50"></i>
                                            <p class="mb-0">Belum ada materi yang ditambahkan.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
