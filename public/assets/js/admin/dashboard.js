
const app = new Vue({
    el: '#app',
    data: {
        baseURL: 'http://ahorraplataentucredito.test',
    },
    methods:{
        async get_apex_movimientos_char() {


            const { data } = await axios.get('/api/dashboard/');
            console.log(data);

            const options = {
                series: [{
                  name: "Ganancias",
                  data: data.values
              }],
                chart: {
                height: 350,
                type: 'line',
                zoom: {
                  enabled: false
                }
              },
              dataLabels: {
                enabled: false
              },
              stroke: {
                curve: 'straight'
              },
              grid: {
                row: {
                  colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                  opacity: 0.5
                },
              },
              xaxis: {
                categories: data.categories,
              }
              };

              const chart = new ApexCharts(document.querySelector("#earning"), options);
              chart.render();

        }
    },
    filters: {
        checkStatus: function (value) {
            let status = 'No definido';
            switch (value) {
            case '0':
            status = 'Pendiente aprobación'
            break;

            case '1':
            status = 'Aprobado'
            break;

            case '2':
            status = 'Anulado'
            break;

            default:
            break;
            }
            return status;
        },
    },
    mounted(){
        //this.cod_credito = document.querySelector('#hiddenCreditoID')?.value;
        this.get_apex_movimientos_char();


    }
})



