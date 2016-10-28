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
                'default'           => 0,
                'validationPattern' => '^[0-9]+$',
                'validationMessage' => 'Only numbers are valid!',
            ],

            'sortOrder' => [
                'title'       => 'Sort Order',
                'description' => 'Sorting order by date',
                'type'        => 'dropdown',
                'default'     => 'date desc',
            ],

            'notFoundMessage' => [
                'title'             => 'Not found message',
                'description'       => 'Message when its not found',
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
            'date asc'  => 'Oldest on top',
            'date desc' => 'Newest on top'
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
     * @return mixed
     */
    protected function loadReviews()
    {
        // 1. Define review model class
        $query = Review::all();

        // 2. Execute a query based on sorting.
        if ( $this->property('sortOrder') == 'date desc' ) {
            $query = $query->sortByDesc('created_at');
        }

        if ( $this->property('sortOrder') == 'date asc' ) {
            $query = $query->sortBy('created_at');
        }

        if ( $this->property('maxItems') > 0 ) {
            $query = $query->take($this->property('maxItems'));
        }

        return $query;
    }
}