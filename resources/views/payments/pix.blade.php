@extends('layouts.app')

@section('content')
    <div class="col-lg-8 px-0">
        <p class="fs-4">QRCODE:
            <img src="data:image/png;base64, {{$payment->encodedImage}}" alt="">
        </p>
        <p>copia e cola: {{$payment->payload}}</p>
    </div>
    <hr class="col-1 my-5 mx-0">
@endsection
