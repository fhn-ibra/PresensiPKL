<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Absen;
use App\Models\Siswa;
use Illuminate\Console\Command;

class InsertAbsen extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:insert-absen';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $siswa = Siswa::all();

        foreach ($siswa as $item){
            $absen = new Absen();
            $absen->id_siswa = $item->id;
            $absen->status = 'Tidak Hadir';
            $absen->jam_masuk = null;
            $absen->foto_masuk = null;
            $absen->lokasi_masuk = null;
            $absen->jam_keluar = null;
            $absen->foto_keluar = null;
            $absen->lokasi_keluar = null;
            $absen->foto = null;
            $absen->keterangan = null;
            $absen->keterangan = null;
            $absen->tanggal = Carbon::now()->toDateString();
            $absen->save();
        }

        $this->info('Data Harian telah Di Masukkan');
    }
}
