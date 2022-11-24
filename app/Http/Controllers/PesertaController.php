<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;

date_default_timezone_set("Asia/Jakarta");

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // mengambil data peserta lalu mengirim ke halaman peserta
        $peserta = Peserta::all();
        return view('peserta.peserta',compact('peserta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('peserta.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    
    public function store(Request $request)
    {
        // Deklarasi untuk kelas hitung
        $hitung = new Hitung();


        // Deklarasi untuk kelas Konsul
        $konsul = new Konsul();
        
        // menampung hasil dari perhitungan konsultasi bmi
        $konsultasi = $konsul->konsultasi((int)$request->tahunLahir,(int)$request->tinggiBadan,(int)$request->beratBadan);

        //
        $hobi = implode(" - ",$request->hobi);
        $peserta = new Peserta;
        $peserta->nama = $request->nama;
        $peserta->tinggiBadan = $request->tinggiBadan;
        $peserta->beratBadan = $request->beratBadan;

        $peserta->BMI = $hitung->BMI((int)$request->tinggiBadan,(int)$request->beratBadan)['BMI'];
        $peserta->statusBeratBadan = $hitung->BMI((int)$request->tinggiBadan,(int)$request->beratBadan)['statusBeratBadan'];
        
        $peserta->hobi = $hobi;
        $peserta->umur = $hitung->hitungUmur((int)$request->tahunLahir);
        $peserta->konsultasi = $konsultasi;

        $peserta->save();
        return redirect('peserta');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peserta  $peserta
     * @return \Illuminate\Http\Response
     */
    public function show(Peserta $peserta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peserta  $peserta
     * @return \Illuminate\Http\Response
     */
    public function edit(Peserta $peserta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Peserta  $peserta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peserta $peserta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peserta  $peserta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peserta $peserta)
    {
        //
    }
}

class Hitung {
    // membuat function hitung umur dengan parameter tahun lahir
    public function hitungUmur($tl){

        // mengambil tahun sekerang menggunakan date();
        $tahunSekarang = date('Y');

        // Menghitung umur dengan mengurangi tahun sekarang dengan tahun lahir
        $umur = $tahunSekarang - $tl;

        return $umur;
    }

    public function BMI($tb,$bb){

        // Penghitungan bmi
        $tinggi = $tb/ 100; 
        $tinggi_rumus = $tinggi*$tinggi;
        $hasil_tinggi = number_format($tinggi_rumus, 2, '.', '');
        $hasil = $bb/$hasil_tinggi;
        $hasil_akhir = number_format($hasil,1, '.', '');
        
        // Mempersiapkan variabel status berat badan 
        $statusBeratBadan = '';

        // If statement untuk menentukan status berat badan berdasarkan BMI
        if($hasil_akhir < 18.5){
            $statusBeratBadan = 'Kurus';
        }else if(($hasil_akhir <= 22.9)){
            $statusBeratBadan = 'Normal';
        }else if(($hasil_akhir <= 29.9)){
            $statusBeratBadan = 'Gemuk';
        }else{
            $statusBeratBadan = 'Obesitas';
        }

        // membuat array berisi BMI dan statu berat ke dalam variabel result lalu me return
        $result = [
            'BMI' => $hasil_akhir,
            'statusBeratBadan' => $statusBeratBadan,
        ];

        return $result;
    }

}

class Konsul extends Hitung {

    public function konsultasi($tanggal,$tb,$bb){
        $umur = $this->hitungUmur($tanggal);
        $statusBerat = $this->BMI($tb,$bb)['statusBeratBadan'];

        if ( $umur > 17 && $statusBerat == 'Obesitas'){
            return 'Anda bisa mendapatkan Konsultasi gratis.';
        } else {
            return 'Tidak Aktif';
        }
    }
    
}
