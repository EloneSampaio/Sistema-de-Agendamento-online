<?php
namespace App;

use Doctrine\ORM\EntityManager;

abstract class AbstractModel
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $entityManager = null;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
       

    }
}