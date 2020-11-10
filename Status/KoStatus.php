<?php

namespace StatusBundle\Status;

use StatusBundle\Model\AbstractStatus;

class KoStatus extends AbstractStatus
{
    /**
     * TestKoStatus constructor.
     */
    public function __construct()
    {
        parent::__construct('test_ko');
    }

    /**
     * @inheritDoc
     * @return bool
     */
    public function getStatus(): bool
    {
        return false;
    }
}
