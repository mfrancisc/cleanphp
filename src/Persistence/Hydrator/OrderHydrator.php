<?php

/**
 * Created by PhpStorm.
 * User: francisc
 * Date: 23/07/15
 * Time: 22:15
 */
namespace CleanPhp\Invoicer\Persistence\Hydrator;

use CleanPhp\Invoicer\Domain\Entity\Customer;
use CleanPhp\Invoicer\Domain\Repository\CustomerRepositoryInterface;
use Zend\Stdlib\Hydrator\HydratorInterface;

class OrderHydrator implements HydratorInterface
{
    protected $wrappedHydrator;
    protected $customerRepository;

    public function __construct(
        HydratorInterface $wrappedHydrator, CustomerRepositoryInterface $customerRepository
    )
    {
        $this->wrappedHydrator = $wrappedHydrator;
        $this->customerRepository = $customerRepository;
    }

    public function extract($object)
    {
        $data = $this->wrappedHydrator->extract($object);
        if (array_key_exists('customer', $data) &&
            !empty($data['customer'])
        ) {
            $data['customer_id'] = $data['customer']->getId();
            unset($data['customer']);
        }
        return $data;
    }

    public
    function hydrate(array $data, $order)
    {
        if (isset($data['customer'])
            && isset($data['customer']['id'])
        ) {
            $data['customer'] = $this->customerRepository->getById(
                $data['customer']['id']
            );
        }
        return $this->wrappedHydrator->hydrate($data, $order);
    }

}