<?php
/**
 * Created by PhpStorm.
 * User: francisc
 * Date: 23/07/15
 * Time: 23:55
 */

namespace Application\Controller;

use CleanPhp\Invoicer\Domain\Repository\InvoiceRepositoryInterface;
use CleanPhp\Invoicer\Domain\Repository\OrderRepositoryInterface;
use Zend\Mvc\Controller\AbstractActionController;

class InvoicesController extends AbstractActionController
{
    protected $invoiceRepository;
    protected $orderRepository;

    public function __construct(InvoiceRepositoryInterface $invoices, OrderRepositoryInterface $orders
    )
    {
        $this->invoiceRepository = $invoices;
        $this->orderRepository = $orders;
    }

    public
    function indexAction()
    {
        $invoices = $this->invoiceRepository->getAll();
        return [
            'invoices' => $invoices
        ];
    }

    public function generateAction()
    {
        return [
            'orders' => $this->orderRepository->getUninvoicedOrders()
        ];
    }
}