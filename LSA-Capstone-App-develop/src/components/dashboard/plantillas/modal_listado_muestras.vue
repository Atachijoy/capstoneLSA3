<template>
    <div style="background-color:#f1f1f1">
        <div v-if="analista==false">
        <div class="listado-muestra-titulo">
                <h1 style="margin-bottom: -0.9rem;">Muestras Recepcionadas <hr></h1>
            </div>
        <section class="listado-muestra">
            <div class="listado-muestra-contenido">
                <table class="tabla">
                    <tr>
                        <th>RUM</th>
                        <th>RUT EMPRESA</th>
                        <th>NOMBRE EMPRESA</th>
                        <th>MUESTREADO POR</th>
                        <th>CANTIDAD DE MUESTRAS</th>
                        <th>PRIORIDAD</th>
                        <th>FECHA DE MUESTREO</th>
                        <th>NORMA</th>
                        <th>MATRIZ</th>
                        <th>INGRESADO POR</th>
                        <th>ROL</th>
                        <th>ESTADO</th>
                    </tr>

                    <tr v-for="(muestra,index) in muestrasPaginados2" :key="index">
                        <td>{{ muestra.RUM }}</td>
                        <td>{{ muestra.rut_empresa }}</td>
                        <td>{{ muestra.nombre_empresa }}</td>
                        <td>{{ muestra.muestreado_por }}</td>
                        <td>{{ muestra.cantidad_muestras }}</td>
                        <td>{{ muestra.prioridad }}</td>
                        <td>{{ muestra.fecha_completa }}</td>
                        <td>{{ muestra.nombre_norma }}</td>
                        <td>{{ muestra.nombre_matriz }}</td>
                        <td>{{ muestra.nombre_completo }}</td>
                        <td>{{ muestra.rol }}</td>
                        <td>{{ muestra.estado }}</td>
                    </tr>
                </table>
                <div class="pagination-controls">
                    <button @click="paginaAnterior2" :disabled="paginaActual2 === 0">Anterior</button>
                    <button @click="paginaSiguiente2" :disabled="paginaActual2 === totalPaginas2 - 1">Siguiente</button>
                </div>
            </div>

        </section>


        <section class="informacion" style="margin-top:30px;">
            <div class="informacion-empleados">
                <label for="">Seleccionar Muestra</label>
                <select v-model="muestra">
                <option disabled selected value= "" >Selecciona una Muestra</option>
                    <option v-for="opcion in muestras" :key="opcion.RUM" :value="opcion.RUM">
                    {{ opcion.RUM }}
                    </option>
                </select>
                <table>
                    <tr>
                        <th>EMPLEADO</th>
                        <th>ORDEN DE ANÁLISIS</th>
                        <th>Parametro</th>
                        <th>Fecha Entrega</th>
                        <th>Estado</th>
                    </tr>
                    <tr v-for="(empleado,index) in empleadosPaginados" :key="index">
                        <td>{{empleado.nombre}}</td>
                        <td>{{empleado.orden_de_analisis}}</td>
                        <td>{{empleado.nombre_parametro}}</td>
                        <td>{{empleado.fecha_entrega}}</td>
                        <td>{{empleado.estado}}</td>
                    </tr>

                </table>
                <div class="pagination-controls">
                    <button @click="paginaAnterior" :disabled="paginaActual === 0">Anterior</button>
                    <button @click="paginaSiguiente" :disabled="paginaActual === totalPaginas - 1">Siguiente</button>
                </div>


            </div>

            <div class="informacion-tarjetas">
                    <div class="tarjeta1">
                        <h2>CANTIDAD DE MUESTRAS A FINALIZAR</h2>
                        <div class="tarjeta1-contenido">
                            <h1 style="text-align: center; margin-top: 15px; margin-right: 30px;">{{ MuestrasPorFinalizar }} Muestra(s) <hr></h1>
                        </div>
                    </div>
                    <div class="tarjeta2">
                        <h2 style="padding-bottom: 15px;">CANTIDAD DE ANÁLISIS PENDIENTES</h2>
                        <div class="tarjeta2-contenido">
                            <h1 style="text-align: center;">{{ AnalisisPendientes }} Análisis <hr></h1>
                        </div>
                    </div>
                    <div class="tarjeta3">
                        <div class="contenido">
                            <h2 style="padding-bottom: 20px">CANTIDAD DE MUESTRAS ATRASADAS</h2>
                            <div class="tarjeta3-contenido">
                            <h1 style="padding-right: 100px;">{{ MuestrasAtrasadas }} Muestra(s) <hr></h1>
                        </div>
                        </div>
                    </div>
            </div>
        </section>
    </div>

    <div v-else>
        <div class="listado-muestra-titulo">
                <h1 style="margin-bottom: -0.9rem;">Muestras Recepcionadas <hr></h1>
        </div>
        <section class="listado-muestra" style="height: 600px;">
            <div class="listado-muestra-contenido">
                <table class="tabla">
                    <tr>
                        <th>RUM</th>
                        <th>RUT EMPRESA</th>
                        <th>NOMBRE EMPRESA</th>
                        <th>MUESTREADO POR</th>
                        <th>CANTIDAD DE MUESTRAS</th>
                        <th>PRIORIDAD</th>
                        <th>FECHA DE MUESTREO</th>
                        <th>NORMA</th>
                        <th>MATRIZ</th>
                        <th>INGRESADO POR</th>
                        <th>ROL</th>
                        <th>ESTADO</th>
                    </tr>

                    <tr v-for="(muestra,index) in muestrasPaginados2" :key="index">
                        <td>{{ muestra.RUM }}</td>
                        <td>{{ muestra.rut_empresa }}</td>
                        <td>{{ muestra.nombre_empresa }}</td>
                        <td>{{ muestra.muestreado_por }}</td>
                        <td>{{ muestra.cantidad_muestras }}</td>
                        <td>{{ muestra.prioridad }}</td>
                        <td>{{ muestra.fecha_completa }}</td>
                        <td>{{ muestra.nombre_norma }}</td>
                        <td>{{ muestra.nombre_matriz }}</td>
                        <td>{{ muestra.nombre_completo }}</td>
                        <td>{{ muestra.rol }}</td>
                        <td>{{ muestra.estado }}</td>
                    </tr>
                </table>
                <div class="pagination-controls">
                    <button @click="paginaAnterior2" :disabled="paginaActual2 === 0">Anterior</button>
                    <button @click="paginaSiguiente2" :disabled="paginaActual2 === totalPaginas2 - 1">Siguiente</button>
                </div>
            </div>

        </section>
    </div>
    </div>
