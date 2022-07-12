<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Kecamatan;
use App\Berita;
use App\Kinerja;
use App\Opd;
use App\Pimpinan;
use App\Pengumuman;
use App\Umkm;
use App\Models\Questionnaire;

class HomeController extends Controller
{
    //
    public function beranda()
    {
        $selayang_pandang   = 'Sekilas medanahara ulu';
        $isi                = 'mendahara ulu adalah perusahaan umum milik negara yang bergerak di bidang logistik pangan. Ruang lingkup bisnis perusahaan meliputi usaha logistik/pergudangan, survei dan pemberantasan hama, penyediaan karung plastik, usaha angkutan, perdagangan komoditi pangan dan usaha eceran. Sebagai perusahaan yang tetap mengemban tugas publik dari pemerintah, BULOG tetap melakukan kegiatan menjaga Harga Dasar Pembelian untuk gabah, stabilisasi harga khususnya harga pokok, menyalurkan beras untuk bantuan sosial (Bansos) dan pengelolaan stok pangan.';

        $kecamatan = Kecamatan::all();
        $berita             = Berita::limit(5)->get();
        $pimpinan           = Pimpinan::all();
        return view('welcome', compact('selayang_pandang', 'isi', 'kecamatan', 'berita', 'pimpinan'));
    }
    public function riwayatSingkat()
    {

        $judul_profil    = 'KECAMATAN';
        $judul_profil_singkat    = 'Riwayat Singkat Kecamatan';
        $kecamatan = Kecamatan::first();
        return view('riwayat-singkat', compact('judul_profil_singkat', 'judul_profil', 'kecamatan'));
    }
    public function visiMisi()
    {
        $judul_visi_misi    = 'VISI DAN MISI';
        $judul_visi         = 'VISI';
        $judul_misi         = 'MISI';
        $kecamatan = Kecamatan::first();
        return view('visi-misi', compact('judul_visi_misi', 'judul_visi', 'judul_misi', 'kecamatan'));
    }

    public function strukturOrganisasi()
    {
        $judul_struktur             = 'STRUKTUR ORGANISASI';
        $judul_struktur2            = 'STRUKTUR ORGANISASI KECAMATAN MENDAHARA ULU';
        $kecamatan = Kecamatan::first();
        return view('struktur-organisasi', compact('judul_struktur', 'judul_struktur2', 'kecamatan'));
    }
    public function Kependudukan()
    {

        $judul_kependudukan    = 'KEPENDUDUKAN';
        $kecamatan = Kecamatan::first();
        return view('kependudukan', compact('judul_kependudukan', 'kecamatan'));
    }

    public function cariBerita(Request $request)
    {
        // menangkap data pencarian
        $penulis = "Admin";
        $berita = Berita::orderBy('created_at', 'Desc')->paginate(5);
        $recent_news = Berita::orderBy('created_at', 'Desc')->paginate(5);
        $cari = $request->cari;

        // mengambil data dari table berita sesuai pencarian data
        $berita = DB::table('berita')
            ->where('judul', 'like', "%" . $cari . "%")
            ->paginate(3);

        // mengirim data pegawai ke view index
        return view('berita', compact('berita', 'cari', 'recent_news', 'penulis'));
    }


    public function detailBerita($id)
    {
        $penulis = "Admin";
        $berita = Berita::find($id);
        $next = $berita->next();
        $previous = $berita->previous();
        $recent_news = Berita::orderBy('created_at', 'Desc')->paginate(3);
        return view('detail-berita', compact('berita', 'penulis', 'next', 'previous', 'recent_news'));
    }

