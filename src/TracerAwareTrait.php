<?php

declare(strict_types=1);

namespace Psr\Tracing;

/**
 * @see TracerAwareInterface
 */
trait TracerAwareTrait
{
    protected ?TracerInterface $tracer;

    public function setTracer(TracerInterface $tracer): void
    {
        $this->tracer = $tracer;
    }
}
