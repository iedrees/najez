{{--<main--}}
{{--    class="mx-auto max-w-4xl bg-gray-200 h-screen"--}}
{{--    x-data="{ 'isDialogOpen': false }"--}}
{{--    @keydown.escape="isDialogOpen = false">--}}


{{--    <section class="flex flex-wrap p-4">--}}

{{--        <button type="button" class="border p-2 bg-white hover:border-gray-500" @click="isDialogOpen = true">edit</button>--}}

{{--        <!-- overlay -->--}}
{{--        <div--}}
{{--            class="overflow-auto"--}}
{{--            style="background-color: rgba(0,0,0,0.5)"--}}
{{--            x-show="isDialogOpen"--}}
{{--            :class="{ 'absolute inset-0 z-10 flex items-start justify-center': isDialogOpen }"--}}
{{--        >--}}
{{--            <!-- dialog -->--}}
{{--            <div--}}
{{--                class="bg-white shadow-2xl m-4 sm:m-8"--}}
{{--                x-show="isDialogOpen"--}}
{{--                @click.away="isDialogOpen = false"--}}
{{--            >--}}
{{--                <div class="flex justify-between items-center border-b p-2 text-xl">--}}
{{--                    <h6 class="text-xl font-bold">edit inform</h6>--}}
{{--                    <button type="button" @click="isDialogOpen = false">✖</button>--}}
{{--                </div>--}}
{{--                <div class="p-2">--}}
{{--                    <!-- content -->--}}
{{--                    <aside class="max-w-lg mt-4 p-4 bg-yellow-100 border border-gray-500">--}}
{{--                        <div class="modal-body">--}}
{{--                            <form method="post" id="insert_form">--}}
{{--                                <label>Enter username</label>--}}
{{--                                <input type="text" name="name" id="name" class="form-control"/>--}}
{{--                                <br/>--}}
{{--                                <label>Enter name : </label>--}}
{{--                                <textarea name="address" id="address" class="form-control"></textarea>--}}

{{--                                <br/>--}}
{{--                                <label>Enter password : </label>--}}
{{--                                <textarea name="address" id="address" class="form-control"></textarea>--}}
{{--                                <br/>--}}
{{--                                <br/>--}}
{{--                                <label>Enter Email : </label>--}}
{{--                                <input type="text" name="designation" id="designation" class="form-control"/>--}}
{{--                                <br/>--}}
{{--                                <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success"/>--}}

{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </aside>--}}
{{--                </div>--}}
{{--            </div><!-- /dialog -->--}}
{{--        </div><!-- /overlay -->--}}

{{--    </section>--}}
{{--</main>--}}
{{--<div>--}}
{{--    <div wire:model="user">--}}
{{--        <button x-data @click="$dispatch('input', 'baz')">Set to "baz"</button>--}}
{{--    </div wire:model="user">--}}
{{--</div>--}}



{{--<form wire:submit.prevent="schedule">--}}
{{--    <label for="title">Event Title</label>--}}
{{--    <input wire:model="title" id="title" type="text">--}}

{{--    <label for="date">Event Date</label>--}}
{{--    <x:date-picker wire:model="date" id="date"/>--}}

{{--    <button>Schedule Event</button>--}}
{{--</form>--}}
{{--<form wire:submit.prevent="create">--}}
{{--    <input wire:model="id" type="submit">--}}

{{--    <button>Create Post</button>--}}
{{--</form>--}}

{{--<form wire:submit.prevent="update">--}}

{{--    <button>  <svg fill="currentColor">--}}
{{--            <path--}}
{{--                d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">--}}
{{--            </path>--}}
{{--            <path fill-rule="evenodd"--}}
{{--                  d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"--}}
{{--                  clip-rule="evenodd">--}}
{{--            </path>--}}
{{--        </svg></button>--}}
{{--</form>--}}

<x-text
