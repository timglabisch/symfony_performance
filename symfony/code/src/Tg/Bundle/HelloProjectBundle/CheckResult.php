<?php

namespace Tg\Bundle\HelloProjectBundle;


class CheckResult
{
    const STATE_SUCCESS = 'STATE_SUCCESS';
    const STATE_FAILED = 'STATE_FAILED';

    protected $state;

    protected $reason;

    protected $service;

    protected function __construct($state, $service, $reason = null)
    {
        $this->state = $state;
        $this->service = $service;
        $this->reason = $reason;
    }

    public static function success($service)
    {
        return new static(static::STATE_SUCCESS, $service);
    }

    public static function fail($service, $reason)
    {
        return new static(static::STATE_FAILED, $service, $reason);
    }

    public function isFailed()
    {
        return $this->state == static::STATE_FAILED;
    }

    public function isSuccess()
    {
        return $this->state == static::STATE_SUCCESS;
    }

    public function getReason()
    {
        return $this->reason;
    }

    public function getService()
    {
        return $this->service;
    }

} 