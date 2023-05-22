@extends('layouts.app')

@section('content')
    <div class="col-lg-8 px-0">
        <div>
            <p class="fs-4">
                QRCODE:
            </p>
            <img src="data:image/png;base64, {{$payment->encodedImage}}" alt="">
        </div>
        <br>
        <div class="card">
            <div class="card-body">
                <p><b>Copia e cola:</b> {{$payment->payload}}</p>
            </div>
        </div>
    </div>
    <hr class="col-1 my-5 mx-0">
@endsection
