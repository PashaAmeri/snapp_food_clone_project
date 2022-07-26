<x-app-layout>
 
  <link href="https://static.neshan.org/sdk/leaflet/1.4.0/leaflet.css" rel="stylesheet" type="text/css">
  <script src="https://static.neshan.org/sdk/leaflet/1.4.0/leaflet.js" type="text/javascript"></script>


  <x-slot name="header">

    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Compelit Your Restaurant Profile') }}
    </h2>

  </x-slot>

  <main class="flex flex-grow">
    
    <div class="flex gap-20 py-12 px-10 mx-auto container align-middle">

      <div class="w-3/4 m-auto">
    
        <form action="{{ route('restaurant_profile.update', auth()->user()->id) }}" method="POST">

          @csrf
          @method('Patch')

          <div class="space-y-7">

            <div class="flex gap-6">

              <div class="w-full">

                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input name="restaurant_name" id="name" type="text" value="{{ old('restaurant_name') }}" class="mt-1 block w-full" wire:model.defer="state.email" />
                  
                @error('restaurant_name')

                <div>

                  <span class="text-red-700">{{ $message }}</span>

                </div>

                @enderror

              </div>

              <div class="w-full">

                <x-jet-label for="restaurant_phone" value="{{ __('Phone') }}" />
                <x-jet-input name="restaurant_phone" id="restaurant_phone" type="text" value="{{ old('restaurant_phone') }}" class="mt-1 block w-full" wire:model.defer="state.email" />
                  
                @error('restaurant_phone')

                <div>

                  <span class="text-red-700">{{ $message }}</span>

                </div>

                @enderror

              </div>

            </div>
            
            <div>

              <x-jet-label for="address" value="{{ __('Address') }}" />
              <textarea id="address" rows="2" name="restaurant_address" class="border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" placeholder="Type here...">{{ old('restaurant_address') }}</textarea>

              @error('restaurant_address')

              <div>

                <span class="text-red-700">{{ $message }}</span>

              </div>

              @enderror

            </div>

            <div id="map" style="width: 600px; height: 450px; background: #eee; border: 2px solid #aaa;"></div>

            <input name="lat" type="hidden" id="lat">
            <input name="lng" type="hidden" id="lng">

            <div class="flex gap-6">

              <div class="w-full">

                <x-jet-label for="restaurant_category" value="{{ __('Restaurant Category') }}" />
                <select name="restaurant_category_id" id="restaurant_category" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full">
                  
                  @forelse ($restaurant_category as $category)

                  <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                      
                  @empty
                      
                  @endforelse

                </select>

                @error('restaurant_category_id')

                <div>

                  <span class="text-red-700">{{ $message }}</span>

                </div>

                @enderror

              </div>

              <div class="w-full">

                <x-jet-label for="bank_number" value="{{ __('Bank Account Number') }}" />
                <x-jet-input name="bank_number" id="bank_number" type="text" value="{{ old('bank_number') }}" class="mt-1 block w-full" placeholder="0123-0456-0789" />
                  
                @error('bank_number')

                <div>

                  <span class="text-red-700">{{ $message }}</span>

                </div>

                @enderror

              </div>

            </div>

            <div>

              <x-jet-label for="restaurant_description" value="{{ __('Description') }}" />
              <textarea id="restaurant_description" rows="4" name="restaurant_description" class="border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" placeholder="Type here...">{{ old('restaurant_description') }}</textarea>

              @error('restaurant_description')

              <div>

                <span class="text-red-700">{{ $message }}</span>

              </div>

              @enderror

            </div>

            <div>

              <span class="text-lg font-semibold">Schedule:</span>

            </div>

            <div class="flex gap-6">

              <div class="w-full">

                <span>{{ __('Monday') }}</span>

                <div class="w-full">

                  <x-jet-label for="monday_start" value="{{ __('Starts at') }}" />
                  <x-jet-input name="monday_start" id="monday_start" type="time" value="{{ old('monday_start') }}" class="mt-1 block w-full" wire:model.defer="state.email" />
                    
                  @error('monday_start')

                  <div>

                    <span class="text-red-700">{{ $message }}</span>

                  </div>

                  @enderror

                </div>
                
                <div class="w-full">

                  <x-jet-label for="monday_ends" value="{{ __('Ends at') }}" />
                  <x-jet-input name="monday_ends" id="monday_ends" type="time" value="{{ old('monday_ends') }}" class="mt-1 block w-full" wire:model.defer="state.email" />
                    
                  @error('monday_ends')

                  <div>

                    <span class="text-red-700">{{ $message }}</span>

                  </div>

                  @enderror

                </div>

              </div>

              <div class="w-full">

                <span>{{ __('Tuesday') }}</span>

                <div class="w-full">

                  <x-jet-label for="tuesday_start" value="{{ __('Starts at') }}" />
                  <x-jet-input name="tuesday_start" id="tuesday_start" type="time" value="{{ old('tuesday_start') }}" class="mt-1 block w-full" wire:model.defer="state.email" />
                    
                  @error('tuesday_start')

                  <div>

                    <span class="text-red-700">{{ $message }}</span>

                  </div>

                  @enderror

                </div>
                
                <div class="w-full">

                  <x-jet-label for="tuesday_ends" value="{{ __('Ends at') }}" />
                  <x-jet-input name="tuesday_ends" id="tuesday_ends" type="time" value="{{ old('tuesday_ends') }}" class="mt-1 block w-full" wire:model.defer="state.email" />
                    
                  @error('tuesday_ends')

                  <div>

                    <span class="text-red-700">{{ $message }}</span>

                  </div>

                  @enderror

                </div>

              </div>

              <div class="w-full">

                <span>{{ __('Wednesday') }}</span>

                <div class="w-full">

                  <x-jet-label for="wednesday_start" value="{{ __('Starts at') }}" />
                  <x-jet-input name="wednesday_start" id="wednesday_start" type="time" value="{{ old('wednesday_start') }}" class="mt-1 block w-full" wire:model.defer="state.email" />
                    
                  @error('wednesday_start')

                  <div>

                    <span class="text-red-700">{{ $message }}</span>

                  </div>

                  @enderror

                </div>
                
                <div class="w-full">

                  <x-jet-label for="wednesday_ends" value="{{ __('Ends at') }}" />
                  <x-jet-input name="wednesday_ends" id="wednesday_ends" type="time" value="{{ old('wednesday_ends') }}" class="mt-1 block w-full" wire:model.defer="state.email" />
                    
                  @error('wednesday_ends')

                  <div>

                    <span class="text-red-700">{{ $message }}</span>

                  </div>

                  @enderror

                </div>

              </div>

              <div class="w-full">

                <span>{{ __('Thursday') }}</span>

                <div class="w-full">

                  <x-jet-label for="thursday_start" value="{{ __('Starts at') }}" />
                  <x-jet-input name="thursday_start" id="thursday_start" type="time" value="{{ old('thursday_start') }}" class="mt-1 block w-full" wire:model.defer="state.email" />
                    
                  @error('thursday_start')

                  <div>

                    <span class="text-red-700">{{ $message }}</span>

                  </div>

                  @enderror

                </div>
                
                <div class="w-full">

                  <x-jet-label for="thursday_ends" value="{{ __('Ends at') }}" />
                  <x-jet-input name="thursday_ends" id="thursday_ends" type="time" value="{{ old('thursday_ends') }}" class="mt-1 block w-full" wire:model.defer="state.email" />
                    
                  @error('thursday_ends')

                  <div>

                    <span class="text-red-700">{{ $message }}</span>

                  </div>

                  @enderror

                </div>

              </div>

            </div>

            <div class="flex gap-6">

              <div class="w-full">

                <span>{{ __('Friday') }}</span>

                <div class="w-full">

                  <x-jet-label for="friday_start" value="{{ __('Starts at') }}" />
                  <x-jet-input name="friday_start" id="friday_start" type="time" value="{{ old('friday_start') }}" class="mt-1 block w-full" wire:model.defer="state.email" />
                    
                  @error('friday_start')

                  <div>

                    <span class="text-red-700">{{ $message }}</span>

                  </div>

                  @enderror

                </div>
                
                <div class="w-full">

                  <x-jet-label for="friday_ends" value="{{ __('Ends at') }}" />
                  <x-jet-input name="friday_ends" id="friday_ends" type="time" value="{{ old('friday_ends') }}" class="mt-1 block w-full" wire:model.defer="state.email" />
                    
                  @error('friday_ends')

                  <div>

                    <span class="text-red-700">{{ $message }}</span>

                  </div>

                  @enderror

                </div>

              </div>

              <div class="w-full">

                <span>{{ __('Saturday') }}</span>

                <div class="w-full">

                  <x-jet-label for="saturday_start" value="{{ __('Starts at') }}" />
                  <x-jet-input name="saturday_start" id="saturday_start" type="time" value="{{ old('saturday_start') }}" class="mt-1 block w-full" wire:model.defer="state.email" />
                    
                  @error('saturday_start')

                  <div>

                    <span class="text-red-700">{{ $message }}</span>

                  </div>

                  @enderror

                </div>
                
                <div class="w-full">

                  <x-jet-label for="saturday_ends" value="{{ __('Ends at') }}" />
                  <x-jet-input name="saturday_ends" id="saturday_ends" type="time" value="{{ old('saturday_ends') }}" class="mt-1 block w-full" wire:model.defer="state.email" />
                    
                  @error('saturday_ends')

                  <div>

                    <span class="text-red-700">{{ $message }}</span>

                  </div>

                  @enderror

                </div>

              </div>

              <div class="w-full">

                <span>{{ __('Sunday') }}</span>

                <div class="w-full">

                  <x-jet-label for="sunday_start" value="{{ __('Starts at') }}" />
                  <x-jet-input name="sunday_start" id="sunday_start" type="time" value="{{ old('sunday_start') }}" class="mt-1 block w-full" wire:model.defer="state.email" />
                    
                  @error('sunday_start')

                  <div>

                    <span class="text-red-700">{{ $message }}</span>

                  </div>

                  @enderror

                </div>
                
                <div class="w-full">

                  <x-jet-label for="sunday_ends" value="{{ __('Ends at') }}" />
                  <x-jet-input name="sunday_ends" id="sunday_ends" type="time" value="{{ old('sunday_ends') }}" class="mt-1 block w-full" wire:model.defer="state.email" />
                    
                  @error('sunday_ends')

                  <div>

                    <span class="text-red-700">{{ $message }}</span>

                  </div>

                  @enderror

                </div>

              </div>

            </div>

            <div class="flex gap-10 text-center">

              <a href="{{ route('dashboard') }}" class="w-1/3 py-3 rounded-xl border border-gray-600 text-gray-600 hover:bg-gray-600 hover:text-gray-50">
                Go Back
              </a>

              <button type="submit" class="w-2/3 py-3 rounded-xl border border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-gray-50">
                Submit Restaurant Info
              </button>

            </div>
          
          </div>

        </form>

      </div>

    </div>

  </main>

  <script type="text/javascript">

    var lat=35.699739;
    var lng=51.338097; 

    console.log(document.getElementById("lat").value);

  if(document.getElementById("lat").value)
    lat=document.getElementById("lat").value;
  
  if(document.getElementById("lng").value)
    lng=document.getElementById("lng").value;
  
  // neshan map
  var myMap = new L.Map('map', {
      key: 'web.c6616162d7454d039088460c483693bc',
      maptype: 'dreamy',
      poi: true,
      traffic: false,
      center: [lat, lng],
      zoom: 14
  });

  //add marker
      var stuSplit = L.latLng(lat, lng);
      var myMarker = new L.Marker(stuSplit, 
          { 
              title: 'unselected' ,
              draggable : true,
              clickable: true,
              })
              .addTo(myMap).on('dragend', (e)=>{
              document.getElementById("lat").value = e.target.getLatLng().lat;
              document.getElementById("lng").value = e.target.getLatLng().lng;
              });
</script>

</x-app-layout>