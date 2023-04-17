@extends('layouts.app')

@section('content')
    @foreach($payments as $payment)
        <h1>Id Cobrança: {{$payment->id}}</h1>
        <div class="col-lg-8 px-0">
            <p class="fs-4">{{$payment->description}}</p>
            <p>Data da  criação: {{$payment->dateCreated}}</p>
        </div>
        <button type="button" class="btn btn-primary me-3" data-bs-toggle="offcanvas" data-bs-target="#offcanvas{{$payment->id}}">Selecione a forma de pagamento</button>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas{{$payment->id}}" aria-labelledby="offcanvas{{$payment->id}}Label">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvas{{$payment->id}}Label">Id Cobrança: {{$payment->id}}</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="dropdown mt-3">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton{{$payment->id}}" data-bs-toggle="dropdown">
                        Forma de Pagamento
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{$payment->id}}">
                        @if($payment->billingType == 'BOLETO' || $payment->billingType == 'UNDEFINED')<li><a class="dropdown-item" href="{{route('boleto', $payment->id)}}">Boleto</a></li>@endif
                        @if($payment->billingType == 'CREDIT_CARD' || $payment->billingType == 'UNDEFINED')<li><a class="dropdown-item" href="{{route('credito', $payment->id)}}">Cartão de crédito</a></li>@endif
                        @if($payment->billingType == 'PIX' || $payment->billingType == 'UNDEFINED')<li><a class="dropdown-item" href="{{route('pix', $payment->id)}}">PIX</a></li>@endif
                    </ul>
                </div>
            </div>
        </div>
        <hr class="col-1 my-5 mx-0">
    @endforeach
@endsection
