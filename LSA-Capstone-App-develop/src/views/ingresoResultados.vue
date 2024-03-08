<template>
    <div>
        <div v-if="respuesta == 'crear'">
            <select v-model="tecnica">
                <option disabled selected value="" >Selecciona una técnica</option>
                <option value="tecnicaPotenciometricaCreate">Potenciometrica</option>
                <option value="tecnicaVolumetricaAguaCreate">Volumetrica-Agua</option>
                <option value="tecnicaGravimetricaAguaCreate">Gravimetrica-Agua</option>
                <option value="tecnicaAbsorcionMolecularCreate">Absorción-Molecular</option>
                <option value="tecnicaHidrocarburoCreate">Hidrocarburos Fijos - Aceite y Grasas</option>
            </select>
        </div>

        <component :is="tecnica" :data="data" :idTecnica="idTecnica" :formularios="formularios"></component>
    </div>   
    
</template>


<script>
import { getUserInfo } from '@/helpers/api-services/Auth.service';

import { isLoggedIn } from '@/helpers/api-services/Auth.service';


import tecnicaGravimetricaAguaCreate from '../components/admMuestras-quimicos/ingreso-resultados/tecnica-gravimetrica-agua/modal_crear_formulario.vue'
import tecnicaGravimetricaAguaUpdate from '../components/admMuestras-quimicos/ingreso-resultados/tecnica-gravimetrica-agua/modal_actualizar_formulario.vue'

import tecnicaPotenciometricaCreate from '../components/admMuestras-quimicos/ingreso-resultados/tecnica-potenciometrica/modal_crear_formulario.vue'
import tecnicaPotenciometricaUpdate from '../components/admMuestras-quimicos/ingreso-resultados/tecnica-potenciometrica/modal_actualizar_formulario.vue'

import tecnicaVolumetricaAguaCreate from '../components/admMuestras-quimicos/ingreso-resultados/tecnica-volumetrica-agua/modal_crear_formulario.vue'
import tecnicaVolumetricaAguaUpdate from '../components/admMuestras-quimicos/ingreso-resultados/tecnica-volumetrica-agua/modal_actualizar_formulario.vue'

import tecnicaAbsorcionMolecularCreate from '../components/admMuestras-quimicos/ingreso-resultados/tecnica-absorcion-molecular/modal_crear_formulario.vue'
import tecnicaAbsorcionMolecularUpdate from '../components/admMuestras-quimicos/ingreso-resultados/tecnica-absorcion-molecular/modal_actualizar_formulario.vue'

import tecnicaHidrocarburoCreate from '../components/admMuestras-quimicos/ingreso-resultados/hidrocarburos-fijos-aceite-grasas/modal_crear_formulario.vue'
import tecnicaHidrocarburoUpdate from '../components/admMuestras-quimicos/ingreso-resultados/hidrocarburos-fijos-aceite-grasas/modal_actualizar_formulario.vue'

import axios from 'axios';
export default {
    data(){
        return{
            respuesta: '',
            tecnica: '',
            data: 0,
            idTecnica: 0,
            rut_empleado: '',

            formularios: [],
        }
    },
    components:{
        //Tecnica gravimetrica
        tecnicaGravimetricaAguaCreate,
        tecnicaGravimetricaAguaUpdate,
        //Tecnica potenciometrica
        tecnicaPotenciometricaCreate,
        tecnicaPotenciometricaUpdate,
        //Tecnica volumetrica
        tecnicaVolumetricaAguaCreate,
        tecnicaVolumetricaAguaUpdate,

        //Tecnica absorción molecular
        tecnicaAbsorcionMolecularCreate,
        tecnicaAbsorcionMolecularUpdate,

        //Tecnica Hidrocarburos
        tecnicaHidrocarburoCreate,
        tecnicaHidrocarburoUpdate,
    }
    ,
    watch: {
        tecnica:{
            handler(valor){
                console.log(valor);
                if(valor == 'tecnicaPotenciometricaCreate'){
                    this.idTecnica = 1;
                }
                else if (valor == 'tecnicaVolumetricaAguaCreate') {
                    this.idTecnica = 2;
                }
                else if (valor == 'tecnicaGravimetricaAguaCreate') {
                    this.idTecnica = 3;
                }
                else if (valor == 'tecnicaAbsorcionMolecularCreate') {
                    this.idTecnica = 4;
                }
                else if (valor == 'tecnicaHidrocarburoCreate') {
                    this.idTecnica = 5;
                }
                
                
            }
        }
    },
    mounted(){
        this.retornarDatoUsuario();
        this.comprobarFormulario();
    },
    methods: {
        retornarDatoUsuario(){
            if(isLoggedIn()){
                this.datosUser = getUserInfo();
                console.log('Obteniendo datos del usuario.')
                console.log(this.datosUser);
                this.rut_empleado = this.datosUser.rut;

            }
        },

        enviarFormulario(formulario){
            axios.post('http://127.0.0.1:8000/api/crear-formulario',formulario).then(response => {
                console.log('respuesta');
                console.log(response);
                this.$router.back();
            })
            .catch(error => {
                console.log('Error', error);
            });
        },
        comprobarFormulario(){
            console.log(this.$route.params.RUM);
            console.log(this.datosUser.rut);

            axios.get('http://127.0.0.1:8000/api/obtener-muestra/'+ this.$route.params.RUM+'/'+this.datosUser.rut).then(response => {

                console.log('Respuesta DE LO QUE SE OBTIENE CON RESPECTOA  LOS FORMULARIOS');
                console.log(response.data);
                this.formularios = response.data;
                if(response.data == 'no existe'){
                    this.respuesta = 'crear';
                    this.data = this.$route.params.RUM
                }
                else{
                    console.log(response.data[0].tecnica_id);
                    console.log("RESPUESTAAAAAAAAAAAAAA");
                    console.log(response.data.id);
                    if(response.data[0].tecnica_id == 1){
                    this.tecnica = 'tecnicaPotenciometricaUpdate'
                    this.idTecnica = 1;
                    this.data = response.data.id
                    console.log(this.data);
                    }
                    else if(response.data[0].tecnica_id == 2){
                        console.log("Entrando Acá");
                        this.tecnica = 'tecnicaVolumetricaAguaUpdate';
                        this.idTecnica = 2;
                        this.data = response.data.id;
                        console.log(this.data);
                    }
                    else if(response.data[0].tecnica_id == 3){
                        this.tecnica = 'tecnicaGravimetricaAguaUpdate';
                        this.data = response.data.id;
                        this.idTecnica = 3;
                        console.log(this.data);
                    }
                    else if(response.data[0].tecnica_id == 4){
                        this.tecnica = 'tecnicaAbsorcionMolecularUpdate';
                        this.data = response.data.id;
                        this.idTecnica = 4;
                        console.log(this.data);
                    }
                    else if(response.data[0].tecnica_id == 5){
                        this.tecnica = 'tecnicaHidrocarburoUpdate';
                        this.data = response.data.id;
                        this.idTecnica = 5;
                        console.log(this.data);
                    }
                }
            })
            .catch(error => {
                console.log('Error', error);
            });
            
            if(this.$route.params.RUM == undefined){
                this.$router.back();
            }
        }

    }
}
</script>