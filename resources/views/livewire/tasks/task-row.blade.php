<div x-data="{showDetail:false}">

    <div class="flex items-center text-gray-600">
        <div class="p-2 bg-gray-200 rounded-r">
            <input
                @if($task->done) checked @endif
            id="done"
                wire:change="checkTask()"
                type="checkbox"
                class="form-checkbox cursor-pointer hover:opacity-75 border border-gray-100 h-8 w-8 text-indigo-600 bg-gray-200 transition duration-150 ease-in-out focus:shadow-outline-none">
        </div>
        <div @click="showDetail = !showDetail" x-on:keydown.escape="showDetail = false"
             class="@if($task->done) line-through text-gray-400 @endif bg-white w-full mb-1 border-gray-200 shadow-sm p-4 rounded  cursor-pointer hover:bg-gray-50 hover:border-blue-200">

            <span class="flex items-center">
                <span class="flex-grow">{{$task->task}}</span>
                <div
                    class="inline-flex items-center rounded-md border border-green-300 px-1 py-1 bg-green-100 text-green-500 text-sm leading-4">
                    <svg class="h-4 w-4 " fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd"
                                                                                        d="M9 3a1 1 0 012 0v5.5a.5.5 0 001 0V4a1 1 0 112 0v4.5a.5.5 0 001 0V6a1 1 0 112 0v5a7 7 0 11-14 0V9a1 1 0 012 0v2.5a.5.5 0 001 0V4a1 1 0 012 0v4.5a.5.5 0 001 0V3z"
                                                                                        clip-rule="evenodd"></path></svg>
                   <div class="mx-1 -mb-1">
                       {{$task->assignedUser->name}}
                   </div>
                </div>
            </span>

        </div>
    </div>

    <div x-show="showDetail" class="fixed inset-0 overflow-hidden ">
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

            <section class="absolute inset-y-0 right-0 max-w-full flex" @click.away="showDetail = false">
                <div class="w-screen max-w-md">
                    <div class="h-full flex flex-col bg-white overflow-y-scroll">
                        <header class="p-4 sm:p-4 bg-indigo-50">
                            <div class="flex items-center justify-between space-x-3">
                                <h2 class="text font-medium text-gray-700">
                                    معلومات المهمة
                                </h2>
                                <button @click="showDetail= false" aria-label="Close panel"
                                        class="text-gray-400 hover:text-gray-500 focus:outline-none transition ease-in-out duration-150">
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>

                            </div>
                        </header>
                        <div class="relative flex-1 p-1 ">
                            <div>
                                @if(auth()->user()->id == $task->user_id)
                                    <div class="mb-3 flex rounded shadow-sm bg-gray-200 p-1">
                                        <div class="relative flex-grow focus-within:z-10">
                                    <textarea id="task"
                                              wire:model.lazy="taskContent"
                                              class="p-3 block w-full rounded-none rounded-r transition ease-in-out duration-150 text-gray-500 border-2 border-white focus:border-indigo-300  focus:outline-none"
                                              placeholder=""> {!! nl2br($task->task) !!}
                                    </textarea>
                                        </div>
                                        <button wire:click="update"
                                                class="relative inline-flex items-center px-4 py-2 border-gray-300 text-sm leading-5 font-medium rounded-l text-gray-700 bg-indigo-400 hover:text-gray-500 hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500 focus:shadow-outline-blue focus:border-white active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                                            <svg class="h-8 w-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                      d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                      clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="bg-gray-50 text-sm text-gray-600 p-1 rounded border border-gray-200">

                                        <h2 class="text font-medium text-gray-700">
                                            تفاصيل المهمة
                                        </h2>
                                        <br>
                                        <div class="mb-3 flex rounded shadow-sm bg-gray-200 p-1">
                                            <div class="relative flex-grow focus-within:z-10">
                                    <textarea id="details"
                                              wire:model.lazy="details"
                                              class="p-3 block w-full rounded-none rounded-r transition ease-in-out duration-150 text-gray-500 border-2 border-white focus:border-indigo-300  focus:outline-none"
                                              placeholder="اضف ملاحظه">
                                        {!! nl2br($task->details) !!}
                                    </textarea>
                                            </div>

                                        </div>
                                        @else
                                            <div class="text-gray-700 bg-gray-50 p-3 rounded leading-8 text-sm">
                                                {!! nl2br($task->task) !!}
                                            </div>
                                        @endif

                                        <h2 class="text font-medium text-gray-700">
                                            فترة المهمة
                                        </h2>
                                        <div class="flex items-center bg-gray-50 p-1 rounded px-2 my-px ">
                                            @if((isset($task->start_date))&&(isset($task->end_date)))
                                                <div class="mx-1">
                                                    <span>  من </span>
                                                    <b class=" text-sm text-gray-600 p-1 "
                                                       dir="ltr">({{Carbon\Carbon::parse($end_date)->format('d M, Y')}}
                                                        )</b>
                                                    <span class="mx-1 ">إلى</span>
                                                    <b class=" text-sm text-gray-600 p-1 "
                                                       dir="ltr">({{Carbon\Carbon::parse($end_date)->format('d M, Y')}}
                                                        )</b>
                                                </div>

                                            @else
                                                <div>
                                                    <div class=" flex rounded-md shadow-sm tab-pane fade" id="single"
                                                         role="tabpanel" aria-labelledby="single-tab">
                                                        <div class="relative focus-within:z-10">
                                                            <input id="start_date" type="date" wire:model="start_date"
                                                                   class="form-input block w-full rounded-none rounded-r-md transition ease-in-out duration-150 sm:text-sm sm:leading-5"
                                                                   placeholder="dates">
                                                        </div>
                                                        <div
                                                            class="-mr-px relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-l-md text-gray-700 bg-gray-50 hover:text-gray-500 hover:bg-white focus:outline-none transition ease-in-out duration-150">
                                                            <input type="date" wire:model.lazy="end_date">
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <button wire:click="addingNote()"
                                                class=" btn-wrapper mr-3 rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none transition ease-in-out duration-150 sm:text-sm sm:leading-5 ">
                                            حفظ
                                        </button>
                                        <br>
                                    </div>
                                    <div class="flex items-center bg-gray-50 p-1 rounded px-2 my-px ">
                                        <div
                                            class="flex items-center -ml-px rounded-r-md border border-gray-300 px-2 py-2 bg-green-100 text-green-500 text-sm leading-5 h-8">
                                            <svg class="h-4 w-4 " fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                      d="M9 3a1 1 0 012 0v5.5a.5.5 0 001 0V4a1 1 0 112 0v4.5a.5.5 0 001 0V6a1 1 0 112 0v5a7 7 0 11-14 0V9a1 1 0 012 0v2.5a.5.5 0 001 0V4a1 1 0 012 0v4.5a.5.5 0 001 0V3z"
                                                      clip-rule="evenodd"></path>
                                            </svg>
                                            <div class="mx-1 -mb-1">
                                                {{$task->assignedUser->name}}
                                            </div>
                                        </div>

                                        <livewire:tasks.assign-user :task="$task" :project="$project"/>
                                        <livewire:tasks.delete-task :task="$task"/>
                                    </div>

                                    <div class="mt-2">
                                        @foreach($task->activities as $activity)
                                            <div class="bg-blue-50 p-2 mb-0.5 text-gray-600">
                                                <div class="flex justify-between">
                                            <span>
                                                <img class="inline-block h-5 w-5 rounded-full"
                                                     src="{{$activity->causer->image}}" alt=""/>
                                                <span class="text-sm">{{$activity->causer->name}}</span>
                                            </span>
                                                    <span
                                                        class="p-1 inline-block px-1 text-sm text-gray-300 flex items-center">
                                                <span dir="ltr" class="text-xs"
                                                      title="{{$activity->created_at}}">{{$activity->created_at->diffForHumans()}}</span>
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
