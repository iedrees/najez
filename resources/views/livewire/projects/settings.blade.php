<x-project-page :project="$project">

    <form wire:submit.prevent="submit" enctype="multipart/form-data">
        <x-fields.wrapper label="اسم المشروع" for="item.name" :error="$errors->first('item.name')">
            <x-fields.text wire:model.lazy="item.name" id="item.name" rules="required"/>
        </x-fields.wrapper>

        <x-fields.wrapper label="حالةالمشروع" for="item.status" :error="$errors->first('item.status')">
            <x-fields.text wire:model.lazy="item.status" id="item.status" rules="required"/>
        </x-fields.wrapper>

        <x-fields.wrapper label="تفاصيل المشروع " for="item.details" :error="$errors->first('item.details')">
            <x-fields.text wire:model.lazy="item.details" id="item.details" rules="required"/>
        </x-fields.wrapper>

        <x-fields.wrapper label="موعد تسليم المشروع " for="item.deadline" :error="$errors->first('item.deadline')">
            <x-fields.text wire:model.lazy="item.deadline" id="item.deadline" rules="required" type="date"/>
        </x-fields.wrapper>

        <x-fields.wrapper label="شعار المشروع" for="item.image" :error="$errors->first('image')">
            <label for="image">
                <img src="{{$image ? $image->temporaryUrl() : $project->image}}"
                     class=" cursor-pointer hover:opacity-75 inline-block h-32 w-32 rounded text-white shadow-solid"/>
                <input wire:model="image" id="image" accept="image/*" type="file" wire:change="$emit(loadFile)"
                       class="hidden">
            </label>
        </x-fields.wrapper>
        <div class="rounded-t mb-0 px-6 py-6">
            <div class="text-center mb-3">
                <div class="btn-wrapper text-left">
                    @if(auth()->user()->id == $project->user_id)
                        <div x-data="{ open: false }" class="relative inline-block z-40">
                            <span class="flex w-full rounded-md shadow-sm mt-2">
                   <button @click="open = true" type="button"
                           class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-sm text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6 text-white-400" fill="currentColor" viewBox="0 0 20 20"><path
                             fill-rule="evenodd"
                             d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                             clip-rule="evenodd"></path></svg>
                             حذف المشروع</button></span>
                            <div x-show="open" @click.away="open = false"
                                 class="origin-top-right absolute left-0 mt-2 w-56 rounded-md shadow-lg">
                                <div class="rounded-md bg-white shadow-xs p-3 text-sm text-gray-500 leading-8">
                                    هل تريد بالتأكيد إزالة هذا المشروع ؟
                                    <button wire:click="removeProject({{$project->id}})" type="button"
                                            class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs leading-4 font-medium rounded text-white bg-red-600 hover:bg-red-500 focus:outline-none transition ease-in-out duration-150">
                                        نعم، تأكيد الحذف
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif
                    <button type="submit"
                            class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-sm text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                        <i class="ti-check ml-2"></i>
                        حفظ
                    </button>
                </div>
            </div>

        </div>
    </form>


</x-project-page>

