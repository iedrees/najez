<template>
  <div class="block bg-white rounded-2xl p-5 group hover:bg-white shadow-sm hover:shadow">
       <pie-chart :chart-data="chartdata" :options="options" class="h-75"></pie-chart>
  </div>
</template>

<script>
    export default {
        data () {
        return {
            chartdata: {
                labels:[],
                datasets:[],
            },
            options: {
                responsive: true,
                tooltips: {
                    rtl: true 
                },
                maintainAspectRatio: false,
                title: {
                    display: true,
                    text: 'عدد الوسائط  حسب الشبكة الإجتماعية'
                },
            }
        }
        },
        mounted () {
        this.getMediaCountCount()
        },
        methods: {
            getMediaCountCount(){
                var that = this;
                axios.get('analyses/get-media-count-by-social-network')
                .then(function (response) {
                    that.chartdata = {
                        labels: response.data.labels,
                        datasets: [{
                            data: response.data.values,
                            backgroundColor: ['#483D8B', '#FFD700'],
                        }],
                    }
                });
            },
        }
    }
</script>
 