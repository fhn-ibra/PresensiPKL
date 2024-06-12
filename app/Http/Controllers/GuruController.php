<?php

namespace App\Http\Controllers;

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
            'title' => 'Perusahaan'
        ];
        return view('Guru.Perusahaan.index', $data);
    }

    public function siswa(){
        $data = [
            'title' => 'Rekap Siswa'
        ];
        return view('Guru.datasiswa', $data);
    }
}
