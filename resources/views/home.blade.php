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

<div class="my-5">
    <p class="ms-3">Proximos Sorteios</p>
    <div class="w-25 rounded-3 border row p-0 shadow-sm ms-3">
        <span class="col-3 bg-warning rounded-start d-flex justify-content-center align-items-center">
            ABC
        </span>
       <span class="col-9 rounded-end text-center pt-2">
         <b>Sorteio ABC</b> <br>
        <p>12 participantes</p>
       </span>
    </div>
</div>

<div class="">
  <table class="table table-striped shadow-sm">
    <thead>
      <tr>
        <th class="w-50">Sorteios</th>
        <th class="w-25">Sorteado</th>
        <th>Criacao</th>
        <th>Sorteio</th>
        <th>a</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
        <td>john@example.com</td>
        <td>john@example.com</td>
      </tr>
    </tbody>
  </table>
</div>

@endsection