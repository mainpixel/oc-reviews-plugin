<?php namespace Mainpixel\OcReviewsPlugin;


use Backend;
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


    public function registerNavigation()
    {
        return [
            'Main' => [
                'label' => 'Main',
                'url' => Backend::url('mainpixel/index'),
                'icon' => ''
            ]
        ];
    }
}
