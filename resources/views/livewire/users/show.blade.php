<div class="container mx-auto my-6 px-3 sm:px-0">

    @if (session()->has('message'))
        <x-alert :color="session('color')">
            {{ session('message') }}
        </x-alert>
    @endif

    <form wire:submit.prevent="update" enctype="multipart/form-data">
        <x-fields.wrapper label="الاسم" for="user.name" :error="$errors->first('user.name')">
            <x-fields.text wire:model.lazy="user.name" id="user.name" rules="required"/>
        </x-fields.wrapper>

        <x-fields.wrapper label="اسم المستخدم" for="user.username" :error="$errors->first('user.username')">
            <x-fields.text wire:model.lazy="user.username" id="user.username" rules="required"/>
        </x-fields.wrapper>

        <x-fields.wrapper label="البريد الإلكتروني" for="user.email" :error="$errors->first('user.email')">
            <x-fields.text dir="ltr" wire:model.lazy="user.email" id="user.email" rules="required"/>
        </x-fields.wrapper>

        <x-fields.wrapper label=" صورة العرض " for="user.image" :error="$errors->first('user.image')">
            <input type="file" wire:model="image" >
{{--            @error('image') <span class="error" lass="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-sm text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">{{ $message }}</span> @enderror--}}
        </x-fields.wrapper>

        <div class="text-left mt-2">
            <button type="submit"
                    class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-sm text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                <i class="ti-check ml-2"></i>
                حفظ
            </button>
        </div>
    </form>
</div>

