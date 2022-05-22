<?php

namespace Psr\Tracing;

interface TracerInterface
{
    public function spanBuilder(string $spanName): SpanBuilderInterface;
}