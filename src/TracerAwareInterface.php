<?php

declare(strict_types=1);

namespace Psr\Tracing;

/**
 * Describes a tracer-aware object.
 */
interface TracerAwareInterface
{
    /**
     * Sets a tracer instance on the object.
     */
    public function setTracer(TracerInterface $tracer): void;
}
