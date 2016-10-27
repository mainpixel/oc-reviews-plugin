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

    protected $data = [];
    protected $rules = [];

    public function componentDetails()
    {
        return [
            'name' => 'Review Form',
            'description' => 'Frontend form for posting reviews'
        ];
    }

    public function onRun() {
        $this->addCss('assets/css/oc-reviews.css');
    }

    public function onSubmitReview()
    {
        $review = new Review();

        $this->rules = [
            'title' => 'required',
            'email' => 'required|email',
            'review' => 'required'
        ];

        $this->data = [
            'title' => Input::get('title'),
            'email' => Input::get('email'),
            'review' => Input::get('review'),
        ];

        //$data['title'] = post('title');
        //$data['email'] = post('email');
        //$data['body'] = post('review');
        //$data['published'] = post('published');
        //$created_at = post(Carbon::now('Y-m-d H:i:s'));

        //$data['published'] = Input::get('published');


        $validator = Validator::make($this->data, $this->rules);


        if ($validator->fails())
        {
            //$messages = $validator->messages();
            if (Input::file('image_upload')) {
                return Redirect::back()->withErrors($validator);
            }

        } else {


            $image = new File;
            $image->data = Input::file('image_upload');
            $image->save();

            // Attach the uploaded file to the model
            //$review->image()->add($image);

            $review->title = Input::get('title');
            $review->email = Input::get('email');
            $review->review = Input::get('review');
            $review->published = Input::get('published');
            //$review->created_at = $created_at;
            $review->image = $image;
            $review->save();

            return Redirect::back();
        }


    }
}