<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Buku</title>
</head>

<body>

    <nav class="navbar navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="/">Politeknik Negeri Bengkalis | D-IV Rekayasa Perangkat Lunak</a>
            <a class="navbar-brand" href="{{ route('logout') }}">Logout</a>
        </div>
    </nav>
    <div class="container">
        <div class="container mt-4 mb-3">
            <h4 class="text-secondary text-center">Selamat Datang {{ Auth::user()->name }}!</h4>
        </div>
    </div>
    <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="{{ route('admin.home') }}">Admin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{ route('admin.berita') }}">Berita</a>
        </li>
        <li class="nav-item">
          <a class="nav-link "aria-current="page" href="{{ route('admin.inda') }}">Profile Lulusan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active"aria-current="page" href="{{ route('admin.buku') }}">Buku</a>
        </li>
        <li class="nav-item">
            <a class="nav-link"aria-current="page" href="{{ route('admin.peminjaman') }}">Peminjaman</a>
        </li>

      </ul>
    <div class="container mt-3">
        @if (Session::get('success'))
        <div class="alert alert-success alert-dismissible fadeshow" role="alert">
            <strong>Berhasil!</strong> {{ Session::get('success')
}}
            <button type="button" class="btn-close" data-bsdismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if (Session::get('failed'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Gagal!</strong> {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bsdismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>
    <div class="row mt-2 justify-content-center align-content-center">
        <div class="col-4 ">
            <form action="{{ route('admin.home') }}" method="GET">
                @csrf
                <div class="input-group ">
                    <input type="search" name="search" class="form-control rounded" placeholder="Cari nama buku"
                        aria-label="Search" aria-describedby="Search-addon" />
                    <button type="submit" class="btn btn-outline-primary">Cari</button>
                </div>
            </form>
        </div>
        <div class="row mt-5">
            <div class="col"></div>
            <div class="col"></div>
            <div class="col-2">
                <a class="btn btn-success" href="{{route('admin.tambahBuku') }}"
                    style="text-decoration: none; margin-left: 30px">TambahData+</a>
            </div>
        </div>
        <table class="table" style="margin-top: 10px">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Kode Buku</th>
                    <th scope="col">Judul Buku</th>
                    <th scope="col">Penulis</th>
                    <th scope="col">Penerbit</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Tahun Terbit</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($data as $index => $buku)
                <tr>
                    <td scope="row">{{ $index + $data->firstItem()}}</td>
                    <td>
                        <img style="width: 50px" src="{{asset('/images/' . $buku->gambar) }}" alt="cover buku">
                    </td>
                    <td>{{ $buku->kode_buku }}</td>
                    <td>{{ $buku->judul_buku }}</td>
                    <td>{{ $buku->penulis }}</td>
                    <td>{{ $buku->penerbit }}</td>
                    <td>{{ $buku->kategori }}</td>
                    <td>{{ $buku->tahun_terbit }}</td>
                    <td>
                        <a class="btn btn-outline-warning" href="/admin/editBuku/{{ $buku->id }}">Edit</a>
                        <a class="btn btn-outline-danger" href="/admin/deleteBuku/{{ $buku->id }}">Delete</a>
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

</body>

</html>
