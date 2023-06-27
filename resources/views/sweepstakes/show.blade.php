@extends('layout')
@section('title', 'Home')
@section('content')

    @php
        $home = true;
        $perfil = false;
        $other = false;
    @endphp

    <div class="shadow-sm clearfix mb-3 p-2 pt-3">

        <h4 class="float-start ms-3">{{ $sweepstake->title }}</h4>

        <a href="{{ route('sweepstakes.edit', $sweepstake->id) }}" class="btn btn-sm btn-p text-white float-end me-3">Edit</a>

    </div>

    <p class="ms-3 mt-5">Estatisticas</p>
    <div class="d-flex">

        <div class="w-25 rounded-3 border row p-0 shadow-sm ms-3">
            <span class="col-3 p-0 bg-success text-white rounded-start d-flex justify-content-center align-items-center">
                PT
            </span>

            <span class="col-9 rounded-end text-center py-2">
                <p class="m-0">Participantes</p>
                <p class="m-0">{{ $sweepstake->participants->count() }}</p>
            </span>
        </div>

        <div class="w-25 rounded-3 border ms-5 row p-0 shadow-sm ms-3">
            <span class="col-3 p-0 bg-warning text-white rounded-start d-flex justify-content-center align-items-center">
                DS
            </span>

            <span class="col-9 rounded-end text-center py-2">
                <p class="m-0">Data do Sorteio</p>
                <p class="m-0">{{ $sweepstake->end_date }}</p>
            </span>
        </div>

        <div class="ms-5 d-flex align-items-center w-25 justify-content-center">

            <a href="{{ route('sweepstakes.draw', $sweepstake->id) }}"
                class="btn shadow-sm btn-danger text-white float-end me-3">Sorteiar</a>

        </div>

    </div>

    <div class="mt-5 container">
        <div class="d-flex align-items-center">
            <p class="ms-3 p-0 me-5">Participantes</p>
            <a href="{{ route('participant.create', $sweepstake->id) }}" class="btn text-white btn-sm btn-p">Adicionar
                Participante</a>

        </div>

        @if (session('status'))
            {{ session('status') }}
        @endif

        <table class="table table-striped shadow-sm">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Data de cadastro</th>
                    <th>Data da Premiacao</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sweepstake->participants as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->awarded_at }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>



@endsection
