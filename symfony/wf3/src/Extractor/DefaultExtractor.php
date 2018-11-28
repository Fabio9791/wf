<?php
namespace App\Extractor;

use App\Extractor\ExtractorInterface;
use Symfony\Component\PropertyAccess\PropertyAccessor;

class DefaultExtractor implements ExtractorInterface
{

    private $instanceType;

    private $target;

    private $accessor;

    public function __construct(string $instanceType, string $target, PropertyAccessor $accessor)
    {
        $this->instanceType = $instanceType;
        $this->target = $target;
        $this->accessor = $accessor;
    }

    /**
     * Extract
     *
     * Extract the target of the given value. Throw runtime exception
     * if parameter is not of the right instance.
     *
     * @param mixed $element
     *            The value from where extract the brand
     *            
     * @return string
     * @throws \RuntimeException
     */
    public function extract($element)
    {
        if (! $element instanceof $this->instanceType) {
            throw new \RuntimeException('Instance of ' . $this->instanceType . ' required');
        }
        if (! $this->accessor->isReadable($element, $this->target)) {
            throw new \LogicException('Property does not exist');
        }

        return $this->accessor->getValue($element, $this->target);
    }

    /**
     * Extract List
     *
     * Extract a list of target form a list of values. Throw runtime exception
     * if one of the given elements is not a value of the right instance.
     *
     * @param array $elements
     *            The list of values from where extract the target.
     *            
     * @return array
     * @throws \RuntimeException
     */
    public function extractList(array $elements): array
    {
        $valueArray = [];
        foreach ($elements as $element) {
            $valueArray[] = $this->extract($element);
        }

        return $valueArray;
    }
}

