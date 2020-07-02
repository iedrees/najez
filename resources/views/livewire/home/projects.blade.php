<div class="my-10 container mx-auto">
    @if(count($items))
        @foreach($items as $project)
            <div class="bg-white shadow-smx overflow-hidden sm:rounded-sm mb-2 p-px">
                <a href="{{route('projects.show', $project->id)}}" class="block hover:bg-{{data_get($project, 'color', 'teal')}}-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 py-5 rounded-r-sm  p-2 bg-{{data_get($project, 'color', 'gray')}}-50  border-l-2  border-{{data_get($project, 'color', 'teal')}}-100">
                            <img class="w-20 h-20 p-2 rounded-r opacity-75" src="{{data_get($project, 'image', asset('images/021-efficiency.svg'))}}  " alt="" />
                        </div>
                        <div class="min-w-0 px-5 py-5 flex-1 sm:flex sm:items-center sm:justify-between ">
                            <div>
                            <div class="font-medium text-gray-700 truncate">
                                <b class="text-2xl"> {{$project->name}} </b>
                            </div>
                            <div class="mt-3 flex">
                                <div class="flex overflow-hidden">
                                <img class="inline-block h-8 w-8 rounded-full text-white shadow-solid" src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                                <img class="-mr-0.5 inline-block h-8 w-8 rounded-full text-white shadow-solid" src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                                <img class="-mr-0.5 inline-block h-8 w-8 rounded-full text-white shadow-solid" src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.25&w=256&h=256&q=80" alt="" />
                                <img class="-mr-0.5 inline-block h-8 w-8 rounded-full text-white shadow-solid" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                                </div>
                            </div>
                            </div>
                            <div class="mt-4 pl-5 flex-shrink-0 sm:mt-0">
                            <div class="flex items-center overflow-hidden text-2xl text-gray-700">
                                <span class="text-gray-500 mx-1"> 63   </span> 
                                <span class="text-gray-200 mx-1">/</span>
                                <b class="text-green-300"> 234 </b> 
                                <i class="ti-check-box text-sm text-green-300 inline-block -mt-1.5 mr-2"></i>
                            </div>
                            </div>
                        </div>
                        {{-- <div class="ml-5 flex-shrink-0">
                            <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                        </div> --}}
                    </div>
                </a>
            </div>
        @endforeach
    @else 
            <div>   
                No projects ..
            </div>
    @endif
</div>
 
