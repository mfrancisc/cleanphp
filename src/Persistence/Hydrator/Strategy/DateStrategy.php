<?php

/**
 * Created by PhpStorm.
 * User: francisc
 * Date: 24/07/15
 * Time: 07:56
 */
namespace CleanPhp\Invoicer\Persistence\Hydrator\Strategy;

use DateTime;
use Zend\Stdlib\Hydrator\Strategy\DefaultStrategy;

class DateStrategy extends DefaultStrategy
{
    public function hydrate($value)
    {
        if (is_string($value)) {
            $value = new DateTime($value);
        }
        return $value;
    }

    public function extract($value)
    {
        if ($value instanceof DateTime) {
            $value = $value->format('Y-m-d');
        }
        return $value;
    }
}
