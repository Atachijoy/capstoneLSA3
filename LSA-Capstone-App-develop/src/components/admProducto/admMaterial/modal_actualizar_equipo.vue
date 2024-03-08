<template>
    <b-modal id="modal-actualizar-equipo" title="Actualizar equipo" size="lg">
        <div style="display: grid;">
            <div style="display: flex; margin-bottom:3%">
                <div style="width: 50%">
                    <label>Equipo:</label>
                    <b-select @change="obtenerDatosMateriales(material)" v-model="material">
                        <option v-for="material in items" :key="material.id" :value="material.id">
                            {{ material.nombre }} ({{ material.marca }} )
                        </option>
                    </b-select>
                </div>
            </div>

            <div style="display: flex;">
                <div style="display: grid; width: 50%; margin-right: 3%;">
                    <label>Nombre:</label>
                    <b-input v-model="inputNombre" required></b-input>
                </div>

                <div style="display: grid; width: 20%;margin-right: 3%;">
                    <label>Codigo:</label>
                    <b-input v-model="inputCodigo"></b-input>
                </div>

                <div style="display: grid; width: 20%; ">
                    <label>Marca:</label>
                    <b-input v-model="inputMarca"></b-input>
                </div>
            </div>

            <div style="display: flex; margin-top:3%">
                <div style="margin-right: 3%; width: 20%">
                    <label>Cantidad:</label>
                    <b-input type="number" v-model="inputCantidad"></b-input>
                </div>

                <div style="margin-right: 3%; width: 20%">
                    <label>Ubicación:</label>
                    <b-input v-model="inputUbicacion"></b-input>
                </div>

                <div style="margin-right: 3%; width: 20%">
                    <label>Valor:</label>
                    <b-input v-model="inputValor"></b-input>
                </div>
            </div>

            <div style="display: flex; margin-top:3%">
                <div style="margin-right: 3%; width: 20%">
                    <label>Fecha ingreso:</label>
                    <b-input v-model="fechaIngreso"></b-input>
                </div>

                <div style="margin-right: 3%; width: 20%">
                    <label>Fecha egreso:</label>
                    <b-input v-model="fechaEgreso"></b-input>
                </div>
            </div>

            <div style="margin-top: 4%;">
                <b-button variant="danger" style="margin:3%; margin-left: 0%;" @click="eliminarMaterial(material)">
                    <b-icon-trash-fill></b-icon-trash-fill>
                    <span>Eliminar Material</span>
                </b-button>
            </div>
        </div>
        <template #modal-footer="{ close }">
            <b-button variant="primary" size="xl" class="float-right reactive-button" style="font-weight:bold"
                @click="actualizarMaterial()">
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
import axios from 'axios';

export default {

    data() {
        return {
            material: '',
            items: [],
            inputNombre: '',
            inputCodigo: 0,
            inputMarca: '',
            inputCantidad: 0,
            inputUbicacion: '',
            inputValor: '',
            fechaIngreso: '',
            fechaEgreso: ''
        }

    },
    mounted() {
        this.obtenerMateriales()
    },
    methods: {


        /**
         * 
         *   inputNombre: '',
            inputCodigo: 0,
            inputMarca: '',
            inputCantidad: 0,
            inputUbicacion: '',
            inputValor: '',
            fechaIngreso: '',
            fechaEgreso: ''
         */
        obtenerDatosMateriales(id_material) {
            var materials = this.items.find(m => m.id == id_material);
            if (materials != null) {
                this.inputNombre = materials.nombre;
                this.inputCodigo = materials.codigo;
                this.inputMarca = materials.marca;
                this.inputCantidad = materials.cantidad;
                this.inputUbicacion = materials.ubicacion;
                this.inputValor = materials.valor,
                    this.fechaIngreso = materials.fecha_ingreso,
                    this.fechaEgreso = materials.fecha_egreso
            }
        },

        eliminarMaterial(id_material) {
            if (!id_material || id_material === '') {
                this.$bvToast.toast(`Debe seleccionar un material para realizar esta acción.`, {
                    title: 'Exito',
                    toaster: 'b-toaster-top-center',
                    solid: true,
                    variant: "warning",
                    appendToast: true
                })
            }
            else if (window.confirm('¿Esta seguro se eliminar este producto?')) {
                axios.post('http://127.0.0.1:8000/api/productos/eliminarProducto/' +
                    id_material).then((response) => {
                        if (response != null) {
                            if (response.status == 200) {
                                this.$bvToast.toast(`Material eliminado exitosamente.`, {
                                    title: 'Exito',
                                    toaster: 'b-toaster-top-center',
                                    solid: true,
                                    variant: "success",
                                    appendToast: true
                                })
                                this.resetearDatos()
                                this.$bvModal.hide('modal-actualizar-equipo')
                                this.$emit('equipo_actualizado')
                            }

                        } else {
                            this.$bvToast.toast(`Error al eliminar material.`, {
                                title: 'Exito',
                                toaster: 'b-toaster-top-center',
                                solid: true,
                                variant: "warning",
                                appendToast: true
                            })
                            this.resetearDatos()
                            this.$bvModal.hide('modal-actualizar-equipo')
                            this.$emit('equipo_actualizado')
                        }
                    })
            }
        },

        obtenerMateriales() {
            axios.get('http://127.0.0.1:8000/api/productos/obtenerEquipos')
                .then((response) => {
                    if (response != null) {
                        if (response.status == 200) {
                            this.items = response.data
                        }
                    }
                }).catch((error) => {
                    console.log('error', error)
                })
        },

        actualizarMaterial() {
            if (this.material === '') {
                this.$bvToast.toast(`Debe seleccionar un material para realizar esta acción.`, {
                    title: 'Exito',
                    toaster: 'b-toaster-top-center',
                    solid: true,
                    variant: "warning",
                    appendToast: true
                })
            } else {
                let data = {
                    'material_id': this.material,
                    'nombre': this.inputNombre,
                    'capacidad': this.inputCapacidad,
                    'unidad': this.inputUnidad,
                    'cantidad': this.inputCantidad,
                    'ubicacion': this.inputUbicacion
                }

                axios.post('http://127.0.0.1:8000/api/productos/actualizarMaterial', data)
                    .then((response) => {
                        if (response != null) {
                            if (response.status == 200) {
                                this.$bvToast.toast(`Material actualizado`, {
                                    title: 'Exito',
                                    toaster: 'b-toaster-top-center',
                                    solid: true,
                                    variant: "success",
                                    appendToast: true
                                })
                            }
                            this.resetearDatos()
                            this.$bvModal.hide('modal-actualizar-equipo')
                            this.$emit('equipo_actualizado')
                        }
                    }).catch((error) => {
                        console.log('error', error)
                    })
            }
        },
        resetearDatos() {
            this.material = '',
                this.inputNombre = '',
                this.inputCodigo = '',
                this.inputMarca = '',
                this.inputCantidad = 0,
                this.inputUbicacion = '',
                this.inputValor = '',
                this.fechaIngreso = '',
                this.fechaEgreso = ''
        }

    },



}

</script>