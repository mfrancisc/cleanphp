<?php
/**
 * Created by PhpStorm.
 * User: francisc
 * Date: 30/07/15
 * Time: 21:44
 */

namespace CleanPhp\Invoicer\Persistence\Doctrine\Repository;

use CleanPhp\Invoicer\Domain\Repository\InvoiceRepositoryInterface;

class InvoiceRepository extends AbstractDoctrineRepository implements InvoiceRepositoryInterface
{
    protected $entityClass = 'CleanPhp\Invoicer\Domain\Entity\Invoice';
}
