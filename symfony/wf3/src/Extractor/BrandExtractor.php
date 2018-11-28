<?php
namespace App\Extractor;

use Extractor\ExtractorInterface;
use App\DTO\Car;

class BrandExtractor implements ExtractorInterface
{

    /**
     * Extract
     *
     * Extract the brand of the given car. Throw runtime exception
     * if parameter is not a Car instance.
     *
     * @param Car $element
     *            The car from where extract the brand
     *            
     * @return string
     * @throws \RuntimeException
     */
    public function extract($element)
    {
        if (! $element instanceof Car) {
            throw new \RuntimeException('Instance of car required');
        }

        return $element->brand;
    }

    /**
     * Extract List
     *
     * Extract a list of brand form a list of car. Throw runtime exception
     * if one of the given elements is not a car.
     *
     * @param array $elements
     *            The list of car from where extract the brands.
     *            
     * @return array
     * @throws \RuntimeException
     */
    public function extractList(array $elements): array
    {
        $brandArray = [];
        foreach ($elements as $element) {
            $brandArray[] = $this->extract($element);
        }

        return $brandArray;
    }
}

