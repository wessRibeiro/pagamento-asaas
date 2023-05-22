<?php
namespace App\Asaas\Api;

use App\Asaas\Adapter\AdapterInterface;

/**
 * Abstract API
 *
 * @author Agência Softr <agencia.softr@gmail.com>
 */
abstract class AbstractApi
{
    protected AdapterInterface $adapter;

    protected string $endpoint;

    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
        $this->endpoint = env('ASAAS_HOMOLOG_HOST');
    }

}
