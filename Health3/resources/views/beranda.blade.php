@extends('layouts.app')
@section('content')

<div clas="container">
    <div class="row">
        <div class= "col-md-10">

            <h1> Artikel TIK Health </h1>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope = "col">No</th>
                        <th scope = "col">Judul</th>
                        <th scope = "col">Isi</th>
                        <th scope = "col">Foto</th>
                        <th scope = "col">Tanggal Artikel</th>
                        <th scope = "col">Kategori</th>

                    </tr>
                </thead>
                <tbody>

                @foreach ($data as $a)
                <tr>
                    <th scope="row"> {{$loop->iteration}}</th>
                    <td> {{$a->judul}} </td>
                    <td> {{$a->isi}} </td>
                    <td>
                        <img src="{{asset('storage/' .$a->foto)}}" alt="" width="100px">
                    </td>

                    <td> {{$a->tglArtikel}} </td>
                    <td> {{$a->kategori->name}} </td>


                </tr>

                @endforeach

                </div>
            </div>
        </div>
@endsection
