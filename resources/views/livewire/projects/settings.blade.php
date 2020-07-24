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
                <img src="{{$image ? $image->temporaryUrl() : auth()->user()->image}}"
                     class=" cursor-pointer hover:opacity-75 inline-block h-32 w-32 rounded text-white shadow-solid"/>
                <input wire:model="image" id="image" accept="image/*" type="file" wire:change="$emit(loadFile)"
                       class="hidden">
            </label>
        </x-fields.wrapper>

        <div class="text-left mt-2">
            <button type="submit"
                    class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-sm text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                <i class="ti-check ml-2"></i>
                حفظ
            </button>
        </div>
    </form>


</x-project-page>

