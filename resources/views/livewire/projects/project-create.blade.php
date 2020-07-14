<div x-show="isDialogOpen" 
     class="fixed bottom-0 inset-x-0 px-4 pb-4 sm:inset-0 sm:flex sm:items-center sm:justify-center z-50">
      
    <div class="fixed inset-0 transition-opacity">
      <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>

    <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
      <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="sm:flex sm:items-start w-full">
          <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-gray-100 sm:mx-0 sm:h-10 sm:w-10">
            <svg class="h-6 w-6 text-gray-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"></path></svg>
          </div>
          <div class="mt-3 sm:mt-0 sm:mr-4 w-full">
            <h3 class="text-lg leading-6 font-medium text-center sm:text-right text-gray-700" id="modal-headline">
              أضف مشروع جديد
            </h3>
            <div class="my-3">
                <input wire:model.lazy="name" id="name" placehoder="اسم المشروع" 
                    class="@if($errors->first('name')) border-red-400 @endif rounded w-full bg-gray-50 focus:bg-white focus:outline-none focus:border-indigo-500 focus:text-gray-700 focus:border-gray-300 shadow-sm border border-gray-200 p-3 block w-full text-gray-500 transition duration-150 ease-in-out sm:text-sm sm:leading-5"/>
                <div class="mt-1 text-red-500 text-sm">{{ $errors->first('name') }}</div>
            </div>
          </div>
        </div>
      </div>
      <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
        <span class="flex w-full rounded-md shadow-sm sm:mr-2 sm:w-auto">
          <button wire:click="submit" type="button" class="inline-flex justify-center w-full rounded border border-transparent px-4 py-2 bg-indigo-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-indigo-500 focus:outline-none transition ease-in-out duration-150 sm:text-sm sm:leading-5">
            {{-- <svg class="w-5 ml-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg> --}}
            <svg class="w-5 ml-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
            أضف 
          </button>
        </span>
        <span class="mt-3 flex w-full rounded shadow-sm sm:mt-0 sm:w-auto">
          <button @click="isDialogOpen = false" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none transition ease-in-out duration-150 sm:text-sm sm:leading-5">
            إلغاء الأمر
          </button>
        </span>
      </div>
    </div>
  </div>