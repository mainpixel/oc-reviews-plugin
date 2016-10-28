<?php
/**
 * Created by PhpStorm.
 * User: Job Verplanke
 * Date: 27/10/2016
 * Time: 13:30
 */

namespace Mainpixel\OcReviewsPlugin\Components;

use Cms\Classes\ComponentBase;
use Mainpixel\OcReviewsPlugin\Models\Review;
use System\Models\File;
use Input;
use Redirect;
use Validator;


class ReviewsForm extends ComponentBase {

    /**
     * @return array
     */
    public function componentDetails() {
        return [
            'name'        => 'Review Form',
            'description' => 'Frontend form for posting reviews',
        ];
    }

    /**
     *
     */
    public function onRun() {
        $this->addCss('assets/css/oc-reviews.css');
    }

    /**
     * @return mixed
     */
    public function onSubmitReview() {
        // 1. Validate user input.
        $validator = Validator::make(Input::all(), [
            'title'        => 'required',
            'email'        => 'required|email',
            'review'       => 'required',
            'image_upload' => 'required|image',
        ]);

        // 2. If validation fails.
        if ( $validator->fails() ) {
            return Redirect::back()->withErrors($validator)->withInput(post());
        } else {

            $review = new Review();

            // 3.2 Store image into DB.
            $image = new File;
            $image->data = Input::file('image_upload');
            $image->save();

            // 3.3 Store review data.
            $review->title = Input::get('title');
            $review->email = Input::get('email');
            $review->review = Input::get('review');
            $review->published = Input::get('published');
            $review->image = $image;
            $review->save();

            // 3.4 Return back to latest (upload/create) view.
            return Redirect::back();
        }
    }
}