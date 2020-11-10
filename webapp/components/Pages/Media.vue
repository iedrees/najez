<template>
  <AppPage>

    <div class="bg-white rounded-lg p-4 flex items-center mb-6">
        <FilterByCategory  v-if="showCategoryFilter" @selected-category="selectedCategory=$event; getData(1)" />
        <FilterByTags  v-if="showTagFilter" @selected-tags="selectedTags=$event; getData(1)" />
        <FilterByNetwork  v-if="showNetworkFilter" @selected-networks="selectedNetworks=$event; getData(1)" />

        <div class="flex justify-end flex-grow items-center">
            <span class="text-md rounded text-cool-gray-500 p-2 rounded-sm inline-block">{{data.meta.total}}</span>
        </div>
    </div>
 
    <vue-simple-spinner  v-if="loading" class="my-6 bg-cool-gray-100 py-6 rounded border-blue-500" /> 
    <div v-else>
        <div v-if="items.length">
            <div class="grid gap-2 gap-y-3 grid-cols-2 lg:grid-cols-4 block">
                <MediaItem v-for="(item, index) in items" :key="item.id" :index="index" :item="item" :items="items" />
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
        props: ['profiles'],
        metaInfo: {
            title: 'الوسائط' 
        },
        data(){
            return {
                loading: false,
                data: {meta:{current_page: 1}},
                items: [],
                showCategoryFilter: true,
                showTagFilter: true,
                showNetworkFilter: true,
                selectedCategory: null,
                selectedTags: [],
                selectedNetworks: [],
                offset: 12,
            }
        },
        mounted(){
            this.getData();  
        },
        watch: {
            'profiles': function (val) {
                if(val){
                    this.showCategoryFilter = false
                    this.showTagFilter = false
                    this.getData();
                }
            }
        },
        methods: {
            getData(page){
                var that = this;
                that.loading = true;
                axios.get('media', {params: {
                        page: page ? page : that.data.meta.current_page,
                        tags: that.selectedTags,
                        networks: that.selectedNetworks,
                        category: that.selectedCategory ? that.selectedCategory.id : null,
                        profiles: that.profiles,
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
