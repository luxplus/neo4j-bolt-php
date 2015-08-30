<?php

namespace GraphAware\Bolt\PackStream\Structure;

use Doctrine\Common\Collections\ArrayCollection;
use GraphAware\Bolt\PackStream\Structure\AbstractElement;

class MessageStructure
{
    protected $signature;

    protected $size;

    /**
     * @var \GraphAware\Bolt\PackStream\Structure\AbstractElement[]
     */
    protected $elements;

    public function __construct($signature, $size)
    {
        $this->signature = $signature;
        $this->size = $size;
        $this->elements = new ArrayCollection();
    }

    public function addElement(AbstractElement $element)
    {
        $this->elements->add($element);
    }

    public function getElements()
    {
        return $this->elements;
    }

    public function isSuccess()
    {
        return 'SUCCESS' === $this->signature;
    }

    public function isFailure()
    {
        return 'FAILURE' === $this->signature;
    }

    public function isIgnored()
    {
        return 'IGNORED' === $this->signature;
    }

    public function isRecord()
    {
        return 'RECORD' === $this->signature;
    }
}