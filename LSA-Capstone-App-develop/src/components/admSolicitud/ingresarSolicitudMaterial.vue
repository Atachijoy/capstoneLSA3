<template>
    <div class="home">

        <div class="title">
            <h4>Solicitud de material y reactivo <br>(PG-3F-1, 7° versión)</h4>
        </div>

        <div class="content">
            <ValidationObserver ref="form">
                <form @submit.prevent="handleSumbit(onSumbit)" v-if="show" class="form">


                    <ValidationProvider name="Nombre" v-slot="{ errors }">
                        <div class="form-group">
                            <label>Nombre del producto:</label>
                            <select class="form-control" required v-model="id_producto" @change="asignarIdMaterial(id_producto)">
                                <option v-for="producto in productos" :key="producto.id" :value="producto.id">{{ producto.nombre }} ({{
                                    producto.capacidad }}
                                    {{ producto.unidad }})</option>
                            </select>
                            <span>{{ errors[0] }}</span>
                        </div>
                    </ValidationProvider>


                    <b-col>
                        <b-row>
                            <ValidationProvider name="Cantidad" v-slot="{ errors }" rules="required">
                            <div class="form-group">
                                <label>Cantidad:</label>
                                <b-form-input id="input-1" type="number" required onkeypress="return event.charCode>=48 && 
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
                        
                        </b-row>
                    </b-col>

                    <ValidationProvider name="Lote" v-slot="{ errors }">
                        <div class="form-group">
                            <b-form-input id="input-1" type="text" placeholder="Lote" v-model="lote"></b-form-input>
                            <span>{{ errors[0] }}</span>
                        </div>
                    </ValidationProvider>

                    <ValidationProvider name="Areas" v-slot="{ errors }" rules="required">
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


                    <b-button @click="onSumbit()" variant="primary" size="xl" class="registrar">
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
            id_producto: "",
            nombre_producto: "",
            capacidad: "",
            capacidades: [],
            cantidad: 0,
            unidad: "",
            area: "",
            lote: "",
            areas: [],
            show: true,
            userData: [],
            producto: "",
            productos: []
        };
    },
    mounted() {
        this.obtenerAreas();
        this.obtenerProveedores();
        this.obtenerUsuario();
        this.obtenerProductos();
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

/*             userService.obtenerDetallesUsuario().then((response)=>{
                if(response.status == 200 && response.data != null)
                {
                    this.rut_usuario = response.data.rut_usuario;   
                }
            }).catch(error =>
            {
                console.log('error', error);
            })
 */
/*             axios.get('https://lsa.laboratorioquimico.cl/public/api/usuario/detallesUsuario').then((response) => {
                this.rut_usuario = response.rut_empleado;
                console.log('rut del usuario: ', this.rut_usuario);
            });
 */        }
        },
        ingresarSolicitud() {
            var data = {
                "id_material": this.id_producto,
                "nombre": this.nombre_producto,
                "cantidad": this.cantidad,
                "unidad": this.unidad,
                "lote": this.lote,
                "area": this.area,
                "rut_usuario": this.rut_usuario
            };
            axios.post('https://lsa.laboratorioquimico.cl/public/api/solicitudes/ingresarSolicitudMaterial/', data).then((response) => {
                if (response.status == 200) {
                    this.$bvToast.toast(`Registro de solicitud exitoso.`, {
                        title: 'Éxito',
                        toaster: 'b-toaster-top-center',
                        solid: true,
                        variant: "success",
                        appendToast: true
                    })

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
        },
        obtenerProductos() {
            axios.get('https://lsa.laboratorioquimico.cl/public/api/productos').then((response) => {
                this.productos = response.data;
            }).catch(error => {
                console.log('error al obtener productos', error);
            });
        },
        asignarIdMaterial(id_material){
            var materials = this.productos.find(m => m.id === id_material)
            this.nombre_producto = materials.nombre
        },
        refrescarDatos(){
            this.id_producto = '';
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
    font-weight: bold;
}
</style>