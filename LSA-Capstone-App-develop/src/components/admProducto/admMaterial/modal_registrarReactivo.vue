<template>
    <ValidationObserver ref="form">
        <b-modal id="modal-registrar-reactivo" title="Registrar Reactivo" size="lg">

            <form @sumbit.prevent="handleSumbit(onSumbit)">


                <div class="centrar-form">
                    <ValidationProvider name="Codigo" v-slot="{ errors }" style="margin-right: 2%;">
                        <div class="form-group">
                            <label>Codigo:</label>
                            <input type="text" class="form-control" v-model="Codigo">
                            <span>{{ errors[0] }}</span>
                        </div>
                    </ValidationProvider>

                    <ValidationProvider name="Nombre" rules="required" v-slot="{ errors }" style="margin-right: 2%;">
                        <div class="form-group">
                            <label>Nombre:</label>
                            <input type="text" class="form-control" v-model="Nombre">
                            <span>{{ errors[0] }}</span>
                        </div>
                    </ValidationProvider>

                    <ValidationProvider name="Formula" v-slot="{ errors }" style="margin-right: 2%;">
                        <div class="form-group">
                            <label>Formula:</label>
                            <input type="text" class="form-control" v-model="Formula">
                            <span>{{ errors[0] }}</span>
                        </div>
                    </ValidationProvider>

                    <ValidationProvider name="Marca" v-slot="{ errors }" style="margin-right: 2%;">
                        <div class="form-group">
                            <label>Marca:</label>
                            <input type="text" class="form-control" v-model="Marca">
                            <span>{{ errors[0] }}</span>
                        </div>
                    </ValidationProvider>

                    <ValidationProvider name="Envase" v-slot="{ errors }" style="margin-right: 2%;">
                        <div class="form-group">
                            <label>Envase:</label>
                            <input type="text" class="form-control" v-model="Envase">
                            <span>{{ errors[0] }}</span>
                        </div>
                    </ValidationProvider>


                    <ValidationProvider name="Unidad" v-slot="{ errors }" style="margin-right: 2%;">
                        <div class="form-group">
                            <label>Unidad:</label>
                            <input type="text" class="form-control" v-model="Unidad">
                            <span>{{ errors[0] }}</span>
                        </div>
                    </ValidationProvider>

                    <ValidationProvider name="Cantidad" v-slot="{ errors }" style="margin-right: 2%;">
                        <div class="form-group">
                            <label>Cantidad:</label>
                            <input type="text" class="form-control" v-model="Cantidad">
                            <span>{{ errors[0] }}</span>
                        </div>
                    </ValidationProvider>


                    <ValidationProvider name="Peligrosidad" v-slot="{ errors }" style="margin-right: 2%;">
                        <div class="form-group">
                            <label>Peligrosidad:</label>
                            <input type="text" class="form-control" v-model="Peligrosidad">
                            <span>{{ errors[0] }}</span>
                        </div>
                    </ValidationProvider>

                    <ValidationProvider name="Clase" v-slot="{ errors }" style="margin-right: 2%;">
                        <div class="form-group">
                            <label>Clase:</label>
                            <input type="text" class="form-control" v-model="Clase">
                            <span>{{ errors[0] }}</span>
                        </div>
                    </ValidationProvider>

                    <ValidationProvider name="Riesgo" v-slot="{ errors }" style="margin-right: 2%;">
                        <div class="form-group">
                            <label>Riesgo secundario:</label>
                            <input type="text" class="form-control" v-model="RiesgoSecundario">
                            <span>{{ errors[0] }}</span>
                        </div>
                    </ValidationProvider>

                    <ValidationProvider name="Grupo" v-slot="{ errors }" style="margin-right: 2%;">
                        <div class="form-group">
                            <label>Grupo embalaje:</label>
                            <input type="text" class="form-control" v-model="GrupoEmbalaje">
                            <span>{{ errors[0] }}</span>
                        </div>
                    </ValidationProvider>

                    <ValidationProvider name="nGuia" v-slot="{ errors }" style="margin-right: 2%;">
                        <div class="form-group">
                            <label>N° guia:</label>
                            <input type="text" class="form-control" v-model="NGuia">
                            <span>{{ errors[0] }}</span>
                        </div>
                    </ValidationProvider>

                    <ValidationProvider name="Ubicacion" v-slot="{ errors }" style="margin-right: 2%;">
                        <div class="form-group">
                            <label>Ubicación:</label>
                            <input type="text" class="form-control" v-model="Ubicacion">
                            <span>{{ errors[0] }}</span>
                        </div>
                    </ValidationProvider>


                    <ValidationProvider name="Proveedor" v-slot="{ errors }" style="margin-right: 2%;">
                        <div class="form-group">
                            <label>Proveedor:</label>
                            <select class="form-control" v-model="Proveedor">
                                <option v-for="proveedor in Proveedores" :key="proveedor.rut" :value="proveedor.rut">{{
                                    proveedor.nombre_empresa }}
                                </option>
                            </select>
                            <span>{{ errors[0] }}</span>
                        </div>
                    </ValidationProvider>


                </div>
            </form>

            <template #modal-footer>

                <b-button @click="onSumbit()" variant="primary" size="xl" class="float-right reactive-button"
                    style="font-weight:bold">
                    Crear y guardar
                </b-button>
            </template>


        </b-modal>

    </ValidationObserver>
