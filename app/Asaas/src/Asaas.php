<?php
namespace App\Asaas;


// API's
use App\Asaas\Adapter\AdapterInterface;
use App\Asaas\Api\Customer;
use App\Asaas\Api\Payment;


/**
 * Asass API Wrapper
 *
 * @author Agência Softr <agencia.softr@gmail.com>
 */
class Asaas
{
    /**
     * Adapter Interface
     *
     * @var  AdapterInterface
     */
    protected $adapter;

    /**
     * Ambiente da API
     *
     * @var  string
     */
    protected $ambiente;

    /**
     * Constructor
     *
     * @param  AdapterInterface  $adapter   Adapter Instance
     * @param  string            $ambiente  (optional) Ambiente da API
     */
    public function __construct(AdapterInterface $adapter, $ambiente = 'producao')
    {
        $this->adapter = $adapter;

        $this->ambiente = $ambiente;
    }

    /**
     * Get customer endpoint
     *
     * @return  Customer
     */
    public function customer()
    {
        return new Customer($this->adapter, $this->ambiente);
    }

    /**
     * Get subscription endpoint
     *
     * @return  Subscription
     */
    public function subscription()
    {
        return new Subscription($this->adapter, $this->ambiente);
    }

    /**
     * Get payment endpoint
     *
     * @return  Payment
     */
    public function payment()
    {
        return new Payment($this->adapter, $this->ambiente);
    }

    /**
     * Get Notification API Endpoint
     *
     * @return  Notification
     */
    public function notification()
    {
        return new Notification($this->adapter, $this->ambiente);
    }

    /**
     * Get city endpoint
     *
     * @return  City
     */
    public function city()
    {
        return new City($this->adapter, $this->ambiente);
    }
}
