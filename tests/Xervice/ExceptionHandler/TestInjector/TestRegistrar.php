<?php
declare(strict_types=1);

namespace XerviceTest\ExceptionHandler\TestInjector;


use Xervice\ExceptionHandler\Business\Model\Register\RegisterInterface;

class TestRegistrar implements RegisterInterface
{
    /**
     * @param bool $isDebug
     */
    public function register(bool $isDebug): void
    {
        echo 'REGISTER';
    }
}