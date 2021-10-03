<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Category
{
    private int $id;

    private string $name;

    private Collection $products;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->name;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function addProduct(Product $product)
    {
        if (!$this->products->contains($product)) {
            $product->addCategory($this);
            $this->products[] = $product;
        }
    }

    public function removeProduct(Product $product): bool
    {
        return $this->products->removeElement($product);
    }

    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
}
