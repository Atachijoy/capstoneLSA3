<template>
    <div class="home">

        <div class="title">
            <h4>Solicitud de compra <br> (PG-3F-7 ,6° versión)</h4>
        </div>

        <div class="content">
            <ValidationObserver ref="form">
                <form @submit.prevent="handleSumbit(onSumbit)" v-if="show" class="form">

                    <ValidationProvider name="Nombre" v-slot="{ errors }">
                        <div class="form-group">
                            <b-form-input id="input-1" type="text" placeholder="Nombre del producto" required
                                v-model="nombre_producto"></b-form-input>
                            <span>{{ errors[0] }}</span>
                        </div>
                    </ValidationProvider>

                    <ValidationProvider name="Cantidad" v-slot="{ errors }">
                        <div class="form-group">
                            <b-form-input id="input-1" type="number" placeholder="Cantidad" required onkeypress="return event.charCode>=48 && 
                                 event.charCode<=57" min="0" v-model="cantidad"></b-form-input>
                            <span>{{ errors[0] }}</span>
                        </div>
                    </ValidationProvider>


                    <ValidationProvider name="Unidad" v-slot="{ errors }">
                        <div class="form-group">
                            <b-form-input id="input-1" type="text" placeholder="Unidad" v-model="unidad"></b-form-input>
                            <span>{{ errors[0] }}</span>
                        </div>
                    </ValidationProvider>

                    <ValidationProvider name="Especificaciones" v-slot="{ errors }">
                        <div class="form-group">
                            <b-form-input id="input-1" type="text" placeholder="Especificaciones"
                                v-model="especificaciones"></b-form-input>
                            <span>{{ errors[0] }}</span>
                        </div>
                    </ValidationProvider>

                    <ValidationProvider name="Areas" v-slot="{ errors }">
                        <div class="form-group">
                            <label>Area:</label>
                            <select class="form-control" v-model="area" title="Area">
                                <option v-for="area in areas" :key="area.id_area" :value="area.id_area">{{
                                    area.nombre_area
                                }}
                                </option>
                            </select>
                            <span>{{ errors[0] }}</span>
                        </div>
                    </ValidationProvider>

                    <ValidationProvider name="Proveedor" v-slot="{ errors }">
                        <div class="form-group">
                            <label>Proveedor:</label>
                            <select class="form-control" v-model="proveedor" title="Proveedor">
                                <option v-for="proveedor in proveedores" :key="proveedor.rut" :value="proveedor.rut">
                                    {{ proveedor.nombre_empresa }}</option>
                            </select>
                            <span>{{ errors[0] }}</span>
                        </div>
                    </ValidationProvider>

                    <ValidationProvider name="Estado" v-slot="{ errors }">
                        <div class="form-group">
                            <label>Estado:</label>
                            <select class="form-control" title="Estado:" v-model="estado">
                                <option v-for="estado in estados" :key="estado">{{ estado }}</option>
                            </select>
                            <span>{{ errors[0] }}</span>
                        </div>
                    </ValidationProvider>

                    <b-button @click="onSumbit()" variant="primary" size="xl" class="registrar" style="font-weight:bold">
                        Registar solicitud
                    </b-button>


                </form>



            </ValidationObserver>

        </div>
    </div>
</template>

<script>
import axios from 'axios'
import {
    getUserInfo
} from "@/helpers/api-services/Auth.service";
import {
    isLoggedIn
} from "@/helpers/api-services/Auth.service";

/* import userService from "@/helpers/api-services/Auth.service"
 */import { ValidationObserver } from 'vee-validate';
export default {
    data() {
        return {
            rut_usuario: "",
            nombre_producto: "",
            cantidad: "",
            unidad: "",
            especificaciones: "",
            area: "",
            areas: [],
            show: true,
            estado: "",
            estados: ['Normal', 'Urgente'],
            proveedor: "",
            proveedores: [],
            userData: []
        };
    },
    mounted() {
        this.obtenerAreas();
        this.obtenerProveedores();
        this.obtenerUsuario();
    },
    methods: {
        onSumbit() {
            this.ingresarSolicitud();
        },
        obtenerAreas() {
            axios.get('https://lsa.laboratorioquimico.cl/public/api/solicitudes/obtenerAreas').then((response) => {
                this.areas = response.data;
            }).catch(error => {
                console.log('error areas', error);
            });
        },
        obtenerProveedores() {
            axios.get('https://lsa.laboratorioquimico.cl/public/api/proveedores/').then((response) => {
                this.proveedores = response.data;
            }).catch(error => {
                console.log('error areas', error);
            });
        },
        obtenerUsuario() {
            if (isLoggedIn()) {
                this.userData = getUserInfo();
                this.rut_usuario = this.userData.rut

        }
        },
        ingresarSolicitud() {
            var data = {
                "nombre": this.nombre_producto,
                "cantidad": this.cantidad,
                "unidad": this.unidad,
                "especificaciones": this.especificaciones,
                "area": this.area,
                "estado": this.estado,
                "proveedor": this.proveedor,
                "rut_usuario": this.rut_usuario
            };
            axios.post('https://lsa.laboratorioquimico.cl/public/api/solicitudes/ingresarSolicitudCompra/', data).then((response) => {
                if (response.status == 200) {
                    this.$bvToast.toast(`Registro de solicitud exitoso.`, {
                        title: 'Éxito',
                        toaster: 'b-toaster-top-center',
                        solid: true,
                        variant: "success",
                        appendToast: true
                    })
                    this.$refs.form.reset();
                } else {
                    this.$bvToast.toast(`Error al registrar solicitud.`, {
                        title: 'Error',
                        toaster: 'b-toaster-top-center',
                        solid: true,
                        variant: "warning",
                        appendToast: true
                    })

                }
            });
        }
    },
    components: { ValidationObserver }
}


</script>

<style scoped>
.title {
    padding-top: 2%;
    margin-top: 5%;
    padding-bottom: 6%;
    justify-content: stretch;
    border-radius: 3%;
    height: 3px;
    width: 44%;
    color: white;
    background-color: #b86125;

}


.content {
    padding-top: 3%;
}

.form {
    padding-right: 70%;
}

.registrar {
    background-color: #001C57;
}
</style>