<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
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


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
          <table class="w-full text-sm text-left text-gray-500">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                  <tr>
                      <th scope="col" class="px-6 py-3">
                          Product name
                      </th>
                      <th scope="col" class="px-6 py-3">
                          Color
                      </th>
                      <th scope="col" class="px-6 py-3">
                          Category
                      </th>
                      <th scope="col" class="px-6 py-3">
                          Price
                      </th>
                      <th scope="col" class="px-6 py-3">
                          <span class="sr-only">Edit</span>
                      </th>
                  </tr>
              </thead>
              <tbody>
                  <tr class="bg-white border-b">
                      <th scope="row" class="px-6 py-4 font-medium text-gray-900">
                          Apple MacBook Pro 17"
                      </th>
                      <td class="px-6 py-4">
                          Sliver
                      </td>
                      <td class="px-6 py-4">
                          Laptop
                      </td>
                      <td class="px-6 py-4">
                          $2999
                      </td>
                      <td class="px-6 py-4 text-right">
                          <a href="#" class="font-medium text-blue-600">Edit</a>
                      </td>
                  </tr>
                  <tr class="bg-white border-b">
                      <th scope="row" class="px-6 py-4 font-medium text-gray-900">
                          Microsoft Surface Pro
                      </th>
                      <td class="px-6 py-4">
                          White
                      </td>
                      <td class="px-6 py-4">
                          Laptop PC
                      </td>
                      <td class="px-6 py-4">
                          $1999
                      </td>
                      <td class="px-6 py-4 text-right">
                          <a href="#" class="font-medium text-blue-600">Edit</a>
                      </td>
                  </tr>
              </tbody>
          </table>
        </div>

      </div>

    </main>
</x-app-layout>
