<?php

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

    public function getTracer(): TracerInterface
    {
        return $this->tracer;
    }
}