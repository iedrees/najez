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
        <x-fields.wrapper label="صورة العرض" for="item.image" :error="$errors->first('item.image')">
            <div>
                <label
                    class="w-32 flex flex-col items-center px-2 py-4 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue-500 hover:text-white">
                    <span class="mt-2 text-base leading-normal">اختر ملف </span>
                    <input wire:model="image" id="image" accept="image/*" type="file" wire:change="$emit(loadFile)"
                           class="hidden">
                </label>
                <img src="{{$image}}" width="200"/>
            </div>
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
<script>
    // console.log(window);
    // setTimeout(1);
    document.addEventListener('livewire:load', () => {
        window.livewire.on('loadFile', () => {
            let inputField = document.getElementById('image')
            let file = inputField.files[0]
            let reader = new FileReader();
            reader.onloadend = () => {
              //  window.livewire.emit('fileUpload', reader.result)
                console.log(reader.result);
            }
            reader.readAsDataURL(file);
        });
    });
</script>
