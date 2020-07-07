<div>
    <div class="mb-3 flex rounded shadow-sm bg-gray-200 p-1">
        <div class="relative flex-grow focus-within:z-10">
        <textarea id="project_name"
                  wire:model.lazy="project_name"
                  wire:keydown.enter="submit"
                  class="p-3 block w-full rounded-none rounded-r transition ease-in-out duration-150 text-gray-500 border-2 border-white focus:border-indigo-300  focus:outline-none"
                  placeholder="أنشئ مشروع جديدة .. " >
        </textarea>
        </div>
    </div>
</div>
