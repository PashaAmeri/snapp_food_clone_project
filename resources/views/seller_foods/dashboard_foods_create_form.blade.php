<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Add Food') }}
    </h2>
  </x-slot>

  <main class="flex flex-grow">

    <section class="w-96 h-full bg-white border shadow py-12 px-8 space-y-4">
      
      <h5 class="font-bold text-xl">Existing Foods</h5>

      <div class="overflow-y-scroll">

        <ul>

          @forelse ($foods_name as $food)

          <li class="border-b-2 py-3">{{ $food->food_name }}</li>
              
          @empty

          <li class="text-gray-400 text-center py-10 text-base italic">Create new food to display here.</li>
              
          @endforelse

        </ul>

      </div>
  
    </section>
    
    <div class="flex gap-20 py-12 px-10 mx-auto container align-middle">

      <div class="w-3/4 m-auto">
    
        <form action="{{ route('foods.store') }}" method="POST">

          @csrf

          <div class="space-y-7">

            <div class="flex gap-6">

              <select name="food_category_id" id="" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full">
                
                @forelse ($foods_category as $category)

                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    
                @empty
                    
                @endforelse

              </select>

            </div>

            <div class="flex gap-6">

              <div class="w-full">

                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input name="food_name" id="name" type="text" value="{{ old('food_name') }}" class="mt-1 block w-full" wire:model.defer="state.email" />
                  
                @error('food_name')

                <div>

                  <span class="text-red-700">{{ $message }}</span>

                </div>

                @enderror

              </div>

              <div class="w-full">

                <x-jet-label for="food_price" value="{{ __('Price') }}" />
                <x-jet-input name="food_price" id="name" type="text" value="{{ old('food_price') }}" class="mt-1 block w-full" wire:model.defer="state.email" />
                  
                @error('food_price')

                <div>

                  <span class="text-red-700">{{ $message }}</span>

                </div>

                @enderror

              </div>

            </div>

            <div>

              <x-jet-label for="food_ingredients" value="{{ __('Food ingredients') }}" />
              <textarea id="food_ingredients" rows="2" name="food_ingredients" class="border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" placeholder="Type here...">{{ old('food_ingredients') }}</textarea>

              @error('food_ingredients')

              <div>

                <span class="text-red-700">{{ $message }}</span>

              </div>

              @enderror

            </div>

            <div>

              <x-jet-label for="description" value="{{ __('Description') }}" />
              <textarea id="description" rows="4" name="food_description" class="border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" placeholder="Type here...">{{ old('food_description') }}</textarea>

              @error('food_description')

              <div>

                <span class="text-red-700">{{ $message }}</span>

              </div>

              @enderror

            </div>

            <div class="flex gap-10 text-center">

              <a href="{{ route('foods.index') }}" class="w-1/3 py-3 rounded-xl border border-gray-600 text-gray-600 hover:bg-gray-600 hover:text-gray-50">
                Cancel
              </a>

              <button type="submit" class="w-2/3 py-3 rounded-xl border border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-gray-50">
                Create Coupon
              </button>

            </div>
          
          </div>

        </form>

      </div>

    </div>

  </main>

</x-app-layout>