<div class="btn-wrapper mr-3">
    @if(auth()->user()->id == $task->user_id)
        <div x-data="{ open: false }" class="relative inline-block z-40">
            <button @click="open = true" type="button"
                    class="inline-flex items-center justify-center py-1 px-4 border border-transparent text-sm leading-5 font-medium rounded-sm text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                <i class="ti-close ml-2"></i>
                حذف
            </button>
            <div x-show="open" @click.away="open = false"
                    class="origin-top-right absolute left-0 mt-2 w-56 rounded-md shadow-lg">
                <div class="rounded-md bg-white shadow-xs p-3 text-sm text-gray-500 leading-8">
                    هل تريد بالتأكيد حذف هذه المهمة ؟
                    <button wire:click="removeTask()" type="button"
                            class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs leading-4 font-medium rounded text-white bg-red-600 hover:bg-red-500 focus:outline-none transition ease-in-out duration-150">
                        نعم، تأكيد الحذف
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
 
