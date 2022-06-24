<?php

namespace App\Http\Controllers;

use App\Models\FoodCategory;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFoodCategoriesRequest;
use App\Models\Food;

class FoodCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('dashboard_food_categories_index', [
            'food_categories' => FoodCategory::paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('dashboard_food_caterory_create_form', [
            'categories_name' => FoodCategory::get('category_name')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFoodCategoriesRequest $request)
    {

        // creating new record from validated data
        FoodCategory::create($request->validated());

        // redirectig to food category index page / controller: FoodCategoriesController@index
        return redirect()->route('food_cat.index');
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

        return view('dashboard_food_caterory_edit_form', [
            'food_category' => FoodCategory::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreFoodCategoriesRequest $request, $id)
    {

        // puting validated date to the database 
        FoodCategory::find($id)->update($request->validated());
        // redirectig to food category index page / controller: FoodCategoriesController@index
        return redirect()->route('food_cat.index');
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
        FoodCategory::find($id)->delete();
        // redirectig to food category index page / controller: FoodCategoriesController@index
        return redirect()->route('food_cat.index');
    }
}
