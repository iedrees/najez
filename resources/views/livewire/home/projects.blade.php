<div class="my-10 container mx-auto">
    @if(count($items))
        @foreach($items as $project)
            @if(Auth::user()->id == $project->user_id)
{{--                @if(Auth::user()->id == $project->user_id || Auth::user()->id == $member->user_id)--}}
                <div class="bg-white shadow-smx overflow-hidden sm:rounded-sm mb-2 p-px">
                    <a href="{{route('projects.show', $project->id)}}"
                       class="block hover:bg-{{data_get($project, 'color', 'teal')}}-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                        <div class="flex items-center">
                            <div
                                class="flex-shrink-0 py-5 rounded-r-sm  p-2 bg-{{data_get($project, 'color', 'gray')}}-50  border-l-2  border-{{data_get($project, 'color', 'teal')}}-100">
                                <img class="w-20 h-20 p-2 rounded-r opacity-75"
                                     src="{{data_get($project, 'image')}}  " alt=""/>
                            </div>
                            <div class="min-w-0 px-5 py-5 flex-1 sm:flex sm:items-center sm:justify-between ">
                                <div>
                                    <div class="font-medium text-gray-700 truncate">
                                        <b class="text-2xl"> {{$project->name}} </b>

                                    </div>
                                    <div class="mt-3 flex flex-shrink">
                                        <div class="flex overflow-hidden">
                                            <img class="inline-block h-8 w-8 rounded-full text-white shadow-solid"
                                                 src="{{$project->user->image}}" title="{{$project->user->name}}"
                                                 alt="{{$project->user->name}}"/>
                                            @foreach ($project->members as $member)
                                                <img
                                                    class="-mr-0.5 inline-block h-8 w-8 rounded-full text-white shadow-solid"
                                                    src="{{$member->user->image}}" title="{{$member->user->name}}"
                                                    alt="{{$member->user->name}}"
                                                />
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 pl-5 flex-shrink-0 sm:mt-0">
                                    <div class="flex items-center overflow-hidden text-2xl text-gray-700">
                                        <p class="text-gray-500 mx-1">  {{$project->tasks_count}}</p>
                                        <span class="text-gray-200 mx-1">/</span>
                                        <b class="text-green-300"> {{$project->done_tasks_count}}  </b>
                                        <i class="ti-check-box text-sm text-green-300 inline-block -mt-1.5 mr-2"></i>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </a>
                </div>
            @endif
            @endforeach
            {{--        @endforeach--}}

            @else
                <div>
                    لا يوجد مشاريع
                </div>
            @endif

</div>

