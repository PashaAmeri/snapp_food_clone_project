<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">

      <div class="px-10 mx-auto container align-middle">

        @can('is_admin')

        <div class="mb-4">

            <form action="{{ route('dashboard') }}" method="GET">

              <div class="flex gap-4 w-1/4">

                <select name="period" class="text-gray-700 w-full bg-gray-200 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium border-none rounded-lg text-sm px-4 py-2">

                  <option value="1" @if($period == 1) selected @endif>Daily</option>
                  <option value="7" @if($period == 7) selected @endif>Weekly</option>
                  <option value="30" @if($period == 30) selected @endif>Monthly</option>
                  <option value="182" @if($period == 182) selected @endif>semiyearly</option>
                  <option value="365" @if($period == 365) selected @endif>Yearly</option>

                </select>

                <button type="submit" class="text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Filter</button>

              </div>

              @error('period')

              <div>

                <span class="text-red-700">{{ $message }}</span>

              </div>

              @enderror

            </form>

        </div>

        <div class="grid grid-cols-2 gap-4">

          @can('is_admin')

          <div class="shadow rounded-lg py-3 px-5 bg-white">

            <div class="flex flex-row justify-between items-center">

              <div>

                <h6 class="text-2xl">@can('is_admin') Total Users @endcan</h6>
                <h4 class="text-black text-4xl font-bold text-left">@can('is_admin') {{ $users['count'] }} @endcan</h4>

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

              <p><span class="text-teal-500 font-bold">~{{ $users['growth'] }}%</span> in last {{ $period }} days <span class="font-bold">(+{{ $users['new_count'] }})</span></p>

            </div>

          </div>

          @endcan

          <div class="shadow rounded-lg py-3 px-5 bg-white">

            <div class="flex flex-row justify-between items-center">

              <div>

                <h6 class="text-2xl">Total Orders Delivered</h6>
                <h4 class="text-black text-4xl font-bold text-left">{{ $orders['count'] }}</h4>

              </div>

            </div>

            <div class="text-left flex flex-row justify-start items-center">

              <span class="mr-1">

                @if ($orders['growth'] < 0)
                    
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

                @else
                
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

                @endif

              </span>

              <p><span class="@if ($orders['growth'] < 0) text-red-500 @else text-teal-500 @endif font-bold">~‍‍‍{{ abs($orders['growth']) }}%</span> increase compared to last @if($period == 1) day @elseif($period == 7) week @elseif($period == 30) month @elseif($period == 182) semiyear @elseif($period == 365) year @endif<span class="font-bold">(+{{ $orders['new_count'] }})</span></p>

            </div>

          </div>

          <div class="shadow rounded-lg py-3 px-5 bg-white">

            <div class="flex flex-row justify-between items-center">

              <div>

                <h6 class="text-2xl">Total Income</h6>
                <h4 class="text-black text-4xl font-bold text-left">{{ $orders['count'] }}</h4>

              </div>

            </div>

            <div class="text-left flex flex-row justify-start items-center">

              <span class="mr-1">

                @if ($orders['growth'] < 0)
                    
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

                @else
                
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

                @endif

              </span>

              <p><span class="@if ($orders['growth'] < 0) text-red-500 @else text-teal-500 @endif font-bold">~‍‍‍{{ abs($orders['growth']) }}%</span> increase compared to last @if($period == 1) day @elseif($period == 7) week @elseif($period == 30) month @elseif($period == 182) semiyear @elseif($period == 365) year @endif<span class="font-bold">(+{{ $orders['new_count'] }})</span></p>

            </div>

          </div>

        </div>

        @endcan
  
      </div>

    </div>
</x-app-layout>
