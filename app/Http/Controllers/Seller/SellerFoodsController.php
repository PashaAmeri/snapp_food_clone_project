<?php

namespace App\Http\Controllers\Seller;

use App\Models\Food;
use App\Models\FoodCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSellerFoodsRequest;

class SellerFoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('seller_foods.dashboard_foods_index', [
            'foods' => Food::paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('seller_foods.dashboard_foods_create_form', [
            'foods_name' => Food::all('food_name'),
            'foods_category' => FoodCategory::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSellerFoodsRequest $request)
    {

        $vaidated_food_request_data = $request->validated();

        Food::create([
            'user_id' => auth()->user()->id,
            'food_category_id' => $vaidated_food_request_data['food_category_id'],
            'food_name' => $vaidated_food_request_data['food_name'],
            'food_price' => $vaidated_food_request_data['food_price'],
            'food_ingredients' => $vaidated_food_request_data['food_ingredients'],
            'food_description' => $vaidated_food_request_data['food_description'],
        ]);

        return redirect()->route('foods.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        // TODO: showing foods in seperated page
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

        // deleting the food record in database
        Food::find($id)->delete();
        // redirectig to food index page / controller: SellerFoodController@index
        return redirect()->route('foods.index');
    }
}
