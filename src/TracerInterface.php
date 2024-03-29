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
     * The span's parent wil be determined by the current active span.
     * To create a span with a specific parent, use the {@see SpanInterface::createChild} method.
     *
     * This will NOT set the newly created span as the "current" span:
     * {@see SpanInterface::activate} should be called.
     */
    public function createSpan(string $spanName): SpanInterface;

    /**
     * Get the id of the current active trace.
     */
    public function getCurrentTraceId(): string;

    /**
     * Get an instance of the root span
     */
    public function getRootSpan(): ?SpanInterface;

   /**
    * Get an instance of the currently active span
    */
    public function getCurrentSpan(): ?SpanInterface;

}
