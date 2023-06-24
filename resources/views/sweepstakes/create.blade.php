@extends('layout')
@section('title', 'Home')
@section('content')

    @php
        $home = true;
        $perfil = false;
        $other = false;
    @endphp

    <div class="shadow-sm clearfix mb-3 p-2 pt-3">

        <h4 class="float-start ms-3">Novo Sorteio</h4>

        <a href="{{ route('home') }}" class="btn btn-sm btn-p text-white float-end me-3">Home</a>

    </div>

    <div class="container-fluid w-75 my-5">
        <form method="POST" action="{{ route('sweepstakes.store') }}">
            @csrf

            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

            <div class="my-3">
                <label class="form-label">Titulo:</label>
                <input class="form-control" type="text" name="title" placeholder="Titulo" value="{{ old('title') }}" />
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Descricao:</label>
                <textarea name="description" class="form-control" placeholder="Descricao">{{ old('description') }}</textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="row mt-3">
                <div class="col-sm-6">
                    <label class="form-label">Numero de Ganhadores:</label>
                    <input class="form-control" type="number" name="number_winners" placeholder="Numero de ganhadores"
                        value="{{ old('number_winners') }}" />
                    @error('number_winners')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <div class="col-sm-6">
                    <label class="form-label">Data do Sorteio:</label>
                    <input class="form-control" type="datetime-local" name="end_date" placeholder="Data do Sorteio"
                        value="{{ old('end_date') }}" />
                    @error('end_date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

            </div>


            <div class="clearfix my-4">
                <button class="btn btn-sm btn-p text-white float-end">Registar</button>
            </div>

        </form>
    </div>


@endsection
