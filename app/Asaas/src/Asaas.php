<?php
namespace App\Asaas;


// API's
use App\Asaas\Adapter\GuzzleHttpAdapter;
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
    protected AdapterInterface $adapter;

    public function __construct()
    {
        $this->adapter = new GuzzleHttpAdapter();
    }

    /**
     * Get customer endpoint
     *
     * @return  Customer
     */
    public function customer()
    {
        return new Customer($this->adapter);
    }

    /**
     * Get subscription endpoint
     *
     * @return  Subscription
     */
    public function subscription()
    {
        return new Subscription($this->adapter);
    }

    /**
     * Get payment endpoint
     *
     * @return  Payment
     */
    public function payment()
    {
        return new Payment($this->adapter);
    }

    /**
     * Get Notification API Endpoint
     *
     * @return  Notification
     */
    public function notification()
    {
        return new Notification($this->adapter);
    }

    /**
     * Get city endpoint
     *
     * @return  City
     */
    public function city()
    {
        return new City($this->adapter);
    }
}
