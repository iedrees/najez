<div>
    
    <div class="my-10 container mx-auto">
        <div class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3 px-3 sm:px-0">
            @if(auth()->user()->projects->count())
                <livewire:reports.week-widget />
            @endif

            <livewire:tasks.my-tasks-widget />
        </div>
    </div>
    
    <livewire:home.projects  />
</div>
