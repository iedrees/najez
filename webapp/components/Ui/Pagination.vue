<template>
    <ul v-if="pagesNumber.length > 1" class="pagination inline-flex bg-white p-1 py-2.5 rounded text-cool-gray-600">
      <li v-if="pagination.meta.current_page > 1" >
          <a href="javascript:void(0)" class="px-2.5 py-2 rounded bg-cool-gray-100 mx-px hover:bg-cool-gray-200" aria-label="Previous" v-on:click.prevent="changePage(pagination.meta.current_page - 1)">
            « 
          </a>
      </li>
      <li v-for="page in pagesNumber" :key="page" >
          <a href="javascript:void(0)" v-on:click.prevent="changePage(page)" :class="{'bg-blue-200 hover:bg-blue-200 text-blue-600 border-none': page == pagination.meta.current_page}" class="px-2.5 py-2 rounded bg-cool-gray-100 mx-px hover:bg-cool-gray-200">{{ page }}</a>
      </li>
      <li v-if="pagination.meta.current_page < pagination.meta.last_page">
          <a href="javascript:void(0)" class="px-2.5 py-2 rounded bg-cool-gray-100 mx-px hover:bg-cool-gray-200" aria-label="Next" v-on:click.prevent="changePage(pagination.meta.current_page + 1)">
              » 
          </a>
      </li>
    </ul>
</template>
<script>
  export default{
      props: {
      pagination: {
          type: Object,
          required: true
      },
      offset: {
          type: Number,
          default: 4
      }
    },
    computed: {
      pagesNumber() {
        if (!this.pagination.meta.to) {
          return [];
        }
        let from = this.pagination.meta.current_page - this.offset;
        if (from < 1) {
          from = 1;
        }
        let to = from + (this.offset * 2);
        if (to >= this.pagination.meta.last_page) {
          to = this.pagination.meta.last_page;
        }
        let pagesArray = [];
        for (let page = from; page <= to; page++) {
          pagesArray.push(page);
        }
          return pagesArray;
      }
    },
    methods : {
      changePage(page) {
        this.pagination.meta.current_page = page;
        this.$emit('paginate');
      }
    }
  }
</script>