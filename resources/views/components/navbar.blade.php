<nav class="bg-white border-b border-gray-200">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center">
        <div class="flex">
          <div class="flex-shrink-0 flex items-center">
            <x-logo class="w-10" />
          </div>
        </div>
        <div class="hidden sm:ml-6 sm:flex sm:items-center">
            @auth

                <div x-data="{ open: false }" class="ml-3 relative inline-block">
                  <button  @click="open = true" type="button" class="inline-flex justify-center w-full px-4 py-2  text-sm leading-5 font-medium text-gray-700 focus:bg-gray-100 hover:text-gray-500 focus:outline-none transition ease-in-out duration-150" id="options-menu" aria-haspopup="true" aria-expanded="true">
                    المشاريع  
                    <svg class=" mr-2  w-5" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                    </svg>
                  </button>
                  <div class="origin-top-left absolute left-0 mt-px w-56">
                    <div x-show="open" @click.away="open = false" class="rounded-b-md bg-white  " role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                      <div class="px-4 py-3">
                        <p class="text-sm leading-5">
                          Signed in as
                        </p>
                        <p class="text-sm leading-5 font-medium text-gray-900 truncate">
                          tom@example.com
                        </p>
                      </div>
                      <div class="border-t border-gray-100"></div>
                      <div class="py-1">
                        <a href="#" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900" role="menuitem">Account settings
                        </a>
                        <a href="#" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900" role="menuitem">Support
                        </a>
                        <a href="#" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900" role="menuitem">License
                        </a>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Profile dropdown -->
                <div x-data="{ open: false }" class="mr-3 relative">
                    <div>
                        <button @click="open = true" class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out" id="user-menu" aria-label="User menu" aria-haspopup="true">
                        <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                        </button>
                    </div>
                    <div x-show="open" @click.away="open = false" class="origin-top-left absolute left-0 mt-2 w-48 rounded-md shadow-lg">
                        <div class="py-1 rounded-md bg-white shadow-xs">
                        <a href="#" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">Your Profile
                        </a>
                        <a href="#" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">Settings
                        </a>
                        <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">Sign out
                        </a>
                        </div>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">Register</a>
                @endif
            @endauth

        </div>
        <div class="-mr-2 flex items-center sm:hidden">
          <!-- Mobile menu button -->
          <button class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
            <!-- Menu open: "hidden", Menu closed: "block" -->
            <svg class="block h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <!-- Menu open: "block", Menu closed: "hidden" -->
            <svg class="hidden h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>
  </nav>