<?php

/**
 * Created by PhpStorm.
 * User: francisc
 * Date: 22/07/15
 * Time: 07:30
 */
namespace Application\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Vnn\Keyper\Keyper;

class ValidationErrors extends AbstractHelper
{
    public function __invoke($element)
    {
        if ($errors = $this->getErrors($element)) {
            return '<div class="alert alert-danger">' .
            implode('. ', $errors) .
            '</div>';
        }
        return '';
    }

    protected function getErrors($element)
    {
        if (!isset($this->getView()->errors)) {
            return false;
        }
        $errors = Keyper::create($this->getView()->errors);
        return $errors->get($element) ?: false;
    }
}