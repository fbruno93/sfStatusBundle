<?php

namespace StatusBundle\Status;

use Exception;

use Doctrine\ORM\EntityManagerInterface;

use StatusBundle\Model\AbstractStatus;


class DoctrineStatus extends AbstractStatus
{
    /** @var EntityManagerInterface */
    private $em;

    /**
     * DoctrineStatus constructor.
     * @param EntityManagerInterface $entityManagerInterface
     */
    public function __construct(EntityManagerInterface $entityManagerInterface)
    {
        parent::__construct('doctrine');
        $this->em = $entityManagerInterface;
    }

    /**
     * Get status of service
     * @return bool true if ok else false
     */
    public function getStatus(): bool
    {
        try {
            $this->em->getConnection()->connect();
            return $this->em->getConnection()->isConnected();
        } catch (Exception $e) {
            return false;
        }
    }
}
