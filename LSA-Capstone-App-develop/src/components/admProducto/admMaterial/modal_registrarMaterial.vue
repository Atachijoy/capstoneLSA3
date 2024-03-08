<template>
    <ValidationObserver ref="form">
        <b-modal id="modal-registrar-material" title="Registrar material" size="lg">

            <form @sumbit.prevent="onSumbit()">

                <!--                 <ValidationProvider name="Codigo" v-slot="{ errors }">
                    <div class="form-group">
                        <label>Codigo:</label>
                        <input type="text" class="form-control" v-model="Codigo">
                        <span>{{ errors[0] }}</span>
                    </div>
                </ValidationProvider>
 -->
                <div style="display: flex; width: 80%;">
                    <ValidationProvider name="Nombre" rules="required" v-slot="{ errors }"
                        style="margin-right: 3%; width: 70%;">
                        <div class="form-group">
                            <label>Nombre:</label>
                            <input type="text" class="form-control" v-model="Nombre">
                            <span>{{ errors[0] }}</span>
                        </div>
                    </ValidationProvider>

                    <ValidationProvider name="Capacidad" v-slot="{ errors }">
                        <div class="form-group">
                            <label>Capacidad:</label>
                            <input type="number" class="form-control" v-model="Capacidad">
                            <span>{{ errors[0] }}</span>
                        </div>
                    </ValidationProvider>
                </div>


                <div style="display: flex; width: 70%;">
                    <ValidationProvider name="Unidad" v-slot="{ errors }" style="margin-right: 3%;">
                        <div class="form-group">
                            <label>Unidad:</label>
                            <input type="text" class="form-control" v-model="Unidad">
                            <span>{{ errors[0] }}</span>
                        </div>
                    </ValidationProvider>

                    <ValidationProvider name="Cantidad" v-slot="{ errors }" style="margin-right: 3%;">
                        <div class="form-group">
                            <label>Cantidad:</label>
                            <input type="number" class="form-control" v-model="Cantidad">
                            <span>{{ errors[0] }}</span>
                        </div>
                    </ValidationProvider>

                    <ValidationProvider name="Ubicacion" v-slot="{ errors }">
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

            <template #modal-footer="{close}">

                <b-button @click="onSumbit()" variant="primary" size="xl" class="float-right reactive-button"
                    style="font-weight:bold">
                    Crear y guardar
                </b-button>
                <b-button @click="close()" variant="primary" size="xl" class="float-right reactive-button"
                    style="font-weight:bold">
                    Cancelar
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
            Nombre: "",
            Capacidad: "",
            Unidad: "",
            Cantidad: 0,
            Saldo: "",
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
                    if(this.Proveedor === ''){
                        this.Proveedor = 87868451
                    }
                    let data =
                    {
                        "nombre": this.Nombre,
                        "capacidad": this.Capacidad,
                        "unidad": this.Unidad,
                        "cantidad": this.Cantidad,
                        "saldo": this.Saldo,
                        "ubicacion": this.Ubicacion,
                        "proveedor": this.Proveedor
                    }
                    axios.post('http://127.0.0.1:8000/api/productos/agregarProducto', data).then((response) => {
                        if (response != null) {
                            if (response.status == 200) {
                                this.$bvToast.toast(`Registro de material exitoso.`, {
                                    title: 'Éxito',
                                    toaster: 'b-toaster-top-center',
                                    solid: true,
                                    variant: "success",
                                    appendToast: true
                                })

                            }
                            this.resetearDatos()
                            this.$bvModal.hide('modal-registrar-material')
                            this.$emit('materialRegistrado')
                            /* this.$refs.form.reset(); */
                            /*                             this.$emit('refrescar');
                             */
                        } else {
                            this.$bvToast.toast(`Error al crear registrar el material.`, {
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
        resetearDatos()
        {
            this.Nombre = '',
            this.Capacidad = '',
            this.Unidad = '',
            this.Cantidad = 0,
            this.Saldo = '',
            this.ubicacion = '',
            this.Proveedor = ''
        }
    },
    comments: { ValidationProvider }

}

</script>