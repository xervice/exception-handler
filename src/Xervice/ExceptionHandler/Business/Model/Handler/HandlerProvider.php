<?php
declare(strict_types=1);

namespace Xervice\ExceptionHandler\Business\Model\Handler;


class HandlerProvider implements HandlerProviderInterface
{
    /**
     * @var HandlerCollection
     */
    private $collection;

    /**
     * @var bool
     */
    private $isDebug;

    /**
     * HandlerProvider constructor.
     *
     * @param \Xervice\ExceptionHandler\Business\Model\Handler\HandlerCollection $collection
     * @param bool $isDebug
     */
    public function __construct(HandlerCollection $collection, bool $isDebug)
    {
        $this->collection = $collection;
        $this->isDebug = $isDebug;
    }

    /**
     * @param \Exception $exception
     */
    public function handleException(\Throwable $exception): void
    {
        foreach ($this->collection as $handler) {
            $handler->handleException($exception, $this->isDebug);
        }
    }
}
