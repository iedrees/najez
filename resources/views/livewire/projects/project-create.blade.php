<main id="submit"
      x-data="{ 'isDialogOpen': false }"
      @keydown.escape="isDialogOpen = false">

    <section class="flex flex-wrap p-4">

        <button type="button"
                class="bg-transparent border border-gray-500 hover:border-indigo-500 text-gray-500 hover:text-indigo-500 font-bold py-2 px-4 rounded-full"
                @click='isDialogOpen = true' wire:click="submit">add new
            project
        </button>

        <!-- overlay -->
        <div class="overflow-auto" style="background-color: rgba(0,0,0,0.5) "
             x-show="isDialogOpen"
             :class="{ 'absolute inset-0 z-10 flex items-center justify-center': isDialogOpen }">
            <!-- dialog -->
            <div class="bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg py-4 text-left px-6"
                 x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
                 x-transition:enter-end="opacity-100 scale-100" x-transition:leave="ease-in duration-300"
                 x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
                 x-show="isDialogOpen"
                 @click.away="isDialogOpen = false">
                <div class="p-2">
                    <div class="object-none object-left-top ">

                        <button wire:click="submit" @click="isDialogOpen = false">✖</button>
                    </div>
                    <div class="mb-3 flex rounded shadow-sm bg-gray-200 p-1">
                        <div class="relative flex-grow focus-within:z-10">
                            <textarea id="name"
                                      wire:model.lazy="name"
                                      wire:keydown.enter="submit"
                                      class="p-3 block w-full rounded-none rounded-r transition ease-in-out duration-150 text-gray-500 border-2 border-white focus:border-indigo-300  focus:outline-none"
                                      placeholder="اسم المشروع جديد . ">
                            </textarea>
                        </div>
                    </div>
                    <div
                        class="flex justify-between items-center border-b p-2 text-xl">{{--                        <button type="button" @click="isDialogOpen = false">✖</button>--}}
                        <button href="{{route('home')}}"  @click="isDialogOpen = false" wire:click="submit"
                                class="  block w-full rounded-none rounded-r transition ease-in-out duration-150 text-gray-500 border-2 border-white focus:border-indigo-300  focus:outline-none relative inline-flex items-center
                                px-4 py-2 border-gray-300 text-sm leading-5 font-medium rounded-l  bg-indigo-400 hover:text-gray-500 hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500 focus:shadow-outline-blue focus:border-white active:bg-gray-100 active:text-gray-700  ">
                            حفظ المشروع
                        </button>
                    </div>
                </div>
            </div><!-- /dialog -->
        </div><!-- /overlay -->

    </section>
    <div class="min-h-screen">
        <div class="container mx-auto py-6">

            @if (session()->has('message'))
                <x-alert class="" :color="session('color')">
                    {{ session('message') }}
                </x-alert>
            @endif
        </div>
    </div>
</main
>

