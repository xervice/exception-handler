<?php


namespace Xervice\ExceptionHandler\Business\Register;


interface RegisterInterface
{
    /**
     * @param bool $isDebug
     */
    public function register(bool $isDebug): void;
}