<div>
    @if(count($tasks))
        <div class="">
            <h4 class="border-b-2 border-gray-700 p-3 mb-5 text-gray-700 font-bold"> تاسكاتي </h4>
    
            <livewire:tasks.quick-create :projectid="$projectid" />
 
            @foreach($tasks as $task)
                <livewire:tasks.task-row :task="$task" :key="$task->id" />
            @endforeach
        </div>

    @else 
        <div>   
            No Tasks yet ..
        </div>
    @endif
 </div>
 