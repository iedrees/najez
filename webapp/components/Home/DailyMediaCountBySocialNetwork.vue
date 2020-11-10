<template>
  <div class="block bg-white rounded-2xl p-5 group hover:bg-white shadow-sm hover:shadow">
       <line-chart :chart-data="chartdata" :options="options" class="h-75"></line-chart>
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
            maintainAspectRatio: false,
			title: {
				display: true,
				text: 'الوسائط اليومية حسب الشبكة الإجتماعية'
			},
			scales: {
				xAxes: [{
					display: true,
				}],
				yAxes: [{
                    display: true,
                      ticks: {
                            callback: function(value, index, values) {
                                return value;
                            }
                        },
				}]
			}
		}
      }
    },
    mounted () {
      this.getMediaCountCount()
    },
    methods: {
        getMediaCountCount(){
            var that = this;
            axios.get('analyses/get-daily-media-count-by-social-network')
            .then(function (response) {
                that.chartdata = {
                    labels: response.data.labels,
                    datasets: []
                }

                var allData = response.data.data

                for (const key in allData) {
                    if (allData.hasOwnProperty(key)) {
                        const element = allData[key];
                        const xyData = [];

                        for (const [k, v] of Object.entries(element)) {
                            xyData.push({
                                x:k,
                                y:v,
                            })
                        }
                        // console.log(xyData);

                        that.chartdata.datasets.push({
                            label: key,
                            data: xyData,  
                            fill: false,
                            backgroundColor: key == 'snapchat' ?  'rgba(99.1%, 95.9%, 43.5%, 0.644)' : 'rgba(28.2%, 23.9%, 54.5%, 0.71)',
                            borderColor: key == 'snapchat' ?  '#FFE400' : '#250060',
                        })
                    }
                }
            });
        },
    }
}
</script>

<style>

</style>