</template>

<script>

import axios from 'axios';
import { ValidationProvider } from 'vee-validate';

export default {
    data() {
        return {

            Codigo: "",
            Nombre: "",
            Formula: "",
            Marca: "",
            Envase: "",
            Unidad: "",
            Cantidad: 0,
            Peligrosidad: "",
            Clase: "",
            RiesgoSecundario: "",
            GrupoEmbalaje: "",
            NGuia: "",
            Ubicacion: "",
            Proveedor: "",
            Proveedores: [],

        }
    },
    mounted() {
        this.obtenerProveedores();
    },

    methods: {
        onSumbit() {
            this.$refs.form.validate().then(success => {
                if (!success) {
                    return;
                }
                else {
                    if(this.Proveedor === ''){
                        this.Proveedor = 87868451   
                    }
                    let data =
                    {
                        "codigo": this.Codigo,
                        "nombre": this.Nombre,
                        "formula": this.Formula,
                        "marca": this.Marca,
                        "envase": this.Envase,
                        "unidad": this.Unidad,
                        "cantidad": this.Cantidad,
                        "peligrosidad": this.Peligrosidad,
                        "clase": this.Clase,
                        "riesgo": this.RiesgoSecundario,
                        "grupo": this.GrupoEmbalaje,
                        "nguia": this.NGuia,
                        "ubicacion": this.Ubicacion,
                        "proveedor": this.Proveedor
                    }
                    axios.post('http://127.0.0.1:8000/api/productos/agregarReactivo', data).then((response) => {
                        if (response != null) {
                            if (response.status == 200) {
                                this.$bvToast.toast(`Registro de reactivo exitoso.`, {
                                    title: 'Éxito',
                                    toaster: 'b-toaster-top-center',
                                    solid: true,
                                    variant: "success",
                                    appendToast: true
                                })
                                this.$emit('refrescar');
                            }
                            this.refrescarDatos()
                            this.$bvModal.hide('modal-registrar-reactivo')
                            this.$emit('refrescar')
/*                             this.reiniciarDatos();
 */                            this.$refs.form.reset();
                        } else {
                            this.$bvToast.toast(`Error al registrar el reactivo.`, {
                                title: 'Error',
                                toaster: 'b-toaster-top-center',
                                solid: true,
                                variant: "warning",
                                appendToast: true
                            })
                        }
                    }).catch(error => {
                        console.log('el error es', error);
                    })
                }
            })
        },
        obtenerProveedores() {
            axios.get('http://127.0.0.1:8000/api/proveedores/').then((response) => {
                this.Proveedores = response.data;
            })

        },
        refrescarDatos() {
             this.Codigo = '',
             this.Nombre = '',
             this.Formula = '',
             this.Marca = '',
             this.Envase = '',
             this.Unidad = '',
             this.Cantidad = 0,
             this.Peligrosidad = '',
             this.Clase = '',
             this.RiesgoSecundario = '',
             this.GrupoEmbalaje = '',
             this.NGuia = '',
             this.Ubicacion = ''
        }
    },
    comments: { ValidationProvider }

}

</script>

<style scoped>
.centrar-form {
    display: grid;
    grid-template-columns: repeat(3, 33.33%);
}
</style>