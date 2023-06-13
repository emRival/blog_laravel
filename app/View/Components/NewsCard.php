<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NewsCard extends Component
{
    public $newsTitle;
    public $newsContent;
    public $newsImage;
    public $newsDate;

    public $slug;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($newsTitle, $newsContent, $newsImage, $newsDate, $slug)
    {
        $this->newsTitle = $newsTitle;
        $this->newsContent = $newsContent;
        $this->newsImage = $newsImage;
        $this->newsDate = $newsDate;
        $this->slug = $slug;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.news-card');
    }
}
