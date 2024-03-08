<template>
    <b-modal id="modal-actualizar-reactivo" title="Actualizar reactivo" size="lg">
        <div style="display: grid;">
            <div style="display: flex; margin-bottom:3%">
                <div style="width: 50%">
                    <label>Reactivo:</label>
                    <b-select @change="obtenerDatosReactivo(material)" v-model="material">
                        <option v-for="material in items" :key="material.id" :value="material.id">
                            {{ material.nombre }} ({{ material.marca }})
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
                    <label>Formula:</label>
                    <b-input v-model="inputFormula"></b-input>
                </div>

                <div style="display: grid; width: 20%;margin-right: 3%;">
                    <label>Código:</label>
                    <b-input type="text" v-model="inputCodigo"></b-input>
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
                <div style="display: grid; width: 20%; margin-right: 3%;">
                    <label>Unidad:</label>
                    <b-input type="text" v-model="inputUnidad"></b-input>
                </div>

                <div style="display: grid; width: 20%; ">
                    <label>Marca:</label>
                    <b-input type="text" v-model="inputMarca"></b-input>
                </div>
            </div>

            <div style="display: flex; margin-top:3%">
                <div style="display: grid; width: 35%; margin-right: 3%;">
                    <label>Peligrosidad:</label>
                    <b-input type="text" v-model="inputPeligrosidad"></b-input>
                </div>

                <div style="display: grid; width: 20%; margin-right: 3%;">
                    <label>Clase o división:</label>
                    <b-input type="text" v-model="inputClase"></b-input>
                </div>

                <div style="display: grid; width: 20%; ">
                    <label>Riesgo secundario:</label>
                    <b-input type="text" v-model="inputRiesgo"></b-input>
                </div>
            </div>

            <div style="display: flex; margin-top:3%">
                <div style="display: grid; width: 20%; margin-right: 3%;">
                    <label>Grupo de embalaje:</label>
                    <b-input type="text" v-model="inputEmbalaje"></b-input>
                </div>

                <div style="display: grid; width: 20%; margin-right: 3%;">
                    <label>Dispocisión:</label>
                    <b-input type="text" v-model="inputDisposicion"></b-input>
                </div>

                <div style="display: grid; width: 20%; ">
                    <label>N° de guia:</label>
                    <b-input type="text" v-model="inputGuia"></b-input>
                </div>
            </div>

            <div style="margin-top: 4%;">
                <b-button variant="danger" style="margin:3%; margin-left: 0%;" @click="eliminarReactivo(material)">
                    <b-icon-trash-fill></b-icon-trash-fill>
                    <span>Eliminar reactivo</span>
                </b-button>
            </div>
        </div>
        <template #modal-footer="{ close }">
            <b-button variant="primary" size="xl" class="float-right reactive-button" style="font-weight:bold"
                @click="actualizarReactivo()">
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
            inputNombre: '',
            inputFormula: '',
            inputCodigo: '',
            inputCantidad: 0,
            inputUbicacion: '',
            inputUnidad: '',
            inputMarca: '',
            inputPeligrosidad: '',
            inputClase: '',
            inputRiesgo: '',
            inputEmbalaje: '',
            inputDisposicion: '',
            inputGuia: '',
            items: []
        }
    },
    mounted() {
        this.obtenerReactivos()
    },
    methods: {
        obtenerReactivos() {
            axios.get('http://127.0.0.1:8000/api/productos/obtenerReactivos').then((response) => {
                this.items = response.data
            }).catch(error => {
                console.log('error', error)
            })
        },

        obtenerDatosReactivo(id_material) {
            var materials = this.items.find(m => m.id == id_material);
            if (materials != null) {
                this.inputNombre = materials.nombre;
                this.inputFormula = materials.formula;
                this.inputCodigo = materials.codigo;
                this.inputCantidad = materials.cantidad;
                this.inputUbicacion = materials.ubicacion;
                this.inputUnidad = materials.unidad;
                this.inputMarca = materials.marca;
                this.inputPeligrosidad = materials.peligrosidad;
                this.inputClase = materials.clase;
                this.inputRiesgo = materials.riesgo;
                this.inputEmbalaje = materials.grupo_embalaje;
                this.inputDisposicion = materials.disposiciones
                this.inputGuia = materials.n_guia;
            }
        },

        eliminarReactivo(id_material) {
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
                            this.$bvModal.hide('modal-actualizar-reactivo')
                            this.$emit('reactivo_actualizado')
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

        actualizarReactivo() {
            if (this.material === '') {
                this.$bvToast.toast(`Debe seleccionar un reactivo para realizar esta acción.`, {
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
                    'formula': this.inputFormula,
                    'codigo': this.inputCodigo,
                    'cantidad': this.inputCantidad,
                    'ubicacion': this.inputUbicacion,
                    'unidad': this.inputUnidad,
                    'marca': this.inputMarca,
                    'peligrosidad': this.inputPeligrosidad,
                    'clase': this.inputClase,
                    'riesgo': this.inputRiesgo,
                    'embalaje': this.inputEmbalaje,
                    'disposicion': this.inputDisposicion,
                    'guia': this.inputGuia
                }
                axios.post('http://127.0.0.1:8000/api/productos/actualizarReactivo', data)
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
                            this.$bvModal.hide('modal-actualizar-reactivo')
                            this.$emit('reactivo_actualizado')
                        }
                    }).catch((error) => {
                        console.log('error', error)
                    })
            }
        },
        resetearDatos()
        {
            this.material= '',
            this.inputNombre= '',
            this.inputFormula= '',
            this.inputCodigo= '',
            this.inputCantidad= 0,
            this.inputUbicacion= '',
            this.inputUnidad= '',
            this.inputMarca= '',
            this.inputPeligrosidad= '',
            this.inputClase= '',
            this.inputRiesgo= '',
            this.inputEmbalaje= '',
            this.inputDisposicion= '',
            this.inputGuia= ''
        }
    }
}
</script>