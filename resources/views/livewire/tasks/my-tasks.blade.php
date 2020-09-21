<div class="container mx-auto mt-10 mb-20">
    @if($tasks->count())
        <div>
            <h4 class="border-b-2 border-gray-300 p-2 mb-5 text-gray-400 font-bold flex justify-between">

                <div class="flex items-center">
                    <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z"></path>
                    </svg>
                    <span class="mx-2">  المهام المُسندة إلي  
                        <span class="bg-red-500 px-2 mx-1 py-1 rounded-sm text-white">
                            {{$myNotDoneTasksCount}}
                        </span>
                    </span>
                </div>

                <div class="flex items-center overflow-hidden text-2xl text-gray-700">
                    <p class="text-gray-500 mx-1">  {{$tasks->count()}}</p>
                    <span class="text-gray-200 mx-1">/</span>
                    <b class="text-green-300"> {{auth()->user()->allMyDoneTasks->count()}}  </b>
                    <i class="ti-check-box text-sm text-green-300 inline-block -mt-1.5 mr-2"></i>
                </div>
            </h4>

            <div>
                @foreach($tasks as $task)
                    <livewire:tasks.my-task-row :task="$task" :key="$task->id"/>
                @endforeach
            </div>
        </div>
    @else
        <div>
            ليس لديك أي مهمة. 
        </div>
    @endif
</div>
