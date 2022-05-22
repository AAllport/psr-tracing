<?php

namespace Psr\Tracing;


interface SpanBuilderInterface
{

/** @see SpanInterface::setAttribute() */
    public function setAttribute(string $key, $value): SpanBuilderInterface;

    /** @see SpanInterface::setAttributes() */
    public function setAttributes(string $key, $value): SpanBuilderInterface;

    /** @see SpanInterface::() */
    public function setStartTimestamp(int $timestamp): SpanBuilderInterface;

    public function startSpan(): SpanInterface;
}