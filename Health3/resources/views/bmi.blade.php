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

                <div class="col">
                    <label>Hobi :</label>
                    <div class="input-group">
                        <input class="form-control" type="text" name="hobi" >
                        <input class="form-control" type="text">
                        <input class="form-control" type="text">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

            <table class="table mt-3">
                <thead>
                    <tr>
                        <th scope="col">bmi</th>
                        <th scope="col">obes</th>


                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @isset($data)
                        <td>{{ $data['bmi'] }}</td>
                        <td>{{ $data['obes']}}</td>

                        @endisset
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
