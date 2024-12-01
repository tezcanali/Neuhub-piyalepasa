<?php

namespace RalphJSmit\Laravel\SEO\Tags;

use RalphJSmit\Laravel\SEO\Support\SEOData;
use RalphJSmit\Laravel\SEO\Support\Tag;

class TitleTag extends Tag
{
    public string $tag = 'title';

    public function __construct(
        string $inner,
    ) {
        $this->inner = trim($inner);
    }

    public static function initialize(?SEOData $SEOData): ?Tag
    {
        $title = $SEOData?->title;

        if (! $title) {
            return null;
        }

        return new static(
            inner: $title,
        );
    }
}
