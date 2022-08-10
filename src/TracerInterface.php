<?php

declare(strict_types=1);

namespace Psr\Tracing;

/**
 * A Tracer object should provide methods to create spans and handle context and
 * traces. A trace is a collection of spans.
 */
interface TracerInterface
{
    /**
     * Creates a new Span.
     *
     * This will NOT set the newly created span as the "current" span:
     * {@see SpanInterface::activate} should be called.
     */
    public function createSpan(string $spanName): SpanInterface;

    /**
     * Get the id of the current active trace.
     */
    public function getCurrentTraceId(): string;
}
