@extends('layout')
@section('title', 'Home')
@section('content')

    @php
        $home = true;
        $perfil = false;
        $other = false;
    @endphp

    <div class="shadow-sm clearfix mb-3 p-2 pt-3">

        <h4 class="float-start ms-3">Home</h4>

        <a href="{{ route('sweepstakes.create') }}" class="btn btn-sm btn-p text-white float-end me-3">Novo Sorteio</a>

    </div>

    @if (session('status'))
        <div class="alert alert-success alert-dismissible w-50 mx-auto fade show d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                <use xlink:href="#check-circle-fill" />
            </svg>
            <div>
                {{ session('status') }}
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <p class="ms-3 mt-5">Proximos Sorteios</p>
    <div class="mb-5 container d-flex justify-content-between">

        @foreach ($sweepstake_next as $item)
            <a href="{{ route('sweepstakes.show', $item->id) }}"
                class="w-25  rounded-3 border row p-0 shadow-sm ms-3 text-dark" style="text-decoration: none">
                <span
                    class="col-3 p-0 bg-success text-white rounded-start d-flex justify-content-center align-items-center">
                    {{ Str::substr(Str::upper($item->title), 0, 2) }}
                </span>
                <span class="col-9 rounded-end p-0 text-center pt-2">
                    <p class="btn fw-bold p-0 m-0">{{ $item->title }}</p>
                    <br>
                    <p class="p-0">{{ $item->participants->count() }} participantes</p>
                </span>
            </a>
        @endforeach

    </div>

    <div class="">
        <p class="ms-3 p-0">Todos Sorteios</p>
        <table class="table table-striped shadow-sm">
            <thead>
                <tr>
                    <th class="w-25">Sorteios</th>
                    <th>Sorteado</th>
                    <th>Criacao</th>
                    <th>Data do Sorteio</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sweepstake_all as $item)
                    @php
                        $end = strtotime($item->end_date);
                    @endphp

                    <tr>
                        <td><a href="{{ route('sweepstakes.show', ['sweepstake' => $item->id]) }}"
                                class="btn">{{ $item->title }}</a></td>
                        <td>{{ $item->participants->whereNotNull('end_date')->first() ? 'sim' : 'nao' }}</td>
                        <td>{{ $item->created_at->format('d/m/Y h:i:s') }}</td>
                        <td>{{ date('d/m/Y h:i:s', $end) }}</td>
                        <td>
                            <a href="{{ route('sweepstakes.edit', ['sweepstake' => $item->id]) }}"
                                class="btn text-primary">Edit</a>

                            <form action="{{ route('sweepstakes.destroy', $item->id) }}" method="post">
                                @csrf

                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn text-primary">delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

@endsection
