<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\RestaurantCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFoodAndRestaurantCategoriesRequest;

class RestaurantCategoriesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('restaurant_category.dashboard_restaurant_categories_index', [
            'restaurant_categories' => RestaurantCategory::paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('restaurant_category.dashboard_restaurant_category_create_form', [
            'categories_name' => RestaurantCategory::get('category_name')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFoodAndRestaurantCategoriesRequest $request)
    {

        // creating new record from validated data
        RestaurantCategory::create($request->validated());

        // redirectig to restaurant category index page / controller: FoodCategoriesController@index
        return redirect()->route('restaurant_cat.index');
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

        return view('restaurant_category.dashboard_restaurant_category_edit_form', [
            'restaurant_category' => RestaurantCategory::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreFoodAndRestaurantCategoriesRequest $request, $id)
    {

        // puting validated date to the database 
        RestaurantCategory::find($id)->update($request->validated());
        // redirectig to restaurant category index page / controller: FoodCategoriesController@index
        return redirect()->route('restaurant_cat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        // deleting the category record in database
        RestaurantCategory::find($id)->delete();
        // redirectig to restaurant category index page / controller: FoodCategoriesController@index
        return redirect()->route('restaurant_cat.index');
    }
}
