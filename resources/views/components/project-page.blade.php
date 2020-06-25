
<div>
 
    <div class="bg-white shadow-sm overflow-hidden border-t-2 border-dotted border-gray-100X border-{{data_get($project, 'color', 'gray')}}-200">

        <div class=" container mx-auto">
            <div class="block focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                <div class="flex items-center">
                    <div class="flex-shrink-0 py-5 p-2 bg-{{data_get($project, 'color', 'teal')}}-50">
                        <img class="w-20 h-20 p-2 rounded-r opacity-75" src="{{data_get($project, 'image', asset('images/021-efficiency.svg'))}}  " alt="" />
                    </div>
                    <div class="min-w-0 px-5 py-5 flex-1 sm:flex sm:items-center sm:justify-between ">
                        <div>
                            <div class="font-medium text-gray-800 truncate">
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
                        {{-- <div class="mt-4 pl-5 flex-shrink-0 sm:mt-0">
                            <div class="flex overflow-hidden text-2xl">
                                <span class="text-gray-500"> 3 / </span> <b> 234 </b>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
 
        </div>
    
    </div>


    <div class="border-t-2 border-gray-100 border-dottedx bg-gray-50">
        <div class="container mx-auto pt-1">
            <div class="">
                <div class="">
                    <nav class="flex -mb-px">
                        <a href="#" class="group inline-flex items-center py-4 px-1 border-b-2 border-transparent font-medium text-sm leading-5 text-gray-600 border-b-2 border-gray-600 font-bold focus:outline-none">
                            <svg class="ml-2 h-5 w-5 text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                            </svg>
                            <span> المهام </span>
                        </a>
                        <a href="#" class="mx-px px-4 group inline-flex items-center py-4 px-1 border-b-2 border-transparent font-medium text-sm leading-5 text-gray-500 hover:text-gray-700   focus:outline-none focus:text-gray-700 focus:border-gray-300">
                            <svg class="ml-2 h-5 w-5 text-gray-500 group-hover:text-gray-700 group-focus:text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd"/>
                            </svg>
                            <span> التفاصيل </span>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </div>
{{-- 
    <div class="border-t-2 border-{{data_get($project, 'color', 'teal')}}-100 border-dottedx bg-{{data_get($project, 'color', 'teal')}}-50">
        <div class="container mx-auto pt-1">
            <div class="">
                <div class="">
                    <nav class="flex -mb-px">
                    <a href="#" class="group inline-flex items-center py-4 px-1 border-b-2 border-transparent font-medium text-sm leading-5 text-{{data_get($project, 'color', 'gray')}}-600 border-b-2 border-{{data_get($project, 'color', 'gray')}}-600 font-bold focus:outline-none">
                        <svg class="ml-2 h-5 w-5 text-{{data_get($project, 'color', 'gray')}}-600" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                        </svg>
                        <span> المهام </span>
                    </a>
                    <a href="#" class="mx-px px-4 group inline-flex items-center py-4 px-1 border-b-2 border-transparent font-medium text-sm leading-5 text-{{data_get($project, 'color', 'teal')}}-500 hover:text-{{data_get($project, 'color', 'teal')}}-700   focus:outline-none focus:text-gray-700 focus:border-gray-300">
                        <svg class="ml-2 h-5 w-5 text-{{data_get($project, 'color', 'teal')}}-500 group-hover:text-{{data_get($project, 'color', 'teal')}}-700 group-focus:text-{{data_get($project, 'color', 'teal')}}-600" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd"/>
                        </svg>
                        <span> التفاصيل </span>
                    </a>
    
                    </nav>
                </div>
            </div>
        </div>
    </div> --}}


    <div class="min-h-screen">
        <div class="container mx-auto py-6">
            {{$slot}}
        </div>
    </div>
</div>