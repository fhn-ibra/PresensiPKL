<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use App\Models\Guru;
use App\Models\Siswa;
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
    

    public function siswa(){
        $data = [
            'title' => 'Rekap Siswa'
        ];
        return view('Guru.siswa', $data);
    }

    public function guru(){
        $data = [
            'title' => 'Guru',
            'guru' => Guru::all()
        ];
        return view('Guru.guru', $data);
    }
}