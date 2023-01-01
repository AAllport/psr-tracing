PSR Tracing
=======

This repository holds all interfaces/classes/traits related to
[PSR-22](https://github.com/php-fig/fig-standards/blob/master/proposed/tracing.md).

Note that this is not a logger of its own.
It is merely an interface that describes a tracer.
See the specification for more details.

Installation
------------

```bash
composer require psr/tracing
```

Usage
-----

```php
function imgResize($size=100) {
    $span = $this->tracer->startSpan('image.resize')
        ->setAttribute('size',$size)
        ->activate();    

    try{
    
      //Resize the image
      return $resizedImage;
    
    } catch (Exception $e) {
        // Ideally, you would attach the exception to the span here
        $span->setStatus(SpanInterface::STATUS_ERROR)
             ->addException($e);
    } finally {
        $span->finish();
    }    
}

```