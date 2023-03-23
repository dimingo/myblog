  <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">
      <div x-data="{show: false}" @click.away="show = false">
          <div @click="show = !show">
              {{$activator}}
          </div>

          {{-- menu --}}
          <div x-show="show" class="py-2 absolute bg-gray-100 w-full h-40 overflow-y-auto mt-2 rounded-xl w-full z-50" style="display: none">
              {{$slot}}

          </div>
      </div>

  </div>
