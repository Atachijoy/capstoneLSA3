<template>
    <b-modal id="modal-evaluar-proveedor" title="Evaluar proveedor" size="xl">


        <section class="group0">

            <div class="section1">
                <div style="display: grid; align-items: center;">
                    <img :src="require('@/assets/ucn.png')" style="height: 120px;" alt="Image 1">
                    <strong style="color: #1F497D; text-align: center;">PG-3F-5</strong>

                </div>
            </div>

            <div class="section1" style="width: 50%; align-self: center; font-size: 20px; text-align: center;">
                <strong style="color: #1F497D;">EVALUACIÓN DE PROVEEDORES <br>8° Versión</strong>
            </div>

            <div>
                <img :src="require('@/assets/LSA.png')" style="height: 140px; padding: 5px" alt="Image 1">
            </div>

        </section>

        <section class="group1">
            <div class="section1" style="width: 60%; font-size: 18px;">
                <div class="space">
                    <strong>Proveedor: </strong>
                    <!--                     <input style="width: 46%;"> -->
                    <select v-model="proveedor">
                        <option v-for="p in proveedores" :key="p.rut" :value="p.rut" required>
                            {{ p.nombre_empresa }} </option>
                    </select>
                </div>

                <div class="space">
                    <strong>R.U.T: </strong>
                    <span style="width: 46%;">{{ this.proveedor }}</span>
                </div>

                <div class="space">
                    <strong>Persona contacto: </strong>
                    <input style="width: 46%;">
                </div>

                <div class="space">
                    <strong>Correo electrónico: </strong>
                    <input style="width: 46%;" v-model="correo_proveedor">
                </div>

                <div class="space">
                    <strong>Dirección: </strong>
                    <input style="width: 46%;">
                </div>

                <div class="space">
                    <strong>Comuna/Ciudad: </strong>
                    <input style="width: 46%;">
                </div>

                <div class="space">
                    <strong>Fono: </strong>
                    <input style="width: 46%;">
                </div>

            </div>
            <div style="margin-left: auto; margin-right: 2%; padding-top: 0%;">
                <table style="padding: 4%; font-size: 18px;">
                    <tr>
                        <th>Dia</th>
                        <th>mes</th>
                        <th>año</th>
                    </tr>
                    <tr>
                        <td>{{ this.dia }}</td>
                        <td>{{ this.mes }}</td>
                        <td>{{ this.anio }}</td>
                    </tr>
                </table>
            </div>
        </section>

        <section class="group2">

            <label class="borde"><b>COMPRAS Y/O SUMINISTROS</b></label>
            <label style="font-size: 15px; border-top: 1px solid black; 
            border-bottom: 1px solid black;"><b>Cumple</b></label>

            <div class="borde" style="text-align: center; background-color: #C5D9F1;">
                <span style="width: 100%; height: 100%;"><b>Puntaje</b></span>
                <div class="max-asign">
                    <span style="margin-left: 0%; width: 50%;border-top: 1px solid black; 
                    border-right: 1px solid black;"><b>Max.</b></span>
                    <span style="width: 50%; border-top: 1px solid black;"><b>Asig.</b></span>
                </div>
            </div>
        </section>

        <section class="group3" style="">

            <div style="width: 10%;">
                <label style="background-color: white; border-left: 1px solid black;
                    border-bottom: 1px solid black;"><b>Calidad de Servicios</b></label>
            </div>

            <div class="borde" style="width: 70.1%; border-top:0; ">

                <div style="display: flex; border-bottom: 1px solid black; padding: 0%;">

                    <div style="padding: 2%; display: flex; width: 85.7%; border-right: 1px solid black;">

                        <li></li>
                        <span style="width: 91.8%; height: ;">
                            El proveedor Cuenta con un sistema de gestión de calidad certificada ISO 9000 o equivalente.
                        </span>

                    </div>
                    <div style="width: 14.4%; display: flex;">
                        <input type="checkbox" style="transform: scale(1.5); margin-left: 40%;"
                            @click="aumentarValorCalidad()">
                    </div>
                </div>


                <div style="display: flex; border-bottom: 1px solid black; padding: 0%;">

                    <div style="padding: 2%; display: flex; width: 85.7%; border-right: 1px solid black;">

                        <li></li>
                        <span style="width: 91.8%; height: ;">
                            Los productos entregados estaban en buenas condiciones.
                        </span>

                    </div>
                    <div style="width: 14.4%; display: flex;">
                        <input type="checkbox" style="transform: scale(1.5); margin-left: 40%;"
                            @click="aumentarValorCalidad()">
                    </div>
                </div>

                <div style="display: flex; border-bottom: 1px solid black; padding: 0%;">

                    <div style="padding: 2%; display: flex; width: 85.7%; border-right: 1px solid black;">

                        <li></li>
                        <span style="width: 91.8%; height: ;">
                            Suministra información técnica adecuada (certificados de calidad, fichas de seguridad
                            , cátalogos, etc.).

                        </span>

                    </div>
                    <div style="width: 14.4%; display: flex;">
                        <input type="checkbox" style="transform: scale(1.5); margin-left: 40%;"
                            @click="aumentarValorCalidad()">
                    </div>
                </div>


                <div style="display: flex; border-bottom: 1px solid black; padding: 0%;">

                    <div style="padding: 2%; display: flex; width: 85.7%; border-right: 1px solid black;">

                        <li></li>
                        <span style="width: 91.8%; height: ;">
                            Durante la ejecución, se pudo verificar que los productos y personal presentaron
                            las especificaciones tecnicas
                            requeridas y evidenciaron su calidad.

                        </span>

                    </div>
                    <div style="width: 14.4%; display: flex;">
                        <input type="checkbox" style="transform: scale(1.5); margin-left: 40%;"
                            @click="aumentarValorCalidad()">
                    </div>
                </div>


                <div style="display: flex; border-bottom: 1px solid black; padding: 0%;">

                    <div style="padding: 2%; display: flex; width: 85.7%; border-right: 1px solid black;">

                        <li></li>
                        <span style="width: 91.8%; height: ;">
                            Las condiciones ambientales en los cuales se envian los productos y/o efectúan los
                            ensayos,
                            calibraciones o mantenciones son las adecuadas.
                        </span>

                    </div>
                    <div style="width: 14.4%; display: flex;">
                        <input type="checkbox" style="transform: scale(1.5); margin-left: 40%;"
                            @click="aumentarValorCalidad()">
                    </div>
                </div>


                <div style="display: flex; border-bottom: 1px solid black; padding: 0%;">

                    <div style="padding: 2%; display: flex; width: 85.7%; border-right: 1px solid black;">

                        <li></li>
                        <span style="width: 91.8%; height: ;">
                            En el caso de utilizar las garantias, estas son efectivas.
                        </span>

                    </div>
                    <div style="width: 14.4%; display: flex;">
                        <input type="checkbox" style="transform: scale(1.5); margin-left: 40%; height: 100%;"
                            @click="aumentarValorCalidad()">
                    </div>
                </div>



                <div style="display: flex; border-bottom: 1px solid black; padding: 0%;">

                    <div style="padding: 2%; display: flex; width: 85.7%; border-right: 1px solid black;">

                        <li></li>
                        <span style="width: 91.8%;">
                            Seguridad: el transporte y almacenamiento durante el traslado se realizó en buenas condiciones.
                        </span>

                    </div>
                    <div style="width: 14.4%; display: flex;">
                        <input type="checkbox" style="transform: scale(1.5); margin-left: 40%;"
                            @click="aumentarValorCalidad()">
                    </div>
                </div>


                <div style="display: flex; padding: 0%;">

                    <div style="padding: 2%; display: flex; width: 85.7%; border-right: 1px solid black;">

                        <li></li>
                        <span style="width: 91.8%; height: ;">
                            En las solicitudes de soporte técnico, los tiempos de respuestas fueron oportunos.
                        </span>

                    </div>
                    <div style="width: 14.4%; display: flex;">
                        <input type="checkbox" style="transform: scale(1.5); margin-left: 40%;"
                            @click="aumentarValorCalidad()">
                    </div>
                </div>

            </div>



            <section style="width: 9.88%; border-right: 1px solid black; border-bottom: 1px solid black;">

                <div style="margin-top:280px; padding-left: 35%;" class="seccion4 ">
                    <strong>70 </strong>
                </div>

            </section>

            <div style="width: 10%; border-right: 1px solid black; border-bottom: 1px solid black;">
                <div style="margin-top: 280px; margin-left: 50%;">
                    {{ this.calidad_valor_asignado }}
                </div> 
            </div>
        </section>

        <section style="display: flex;">

            <div style="width: 10.15%;text-align: center; margin: 0%; border-left: 1px solid black; 
            border-bottom: 1px solid black; border-right: 1px solid black;">
                <strong style="font-size: 90%;">Cumplimiento en cantidades</strong>
            </div>

            <div style="display: flex; border-bottom: 1px solid black; padding: 0%; width: 69.93%;">

                <div style="padding: 2%; display: flex; width: 747px; border-right: 1px solid black;">

                    <li></li>
                    <span style="width: 91.5%;">
                        Cumplimiento en la entrega de cantidades solicitadas.
                    </span>

                </div>
                <div style="width: 16.3%; display: flex; border-right: 1px solid black;">
                    <input type="checkbox" style="transform: scale(1.5); margin-left: 40%;"
                        @click="aumentarValorCantidad()">
                </div>
            </div>

            <div style="width: 9.89%; border-bottom: 1px solid black; border-right: 1px solid black;">
                <div style="margin-top:15px; padding-left: 35%;">
                    <strong>10</strong>
                </div>

            </div>

            <div style="width: 10%;border-right: 1px solid black; border-bottom: 1px solid black;">
                <div style="margin-top: 18%; margin-left: 50%;">
                    {{ this.cantidad_valor_asignado }}

                </div>
            </div>
        </section>

        <section style="display: flex;">

            <div style="width: 10.15%;text-align: center; margin: 0%; border-left: 1px solid black; 
                    border-bottom: 1px solid black; border-right: 1px solid black;">
                <strong style="font-size: 90%;">Cumplimiento en los tiempos de entrega</strong>
            </div>

            <div style="display: flex; border-bottom: 1px solid black; padding: 0%; width: 69.93%;">

                <div style="padding: 2%;padding-top: 3%; display: flex; width: 747px; border-right: 1px solid black;">

                    <li></li>
                    <span style="width: 91.5%;">
                        La entrega se realizó en los tiempos pactados en la orden de compra
                    </span>

                </div>
                <div style="width: 16.3%; display: flex; border-right: 1px solid black;">
                    <input type="checkbox" style="transform: scale(1.5); margin-left: 40%;" @click="aumentarValorTiempo()">
                </div>
            </div>

            <div style="width: 9.89%; border-bottom: 1px solid black; border-right: 1px solid black;">
                <div style="margin-top:15px; padding-left: 40%;">
                    <strong>10</strong>
                </div>

            </div>

            <div style="width: 10%;border-right: 1px solid black; border-bottom: 1px solid black;">
                <div style="margin-top: 20%; margin-left: 50%;">

                    {{ this.tiempo_valor_asignado }}
                </div>
            </div>
        </section>


        <section style="display: flex;">

            <div style="width: 10.15%;text-align: center; border-left: 1px solid black; 
                   border-bottom: 1px solid black; border-right: 1px solid black;
                   padding-top: 1.2%;">
                <strong style="font-size: 90%;">Servicio durante postventa</strong>
            </div>

            <div style="display: grid; border-bottom: 1px solid black; padding: 0%; width: 69.93%;">

                <div style="display: flex;">

                    <div style="padding: 2%;padding-top: 2%; display: flex; width: 747px; border-right: 1px solid black;
                    border-bottom: 1px solid black;">

                        <li></li>
                        <span style="width: 91.5%;">
                            Atención: atendió los reclamos realizados.
                        </span>

                    </div>
                    <div style="width: 16.3%; display: flex; border-right: 1px solid black;
                    border-bottom: 1px solid black; ;">
                        <input type="checkbox" style="transform: scale(1.5); margin-left: 40%;"
                            @click="aumentarValorPosVenta()">
                    </div>



                </div>


                <div style="padding: 1%;padding-top: 0%; display: flex; width: 773.0px; border-right: 1px solid black">

                    <div style="display: flex; width: 790px;
                    padding: 1%; border-right: 1px solid black;">

                        <li></li>
                        <span style="width: 89%;">
                            Oportunidad: dio respuesta oportuna a los requerimientos.
                        </span>
                    </div>

                    <div style="width: 16.3%; display: flex;">
                        <input type="checkbox" style="transform: scale(1.5); margin-left: 40%;"
                            @click="aumentarValorPosVenta()">
                    </div>
                </div>
            </div>

            <div style="width: 9.89%; border-right: 1px solid black; box-sizing: border-box;">
                <div style="margin-top:30px; padding-left: 40%;">
                    <strong>10</strong>
                </div>

            </div>

            <div style="width: 10%;border-right: 1px solid black; ;">
               <div style="margin-top: 30%; margin-left: 50%;">
                {{ this.postventa_valor_asignado }}

               </div>
            </div>
        </section>

        <section style="display: flex; width: 100%;">
            <strong style="font-size: 14px;">Observaciones:</strong>
            <div class="borde" style="margin-left: auto; width: 20%; display: flex">
                <div style="border-right: 1px solid black; width: 50%; text-align: center;">
                    <strong style="margin-right:10%;">100</strong>
                </div>
                <div style="text-align: center; width: 50%;">
                    <strong style="text-align: center;">{{ this.valor_total_asignado }}</strong>
                </div>
            </div>
        </section>

        <div style="width: 70%;">
            <textarea style="width: 100%; resize: none; font-size: 14px;"></textarea>
        </div>

        <div style="display: flex; padding-bottom: 2%; padding-top: 2%;">
            <strong style="padding-right: 1%; font-size: 14px;">Persona que realiza la evalucación:</strong>
            <span>{{ this.nombre_usuario }} {{ this.apellido_usuario }}</span>
        </div>


        <section style="display: grid;">

            <label style="width: 100%;"><b>INTERPRETACIÓN</b></label>
            <div class="borde" style="display: flex;">
                <div style="width: 15%;text-align: center; border-right: 1px solid black; padding-top: 2%;">
                    <span><b>CALIFICACIÓN:</b></span>
                </div>

                <div style="width: 43%; margin-left: 2%; height: 50%;">
                    <span>Mayor a 80 puntos<br>
                        Entre 60 y 70 puntos<br>
                        Menor a 60 puntos</span>
                </div>

                <div style="width: 42,5%; height: 10%;">
                    <span>
                        <li>El proveedor permanece por un periodo más</li>
                        <li>Entre 60 y 70 puntos</li>
                        <li>Menor a 60 puntos</li>
                    </span>
                </div>
            </div>

            <div style="display: flex; border-left: 1px solid black; border-bottom: 1px solid black;
                border-right: 1px solid black; height: 90px; align-items: center;">
                <div style="width: 19%; margin-left: 0.5%;">
                    <span><b>Nota 1:</b></span>
                </div>

                <div style="margin-right: 3%;">
                    <span>En caso de no aplicar parcial o totalmente alguno de los numerales
                        a evaluar el valor de este se deberá repartir proporcionalmente en los demás
                    </span>
                </div>
            </div>
        </section>

        <template #modal-footer="{ close }">
            <b-button variant="primary" size="xl" class="float-right reactive-button" style="font-weight:bold"
                @click="Sumbit()">
                Guardar
            </b-button>
            <b-button @click="close()" variant="primary" size="xl" class="float-right reactive-button"
                style="font-weight:bold">
                Cancelar
            </b-button>
        </template>

    </b-modal>
