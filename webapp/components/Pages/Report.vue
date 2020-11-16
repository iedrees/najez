<template>
  <AppPage>
      <h1 class="text-2xl mb-10 flex items-center border-b-2 border-blue-200 text-blue-800 py-3">
          <svg class="h-8 -mt-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
          <div class=" mx-2"> تقرير المهام المنجزة </div>
      </h1>
      <div class="flex items-center">
        <button @click="start=thisWeekStart; end=thisWeekEnd"
            class="px-4 hover:bg-blue-100 py-2.5 border border-indigo-300 text-sm leading-4 h-10 bg-indigo-50 rounded-md ml-2 focus:border-0 focus:outline-none">
            <span class="flex items-center opacity-50">
                <svg class="w-4 h-4 me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                <span class=""> الاسبوع الحالي </span>
            </span>
        </button>

        <div class="flex items-center">
            <div class="flex rounded-md shadow-sm">
                 <input id="start" type="date" v-model="start" class="cursor-pointer p-2 border-l-2 border-cool-gray-200 focus:outline-none block w-full rounded-none rounded-r-md transition ease-in-out duration-150 sm:text-sm sm:leading-5" placeholder="John Doe">
                 <input id="end" type="date" v-model="end" class="cursor-pointer p-2 focus:outline-none block w-full rounded-none rounded-l-md transition ease-in-out duration-150 sm:text-sm sm:leading-5" placeholder="John Doe">
            </div>
        </div>
    </div>

    <div v-if="items.length" class="text-left">
          <a class="inline-flex items-center text-white bg-indigo-600 hover:bg-indigo-500 p-2 px-3 rounded border border-gray-200 focus:outline-none" href="" target="_blank" >
              <svg class="h-4 -mt-1 ml-2 inline" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z" clip-rule="evenodd"></path></svg>
              تحميل التقرير
          </a>
    </div>
    <div class="flex items-center bg-cool-gray-100 px-2 mt-3 rounded-lg text-gray-500 py-3 ">
        <svg class="h-7 w-7 -mt-1" fill="currentColor" viewBox="0 0 20 20"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
        <div class="mx-1 flex-grow">
            <span> المهام المنجزة للفترة من </span>
            <b class="bg-indigo-50 text-sm text-indigo-600 p-1 rounded border border-indigo-200" dir="ltr">({{start}})</b>
            <span class="mx-1 ">إلى</span>
            <b class="bg-indigo-50 text-sm text-indigo-600 p-1 rounded border border-indigo-200" dir="ltr">({{end}})</b>
        </div>
        <span class="p-1 ms-2 rounded text-cool-gray-400"> <b class="text-blue-600 mx-2">{{items.length}}</b> مهام منجزة</span>
    </div>


      <div class="flex flex-col">
          <div class="py-2 overflow-x-auto ">
              <div class="align-middle inline-block min-w-full overflow-hidden sm:rounded-lg shadow-sm">
                  <table class="min-w-full" v-if="items.length">
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
                        <tr v-for="task in items" :key="task.id" v-if="task.project.amILeader || task.assigned_user.id == $store.state.user.id" :task="task" class="bg-white @if (!$loop->last) border-b-2 @endif  border-gray-100" >
                            <td class="px-6 py-4  text-sm leading-5 text-gray-700">
                                <div><h1> {{task.task}} </h1> </div>
                                <span dir="ltr" class="text-xs text-gray-300"><h1> {{task.done_at}} </h1></span>
                            </td>
                            <td class="px-6 w-48 py-4 bg-gray-50 border-gray-100 border-b-2 text-base leading-5 text-gray-500">
                                {{task.project.name}}
                            </td>
                            <td class="px-6 w-56  max-w-md py-4  text-sm leading-5 font-medium text-gray-900">
                                <div class="text-gray-700"><h1> {{task.assigned_user.name}} </h1></div>
                                <span v-if="task.assigned_user.employee_num"  class="text-gray-400 font-bold flex items-center leading-8">
                                    <svg class="w-4 h-4 me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                    <span dir="ltr">{{task.assigned_user.employee_num}}</span>
                                </span>
                            </td>
                        </tr>
                      </tbody>
                  </table>
                  <table v-else>
                     <p> لا يوجد اي مهام </p>
                  </table>
              </div>
          </div>
      </div>

  </AppPage>
</template>

<script>
    import { format, startOfToday, addWeeks } from 'date-fns';

    export default {
        data(){
            return {
                loading: false,
                items: [],
                thisWeekStart: format(startOfToday(), 'yyyy-MM-dd') ,
                thisWeekEnd: format(addWeeks(startOfToday(), 1), 'yyyy-MM-dd'),
                start: format(startOfToday(), 'yyyy-MM-dd') ,
                end: format(addWeeks(startOfToday(), 1), 'yyyy-MM-dd'),
            }
        },
        mounted(){
            this.getData();
        },
        watch: {
            'start': function () {
                this.getData();
            },
            'end': function () {
                this.getData();
            }
        },
        methods: {
            getData(){
                var that = this;
                that.loading = true;
                axios.get('report', {params:{start: that.start, end: that.end}})
                    .then(function (response) {
                        that.loading = false;
                        that.items = response.data.data;
                    });
            },
            formatDate(date, fff) {
                return format(date, fff || 'yyyy-MM-dd HH:mm');
            },
        }
    }
</script>
