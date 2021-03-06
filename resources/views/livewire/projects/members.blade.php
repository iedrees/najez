<x-project-page :project="$project">

    @if((auth()->user()->id == $project->user_id) || (auth()->user()->id == $project->leader_id))

        {{-- Search  --}}
        <div x-data="{open:false}" class="relative block mb-5" x-on:click.away="open = false">

            <div class="relative rounded shadow-sm bg-gray-200 p-1">
                <input x-on:focus="open = true" wire:model="search" type="text" placeholder="ابحث عن عضو ..."
                       class="p-3 pr-10 block w-full rounded-none rounded transition ease-in-out duration-150 text-gray-500 border-2 border-white focus:border-indigo-300  focus:outline-none"/>
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                              d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                              clip-rule="evenodd"></path>
                    </svg>
                </div>
            </div>

            <div x-show="open" class="origin-top-right absolute right-0 mt-1 w-56 rounded-md shadow-sm w-full">
                <div class="rounded-b-md bg-white shadow">
                    <div class="" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                        @if(!count($users))
                            <div class="p-2 px-3 text-gray-600 text-sm">
                                لا توجد نتائج ..
                            </div>
                        @else
                            @foreach($users as $user)
                                <div class="flex items-center text-gray-700 p-3 border-b border-gray-100">
                                    <img class="h-8 w-8 rounded-sm" src="{{$user->image}}" alt=""/>
                                    <div class="mx-2 flex-grow">
                                        <h4 class="text-sm">{{ $user->name }}</h4>
                                        <div class="text-xs text-gray-600">{{ $user->email }}</div>
                                    </div>
                                    <div>
                                        <button x-on:click="open = false" wire:click="addMember({{$user}})"
                                                type="button"
                                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-blue-700 bg-indigo-100 hover:bg-indigo-50 focus:outline-none focus:border-indigo-300 focus:shadow-outline-indigo active:bg-indigo-200 transition ease-in-out duration-150">
                                            <svg class="-mr-0.5 ml-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"></path>
                                            </svg>
                                            أضف للمشروع
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- All members  --}}
    <h4 class="border-b-2 border-gray-300 p-2 mb-5 text-gray-400 font-bold flex items-center">
        <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
            <path
                d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path>
        </svg>
        <span class="mx-2"> أعضاء الفريق </span>
    </h4>

    <div class="sm:rounded-md">
        <div class="bg-white mb-0.5">
            <div class="block focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                <div class="flex items-center px-4 py-4 sm:px-6">
                    <div class="min-w-0 flex-1 flex items-center">
                        <div class="flex-shrink-0">
                            <img class="h-12 w-12 rounded-full" src="{{$project->user->image}}" alt=""/>
                        </div>
                        <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                            <div>
                                <div
                                    class="leading-5 font-bold text-lg text-gray-600 truncate">{{$project->user->name}}</div>
                                <div class="mt-2 flex items-center text-sm leading-5 text-gray-500">
                                    <svg class="flex-shrink-0 ml-1 h-5 w-5 text-green-500" fill="currentColor"
                                         viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                              d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="truncate text-gray-400"> مدير المشروع  </span>
                                </div>
                                <div class="mt-2 flex items-center text-md leading-6 text-gray-500">
                                    <span
                                        class="truncate text-gray-400 font-bold"> رقم التحويلة : {{$project->user->employee_ext}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @foreach ($project->members as $member)
            @if($member->rule == "قائد")
            <div class="bg-white mb-1">
                <div class="flex items-center px-4 py-4 sm:px-6">
                    <div class="min-w-0 flex-1 flex items-center">
                        <div class="flex-shrink-0">
                            <img class="h-12 w-12 rounded-full" src="{{$member->user->image}}" alt=""/>
                        </div>
                        <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                            <div>
                                <div
                                    class="leading-5 font-bold text-lg text-gray-600 truncate">{{$member->user->name}}</div>

                                <div class="mt-2 flex items-center text-sm leading-5 text-indigo-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>                                    <span class="truncate text-gray-400">   {{$member->rule}}    </span>
                                </div>
                                <div class="mt-2 flex items-center text-md leading-5 text-gray-500">
                                    <span
                                        class="truncate text-gray-400 font-bold"> رقم التحويلة : {{$member->user->employee_ext}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>

                        {{-- remove member --}}
                        @if((auth()->user()->id == $project->user_id) || (auth()->user()->id == $project->leader_id))
                            <div x-data="{ open: false }" class="relative inline-block z-40">
{{--                                <button wire:click="updatedRole({{$member->user_id}})"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></button>--}}
                                <button @click="open = true" class="focus:outline-none">
                                    <svg class="h-6 w-6 text-gray-400 hover:text-gray-500" fill="currentColor"
                                         viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                              d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                </button>

                                <div x-show="open" @click.away="open = false"
                                     class="origin-top-right absolute left-0 mt-2 w-56 rounded-md shadow-lg">
                                    <div class="rounded-md bg-white shadow-xs p-3 text-sm text-gray-500 leading-8">
                                        هل تريد بالتأكيد إزالة العضو من هذا المشروع ؟

                                        <button wire:click="removeMember({{$member->id}})" type="button"
                                                class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs leading-4 font-medium rounded text-white bg-red-600 hover:bg-red-500 focus:outline-none transition ease-in-out duration-150">
                                            نعم، تأكيد الحذف
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
            @else
                <div class="bg-white mb-1">
                    <div class="flex items-center px-4 py-4 sm:px-6">
                        <div class="min-w-0 flex-1 flex items-center">
                            <div class="flex-shrink-0">
                                <img class="h-12 w-12 rounded-full" src="{{$member->user->image}}" alt=""/>
                            </div>
                            <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                                <div>
                                    <div
                                        class="leading-5 font-bold text-lg text-gray-600 truncate">{{$member->user->name}}</div>

                                    <div class="mt-2 flex items-center text-sm leading-5 text-gray-800">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>                                        <span class="truncate text-gray-400">   {{$member->rule}}    </span>
                                    </div>
                                    <div class="mt-2 flex items-center text-md leading-5 text-gray-500">
                                    <span
                                        class="truncate text-gray-400 font-bold"> رقم التحويلة : {{$member->user->employee_ext}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>

                            {{-- remove member --}}
                            @if((auth()->user()->id == $project->user_id) || (auth()->user()->id == $project->leader_id))
                                <div x-data="{ open: false }" class="relative inline-block z-40">
                                    {{--                                <button wire:click="updatedRole({{$member->user_id}})"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></button>--}}
                                    <button @click="open = true" class="focus:outline-none">
                                        <svg class="h-6 w-6 text-gray-400 hover:text-gray-500" fill="currentColor"
                                             viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                  d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                  clip-rule="evenodd"></path>
                                        </svg>
                                    </button>

                                    <div x-show="open" @click.away="open = false"
                                         class="origin-top-right absolute left-0 mt-2 w-56 rounded-md shadow-lg">
                                        <div class="rounded-md bg-white shadow-xs p-3 text-sm text-gray-500 leading-8">
                                            هل تريد بالتأكيد إزالة العضو من هذا المشروع ؟

                                            <button wire:click="removeMember({{$member->id}})" type="button"
                                                    class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs leading-4 font-medium rounded text-white bg-red-600 hover:bg-red-500 focus:outline-none transition ease-in-out duration-150">
                                                نعم، تأكيد الحذف
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</x-project-page>
