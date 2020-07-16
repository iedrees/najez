<div x-data="{showDetail:false}" >

    <div class="flex items-center text-gray-600">
        <div class="p-2 bg-gray-200 rounded-r">
            <input 
                @if($task->done) checked  @endif 
                id="done" 
                wire:change="checkTask()"
                type="checkbox" 
                class="form-checkbox cursor-pointer hover:opacity-75 border border-gray-100 h-8 w-8 text-indigo-600 bg-gray-200 transition duration-150 ease-in-out focus:shadow-outline-none">
        </div>
        <div @click="showDetail = !showDetail" x-on:keydown.escape="showDetail = false" class="@if($task->done) line-through text-gray-400 @endif bg-white w-full mb-1 border-gray-200 shadow-sm p-4 rounded  cursor-pointer hover:bg-gray-50 hover:border-blue-200">
            {{$task->task}}
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
                            <span class="p-1 inline-block px-1 text-sm text-gray-300 flex items-center">
                                <b class="ml-2 text-gray-700 bg-gray-200 py-0.5 rounded-full inline-flex items-center">
                                    <img class="inline-block h-5 w-5 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                                    <span class="mx-2 text-sm">{{$task->user->name}}</span>
                                </b>
                                    
                                {{$task->created_at->diffForHumans()}} 
                                <span dir="ltr" class="mx-3 text-xs">{{$task->created_at}}</span>
                            </span>
                        </div>

                        <div>
                            @foreach($task->activities as $activity)
                                {{$activity->causer->name}} - 
                                {{$activity->description}}
                            @endforeach
                        </div>

                     
                    </div>
          

   
                
                </div>
                </div>
            </section>
        </div>
    </div>
</div>