<?php
namespace Tutorial\V1\Rest\Cliente;

class ClienteResourceFactory
{
    public function __invoke($services)
    {
        $db = $services->get('DB\Tutorial');
        return new ClienteResource($db);
    }
}
