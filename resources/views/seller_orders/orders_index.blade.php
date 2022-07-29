<x-app-layout>

    <x-slot name="header">

      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }} / {{ __('Orders') }}
      </h2>

    </x-slot>

    <main class="py-12">

      <div class="px-10 mx-auto container align-middle space-y-8">

        <div class="flex gap-10 items-center">

          <form class="w-full">   

            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>

            <div class="relative">

                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>

                <input type="search" id="default-search" class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Search Mockups, Logos..." required>
                <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>

            </div>

          </form>

        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

          <table class="w-full text-sm text-left text-gray-500">

              <thead class="text-xs text-gray-700 uppercase bg-gray-50">

                  <tr>

                    <th scope="col" class="px-6 py-3">
                      #
                    </th>

                    <th scope="col" class="px-6 py-3">
                      Customer Info
                    </th>

                    <th scope="col" class="px-6 py-3">
                      Items
                    </th>

                    <th scope="col" class="px-6 py-3">
                      Address
                    </th>

                    <th scope="col" class="px-6 py-3">
                      Total
                    </th>

                    <th scope="col" class="px-6 py-3">
                      Status
                    </th>

                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>

                  </tr>

              </thead>

              <tbody>

                  @forelse ($orders as $order)

                  <tr class="bg-white border-b">

                    <td class="px-6 py-4">

                      {{ $order['id'] }}

                    </td>

                    <th scope="row" class="px-6 py-4 text-ellipsis max-w-lg flex flex-col">

                        <span><b>Name:</b> {{ $order['customer']['name'] }}</span>
                        <span><b>Phone:</b> {{ $order['customer']['phone'] }}</span>

                    </th>

                    <td class="px-6 py-4 text-ellipsis max-w-lg shrink">

                      @foreach ($order['items'] as $item)

                        <span><b>{{ $loop->iteration }}. </b>{{ $item['name'] }}</span>

                      @endforeach  

                    </td>

                    <td class="px-6 py-4">

                      {{ $order['customer']['address'] }}

                    </td>

                    <td class="px-6 py-4">

                      ${{ $order['total'] }}

                    </td>

                    <td class="px-6 py-4">

                      <span class="px-5 py-1 rounded-full @if($order['status']['code'] === 3) bg-orange-200 text-orange-900 @elseif($order['status']['code'] === 4) bg-blue-200 text-blue-900 @elseif($order['status']['code'] === 5) bg-purple-200 text-purple-900 @elseif($order['status']['code'] === 6) bg-green-200 text-green-900 @elseif($order['status']['code'] === 1) bg-red-200 text-red-900 @endif">{{ $order['status']['title'] }}</span>

                    </td>

                    <td class="px-6 py-4 text-right min-w-fit">

                      <div class="flex gap-4 justify-end">

                        @if ($order['status']['code'] < 6 and $order['status']['code'] !== 1)

                        <form action="{{ route('orders.update', $order['id']) }}" method="POST">

                          @csrf
                          @method('Patch')

                          <button name="status_code" type="submit" value="{{ $order['status']['code'] + 1 }}" class="font-medium text-blue-600">@if($order['status']['code'] === 3) Accept @else Next @endif</button>

                        </form>

                        <form action="{{ route('orders.update', $order['id']) }}" method="POST">

                          @csrf
                          @method('Patch')

                          <button name="status_code" type="submit" value="1" class="font-medium text-red-600">Refuse</button>

                        </form>

                        @else

                        <span class="font-medium text-gray-600">Done</span>
                        <span class="font-medium text-gray-600">Refuse</span>

                        @endif

                      </div>

                    </td>

                  </tr>

                  @empty
                  
                  <tr>

                    <td class="text-center py-10 text-2xl italic" colspan="7">

                      <span class="block">No orders yet!</span>
                    </td>

                  </tr>
                      
                  @endforelse
        
              </tbody>

          </table>

        </div>

        <div>

          {{-- {{ $orders->links() }} --}}

        </div>

      </div>

    </main>

</x-app-layout>
