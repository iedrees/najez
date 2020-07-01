<div>
    @if(count($tasks))

    <div class="">
        <h4 class="border-b-2 border-gray-700 p-3 mb-5 text-gray-700 font-bold"> تاسكاتي </h4>
        @foreach($tasks as $task)
            <div class="bg-white mb-1 border-gray-200 shadow-sm p-4 rounded text-gray-700 cursor-pointer hover:bg-gray-50 hover:border-blue-200">
                {{$task->task}}
            </div>
        @endforeach
    </div>

    @else 
        <div>   
            No Tasks yet ..
        </div>
    @endif
 </div>
