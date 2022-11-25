<?php

namespace App\Http\Controllers;

use App\Models\BMI;
use Illuminate\Http\Request;

class BMIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bmi');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //inisialisasiVariabel
        $hobbies= $request->hobi;
        $yob = $request->yob;
        $berat = $request->berat;
        $tinggi= $request->tinggi;
        $statusBMI= $statusbmi->obes();

//inisialisasi class
        $statusbmi= new statusbmi($berat, $tinggi);
        $konsul= new konsul($yob, $statusBMI);
        $hobi = explode(',',$hobbies);
        $hobiLength = count($hobi) - 1;

        //inisialisasiClass
        // $bmi = new statusbmi($request->berat, $request->tinggi);
        // $bmihasil = new hitung($berat, $tinggi );
        // $konsultasi = new Konsul($yob, $bmihasil);


        $data = [
            'bmi' => $statusbmi->bmi(),
            'status' => $statusbmi->obes(),
            'umur' => $konsul->hitungUmur(),
            'hobi' => $hobi[rand(0, $hobiLength)],
            'konsultasi' => $konsul->checkConsul(),


        ];

// dd($data);
        return view('bmi', compact('data'));
    }


}

class hitung
{
    public function __construct($berat, $tinggi)
    {
        $this->berat = $berat;
        $this->tinggi = $tinggi / 100;
    }

    public function bmi()
    {
        return $this->berat / ($this->tinggi * $this->tinggi);
    }
}

class statusbmi extends hitung
{
    public function obes()
    {
        $dbmi = $this->bmi();

        if ($dbmi < 18) {
            return 'kurus';
        } elseif ($dbmi > 30) {
            return 'obesitas';
        } else {
            return 'tidak terdaftar';
        }
    }
}

// Parent Class
class Umur
{
    // __construct runs whenever 'Age' and it's child class is called
    public function __construct($yob, $bmihasil)
    {
        $this->yob = $yob;
        $this->bmi = $bmihasil;
    }

    public function hitungUmur()
    {
        return 2022 - $this->yob;
    }
}

class Konsul extends Umur
{
    public function checkConsul()
    {
        // Call parents method
        $age = $this->hitungUmur();
        // Condition
        if ($age > 17 && $this->bmi > 30) {
            return 'Anda bisa mendapatkan konsultasi gratis!';
        } else {
            return 'Tidak memenuhi syarat';
        }
    }


}

