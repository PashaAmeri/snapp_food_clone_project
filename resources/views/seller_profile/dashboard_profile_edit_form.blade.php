<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Edit Coupon') }}
    </h2>
  </x-slot>

  <main class="py-12 px-10 mx-auto container align-middle">
    
    <div class="flex gap-20">

      <div class="flex items-center justify-center">

        <!-- Card -->
        <div class="w-80 bg-white rounded-2xl border shadow py-12 px-8">
      
          <!-- Header & Price -->
          <p class="text-3xl text-gray-700 font-semibold">{{ $coupon->coupon_code }}</p>
          <p class="text-xl text-blue-700 font-semibold mt-1">Coupon</p>
          <p class="text-sm text-gray-500 font-semibold mt-1">Last change: {{ $coupon->updated_at }}</p>

          @if ($coupon->is_percentage == 1) 
            
          <p class="text-5xl text-blue-700 font-semibold mt-1">{{ $coupon->discount_amount }}%</p>
              
          @else

          <p class="text-4xl text-blue-700 font-semibold mt-1">${{ $coupon->discount_amount }}</p>
              
          @endif
      
          <p class="text-lg text-gray-500 font-bold mt-4">{{ $coupon->coupon_title }}</p>

          <!-- Description -->
          <p class="text-sm text-gray-700 font-light mt-5 leading-7">{{ $coupon->coupon_description }}</p>
      
          <p class="text-sm text-gray-500 font-semibold mt-6">Start date: {{ $coupon->starts_at }}</p>
          <p class="text-sm text-gray-500 font-semibold mt-1">Expiration date: {{ $coupon->expires_at }}</p>

          <!-- CTA Button -->
          <a href="{{ route('dashboard') . '/restaurant_cat'}}">

            <button class="mt-10 w-full py-3 rounded-xl border border-gray-600 text-gray-600 hover:bg-gray-600 hover:text-gray-50">
              Cancel
            </button>

          </a>
      
        </div>
      
      </div>

      <div class="w-full">
    
        <form action="{{ route('coupon.update', $coupon->id) }}" method="POST">

          @csrf
          @method('Patch')

          <div class="space-y-7">

            <div class="flex gap-6">

              <div class="w-full">

                <x-jet-label for="name" value="{{ __('Title') }}" />
                <x-jet-input name="coupon_title" id="name" type="text" value="{{ old('coupon_title') ?? $coupon->coupon_title }}" class="mt-1 block w-full" wire:model.defer="state.email" />
                  
                @error('coupon_title')

                <div>

                  <span class="text-red-700">{{ $message }}</span>

                </div>

                @enderror

              </div>

              <div class="w-full">

                <x-jet-label for="discount_amount" value="{{ __('Amount / Percent') }}" />
                <x-jet-input name="discount_amount" id="discount_amount" type="text" value="{{ old('discount_amount') ?? $coupon->discount_amount }}" class="mt-1 block w-full" wire:model.defer="state.email" />
                  
                @error('discount_amount')

                <div>

                  <span class="text-red-700">{{ $message }}</span>

                </div>

                @enderror

              </div>

            </div>

            <div class="flex gap-6">

              <div class="w-full">

                <x-jet-label for="uses" value="{{ __('Max uses limit') }}" />
                <x-jet-input name="max_uses" id="uses" type="text" value="{{ old('max_uses') ?? $coupon->max_uses }}" class="mt-1 block w-full" wire:model.defer="state.email" />
                  
                @error('max_uses')

                <div>

                  <span class="text-red-700">{{ $message }}</span>

                </div>

                @enderror

              </div>

              <div class="w-full">

                <x-jet-label for="max_uses_per_user" value="{{ __('Number of uses per user') }}" />
                <x-jet-input name="max_uses_per_user" id="max_uses_per_user" type="text" value="{{ old('max_uses_per_user') ?? $coupon->max_uses_per_user }}" class="mt-1 block w-full" wire:model.defer="state.email" />
                  
                @error('max_uses_per_user')

                <div>

                  <span class="text-red-700">{{ $message }}</span>

                </div>

                @enderror

              </div>

            </div>

            <div class="flex gap-6">

              <div class="w-full">

                <x-jet-label for="starts_at" value="{{ __('Start time') }}" />
                <x-jet-input name="starts_at" id="starts_at" type="datetime-local" value="{{ old('starts_at') ?? $coupon->starts_at }}" class="mt-1 block w-full" wire:model.defer="state.email" />
                  
                @error('starts_at')

                <div>

                  <span class="text-red-700">{{ $message }}</span>

                </div>

                @enderror

              </div>

              <div class="w-full">

                <x-jet-label for="expires_at" value="{{ __('Expiration time') }}" />
                <x-jet-input name="expires_at" id="uses" type="datetime-local" value="{{ old('expires_at') ?? $coupon->expires_at }}" class="mt-1 block w-full" wire:model.defer="state.email" />
                  
                @error('expires_at')

                <div>

                  <span class="text-red-700">{{ $message }}</span>

                </div>

                @enderror

              </div>

            </div>

            <div>

              <x-jet-label for="description" value="{{ __('Description') }}" />
              <textarea id="description" rows="4" name="coupon_description" class="border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" placeholder="Type here...">{{ old('coupon_description') ?? $coupon->coupon_description }}</textarea>

              @error('coupon_description')

              <div>

                <span class="text-red-700">{{ $message }}</span>

              </div>

              @enderror

            </div>

            <button type="submit" class="w-2/3 py-3 rounded-xl border border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-gray-50">
              Save Changes
            </button>

          </div>

        </form>

      </div>

    </div>

  </main>

</x-app-layout>