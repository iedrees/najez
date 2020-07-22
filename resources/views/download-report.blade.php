@extends('layouts.base')

@section('body')
    
    <div class="container max-auto bg-gray-100 p-10">

        <h1 class="text-2xl mb-10 flex items-center border-b-2 border-blue-200 text-blue-800 py-3">
            <svg class="h-8 -mt-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
            <div class=" mx-2"> تقرير المهام المنجزة </div>
        </h1>

        <div class="flex items-center mt-10 mb-4 text-gray-500 py-2 border-b-2 border-gray-200">
            <svg class="h-7 w-7 -mt-1" fill="currentColor" viewBox="0 0 20 20"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
            <div class="mx-1">
            <span> المهام المنجزة للفترة من </span>
            <b class="bg-indigo-50 text-sm text-indigo-600 p-1 rounded border border-indigo-200" dir="ltr">({{Carbon\Carbon::parse($start)->format('d M, Y')}})</b>
            <span class="mx-1 ">إلى</span>
            <b class="bg-indigo-50 text-sm text-indigo-600 p-1 rounded border border-indigo-200" dir="ltr">({{Carbon\Carbon::parse($end)->format('d M, Y')}})</b>
            </div>
        </div>

    <div class="flex flex-col">
        <div class="py-2 overflow-x-auto ">
        <div class="align-middle inline-block min-w-full overflow-hidden sm:rounded shadow-sm">
            <table class="min-w-full">
            <thead  style="page-break-inside: avoid;">
                <tr class="bg-gray-200 border-b-2 border-gray-300">
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
                <tr style="page-break-inside: avoid;" class="bg-white @if (!$loop->last) border-b-2 @endif  border-gray-100">
                <td class="px-6 py-4  text-sm leading-5 text-gray-700">
                    <div>{{$task->task}} </div>
                    <span dir="ltr" class="text-xs text-gray-300">{{Carbon\Carbon::parse($task->done_at)->format('d M, Y')}}  </span>
                </td>
                <td class="px-6 w-32 py-4 bg-{{$task->project->color}}-50 border-{{$task->project->color}}-100 @if (!$loop->last) border-b-2 @endif font-bold  text-base leading-5 text-gray-500">
                    {{$task->project->name}}
                </td>
                <td class="px-6 w-56  max-w-md py-4  text-sm leading-5 font-medium text-gray-900">
                    <div class="text-gray-700">{{$task->assignedUser->name}}</div>
                    <span dir="ltr" class="text-gray-400 font-bold">#{{$task->assignedUser->id}}</span>
                </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        </div>
    </div>
    </div>

@endsection

