@extends('layouts.app')

@section('content')
    <h1>identificador: {{$boleto->identificationField}} </h1>
    <div class="col-lg-8 px-0">
        <p class="fs-4">Visualizar boleto: <a href="{{$payment->bankSlipUrl}}" target="_blank">clique aqui</a></p>
        <p>Linha digitavel: {{$boleto->barCode}}</p>
    </div>
    <hr class="col-1 my-5 mx-0">
@endsection
