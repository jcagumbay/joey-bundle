# Joey - Symfony 6 Bundle

Simple Symfony 6 bundle. Joey does nothing but to flirt with you. You can override his default but never-missed pick-up line.


Install the package with:

```console
composer require jcagumbay/joey-bundle
```

Don't forget to add the repository to your `composer.json` 

```console
"repositories": [
    ...
    {
        "type": "vcs",
        "url": "https://github.com/jcagumbay/joey-bundle"
    }
]
```


Make sure the `Jcagumbay\JoeyBundle\JoeyBundle` is enabled in your `config/bundles.php` file.

## Usage


```php
// src/Controller/MyController.php

use Jcagumbay\JoeyBundle\Entity\Joey;
// ...

class MyController
{
    public function __construct(
        #[Autowire(service: Joey::class)]
        private Joey $joey
    ) {
    }

    #[Route('/')]
    public function number(): Response
    {
        return $this->render('pickup_line.html.twig', ['line' => $this->joey->flirt()]);
    }
}
```

This service can also be accessed directly using the id `Joey::class`.

## Configuration

Normally, you don't have to do anything. Joey's go-to "Hey, How you doin?" never fails. But if you want to go backpacking in western Europe, you can do it by creating a new `config/packages/joey.yaml` file on your application:

```yaml
joey:
    pickup_line: 'You know, once I was backpacking in Western Europe...'
```

### Testing

Yeah, no automated test is configured on this one. This is kinda YOLO. :P

### Contributions

This bundle was written as a practice on how to create Symfony6 bundle. If you something is not right, please feel free to add comment.

Thank you!