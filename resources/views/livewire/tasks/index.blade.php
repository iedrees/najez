<div>

    @if(count($tasks))
        <div>
            <livewire:tasks.quick-create :projectid="$projectid"/>

            <h4 class="border-b-2 border-gray-300 p-2 mb-5 text-gray-400 font-bold flex items-center">
                <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z"></path>
                </svg>
                <span class="mx-2">مهامي</span>
            </h4>

            @foreach($tasks as $task)
                <livewire:tasks.task-row :task="$task" :key="$task->id" :project="$project"/>
            @endforeach
        </div>
    @else
        <div>
            <div class="border border-blue-200 text-base my-3 bg-blue-50 text-blue-600 p-3 rounded">ابدء بكتابه المهام </div>
            <livewire:tasks.quick-create :projectid="$projectid"/>
        </div>
    @endif
</div>
