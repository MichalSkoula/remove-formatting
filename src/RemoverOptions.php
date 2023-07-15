<?php

declare(strict_types=1);

namespace Michalskoula\RemoveFormatting;

class RemoverOptions
{
    private array $allowedElements = ['a', 'img', 'p', 'strong'];

    private array $allowedAttributes = ['href', 'src'];

    private bool $removeWhitespaces = false;

    public function setAllowedAttributes(array $attributes): void
    {
        $this->allowedAttributes = $attributes;
    }

    public function addAllowedAttribute(string $attribute): void
    {
        $this->allowedAttributes[] = $attribute;
    }

    public function getAllowedAttributes(): array
    {
        return $this->allowedAttributes;
    }

    public function setAllowedElements(array $elements): void
    {
        $this->allowedElements = $elements;
    }

    public function addAllowedElement(string $element): void
    {
        $this->allowedElements[] = $element;
    }

    public function getAllowedElements(): array
    {
        return array_map(
            static function ($value): string {
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

    public function setRemoveWhitespaces(bool $remove): void
    {
        $this->removeWhitespaces = $remove;
    }

    public function getRemoveWhitespaces(): bool
    {
        return $this->removeWhitespaces;
    }
}
