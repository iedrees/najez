
<div>
    <div class="bg-white shadow-sm overflow-hidden border-t-2 border-{{data_get($project, 'color', 'gray')}}-200">
        <div class=" container mx-auto">
            <div class="block focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                <div class="flex items-center">
                    <div class="flex-shrink-0 py-5 p-2 bg-gray-50">
                        <img class="w-20 h-20 p-2 rounded-r opacity-75" src="{{data_get($project, 'image', asset('images/021-efficiency.svg'))}}  " alt="" />
                    </div>
                    <div class="min-w-0 px-5 py-5 flex-1 sm:flex sm:items-center sm:justify-between ">
                        <div>
                            <div class="font-medium text-gray-800 truncate">
                                <b class="text-2xl"> {{$project->name}} </b>
                            </div>
                            <div class="mt-3 flex">
                                <div class="flex overflow-hidden">
                                    <img class="inline-block h-8 w-8 rounded-full text-white shadow-solid" src="{{$project->user->image}}" title="{{$project->user->name}}" alt="{{$project->user->name}}" />
                                    @foreach ($project->members as $member)
                                        <img class="-mr-0.5 inline-block h-8 w-8 rounded-full text-white shadow-solid" src="{{$member->user->image}}" title="{{$member->user->name}}" alt="{{$member->user->name}}" />
                                    @endforeach
                                    <a href="{{route('projects.members', $project->id)}}" class="inline-flex items-center p-px px-1.5 mx-2 rounded bg-gray-100 text-gray-700 bg-white hover:bg-gray-200 focus:outline-none transition ease-in-out duration-150">
                                        <svg class="h-5 w-5 text-gray-500"  fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"></path></svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="border-t shadow-sm border-gray-100 border-dottedx bg-white">
        <div class="container mx-auto pt-1">
            <div class="">
                <div class="">
                    <nav class="flex -mb-px">
                        <a href="{{route('projects.show', $project->id)}}" class="@if(request()->route()->getName() == 'projects.show')  border-indigo-800 font-bold text-indigo-800   @endif -mb-px text-gray-400 hover:text-indigo-700 border-transparent border-b-2 group inline-flex items-center py-4 px-1  font-medium text-sm leading-5 focus:outline-none">
                            <svg class="ml-2 h-5 w-5 text-gray-400 @if(request()->route()->getName() == 'projects.show')  text-indigo-800   @endif group-hover:text-indigo-800" fill="currentColor" viewBox="0 0 20 20"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                            <span> المهام </span>
                        </a>
                        <a href="{{route('projects.members', $project->id)}}" class="@if(request()->route()->getName() == 'projects.members')  border-indigo-800 font-bold text-indigo-800   @endif hover:text-indigo-800 -mb-px text-gray-400 mx-px px-4 group inline-flex items-center py-4 px-1 border-b-2 border-transparent font-medium text-sm leading-5    focus:outline-none  ">
                            <svg class="ml-2 h-5 w-5 text-gray-400 @if(request()->route()->getName() == 'projects.members')  text-indigo-800   @endif group-hover:text-indigo-800" fill="currentColor" viewBox="0 0 20 20"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path></svg>
                            <span> الفريق </span>
                        </a>
                        <a href="{{route('projects.settings', $project->id)}}" class="@if(request()->route()->getName() == 'projects.settings')  border-indigo-800 font-bold text-indigo-800   @endif hover:text-indigo-800 -mb-px text-gray-400 mx-px px-4 group inline-flex items-center py-4 px-1 border-b-2 border-transparent font-medium text-sm leading-5    focus:outline-none  ">
                            <svg class="ml-2 h-5 w-5 text-gray-400 group-hover:text-indigo-800 @if(request()->route()->getName() == 'projects.settings')  text-indigo-800   @endif " fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path></svg>
                            <span> الإعدادات </span>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </div>
  
    <div class="min-h-screen">
        <div class="container mx-auto py-6">

            @if (session()->has('message'))
                <x-alert class="" :color="session('color')">
                    {{ session('message') }}
                </x-alert>
            @endif

            {{$slot}}
        </div>
    </div>
</div>