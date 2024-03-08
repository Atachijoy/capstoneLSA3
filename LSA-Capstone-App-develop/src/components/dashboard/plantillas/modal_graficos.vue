<template>

    <div class="color">

        <div class="content-2">
            <div class="recent">
                <div class="title">
                    <h1>Gráfico cantidad de análisis por cada Analista</h1>
                    <img class="custom-img" src="@/assets/analisis.png" alt="">
                </div>
                <Barchart :variableHijo1="muestras_realizadas" :usuarios="empleados" :variable-hijo2="muestras_pendientes"/>
            </div>
            <div class="new" style="height: 575px;">
                <div>
                    <h1 style="font-size: 27px;">Cantidad de muestras por norma</h1>
                    <Pie :variableHijo="cantidad" :usuarios="normas"/>

                <section class="normas">
                    <div class="DS46">
                        <div class="DS46-color">
                            
                        </div>
                        <h1 style="font-size: 10px; margin-top: 2px;">:</h1>
                        <h1 style="font-size: 9px; margin-top: 3px; text-align: left;">{{ cantidad[0] }} Muestras</h1>
                    </div>
                    <div class="DS90">
                        <div class="DS90-color">
                            
                        </div>
                        <h1 style="font-size: 10px; margin-top: 2px;">:</h1>
                        <h1 style="font-size: 9px; margin-top: 3px; text-align: left;">{{cantidad[1]}} Muestras</h1>
                    </div>
                    <div class="NCh1333">
                        <div class="NCh1333-color">
                            
                        </div>
                        <h1 style="font-size: 10px; margin-top: 2px;">:</h1>
                        <h1 style="font-size: 9px; margin-top: 3px; text-align: left;">{{cantidad[2]}} Muestras</h1>
                    </div>
                    <div class="NCh409">
                        <div class="NCh409-color">
                            
                        </div>
                        <h1 style="font-size: 10px; margin-top: 2px;">:</h1>
                        <h1 style="font-size: 9px; margin-top: 3px; text-align: left;">{{cantidad[3]}} Muestras</h1>
                    </div>
                </section>
                </div>
            </div>

        </div>

        <section class="chart3 grid">
            <div class="chart3-muestras-mensual" style="width:100%; height: auto;">
                <h1>Gráfico Cantidad de análisis por año</h1>
                <select v-model="filtrar">
                <option disabled selected value="0" >Seleccionar Año</option>
                <option value="0" >Todos</option>
                <option v-for="(year,index) in years" :key="index" :value="year">
                {{ year }}
                </option>
                </select>
                <Barchart style="width:100%;" :variableHijo1="filtrar_muestras_realizadas" :usuarios="filter_year" :variable-hijo2="filtrar_muestras_pendientes"/>
            </div>
        </section>

        <section class="chart3">
            <div class="chart3-muestras-mensual" style="width:100%; height: auto;">
                <h1>Gráfico Cantidad de análisis por mes</h1>
                <Barchart style="width:100%;" :variableHijo1="muestras_mensual_realizadas" :usuarios="meses" :variable-hijo2="muestras_mensual_pendientes"/>
            </div>
        </section>

    </div>
</template>

