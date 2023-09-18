<?php

declare(strict_types=1);

namespace Jcagumbay\JoeyBundle\Entity;

final class Joey
{

    public function __construct(private string $pickupLine) 
    {
    }

    public function flirt(): string
    {
        return $this->pickupLine;
    }
}