    public function lihatPimpinan(Request $request)
    {
        // menangkap data pencarian
        $judul_pimpinan1 = 'Daftar Pimpinan Kecamatan Mendahara Ulu';
        $pimpinan = Pimpinan::paginate(5);
        $cari = $request->cari;

        // mengambil data dari table berita sesuai pencarian data
        $pimpinan = DB::table('pimpinan')
            ->where('nama', 'like', "%" . $cari . "%")
            ->paginate(5);

        // mengirim data pegawai ke view index
        return view('pimpinan', compact('pimpinan', 'judul_pimpinan1'));
    }
    public function lihatPimpinandetail($id)
    {
        $judul_pimpinan1         = 'Daftar Pimpinan Kecamatan Mendahara Ulu';
        $pimpinan                = Pimpinan::find($id);
        return view('pimpinan-detail', compact('pimpinan', 'judul_pimpinan1'));
    }
    public function kontak()
    {

        return view('aduan');
    }
    public function piechart()
    {

        return view('piechart');
    }

    public function show(Questionnaire $questionnaire)
    {

        $questionnaire->load('questions.answers.responses');
    

        return view('piechart', compact('questionnaire'));
    }


    public function cariKinerja(Request $request)
    {
        // menangkap data pencarian
        $penulis = "Admin";
        $kinerja = Kinerja::orderBy('created_at', 'Desc')->paginate(5);
        $recent_kinerja = Kinerja::orderBy('created_at', 'Desc')->paginate(3);
        $cari = $request->cari;

        // mengambil data dari table berita sesuai pencarian data
        $kinerja = DB::table('kinerja')
            ->where('judul', 'like', "%" . $cari . "%")
            ->paginate(5);

        // mengirim data pegawai ke view index
        return view('publikasi-kinerja', compact('kinerja', 'recent_kinerja', 'penulis'));
    }

    public function detailKinerja($id)
    {
        $penulis = "Admin";
        $kinerja = Kinerja::find($id);
        $next = $kinerja->next();
        $previous = $kinerja->previous();
        $recent_kinerja = Kinerja::orderBy('created_at', 'Desc')->paginate(3);
        return view('detail-kinerja', compact('kinerja', 'penulis', 'next', 'previous', 'recent_kinerja'));
    }


    public function infoPengumuman(Request $request)
    {
        // menangkap data pencarian
        $pengumuman = Pengumuman::orderBy('created_at', 'Desc')->paginate(5);
        $recent_pengumuman = Pengumuman::orderBy('created_at', 'Desc')->paginate(3);
        $cari = $request->cari;

        // mengambil data dari table berita sesuai pencarian data
        $pengumuman = DB::table('pengumuman')
            ->where('judul', 'like', "%" . $cari . "%")
            ->paginate(6);

        // mengirim data pegawai ke view index
        return view('info-pengumuman', compact('pengumuman', 'recent_pengumuman'));
    }

    public function detailPengumuman($id)
    {
        $penulis = "Admin";
        $pengumuman = Pengumuman::find($id);
        $next = $pengumuman->next();
        $previous = $pengumuman->previous();
        $recent_pengumuman = Pengumuman::orderBy('created_at', 'Desc')->paginate(3);
        return view('detail-pengumuman', compact('pengumuman', 'penulis', 'next', 'previous', 'recent_pengumuman'));
    }

    public function infoUmkm(Request $request)
    {
        // menangkap data pencarian
        $umkm = Umkm::orderBy('created_at', 'Desc')->paginate(5);
        $recent_umkm = Umkm::orderBy('created_at', 'Desc')->paginate(3);
        $cari = $request->cari;

        // mengambil data dari table berita sesuai pencarian data
        $umkm = DB::table('umkm')
            ->where('nama_umkm', 'like', "%" . $cari . "%")
            ->paginate(6);

        // mengirim data pegawai ke view index
        return view('info-umkm', compact('umkm', 'recent_umkm'));
    }

    public function detailUmkm($id)
    {
        $penulis = "Admin";
        $umkm = Umkm::find($id);
        $next = $umkm->next();
        $previous = $umkm->previous();
        $recent_umkm = Umkm::orderBy('created_at', 'Desc')->paginate(3);
        return view('detail-umkm', compact('umkm', 'penulis', 'next', 'previous', 'recent_umkm'));
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('login')->with('alert', 'Anda tidak boleh memasuki halaman tersebut');
    }
}
