<?php
/**
 * Created by PhpStorm.
 * User: francisc
 * Date: 30/07/15
 * Time: 21:32
 */

namespace CleanPhp\Invoicer\Persistence\Doctrine\Repository;

use CleanPhp\Invoicer\Domain\Repository\CustomerRepositoryInterface;

class CustomerRepository extends AbstractDoctrineRepository implements CustomerRepositoryInterface
{
    protected $entityClass = 'CleanPhp\Invoicer\Domain\Entity\Customer';
}