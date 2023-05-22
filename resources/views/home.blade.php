@extends('layouts.app')

@section('content')
    <h1>
        Cobranças
    </h1>
    <hr class="col-1 my-5 mx-0">
    <h5>
        Criar nova cobrança:
    </h5>
    <div class="dropdown mt-3">
        <button class="btn btn-primary me-3 dropdown-toggle" type="button" id="dropdownMenuButtonPayment" data-bs-toggle="dropdown">
            Selecione a forma de pagamento
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonPayment">
            <li>
                <a class="dropdown-item" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBoleto">
                    <i class="fa-solid fa-barcode"></i> Boleto
                </a>
            </li>
            <li>
                <a class="dropdown-item" data-bs-toggle="offcanvas" data-bs-target="#offcanvasPix">
                    <i class="fas fa-mobile-alt mr-2"></i> PIX
                </a>
            </li>
            <li>
                <a class="dropdown-item" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCreditCard">
                    <i class="fas fa-credit-card mr-2"></i> Cartão de crédito
                </a>
            </li>
        </ul>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasCreditCard"
             aria-labelledby="offcanvasCreditCardLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasCreditCardLabel">Informações do cartão de crédito</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div id="credit-card" class="tab-pane fade show active pt-3">
                    <form role="form" method="post" action="{{route('payment.store')}}">
                        @csrf
                        <input type="hidden" name="billingType" value="CREDIT_CARD">
                        <div class="row">
                            <div class="form-group">
                                <label for="holderName">
                                    <h6>Nome</h6>
                                </label>
                                <input type="text" name="holderName" id="holderName" placeholder="Nome" required
                                       class="form-control ">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label for="number">
                                    <h6>Cartão de crédito</h6>
                                </label>
                                <div class="input-group mb-3">
                                    <input type="text" name="number" id="number"
                                           placeholder="Número do cartão de crédito" class="form-control" required>
                                    <span class="input-group-text">
                                                <i class="fab fa-cc-mastercard mx-1"></i>
                                                <i class="fab fa-cc-visa mx-1"></i>
                                            </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label>
                                        <span class="hidden-xs">
                                            <h6>Data de validade</h6>
                                        </span>
                                    </label>
                                    <div class="input-group">
                                        <input type="number" placeholder="MM" name="expiryMonth" class="form-control"
                                               required min="1" max="12">
                                        <input type="text" pattern="\d*" maxlength="4" minlength="4" placeholder="AAAA"
                                               name="expiryYear" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group mb-4">
                                    <label data-toggle="tooltip"
                                           title="Código de verificação de três dígitos no verso do seu cartão"
                                           id="ccv">
                                        <h6>CVV <i class="fa fa-question-circle d-inline"></i></h6>
                                    </label>
                                    <input type="text" pattern="\d*" maxlength="3" minlength="3" placeholder="123"
                                           required class="form-control" name="ccv" id="ccv">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label for="value">
                                    <h6>Valor</h6>
                                </label>
                                <input type="number" pattern="\d*" name="value" id="value" placeholder="Valor" required class="form-control ">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label for="value">
                                    <h6>Descrição</h6>
                                </label>
                                <textarea name="description" id="description" placeholder="Descrição" required class="form-control "></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="card-footer">
                            <button type="submit" class="subscribe btn btn-primary btn-block shadow-sm"> Finalizar
                                pagamento
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasBoleto"
             aria-labelledby="offcanvasBoletoLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasBoletoLabel">Informações do Boleto</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div id="boleto" class="tab-pane fade show active pt-3">
                    <form role="form" method="post" action="{{route('payment.store')}}">
                        @csrf
                        <input type="hidden" name="billingType" value="BOLETO">
                        <div class="row">
                            <div class="form-group">
                                <label for="value">
                                    <h6>Valor</h6>
                                </label>
                                <input type="number" pattern="\d*" name="value" id="value" placeholder="Valor" required class="form-control ">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label for="value">
                                    <h6>Descrição</h6>
                                </label>
                                <textarea name="description" id="description" placeholder="Descrição" required class="form-control "></textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <br>
                            <button type="submit" class="subscribe btn btn-primary btn-block shadow-sm"> Finalizar
                                pagamento
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasPix"
             aria-labelledby="offcanvasPixLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasPixLabel">Informações do Pix</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div id="boleto" class="tab-pane fade show active pt-3">
                    <form role="form" method="post" action="{{route('payment.store')}}">
                        @csrf
                        <input type="hidden" name="billingType" value="PIX">
                        <div class="row">
                            <div class="form-group">
                                <label for="value">
                                    <h6>Valor</h6>
                                </label>
                                <input type="number" pattern="\d*" name="value" id="value" placeholder="Valor" required class="form-control ">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label for="value">
                                    <h6>Descrição</h6>
                                </label>
                                <textarea name="description" id="description" placeholder="Descrição" required class="form-control "></textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <br>
                            <button type="submit" class="subscribe btn btn-primary btn-block shadow-sm"> Finalizar
                                pagamento
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Últimas cobranças</h5>
            <p class="card-text">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead>
                        <tr>
                            <th>
                                Valor
                            </th>
                            <th>
                                Descrição
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($payments as $payment)
                            <tr>
                                <td>
                                    R$ {{number_format($payment->value / 10, 2, ',', '.')}}
                                </td>
                                <td>
                                    {{$payment->description}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </p>
        </div>
    </div>
@endsection
