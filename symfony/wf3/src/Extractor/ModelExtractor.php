<?php
namespace App\Extractor;

use Extractor\ExtractorInterface;
use App\DTO\Car;

class ModelExtractor implements ExtractorInterface
{

    public function extract($element)
    {
        if (! $element instanceof Car) {
            throw new \RuntimeException('Instance of car required');
        }
        
        return $element->getModel();
    }

    public function extractList(array $elements):array
    {
        $modelArray = [];
        foreach ($elements as $element) {
            $modelArray[] = $this->extract($element);
        }
        
        return $modelArray;
    }
}

