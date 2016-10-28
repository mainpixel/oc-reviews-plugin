<?php
/**
 * Created by PhpStorm.
 * User: Job Verplanke
 * Date: 27/10/2016
 * Time: 13:27
 */

namespace Mainpixel\OcReviewsPlugin\Components;

use Cms\Classes\ComponentBase;
use Mainpixel\OcReviewsPlugin\Models\Review;

class Reviews extends ComponentBase
{
    public $reviews;

    /**
     * @return array
     */
    public function componentDetails()
    {
        return [
            'name' => 'Review List',
            'description' => 'List of reviews'
        ];
    }

    /**
     * @return array
     */
    public function defineProperties()
    {
        return [
            'maxItems' => [
                'title'             => 'Max items',
                'description'       => 'The amount of max. items that are loaded',
                'default'           => 2, // The default amount of loaded items
                // 'type' => 'string',
                'validationPattern' => '^[0-9]+$',
                'validationMessage' => 'Only numbers are valid!',
            ],

            'sortOrder' => [
                'title'       => 'Sort Order',
                'description' => 'Sorting order',
                'type'        => 'dropdown',
                'default'     => 'date desc',
            ],

            'notFoundMessage' => [
                'title'             => 'Not found message',
                'description'       => 'Shown when its not found',
                'type'              => 'string',
                'default'           => '',
                'showExternalParam' => false,
            ],
        ];
    }

    /**
     * @return array
     */
    public function getSortOrderOptions() {
        return [
            'date asc'  => 'Date (ASC)',
            'date desc' => 'Date (DESC)'
        ];
    }

    /**
     *
     */
    public function onRun()
    {
        $this->reviews = $this->loadReviews();
    }

    /**
     *
     */
    public function onRender() {
        $this->property('maxItems');
    }

    /**
     * @return mixed
     */
    protected function loadReviews()
    {
        // 1. Define review model class
        $query = new Review();

        // 2. Execute a query based on sorting.
        if ( $this->property('sortOrder') == 'date desc' ) {
            return $query->orderBy('created_at','desc')->get();
        }

        if ( $this->property('sortOrder') == 'date asc' ) {
            return $query->orderBy('created_at', 'asc')->get();
        }

        if ( $this->property('maxItems') > 0 ) {
            return $query->take($this->property('maxItems'))->get();
        }
    }
}