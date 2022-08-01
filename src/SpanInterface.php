<?php

declare(strict_types=1);

namespace Psr\Tracing;

/**
 * A span represents a single operation within a trace.
 * NOTE: This object is MUTABLE.
 */
interface SpanInterface
{
    /**
     * Sets a single attribute on the span.
     * NOTE: not sure about "mixed" type hint on $value parameter.
     * Should it be scalar|Stringable ? An array is acceptable here?
     *
     * @return $this
     */
    public function setAttribute(string $key, mixed $value): SpanInterface;

    /**
     * Sets multiple attributes on this span.
     *
     * @return $this
     */
    public function setAttributes(iterable $attributes): SpanInterface;

    /**
     * Sets the current span as the "current" span.
     * NOTE: Is this ok with fibers?
     *
     * @return $this
     */
    public function activate(): SpanInterface;

    /**
     * Marks this span as ended (sets the end timestamp) and pops out the
     * span re-setting the parent as the active one.
     */
    public function finish(): void;

    /**
     * Returns the traceparent identifier (for distributed tracing).
     * If the implementor does not want to support distributed tracing, this method
     * MUST always return null.
     */
    public function toTraceparent(): ?string;
}
