<?php
namespace App\Asaas\Api;


/**
 * Payment API Endpoint
 *
 * @author Agência Softr <agencia.softr@gmail.com>
 */
class Payment extends \App\Asaas\Api\AbstractApi
{
    /**
     * Get all payments
     *
     * @param   array  $filters  (optional) Filters Array
     * @return  array  Array
     */
    public function getAll(array $filters = [])
    {
        $payments = $this->adapter->get(sprintf('%s/payments?%s', $this->endpoint, http_build_query($filters)));
        $payments = json_decode($payments);
        return $payments->data;
    }

    /**
     * Get Payment By Id
     *
     * @param   int  $id  Payment Id
     * @return  array
     */
    public function getById($id)
    {
        $payment = $this->adapter->get(sprintf('%s/payments/%s', $this->endpoint, $id));
        $payment = json_decode($payment);
        return $payment;
    }

    /**
     * Get Payments By Customer Id
     *
     * @param   int    $customerId  Customer Id
     * @param   array  $filters     (optional) Filters Array
     * @return  array
     */
    public function getByCustomer($customerId, array $filters = [])
    {
        $payments = $this->adapter->get(sprintf('%s/customers/%s/payments?%s', $this->endpoint, $customerId, http_build_query($filters)));
        $payments = json_decode($payments);

        return array_map(function($payment)
        {
            return $payment;
        }, $payments->data);
    }

    /**
     * Get Payments By Subscription Id
     *
     * @param   int    $subscriptionId  Subscription Id
     * @param   array  $filters         (optional) Filters Array
     * @return  array
     */
    public function getBySubscription($subscriptionId)
    {
        $payments = $this->adapter->get(sprintf('%s/subscriptions/%s/payments?%s', $this->endpoint, $subscriptionId, http_build_query($filters)));
        $payments = json_decode($payments);
        return $payments->data;
    }

    /**
     * Create New Payment
     *
     * @param   array  $data  Payment Data
     * @return  array
     */
    public function create(array $data)
    {
        $payment = $this->adapter->post(sprintf('%s/payments', $this->endpoint), $data);
        $payment = json_decode($payment);

        return $payment;
    }

    /**
     * Update Payment By Id
     *
     * @param   string  $id    Payment Id
     * @param   array   $data  Payment Data
     * @return  array
     */
    public function update($id, array $data)
    {
        $payment = $this->adapter->post(sprintf('%s/payments/%s', $this->endpoint, $id), $data);
        $payment = json_decode($payment);

        return $payment;
    }

    /**
     * Delete Payment By Id
     *
     * @param  string|int  $id  Payment Id
     */
    public function delete($id)
    {
        $this->adapter->delete(sprintf('%s/payments/%s', $this->endpoint, $id));
    }
}
