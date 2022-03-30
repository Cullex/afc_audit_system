<?php

namespace App\Http\Controllers;

use App\Record;
use App\Review;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(Record $model)
    {
        $reviewer_name = auth()->user()->name;
        $review_count = $model->review_count;
        $review = Review::query()->create([
            'user_id' => $model->id,
            'reviewer_name' => $reviewer_name,
            'review_status' => 'Reviewed',
            'review_count' => $review_count + 1
        ]);

        return api()->data('review',$review)->build();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show()
    {
            $reviews = Review::latest()->paginate(10);
            return api()->data('reviews', $reviews)->build();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
