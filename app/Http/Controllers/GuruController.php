<?php

namespace App\Http\Controllers;

use App\Exports\AbsensiExport;
use Carbon\Carbon;
use App\Models\Guru;
use App\Models\User;
use App\Models\Absen;
use App\Models\Siswa;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class GuruController extends Controller
{
    public function dashboard(){
        $data = [
            'title' => 'Dashboard',
            'hadir' => Absen::where('status', 'Hadir')->count(),
            'tidak' => Absen::where('status', 'Tidak Hadir')->count(),
            'izin' => Absen::where('status', 'Izin')->count()
        ];
        return view('Guru.dashboard', $data);
    }

    public function perusahaan(){
        $data = [
            'title' => 'Perusahaan',
            'guru' => Guru::with('user')->get()->sortBy(function ($guru) { return $guru->user->nama;}),
            'perusahaan' => Perusahaan::all()
        ];

        return view('Guru.Perusahaan.index', $data);
    }

    public function addPerusahaan(Request $request){
        $perusahaan = new Perusahaan();
        $perusahaan->nama = $request->nama_perusahaan;
        $perusahaan->alamat = $request->alamat_perusahaan;
        $perusahaan->pj = $request->pj_perusahaan;
        $perusahaan->nohp = $request->no_pj;
        $perusahaan->id_guru = $request->guru;
        $perusahaan->save();

        return redirect('/perusahaan')->with(['success' => 'Data Perusahaan Berhasil Dibuat']);
    }
    public function detail($id){
        $perusahaan = Perusahaan::find($id);
        $data = [
            'title' => Perusahaan::find($id)->value('nama'),
            'perusahaan' => $perusahaan,
            'siswa' => Siswa::where('id_perusahaan', $id)->get(),
            'guru' => Guru::whereNot('id', $perusahaan->id_guru)->get(),
            'id' => $id
        ];

        return view('Guru.Perusahaan.detail', $data);
    }

    public function edit(Request $request, $id){
        $perusahaan = Perusahaan::find($id);
        $perusahaan->nama = $request->nama_perusahaan;
        $perusahaan->alamat = $request->alamat_perusahaan;
        $perusahaan->pj= $request->pj_perusahaan;
        $perusahaan->nohp = $request->no_pj;
        $perusahaan->id_guru = $request->guru;
        $perusahaan->save();

        return back()->with(['success' => true]);
    }
    

    public function siswa(Request $request){
        if($request->kelas == null && $request->perusahaan == null && $request->filter == null){
            $absen = Absen::whereDate('tanggal', Carbon::now()->toDateString())->with(['siswa' => function ($query) {
                $query->with('user')->orderBy('kelas')->orderBy(function ($query) {
                    $query->select('nama')->from('user')->whereColumn('user.id', 'siswa.id_user');
                });
            }])->get();

        } elseif ($request->kelas == null && $request->perusahaan == null && $request->filter != null) {
            $absen = Absen::whereMonth('tanggal', $request->filter)->with(['siswa' => function ($query) {
                $query->with('user')->orderBy('kelas')->orderBy(function ($query) {
                    $query->select('nama')->from('user')->whereColumn('user.id', 'siswa.id_user');
                });
            }])->get();

        } elseif ($request->kelas == null && $request->perusahaan != null && $request->filter != null){
            $absen = Absen::whereMonth('tanggal', $request->filter)->whereHas('siswa', function ($query) use ($request) {
                $query->where('id_perusahaan', $request->perusahaan);
            })->with(['siswa' => function ($query) {
                $query->with('user')->orderBy('kelas')->orderBy(function ($query) {
                    $query->select('nama')->from('user')->whereColumn('user.id', 'siswa.id_user');
                });
            }])->get();
            
        } elseif ($request->kelas != null && $request->perusahaan == null && $request->filter == null) {
            $absen = Absen::whereDate('tanggal', Carbon::now()->toDateString())->whereHas('siswa', function ($query) use ($request) {
                $query->where('kelas', $request->kelas);
            })->with(['siswa' => function ($query) {
                $query->with('user')->orderBy('kelas')->orderBy(function ($query) {
                    $query->select('nama')->from('user')->whereColumn('user.id', 'siswa.id_user');
                });
            }])->get();

        } elseif ($request->kelas != null && $request->perusahaan == null && $request->filter != null) {
            $absen = Absen::whereMonth('tanggal', $request->filter)->whereHas('siswa', function ($query) use ($request) {
                $query->where('kelas', $request->kelas);
            })->with(['siswa' => function ($query) {
                $query->with('user')->orderBy('kelas')->orderBy(function ($query) {
                    $query->select('nama')->from('user')->whereColumn('user.id', 'siswa.id_user');
                });
            }])->get();

        } elseif ($request->kelas != null && $request->perusahaan != null && $request->filter == null) {
            $absen = Absen::whereDate('tanggal', Carbon::now()->toDateString())->whereHas('siswa', function ($query) use ($request) {
                $query->where('id_perusahaan', $request->perusahaan)->where('kelas', $request->kelas);
            })->with(['siswa' => function ($query) {
                $query->with('user')->orderBy('kelas')->orderBy(function ($query) {
                    $query->select('nama')->from('user')->whereColumn('user.id', 'siswa.id_user');
                });
            }])->get();
        } elseif ($request->kelas == null && $request->perusahaan != null && $request->filter == null) {
            $absen = Absen::whereDate('tanggal', Carbon::now()->toDateString())->whereHas('siswa', function ($query) use ($request) {
                $query->where('id_perusahaan', $request->perusahaan);
            })->with(['siswa' => function ($query) {
                $query->with('user')->orderBy('kelas')->orderBy(function ($query) {
                    $query->select('nama')->from('user')->whereColumn('user.id', 'siswa.id_user');
                });
            }])->get();
            
        } else {
            $absen = Absen::whereMonth('tanggal', $request->filter)->whereHas('siswa', function ($query) use ($request) {
                $query->where('id_perusahaan', $request->perusahaan)->when($request->kelas, function ($query, $kelas) {
                    $query->where('kelas', $kelas);
                });
            })->with(['siswa' => function ($query) {
                $query->with('user')->orderBy('kelas')->orderBy(function ($query) {
                    $query->select('nama')->from('user')->whereColumn('user.id', 'siswa.id_user');
              });
            }])->get();
        }

        $data = [
            'title' => 'Rekap Absensi',
            'absen' => $absen,
            'perusahaan' => Perusahaan::orderBy('nama')->get(),
            'reqkelas' => $request->kelas,
            'reqperusahaan' => $request->perusahaan,
            'reqfilter' => $request->filter
        ];
        
        return view('Guru.siswa', $data);
    }

    public function guru(){
        $data = [
            'title' => 'Guru',
            'guru' => Guru::all()->sortBy('nama')
        ];
        return view('Guru.guru', $data);
    }

    public function addGuru(Request $request){
        $user = new User();
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->level = 'guru';
        $user->save();

        $guru = new Guru();
        $guru->id_user = $user->id;
        $guru->nohp = $request->nohp;
        $guru->save();

        return redirect('/guru')->with(['success' => 'Data Guru Berhasil Dibuat']);
    }

    public function export(Request $request){
        return Excel::download(new AbsensiExport($request->kelas, $request->perusahaan, $request->filter), 'absensi.xlsx');
    }
}