<?php

/**
 * Created by PhpStorm.
 * User: francisc
 * Date: 20/07/15
 * Time: 22:53
 */
namespace CleanPhp\Invoicer\Domain\Repository;
interface RepositoryInterface
{
    public function getById($id);

    public function getAll();

    public function persist(Abstract $entity);

    public function begin();

    public function commit();
}
