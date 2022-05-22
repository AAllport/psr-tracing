<?php

namespace Psr\Tracing;

interface SpanInterface
{
    public function setAttribute(string $key, $value): SpanInterface;

    public function setAttributes(iterable $attributes): SpanInterface;

    public function activate(): SpanInterface;
}