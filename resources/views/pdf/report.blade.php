<!DOCTYPE html>
<html dir="rtl">
    <head>
        <meta charset="utf-8">
        <title>تقرير المهام</title>

        @includeIf('pdf.style')
    </head>
    <body style="font-family:'Adobe Arabic', serif" dir="rtl">
 
        <h1 class="title"> ناجز  </h1>
        <hr>
        <h3 class="subtitle"> المهام المنجزة للفترة من ({{$start}}) 
            إلى ({{$end}}) </h3>


        <div class="align-middle inline-block min-w-full overflow-hidden sm:rounded shadow-sm">
            <table class="min-w-full">
              <thead>
                <tr class="bg-gray-200 border-b-2 border-white">
                  <td class="px-6 py-4  text-sm leading-5 text-gray-600">
                    المهام
                  </td>
                  <td class="px-6 py-4  text-sm leading-5 text-gray-600">
                    المهمة
                  </td>
                  <td class="px-6 py-4  text-sm leading-5 text-gray-600">
                    الموظف
                  </td>
                </tr>
              </thead>
              <tbody>
                @foreach($tasks as $task)
                <tr class="" style="background:rgb(242, 242, 242)">
                  <td class="px-6 py-4  text-sm leading-5 text-gray-700">
                    <div>{{$task->task}} </div>
                    <span dir="ltr" class="text-xs text-gray-300" style="font-size: 12px; color:gray">{{Carbon\Carbon::parse($task->done_at)->format('d M, Y')}}  </span>
                  </td>
                  <td class="px-6 w-32 py-4 bg-{{$task->project->color}}-50 border-{{$task->project->color}}-100 @if (!$loop->last) border-b-2 @endif font-bold  text-base leading-5 text-gray-500">
                    {{$task->project->name}}
                  </td>
                  <td class="px-6 w-56  max-w-md py-4  text-sm leading-5 font-medium text-gray-900">
                    @if($task->assignedUser)
                        <div class="text-gray-700">{{$task->assignedUser->name}}</div>
                        <span dir="ltr" style="font-size: 12px; color:gray">#{{$task->assignedUser->employee_num}}</span>
                    @endif
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

    </body>
</html>
