<?php
/**
 * Created by PhpStorm.
 * User: francisc
 * Date: 21/07/15
 * Time: 21:19
 */

namespace Application\Controller;


use CleanPhp\Invoicer\Domain\Repository\CustomerRepositoryInterface;
use Zend\Mvc\Controller\AbstractActionController;

class CustomersController extends AbstractActionController
{
    public $customerRepository;

    public function __construct(CustomerRepositoryInterface $customers
    )
    {
        $this->customerRepository = $customers;
    }

    public function indexAction()
    {
        return [
            'customers' => $this->customerRepository->getAll()
        ];
    }
}
