@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col">

            <form action="{{ route('bmi.store') }}" method="POST">

                @csrf
                <div class="mb-3">
                    <label class="form-label">Berat Badan</label>
                    <input type="number" class="form-control" name="berat">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tinggi Badan</label>
                    <input type="number" class="form-control" name="tinggi">

                </div>

                <div class="mb-3">
                    <label class="form-label d-flex justify-content-between" for="hobi">
                        <div>Hobbies</div>
                        <div><em class="justify-content-end">jika lebih dari satu pisahkan dengan koma (,)</em></div>
                    </label>
                    <input class="form-control" id="hobi" name="hobi" type="text">
                </div>
                <div class="row">
                    <div class="col-6 mb-3">
                        <label class="form-label" for="yob">Year of Birth</label>
                        <input class="form-control" id="yob" name="yob" type="number" min="1950">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

            <table class="table mt-3">
                <thead>
                    <tr>
                        <th scope="col">bmi</th>
                        <th scope="col">status bmi</th>
                        <th scope="col">hobi</th>
                        <th scope="col">umur</th>
                        <th scope="col">konsultasi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @isset($data)
                        <td>{{ $data['bmi'] }}</td>
                        <td>{{ $data['status']}}</td>
                        <td>{{ $data['hobi'] }}</td>
                        <td>{{ $data['umur']}}</td>
                        <td>{{ $data['konsultasi']}}</td>

                        @endisset
                    </tr>
                </tbody>
            </table>
            <div class="card-footer">
                <a class="btn btn-secondary" href="{{ route('bmi.index') }}">Kembali</a>
            </div>
        </div>
    </div>
</div>

@endsection
