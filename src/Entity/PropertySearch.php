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
     * @var string|null
     */
    private $city;

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
     * @return string|null
     */

    public function getCity(): ?string {
        return $this->city;
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
    
    /*
     * @params string|null $city
     * @return PropertySearch
     */

    public function setCity(?string $city): PropertySearch {
        $this->city = $city;
        return $this;
    }

}
