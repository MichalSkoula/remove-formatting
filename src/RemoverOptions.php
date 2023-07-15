<?php

declare(strict_types=1);

namespace Michalskoula\RemoveFormatting;

class RemoverOptions
{
    private array $allowedElements = ['a', 'img', 'p', 'strong'];

    private array $allowedAttributes = ['href', 'src'];

    public function setAllowedAttributes(array $attributes)
    {
        $this->allowedAttributes = $attributes;
    }

    public function addAllowedAttribute(string $attribute)
    {
        $this->allowedAttributes[] = $attribute;
    }

    public function getAllowedAttributes(): array
    {
        return $this->allowedAttributes;
    }

    public function setAllowedElements(array $elements)
    {
        $this->allowedElements = $elements;
    }

    public function addAllowedElement(string $element)
    {
        $this->allowedElements[] = $element;
    }

    public function getAllowedElements(): array
    {
        return array_map(
            function ($value) {
                $value = trim($value);

                if (substr($value, 0, 1) !== '<') {
                    $value = '<' . $value;
                }

                if (substr($value, -1) !== '>') {
                    $value .= '>';
                }

                return $value;
            },
            $this->allowedElements
        );
    }
}
