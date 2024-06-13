<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use App\Models\Guru;
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
    public function detail(){
        return view('Guru.Perusahaan.detail', ['title' => 'Detail Perusahaan']);
    }
    

    public function siswa(){
        $data = [
            'title' => 'Rekap Siswa'
        ];
        return view('Guru.datasiswa', $data);
    }

    public function detailPerusahaan($id){
        dd(Perusahaan::find($id));
    }
}