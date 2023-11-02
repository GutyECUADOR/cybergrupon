
const app = new Vue({
    el: '#app',
    data: {
        baseURL: '',
        userID: null,
    },
    methods:{
        async get_apex_movimientos_char() {


            const { data } = await axios.get(`/api/dashboard/${this.userID}`);

            const valores = data.movimientos.map( row => {
                return row.valor
            });

            const categorias = data.movimientos.map( row => {
                return row.created_at
            });

            const options = {
                series: [{
                  name: "USD",
                  data: valores
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
                categories: categorias,
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
        this.userID = document.querySelector('#hiddenuserID')?.value;
        this.get_apex_movimientos_char();


    }
})



