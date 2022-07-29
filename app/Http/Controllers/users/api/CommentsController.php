<?php

namespace App\Http\Controllers\users\api;

use App\Models\Cart;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentsShowRequest;
use App\Http\Requests\StoreCommentsRequest;
use App\Http\Resources\Comments\RestaurantCommentResource;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommentsRequest $request)
    {

        $this->authorize('create', Comment::class);

        $comment_form_data = $request->validated();

        $cart = Cart::find($comment_form_data['cart_id']);

        if (!(Comment::where('cart_id', $comment_form_data['cart_id'])->get()->isEmpty())) {

            return response([
                'error' => 'Comment alredy posted on this card!'
            ]);
        }

        // TODO: remove status from create

        Comment::create([
            'user_id' => auth()->user()->id,
            'cart_id' => $cart->id,
            'restaurant_id' => $cart->restaurant_id,
            'score' => $comment_form_data['score'],
            'content' => $comment_form_data['message'],
            'status' => 2
        ]);

        return response([
            'msg' => 'Comment created successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(CommentsShowRequest $request)
    {

        $this->authorize('view', Comment::class);

        $comments = Comment::where('restaurant_id', $request->validated()['restaurant_id'])
            ->with([
                'commentAuthor' => function ($query) {

                    return $query->select(['id', 'name']);
                }, 'commentWithCartItems' => function ($query) {

                    return $query->select(['food_name']);
                }, 'commentReply'
            ])->get();

        return RestaurantCommentResource::collection($comments);
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
