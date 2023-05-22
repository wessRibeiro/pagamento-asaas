@extends('layouts.app')

@section('content')
    <p>
        <b>Identificador: </b>
    </p>
    <p>
        {{$boleto->identificationField}}
    </p>
    <div class="col-lg-8 px-0">
        <p class="fs-4">Visualizar boleto: <a href="{{$payment->bankSlipUrl}}" target="_blank">clique aqui</a></p>
        <div class="card">
            <div class="card-body">
                <p><b>Linha digitável:</b> <br>
                    {{$boleto->barCode}}
                </p>
            </div>
        </div>
    </div>
    <hr class="col-1 my-5 mx-0">
@endsection
