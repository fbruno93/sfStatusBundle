<?php

namespace StatusBundle\Model;

abstract class AbstractStatus
{
    /**
     * @var string name of service
     */
    protected $name;

    /**
     * Get status of service
     * 
     * @return bool true if service is ok, else false
     */
    abstract public function getStatus(): bool;

    /**
     * AbstractStatus constructor
     * 
     * @param string $name name of service
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * Get the name of service
     * 
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
