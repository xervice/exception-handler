<?php
declare(strict_types=1);


namespace Xervice\ExceptionHandler;


use Xervice\Core\Business\Model\Config\AbstractConfig;

class ExceptionHandlerConfig extends AbstractConfig
{
    public const IS_DEBUG = 'is.debug';

    /**
     * @return bool
     */
    public function isDebug(): bool
    {
        return $this->get(self::IS_DEBUG, false);
    }
}