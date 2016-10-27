<?php namespace Mainpixel\OcReviewsPlugin;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'Mainpixel\OcReviewsPlugin\Components\Reviews' => 'reviews',
            'Mainpixel\OcReviewsPlugin\Components\ReviewsForm' => 'reviewsform'
        ];
    }

    public function registerSettings()
    {
    }
}