<script>
    import axios from 'axios';
    import user_roles from "@/helpers/enums/roles.js";
    import personalService from "@/helpers/api-services/Personal.service"
    import store from "@/store/store";
    import Barchart from "@/components/dashboard/Grafico.vue"
    import Pie from "@/components/dashboard/GraficoVertical.vue"
    export default {
        data() {
            return {
                usuario: [],
                numero: [],
                normas: ['DS46','DS90','NCh1333','NCh409'],
                cantidad:[],
                rol_descripcion: "descripcion_rol",
                saludo: "Hola",

                meses: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],

                muestras_realizadas: [],
                muestras_pendientes: [],
                empleados: [],


                years:[],
                filter_year: [],

                listado_muestra_realizadas_pendientes: [],

                muestras_anual_realizadas: [],
                muestras_anual_pendientes: [],
                clave_muestras_anual_realizadas: [],
                clave_muestras_anual_pendientes: [],

                filtrar_muestras_realizadas: [],
                filtrar_muestras_pendientes: [],




                // Grafico de meses

                muestras_mensual_realizadas: [],
                muestras_mensual_pendientes: [],


                clave_muestras_mensual_realizadas: [],
                clave_muestras_mensual_pendientes: [],

                filtrar: 0,
            }
        },
        mounted() {
            this.mostrarInfo();
            this.obtenerUsuarios();
            this.obtenerMuestras();
            this.obtenerMuestrasPorNorma();
            this.obtenerCantidadAnalisisPorAnio();
            this.obtenerCantidadAnalisisPorMes(0);
        },
        name: 'HomeView',
        components: {
            Barchart,
            Pie
        },
        watch:{
            filtrar(year){
                if(year==0){
                    this.obtenerCantidadAnalisisPorMes(year);
                    this.filter_year = this.years;
                    this.filtrar_muestras_realizadas = this.muestras_anual_realizadas;
                    this.filtrar_muestras_pendientes = this.muestras_anual_pendientes;
                }
                else{
                    const resultado = this.years.filter(yearFilter => yearFilter==year);
                    let posicion_realizado;
                    let posicion_pendiente;

                    this.filtrar_muestras_realizadas = [],
                    this.filtrar_muestras_pendientes = [],

                    this.filter_year = resultado;

                    this.clave_muestras_anual_realizadas.indexOf('R'+year);
                    this.clave_muestras_anual_pendientes.indexOf('P'+year);

                    posicion_realizado = this.clave_muestras_anual_realizadas.indexOf('R'+year);
                    posicion_pendiente = this.clave_muestras_anual_pendientes.indexOf('P'+year);

                    


                    console.log(resultado);
                    console.log("AASASASASS");
                    console.log(this.clave_muestras_anual_realizadas.indexOf('R'+year));
   

                    this.filtrar_muestras_realizadas.push(this.muestras_anual_realizadas[posicion_realizado]);
                    this.filtrar_muestras_pendientes.push(this.muestras_anual_pendientes[posicion_pendiente]);

                    this.obtenerCantidadAnalisisPorMes(year);
                }
            }
        },
        methods: {
            mostrarInfo() {
               this.rol_descripcion = user_roles.find(user => user.id_rol == store.getters.rol).descripcion;
            },
            obtenerUsuarios(){
                personalService.obtenerTodosPersonal().then((response) => {
                    if(response!=null){
                        for (let index = 0; index < response.data.length; index++) {
                            this.usuario.push(response.data[index].nombre);
                            this.numero.push(index);
                        }
                        console.log("Usuarios")
                        console.log(this.usuario);
                        this.$forceUpdate();
                    }
                })
            },
            obtenerMuestras(){
                axios.get('http://127.0.0.1:8000/api/obtener-muestras1').then(response => {
                console.log('respuesta');
                console.log(response.data);
                
                for (let index = 0; index < response.data.length; index++) {
                    const nombre = response.data[index].nombre;
                    const analisis_pendiente = response.data[index].muestras_pendientes
                    const analisis_realizado = response.data[index].muestras_entregadas
                    this.empleados.push(nombre);
                    this.muestras_realizadas.push(analisis_realizado);
                    this.muestras_pendientes.push(analisis_pendiente)
                    
                }

                console.log(this.empleados);
                console.log(this.muestras_realizadas);
                console.log(this.muestras_pendientes);



            })
            .catch(error => {
                console.log('Error', error);
            });
            },
            obtenerMuestrasPorNorma(){
            axios.get('http://127.0.0.1:8000/api/obtencion-muestras-norma').then(response => {
                console.log('respuesta');
                this.cantidad.push(response.data[0].DS46)
                this.cantidad.push(response.data[0].DS90)
                this.cantidad.push(response.data[0].NCh1333)
                this.cantidad.push(response.data[0].NCh409)
                console.log(this.cantidad); 
                
            })
            .catch(error => {
                console.log('Error', error);
            });

        },

        obtenerCantidadAnalisisPorAnio(){
            let year_now = new Date().getFullYear();
            let last_year = year_now + 1;
            let two_years_ago = year_now + 2;


            this.years.push(year_now);
            this.years.push(last_year);
            this.years.push(two_years_ago);
            axios.get('http://127.0.0.1:8000/api/obtener-muestras-anual').then(response => {
                console.log('respuesta cantidad de muestras anual');
                //this.cantidad.push(response.data[0].DS46)
                console.log(response.data);
                this.listado_muestra_realizadas_pendientes = response.data[0];
                
                this.muestras_anual_realizadas.push(response.data[0]['R'+year_now]);
                this.muestras_anual_realizadas.push(response.data[0]['R'+last_year]);
                this.muestras_anual_realizadas.push(response.data[0]['R'+two_years_ago]);

                this.muestras_anual_pendientes.push(response.data[0]['P'+year_now]);
                this.muestras_anual_pendientes.push(response.data[0]['P'+last_year]);
                this.muestras_anual_pendientes.push(response.data[0]['P'+two_years_ago]);
                
            })
            .catch(error => {
                console.log('Error', error);
            });

            this.clave_muestras_anual_realizadas.push('R'+year_now);
            this.clave_muestras_anual_realizadas.push('R'+last_year);
            this.clave_muestras_anual_realizadas.push('R'+two_years_ago);
                
            this.clave_muestras_anual_pendientes.push('P'+year_now);
            this.clave_muestras_anual_pendientes.push('P'+last_year);
            this.clave_muestras_anual_pendientes.push('P'+two_years_ago);

            this.filter_year = this.years;
            this.filtrar_muestras_realizadas = this.muestras_anual_realizadas;
            this.filtrar_muestras_pendientes = this.muestras_anual_pendientes;




            console.log(this.filtrar_muestras_realizadas);
            console.log(this.filtrar_muestras_pendientes);
            
        },

        obtenerCantidadAnalisisPorMes(year){
            this.muestras_mensual_pendientes = [];
            this.muestras_mensual_realizadas = [];
            axios.get('http://127.0.0.1:8000/api/obtener-muestras-mensual/'+year).then(response => {
                console.log('Entró denuevo');
                console.log(response.data[0]);

                for (let index = 1; index <= 12; index++) {
                    this.muestras_mensual_pendientes.push(parseInt(response.data[0]['P'+index]));
                    this.muestras_mensual_realizadas.push(parseInt(response.data[0]['R'+index]));
                    
                }
                //this.muestras_mensual_realizadas.push(response.data[0]['R'+year_now]);
                
            })
            .catch(error => {
                console.log('Error', error);
            });

        },
            

        }
    }  

