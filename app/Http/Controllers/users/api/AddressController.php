<?php

namespace App\Http\Controllers\users\api;

use App\Models\User;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreAddressesRequest;

class AddressController extends Controller
{

    public function createAddress(StoreAddressesRequest $request)
    {

        $create_form_address = $request->validated();

        Address::create([
            'user_id' => auth()->user()->id,
            'title' => $create_form_address['title'],
            'address' => $create_form_address['address'],
            'latitude' => $create_form_address['latitude'],
            'longitude' => $create_form_address['longitude'],
        ]);

        return response(['message' => 'Address created!'], 201);
    }

    public function getUserAddresses()
    {

        return Address::where('user_id', auth()->user()->id)->get();
    }

    public function setCurrentAddress($address_id)
    {

        // Gate::authorize('update', $address_id);

        if ($user = User::find(auth()->user()->id)->first()) {

            $user->default_address_id = $address_id;
            $user->save();

            return response(['message' => 'Address sets as default.']);
        }

        return response(['message' => 'Action failed.']);
    }

    public function getAddressByID($address_id)
    {

        // Gate::authorize('view', $address_id);

        return Address::find($address_id);
    }
}
