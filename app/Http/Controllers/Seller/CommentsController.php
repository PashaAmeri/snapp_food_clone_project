<?php

namespace App\Http\Controllers\Seller;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SellerCommentsRequest;
use App\Http\Requests\IndexCommentsSearchRequest;
use App\Models\Food;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(IndexCommentsSearchRequest $request)
    {

        $form_search_date = $request->validated();

        $comments = Comment::query();

        $comments->where('restaurant_id', auth()->user()->userRestaurant->id)
            ->with([
                'commentWithCartItems' => function ($query) {

                    return $query->select(['food_name']);
                },
                'commentAuthor' => function ($query) {

                    return $query->select(['id', 'name']);
                }, 'commentReply',
                'commentStatus',
                'commentCart'
            ]);

        if (isset($form_search_date['item_id']) and !is_null($form_search_date['item_id'])) {

            $comments->whereRelation('commentWithCartItems', 'foods.id', $form_search_date['item_id']);
        }

        if (isset($form_search_date['key']) and !is_null($form_search_date['key'])) {

            $comments->where('content', 'LIKE', '%' . $form_search_date['key'] . '%');
        }

        return view('seller_comments.dashboard_comments_index', [
            'comments' => $comments->orderBy('created_at', 'DESC')->paginate(),
            'foods' => Food::where('user_id', auth()->user()->id)->get()
        ]);
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
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(SellerCommentsRequest $request, $id)
    {

        Comment::where('id', $id)->update(['status' => $request->validated()['status_code']]);

        return redirect()->route('comments.index');
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
