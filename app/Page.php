<?php
namespace App;
use Butschster\Head\Contracts\MetaTags\SeoMetaTagsInterface;
use Butschster\Head\Contracts\MetaTags\RobotsTagsInterface;

class Page extends Model implements SeoMetaTagsInterface, RobotsTagsInterface {

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getKeywords()
    {
        return $this->keywords;
    }

    public function getRobots(): ?string
    {
        return 'noindex, nofollow';
    }
}
