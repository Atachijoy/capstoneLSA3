<template>
    <div>
        <div class="contenedor">
            <section class="contenido1">
                <h3>Muestras por Mes</h3>
                <div class="contenido1_selector">
                    <div class="tarjeta">
                        <label>Selección:</label>
                    </div>
                <select id="opciones" v-model="fecha">
                    <option value="0" disabled selected>Mes</option>
                    <option value="01">Enero</option>
                    <option value="02">Febrero</option>
                    <option value="03">Marzo</option>
                    <option value="04">Abril</option>
                    <option value="05">Mayo</option>
                    <option value="06">Junio</option>
                    <option value="07">Julio</option>
                    <option value="08">Agosto</option>
                    <option value="09">Septiembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Noviembre</option>
                    <option value="12">Diciembre</option>
                </select>
                </div>
                <div class="contenido1_tabla">
                    <table>
                        <thead>
                            <tr>
                                <th>
                                    RUM
                                </th>
                                <th>
                                    Encargado
                                </th>
                                <th>
                                    Fecha Muestreo
                                </th>
                                <th>
                                    Prioridad
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(muestra,index) in muestras" :key="index">
                                <td>{{muestra.RUM}}</td>
                                <td>{{muestra.nombre_completo}}</td>
                                <td>{{muestra.fecha}}</td>
                                <td>{{muestra.prioridad}}</td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </section>

            <section class="contenido2">
                <div class="tarjeta_year">
                    <h1 style="color: #eeeaea;">Análisis finalizados del año</h1>
                    <div class="tarjeta_year-contenido">
                        <div class="valor">
                            <div style="padding-top: 50px;">
                                <h1>{{ cantidadAnalisisFinalizados }}</h1>
                                <hr>
                            </div>
                            <h2>ANALISIS</h2>
                        </div>
                    </div>
                </div>

                <div class="tarjeta_pend">
                    <h1 style="color: #f1f1f1;">Análisis pendientes del año</h1>
                    <div class="tarjeta_pend-contenido">
                        <div class="valor">
                            <div style="padding-top: 50px;">
                                <h1>{{ cantidadAnalisisPendientes }}</h1>
                                <hr>
                            </div>
                            <h2>ANALISIS</h2>
                        </div>
                    </div>
                </div>
            </section>

            <section class="contenido3">
                <h3>Muestras atrasadas</h3>
                <div class="contenido3_tabla" style="margin-top: 40px;">
                    <table>
                            <thead>
                                <tr>
                                    <th>
                                        RUM
                                    </th>
                                    <th>
                                        Encargado
                                    </th>
                                    <th>
                                        Fecha
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(muestra,index) in muestrasAtrasadas" :key="index">
                                <td>{{muestra.RUM}}</td>
                                <td>{{muestra.nombre_completo}}</td>
                                <td>{{muestra.fecha_entrega}}</td>
                            </tr>
                        </tbody>

                        </table>
                    </div>
            </section>
        </div>
    </div>
</template>


<script>

import axios from 'axios';
export default{
    data(){
        return{
            selectSize: 1,
            fecha: 0,
            muestras: [],

            cantidadAnalisisFinalizados: 0,
            cantidadAnalisisPendientes: 0,


            muestrasAtrasadas: [],
        }
    },
    watch: {
        fecha(mes){
            axios.get('http://127.0.0.1:8000/api/obtencion-muestras-mes/'+mes).then(response => {
                console.log('respuesta');
                console.log(response.data);

                this.muestras = response.data;

                console.log(this.muestras);
            })
            .catch(error => {
                console.log('Error', error);
            });
        }
    },
    mounted() {
        this.obtenerAnalisisAnual();
        this.obtenerAnalisisPendientes();
        this.obtenerMuestrasAtrasadas();
    },
    methods: {
        alternarOpcion(){
            this.selectSize = this.selectSize === 1 ? 3 : 1; 
        },
        obtenerAnalisisAnual(){
            axios.get('http://127.0.0.1:8000/api/obtencion-analisis-finalizados').then(response => {
                console.log(response.data);
                this.cantidadAnalisisFinalizados = response.data
            })
            .catch(error => {
                console.log('Error', error);
            });
        },
        obtenerAnalisisPendientes(){
            axios.get('http://127.0.0.1:8000/api/obtencion-analisis-pendientes').then(response => {
                console.log(response.data);
                this.cantidadAnalisisPendientes = response.data
            })
            .catch(error => {
                console.log('Error', error);
            });
        },
        obtenerMuestrasAtrasadas(){
            axios.get('http://127.0.0.1:8000/api/obtencion-muestras-atrasadas-listado').then(response => {
                console.log(response.data);
                this.muestrasAtrasadas = response.data;
            })
            .catch(error => {
                console.log('Error', error);
            });
        },
    },
    
}


