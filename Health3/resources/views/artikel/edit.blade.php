@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <form action="{{ route('artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label class="form-label">judul</label>
                    <input type="text" class="form-control" name="judul" value="{{ $artikel->judul }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">isi</label>
                    <input type="text" class="form-control" name="isi" value="{{ $artikel->isi }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">TanggalArtikel</label>
                    <input type="text" class="form-control" name="tglArtikel" value="{{ $artikel->tglArtikel }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto</label>
                    <img src="{{ asset('storage/'.$artikel->foto) }}" alt="" width="100px">
                    <input class="form-control" type="file" name="foto">
                </div>
                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select class="form-select" aria-label="Default select example" name="kategori_id">
                        <option selected>Open this select menu</option>
                        @foreach ($kategori as $k)
                        <option value="{{ $k->id }}" @selected($artikel->kategori_id==$k->id)>{{ $k->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
</div>
@endsection
