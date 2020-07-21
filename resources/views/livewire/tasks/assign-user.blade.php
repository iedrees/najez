{{-- Search  --}}

<div x-data="{open:false}" class="relative block" x-on:click.away="open = false">
 
    <span class="rounded-md shadow-sm relative inline">
        <button x-on:focus="open = true" type="button" class=" h-8 inline-flex justify-center  rounded-l-md border border-gray-300 px-2 py-1 bg-white text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none   transition ease-in-out duration-150" id="options-menu" aria-haspopup="true" aria-expanded="true">
          تعيين
          <svg class="-ml-1 mr-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg>
        </button>
    </span>
 
    <div x-show="open"  class="origin-top-right absolute left-0 mt-1 w-64 rounded-md shadow-sm w-full">
        <div class="rounded-b-md bg-white shadow w-sm w-64">
            <div class="" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                @if(!count($project->members))
                    <div class="p-2 px-3 text-gray-600 text-sm">
                        لا يوجد أعضاء فريق لهذا المشروع، أضف أعضاء للمشروع أولاً.
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
