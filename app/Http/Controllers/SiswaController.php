<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Absen;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    public function index(){
        $data = [
            'absen' => Absen::where('id_siswa', Auth::user()->siswa->first()->id)->where('tanggal', Carbon::now()->toDateString())->first(),
            'title' => 'Home'
        ];
        return view('Siswa.dashboard', $data);
    }

    public function create(){
        $data = [
            'hari' => date("d-m-Y"),
            'title'=> 'Absensi'
        ];
        return view('Siswa.create', $data);
    }

    public function store(Request $request){
        $cek = Absen::where('tanggal', Carbon::now()->toDateString())->count();
        if($cek == 0){
            $siswa = Siswa::all();  
            foreach ($siswa as $s){
                $absen = new Absen();
                $absen->id_siswa = $s->id;
                $absen->status = 'Tidak Hadir';
                $absen->jam_masuk = null;
                $absen->foto_masuk = null;
                $absen->lokasi_masuk = null;
                $absen->jam_keluar = null;
                $absen->foto_keluar = null;
                $absen->lokasi_keluar = null;
                $absen->foto = null;
                $absen->keterangan = null;
                $absen->tanggal = Carbon::now()->toDateString();
                $absen->save();
            }
        }

        $absensi = Absen::where('id_siswa', Auth::user()->siswa->first()->id)->where('tanggal', Carbon::now()->toDateString())->first();

        if($absensi->jam_masuk == null){
            if(Carbon::now()->hour < 7){
                return ['absen' => false, 'message' => 'Anda Baru Bisa Absen Masuk Pada 07:00'];
            } 
            
            $foto = $request->image;
            $nama = Auth::user()->id . "-" . Carbon::now()->toDateString() . "-" . rand(1, 1000000);
            $img_exp = explode(";base64", $foto);
            $foto_64 = base64_decode($img_exp[1]);
            $file = $nama . ".png";
            Storage::put('public/absensi/'.$file, $foto_64);
            
            $absensi->status = 'Hadir';
            $absensi->jam_masuk = Carbon::now()->toTimeString();
            $absensi->foto_masuk = $file;
            $absensi->lokasi_masuk = $request->lokasi;
            $absensi->save();
            return ['absen' => true, 'message' => 'Absensi Masuk Berhasil'];
            
        } elseif ($absensi->jam_masuk != null && $absensi->jam_keluar == null){
            if(Carbon::now()->hour < 14){
                return ['absen' => false, 'message' => 'Anda Baru Bisa Absen Pulang Pada 14:00'];
            }

                $foto = $request->image;
                $nama = Auth::user()->id . "-" . Carbon::now()->toDateString() . "-" . rand(1, 1000000);
                $img_exp = explode(";base64", $foto);
                $foto_64 = base64_decode($img_exp[1]);
                $file = $nama . ".png";
                Storage::put('public/absensi/'.$file, $foto_64);
                
                $absensi->jam_keluar = Carbon::now()->toTimeString();
                $absensi->foto_keluar = $file;
                $absensi->lokasi_keluar = $request->lokasi;
                $absensi->save();
                return ['absen' => true, 'message' => 'Absensi Keluar Berhasil'];
                } else {
                    return ['absen' => false, 'message' => 'Anda Sudah Absen Hari Ini'];
        }
    }

    public function histori(Request $request){
        $data = [
            'title' => 'Histori',
            'bulan' => ($request->bulan == null ? Carbon::now()->month : $request->bulan),
            'absen' => ($request->bulan == null ? Absen::whereMonth('tanggal', Carbon::now()->month)->get() : Absen::whereMonth('tanggal', $request->bulan)->get())
        ];
        return view('Siswa.histori', $data);
    }
}
