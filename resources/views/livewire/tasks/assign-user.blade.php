{{-- Search  --}}
<div x-data="{open:false}" class="relative block mb-5" x-on:click.away="open = false">
    <div class="relative rounded shadow-sm bg-gray-200 p-1">
        <input x-on:focus="open = true" wire:model="search" type="text" placeholder="ابحث عن عضو لتعيين المهة له .." class="p-3 pr-10 block w-full rounded-none rounded transition ease-in-out duration-150 text-gray-500 border-2 border-white focus:border-indigo-300  focus:outline-none"  />
        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
            <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
        </div>
    </div>

    <div x-show="open" class="origin-top-right absolute right-0 mt-1 w-56 rounded-md shadow-sm w-full">
        <div class="rounded-b-md bg-white shadow">
            <div class="" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                @if(!count($project->members))
                    <div class="p-2 px-3 text-gray-600 text-sm">
                        لا توجد نتائج .. 
                    </div>
                @else
                    @foreach($project->members as $member)
                        <div class="flex items-center text-gray-700 p-3 border-b border-gray-100">
                            <img class="h-8 w-8 rounded-sm" src="{{$member->user->image}}" alt="" />
                            <div class="mx-2 flex-grow">
                                <h4 class="text-sm">{{ $member->user->name }}</h4>
                            </div>
                            @if($member->user->id != $task->assigned_user_id)
                                <div>
                                    <button x-on:click="open = false" wire:click="assignMember({{$member->user}}, {{$task}})" type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-blue-700 bg-indigo-100 hover:bg-indigo-50 focus:outline-none focus:border-indigo-300 focus:shadow-outline-indigo active:bg-indigo-200 transition ease-in-out duration-150">
                                        <svg class="-mr-0.5 ml-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20"><path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"></path></svg>
                                        تعيين
                                    </button>
                                </div>
                            @endif
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
