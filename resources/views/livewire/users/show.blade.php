<div class="my-10 container mx-auto">
    <div class="p-8">
        <div class="p-8 rounded overflow-hidden shadow-lg my-10 container mx-auto">
            <div class="bg-white shadow-smx overflow-hidden sm:rounded-sm mb-2 p-px">
                <div class="bg-red">
                    <a class="block  focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">

                        <div class="flex items-center">
                            <div class="flex-shrink-0 py-5 rounded-r-sm  p-2">
                                <img class="w-20 h-20 p-2 rounded-r opacity-75" alt="" src="{{$user->image}}"/>
                            </div>
                            <div class="min-w-0 px-5 py-5 flex-1 sm:flex sm:items-center sm:justify-between ">
                                <div>
                                    <div class="font-medium text-gray-700 truncate">
                                        <b class="text-2xl">الملف الشخصي </b>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </a>
                            <div class="flex content-around">
                                <div class="m-auto">
                                    <div class="p-8 rounded overflow-hidden my-10 container mx-auto">
                                        <table class="table-fixed block text-gray-700 text-center content-around">
                                            <tbody>
                                            <tr>
{{--              edit component                                  --}}

                                                <th> اسم المستخدم :</th>
                                                <td>
                                                    <div
                                                        x-data="{isEditing: false,
                                                        isName: ' {{$user->username}}',
                                                        focus: function() {
                                                        const textInput = this.$refs.textInput;textInput.focus();
                                                        textInput.select();}
                                                          } ">
                                                        <div class="p-2" x-show=!isEditing>
                                                            <span x-bind:class="{ 'font-bold': isName }" x-on:click="isEditing = true; $nextTick(() => focus())">{{$user->username}} </span></div>
                                                        <div x-show=isEditing class="flex flex-col">
                                                            <form class="flex" wire:submit.prevent="update({{$user->id}})">
                                                                <input
                                                                    type="text"
                                                                    class="px-2 border border-gray-400 text-lg shadow-inner"
                                                                    placeholder="ادخل التغير"
                                                                    x-ref="textInput"
                                                                    wire:model.lazy="newName"
                                                                    x-on:keydown.enter="isEditing = false"
                                                                    x-on:keydown.escape="isEditing = false"
                                                                >

                                                                <button type="button" class="px-1 ml-2 text-3xl" title="Cancel" x-on:click="isEditing = false">𐄂</button>
                                                                <button
                                                                    type="submit"
                                                                    class="px-1 ml-1 text-3xl font-bold text-green-600"
                                                                    title="Save"
                                                                    x-on:click="isEditing = false"
                                                                >✓</button>
                                                            </form>
{{--                                                            <x-editable  :modelLazy="newName"/>--}}
                                                        </div>
                                                        </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <th> الأسم :</th>
                                                <td>
                                                    <div
                                                        x-data="{isEditing: false,
                                                        isName: ' {{$user->name}}',
                                                        focus: function() {
                                                        const textInput = this.$refs.textInput;textInput.focus();
                                                        textInput.select();}
                                                          } ">
                                                        <div class="p-2" x-show=!isEditing>
                                                            <span x-bind:class="{ 'font-bold': isName }" x-on:click="isEditing = true; $nextTick(() => focus())">{{$user->name}} </span></div>
                                                        <div x-show=isEditing class="flex flex-col">
                                                            <form class="flex" wire:submit.prevent="update({{$user->id}})">
                                                                <input
                                                                    type="text"
                                                                    class="px-2 border border-gray-400 text-lg shadow-inner"
                                                                    placeholder="ادخل التغير"
                                                                    x-ref="textInput"
                                                                    wire:model.lazy="Name"
                                                                    x-on:keydown.enter="isEditing = false"
                                                                    x-on:keydown.escape="isEditing = false"
                                                                >

                                                                <button type="button" class="px-1 ml-2 text-3xl" title="Cancel" x-on:click="isEditing = false">𐄂</button>
                                                                <button
                                                                    type="submit"
                                                                    class="px-1 ml-1 text-3xl font-bold text-green-600"
                                                                    title="Save"
                                                                    x-on:click="isEditing = false"
                                                                >✓</button>
                                                            </form>
{{--                                                                                                                        <x-editable  :modelLazy="newName"/>--}}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    الإيميل :
                                                </th>
                                                <td>
                                                    <div
                                                        x-data="{isEditing: false,
                                                        isName: ' {{$user->email}}',
                                                        focus: function() {
                                                        const textInput = this.$refs.textInput;textInput.focus();
                                                        textInput.select();}
                                                          } ">
                                                        <div class="p-2" x-show=!isEditing>
                                                            <span x-bind:class="{ 'font-bold': isName }" x-on:click="isEditing = true; $nextTick(() => focus())">{{$user->email}} </span></div>
                                                        <div x-show=isEditing class="flex flex-col">
                                                            <form class="flex" wire:submit.prevent="update({{$user->id}})">
                                                                <input
                                                                    type="text"
                                                                    class="px-2 border border-gray-400 text-lg shadow-inner"
                                                                    placeholder="ادخل التغير"
                                                                    x-ref="textInput"
                                                                    wire:model.lazy="email"
                                                                    x-on:keydown.enter="isEditing = false"
                                                                    x-on:keydown.escape="isEditing = false"
                                                                >

                                                                <button type="button" class="px-1 ml-2 text-3xl" title="Cancel" x-on:click="isEditing = false">𐄂</button>
                                                                <button
                                                                    type="submit"
                                                                    class="px-1 ml-1 text-3xl font-bold text-green-600"
                                                                    title="Save"
                                                                    x-on:click="isEditing = false"
                                                                >✓</button>
                                                            </form>
                                                            {{--                                                                                                                        <x-editable  :modelLazy="newName"/>--}}
                                                        </div>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <th>
                                                    الرقم السري :
                                                </th>
                                                <td>
                                                    <div
                                                        x-data="{isEditing: false,
                                                        isName: ' {{$user->pasword}}',
                                                        focus: function() {
                                                        const textInput = this.$refs.textInput;textInput.focus();
                                                        textInput.select();}
                                                          } ">
                                                        <div class="p-2" x-show=!isEditing>
                                                            <span x-bind:class="{ 'font-bold': isName }" x-on:click="isEditing = true; $nextTick(() => focus())">*********</span></div>
                                                        <div x-show=isEditing class="flex flex-col">
                                                            <form class="flex" wire:submit.prevent="update({{$user->id}})">
                                                                <input
                                                                    type="text"
                                                                    class="px-2 border border-gray-400 text-lg shadow-inner"
                                                                    placeholder="ادخل التغير"
                                                                    x-ref="textInput"
                                                                    wire:model.lazy="password"
                                                                    x-on:keydown.enter="isEditing = false"
                                                                    x-on:keydown.escape="isEditing = false"
                                                                >

                                                                <button type="button" class="px-1 ml-2 text-3xl" title="Cancel" x-on:click="isEditing = false">𐄂</button>
                                                                <button
                                                                    type="submit"
                                                                    class="px-1 ml-1 text-3xl font-bold text-green-600"
                                                                    title="Save"
                                                                    x-on:click="isEditing = false"
                                                                >✓</button>
                                                            </form>
                                                            {{--                                                                                                                        <x-editable  :modelLazy="newName"/>--}}
                                                        </div>
                                                    </div>
                                                </td>

                                            </tr>

                                            </tbody>

                                        </table>

                                    </div>
                                </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
