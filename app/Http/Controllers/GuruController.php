<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function dashboard(){
        return view('Guru.dashboard');
    }

    public function perusahaan(){
        return view('Guru.Perusahaan.index');
    }
    public function detail(){
        return view('Guru.Perusahaan.detail');
    }
    

    public function siswa(){
        return view('Guru.datasiswa');
    }
}