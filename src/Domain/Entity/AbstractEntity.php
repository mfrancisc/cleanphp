<?php

/**
 * Created by PhpStorm.
 * User: francisc
 * Date: 20/07/15
 * Time: 22:24
 */

namespace CleanPhp\Invoicer\Domain\Entity;
abstract class AbstractEntity
{
    protected $id;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
}
