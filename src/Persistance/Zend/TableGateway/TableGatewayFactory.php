<?php

/**
 * Created by PhpStorm.
 * User: francisc
 * Date: 21/07/15
 * Time: 07:41
 */
namespace CleanPhp\Invoicer\Persistence\Zend\TableGateway;

use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Stdlib\Hydrator\HydratorInterface;

class TableGatewayFactory
{
    public function createGateway(
        Adapter $dbAdapter,
        HydratorInterface $hydrator,
        $object,
        $table
    )
    {
        $resultSet = new HydratingResultSet($hydrator, $object);
        return new TableGateway($table, $dbAdapter, null, $resultSet);
    }
}