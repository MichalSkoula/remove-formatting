<?php

declare(strict_types=1);

namespace Michalskoula\RemoveFormatting;

class Remover
{
    private RemoverOptions $options;

    public function __construct(RemoverOptions $options = null)
    {
        if ($options instanceof RemoverOptions) {
            $this->options = $options;
        } else {
            $this->options = new RemoverOptions();
        }
    }

    public function remove(string $html): string
    {
        $html = $this->removeElements($html, $this->options->getAllowedElements());
        $html = $this->removeAttributes($html, $this->options->getAllowedAttributes());
        if ($this->options->getRemoveWhitespaces()) {
            $html = $this->removeDoubleWhitespace($html);
        }

        return $html;
    }

    private function removeElements(string $html, array $allowedElements): string
    {
        return strip_tags($html, $allowedElements);
    }

    private function removeAttributes(string $html, array $allowedAttributes): string
    {
        if (stripos($html, '<body') === false) {
            $html = '<body>' . $html . '</body>';
        }

        $dom = new \DOMDocument();
        $dom->encoding = 'UTF-8';
        $dom->loadHTML('<?xml encoding="UTF-8">' . $html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        // Get the body element
        $body = $dom->getElementsByTagName('body')->item(0);

        // Iterate through each element and remove attributes
        foreach ($body->getElementsByTagName('*') as $element) {
            // Attributes to be removed
            $attributesToRemove = [];

            // Get all attributes of the element
            $attributes = $element->attributes;

            foreach ($attributes as $attribute) {
                $name = $attribute->nodeName;

                if (! in_array($name, $allowedAttributes, true)) {
                    $attributesToRemove[] = $name;
                }
            }

            // Remove the attributes
            foreach ($attributesToRemove as $nameToRemove) {
                $element->removeAttribute($nameToRemove);
            }
        }

        // Get the inner content of the body
        $innerHtml = '';
        foreach ($body->childNodes as $node) {
            $innerHtml .= $dom->saveHTML($node);
        }

        // Remove the XML declaration and any DOCTYPE declaration
        $innerHtml = preg_replace('/<\?xml.*?\?>/', '', $innerHtml);
        $innerHtml = preg_replace('/<!DOCTYPE.*?>/', '', $innerHtml);

        return $innerHtml;
    }

    private function removeDoubleWhitespace(string $html): string
    {
        $html = preg_replace('/\s+/', ' ', $html);
        $html = trim($html);

        return $html;
    }
}
