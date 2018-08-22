<?php


namespace Xervice\ExceptionHandler\Business\Model\Register;


interface RegisterInterface
{
    /**
     * @param bool $isDebug
     */
    public function register(bool $isDebug): void;
}