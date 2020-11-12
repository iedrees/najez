<template>
  <AppPage>
      <h1 class="text-2xl mb-10 flex items-center border-b-2 border-blue-200 text-blue-800 py-3">
          <svg class="h-8 -mt-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
          <div class=" mx-2"> تقرير المهام المنجزة </div>
      </h1>
<!--      @if(count($tasks))-->
<!--      تحميل التقرير -->
      <div class="text-left">
          <a class="inline-flex items-center text-white bg-indigo-600 hover:bg-indigo-500 p-2 px-3 rounded border border-gray-200 focus:outline-none" href="" target="_blank" >
<!--              <a class="inline-flex items-center text-white bg-indigo-600 hover:bg-indigo-500 p-2 px-3 rounded border border-gray-200 focus:outline-none" href="{{route('reports.download')}}?start={{Carbon\Carbon::parse($start)->format('Y-m-d')}}&end={{Carbon\Carbon::parse($end)->format('Y-m-d')}}" target="_blank" >-->
              <svg class="h-4 -mt-1 ml-2 inline" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z" clip-rule="evenodd"></path></svg>
              تحميل التقرير
          </a>
      </div>
<!--      بدايه الجدول -->
      <div class="flex flex-col">
          <div class="py-2 overflow-x-auto ">
              <div class="align-middle inline-block min-w-full overflow-hidden sm:rounded shadow-sm">
                  <table class="min-w-full">
                      <thead>
                      <tr class="bg-gray-100 border-b-2 border-white">
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
<!--                      @foreach($tasks as $task)-->
                      <tr v-for="task in items" :key="task.id" :task="task" class="bg-white @if (!$loop->last) border-b-2 @endif  border-gray-100" >
                          <td class="px-6 py-4  text-sm leading-5 text-gray-700">
                              <div><h1> {{task.task}} </h1> </div>
<!--                              <div>{{$task->task}} </div>-->
                              <span dir="ltr" class="text-xs text-gray-300"><h1> {{task.done_at}} </h1></span>
<!--                              <span dir="ltr" class="text-xs text-gray-300">{{Carbon\Carbon::parse($task->done_at)->format('d M, Y')}}  </span>-->
                          </td>
                          <td class="px-6 w-32 py-4 bg-gray-50 border-gray-100 border-b-2 text-base leading-5 text-gray-500">
<!--                          <td class="px-6 w-32 py-4 bg-{{$task->project->color}}-50 border-{{$task->project->color}}-100 @if (!$loop->last) border-b-2 @endif font-bold  text-base leading-5 text-gray-500">-->
                              {{task.project.name}}
                          </td>
                          <td class="px-6 w-56  max-w-md py-4  text-sm leading-5 font-medium text-gray-900">
                              <div class="text-gray-700"><h1> {{task.assigned_user.name}} </h1></div>
<!--                              <div class="text-gray-700">{{$task->assignedUser->name}}</div>-->
                              <span dir="ltr" class="text-gray-400 font-bold">{{task.assigned_user.employee_num}}</span>
<!--                              <span dir="ltr" class="text-gray-400 font-bold">#{{$task->assignedUser->employee_num}}</span>-->
                          </td>
                      </tr>
<!--                      @endforeach-->
                      </tbody>
                  </table>
              </div>
          </div>
      </div>

  </AppPage>
</template>

<script>
    import Home from "./Home";
    export default {
        components: {Home},
        data(){
            return {
                loading: false,
                items: [],
            }
        },
        mounted(){
            this.getData();
        },
        methods: {
            getData(){
                var that = this;
                that.loading = true;
                axios.get('report')
                    .then(function (response) {
                        that.loading = false;
                        that.items = response.data.data;
                    });
            },
        }
    }
</script>
