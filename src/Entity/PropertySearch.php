<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraint as Assert;

class PropertySearch {
    /*
     * @var int|null
     */

    private $maxPrice;
    /*
     * @var int|null
     * @Assert\Range(min=10, max=400)
     */
    private $minSurface;

    /*
     * @return int|null
     */

    public function getMinSurface(): ?int {
        return $this->minSurface;
    }
    
    /*
     * @return int|null
     */

    public function getMaxPrice(): ?int {
        return $this->maxPrice;
    }

    /*
     * @params int|null $minSurface
     * @return PropertySearch
     */

    public function setMinSurface(?int $minSurface): PropertySearch {
        $this->minSurface = $minSurface;
        return $this;
    }
    
    /*
     * @params int|null $maxPrice
     * @return PropertySearch
     */

    public function setMaxPrice(?int $maxPrice): PropertySearch {
        $this->maxPrice = $maxPrice;
        return $this;
    }

}