</template>

<script>

import axios from 'axios';

import { getUserInfo } from '@/helpers/api-services/Auth.service';
import { isLoggedIn } from '@/helpers/api-services/Auth.service';

export default {
    data() {
        return {
            selectSize: 1,
            muestra: 0,
            muestras: [],
            muestras2: [],
            empleados: [],
            empleado: false,
            MuestrasPorFinalizar: 0,
            MuestrasAtrasadas:0,
            AnalisisPendientes: 0,

            rut_empleado: 0,

            //para paginación seleccionar muestras

            empleadosPorPagina: 4,
            paginaActual: 0,


            //para paginación muestras ingresadas

            muestrasPorPagina2: 3,
            paginaActual2: 0,
        }
    },
    props:{
        analista: Boolean,
    },
    watch:{
        muestra(valor){
            axios.get('http://127.0.0.1:8000/api/obtener-empleado/'+valor).then(response => {
                console.log('respuesta');
                console.log(response.data);

                this.empleados = response.data;

                console.log(this.empleados);
            })
            .catch(error => {
                console.log('Error', error);
            });
        }
    },
    computed: {
        totalPaginas(){
            return Math.ceil(this.empleados.length / this.empleadosPorPagina);
        },
        empleadosPaginados(){
            const inicio = this.paginaActual * this.empleadosPorPagina;

            console.log(this.empleados.slice(inicio, inicio + this.empleadosPorPagina));
            return this.empleados.slice(inicio, inicio + this.empleadosPorPagina);
        },
        totalPaginas2(){
            return Math.ceil(this.muestras2.length / this.muestrasPorPagina2);
        },
        muestrasPaginados2(){
            const inicio = this.paginaActual2 * this.muestrasPorPagina2;

            console.log(this.muestras2.slice(inicio, inicio + this.muestrasPorPagina2));
            return this.muestras2.slice(inicio, inicio + this.muestrasPorPagina2);
        }
    },
    mounted(){
        this.retornarDatoUsuario();
        this.obtenerMuestras();
        this.obtenerMuestras2();
        this.cantidadMuestrasPorFinalizar();
        this.cantidadAnalisisPendientes();
        this.cantidadMuestrasAtrasadas();
    },
    methods: {

        alternarOpcion(){
            this.selectSize = this.selectSize === 1 ? 3 : 1; 
        },
        retornarDatoUsuario(){
            if(isLoggedIn()){
                this.datosUser = getUserInfo();
                console.log('Obteniendo datos del usuario.')
                console.log(this.datosUser);
                this.rut_empleado = this.datosUser.rut;

            }
        },
        obtenerMuestras(){
            this.empleado = this.analista; 
            console.log(this.analista,'AJSHAHSJASHASJHAS');
            axios.get('http://127.0.0.1:8000/api/obtener-muestras').then(response => {
                console.log(response.data);
                this.muestras = response.data;

                console.log(this.muestras.RUM);
            })
            .catch(error => {
                console.log('Error', error);
            });
        },
        obtenerMuestras2(){
            axios.get('http://127.0.0.1:8000/api/obtencion-muestras/'+this.rut_empleado).then(response => {
                console.log(response.data);
                this.muestras2 = response.data;

                console.log(this.muestras2.RUM);
            })
            .catch(error => {
                console.log('Error', error);
            });
        },
        paginaSiguiente(){
            if(this.paginaActual < this.totalPaginas - 1){
                this.paginaActual++;
            }
        },
        paginaAnterior(){
            if(this.paginaActual > 0){
                this.paginaActual--;
            }
        },
        paginaSiguiente2(){
            if(this.paginaActual2 < this.totalPaginas2 - 1){
                this.paginaActual2++;
            }
        },
        paginaAnterior2(){
            if(this.paginaActual2 > 0){
                this.paginaActual2--;
            }
        },
        cantidadMuestrasPorFinalizar(){
            axios.get('http://127.0.0.1:8000/api/obtencion-muestras-por-finalizar').then(response => {
                console.log(response.data);
                this.MuestrasPorFinalizar = response.data
            })
            .catch(error => {
                console.log('Error', error);
            });
        },
        cantidadAnalisisPendientes(){
            axios.get('http://127.0.0.1:8000/api/obtencion-analisis-pendientes').then(response => {
                console.log(response.data);
                this.AnalisisPendientes = response.data
            })
            .catch(error => {
                console.log('Error', error);
            });
        },
        cantidadMuestrasAtrasadas(){
            axios.get('http://127.0.0.1:8000/api/obtencion-muestras-atrasadas').then(response => {
                console.log(response.data);
                this.MuestrasAtrasadas = response.data
            })
            .catch(error => {
                console.log('Error', error);
            });
        }
    },
    
}

