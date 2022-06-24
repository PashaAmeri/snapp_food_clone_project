<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Edit Food Category') }}
    </h2>
  </x-slot>

  <main class="py-12 px-10 mx-auto container align-middle">
    
    <div class="flex gap-20">

      <div class="flex items-center justify-center">

        <!-- Card -->
        <div class="w-80 bg-white rounded-2xl border shadow py-12 px-8">
      
          <!-- Header & Price -->
          <p class="text-3xl text-gray-700 font-semibold">{{ $food_category->category_name }}</p>
          <p class="text-xl text-blue-700 font-semibold mt-1"> Food category </p>
          <p class="text-sm text-gray-500 font-semibold mt-1">Last change: {{ $food_category->updated_at }}</p>
      
          <!-- Description -->
          <p class="text-sm text-gray-700 font-light mt-5 leading-7">{{ $food_category->category_description }}</p>
      
          <!-- CTA Button -->
          <a href="{{ route('dashboard') . '/food_cat'}}">

            <button class="mt-10 w-full py-3 rounded-xl border border-gray-600 text-gray-600 hover:bg-gray-600 hover:text-gray-50">
              Cancel
            </button>

          </a>
      
        </div>
      
      </div>

      <div class="w-full">
    
        <form action="{{ route('food_cat.update', $food_category->id) }}" method="POST">

          @csrf
          @method('Patch')

          <div class="space-y-7">

            <div>

              <x-jet-label for="name" value="{{ __('Category name') }}" />
              <x-jet-input name="category_name" id="name" type="text" value="{{ old('category_name') ?? $food_category->category_name }}" class="mt-1 block w-full" wire:model.defer="state.email" />

            </div>

            <div>

              <x-jet-label for="description" value="{{ __('Description') }}" />
              <textarea id="description" rows="4" name="category_description" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" placeholder="Type here...">{{ old('category_description') ?? $food_category->category_description }}</textarea>

            </div>

            <div>

              <button type="submit" class="w-1/2 py-3 rounded-xl border border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-gray-50">
                Save changes
              </button>

            </div>
          
          </div>

        </form>

      </div>

    </div>

  </main>

</x-app-layout>