</script>

<style scoped>

.contenedor{
    display: flex;
    justify-content: space-between;
    padding: 2%;
    height: 600px;
}

.contenedor .contenido1{
    width: 33%;
    background-color: #f1f1f1;
    padding-right: 20px;
}

.contenido1_tabla th{
    width: 8%;
}

.contenido1_tabla{
    border-collapse: collapse;
    box-shadow: 0 0 20px rgba(0,0,0,0.15);
}


.contenido1_tabla thead tr{
    background-color: #E18025;
    color: #ffff;
}

.contenido1_tabla tbody tr{
    border-bottom: 1px solid #dddddd;
}

.contenido1_tabla tbody tr:nth-of-type(even){
    background-color: #d4cfcf;
}

.contenido1_tabla tbody tr:last-of-type {
    border-bottom: 2px solid #f1f1f1;
    border-right: 2px solid #f1f1f1;
}
.contenido1_tabla th,td{
    border-left: 1px solid #000;
}

.contenido1 .contenido1_selector{
    display: flex;
    align-items: flex-start;
    justify-content: center;
    padding-bottom: 10px;
}

.contenido1_selector .tarjeta{
    width: 100px;
    text-align: center;
}

.contenido1_selector .tarjeta label{
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
    background-color: red;
    font-size: 15px;
}








.contenedor .contenido2{
    width: 33%;
    
}


.contenido2{
    background-color: #f1f1f1;
}
.contenido2 .tarjeta_year{
    width: 100%;
    height: 200px;
    background-color: #93C0E4;
    margin-top: 50px;
    margin-bottom: 50px;
}

.tarjeta_year h1{
    font-size: 30px;
}

.tarjeta_year-contenido img{
    height: 150px;
    width: 150px;
}

.tarjeta_year-contenido .valor{
    width: 300px;
    border-radius: 200px 200px 0 0;
    background-color: #E18025;
}






.tarjeta_year-contenido{
    display: flex;
    justify-content: center;
}




.contenido2 .tarjeta_pend{
    width: 100%;
    height: 200px;
    background-color: rgb(0,70,127);
}

.tarjeta_pend h1{
    font-size: 30px;
}

.tarjeta_pend-contenido img{
    height: 150px;
    width: 150px;
}

.tarjeta_pend-contenido .valor{
    width: 300px;
    border-radius: 200px 200px 0 0;
    background-color: #FFC584;
}

.tarjeta_pend-contenido {
    display: flex;
    justify-content: center;
}






.contenedor .contenido3{
    width: 33%;
    background-color: rgb(234, 244, 234);
}

.contenido3_tabla th{
    width: 8%;
}

.contenido3_tabla{
    border-collapse: collapse;
    box-shadow: 0 0 20px rgba(0,0,0,0.15);
}


.contenido3_tabla thead tr{
    background-color: #d7694b;
    color: #ffff;
}

.contenido3_tabla tbody tr{
    border-bottom: 1px solid #dddddd;
}

.contenido3_tabla tbody tr:nth-of-type(even){
    background-color: #d4cfcf;
}

.contenido3_tabla tbody tr:last-of-type {
    border-bottom: 2px solid #f1f1f1;
    border-right: 2px solid #f1f1f1;
}
.contenido3_tabla th td{
    border-left: 1px solid #000;
}







</style>