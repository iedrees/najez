<div   class="flex items-center text-gray-600">
    <div class="p-2 bg-gray-200 rounded-r">
        <input 
            @if($task->done) checked  @endif 
            id="done" 
            wire:change="checkTask()"
            type="checkbox" 
            class="form-checkbox border border-gray-100 h-8 w-8 text-indigo-600 bg-gray-200 transition duration-150 ease-in-out focus:shadow-outline-none">
    </div>
    <div class="@if($task->done) line-through text-gray-400 @endif bg-white w-full mb-1 border-gray-200 shadow-sm p-4 rounded  cursor-pointer hover:bg-gray-50 hover:border-blue-200">
        {{$task->task}}
    </div>
</div>
