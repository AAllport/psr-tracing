<?php

declare(strict_types=1);

namespace Psr\Tracing;

use Stringable;

/**
 * A span represents a single operation within a trace.
 * NOTE: This object is MUTABLE.
 */
interface SpanInterface
{
    /**
     * Sets a single attribute on the span.
     * NOTE: value MUST be a scalar (or stringable) value, nesting is supported via key "dot notation"
     *
     * @return $this
     */
    public function setAttribute(string $key, string|int|float|bool|Stringable $value): SpanInterface;

    /**
     * Sets multiple attributes on this span.
     *
     * @param iterable<string, string|int|float|bool|Stringable> $attributes
     *
     * @return $this
     */
    public function setAttributes(iterable $attributes): SpanInterface;

    /**
     * Sets the current span as the "current" span.
     * This MUST start the span if not already started.
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
