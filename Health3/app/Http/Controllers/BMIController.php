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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //untuk menghitung bmi
        $a = new konsul($request->berat, $request->tinggi);
        // $a->bmi();
        // $a->obes();
        $data = [
            'bmi' => $a->bmi(),
            'obes' => $a->obes(),


        ];

        return view('bmi', compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BMI  $bMI
     * @return \Illuminate\Http\Response
     */
    public function show(BMI $bMI)
    {
        $bmi->delete();
        return view();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BMI  $bMI
     * @return \Illuminate\Http\Response
     */
    public function edit(BMI $bMI)
    {
        return view('bmi', compact('bmi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BMI  $bMI
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BMI $bMI)
    {
        $bmi->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BMI  $bMI
     * @return \Illuminate\Http\Response
     */
    public function destroy(BMI $bMI)
    {
        //
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

class konsul extends hitung
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

