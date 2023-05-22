<?php
namespace App\Asaas\Api;

/**
 * Customer API Endpoint
 *
 * @author Agência Softr <agencia.softr@gmail.com>
 */
class Customer extends \App\Asaas\Api\AbstractApi
{
    /**
     * Get all customers
     *
     * @param   array  $filters  (optional) Filters Array
     * @return  array  Customers Array
     */
    public function getAll(array $filters = [])
    {
        $customers = $this->adapter->get(sprintf('%s/customers?%s', $this->endpoint, http_build_query($filters)));
        $customers = json_decode($customers);
        return $customers->data;
    }

    /**
     * Get Customer By Id
     *
     * @param   int  $id  Customer Id
     * @return  CustomerEntity
     */
    public function getById($id)
    {
        $customer = $this->adapter->get(sprintf('%s/customers/%s', $this->endpoint, $id));
        $customer = json_decode($customer);
        return $customer;
    }

    /**
     * Get Customer By Email
     *
     * @param   string  $email  Customer Id
     * @return  CustomerEntity
     */
    public function getByEmail($email)
    {
        foreach($this->getAll(['name' => $email]) as $customer)
        {
            if($customer->email == $email)
            {
                return $customer;
            }
        }
        return '';
    }

    /**
     * Create new customer
     *
     * @param   array  $data  Customer Data
     * @return  CustomerEntity
     */
    public function create(array $data)
    {
        $customer = $this->adapter->post(sprintf('%s/customers', $this->endpoint), $data);
        $customer = json_decode($customer);
        return $customer;
    }

    /**
     * Update Customer By Id
     *
     * @param   string  $id    Customer Id
     * @param   array   $data  Customer Data
     * @return  CustomerEntity
     */
    public function update($id, array $data)
    {
        $customer = $this->adapter->post(sprintf('%s/customers/%s', $this->endpoint, $id), $data);
        $customer = json_decode($customer);
        return $customer;
    }

    /**
     * Delete Customer By Id
     *
     * @param  string|int  $id  Customer Id
     */
    public function delete($id)
    {
        $this->adapter->delete(sprintf('%s/customers/%s', $this->endpoint, $id));
    }
}
