<?php

namespace Sfynx\SpecificationBundle\Specification\Compare;

/**
 * This file is part of the <Trigger> project.
 * true if stripos($a, $b) === 0
 *
 * @category   Trigger
 * @package    Specification
 * @subpackage Compare
 * @author     Etienne de Longeaux <etienne.delongeaux@gmail.com>
 */
class StartsWithInsensitiveSpec extends AbstractSpecification
{
    private $specification1;
    private $specification2;

    public function __construct($specification1, $specification2)
    {
        $this->specification1 = $specification1;
        $this->specification2 = $specification2;
    }

    public function isSatisfiedBy(\stdClass $object = null)
    {
        list($a, $b) = $this->setValues($this->specification1, $this->specification2, $object);

        return strpos($a, $b) === 0;
    }

    public function getLogicalExpression()
    {
        return sprintf('(%s STARTS_WITH_INSENSITIVE %s)', $this->specification1->getLogicalExpression(), $this->specification2->getLogicalExpression());
    }
}
