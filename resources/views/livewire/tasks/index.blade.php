<div>
    @if(count($tasks))
        @foreach($tasks as $task)
            <div class="bg-white mb-px border-2 border-gray-200 p-4 rounded text-gray-700 cursor-pointer hover:bg-gray-50 hover:border-blue-200">
                {{$task->task}}
            </div>
        @endforeach
    @else 
        <div>   
            No Tasks yet ..
        </div>
    @endif
 </div>
