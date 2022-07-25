<x-app-layout>

    <x-slot name="header">

      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }} / {{ __('Comments') }}
      </h2>

    </x-slot>

    <main class="py-12">

      <div class="px-10 mx-auto container align-middle space-y-8">

        <div class="grid grid-cols-2 gap-2">

          <div class="shadow rounded-lg py-3 px-5 bg-white">

            <div class="flex flex-row justify-between items-center">

              <div>

                <h6 class="text-2xl">Movies viewed</h6>
                <h4 class="text-black text-4xl font-bold text-left">33</h4>

              </div>

              <div>

                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-12 w-12"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="#14B8A6"
                  stroke-width="2"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"
                  />
                </svg>

              </div>

            </div>

            <div class="text-left flex flex-row justify-start items-center">

              <span class="mr-1">

                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-6 w-6"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="#14B8A6"
                  stroke-width="2"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"
                  />
                </svg>

              </span>

              <p><span class="text-teal-500 font-bold">3%</span> in 7 days</p>

            </div>

          </div>

          <div class="shadow rounded-lg py-3 px-5 bg-white">

            <div class="flex flex-row justify-between items-center">

              <div>

                <h6 class="text-2xl">Serials viewed</h6>
                <h4 class="text-black text-4xl font-bold text-left">41</h4>

              </div>

              <div>

                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-12 w-12"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="#EF4444"
                  stroke-width="2"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"
                  />
                </svg>

              </div>

            </div>

            <div class="text-left flex flex-row justify-start items-center">

              <span class="mr-1">

                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-6 w-6"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="#EF4444"
                  stroke-width="{2}"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"
                  />
                </svg>

              </span>

              <p><span class="text-red-500 font-bold">12%</span> in 7 days</p>

            </div>

          </div>

        </div>

        <div class="flex gap-10 items-center">

          <form action="{{ route('comments.index') }}" method="GET" class="w-full">   

            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>

            <div class="relative">

                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>

                <input name="key" type="search" id="default-search" class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 pr-72" placeholder="Search for Key words">
                <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>

            </div>

          </form>

        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

          <table class="w-full text-sm text-left text-gray-500">

              <thead class="text-xs text-gray-700 uppercase bg-gray-50">

                  <tr>
                    
                    <th scope="col" class="px-6 py-3 text-center">
                      # Order
                    </th>

                    <th scope="col" class="px-6 py-3">
                      User
                    </th>

                    <th scope="col" class="px-6 py-3">
                      Restaurant
                    </th>

                    <th scope="col" class="px-6 py-3">
                      Score
                    </th>

                    <th scope="col" class="px-6 py-3">
                      Date
                    </th>

                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>

                  </tr>

              </thead>

              <tbody>

                  @forelse ($comments as $comment)

                  <tr class="bg-white border-b">
                    
                    <td class="px-6 py-4 text-center">

                      <b>{{ $comment->commentCart->id }}</b>

                    </td>

                    <td class="px-6 py-4">

                      {{ $comment->commentAuthor->name }}

                    </td>

                    <td class="px-6 py-4">

                      {{ $comment->commentRestaurant->restaurant_name }}

                    </th>

                    <td class="px-6 py-4">

                      {{ $comment->score }}

                    </td>

                    <td class="px-6 py-4">

                      {{ $comment->created_at }}

                    </td>

                    <td class="px-6 py-4" colspan="6">

                      <div class="flex gap-4 justify-end">

                        <form action="{{ route('restaurant_comments.update', $comment->id) }}" method="POST">

                          @csrf
                          @method('Patch')

                          <button name="status_code" type="submit" value="3" class="font-medium text-blue-600">Accept</button>

                        </form>

                        <form action="{{ route('restaurant_comments.destroy', $comment->id) }}" method="POST">

                          @csrf
                          @method('Delete')

                          <button type="submit" class="font-medium text-red-600">Delete</button>

                        </form>

                      </div>

                    </td>

                  </tr>

                  <tr class="bg-white">

                    <td class="px-6 py-4"></td>

                    <td class="px-6 py-4">

                      <span class="font-extrabold text-gray-700">Meesage: </span>

                    </td>

                    <td class="px-6 py-4" colspan="6">

                      {{ $comment->content }}

                    </td>

                  </tr>

                  @empty
                  
                  <tr>

                    <td class="text-center py-10 text-2xl italic" colspan="6">

                      <span class="block">No comments yet!</span>

                    </td>

                  </tr>
                      
                  @endforelse
        
              </tbody>

          </table>

        </div>

        <div>

          {{ $comments->links() }}

        </div>

      </div>

    </main>

</x-app-layout>
