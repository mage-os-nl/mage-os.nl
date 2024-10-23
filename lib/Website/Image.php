<?php declare(strict_types=1);

namespace MageOsNl\Website;

use MageOsNl\Website\Image\Source;
use RuntimeException;

class Image
{
    private string $cssClass = '';

    public function __construct(
        private string $sourceImage,
        private string $alt = ''
    ) {
    }

    public function __toString(): string
    {
        $html = '<picture class="'.$this->cssClass.'">';
        foreach ($this->getSources() as $source) {
            $html .= '<source srcset="'.$source->getUrl().'" type="'.$source->getMimetype().'">';
        }

        $source = new Source($this->sourceImage);
        $html .= '<img src="'.$source->getUrl().'" alt="'.$this->alt.'" class="'.$this->cssClass.'"/>';

        $html .= '</picture>';

        return $html;
    }

    /**
     * @return Source[]
     */
    private function getSources(): array
    {
        $sources = [];
        $sources[] = new Source($this->sourceImage);

        try {
            $sources[] = $this->getImageSource('webp');
        } catch (RuntimeException $e) {
        }

        try {
            $sources[] = $this->getImageSource('avif');
        } catch (RuntimeException $e) {
        }

        usort($sources, function (Source $source1, Source $source2) {
            return ($source1->getSize() > $source2->getSize()) ? 1 : -1;
        });

        return $sources;
    }

    private function getImageSource(string $suffix): Source
    {
        $imageFile = $this->getBaseName().'.'.$suffix;
        if (file_exists($imageFile)) {
            return new Source($imageFile);
        }

        throw new RuntimeException('No such image');
    }

    private function getBaseName(): string
    {
        return preg_replace('/\.(jpg|jpeg|png)/', '', $this->sourceImage);
    }

    public function setCssClass(string $cssClass): Image
    {
        $this->cssClass = $cssClass;
        return $this;
    }
}
