<?php

namespace App\Http\Controllers\TimVerif;

use Carbon\Carbon;
use App\Models\User;
use App\Mail\Dikembalikan;
use App\Mail\JadwalExpose;
use App\Models\Permohonan;
use App\Mail\KirimRekomtek;
use App\Models\SaranExpose;
use Illuminate\Http\Request;
use App\Models\HistoriPermohonan;

use App\Http\Controllers\Controller;
use App\Mail\DraftRekomtek;
use App\Mail\KirimBatasPemutakhiran;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Mail\KirimTanggalTinjauLapangan;

class VerifikasiPermohonanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     protected function getJumlahDashboard(){
         $filterPengusahaan = "Pengusahaan";
         $filterPenggunaan = "Penggunaan";
         $filterSempadan = "Sempadan";
         if (Auth::user()->tipe_pengguna == "timVerif_pengusahaan") {

             $jumlahProsesVerif = Permohonan::
             where([
             ['permohonans.status', '=', 'proses verifikasi'],
             ['permohonans.jenis_pengajuan', 'LIKE', '%'.$filterPengusahaan.'%']
             ])
             ->get()->count();

             $jumlahProsesTinjauLapangan = Permohonan::
             where([
                 ['permohonans.status', '=', 'proses tinjau lapangan verifikasi'],
                 ['permohonans.jenis_pengajuan', 'LIKE', '%'.$filterPengusahaan.'%']
             ])
             ->get()->count();

             $jumlahProsesDraftSurat = Permohonan::
             where([
                 ['permohonans.status', '=', 'proses draft surat'],
                 ['permohonans.jenis_pengajuan', 'LIKE', '%'.$filterPengusahaan.'%']
                 ])
             ->get()->count();

         } else if (Auth::user()->tipe_pengguna == "timVerif_penggunaan") {

             $jumlahProsesVerif = Permohonan::
             where([
             ['permohonans.status', '=', 'proses verifikasi'],
             ['permohonans.jenis_pengajuan', 'LIKE', '%'.$filterPenggunaan.'%']
             ])
             ->get()->count();

             $jumlahProsesTinjauLapangan = Permohonan::
             where([
                 ['permohonans.status', '=', 'proses tinjau lapangan verifikasi'],
                 ['permohonans.jenis_pengajuan', 'LIKE', '%'.$filterPenggunaan.'%']
             ])
             ->get()->count();

             $jumlahProsesDraftSurat = Permohonan::
             where([
                 ['permohonans.status', '=', 'proses draft surat'],
                 ['permohonans.jenis_pengajuan', 'LIKE', '%'.$filterPenggunaan.'%']
                 ])
             ->get()->count();

         } else if (Auth::user()->tipe_pengguna == "timVerif_sempadan") {

             $jumlahProsesVerif = Permohonan::
             where([
             ['permohonans.status', '=', 'proses verifikasi'],
             ['permohonans.jenis_pengajuan', 'LIKE', '%'.$filterSempadan.'%']
             ])
             ->get()->count();

             $jumlahProsesTinjauLapangan = Permohonan::
             where([
                 ['permohonans.status', '=', 'proses tinjau lapangan verifikasi'],
                 ['permohonans.jenis_pengajuan', 'LIKE', '%'.$filterSempadan.'%']
             ])
             ->get()->count();

             $jumlahProsesDraftSurat = Permohonan::
             where([
                 ['permohonans.status', '=', 'proses draft surat'],
                 ['permohonans.jenis_pengajuan', 'LIKE', '%'.$filterSempadan.'%']
                 ])
             ->get()->count();
         }

