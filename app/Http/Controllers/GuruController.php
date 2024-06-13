<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function dashboard(){
        $data = [
            'title' => 'Dashboard'
        ];
        return view('Guru.dashboard', $data);
    }

    public function perusahaan(){
        $data = [
            'title' => 'Perusahaan',
            'guru' => Guru::all(),
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

        return redirect('/perusahaan');
    }
    public function detail($id){
        $data = [
            'title' => Perusahaan::find($id)->value('nama'),
            'perusahaan' => Perusahaan::find($id),
            'siswa' => Siswa::where('id_perusahaan', $id)->get()
        ];

        return view('Guru.Perusahaan.detail', $data);
    }
    

    public function siswa(Request $request){
        
        if($request->kelas == null && $request->perusahaan == null && $request->filter == null){
            $siswa = Siswa::all();
        } else {
            $siswa = [];
        }

        $data = [
            'title' => 'Rekap Absensi',
            'siswa' => $siswa,
            'perusahaan' => Perusahaan::all(),
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
}