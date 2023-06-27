@extends('layout')
@section('title', 'Home')
@section('content')

    @php
        $home = true;
        $perfil = false;
        $other = false;
    @endphp

    <div class="shadow-sm clearfix mb-3 p-2 pt-3">

        <h4 class="float-start ms-3">Novo Participante</h4>

        <a href="{{ route('sweepstakes.show', $sweepstake->id) }}" class="btn btn-sm btn-p text-white float-end me-3">Voltar</a>

    </div>

    <div class="container-fluid w-75 my-5">
        <form method="POST" action="{{ route('participant.store') }}">
            @csrf

            <input type="hidden" name="sweepstake_id" value="{{ $sweepstake->id }}">

            <div class="my-3">
                <label class="form-label">Nome:</label>
                <input class="form-control" type="text" name="name" placeholder="Nome" value="{{ old('name') }}" />
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Email:</label>
                <input class="form-control" type="email" name="email" placeholder="Email" value="{{ old('email') }}" />
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>



            <div class="clearfix my-4">
                <button class="btn btn-sm btn-p text-white float-end">Registar</button>
            </div>

        </form>
    </div>


@endsection
