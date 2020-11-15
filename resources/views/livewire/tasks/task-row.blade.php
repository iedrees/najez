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
                                @if((auth()->user()->id == $task->user_id) || (auth()->user()->id==$task->project->leader_id) ||(auth()->user()->id==$task->project->user_id))
                                    <div class="bg-gray-50 text-sm text-gray-600 p-1 rounded border border-gray-200">

                                        <div class="mb-3 flex rounded shadow-sm bg-gray-200 p-1">
                                            <div class="relative flex-grow focus-within:z-10">
                                    <textarea id="task"
                                              wire:model.lazy="taskContent"
                                              class="p-3 block w-full rounded-none rounded-r transition ease-in-out duration-150 text-gray-500 border-2 border-white focus:border-indigo-300  focus:outline-none"
                                              placeholder=""> {!! nl2br($task->task) !!}
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
                                        <div class="flex items-center p-1 rounded px-2 my-px ">
                                            <div class="relative focus-within:z-10">
                                                <b>  من  </b>
                                                <x-fields.text wire:model.lazy="start_date" id="start_date"
                                                               {{--                                                               value=" {{Carbon\Carbon::parse($end_date)->format('d , M, Y')}}"--}}
                                                               type="date"></x-fields.text>
                                            </div>
                                            <div class="relative focus-within:z-10">
                                                <b> إلى  </b>
                                                <x-fields.text wire:model.lazy="end_date" id="end_date"
                                                               {{--                                                               value=" {{Carbon\Carbon::parse($end_date)->format('d , M, Y')}}"--}}
                                                               type="date"></x-fields.text>
                                            </div>
                                        </div>
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

                                        <div class="mx-3 -mb-2">
                                            <button wire:click="update" type="button"
                                                    class="inline-flex items-center justify-center py-1 px-4 border border-transparent text-sm leading-5 font-medium rounded-sm text-blue-700 bg-indigo-100 hover:bg-indigo-50 focus:outline-none focus:border-indigo-300 focus:shadow-outline-indigo active:bg-indigo-200 transition ease-in-out duration-150">
                                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                          d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                          clip-rule="evenodd"></path>
                                                </svg>
                                                حفظ
                                            </button>
                                        </div>
                                    </div>
                                    <br>
                                    <div x-data="{showComment:false}">
                                        <div>
                                            <form class="my-4 flex" wire:submit.prevent="comment">
                                                        <textarea id="comment"
                                                                  wire:model.debounce.500ms="comment"
                                                                  wire:keydown.enter="comment"
                                                                  class="block w-full rounded-none rounded-r border-gray-300 ease-in-out duration-150 text-gray-500 border-2 border-white focus:border-indigo-300  focus:outline-none"
                                                                  placeholder="اضف تعليقك ..">
                                                        </textarea>
                                                <button wire:click="comment" type="button"
                                                        class="inline-flex items-center justify-center py-1 px-4 rounded-none rounded-r border-gray-300 ease-in-out duration-150 text-gray-500 border-2 border-white text-blue-700 bg-white-100 hover:bg-white-50 focus:outline-none focus:border-gray-500 focus:shadow-outline-white active:bg-white-200 transition ease-in-out duration-150">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              stroke-width="2"
                                                              d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                        <div @click="showComment = !showComment"
                                             x-on:keydown.escape="showComment = false">
                                            <span class="flex items-center">
                                                <button
                                                    class="inline-flex items-center justify-center py-1 px-4 border border-transparent text-sm leading-5 font-medium rounded-sm text-blue-700 bg-white-100 hover:bg-white-50 focus:outline-none focus:border-white-300 focus:shadow-outline-white active:bg-white-200 transition ease-in-out duration-150">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 13l-7 7-7-7m14-8l-7 7-7-7"></path></svg></button></span>
                                        </div>


                                        <div x-show="showComment" class="rounded-md inset-0 overflow-hidden ">
                                            @foreach($comments as $comment)
                                                <div
                                                    class="rounded-md border border-gray-500 shadow p-3 my-2 bg-gray-50">
                                                    <div class="flex justify-between my-2">
                                                        <div class="flex">
{{--                                                            <img--}}
{{--                                                                class="-mr-0.5 inline-block h-8 w-8 rounded-full text-white shadow-solid"--}}
{{--                                                                src="{{$comment->commented->image}}" title="{{$comment->commented->name}}"--}}
{{--                                                                alt="{{$comment->commented->name}}"--}}
{{--                                                            />--}}
                                                            <p class="font-bold text-lg">{{$comment->commented->name}}</p>
                                                            <br>
                                                            <p class="mx-3 py-1 text-xs text-gray-500 font-semibold">{{$comment->created_at->diffForHumans()}}
                                                            </p>
                                                        </div>
                                                        <i class="fas fa-times text-red-200 hover:text-red-600 cursor-pointer"
                                                           wire:click="remove({{$comment->id}})"></i>
                                                    </div>
                                                    <p class="text-gray-800">{{$comment->comment}}</p>
                                                    @if($comment->image)
                                                        <img src="{{$comment->imagePath}}"/>
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
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
        </div>
        </section>
    </div>
</div>
</div>

