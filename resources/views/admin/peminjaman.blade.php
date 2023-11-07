<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Peminjaman</title>
</head>

<body>

    <nav class="navbar navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="/">Politeknik Negeri Bengkalis | D-IV Rekayasa Perangkat Lunak</a>
            <a class="navbar-brand" href="{{ route('logout') }}">Logout</a>
        </div>
    </nav>
    <div class="container mt-4 mb-3">
        <h4 class="text-secondary text-center">Selamat Datang {{ Auth::user()->name }}!</h4>
    </div>
    <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="{{ route('admin.home') }}">Admin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{ route('admin.berita') }}">Berita</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"aria-current="page" href="{{ route('admin.lulusan') }}">Profile Lulusan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link"aria-current="page" href="{{ route('admin.buku') }}">Buku</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active"aria-current="page" href="{{ route('admin.peminjaman') }}">Peminjaman</a>
        </li>

      </ul>
    <div class="container mt-3">
        @if (Session::get('success'))
        <div class="alert alert-success alert-dismissible fadeshow" role="alert">
            <strong>Berhasil!</strong> {{ Session::get('success')}}
            <button type="button" class="btn-close" data-bsdismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if (Session::get('failed'))
        <div class="alert alert-danger alert-dismissible fadeshow" role="alert">
            <strong>Gagal!</strong> {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bsdismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-center">
                {!! $chart->container() !!}
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col"></div>
        <div class="col-6">
            <form action="{{ route('admin.peminjaman') }}" method="GET">
                @csrf
                <div class="input-group">
                    <input type="search" name="search" class="formcontrol rounded" placeholder="Cari id peminjam"
                        aria-label="Search" aria-describedby="searchaddon" />
                    <button type="submit" class="btn btn-outlineprimary">search</button>
                </div>
            </form>
        </div>
        <div class="col"></div>
    </div>
    <div class="row mt-5">
        <div class="col"><a class="btn btn-info text-white" target="_blank"
                href="{{ route('admin.cetakDataPeminjaman') }}" style="text-decoration: none; margin-right:30px">Cetak
                Data</a></div>
        <div class="col"></div>
        <div class="col-2">
            <a class="btn btn-success" href="{{route('admin.tambahPeminjaman') }}"
                style="text-decoration: none; margin-left:30px">Tambah Data
                +</a>
        </div>
    </div>
    <table class="table" style="margin-top: 10px">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nomor Anggota</th>
                <th scope="col">Kode Buku</th>
                <th scope="col">Tanggal Peminjaman</th>
                <th scope="col">Tanggal Pengembalian</th>
                <th scope="col">Status Peminjaman</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($data as $index => $peminjam)
            <tr>

                <td>{{ $peminjam->id_user }}</td>
                <td>{{ $peminjam->id_buku }}</td>
                <td>{{ $peminjam->tanggal_pinjam }}</td>
                <td>{{ $peminjam->tanggal_kembali }}</td>
                <td>
                    <span
                        class="{{ $peminjam->status === 'Sudah Dikembalikan' ? 'fw-semibold text-success' : 'fw-semibold text-danger'}}">
                        {{ $peminjam->status }}
                    </span>
                </td>
                <td>
                    <a class="btn btn-outline-primary"
                        href="/admin/detailPeminjaman/{{$peminjam->id }}/{{ $peminjam->id_user }}/{{ $peminjam->id_buku}}">Detail</a>
                    <a class="btn btn-outline-warning" href="/admin/editPeminjaman/{{ $peminjam->id }}">Edit</a>
                    <a class="btn btn-outline-danger" href="/admin/deletePeminjaman/{{$peminjam->id }}">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table><br>

    {{ $data->links() }}

    </div><br><br><br>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ $chart->cdn() }}"></script>
    {{ $chart->script() }}

</body>

</html>
