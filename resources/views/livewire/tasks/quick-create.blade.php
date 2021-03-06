<div>
    <div class="mb-3 flex rounded shadow-sm bg-gray-200 p-1">
        <div class="relative flex-grow focus-within:z-10">
        <textarea id="task" 
            wire:model.lazy="task" 
            wire:keydown.enter="submit"
            class="p-3 block w-full rounded-none rounded-r transition ease-in-out duration-150 text-gray-500 border-2 border-white focus:border-indigo-300  focus:outline-none" 
            placeholder="أنشئ تاسك جديدة .. " >
        </textarea>
        </div>
        <button wire:click="submit" class="relative inline-flex items-center px-4 py-2 border-gray-300 text-sm leading-5 font-medium rounded-l text-gray-700 bg-indigo-400 hover:text-gray-500 hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500 focus:shadow-outline-blue focus:border-white active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
            <svg class="h-8 w-8 text-white" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
        </button>
    </div>
</div>
