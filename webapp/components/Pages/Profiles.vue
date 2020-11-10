<template>
  <AppPage>

    <div class="bg-white rounded-lg p-4 flex items-center mb-6">
        <FilterByCategory @selected-category="selectedCategory=$event; getData(1)" />
        <FilterByTags @selected-tags="selectedTags=$event; getData(1)" />

        <div class="flex justify-end flex-grow items-center">
            <span class="text-md rounded text-cool-gray-500 p-2 rounded-sm inline-block">{{data.meta.total}}</span>
        </div>
    </div>

    <vue-simple-spinner class="my-5 bg-cool-gray-100 py-5 rounded border-blue-500" v-if="loading" /> 
    <div v-else>
        <div v-if="items.length">
            <div class="grid grid-cols-2 gap-2 md:gap-3 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                <ProfileItem v-for="item in items" :key="item.id" :item="item" /> 
            </div>

            <div class="flex my-4">
                <Pagination :pagination="data" @paginate="getData" :offset="offset" class="my-2  ms-auto"></Pagination>
            </div>
        </div>

        <div v-else>
            <AlertInfo> لا يوجد محتوى حسب بحثك. </AlertInfo>
        </div>

    </div>
 

  </AppPage>
</template>

<script>
    export default {
        metaInfo: {
            title: 'الملفات الشخصية' 
        },
        data(){
            return {
                loading: false,
                data: {meta:{current_page: 1}},
                items: [],
                selectedCategory: null,
                selectedTags: [],
                offset: 6,
            }
        },
        mounted(){
            this.getData();  
        },
        methods: {
            getData(page){
                var that = this;
                that.loading = true;
                axios.get('profiles', {params: {
                        page: page ? page : that.data.meta.current_page,
                        tags: that.selectedTags,
                        category: that.selectedCategory ? that.selectedCategory.id : null,
                    }
                })
                .then(function (response) {
                    that.loading = false;
                    that.data = response.data.data;
                    that.items = response.data.data.data;
                });
            },
        }
    }
</script>