</script>

<style scoped>


    .content {
        position: relative;
        min-height: 40vh;
    }
    .content .cards1 {
        padding: 30px 15px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;

    }
    .content .cards1 .card1{
        width: 250px;
        height: 150px;
        margin: 20px 10px;
        display: flex;
        align-items: center;
        justify-content: space-around;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
    }
    .custom-img{
        width: 40px;
        height: 40px;
    }


    .content .content-2{
        min-height: 40vh;
        display: flex;
        justify-content: space-around;
        align-items: flex-start;
        flex-wrap: wrap;
    }


    .content-2{
        min-height: 60vh;
        display: flex;
        justify-content: space-around;
        align-items: flex-start;
    }

    .content-2 .recent{
        flex:5;
        min-height: 50vh;
        margin: 0 25px 25px 25px;
        background: white;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
    }
    .content-2 .new{
        flex:2;
        background: white;
        min-height: 70vh;
        margin: 0 25px;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
    }

    .title{
        display: flex;
        align-items: center;
        justify-content: space-around;
        padding: 15px 10px;
        border-bottom: 2px solid #999;
    }


    .color{
        background: #f1f1f1;
    }

    .DS46, .DS90, .NCh1333, .NCh409{
        display:grid;
        grid-template-columns: 50% 5% 45%;
    }
    .normas{
        margin-top: 100px;
        display: grid;
        grid-template-columns: repeat(4,25%);
    }
    .DS46-color{
        background-color: red;
        width:100%;
        height: 20px;
    }

    .DS90-color{
        background-color: yellow;
        width:100%;
        height: 20px;
    }
    .NCh1333-color{
        background-color: green;
        width:100%;
        height: 20px;
    }
    .NCh409-color{
        background-color: blue;
        width:100%;
        height: 20px;
    }
    canvas{
        width:100%;
    }
    .chart3{
        display:grid;
        grid-template-columns: 100%;
    }
    .chart3-muestras-mensual{
        background: white;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
    }

    
</style>