<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }} / {{ __('Food Categories') }}
        </h2>
    </x-slot>

    <main class="py-12">
    
      <div class="px-10 mx-auto container align-middle space-y-8">

        <div class="flex gap-10 items-center">

          <form class="w-2/3">   

            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
            
            <div class="relative">

                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>

                <input type="search" id="default-search" class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Search Mockups, Logos..." required>
                <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
            
            </div>

          </form>

          <span class="font-bold text-xl">OR</span>

          <div>
            
            <a href="{{ route('food_cat.create') }}" class="whitespace-nowrap w-full py-3 px-24 rounded-xl border border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white">
              Create Category
            </a>

          </div>

        </div>


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
          <table class="w-full text-sm text-left text-gray-500">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                  <tr>
                      <th scope="col" class="px-6 py-3">
                        Category name
                      </th>

                      <th scope="col" class="px-6 py-3">
                          Description
                      </th>
                      <th scope="col" class="px-6 py-3">
                          Creation date
                      </th>
                      <th scope="col" class="px-6 py-3">
                          <span class="sr-only">Edit</span>
                      </th>
                  </tr>
              </thead>
              <tbody>
                  @forelse ($food_categories as $category)
                  
                  <tr class="bg-white border-b">

                    <th scope="row" class="px-6 py-4 font-medium text-gray-900">

                        {{ $category->category_name }}

                    </th>

                    <td class="px-6 py-4 text-ellipsis max-w-lg">

                        {{ $category->category_description }}

                    </td>

                    <td class="px-6 py-4">

                      {{ $category->created_at }}

                    </td>

                    <td class="px-6 py-4 text-right min-w-fit">

                      <div class="flex gap-4 justify-end">

                        <a href="{{ route('dashboard') .'/food_cat/' . $category->id }}/edit" class="font-medium text-blue-600">Edit</a>

                        <form action="{{ route('food_cat.destroy', $category -> id) }}" method="POST">

                          @csrf
                          @method('Delete')

                          <button name="cat_id" type="submit" value="{{ $category->id }}" class="font-medium text-red-600">Delete</button>
                        
                        </form>

                      </div>

                    </td>

                  </tr>

                  @empty
                  
                  <tr>

                    <td class="text-center py-10 text-2xl italic" colspan="4">

                      <span class="block">No categories found in the database! </span>
                      <span class="text-base font-light">Click <a href="{{ route('food_cat.create') }}" class="text-blue-400 underline">Here</a> to make one</span>

                    </td>

                  </tr>
                      
                  @endforelse
        
              </tbody>

          </table>

        </div>

        <div>

          {{ $food_categories->links() }}

        </div>

      </div>

    </main>
</x-app-layout>