</script>

<style>

.listado-muestra{
    display:grid;
    grid-template-columns: 100%;
    background: #f1f1f1;
}


.listado-muestra-titulo{
    background-color: #93C0E4;
}
.listado-muestra-contenido td{
    font-size:15px;
}
.tabla th{
    width: 8%;
    border-bottom: 1px solid #000;
    border-right: 1px solid #000;
    background-color: #F4EFEF;
}
.tabla td{
    padding-top: 0.5%;
}

.informacion {
    height: 300px;
    display: flex;

}
.informacion-empleados{
    height: 100%;
    width: 40%;
    background-color: #BEE9FA;
}
.informacion-empleados select {
    max-width: 200px;
}

.informacion-empleados th {
    width: 5%;
}
.informacion-empleados td {
    font-size: 12px;
    padding-top: 20px;
}
.informacion-tarjetas {
    height: 100%;
    width: 60%;
    background-color: #f1f1f1;
    display: flex;
    flex-wrap: wrap;

}

.tarjeta1{
    height: 50%;
    width: 50%;
    background-color: #FFC584;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);

}

.tarjeta1-contenido{
    display: flex;
    justify-content: center;
    padding-left: 10%;
}

img{
    width: 130px;
    height: 100px;
}
h2{
    font-size: 16px;
}

.tarjeta2{
    height: 50%;
    width: 50%;
    background-color: #FFC584;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
}
.tarjeta2-contenido {
    display: flex;
    justify-content: center;
}



.tarjeta3{
    height: 50%;
    padding-left: 20%;
    padding-right: 20%;
    width: 100%;
    
}
.tarjeta3 .contenido{
    height: 100%;
    width:100%;
    background-color: #fb6868;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
}

.tarjeta3-contenido{
    display: flex;
    justify-content: center;
    padding-left: 20%;
}



</style>