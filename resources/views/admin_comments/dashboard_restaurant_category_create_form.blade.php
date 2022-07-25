<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Create Restaurant Category') }}
    </h2>
  </x-slot>

  <main class="flex flex-grow">

    <section class="w-96 h-full bg-white border shadow py-12 px-8 space-y-4">
      
      <h5 class="font-bold text-xl">Existing Categories</h5>

      <div class="overflow-y-scroll">

        <ul>

          @forelse ($categories_name as $category)

          <li class="border-b-2 py-3">{{ $category->category_name }}</li>
              
          @empty

          <li class="text-gray-400 text-center py-10 text-base italic">Create new category to display here.</li>
              
          @endforelse

        </ul>

      </div>
  
    </section>
    
    <div class="flex gap-20 py-12 px-10 mx-auto container align-middle">

      <div class="flex items-center justify-center">

        <!-- Card -->
   
      
      </div>

      <div class="w-1/3 m-auto">
    
        <form action="{{ route('restaurant_cat.store') }}" method="POST">

          @csrf

          <div class="space-y-7">

            <div>

              <x-jet-label for="name" value="{{ __('Category name') }}" />
              <x-jet-input name="category_name" id="name" type="text" value="{{ old('category_name') }}" class="mt-1 block w-full" wire:model.defer="state.email" />
                
                @error('category_name')

                <div>

                  <span class="text-red-700">{{ $message }}</span>

                </div>

                @enderror

            </div>

            <div>

              <x-jet-label for="description" value="{{ __('Description') }}" />
              <textarea id="description" rows="4" name="category_description" class="border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" placeholder="Type here...">{{ old('category_description') }}</textarea>

              @error('category_description')

              <div>

                <span class="text-red-700">{{ $message }}</span>

              </div>

              @enderror

            </div>

            <div class="flex gap-10 text-center">

              <a href="{{ route('restaurant_cat.index') }}" class="w-1/3 py-3 rounded-xl border border-gray-600 text-gray-600 hover:bg-gray-600 hover:text-gray-50">
                Cancel
              </a>

              <button type="submit" class="w-2/3 py-3 rounded-xl border border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-gray-50">
                Create category
              </button>

            </div>
          
          </div>

        </form>

      </div>

    </div>

  </main>

</x-app-layout>