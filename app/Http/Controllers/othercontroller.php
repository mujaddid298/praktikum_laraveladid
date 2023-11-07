<?php

namespace App\Http\Controllers;

use App\Models\berita;
use App\Models\lulusan;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class othercontroller extends Controller
{


    public function adminaktifitas()
    {
        return view('admin.aktivitas');
    }

    public function biodata()
    {
        return view('biodata');
    }
    public function home()
    {
        return view('home');
    }
    public function inber()
    {
        return view('admin.inber');
    }
    public function inda()
    {
        return view('admin.inda');
    }
    public function adminBerita(Request $request)
    {
        $search = $request->input('search');

        $data = berita::where(function ($query) use ($search) {
            $query->where('id', 'LIKE', '%' . $search . '%');
        })->paginate(5);

        return view('admin.berita', compact('data'));
    }
    public function postInber(Request $request)
    {

        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'isi' => 'required'

        ]);
        $berita = new berita;

        $berita->judul = $request->judul;
        $berita->deskripsi = $request->deskripsi;
        $berita->isi = $request->isi;

        $berita->save();

        if ($berita) {
            return redirect('/admin/home')->with('success', 'Berita berhasil dibuat');
        } else {
            return back()->with('failed', 'Maaf, terjadi kesalahan, coba kembali
            beberapa saat!');
        }
    }
    public function editBerita($id)
    {
        $data = berita::find($id);
        return view('admin/editBerita', compact('data'));
    }
    public function postEditBerita(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'isi' => 'required',

        ]);
        $berita = berita::find($id);
        $berita->judul = $request->judul;
        $berita->deskripsi = $request->deskripsi;
        $berita->isi = $request->isi;

        $berita->save();
        if ($berita) {
            return back()->with('success', 'Data berita berhasil di update!');
        } else {
            return back()->with('failed', 'Gagal mengupdate data berita!');
        }
    }
    public function deleteBerita($id)
    {
        $data = berita::find($id);
        $data->delete();
        if ($data) {
            return back()->with('success', 'Data peminjaman berhasil di hapus!');
        } else {
            return back()->with('failed', 'Gagal menghapus data peminjaman!');
        }
    }
    //input data  lulusan
    public function adminLulusan(Request $request)
    {
        $search = $request->input('search');
        $data = berita::where(function ($query) use ($search) {
            $query->where('id', 'LIKE', '%' . $search . '%');
        })->paginate(5);

        return view('admin.lulusan', compact('data'));
    }
    public function postInda(Request $request)
    {

        $request->validate([
            'nama' => 'required',
            'jk' => 'required',
            'jurusan' => 'required',
            'prodi' => 'required',
            'ipk' => 'required',
            'tahun' => 'required'
        ]);
        $lulusan = new lulusan;

        $lulusan->nama = $request->nama;
        $lulusan->jk = $request->jk;
        $lulusan->jurusan = $request->jurusan;
        $lulusan->prodi = $request->prodi;
        $lulusan->ipk = $request->ipk;
        $lulusan->tahun = $request->tahun;

        $lulusan->save();

        if ($lulusan) {
            return redirect('/admin/lulusan')->with('success', 'Profil lulusan berhasil ditambahkan');
        } else {
            return back()->with('failed', 'Maaf, terjadi kesalahan, coba kembali
        beberapa saat!');
        }
    }
}
