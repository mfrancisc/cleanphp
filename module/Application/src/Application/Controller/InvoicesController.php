<?php
/**
 * Created by PhpStorm.
 * User: francisc
 * Date: 23/07/15
 * Time: 23:55
 */

namespace Application\Controller;

use CleanPhp\Invoicer\Domain\Repository\InvoiceRepositoryInterface;
use Zend\Mvc\Controller\AbstractActionController;

class InvoicesController extends AbstractActionController
{
    protected $invoiceRepository;

    public function __construct(InvoiceRepositoryInterface $invoice)
    {
        $this->invoiceRepository = $invoice;
    }

    public function indexAction()
    {
        $invoices = $this->invoiceRepository->getAll();
        return [
            'invoices' => $invoices
        ];
    }
}