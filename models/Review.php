<?php namespace Mainpixel\OcReviewsPlugin\Models;

use Model;

/**
 * Model
 */
class Review extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /*
     * Validation
     */
    public $rules = [
    ];

    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = true;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'mainpixel_ocreviewsplugin_';

    /**
     * @var array
     */
    public $attachOne = [
        'image' => 'System\Models\File'
    ];
}