<template>
    <ValidationObserver ref="form">
        <b-modal id="modal-registrar-material-aseo" title="Registrar material de aseo" size="lg">

            <form @sumbit.prevent="handleSumbit(onSumbit)">

                <div style="width: 100%; display: flex;">

                    <ValidationProvider name="Codigo" v-slot="{ errors }" style="width: 30%; margin-right: 3%;">
                        <div class="form-group">
                            <label>Codigo:</label>
                            <input type="text" class="form-control" v-model="Codigo">
                            <span>{{ errors[0] }}</span>
                        </div>
                    </ValidationProvider>

                    <ValidationProvider name="Nombre" rules="required" v-slot="{ errors }" style="width: 60%;">
                        <div class="form-group">
                            <label>Nombre:</label>
                            <input type="text" class="form-control" v-model="Nombre">
                            <span>{{ errors[0] }}</span>
                        </div>
                    </ValidationProvider>
                </div>

                <div style="width: 70%;display: flex;">

                    <ValidationProvider name="Marca" v-slot="{ errors }" style="width: 40%; margin-right: 3%;">
                        <div class="form-group">
                            <label>Marca:</label>
                            <input type="text" class="form-control" v-model="Marca">
                            <span>{{ errors[0] }}</span>
                        </div>
                    </ValidationProvider>


                    <ValidationProvider name="Cantidad" v-slot="{ errors }" style="width: 20%; margin-right: 3%;">
                        <div class="form-group">
                            <label>Cantidad:</label>
                            <input type="number" class="form-control" v-model="Cantidad">
                            <span>{{ errors[0] }}</span>
                        </div>
                    </ValidationProvider>

                    <ValidationProvider name="Ubicacion" v-slot="{ errors }" style="width: 30%;">
                        <div class="form-group">
                            <label>Ubicacion:</label>
                            <input type="text" class="form-control" v-model="Ubicacion">
                            <span>{{ errors[0] }}</span>
                        </div>
                    </ValidationProvider>
                </div>


                <div style="width: 40%;">

                    <ValidationProvider name="Proveedor" v-slot="{ errors }">
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
            Cantidad: 0,
            Marca: "",
            Ubicacion: "",
            Proveedor: "",
            Proveedores: []
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
                    if (this.Proveedor === '') {
                        this.Proveedor = 87868451
                    }
                    let data =
                    {
                        "codigo": this.Codigo,
                        "nombre": this.Nombre,
                        "cantidad": this.Cantidad,
                        "marca": this.Marca,
                        "ubicacion": this.Ubicacion,
                        "proveedor": this.Proveedor
                    }
                    axios.post('http://127.0.0.1:8000/api/productos/agregarProductoAseo', data).then((response) => {
                        if (response != null) {
                            if (response.status == 200) {
                                this.$bvToast.toast(`Registro de material aseo exitoso.`, {
                                    title: 'Éxito',
                                    toaster: 'b-toaster-top-center',
                                    solid: true,
                                    variant: "success",
                                    appendToast: true
                                })
                                this.resetearDatos()
                                this.$bvModal.hide('modal-registrar-material-aseo')
                                this.$emit('refrescar');
                            }
                        } else {
                            this.$bvToast.toast(`Error al crear registrar el material de aseo.`, {
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
        resetearDatos() {
            this.Codigo = "",
                this.Nombre = "",
                this.Cantidad = 0,
                this.Marca = "",
                this.Ubicacion = "",
                this.Proveedor = ""
        }
    },
    comments: { ValidationProvider }

}

</script>