         return Response()->json([$jumlahProsesVerif, $jumlahProsesTinjauLapangan, $jumlahProsesDraftSurat]);
    }

    protected function getDataProsesVerifikasi(){

        $filterPengusahaan = "Pengusahaan";
        $filterPenggunaan = "Penggunaan";
        $filterSempadan = "Sempadan";
        if (Auth::user()->tipe_pengguna == "timVerif_pengusahaan") {

        $permohonans = Permohonan::
        where([
        ['permohonans.status', '=', 'proses verifikasi'],
        ['permohonans.jenis_pengajuan', 'LIKE', '%'.$filterPengusahaan.'%']
        ])
        ->get();

        } else if (Auth::user()->tipe_pengguna == "timVerif_penggunaan") {

        $permohonans = Permohonan::
        where([
        ['permohonans.status', '=', 'proses verifikasi'],
        ['permohonans.jenis_pengajuan', 'LIKE', '%'.$filterPenggunaan.'%']
        ])
        ->get();

        } else if (Auth::user()->tipe_pengguna == "timVerif_sempadan") {

        $permohonans = Permohonan::
        where([
        ['permohonans.status', '=', 'proses verifikasi'],
        ['permohonans.jenis_pengajuan', 'LIKE', '%'.$filterSempadan.'%']
        ])
        ->get();

        }

            return datatables()->of($permohonans)

            ->addColumn('aksiListPermohonan', 'components.aksiListPermohonan')
            ->rawColumns(['aksiListPermohonan'])
            ->addIndexColumn()
            ->make(true);
    }

    public function indexKeputusanTinjauLapangan()
    {
        return view('timVerif/dashboard');
    }

    protected function getDataKeputusanTinjauLapangan(){

        $filterPengusahaan = "Pengusahaan";
        $filterPenggunaan = "Penggunaan";
        $filterSempadan = "Sempadan";
        if (Auth::user()->tipe_pengguna == "timVerif_pengusahaan") {

        $permohonans = Permohonan::
        where([
        ['permohonans.status', '=', 'proses tinjau lapangan verifikasi'],
        ['permohonans.jenis_pengajuan', 'LIKE', '%'.$filterPengusahaan.'%']
        ])
        ->get();

        } else if (Auth::user()->tipe_pengguna == "timVerif_penggunaan") {

        $permohonans = Permohonan::
        where([
        ['permohonans.status', '=', 'proses tinjau lapangan verifikasi'],
        ['permohonans.jenis_pengajuan', 'LIKE', '%'.$filterPenggunaan.'%']
        ])
        ->get();

        } else if (Auth::user()->tipe_pengguna == "timVerif_sempadan") {

        $permohonans = Permohonan::
        where([
        ['permohonans.status', '=', 'proses tinjau lapangan verifikasi'],
        ['permohonans.jenis_pengajuan', 'LIKE', '%'.$filterSempadan.'%']
        ])
        ->get();

        }

            return datatables()->of($permohonans)

            ->addColumn('aksiListPermohonan', 'components.aksiListPermohonan')
            ->rawColumns(['aksiListPermohonan'])
            ->addIndexColumn()
            ->make(true);
    }

    public function indexHistoriVerifikasi()
    {
        return view('timVerif/dashboard');
    }

    public function getDataHistoriVerifikasi()
    {

        $filterPengusahaan = "Pengusahaan";
        $filterPenggunaan = "Penggunaan";
        $filterSempadan = "Sempadan";
        if (Auth::user()->tipe_pengguna == "timVerif_pengusahaan") {

            $permohonans = Permohonan::
            where([
                ['permohonans.pemverifikasi', '=', Auth::user()->id],
                ['permohonans.status', '!=', "proses verifikasi"],
                ['permohonans.jenis_pengajuan', 'LIKE', '%'.$filterPengusahaan.'%']
                ])
            ->get();

            // ddd($permohonans);
            // return view('timVerif/dashboard', compact('permohonans'));

        } else if (Auth::user()->tipe_pengguna == "timVerif_penggunaan") {

            $permohonans = Permohonan::
            where([
                ['permohonans.pemverifikasi', '=', Auth::user()->id],
                ['permohonans.status', '!=', "proses verifikasi"],
                ['permohonans.jenis_pengajuan', 'LIKE', '%'.$filterPenggunaan.'%']
                ])
            ->get();

        } else if (Auth::user()->tipe_pengguna == "timVerif_sempadan") {

            $permohonans = Permohonan::
            where([
                ['permohonans.pemverifikasi', '=', Auth::user()->id],
                ['permohonans.status', '!=', "proses verifikasi"],
                ['permohonans.jenis_pengajuan', 'LIKE', '%'.$filterSempadan.'%']
                ])
            ->get();

        }

        return datatables()->of($permohonans)

            ->addColumn('aksiListPermohonan', 'components.aksiListPermohonan')
            ->rawColumns(['aksiListPermohonan'])
            ->addIndexColumn()
            ->make(true);
    }

    protected function getDataJadwalExpose(Request $request){

        $idPermohonan = $request->session()->get('idPermohonanSession');

        $listJadwal = Permohonan::
        where([
            ['tanggal_expose', '>=', now()],
            // ['saran_exposes.permohonan_id', '=', $idPermohonan],
        ])
        ->orderBy('tanggal_expose')
        ->get();

        return datatables()->of($listJadwal)
                // ->addColumn('aksi', function($row) use ($idPermohonan, $filterTimExpose){
                //     return view('components.aksi', compact('row', 'idPermohonan', 'filterTimExpose'));
                // })
                // // ->addColumn('aksi', 'components.aksi')
                // ->rawColumns(['aksi'])
                ->addIndexColumn()
                // ->with($idPermohonan)
                ->make(true);
                // ->toJson();
    }

    protected function getDataJadwalTinjau(Request $request){

        $idPermohonan = $request->session()->get('idPermohonanSession');

        $listJadwal = Permohonan::
        where([
            ['tanggal_tinjau_lapangan', '>=', now()],
            // ['saran_exposes.permohonan_id', '=', $idPermohonan],
        ])
        ->orderBy('tanggal_tinjau_lapangan')
        ->get();

        return datatables()->of($listJadwal)
                // ->addColumn('aksi', function($row) use ($idPermohonan, $filterTimExpose){
                //     return view('components.aksi', compact('row', 'idPermohonan', 'filterTimExpose'));
                // })
                // // ->addColumn('aksi', 'components.aksi')
                // ->rawColumns(['aksi'])
                ->addIndexColumn()
                // ->with($idPermohonan)
                ->make(true);
                // ->toJson();
    }

    public function indexUnggahRekomtek()
    {
        return view('timVerif/dashboard');

    }

    public function getDataUnggahRekomtek()
    {

        $filterPengusahaan = "Pengusahaan";
        $filterPenggunaan = "Penggunaan";
        $filterSempadan = "Sempadan";
        if (Auth::user()->tipe_pengguna == "timVerif_pengusahaan") {

            $permohonans = Permohonan::
            where([
                // ['permohonans.pemverifikasi', '=', Auth::user()->id],
                ['permohonans.jenis_pengajuan', 'LIKE', '%'.$filterPengusahaan.'%'],
                ['permohonans.status', '=', 'proses draft surat'],
                ])
            ->get();

        } else if (Auth::user()->tipe_pengguna == "timVerif_penggunaan") {

            $permohonans = Permohonan::
            where([
                // ['permohonans.pemverifikasi', '=', Auth::user()->id],
                ['permohonans.jenis_pengajuan', 'LIKE', '%'.$filterPenggunaan.'%'],
                ['permohonans.status', '=', 'proses draft surat'],
                ])
            ->get();

        } else if (Auth::user()->tipe_pengguna == "timVerif_sempadan") {

            $permohonans = Permohonan::
            where([
                // ['permohonans.pemverifikasi', '=', Auth::user()->id],
                ['permohonans.jenis_pengajuan', 'LIKE', '%'.$filterSempadan.'%'],
                ['permohonans.status', '=', 'proses draft surat'],
                ])
            ->get();

        }

        return datatables()->of($permohonans)

            ->addColumn('aksiListPermohonan', 'components.aksiListPermohonan')
            ->rawColumns(['aksiListPermohonan'])
            ->addIndexColumn()
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lihat(Request $request)
    {
        $id = Auth::user()->id;
        $idPermohonan = Crypt::decryptString($request->input('id_permohonan'));

        $dataPermohonan = Permohonan::leftjoin('users', 'users.id', 'permohonans.user_id')
        // ->leftjoin('detail_pemohons', 'detail_pemohons.user_id', '=', 'users.id')
        ->leftjoin('pemohon_permohonans', 'pemohon_permohonans.permohonan_id', 'permohonans.id')
        ->leftjoin('berkas_permohonans', 'berkas_permohonans.permohonan_id', 'permohonans.id')
        ->where([
            ['permohonans.status', '=', "proses verifikasi"],
            ['permohonans.id', '=', $idPermohonan],
        ])
        ->get(['permohonans.id as id_permohonan', 'permohonans.*', 'users.*', 'pemohon_permohonans.*', 'berkas_permohonans.*'])->first();

        $dataPermohonanLama = HistoriPermohonan::where('permohonan_id', '=', $idPermohonan)
        ->orderBy('updated_at', 'DESC')
        ->get()->first();
        // dd($dataPermohonans);

        return view('timVerif/verifikasiPermohonan', compact('dataPermohonan', 'dataPermohonanLama'));
    }

    public function lihatUnggahRekomtek(Request $request)
    {
        $id = Auth::user()->id;
        $idPermohonan = Crypt::decryptString($request->input('id_permohonan'));

        $dataPermohonans = Permohonan::leftjoin('users', 'users.id', 'permohonans.user_id')
        // ->leftjoin('detail_pemohons', 'detail_pemohons.user_id', '=', 'users.id')
        ->leftjoin('pemohon_permohonans', 'pemohon_permohonans.permohonan_id', 'permohonans.id')
        ->leftjoin('berkas_permohonans', 'berkas_permohonans.permohonan_id', 'permohonans.id')
        ->where([
            ['permohonans.id', '=', $idPermohonan],
            ['permohonans.status', '=', "proses draft surat"],
            ])
        ->get(['permohonans.id as id_permohonan', 'permohonans.*', 'users.*', 'users.id as id_pemohon', 'pemohon_permohonans.*', 'berkas_permohonans.*']);

        // dd($dataPermohonans);

        return view('timVerif/unggahRekomtek', compact('dataPermohonans', 'idPermohonan'));
    }

    public function simpanKirimRekomtek(Request $request)
    {
        $idPemohon = Crypt::decryptString($request->input('id_pemohon'));
        $idPermohonan = Crypt::decryptString($request->input('id_permohonan'));

        $simpanRekomtek = Permohonan::where([
                ['id', $idPermohonan],
            ])
            ->update([
                'status' => "proses selesai",
                'rekomtek' => $request->file('unggah_rekomtek')->storeAs('public/berkas_permohonan', $idPemohon.'.'.$idPermohonan. '.surat_rekomtek.'.$request->file('unggah_rekomtek')->getClientOriginalName()),
            ]);

        $fileRekomtek = Permohonan::leftjoin('users', 'users.id', 'permohonans.user_id')
        ->where([
            ['permohonans.id', $idPermohonan],
        ])
        ->get(['permohonans.id as id', 'permohonans.*', 'users.name'])->first();

        $email = Permohonan::leftjoin('users', 'users.id', 'permohonans.user_id')
        ->where([
            ['permohonans.id', '=', $idPermohonan],
        ])
        ->get('users.email as email');

        Mail::to($email)->send(new KirimRekomtek($fileRekomtek));

        return redirect()->route('unggah_rekomtek');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permohonan  $permohonan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permohonan $permohonan)
    {
        $id = Auth::user()->id;
        // $idPemohon = Crypt::decryptString($request->input('id_pemohon'));
        $idPermohonan = Crypt::decryptString($request->input('id_permohonan'));

        if($request->fav_language == 'dikembalikan'){
            $simpanVerif = Permohonan::where([
                ['id', $idPermohonan],
            ])
            ->update([
                'status' => "pengajuan dikembalikan verifikasi",
                'saran_dikembalikan' => $request->saran_dikembalikan,
                'pemverifikasi' => $id,
            ]);

            $email = Permohonan::leftjoin('users', 'users.id', 'permohonans.user_id')
            ->where([
                ['permohonans.id', '=', $idPermohonan],
            ])
            ->get('users.email as email');

            $dataDiKembalikan = Permohonan::leftjoin('users', 'users.id', 'permohonans.user_id')
            ->where([
                ['permohonans.id', '=', $idPermohonan],
            ])
            ->get(['permohonans.id as id', 'permohonans.*', 'users.name'])->first();

            Mail::to($email)->send(new Dikembalikan($dataDiKembalikan));
        }

        else if($request->fav_language == 'pemutakhiran'){

            $jumlahPemutakhiran = Permohonan::where([
                // ['permohonans.status', '=', "proses expose"],
                ['permohonans.id', '=', $idPermohonan],
            ])
            ->get()->first();

            $simpanKeputusan = Permohonan::where([
                ['id', $idPermohonan],
            ])
            ->update([
                'batas_pemutakhiran' => $request->batas_pemutakhiran,
                // 'batas_pemutakhiran' => Carbon::createFromFormat('d/m/Y', $request->batas_pemutakhiran)->format('Y-m-d'),
                'jumlah_pemutakhiran' => $jumlahPemutakhiran->jumlah_pemutakhiran + 1,
                'status' => "pengajuan perlu pemutakhiran",
                'catatan_pemutakhiran' => $request->catatan_pemutakhiran,
                // 'notula_expose' => $request->file('notula_expose')->storeAs('public/berkas_permohonan', $idPemohon.'.'.now()->day.'.'.now()->month.'.'.now()->year.'.'.$request->file('notula_expose')->getClientOriginalName()),
            ]);

            $untukCopyKeHistori = Permohonan::leftjoin('pemohon_permohonans', 'pemohon_permohonans.permohonan_id', 'permohonans.id')
            ->leftjoin('berkas_permohonans', 'berkas_permohonans.permohonan_id', 'permohonans.id')
            ->where([
                // ['permohonans.status', '=', "proses expose"],
                ['permohonans.id', '=', $idPermohonan],
            ])
            ->get()->first();

            // $fileNotulaExpose = Storage::get($untukCopyKeHistori->notula_expose);
            if($untukCopyKeHistori->notula_expose){
                Storage::copy($untukCopyKeHistori->notula_expose, 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->notula_expose));

                HistoriPermohonan::updateOrCreate(
                    [
                        'permohonan_id' => $idPermohonan,
                        'jumlah_pemutakhiran' => $untukCopyKeHistori->jumlah_pemutakhiran,
                    ],
                    [
                        'notula_expose' => 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->notula_expose),
                    ]);
            }

            if($untukCopyKeHistori->fotokopi_identitas){
                Storage::copy($untukCopyKeHistori->fotokopi_identitas, 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->fotokopi_identitas));

                HistoriPermohonan::updateOrCreate(
                    [
                        'permohonan_id' => $idPermohonan,
                        'jumlah_pemutakhiran' => $untukCopyKeHistori->jumlah_pemutakhiran,
                    ],
                    [
                        'fotokopi_identitas' => 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->fotokopi_identitas),
                    ]);
            }

            if($untukCopyKeHistori->berkas_persiapan_expose){
                Storage::copy($untukCopyKeHistori->berkas_persiapan_expose, 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->berkas_persiapan_expose));

                HistoriPermohonan::updateOrCreate(
                    [
                        'permohonan_id' => $idPermohonan,
                        'jumlah_pemutakhiran' => $untukCopyKeHistori->jumlah_pemutakhiran,
                    ],
                    [
                        'berkas_persiapan_expose' => 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->berkas_persiapan_expose),
                    ]);
            }

            if($untukCopyKeHistori->ba_tinjau_lapangan){

                Storage::copy($untukCopyKeHistori->ba_tinjau_lapangan, 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->ba_tinjau_lapangan));

                HistoriPermohonan::updateOrCreate(
                    [
                        'permohonan_id' => $idPermohonan,
                        'jumlah_pemutakhiran' => $untukCopyKeHistori->jumlah_pemutakhiran,
                    ],
                    [
                    'ba_tinjau_lapangan' => 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->ba_tinjau_lapangan),
                    ]);
            }

            if($untukCopyKeHistori->surat_permohonan){

                Storage::copy($untukCopyKeHistori->surat_permohonan, 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->surat_permohonan));

                HistoriPermohonan::updateOrCreate(
                    [
                        'permohonan_id' => $idPermohonan,
                        'jumlah_pemutakhiran' => $untukCopyKeHistori->jumlah_pemutakhiran,
                    ],
                    [
                        'surat_permohonan' => 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->surat_permohonan),
                    ]);
            }

            if($untukCopyKeHistori->peta_lokasi){

                Storage::copy($untukCopyKeHistori->peta_lokasi, 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->peta_lokasi));

                HistoriPermohonan::updateOrCreate(
                    [
                        'permohonan_id' => $idPermohonan,
                        'jumlah_pemutakhiran' => $untukCopyKeHistori->jumlah_pemutakhiran,
                    ],
                    [
                        'peta_lokasi' => 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->peta_lokasi),

                    ]);
            }

            if($untukCopyKeHistori->gambar_teknis){

                Storage::copy($untukCopyKeHistori->gambar_teknis, 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->gambar_teknis));

                HistoriPermohonan::updateOrCreate(
                    [
                        'permohonan_id' => $idPermohonan,
                        'jumlah_pemutakhiran' => $untukCopyKeHistori->jumlah_pemutakhiran,
                    ],
                    [
                        'gambar_teknis' => 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->gambar_teknis),

                    ]);
            }

            if($untukCopyKeHistori->detail_gambar_konstruksi){

                Storage::copy($untukCopyKeHistori->detail_gambar_konstruksi, 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->detail_gambar_konstruksi));

                HistoriPermohonan::updateOrCreate(
                    [
                        'permohonan_id' => $idPermohonan,
                        'jumlah_pemutakhiran' => $untukCopyKeHistori->jumlah_pemutakhiran,
                    ],
                    [
                        'detail_gambar_konstruksi' => 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->detail_gambar_konstruksi),

                    ]);
            }

            if($untukCopyKeHistori->perhitungan_struktur){

                Storage::copy($untukCopyKeHistori->perhitungan_struktur, 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->perhitungan_struktur));

                HistoriPermohonan::updateOrCreate(
                    [
                        'permohonan_id' => $idPermohonan,
                        'jumlah_pemutakhiran' => $untukCopyKeHistori->jumlah_pemutakhiran,
                    ],
                    [
                        'perhitungan_struktur' => 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->perhitungan_struktur),
                    ]);
            }

            if($untukCopyKeHistori->perhitungan_geologi_teknik){

                Storage::copy($untukCopyKeHistori->perhitungan_geologi_teknik, 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->perhitungan_geologi_teknik));

                HistoriPermohonan::updateOrCreate(
                    [
                        'permohonan_id' => $idPermohonan,
                        'jumlah_pemutakhiran' => $untukCopyKeHistori->jumlah_pemutakhiran,
                    ],
                    [
                        'perhitungan_geologi_teknik' => 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->perhitungan_geologi_teknik),
                    ]);
            }

            if($untukCopyKeHistori->analisis_debit_banjir){

                Storage::copy($untukCopyKeHistori->analisis_debit_banjir, 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->analisis_debit_banjir));

                HistoriPermohonan::updateOrCreate(
                    [
                        'permohonan_id' => $idPermohonan,
                        'jumlah_pemutakhiran' => $untukCopyKeHistori->jumlah_pemutakhiran,
                    ],
                    [
                        'analisis_debit_banjir' => 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->analisis_debit_banjir),
                    ]);
            }

            if($untukCopyKeHistori->perhitungan_neraca_air){

                Storage::copy($untukCopyKeHistori->perhitungan_neraca_air, 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->perhitungan_neraca_air));

                HistoriPermohonan::updateOrCreate(
                    [
                        'permohonan_id' => $idPermohonan,
                        'jumlah_pemutakhiran' => $untukCopyKeHistori->jumlah_pemutakhiran,
                    ],
                    [
                        'perhitungan_neraca_air' => 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->perhitungan_neraca_air),
                    ]);
            }

            if($untukCopyKeHistori->perencanaan_kebutuhan_air){

                Storage::copy($untukCopyKeHistori->perencanaan_kebutuhan_air, 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->perencanaan_kebutuhan_air));

                HistoriPermohonan::updateOrCreate(
                    [
                        'permohonan_id' => $idPermohonan,
                        'jumlah_pemutakhiran' => $untukCopyKeHistori->jumlah_pemutakhiran,
                    ],
                    [
                        'perencanaan_kebutuhan_air' => 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->perencanaan_kebutuhan_air),
                    ]);
            }

            if($untukCopyKeHistori->analisis_potensi_gerusan_endapan){

                Storage::copy($untukCopyKeHistori->analisis_potensi_gerusan_endapan, 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->analisis_potensi_gerusan_endapan));

                HistoriPermohonan::updateOrCreate(
                    [
                        'permohonan_id' => $idPermohonan,
                        'jumlah_pemutakhiran' => $untukCopyKeHistori->jumlah_pemutakhiran,
                    ],
                    [
                        'analisis_potensi_gerusan_endapan' => 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->analisis_potensi_gerusan_endapan),
                    ]);
            }

            if($untukCopyKeHistori->spesifikasi_metode_pelaksanaan){

                Storage::copy($untukCopyKeHistori->spesifikasi_metode_pelaksanaan, 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->spesifikasi_metode_pelaksanaan));
                HistoriPermohonan::updateOrCreate(
                    [
                        'permohonan_id' => $idPermohonan,
                        'jumlah_pemutakhiran' => $untukCopyKeHistori->jumlah_pemutakhiran,
                    ],
                    [
                        'spesifikasi_metode_pelaksanaan' => 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->spesifikasi_metode_pelaksanaan),
                    ]);
            }

            if($untukCopyKeHistori->sumber_jenis_material){

                Storage::copy($untukCopyKeHistori->sumber_jenis_material, 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->sumber_jenis_material));

                HistoriPermohonan::updateOrCreate(
                    [
                        'permohonan_id' => $idPermohonan,
                        'jumlah_pemutakhiran' => $untukCopyKeHistori->jumlah_pemutakhiran,
                    ],
                    [
                        'sumber_jenis_material' => 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->sumber_jenis_material),
                    ]);

            }

            if($untukCopyKeHistori->jenis_peralatan){

                Storage::copy($untukCopyKeHistori->jenis_peralatan, 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->jenis_peralatan));

                HistoriPermohonan::updateOrCreate(
                    [
                        'permohonan_id' => $idPermohonan,
                        'jumlah_pemutakhiran' => $untukCopyKeHistori->jumlah_pemutakhiran,
                    ],
                    [
                        'jenis_peralatan' => 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->jenis_peralatan),
                    ]);
            }

            if($untukCopyKeHistori->pola_operasi_bangunan){

                Storage::copy($untukCopyKeHistori->pola_operasi_bangunan, 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->pola_operasi_bangunan));

                HistoriPermohonan::updateOrCreate(
                    [
                        'permohonan_id' => $idPermohonan,
                        'jumlah_pemutakhiran' => $untukCopyKeHistori->jumlah_pemutakhiran,
                    ],
                    [
                        'pola_operasi_bangunan' => 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->pola_operasi_bangunan),
                    ]);
            }

            if($untukCopyKeHistori->metode_pemeliharaan){

                Storage::copy($untukCopyKeHistori->metode_pemeliharaan, 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->metode_pemeliharaan));

                HistoriPermohonan::updateOrCreate(
                    [
                        'permohonan_id' => $idPermohonan,
                        'jumlah_pemutakhiran' => $untukCopyKeHistori->jumlah_pemutakhiran,
                    ],
                    [
                        'metode_pemeliharaan' => 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->metode_pemeliharaan),
                    ]);
            }

            if($untukCopyKeHistori->proposal_metode_pengambilan_air){

                Storage::copy($untukCopyKeHistori->proposal_metode_pengambilan_air, 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->proposal_metode_pengambilan_air));

                HistoriPermohonan::updateOrCreate(
                    [
                        'permohonan_id' => $idPermohonan,
                        'jumlah_pemutakhiran' => $untukCopyKeHistori->jumlah_pemutakhiran,
                    ],
                    [
                        'proposal_metode_pengambilan_air' => 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->proposal_metode_pengambilan_air),
                    ]);
            }

            if($untukCopyKeHistori->rencana_waktu_pelaksanaan_konstruksi){

                Storage::copy($untukCopyKeHistori->rencana_waktu_pelaksanaan_konstruksi, 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->rencana_waktu_pelaksanaan_konstruksi));

                HistoriPermohonan::updateOrCreate(
                    [
                        'permohonan_id' => $idPermohonan,
                        'jumlah_pemutakhiran' => $untukCopyKeHistori->jumlah_pemutakhiran,
                    ],
                    [
                        'rencana_waktu_pelaksanaan_konstruksi' => 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->rencana_waktu_pelaksanaan_konstruksi),
                    ]);
            }

            if($untukCopyKeHistori->proposal_metode_jadwal_pelaksanaan){

                Storage::copy($untukCopyKeHistori->proposal_metode_jadwal_pelaksanaan, 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->proposal_metode_jadwal_pelaksanaan));

                HistoriPermohonan::updateOrCreate(
                    [
                        'permohonan_id' => $idPermohonan,
                        'jumlah_pemutakhiran' => $untukCopyKeHistori->jumlah_pemutakhiran,
                    ],
                    [
                        'proposal_metode_jadwal_pelaksanaan' => 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->proposal_metode_jadwal_pelaksanaan),
                    ]);
            }

            if($untukCopyKeHistori->analisis_kualitas_air){

                Storage::copy($untukCopyKeHistori->analisis_kualitas_air, 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->analisis_kualitas_air));

                HistoriPermohonan::updateOrCreate(
                    [
                        'permohonan_id' => $idPermohonan,
                        'jumlah_pemutakhiran' => $untukCopyKeHistori->jumlah_pemutakhiran,
                    ],
                    [
                        'analisis_kualitas_air' => 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->analisis_kualitas_air),
                    ]);
            }

            if($untukCopyKeHistori->bukti_kepemilikan_lahan){

                Storage::copy($untukCopyKeHistori->bukti_kepemilikan_lahan, 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->bukti_kepemilikan_lahan));

                HistoriPermohonan::updateOrCreate(
                    [
                        'permohonan_id' => $idPermohonan,
                        'jumlah_pemutakhiran' => $untukCopyKeHistori->jumlah_pemutakhiran,
                    ],
                    [
                        'bukti_kepemilikan_lahan' => 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->bukti_kepemilikan_lahan),
                    ]);
            }

            if($untukCopyKeHistori->fotokopi_pajak_bumi_bangunan){

                Storage::copy($untukCopyKeHistori->fotokopi_pajak_bumi_bangunan, 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->fotokopi_pajak_bumi_bangunan));

                HistoriPermohonan::updateOrCreate(
                    [
                        'permohonan_id' => $idPermohonan,
                        'jumlah_pemutakhiran' => $untukCopyKeHistori->jumlah_pemutakhiran,
                    ],
                    [
                        'fotokopi_pajak_bumi_bangunan' => 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->fotokopi_pajak_bumi_bangunan),
                    ]);
            }

            if($untukCopyKeHistori->rekap_volume_pengambilan_air){

                Storage::copy($untukCopyKeHistori->rekap_volume_pengambilan_air, 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->rekap_volume_pengambilan_air));

                HistoriPermohonan::updateOrCreate(
                    [
                        'permohonan_id' => $idPermohonan,
                        'jumlah_pemutakhiran' => $untukCopyKeHistori->jumlah_pemutakhiran,
                    ],
                    [
                        'rekap_volume_pengambilan_air' => 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->rekap_volume_pengambilan_air),
                    ]);
            }

            if($untukCopyKeHistori->bukti_setor_pajak_air){

                Storage::copy($untukCopyKeHistori->bukti_setor_pajak_air, 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->bukti_setor_pajak_air));

                HistoriPermohonan::updateOrCreate(
                    [
                        'permohonan_id' => $idPermohonan,
                        'jumlah_pemutakhiran' => $untukCopyKeHistori->jumlah_pemutakhiran,
                    ],
                    [
                        'bukti_setor_pajak_air' => 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->bukti_setor_pajak_air),
                    ]);

            }

            if($untukCopyKeHistori->draft_laporan_pemantauan){

                Storage::copy($untukCopyKeHistori->draft_laporan_pemantauan, 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->draft_laporan_pemantauan));

                HistoriPermohonan::updateOrCreate(
                    [
                        'permohonan_id' => $idPermohonan,
                        'jumlah_pemutakhiran' => $untukCopyKeHistori->jumlah_pemutakhiran,
                    ],
                    [
                        'draft_laporan_pemantauan' => 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->draft_laporan_pemantauan),
                    ]);
            }

            if($untukCopyKeHistori->surat_ket_muka_air){

                Storage::copy($untukCopyKeHistori->surat_ket_muka_air, 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->surat_ket_muka_air));

                HistoriPermohonan::updateOrCreate(
                    [
                        'permohonan_id' => $idPermohonan,
                        'jumlah_pemutakhiran' => $untukCopyKeHistori->jumlah_pemutakhiran,
                    ],
                    [
                        'surat_ket_muka_air' => 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->surat_ket_muka_air),
                    ]);
            }

            if($untukCopyKeHistori->hasil_pkm){

                Storage::copy($untukCopyKeHistori->hasil_pkm, 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->hasil_pkm));

                HistoriPermohonan::updateOrCreate(
                    [
                        'permohonan_id' => $idPermohonan,
                        'jumlah_pemutakhiran' => $untukCopyKeHistori->jumlah_pemutakhiran,
                    ],
                    [
                        'hasil_pkm' => 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->hasil_pkm),
                    ]);
            }

            if($untukCopyKeHistori->salinan_izin_sda_yang_akan_diperpanjang){

                Storage::copy($untukCopyKeHistori->salinan_izin_sda_yang_akan_diperpanjang, 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->salinan_izin_sda_yang_akan_diperpanjang));

                HistoriPermohonan::updateOrCreate(
                    [
                        'permohonan_id' => $idPermohonan,
                        'jumlah_pemutakhiran' => $untukCopyKeHistori->jumlah_pemutakhiran,
                    ],
                    [
                        'salinan_izin_sda_yang_akan_diperpanjang' => 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->salinan_izin_sda_yang_akan_diperpanjang),
                    ]);
            }

            $backupPermohonanYGDimutakhirkan   =   HistoriPermohonan::updateOrCreate(
                [
                    'permohonan_id' => $idPermohonan,
                    'jumlah_pemutakhiran' => $untukCopyKeHistori->jumlah_pemutakhiran,
                ],
                [
                    'name' => $untukCopyKeHistori->name,
                    'alamat' => $untukCopyKeHistori->alamat,
                    'pekerjaan' => $untukCopyKeHistori->pekerjaan,
                    'no_hp_pemohon' => $untukCopyKeHistori->no_hp_pemohon,
                    'nama_perusahaan' => $untukCopyKeHistori->nama_perusahaan,
                    'alamat_perusahaan' => $untukCopyKeHistori->alamat_perusahaan,
                    'no_telp_perusahaan' => $untukCopyKeHistori->no_telp_perusahaan,
                    // 'fotokopi_identitas' => 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->fotokopi_identitas),

                    'jenis_pengajuan' => $untukCopyKeHistori->jenis_pengajuan,
                    'tujuan_pengajuan' => $untukCopyKeHistori->tujuan_pengajuan,
                    'nama_pekerjaan' => $untukCopyKeHistori->nama_pekerjaan,

                    'longitude' => $untukCopyKeHistori->longitude,
                    'latitude' => $untukCopyKeHistori->latitude,
                    'sumber_air' => $untukCopyKeHistori->sumber_air,
                    'wilayah_sungai' => $untukCopyKeHistori->wilayah_sungai,
                    'kelurahaan' => $untukCopyKeHistori->kelurahaan,
                    'kecamatan' => $untukCopyKeHistori->kecamatan,
                    'kabupaten_kota' => $untukCopyKeHistori->kabupaten_kota,
                    'provinsi' => $untukCopyKeHistori->provinsi,

                    'cara_pengambilan' => $untukCopyKeHistori->cara_pengambilan,
                    'cara_pembuangan_air' => $untukCopyKeHistori->cara_pembuangan_air,
                    'volume_pengambilan_detik' => $untukCopyKeHistori->volume_pengambilan_detik,
                    'volume_pengambilan_bulan' => $untukCopyKeHistori->volume_pengambilan_bulan,
                    'lama_pengambilan_perhari' => $untukCopyKeHistori->lama_pengambilan_perhari,
                    'jenis_tipe_konstruksi' => $untukCopyKeHistori->jenis_tipe_konstruksi,
                    'jadwal_pelaksanaan_konstruksi' => $untukCopyKeHistori->jadwal_pelaksanaan_konstruksi,
                    'jangka_waktu_yang_dimohonkan' => $untukCopyKeHistori->jangka_waktu_yang_dimohonkan,

                    'pemberi_izin' => $untukCopyKeHistori->pemberi_izin,
                    'nomor_tanggal_izin' => $untukCopyKeHistori->nomor_tanggal_izin,
                    'masa_berlaku_izin' => $untukCopyKeHistori->masa_berlaku_izin,
                    'volume_diizinkan' => $untukCopyKeHistori->volume_diizinkan,

                    'tanggal_expose' => $untukCopyKeHistori->tanggal_expose,
                    // 'waktu_expose' => $untukCopyKeHistori->waktu_expose,
                    'tempat_expose' => $untukCopyKeHistori->tempat_expose,
                    'id_zoom_expose' => $untukCopyKeHistori->id_zoom_expose,
                    'password_zoom_expose' => $untukCopyKeHistori->password_zoom_expose,
                    'catatan_undangan_expose' => $untukCopyKeHistori->catatan_undangan_expose,
                    'batas_pemutakhiran' => $untukCopyKeHistori->batas_pemutakhiran,
                    'catatan_pemutakhiran' => $untukCopyKeHistori->catatan_pemutakhiran,
                    'tanggal_tinjau_lapangan' => $untukCopyKeHistori->tanggal_tinjau_lapangan,
                    // 'berkas_persiapan_expose' => 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->berkas_persiapan_expose),
                    // 'notula_expose' => 'public/berkas_permohonan/pemutakhiran_'.$untukCopyKeHistori->jumlah_pemutakhiran.'.'.basename($untukCopyKeHistori->notula_expose),

                    'status' => $untukCopyKeHistori->status,
                    'tgl_diajukan' => $untukCopyKeHistori->tgl_diajukan,
                    'pemverifikasi' => $untukCopyKeHistori->pemverifikasi,
                    'jumlah_pemutakhiran' => $untukCopyKeHistori->jumlah_pemutakhiran,
                ]);

            $backupPermohonanYGDimutakhirkan->save();

            $hapusTimExpose = SaranExpose::where([
                ['permohonan_id', '=', $idPermohonan],
            ])
            ->delete();

            $email = Permohonan::leftjoin('users', 'users.id', 'permohonans.user_id')
            ->where([
                ['permohonans.id', '=', $idPermohonan],
            ])
            ->get('users.email as email');

            $dataPemutakhiran = Permohonan::leftjoin('users', 'users.id', 'permohonans.user_id')
            ->where([
                ['permohonans.id', '=', $idPermohonan],
            ])
            ->get(['permohonans.id as id', 'permohonans.*', 'users.name'])->first();

            Mail::to($email)->send(new KirimBatasPemutakhiran($dataPemutakhiran));

        }

        else if($request->radio_expose == 'Ya'){
            $simpanVerif = Permohonan::where([
                ['id', $idPermohonan],
            ])
            ->update([
                'tanggal_expose' => $request->tanggal_expose,
                // 'tanggal_expose' => Carbon::createFromFormat('d/m/Y', $request->tanggal_expose)->format('Y-m-d'),
                // 'waktu_expose' => $request->waktu_expose,
                'tempat_expose' => $request->tempat_expose,
                'id_zoom_expose' => $request->id_zoom_expose,
                'password_zoom_expose' => $request->password_zoom_expose,
                'catatan_undangan_expose' => $request->catatan_undangan_expose,
                'status' => "proses expose",
                'pemverifikasi' => $id,
            ]);

            $email = Permohonan::leftjoin('users', 'users.id', 'permohonans.user_id')
            ->where([
                ['permohonans.status', '=', "proses expose"],
                ['permohonans.id', '=', $idPermohonan],
            ])
            ->get('users.email as email');

            $dataExpose = Permohonan::leftjoin('users', 'users.id', 'permohonans.user_id')
            ->where([
                ['permohonans.status', '=', "proses expose"],
                ['permohonans.id', '=', $idPermohonan],
            ])

            // ->get(['permohonans.*']);
            ->get(['permohonans.id as id', 'permohonans.*', 'users.name'])->first();

            Mail::to($email)->send(new JadwalExpose($dataExpose));

        } else if($request->radio_tinjau_lapangan == 'Ya'){
            $simpanVerif = Permohonan::where([
                ['id', $idPermohonan],
            ])
            ->update([
                'tanggal_tinjau_lapangan' => $request->tanggal_tinjau_lapangan,
                'status' => "proses tinjau lapangan verifikasi",
                'pemverifikasi' => $id,
            ]);

            $email = Permohonan::leftjoin('users', 'users.id', 'permohonans.user_id')
            ->where([
                ['permohonans.id', '=', $idPermohonan],
            ])
            ->get('users.email as email');

            $dataTinjauLapangan = Permohonan::leftjoin('users', 'users.id', 'permohonans.user_id')
            ->where([
                ['permohonans.id', '=', $idPermohonan],
            ])
            ->get(['permohonans.id as id', 'permohonans.*', 'users.name'])->first();

            Mail::to($email)->send(new KirimTanggalTinjauLapangan($dataTinjauLapangan));

        } else if($request->radio_tinjau_lapangan == 'Tidak'){
            $simpanVerif = Permohonan::where([
                ['id', $idPermohonan],
            ])
            ->update([
                'status' => "proses draft surat",
                'pemverifikasi' => $id,
            ]);

            $email = Permohonan::leftjoin('users', 'users.id', 'permohonans.user_id')
            ->where([
                ['permohonans.id', '=', $idPermohonan],
            ])
            ->get('users.email as email');

            $dataDraftRekomtek = Permohonan::leftjoin('users', 'users.id', 'permohonans.user_id')
            ->where([
                ['permohonans.id', '=', $idPermohonan],
            ])
            ->get(['permohonans.id as id', 'permohonans.*', 'users.name'])->first();

            Mail::to($email)->send(new DraftRekomtek($dataDraftRekomtek));
        }
        else if($request->radio_expose == 'Tidak' && $request->status_permohonan == "proses tinjau lapangan verifikasi"){
            $simpanVerif = Permohonan::where([
                ['id', $idPermohonan],
            ])
            ->update([
                'status' => "proses draft surat",
                'pemverifikasi' => $id,
            ]);

            $email = Permohonan::leftjoin('users', 'users.id', 'permohonans.user_id')
            ->where([
                ['permohonans.id', '=', $idPermohonan],
            ])
            ->get('users.email as email');

            $dataDraftRekomtek = Permohonan::leftjoin('users', 'users.id', 'permohonans.user_id')
            ->where([
                ['permohonans.id', '=', $idPermohonan],
            ])
            ->get(['permohonans.id as id', 'permohonans.*', 'users.name'])->first();

            Mail::to($email)->send(new DraftRekomtek($dataDraftRekomtek));
        }
        // dd($simpanVerif);

        $permohonans = Permohonan::where('permohonans.user_id', $id)
        ->leftjoin('users', 'users.id', '=', 'permohonans.user_id')
        // ->leftjoin('detail_pemohons', 'detail_pemohons.user_id', '=', 'users.id')
        // ->orderBy('tgl_diajukan', 'DESC')
        ->get(['permohonans.*', 'users.name']);

        return redirect()->route('dashboard')->with('permohonans',$permohonans);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permohonan  $permohonan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permohonan $permohonan)
    {
        //
    }
}
