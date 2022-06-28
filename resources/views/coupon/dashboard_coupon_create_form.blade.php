<x-app-layout>

  <x-slot name="header">

    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Create Restaurant Category') }}
    </h2>

  </x-slot>

  <main class="flex flex-grow">

    <section class="w-96 h-full bg-white border shadow py-12 px-8 space-y-4">
      
      <h5 class="font-bold text-xl">Existing Coupons</h5>

      <div class="overflow-y-scroll">

        <ul>

          @forelse ($coupons_title as $coupon)

          <li class="border-b-2 py-3">{{ $coupon->coupon_title }}</li>
              
          @empty

          <li class="text-gray-400 text-center py-10 text-base italic">Create new coupon to display here.</li>

          @endforelse

        </ul>

      </div>
  
    </section>
    
    <div class="flex gap-20 py-12 px-10 mx-auto container align-middle">

      <div class="flex items-center justify-center">

        <!-- Card -->
   
      
      </div>

      <div class="w-3/4 m-auto">
    
        <form action="{{ route('coupon.store') }}" method="POST">

          @csrf

          <div class="space-y-7">

            <div class="flex gap-6">

              <div class="w-full">

                <x-jet-label for="name" value="{{ __('Title') }}" />
                <x-jet-input name="coupon_title" id="name" type="text" value="{{ old('coupon_title') }}" class="mt-1 block w-full" wire:model.defer="state.email" />
                  
                @error('coupon_title')

                <div>

                  <span class="text-red-700">{{ $message }}</span>

                </div>

                @enderror

              </div>

              <div class="w-full">

                <x-jet-label for="name" value="{{ __('Code') }}" />
                <x-jet-input name="coupon_code" id="name" type="text" value="{{ old('coupon_code') }}" class="mt-1 block w-full" wire:model.defer="state.email" />
                  
                @error('coupon_code')

                <div>

                  <span class="text-red-700">{{ $message }}</span>

                </div>

                @enderror

              </div>

            </div>

            <div class="flex gap-6">

              <div class="w-full">

                <x-jet-label for="discount_amount" value="{{ __('Amount / Percent') }}" />
                <x-jet-input name="discount_amount" id="discount_amount" type="text" value="{{ old('discount_amount') }}" class="mt-1 block w-full" wire:model.defer="state.email" />
                  
                @error('discount_amount')

                <div>

                  <span class="text-red-700">{{ $message }}</span>

                </div>

                @enderror

              </div>

              <div class="w-full items-center">

                <div>

                  <input type="radio" id="percentage" name="is_percentage" value="1">                  
                  <x-jet-label for="percentage" style="display: inline" value="{{ __('Percentage') }}" />

                </div>

                <div>

                  <input type="radio" id="fixed" name="is_percentage" value="0">                  
                  <x-jet-label for="fixed" style="display: inline" value="{{ __('Fixed') }}" />

                </div>

                @error('is_percentage')

                <div>

                  <span class="text-red-700">{{ $message }}</span>

                </div>

                @enderror

              </div>

            </div>

            <div class="flex gap-6">

              <div class="w-full">

                <x-jet-label for="uses" value="{{ __('Max uses limit') }}" />
                <x-jet-input name="max_uses" id="uses" type="text" value="{{ old('max_uses') }}" class="mt-1 block w-full" wire:model.defer="state.email" />
                  
                @error('max_uses')

                <div>

                  <span class="text-red-700">{{ $message }}</span>

                </div>

                @enderror

              </div>

              <div class="w-full">

                <x-jet-label for="max_uses_per_user" value="{{ __('Number of uses per user') }}" />
                <x-jet-input name="max_uses_per_user" id="max_uses_per_user" type="text" value="{{ old('max_uses_per_user') }}" class="mt-1 block w-full" wire:model.defer="state.email" />
                  
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
                <x-jet-input name="starts_at" id="starts_at" type="datetime-local" value="{{ old('starts_at') }}" class="mt-1 block w-full" wire:model.defer="state.email" />
                  
                @error('starts_at')

                <div>

                  <span class="text-red-700">{{ $message }}</span>

                </div>

                @enderror

              </div>

              <div class="w-full">

                <x-jet-label for="expires_at" value="{{ __('Expiration time') }}" />
                <x-jet-input name="expires_at" id="uses" type="datetime-local" value="{{ old('expires_at') }}" class="mt-1 block w-full" wire:model.defer="state.email" />
                  
                @error('expires_at')

                <div>

                  <span class="text-red-700">{{ $message }}</span>

                </div>

                @enderror

              </div>

            </div>

            <div>

              <x-jet-label for="description" value="{{ __('Description') }}" />
              <textarea id="description" rows="4" name="coupon_description" class="border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" placeholder="Type here...">{{ old('coupon_description') }}</textarea>

              @error('coupon_description')

              <div>

                <span class="text-red-700">{{ $message }}</span>

              </div>

              @enderror

            </div>

            <div class="flex gap-10 text-center">

              <a href="{{ route('coupon.index') }}" class="w-1/3 py-3 rounded-xl border border-gray-600 text-gray-600 hover:bg-gray-600 hover:text-gray-50">
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