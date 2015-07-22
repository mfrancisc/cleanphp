<?php
/**
 * Created by PhpStorm.
 * User: francisc
 * Date: 21/07/15
 * Time: 07:38
 */

namespace CleanPhp\Invoicer\Persistence\Zend\DataTable;


use CleanPhp\Invoicer\Domain\Repository\OrderRepositoryInterface;

class OrderTable extends AbstractDataTable implements OrderRepositoryInterface
{
    public function getUninvoicedOrders()
    {
        return [];
    }
}