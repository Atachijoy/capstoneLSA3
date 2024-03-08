<template>
    <b-modal id="modal-actualizar-material-aseo" title="Modificar material de aseo" size="lg">

        <div style="display: grid; width: 100%;">

            <div style="display: flex;width: 100%; padding-bottom: 3%;">
                <div style="display: grid; width: 40%;">
                    <span>Material de aseo:</span>
                    <b-select @change="obtenerMaterial(material)" v-model="material">
                        <option v-for="material in items" :key="material.id" :value="material.id">
                            {{ material.nombre }} ({{ material.marca }})
                        </option>

                    </b-select>
                </div>
            </div>

            <div style="display: flex;width: 100%; padding-bottom: 3%;">
                <div style="display: grid; width: 40%; margin-right: 4%">
                    <span>Nombre:</span>
                    <b-input v-model="inputNombre"></b-input>
                </div>

                <div style="display: grid; width: 20%; margin-right: 4%">
                    <span>Marca:</span>
                    <b-input v-model="inputMarca"></b-input>
                </div>


            </div>

            <div style="display: flex;width: 100%;">
                <div style="display: grid; width: 20%; margin-right: 4%">
                    <span>Cantidad:</span>
                    <b-input v-model="inputCantidad"></b-input>
                </div>

                <div style="display: grid; width: 20%; margin-right: 4%">
                    <span>Ubicación:</span>
                    <b-input v-model="inputUbicacion"></b-input>
                </div>

                <div style="display: grid; width: 20%;">
                    <span>Código:</span>
                    <b-input v-model="inputCodigo"></b-input>
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
import axios from 'axios'
export default {
    data() {
        return {
            material: '',
            items: [],
            inputNombre: '',
            inputMarca: '',
            inputCantidad: '',
            inputUbicacion: '',
            inputCodigo: '',
        }
    },

    mounted() {
        this.obtenerMateriales()
    },

    methods: {
        obtenerMateriales() {
            axios.get('http://127.0.0.1:8000/api/productos/obtenerMaterialesAseo/')
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

        obtenerMaterial(id_material) {
            var materials = this.items.find(m => m.id == id_material);
            if (materials != null) {
                this.inputNombre = materials.nombre;
                this.inputCodigo = materials.codigo;
                this.inputMarca = materials.marca;
                this.inputCantidad = materials.cantidad;
                this.inputUbicacion = materials.ubicacion;
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
                                this.$bvModal.hide('modal-actualizar-material-aseo')
                                this.$emit('refrescar');
                            }
                        } else {
                            this.$bvToast.toast(`Material eliminado exitosamente.`, {
                                title: 'Exito',
                                toaster: 'b-toaster-top-center',
                                solid: true,
                                variant: "success",
                                appendToast: true
                            })
                        }
                    })
            }
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
                            this.$bvModal.hide('modal-actualizar-material-aseo')
                            this.$emit('refrescar');
                        }
                    }).catch((error) => {
                        console.log('error', error)
                    })
            }
        },
        resetearDatos() {
            this.material = '',
                this.inputNombre = '',
                this.inputMarca = '',
                this.inputCantidad = '',
                this.inputUbicacion = '',
                this.inputCodigo = ''
        }


    }
}
</script>