<?php

namespace Psr\Tracing;

interface TracerAwareInterface
{
    public function setTracer(TracerInterface $tracer): void;

    public function getTracer(): TracerInterface;
}