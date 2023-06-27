@extends('layout')
@section('title', 'Home')
@section('content')

    @php
        $home = true;
        $perfil = false;
        $other = false;
    @endphp

    <div class="shadow-sm clearfix mb-3 p-2 pt-3">

        <h4 class="float-start ms-3">Ganhadores do {{ $sweepstake->title }}</h4>

        <a href="{{ route('sweepstakes.show', $sweepstake->id) }}"
            class="btn btn-sm btn-p text-white float-end me-3">Voltar</a>

    </div>


    <div class="container w-50 my-5 p-3">
        @foreach ($winners as $item)
            <h5 class="my-3">{{ $item->name }} ({{ $item->awarded_at }})</h5>
        @endforeach
    </div>



@endsection
