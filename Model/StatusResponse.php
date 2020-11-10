<?php

namespace StatusBundle\Model;

use JsonSerializable;

class StatusResponse implements JsonSerializable
{
    public const STATUS_OK = 'ok';
    public const STATUS_KO = 'ko';

    /** @var string */
    private $status;

    /** @var string[] */
    private $errors;

    public function __construct($servicesDown)
    {
        $this->status = empty($servicesDown) ? self::STATUS_OK : self::STATUS_KO;
        $this->errors = $servicesDown;
    }

    /** @return string */
    public function getStatus(): string
    {
        return $this->status;
    }

    /** @return string[] */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /** @return array|mixed */
    public function jsonSerialize()
    {
        return [
            'status' => $this->getStatus(),
            'errors' => $this->getErrors()
        ];
    }
}
