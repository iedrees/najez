<div class="container mx-auto my-10 px-3 sm:px-0">

    
    <h1 class="text-2xl mb-10 flex items-center border-b-2 border-blue-200 text-blue-800 py-3">
      <svg class="h-8 -mt-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
      <div class=" mx-2"> تقرير المهام المنجزة </div>
    </h1>
    <div class="flex items-center">
      <button wire:click="setDates('{{(string)Carbon\Carbon::now()->startOfWeek(0)->format('Y-m-d')}}', '{{(string)Carbon\Carbon::now()->endOfWeek(-3)->format('Y-m-d')}}')"
          class="px-4 hover:bg-blue-100 py-2.5 border border-indigo-300 text-sm leading-4 h-10 bg-indigo-50 rounded-md ml-2 focus:border-0 focus:outline-none">
          <span>
            <span class="opacity-50"> الاسبوع الحالي </span>
            <span dir="ltr">
                {{Carbon\Carbon::now()->startOfWeek(0)->format('D')}}  
                ({{Carbon\Carbon::now()->startOfWeek(0)->format('d M, Y')}})
            </span>
            <span>
              <svg class="text-blue-600 h-5 inline mx-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg>
            </span>
            <span dir="ltr">
                {{Carbon\Carbon::now()->endOfWeek(-3)->format('D')}}
                ({{Carbon\Carbon::now()->endOfWeek(-3)->format('d M, Y')}})
            </span>
        </span>
      </button>

      <div>
          <div class=" flex rounded-md shadow-sm">
            <div class="relative focus-within:z-10">
              <input id="start" type="date" wire:model="start" class="form-input block w-full rounded-none rounded-r-md transition ease-in-out duration-150 sm:text-sm sm:leading-5" placeholder="John Doe">
            </div>
            <button class="-mr-px relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-l-md text-gray-700 bg-gray-50 hover:text-gray-500 hover:bg-white focus:outline-none transition ease-in-out duration-150">
              <input type="date" wire:model="end">
            </button>
          </div>
      </div>
    </div>
 
    <div class="flex items-center mt-10 mb-4 text-gray-500 py-2 border-b-2 border-gray-200">
      <svg class="h-7 w-7 -mt-1" fill="currentColor" viewBox="0 0 20 20"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
      <div class="mx-1">
        <span> المهام المنجزة للفترة من </span>
        <b class="bg-indigo-50 text-sm text-indigo-600 p-1 rounded border border-indigo-200" dir="ltr">({{Carbon\Carbon::parse($start)->format('d M, Y')}})</b>
        <span class="mx-1 ">إلى</span>
        <b class="bg-indigo-50 text-sm text-indigo-600 p-1 rounded border border-indigo-200" dir="ltr">({{Carbon\Carbon::parse($end)->format('d M, Y')}})</b>
      </div>
    </div>

    @if(count($tasks))
    <div class="text-left">
      <a class="inline-flex items-center text-white bg-indigo-600 hover:bg-indigo-500 p-2 px-3 rounded border border-gray-200 focus:outline-none" href="{{route('reports.download')}}?start={{Carbon\Carbon::parse($start)->format('Y-m-d')}}&end={{Carbon\Carbon::parse($end)->format('Y-m-d')}}" target="_blank" >
        <svg class="h-4 -mt-1 ml-2 inline" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z" clip-rule="evenodd"></path></svg>
        تحميل التقرير  
      </a>
    </div>
 
     
      <div class="flex flex-col">
        <div class="py-2 overflow-x-auto ">
          <div class="align-middle inline-block min-w-full overflow-hidden sm:rounded shadow-sm">
            <table class="min-w-full">
              <thead>
                <tr class="bg-gray-200 border-b-2 border-white">
                  <td class="px-6 py-4  text-sm leading-5 text-gray-600">
                    المهام
                  </td>
                  <td class="px-6 py-4  text-sm leading-5 text-gray-600">
                    المشروع
                  </td>
                  <td class="px-6 py-4  text-sm leading-5 text-gray-600">
                    الموظف
                  </td>
                </tr>
              </thead>
              <tbody>
                @foreach($tasks as $task)
                <tr class="bg-white @if (!$loop->last) border-b-2 @endif  border-gray-100">
                  <td class="px-6 py-4  text-sm leading-5 text-gray-700">
                    <div>{{$task->task}} </div>
                    <span dir="ltr" class="text-xs text-gray-300">{{Carbon\Carbon::parse($task->done_at)->format('d M, Y')}}  </span>
                  </td>
                  <td class="px-6 w-32 py-4 bg-{{$task->project->color}}-50 border-{{$task->project->color}}-100 @if (!$loop->last) border-b-2 @endif font-bold  text-base leading-5 text-gray-500">
                    {{$task->project->name}}
                  </td>
                  <td class="px-6 w-56  max-w-md py-4  text-sm leading-5 font-medium text-gray-900">
                    <div class="text-gray-700">{{$task->assignedUser->name}}</div>
                    <span dir="ltr" class="text-gray-400 font-bold">#{{$task->assignedUser->employee_num}}</span>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    @else  
      <div class="border border-red-200 text-base my-3 bg-red-50 text-red-600 p-3 rounded">
        لا توجد مهام منجزة للتواريخ المحددة
      </div>
    @endif  
</div>