</template>

<script>
import axios from 'axios'
import {
    getUserInfo
} from "@/helpers/api-services/Auth.service";
import {
    isLoggedIn
} from "@/helpers/api-services/Auth.service";

export default {
    data() {
        return {

            calidad_valor_asignado: 0,
            cantidad_valor_asignado: 0,
            tiempo_valor_asignado: 0,
            postventa_valor_asignado: 0,

            valor_total_asignado: 0,
            observaciones: '',
            dia: '',
            mes: '',
            anio: '',
            userData: [],
            nombre_usuario: '',
            apellido_usuario: '',
            rut_usuario: '',
            proveedor: '',
            proveedores: [],
            rut_empleado: '',
            contacto_proveedor: '',
            correo_proveedor: '',
            direccion_proveedor: '',
            
        }
    },
    mounted() {
        this.obtenerFecha();
        this.obtenerProveedores();
        this.obtenerUsuario()
    },
    methods: {
        aumentarValorCalidad() {
            if (event.target.checked) {
                this.calidad_valor_asignado += 8.75
                this.aumentarTotalAsignado(8.75)
            } else {
                this.calidad_valor_asignado -= 8.75
                this.aumentarTotalAsignado(-8.75)
            }
        },
        aumentarValorCantidad() {
            if (event.target.checked) {
                this.cantidad_valor_asignado += 10
                this.aumentarTotalAsignado(10)
            } else {
                this.cantidad_valor_asignado -= 10
                this.aumentarTotalAsignado(-10)
            }
        },
        obtenerFecha() {
            const fechaActual = new Date();

            this.dia = fechaActual.getDate();
            this.mes = fechaActual.getMonth() + 1;
            this.anio = fechaActual.getFullYear();

        },
        aumentarValorTiempo() {
            if (event.target.checked) {
                this.tiempo_valor_asignado += 10
                this.aumentarTotalAsignado(10)
            } else {
                this.tiempo_valor_asignado -= 10
                this.aumentarTotalAsignado(-10)
            }
        },
        aumentarValorPosVenta() {
            if (event.target.checked) {
                this.postventa_valor_asignado += 5
                this.aumentarTotalAsignado(5)
            } else {
                this.postventa_valor_asignado -= 5
                this.aumentarTotalAsignado(-5)
            }
        },
        aumentarTotalAsignado(valor) {
            this.valor_total_asignado += valor
        },
        obtenerProveedores() {
            axios.get('http://127.0.0.1:8000/api/proveedores/').then((response) => {
                this.proveedores = response.data
                console.log(this.proveedores);
            }).catch(error => {
                console.log('el error', error)
            })
        },
        Sumbit() {
            if (this.proveedor == '') {
                window.confirm('No ha seleccionado ningún proveedor para evaluar');
            }
            else {
                var data = {
                    'valor_asignado': this.valor_total_asignado,
                    'observaciones': this.observaciones,
                    'fecha_evaluacion': `${this.dia}-${this.mes}-${this.anio}`,
                    'rut_proveedor': this.proveedor,
                    'rut_empleado': this.rut_empleado
                }
                axios.post('http://127.0.0.1:8000/api/proveedores/evaluarProveedor/', data).then(
                    
                    (response) => {
                        if (response != null) {
                            if (response.status == 200) {
                                console.log(response)
                            }

                            this.$bvModal.hide('modal-evaluar-proveedor')
                            this.$emit('refrescar')
                        }
                    }
                )

            }
        },
        obtenerUsuario() {
            if (isLoggedIn()) {
                this.userData = getUserInfo();
                this.rut_usuario = this.userData.rut
                this.nombre_usuario = this.userData.nombre
                this.apellido_usuario = this.userData.apellido
                
                this.obtenerRutEmpleado(this.userData.id)
            }
        },

        obtenerRutEmpleado(id_empleado)
        {
            axios.get('http://127.0.0.1:8000/api/obtenerRut_Empleado/' + id_empleado).then(
                    
                    (response) => {
                        if (response != null) {
                            if (response.status == 200) {
                                this.rut_empleado = response.data
                                this.nombre
                            }
                        }
                    }
                )
        },


    }

}
</script>

<style scoped>
.group0 {
    display: flex;
    justify-content: space-between;
    margin-bottom: 5%;
}

.group1 {
    width: 100%;
    display: flex;
    padding-bottom: 2%;
}

.ucnImage {
    display: grid;
    align-content: center;
}

.borde {
    border: 1px solid black;
}


th,
td {
    border: 1px solid black;
    border-collapse: collapse;
    text-align: center;
    font-size: 90%;
    padding-left: 7%;
    padding-right: 7%;
    width: 90px;

}

th,
label {
    background-color: #C5D9F1;
}

tr {
    height: 100%;
    justify-content: center;
}

label {
    font-size: 18px;
    text-align: center;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}

input {
    border: none;
}

.group2 {
    display: grid;
    grid-template-columns: 70% 10% 20%;
}

.max-asign {
    display: flex;
    justify-content: space-between;
    align-content: center;
}

.group3 {
    display: flex;
}

.spanPregunta {
    font-size: 18px;
    border-bottom: 1px solid black;
    margin: 2%;
}

.space {
    padding-bottom: 1px;
}
</style>