<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

use CleanPhp\Invoicer\Domain\Entity\Customer;
use CleanPhp\Invoicer\Domain\Entity\Invoice;
use CleanPhp\Invoicer\Domain\Entity\Order;
use CleanPhp\Invoicer\Persistence\Zend\DataTable\CustomerTable;
use CleanPhp\Invoicer\Persistence\Zend\DataTable\InvoiceTable;
use CleanPhp\Invoicer\Persistence\Zend\DataTable\OrderTable;
use CleanPhp\Invoicer\Persistence\Zend\TableGateway\TableGatewayFactory;
use Zend\Stdlib\Hydrator\ClassMethods;

return array('service_manager' => array(
    'factories' => array(
        'Zend\Db\Adapter\Adapter' => 'Zend\Db\Adapter\AdapterServiceFactory',
        'CustomerTable' => function ($sm) {
            $factory = new TableGatewayFactory();
            $hydrator = new ClassMethods();
            $gateway = $factory->createGateway(
                $sm->get('Zend\Db\Adapter\Adapter'), $hydrator,
                new Customer(),
                'customers'
            );
            return new CustomerTable(
                $gateway,
                $hydrator
            );
        },
        'InvoiceTable' => function ($sm) {
            $factory = new TableGatewayFactory();
            $hydrator = new ClassMethods();
            return new InvoiceTable($factory->createGateway(
                $sm->get('Zend\Db\Adapter\Adapter'), $hydrator,
                new Invoice(),
                'invoices'
            ),
                $hydrator
            );
        },
        'OrderTable' => function ($sm) {
            $factory = new TableGatewayFactory();
            $hydrator = new ClassMethods();
            return new OrderTable($factory->createGateway(
                $sm->get('Zend\Db\Adapter\Adapter'), $hydrator,
                new Order(),
                'orders'
            ),
                $hydrator
            );
        },

    )
)
);
