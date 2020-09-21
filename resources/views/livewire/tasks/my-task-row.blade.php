<div x-data="{showDetail:false}" >

    <div class="flex items-start text-gray-600">
        <div class="p-2 bg-gray-200 rounded-r">
            <input
                @if($task->done) checked  @endif
                id="done"
                wire:change="checkTask()"
                type="checkbox"
                class="form-checkbox cursor-pointer hover:opacity-75 border border-gray-100 h-8 w-8 text-indigo-600 bg-gray-200 transition duration-150 ease-in-out focus:shadow-outline-none">
        </div>
        <div @click="showDetail = !showDetail" x-on:keydown.escape="showDetail = false" class=" bg-white w-full mb-1 border-gray-200 shadow-sm p-4 rounded  cursor-pointer hover:bg-gray-50 hover:border-blue-200">
            
            <span class="flex items-start">
                <div class="flex-grow">
                    <div class="text-xs mb-2 text-indigo-600">{{data_get($task , 'project.name')}}</div>
                    <span class="@if($task->done) line-through text-gray-400 @endif">{{$task->task}}</span>
                </div>
             
                <div>
                    <div class="p-1 inline-block px-1 text-sm text-gray-300 flex items-center">
                        <span dir="ltr" class="text-xs" title="{{$task->created_at}}">{{$task->created_at->diffForHumans()}}</span>
                    </div>
                    <div class="inline-flex items-center rounded-md border border-green-300 px-1 py-1 bg-green-100 text-green-500 text-sm leading-4">
                        <svg class="h-4 w-4 " fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M9 3a1 1 0 012 0v5.5a.5.5 0 001 0V4a1 1 0 112 0v4.5a.5.5 0 001 0V6a1 1 0 112 0v5a7 7 0 11-14 0V9a1 1 0 012 0v2.5a.5.5 0 001 0V4a1 1 0 012 0v4.5a.5.5 0 001 0V3z" clip-rule="evenodd"></path></svg>
                       <div class="mx-1 -mb-1">
                           {{$task->assignedUser->name}}
                       </div>
                       
                    </div>
                </div>
              
            </span>

        </div>
    </div>


    <div x-show="showDetail" class="fixed inset-0 overflow-hidden ">
        <div class="absolute inset-0 overflow-hidden">
        <div class="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

            <section class="absolute inset-y-0 right-0 max-w-full flex"  @click.away="showDetail = false">
                <div class="w-screen max-w-md">
                    <div class="h-full flex flex-col bg-white overflow-y-scroll">
                        <header class="p-4 sm:p-4 bg-indigo-50">
                            <div class="flex items-center justify-between space-x-3">
                                <h2 class="text font-medium text-gray-700">
                                    تفاصيل المهمة
                                </h2>
                                <button @click="showDetail= false" aria-label="Close panel" class="text-gray-400 hover:text-gray-500 focus:outline-none transition ease-in-out duration-150">
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>

                            </div>
                        </header>
                        <div class="relative flex-1 p-1 ">
                            <div>
                                <div class="text-gray-700 bg-gray-50 p-3 rounded leading-8 text-sm">
                                    {!! nl2br($task->task) !!}
                                </div>
                            </div>
 
                            <div class="mt-1">
                                @foreach($task->activities as $activity)
                                    <div class="bg-blue-50 p-2 mb-0.5 text-gray-600">
                                        <div class="flex justify-between">
                                            <span>
                                                <img class="inline-block h-5 w-5 rounded-full" src="{{$activity->causer->image}}" alt="" />
                                                <span class="text-sm">{{$activity->causer->name}}</span>
                                            </span>
                                            <span class="p-1 inline-block px-1 text-sm text-gray-300 flex items-center">
                                                <span dir="ltr" class="text-xs" title="{{$activity->created_at}}">{{$activity->created_at->diffForHumans()}}</span>
                                            </span>
                                        </div>

                                        <div class="text-sm">
                                            {{$activity->description}}
                                        </div>
                                    </div>
                                @endforeach
                            </div>


                        </div>

                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
