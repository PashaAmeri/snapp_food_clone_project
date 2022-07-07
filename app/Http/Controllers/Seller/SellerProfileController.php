<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use App\Models\RestaurantCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRestaurantInfoRequest;
use App\Models\Restaurant;

class SellerProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $restaurant_info = Restaurant::where('user_id', auth()->user()->id)->first();

        return view('seller_profile.dashboard_profile_create_form', [
            'restaurant_category' => RestaurantCategory::all('id', 'category_name'),
            'resturant_info' => $restaurant_info
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
    public function store(StoreRestaurantInfoRequest $request)
    {

        $form_restaurant_data = $request->validated();

        if (Restaurant::where('user_id', auth()->user()->id)->first()) {

            return back();
        }

        Restaurant::create([
            'user_id' => auth()->user()->id,
            'restaurant_name' => $form_restaurant_data['restaurant_name'],
            'restaurant_phone' => $form_restaurant_data['restaurant_phone'],
            'restaurant_address' => json_encode([
                'address' => $form_restaurant_data['restaurant_address'],
                'latitude' => 'todo',
                'longitude' => 'todo',
            ]),
            'restaurant_category_id' => $form_restaurant_data['restaurant_category_id'],
            'bank_number' => $form_restaurant_data['bank_number'],
            'restaurant_description' => $form_restaurant_data['restaurant_description'],
            'schedule' => json_encode([
                'monday' => [
                    'start' => $form_restaurant_data['monday_start'] ?? NULL,
                    'end' =>  $form_restaurant_data['monday_ends'] ?? NULL,
                ],
                'tuesday' => [
                    'start' => $form_restaurant_data['tuesday_start'] ?? NULL,
                    'end' =>  $form_restaurant_data['tuesday_end'] ?? NULL,
                ],
                'wednesday' => [
                    'start' => $form_restaurant_data['wednesday_start'] ?? NULL,
                    'end' =>  $form_restaurant_data['wednesday_ends'] ?? NULL,
                ],
                'thursday' => [
                    'start' => $form_restaurant_data['thursday_start'] ?? NULL,
                    'end' =>  $form_restaurant_data['thursday_ends'] ?? NULL,
                ],
                'friday' => [
                    'start' => $form_restaurant_data['friday_start'] ?? NULL,
                    'end' =>  $form_restaurant_data['friday_ends'] ?? NULL,
                ],
                'saturday' => [
                    'start' => $form_restaurant_data['saturday_start'] ?? NULL,
                    'end' =>  $form_restaurant_data['saturday_ends'] ?? NULL,
                ],
                'sunday' => [
                    'start' => $form_restaurant_data['sunday_start'] ?? NULL,
                    'end' =>  $form_restaurant_data['sunday_ends'] ?? NULL,
                ],
            ])
        ]);

        return redirect()->route('dashoard');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $id = auth()->user()->id;
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
