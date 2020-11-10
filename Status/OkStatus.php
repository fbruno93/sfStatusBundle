<?php

namespace StatusBundle\Status;

use StatusBundle\Model\AbstractStatus;

class OkStatus extends AbstractStatus
{
    /**
     * TestOkStatus constructor.
     */
    public function __construct()
    {
        parent::__construct('test_ok');
    }

    /**
     * @inheritDoc
     * @return bool
     */
    public function getStatus(): bool
    {
        return true;
    }
}
