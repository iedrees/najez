<nav class="bg-white border-gray-50 px-3 sm:px-0">
    <div class="container mx-auto">
        <div class="flex justify-between items-center">
            <div class="flex">
                <div class="flex-shrink-0 flex items-center">
                    <x-logo :sitename="true" class="w-10 h-8"/>
                </div>
            </div>
            <div class="sm:ml-6 sm:flex sm:items-center">
                @auth

                    <div x-data="{ open: false }"
                         class="mx-2 relative inline-block border-l-2 border-r-2 border-gray-100">
                        <button @click="open = true" type="button"
                                class="inline-flex justify-center w-full px-4 py-5 text-sm leading-5 font-medium text-gray-700 focus:bg-gray-100 hover:text-gray-500 focus:outline-none transition ease-in-out duration-150"
                                id="options-menu" aria-haspopup="true" aria-expanded="true">
                            المشاريع
                            <svg class=" mr-2 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </button>
                        <div class="origin-top-left absolute left-0 w-56 ">
                            <div x-show="open" @click.away="open = false" class="rounded-b-md bg-gray-100 p-1 -ml-0.5"
                                 role="menu" aria-orientation="vertical" aria-labelledby="options-menu">

                                <div class="py-1 mt-px bg-white rounded-sm">

                                    <a href="{{ route('create'), auth()->user()->name}}"
                                       class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900"
                                       role="menuitem">
                                        أنشئ مشروع جديد
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Profile dropdown -->
                    <div x-data="{ open: false }" class="mr-3 relative mt-px">
                        <div>
                            <button @click="open = true"
                                    class="flex text-sm focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                                    id="user-menu" aria-label="User menu" aria-haspopup="true">
                                <img class="h-8 w-8 rounded-full"
                                     src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                     alt=""/>
                            </button>
                        </div>
                        <div x-show="open" @click.away="open = false"
                             class="origin-top-left absolute left-0 mt-3 w-48 rounded-b-md bg-gray-100 p-1">
                            <div class="py-1 rounded-sm bg-white">
                                <div class="px-4 py-3">
                                    <p class="text-sm leading-5 font-bold">
                                        {{auth()->user()->name}}
                                    </p>
                                    <p class="text-sm leading-5 font-medium text-gray-500 truncate">
                                        {{auth()->user()->email}}
                                    </p>
                                </div>
                                <div class="border-t border-gray-100"></div>

                                <a href="{{route('users.show', auth()->user()->id)}}"
                                   class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                    الملف الشخصي
                                </a>

                                <a href="{{ route('logout') }}"
                                   class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                    خروج
                                </a>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="py-2">
                        <a href="{{ route('login') }}"
                           class="inline-flex mr-1 items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none active:bg-indigo-200 transition ease-in-out duration-150">
                            {{__('Login')}}
                        </a>

                        <a href="{{ route('register') }}"
                           class="inline-flex mr-1 items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-500 hover:bg-indigo-600 focus:outline-none  transition ease-in-out duration-150">
                            {{__('Register')}}
                        </a>
                    </div>

                @endauth

            </div>
        </div>
    </div>
</nav>
