<x-project-page :project="$project">

    <form wire:submit.prevent="submit" enctype="multipart/form-data">
        <x-fields.wrapper label="اسم المشروع" for="item.name" :error="$errors->first('item.name')">
            <x-fields.text wire:model.lazy="item.name" id="item.name" rules="required"/>
        </x-fields.wrapper>

        <x-fields.wrapper label="حالة المشروع" for="item.status" :error="$errors->first('item.status')">
            <x-fields.text wire:model.lazy="item.status" id="item.status" rules="required"/>
        </x-fields.wrapper>

        <x-fields.wrapper label="تفاصيل المشروع " for="item.details" :error="$errors->first('item.details')">
            <x-fields.text wire:model.lazy="item.details" id="item.details" rules="required"/>
        </x-fields.wrapper>

        <x-fields.wrapper label="موعد تسليم المشروع " for="item.deadline" :error="$errors->first('item.deadline')">
            <x-fields.text wire:model.lazy="item.deadline" id="item.deadline" rules="required" type="date"/>
        </x-fields.wrapper>

        <x-fields.wrapper label="قائد المشروع " for="item.leader_id" :error="$errors->first('item.leader_id')">
            <div x-data="{open:false}" class="relative block mb-5" x-on:click.away="open = false">

                <div class="relative rounded shadow-sm bg-gray-200 p-1">
                    <input x-on:focus="open = true" wire:model="search" type="text" placeholder="ابحث عن قائد ..."
                           class="p-3 pr-10 block w-full rounded-none rounded transition ease-in-out duration-150 text-gray-500 border-2 border-white focus:border-indigo-300  focus:outline-none"/>
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                  d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>

                <div x-show="open" class="origin-top-right absolute right-0 mt-1 w-56 rounded-md shadow-sm w-full">
                    <div class="rounded-b-md bg-white shadow">
                        <div class="" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                            @if(!count($users))
                                <div class="p-2 px-3 text-gray-600 text-sm">
                                    لا توجد نتائج ..
                                </div>
                            @else
                                @foreach($users as $user)
                                    <div class="flex items-center text-gray-700 p-3 border-b border-gray-100">
                                        <img class="h-8 w-8 rounded-sm" src="{{$user->image}}" alt=""/>
                                        <div class="mx-2 flex-grow">
                                            <h4 class="text-sm">{{ $user->name }}</h4>
                                            <div class="text-xs text-gray-600">{{ $user->email }}</div>
                                        </div>
                                        <div>
                                            <button x-on:click="open = false" wire:click="addLeader({{$user}})"
                                                    type="button"
                                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-blue-700 bg-indigo-100 hover:bg-indigo-50 focus:outline-none focus:border-indigo-300 focus:shadow-outline-indigo active:bg-indigo-200 transition ease-in-out duration-150">
                                                <svg class="-mr-0.5 ml-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                                    <path
                                                        d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"></path>
                                                </svg>
                                                أضف كقائد
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>

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
                    @if((auth()->user()->id == $project->user_id) || (auth()->user()->id == $project->leader_id))
                        <div x-data="{ open: false }" class="relative inline-block z-40">
                            <button @click="open = true" type="button"
                                    class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-sm text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                                <i class="ti-close ml-2"></i>
                                حذف المشروع
                            </button>
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

