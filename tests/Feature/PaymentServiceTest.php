<?php

namespace Tests\Feature;

use App\Models\Customer;
use Mockery;
use App\Services\PaymentService;
use App\Asaas\Asaas;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PaymentServiceTest extends TestCase
{
    protected PaymentService $paymentService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->asaasMock = Mockery::mock(Asaas::class);
        $this->customerMock = Mockery::mock(Customer::class);
        // Create an instance of PaymentService with mocked dependencies
        $this->paymentService = new PaymentService($this->asaasMock);

    }

    public function testIndex()
    {
        // Act
        $result = $this->paymentService->index();

        // Assert
        $this->assertIsArray($result);
    }

    public function testShowBoleto()
    {
        // Arrange
        $paymentId = '123';
        $expectedBoleto = [
            "value" => 223,
            "billingType" => "BOLETO"
        ];
        $expectedPayment = [
            "value" => 223,
            "billingType" => "BOLETO"
        ];

        // Create a mock instance of the Asaas class
        $asaasMock = Mockery::mock(Asaas::class);
        $asaasMock->shouldReceive('payment->getBoleto')->with($paymentId)->andReturn($expectedBoleto);
        $asaasMock->shouldReceive('payment->getById')->with($paymentId)->andReturn($expectedPayment);

        // Create an instance of the PaymentService and set the mock
        $paymentService = new PaymentService();
        $paymentService->asaas = $asaasMock;

        // Act
        $result = $paymentService->showBoleto($paymentId);

        // Assert
        $this->assertIsArray($result);
        $this->assertEquals($expectedBoleto, $result['boleto']);
        $this->assertEquals($expectedPayment, $result['payment']);
    }

    public function testShowPix()
    {
        // Arrange
        $paymentId = '123';
        $expectedPayment = [
            "value" => 223,
            "billingType" => "PIX"
        ];

        // Create a mock instance of the Asaas class
        $asaasMock = Mockery::mock(Asaas::class);
        $asaasMock->shouldReceive('payment->getPix')->with($paymentId)->andReturn($expectedPayment);

        // Create an instance of the PaymentService and set the mock
        $paymentService = new PaymentService();
        $paymentService->asaas = $asaasMock;

        // Act
        $result = $paymentService->showPix($paymentId);

        // Assert
        $this->assertIsArray($result);
        $this->assertEquals($expectedPayment, $result);
    }
}
