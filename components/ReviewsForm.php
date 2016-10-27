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
use Redirect;
use Validator;
use ApplicationException;
use Input;
use Carbon\Carbon;

class ReviewsForm extends ComponentBase
{
    public $validationRules = [
        'title'
    ];

    public function componentDetails()
    {
        return [
            'name' => 'Review Form',
            'description' => 'Frontend form for posting reviews'
        ];
    }

    public function onSubmitReview()
    {

        $title = post('title');
        $email = post('email');
        $body = post('review');
        $published = post('published');
        //$created_at = post(Carbon::now('Y-m-d H:i:s'));

        $review = new Review();

        $validator = Validator::make(
            [
                'title' => $title,
            ],
            [
                'title' => 'required',
            ]
        );


        if ($validator->fails())
        {
            $messages = $validator->messages();
            throw new ApplicationException($messages->first());
        } else {

            $image = new File;
            $image->data = Input::file('image_upload');
            //$image->fromPost(Input::file('image_upload'));
            $image->save();

            // Attach the uploaded file to the model
            $review->image()->add($image);

            $review->title = $title;
            $review->email = $email;
            $review->review = $body;
            $review->published = $published;
            //$review->created_at = $created_at;
            $review->image = $image;
            $review->save();

            return Redirect::back();
        }




    }
}