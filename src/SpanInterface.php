<?php

declare(strict_types=1);

namespace Psr\Tracing;

use Stringable;
use Throwable;

/**
 * A span represents a single operation within a trace.
 * NOTE: This object is MUTABLE.
 */
interface SpanInterface
{
    public const STATUS_UNSET = 0;
    public const STATUS_ERROR = 100;
    public const STATUS_OK = 200;

    /**
     * Sets a single attribute on the span.
     * NOTE: value MUST be a scalar (or stringable) value, nesting is supported via key "dot notation"
     *
     * @return $this
     */
    public function setAttribute(string $key, null|string|int|float|bool|Stringable $value): SpanInterface;

    /**
     * Retrieves a single attribute from the span
     * nesting is supported via key "dot notation"
     *
     * @param string $key
     *
     * @return null|string|int|float|bool|Stringable
     */
    public function getAttribute(string $key): null|string|int|float|bool|Stringable;

    /**
     * Sets multiple attributes on this span.
     *
     * @param iterable<string, string|int|float|bool|Stringable> $attributes
     *
     * @return $this
     */
    public function setAttributes(iterable $attributes): SpanInterface;

    /**
     * Gets all attributes on this span.
     *
     * @return iterable<string, string|int|float|bool|Stringable>
     */
    public function getAttributes(): iterable;

    /**
     * Starts the current span.
     *
     * @return $this
     */
    public function start(): SpanInterface;

    /**
     * Sets the current span as the "current" span.
     * This MUST start the span if not already started.
     *
     * @return $this
     */
    public function activate(): SpanInterface;

    /**
     * Set the status of this span to one of self::STATUS_*
     * Description is optional, and MAY be used to describe an error status.
     *
     * @return $this
     */
    public function setStatus(int $status, ?string $description): SpanInterface;

    /**
     * Record an exception against this span.
     * This MUST NOT modify the span's outcome.
     *
     * @param Throwable $t
     * @return $this
     */
    public function addException(Throwable $t): SpanInterface;

    /**
     * Marks this span as ended (sets the end timestamp) and pops out the
     * span re-setting the parent as the active one.
     */
    public function finish(): void;

    /**
     * Create a new child span.
     * This is similar to {@see TracerInterface::createSpan}, but MUST set the parent to the current span.
     *
     * @param string $spanName
     * @return SpanInterface
     */
    public function createChild(string $spanName): SpanInterface;

    /**
     * Returns distributed tracing headers, to allow trace correlation across service boundaries.
     */
    public function toTraceContextHeaders(): array;

    /**
     * Returns the parent span, or NULL if the span is the root span.
     * @return ?SpanInterface
     */
    public function getParent(): ?SpanInterface;

    /**
     * Returns the child spans
     * @return array<SpanInterface>
     */
    public function getChildren(): array;
}
