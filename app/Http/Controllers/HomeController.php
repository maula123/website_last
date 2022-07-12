<?php

namespace App\Http\Controllers;
use App\Models\Questionnaires;
use App\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Alert;
use File;
use App\Berita;
use App\Pimpinan;
use App\Kinerja;
use App\Opd;
use App\Pengumuman;
use App\Umkm;
use App\Wisata;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
    if (Auth::user()->role == 0) {
      return view('dashboard/index');
    } else {
      $selayang_pandang   = 'Sekilas Kecamatan mendahara ulu';
      $isi                = 'kecamatan mendahara ulu lorem ipsum.';
      $kecamatan          = Kecamatan::all();
      $pimpinan           = Pimpinan::all();
      $berita             = Berita::limit(5)->get();

      return view('welcome', compact('selayang_pandang', 'isi', 'kecanatan', 'berita', 'pimpinan'));
    }
  }
  public function tentangKecamatan()
  {
    $kecamatan = Kecamatan::all();
    return view('dashboard/tentang', compact(['kecamatan']));
  }
  public function addKecamatan(Request $request)
  {
    try {
      $this->validate($request, ['struktur_organisasi' => 'file|image|mimes:png,jpg,jpeg']);
      $file = $request->file('struktur_organisasi');
      $nama_file = time() . "_" . $file->getClientOriginalName();
      $tujuan_upload = 'Gambar/Struktur';
      $file->move($tujuan_upload, $nama_file);
      $kecamatan = Kecamatan::create([
        'riwayat_singkat' => $request->riwayat_singkat,
        'visi' => $request->visi,
        'misi' => $request->misi,
        'struktur_organisasi' => $nama_file,
      ]);
      return redirect()->back()->with('success-add-info-kecamatan', 'Text');
    } catch (\Exception $e) {
      return redirect()->back()->with('error--add-info-kecamatan', 'Text');
    }
  }

  public function updateKecamatan(Request $request)
  {
    try {
      $kecamatan     = Kecamatan::FindorFail($request->id);


      $nama_file = $kecamatan->struktur_organisasi; //simpan nama file gambar yang sudah ada

      if ($request->hasFile('struktur_organisasi')) {
        $file = $request->file('struktur_organisasi');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $tujuan_upload = 'Gambar/Struktur';
        $file->move($tujuan_upload, $nama_file);
        File::delete('Gambar/Struktur/' . $kecamatan->struktur_organisasi);
      }

      $update_kecamatan = [
        'riwayat_singkat' => $request->riwayat_singkat,
        'visi' => $request->visi,
        'misi' => $request->misi,
        'struktur_organisasi' => $nama_file,
      ];

      $kecamatan->update($update_kecamatan);
      return redirect()->back()->with('success-update-info-kecamatan', 'Text');
    } catch (\Exception $e) {
      return redirect()->back()->with('error-update-info-kecamatan', 'Text');
    }
  }

  public function beritaInformasi(Request $request)
  {
    // menangkap data pencarian
    $berita = Berita::paginate(5);
    $cari = $request->cari;

    // mengambil data dari table berita sesuai pencarian data
    $berita = DB::table('berita')
      ->where('judul', 'like', "%" . $cari . "%")
      ->paginate(5);

    // mengirim data berita ke view berita
    return view('dashboard/berita', compact('berita'));
  }

  public function addBerita(Request $request)
  {
    try {
      $this->validate($request, ['gambar' => 'file|image|mimes:png,jpg,jpeg']);
      $file = $request->file('gambar');
      $nama_file = time() . "_" . $file->getClientOriginalName();
      $tujuan_upload = 'Gambar/Berita';
      $file->move($tujuan_upload, $nama_file);
      $berita = Berita::create([
        'judul'           => $request->judul,
        'isi'            => $request->isi,
        'gambar'          => $nama_file,
      ]);

      return redirect()->back()->with('success-add-berita', 'Text');
    } catch (\Exception $e) {
      return redirect()->back()->with('error-add-berita', 'Text');
    }
  }

  public function updateBerita(Request $request)
  {
    try {
      $berita   = Berita::FindorFail($request->id);
      $nama_file = $berita->gambar; //simpan nama file gambar yang sudah ada

      if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $tujuan_upload = 'Gambar/Berita';
        $file->move($tujuan_upload, $nama_file);
        File::delete('Gambar/Berita/' . $berita->gambar);
      }

      $update_berita = [
        'judul' => $request->judul,
        'isi' => $request->isi,
        'gambar' => $nama_file,
      ];

      $berita->update($update_berita);
      return redirect()->back()->with('success-update-berita', 'Text');
    } catch (\Exception $e) {
      return redirect()->back()->with('error-update-berita', 'Text');
    }
  }
  public function deleteBerita($id)
  {
    Berita::find($id)->delete();
    return redirect()->back()->with('success-delete-berita', 'Text');;
  }
  // pimpinan 
  public function infoPimpinan(Request $request)
  {
    // menangkap data pencarian
    $pimpinan = Pimpinan::paginate(5);
    $cari = $request->cari;

    // mengambil data dari table berita sesuai pencarian data
    $pimpinan = DB::table('pimpinan')
      ->where('nama', 'like', "%" . $cari . "%")
      ->paginate(5);

    // mengirim data berita ke view berita
    return view('dashboard/pimpinan', compact(['pimpinan']));
  }
  public function addPimpinan(Request $request)
  {
    try {
      $this->validate($request, ['gambar' => 'file|image|mimes:png,jpg,jpeg']);
      $file = $request->file('gambar');
      $nama_file = time() . "_" . $file->getClientOriginalName();
      $tujuan_upload = 'Gambar/Pimpinan';
      $file->move($tujuan_upload, $nama_file);
      $pimpinan = Pimpinan::create([
        'nama'          => $request->nama,
        'nip'           => $request->nip,
        'ttl'           => $request->ttl,
        'jabatan'       => $request->jabatan,
        'deskripsi'     => $request->deskripsi,
        'status_kepegawaian'       => $request->status_kepegawaian,
        'gambar'        => $nama_file,
      ]);

      return redirect()->back()->with('success-add-pimpinan', 'Text');
    } catch (\Exception $e) {
      return redirect()->back()->with('error-add-pimpinan', 'Text');
    }
  }

  public function updatePimpinan(Request $request)
  {
    try {
      $pimpinan = Pimpinan::FindorFail($request->id);
      $nama_file = $pimpinan->gambar; //simpan nama file gambar yang sudah ada

      if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $tujuan_upload = 'Gambar/Pimpinan';
        $file->move($tujuan_upload, $nama_file);
        File::delete('Gambar/Pimpinan/' . $pimpinan->gambar);
      }

      $update_pimpinan = [
        'nama'          => $request->nama,
        'nip'           => $request->nip,
        'ttl'           => $request->ttl,
        'jabatan'       => $request->jabatan,
        'deskripsi'     => $request->deskripsi,
        'status_kepegawaian'       => $request->status_kepegawaian,
        'gambar'        => $nama_file,
      ];

      $pimpinan->update($update_pimpinan);
      return redirect()->back()->with('success-update-pimpinan', 'Text');
    } catch (\Exception $e) {
      return redirect()->back()->with('error-update-pimpinan', 'Text');
    }
  }
  public function deletePimpinan($id)
  {
    Pimpinan::find($id)->delete();
    return redirect()->back()->with('success-delete-pimpinan', 'Text');;
  }

  public function infoKinerja(Request $request)
  {
    // menangkap data pencarian
    $kinerja = Kinerja::paginate(5);
    $cari = $request->cari;

    // mengambil data dari table berita sesuai pencarian data
    $kinerja = DB::table('kinerja')
      ->where('judul', 'like', "%" . $cari . "%")
      ->paginate(5);

    // mengirim data kinerja ke view kinerja
    return view('dashboard/kinerja', compact(['kinerja']));
  }
  public function addKinerja(Request $request)
  {
    try {
      $this->validate($request, ['gambar' => 'file|image|mimes:png,jpg,jpeg']);
      $file = $request->file('gambar');
      $nama_file = time() . "_" . $file->getClientOriginalName();
      $tujuan_upload = 'Gambar/Kinerja';
      $file->move($tujuan_upload, $nama_file);
      $kinerja = Kinerja::create([
        'judul'           => $request->judul,
        'tanggal_kinerja' => $request->tanggal_kinerja,
        'isi'            => $request->isi,
        'gambar'          => $nama_file,
      ]);

      return redirect()->back()->with('success-add-kinerja', 'Text');
    } catch (\Exception $e) {
      return redirect()->back()->with('error-add-kinerja', 'Text');
    }
  }

  public function updateKinerja(Request $request)
  {
    try {
      $kinerja   = Kinerja::FindorFail($request->id);
      $nama_file = $kinerja->gambar; //simpan nama file gambar yang sudah ada

      if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $tujuan_upload = 'Gambar/Kinerja';
        $file->move($tujuan_upload, $nama_file);
        File::delete('Gambar/Kinerja/' . $kinerja->gambar);
      }

      $update_kinerja = [
        'judul' => $request->judul,
        'tanggal_kinerja' => $request->tanggal_kinerja,
        'isi' => $request->isi,
        'gambar' => $nama_file,
      ];

      $kinerja->update($update_kinerja);
      return redirect()->back()->with('success-update-kinerja', 'Text');
    } catch (\Exception $e) {
      return redirect()->back()->with('error-update-kinerja', 'Text');
    }
  }
  public function deleteKinerja($id)
  {
    Kinerja::find($id)->delete();
    return redirect()->back()->with('success-delete-kinerja', 'Text');;
  }


  public function infoPengumuman(Request $request)
  {
    // menangkap data pencarian
    $pengumuman = pengumuman::paginate(5);
    $cari = $request->cari;

    // mengambil data dari table berita sesuai pencarian data
    $pengumuman = DB::table('pengumuman')
      ->where('judul', 'like', "%" . $cari . "%")
      ->paginate(5);

    // mengirim data kinerja ke view kinerja
    return view('dashboard/pengumuman', compact(['pengumuman']));
  }
  public function addPengumuman(Request $request)
  {
    try {
      $this->validate($request, ['gambar' => 'file|image|mimes:png,jpg,jpeg']);
      $file = $request->file('gambar');
      $nama_file = time() . "_" . $file->getClientOriginalName();
      $tujuan_upload = 'Gambar/Pengumuman';
      $file->move($tujuan_upload, $nama_file);
      $pengumuman = Pengumuman::create([
        'judul'           => $request->judul,
        'isi'            => $request->isi,
        'gambar'          => $nama_file,
      ]);

      return redirect()->back()->with('success-add-pengumuman', 'Text');
    } catch (\Exception $e) {
      return redirect()->back()->with('error-add-pengumuman', 'Text');
    }
  }

  public function updatePengumuman(Request $request)
  {
    try {
      $pengumuman   = Pengumuman::FindorFail($request->id);
      $nama_file = $pengumuman->gambar; //simpan nama file gambar yang sudah ada

      if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $tujuan_upload = 'Gambar/Pengumuman';
        $file->move($tujuan_upload, $nama_file);
        File::delete('Gambar/Pengumuman/' . $pengumuman->gambar);
      }

      $update_pengumuman = [
        'judul' => $request->judul,
        'isi' => $request->isi,
        'gambar' => $nama_file,
      ];

      $pengumuman->update($update_pengumuman);
      return redirect()->back()->with('success-update-pengumuman', 'Text');
    } catch (\Exception $e) {
      return redirect()->back()->with('error-update-pengumuman', 'Text');
    }
  }
  public function deletePengumuman($id)
  {
    Pengumuman::find($id)->delete();
    return redirect()->back()->with('success-delete-pengumuman', 'Text');;
  }

  public function infoUmkm(Request $request)
  {
    // menangkap data pencarian
    $umkm = Umkm::paginate(5);
    $cari = $request->cari;

    // mengambil data dari table berita sesuai pencarian data
    $umkm = DB::table('umkm')
      ->where('nama_umkm', 'like', "%" . $cari . "%")
      ->paginate(5);

    // mengirim data kinerja ke view kinerja
    return view('dashboard/umkm', compact(['umkm']));
  }
  public function addUmkm(Request $request)
  {
    try {
      $this->validate($request, ['gambar' => 'file|image|mimes:png,jpg,jpeg']);
      $file = $request->file('gambar');
      $nama_file = time() . "_" . $file->getClientOriginalName();
      $tujuan_upload = 'Gambar/Umkm';
      $file->move($tujuan_upload, $nama_file);
      $umkm = Umkm::create([
        'nama_umkm'           => $request->nama_umkm,
        'nama_pemilik'            => $request->nama_pemilik,
        'alamat'            => $request->alamat,
        'deskripsi_produk' => $request->deskripsi_produk,
        'gambar'          => $nama_file,
      ]);

      return redirect()->back()->with('success-add-umkm', 'Text');
    } catch (\Exception $e) {
      return redirect()->back()->with('error-add-umkm', 'Text');
    }
  }

  public function updateUmkm(Request $request)
  {
    try {
      $umkm   = Umkm::FindorFail($request->id);
      $nama_file = $umkm->gambar; //simpan nama file gambar yang sudah ada

      if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $tujuan_upload = 'Gambar/Umkm';
        $file->move($tujuan_upload, $nama_file);
        File::delete('Gambar/Umkm/' . $umkm->gambar);
      }

      $update_umkm = [
        'nama_umkm'           => $request->nama_umkm,
        'nama_pemilik'            => $request->nama_pemilik,
        'alamat'            => $request->alamat,
        'deskripsi_produk' => $request->deskripsi_produk,
        'gambar'          => $nama_file,
      ];

      $umkm->update($update_umkm);
      return redirect()->back()->with('success-update-umkm', 'Text');
    } catch (\Exception $e) {
      return redirect()->back()->with('error-update-umkm', 'Text');
    }
  }
  public function deleteUmkm($id)
  {
    Umkm::find($id)->delete();
    return redirect()->back()->with('success-delete-umkm', 'Text');;
  }

  public function infoWisata(Request $request)
  {
    // menangkap data pencarian
    $wisata = Wisata::paginate(5);
    $cari = $request->cari;

    // mengambil data dari table berita sesuai pencarian data
    $wisata = DB::table('wisata')
      ->where('nama_wisata', 'like', "%" . $cari . "%")
      ->paginate(5);

    // mengirim data kinerja ke view kinerja
    return view('dashboard/wisata', compact(['wisata']));
  }
  public function addWisata(Request $request)
  {
    try {
      $this->validate($request, ['gambar' => 'file|image|mimes:png,jpg,jpeg']);
      $file = $request->file('gambar');
      $nama_file = time() . "_" . $file->getClientOriginalName();
      $tujuan_upload = 'Gambar/Wisata';
      $file->move($tujuan_upload, $nama_file);
      $wisata = Wisata::create([
        'nama_wisata'           => $request->nama_wisata,
        'deskripsi'            => $request->deskripsi,
        'alamat'           => $request->alamat,
        'gambar'          => $nama_file,
      ]);

      return redirect()->back()->with('success-add-wisata', 'Text');
    } catch (\Exception $e) {
      return redirect()->back()->with('error-add-wisata', 'Text');
    }
  }

  public function updateWisata(Request $request)
  {
    try {
      $wisata   = Wisata::FindorFail($request->id);
      $nama_file = $wisata->gambar; //simpan nama file gambar yang sudah ada

      if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $tujuan_upload = 'Gambar/Wisata';
        $file->move($tujuan_upload, $nama_file);
        File::delete('Gambar/Wisata/' . $wisata->gambar);
      }

      $update_wisata = [
        'nama_wisata'           => $request->nama_wisata,
        'deskripsi'            => $request->deskripsi,
        'alamat'           => $request->alamat,
        'gambar'          => $nama_file,
      ];

      $wisata->update($update_wisata);
      return redirect()->back()->with('success-update-wisata', 'Text');
    } catch (\Exception $e) {
      return redirect()->back()->with('error-update-wisata', 'Text');
    }
  }
  public function deleteWisata($id)
  {
    Wisata::find($id)->delete();
    return redirect()->back()->with('success-delete-wisata', 'Text');;
  }

  public function tentangKuesioner()
  {
    $questionnaires = auth()->user()->questionnaires;
    return view('dashboard/kuesioner', compact('questionnaires'));
  }
}
