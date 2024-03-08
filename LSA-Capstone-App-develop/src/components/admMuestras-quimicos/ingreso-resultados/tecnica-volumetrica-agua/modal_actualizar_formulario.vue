<template>
    <div>
        <div>
            <select v-model="respuesta">
                <option disabled selected value="" >Selecciona un formulario</option>
                <option v-for="(opcion,index) in formularios" :key="index" :value="opcion.form_id">Formulario {{ index + 1 }}</option>
            </select>
        </div>
    <div v-if="mostrar=='Si'">
        <section class="imagenes" style="width:100%;">

            <div class="ucn">
                <img src="@/assets/ucn.png">
            </div>

            <div class="version">
                <h2 style="text-align:center; font-size:16px">TÉCNICA VOLUMETRICA-AGUA</h2>
                <h3 style="text-align:center; color:rgb(50, 50, 237); font-size: 10px;">22° Versión</h3>
                
            </div>

            <div class="lsa">
                <img src="@/assets/isologo-LSA.png">
            </div>

        </section>


        <section class="grupo1">
            <div  class="informe borde">
                <label style="font-weight: bold; font-size: 12px; width: 100%">Informe N°: <input v-model="formulario.Numero_Informe" style="width:80%; text-align: center; border: none;" type="text"></label>
            </div>

            <div class="fechaI borde">
                <label style="font-weight: bold; font-size: 12px; width:100%">Fecha y hora de inicio: 
                    <input v-model="formulario.Fecha_Hora_Inicio" style="width: 63%; text-align: center; border:none; margin-top:5px;" type="datetime-local"> 
                </label>
            </div>

            <div class="fechaF borde">
                <label style="font-weight: bold; font-size: 12px; width:100%">Fecha y hora de término: 
                    <input v-model="formulario.Fecha_Hora_Termino" style="width: 60%; text-align: center; border:none; margin-top:5px;" type="datetime-local"> 
                </label>
            </div>
        </section>

        <section class="grupo2">
            <div  class="TipoM borde">
                <label style="font-weight: bold; font-size: 12px; width:100%;">Tipo de muestra: 
                    <input v-model="formulario.Tipo_de_Muestra" value="Agua Potable" type="radio" style="transform: scale(0.8);" name="analisis-2"> <span style="font-size: 11px;">Agua Potable</span>
                    <input v-model="formulario.Tipo_de_Muestra" value="Agua Residual" type="radio" style="transform: scale(0.8); margin-left:10%;" name="analisis-2"> <span style="font-size: 11px;">Agua Residual</span>
                    <input v-model="formulario.Tipo_de_Muestra" value="Agua de Mar" type="radio" style="transform: scale(0.8);margin-left:10%;" name="analisis-2"> <span style="font-size: 11px;">Agua de mar</span>
                    <input v-model="formulario.Tipo_de_Muestra" value="Agua Potable" type="radio" style="transform: scale(0.8);margin-left:10%;" name="analisis-2"> <span style="font-size: 11px;">Otros: <input v-model="formulario.Otro_Tipo_de_Muestra" style="width:80px" type="text"></span>
                </label>
                
            </div>

            <div class="Nmuestra borde">
                <label style="font-weight: bold; font-size: 12px; width: 100%;">N° de muestras: <input v-model="formulario.Numero_de_Muestras" style="width:57%; text-align:center;" type="number"></label>
            </div>
        </section>

        <section class="grupo3">
            <div class="idmuestra borde">
                <label style="font-weight: bold; width:100%; font-size: 12px">Identificación de la muestra: <input v-model="formulario.Identificacion_Muestra" style="width:85%; text-align:center;" type="number"></label>
            </div>
        </section>

        <section class="grupo4">
            <div style=" height: 40px;" class="m1 borde">
                <label style="font-size: 12px">M-1 Blanco reactivo <input style="width:100%; border:none; text-align:center;" type="text"></label>
            </div>
            <div class="m3 borde">
                <label style="font-size: 12px">M-3 <input style="width:100%; border:none; text-align:center;" type="text"></label>
            </div>
            <div class="m5 borde">
                <label style="font-size: 12px">M-5 <input style="width:100%; border:none; text-align:center;" type="text"></label>
            </div>
            <div class="m7 borde">
                <label style="font-size: 12px">M-7 <input style="width:100%; border:none; text-align:center;" type="text"></label>
            </div>
            <div class="m9 borde">
                <label style="font-size: 12px">M-9 <input style="width:100%; border:none; text-align:center;" type="text"></label>
            </div>
            <div style=" height: 40px;" class="m2 borde">
                <label style="font-size: 12px">M-2 MR o MC <input style="width:100%; border:none; text-align:center;" type="text"></label>
            </div>
            <div class="m4 borde">
                <label style="font-size: 12px">M-4 <input style="width:100%; border:none; text-align:center;" type="text"></label>
            </div>
            <div  class="m6 borde">
                <label style="font-size: 12px">M-6 <input style="width:100%; border:none; text-align:center;" type="text"></label>
            </div>
            <div class="m8 borde">
                <label style="font-size: 12px">M-8 <input style="width:100%; border:none; text-align:center;" type="text"></label>
            </div>
            <div class="m10 borde">
                <label style="font-size: 12px">M-10 <input style="width:100%; border:none; text-align:center;" type="text"></label>
            </div>
        </section>


        <section class="grupo5">
            <div class="tratamiento borde">
                <label style="font-weight: bold; font-size: 12px; width:100%;">Tratamiento preliminar: 
                    <input v-model="formulario.Tratamiento_Preliminar" value="Filtración" type="radio" style="transform: scale(0.8); margin-left:10%;" name="analisisR-2"> <span style="font-size: 11px;">Filtracion</span>
                    <input v-model="formulario.Tratamiento_Preliminar" value="Pre Concentración" type="radio" style="transform: scale(0.8);margin-left:10%;" name="analisisR-2"> <span style="font-size: 11px;">Pre concentración</span>
                    <input v-model="formulario.Tratamiento_Preliminar" value="Otro" type="radio" style="transform: scale(0.8);margin-left:10%;" name="analisisR-2"> <span style="font-size: 11px;">Otro: <input v-model="formulario.Otro_Tratamiento_Preliminar" style="width:80px" type="text"></span>
                    <input v-model="formulario.Tratamiento_Preliminar" value="No" type="radio" style="transform: scale(0.8);margin-left:10%;" name="analisis2-2"> <span style="font-size: 11px;">No</span>
                </label>
            </div>
        </section>
        

        <section class="grupo6">
            <div  class="analisis borde">
                <label style="font-size: 12px; font-weight: bold; width:100%;">Análisis de: <input v-model="formulario.Analisis_de" style="width:87%" type="text"></label>
            </div>

            <div  class="metodoEnsayo borde">
                <label style="font-size: 12px; font-weight: bold; width:100%">Método de ensayo: <input v-model="formulario.Metodo_de_Ensayo" style="width:79%" type="text"> </label>
            </div>
            
            <div class="agente borde">
                <label style="font-size: 12px; font-weight: bold; width:100%">Agente titulante: <input v-model="formulario.Agente_Titulante" style="width:81%" type="text"> </label>
            </div>

            <div  class="fechaEstandarizacion borde">
                <label style="font-size: 12px; font-weight: bold; width:100%">Fecha de estandarización:  
                    <input v-model="formulario.Fecha_Estandarizacion" style="width: 72%; text-align: center; border:none;" type="datetime-local"> 
                </label>
            </div>

            <div class="concentracionTitulante borde">
                <label style="font-size: 12px; font-weight: bold; width:100%">Concentración titulante:  <input v-model="formulario.Concentracion_Titulante" style="width:74%" type="text"> </label>
            </div>
            
            <div  class="ExpresadoComo borde">
                <label style="font-size: 12px; font-weight: bold; width:100%">Expresado como:
                    <input v-model="formulario.Expresado_Como" value="mg/l" type="radio" style="transform: scale(0.8); margin-left:0.5%;" name="Expresado3-2"> <span style="font-size: 11px;">mg/l</span>
                    <input v-model="formulario.Expresado_Como" value="M" type="radio" style="transform: scale(0.8);margin-left:0.5%;" name="Expresado3-2"> <span style="font-size: 11px;">M</span>
                    <input v-model="formulario.Expresado_Como" value="N" type="radio" style="transform: scale(0.8);margin-left:0.5%;" name="Expresado3-2"> <span style="font-size: 11px;">N</span>
                    <input v-model="formulario.Expresado_Como" value="fOX" type="radio" style="transform: scale(0.8);margin-left:0.5%;" name="Expresado3-2"> <span style="font-size: 11px;">fOX</span>
                    <input v-model="formulario.Expresado_Como" value="Otro" type="radio" style="transform: scale(0.8);margin-left:0.5%;" name="Expresado3-2"> <span style="font-size: 11px;">Otro: <input v-model="formulario.Otro_Expresado_Como" style="width:20%" type="text"></span>
                </label>
            </div>
        </section>

        <section class="grupo7">
            <div  class="Resultado-final borde">
                <label style="font-size: 12px; font-weight: bold;">Resultado final: 
                    <input v-model="formulario.Resultado_Final" value="g/l" type="radio" style="transform: scale(0.8); margin-left:3%;" name="Expresado-2"> <span style="font-size: 11px;">g/l</span>
                    <input v-model="formulario.Resultado_Final" value="mg/l" type="radio" style="transform: scale(0.8);margin-left:3%;" name="Expresado-2"> <span style="font-size: 11px;">mg/l</span>
                    <input v-model="formulario.Resultado_Final" value="%" type="radio" style="transform: scale(0.8);margin-left:3%;" name="Expresado-2"> <span style="font-size: 11px;">%</span>
                    <input v-model="formulario.Resultado_Final" value="Otro" type="radio" style="transform: scale(0.8);margin-left:3%;" name="Expresado-2"> <span style="font-size: 11px;">Otro: <input v-model="formulario.Otro_Resultado_Final" style="width:20%" type="text"></span>
                </label>
            </div>

            <div  class="Temperatura estufa borde">
                <label style="font-size: 12px; font-weight: bold; width:100%">Temperatura estufa °C: 
                    <input v-model="formulario.Temperatura_Estufa" style="width:50%; text-align:center;" type="number">
                </label>
            </div>
            <div  class="Temperatura Manto borde">
                <label style="font-size: 12px; font-weight: bold; width:100%">Temperatura manto °C: 
                    <input v-model="formulario.Temperatura_Manto" style="width:50%; text-align:center;" type="number">
                </label>
            </div>
        </section>

        <section class="grupo8">
            <div  class="Muestra borde">
                <label style="font-size: 12px; font-weight: bold;">Muestra</label>
            </div>

            <div  class="m1 borde">
                <label style="font-size: 12px; font-weight: bold;">M-1</label>
            </div>
            <div  class="m2 borde">
                <label style="font-size: 12px; font-weight: bold;">M-2</label>
            </div>
            <div  class="m3 borde">
                <label style="font-size: 12px; font-weight: bold;">M-3</label>
            </div>  
            <div  class="m4 borde">
                <label style="font-size: 12px; font-weight: bold;">M-4</label>
            </div>
            <div  class="m5 borde">
                <label style="font-size: 12px; font-weight: bold;">M-5</label>
            </div>
            <div  class="m6 borde">
                <label style="font-size: 12px; font-weight: bold;">M-6</label>
            </div>
            <div  class="m7 borde">
                <label style="font-size: 12px; font-weight: bold;">M-7</label>
            </div>
            <div  class="m8 borde">
                <label style="font-size: 12px; font-weight: bold;">M-8</label>
            </div>
            <div  class="m9 borde">
                <label style="font-size: 12px; font-weight: bold;">M-9</label>
            </div>
            <div class="m10 borde">
                <label style="font-size: 12px; font-weight: bold;">M-10</label>
            </div>
        </section>

        <section class="grupo9">
            <div class="pj borde">
                <label style="font-size: 12px">pH inicial</label>
            </div>

            <div  class="m1 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Ph_Inicial_Muestra_1" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m2 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Ph_Inicial_Muestra_2" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div class="m3 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Ph_Inicial_Muestra_3" style="width:100%; height:100%" type="number">
                </label>
            </div>  
            <div  class="m4 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Ph_Inicial_Muestra_4" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m5 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Ph_Inicial_Muestra_5" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m6 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Ph_Inicial_Muestra_6" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m7 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Ph_Inicial_Muestra_7" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m8 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Ph_Inicial_Muestra_8" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div class="m9 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Ph_Inicial_Muestra_9" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Ph_Inicial_Muestra_10" style="width:100%; height:100%" type="number">
                </label>
            </div>
        </section>

        <section class="grupo10">
            <div class="pj borde">
                <label style="font-size: 12px">pH ajustado</label>
            </div>

            <div  class="m1 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Ph_Ajustado_Muestra_1" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div class="m2 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Ph_Ajustado_Muestra_2" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m3 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Ph_Ajustado_Muestra_3" style="width:100%; height:100%" type="number">
                </label>
            </div>  
            <div  class="m4 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Ph_Ajustado_Muestra_4" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m5 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Ph_Ajustado_Muestra_5" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m6 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Ph_Ajustado_Muestra_6" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m7 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Ph_Ajustado_Muestra_7" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m8 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Ph_Ajustado_Muestra_8" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m9 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Ph_Ajustado_Muestra_9" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Ph_Ajustado_Muestra_10" style="width:100%; height:100%" type="number">
                </label>
            </div>
        </section>

        <section class="grupo11">
            <div class="pj borde">
                <label style="font-size: 12px">Cloro total mg/l</label>
            </div>


            <div  class="m1 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Cloro_Total_Muestra_1" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m2 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Cloro_Total_Muestra_2" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m3 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Cloro_Total_Muestra_3" style="width:100%; height:100%" type="number">
                </label>
            </div>  
            <div  class="m4 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Cloro_Total_Muestra_4" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m5 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Cloro_Total_Muestra_5" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m6 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Cloro_Total_Muestra_6" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m7 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Cloro_Total_Muestra_7" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m8 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Cloro_Total_Muestra_8" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m9 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Cloro_Total_Muestra_9" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Cloro_Total_Muestra_10" style="width:100%; height:100%" type="number">
                </label>
            </div>
        </section>

        <section class="grupo12">
            <div class="pj borde">
                <label style="font-size: 12px">Factor de dilución</label>
            </div>

            <div  class="m1 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Factor_de_Dilucion_Muestra1" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m2 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Factor_de_Dilucion_Muestra2"  style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m3 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Factor_de_Dilucion_Muestra3" style="width:100%; height:100%" type="number">
                </label>
            </div>  
            <div  class="m4 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Factor_de_Dilucion_Muestra4" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m5 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Factor_de_Dilucion_Muestra5" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m6 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Factor_de_Dilucion_Muestra6" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m7 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Factor_de_Dilucion_Muestra7" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m8 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Factor_de_Dilucion_Muestra8" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m9 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Factor_de_Dilucion_Muestra9" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Factor_de_Dilucion_Muestra10" style="width:100%; height:100%" type="number">
                </label>
            </div>
        </section>

        <section class="grupo13">
            <div class="pj borde">
                <label style="font-size: 12px">Alicuota (ml)</label>
            </div>

            <div  class="m1 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Alicuota_Muestra_1" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m2 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Alicuota_Muestra_2" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m3 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Alicuota_Muestra_3" style="width:100%; height:100%" type="number">
                </label>
            </div>  
            <div  class="m4 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Alicuota_Muestra_4" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m5 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Alicuota_Muestra_5" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m6 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Alicuota_Muestra_6" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m7 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Alicuota_Muestra_7" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m8 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Alicuota_Muestra_8" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m9 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Alicuota_Muestra_9" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Alicuota_Muestra_10" style="width:100%; height:100%" type="number">
                </label>
            </div>
        </section>

        <section class="grupo14">
            <div class="pj borde">
                <label style="font-size: 12px">Volumen gastado (ml)</label>
            </div>

            <div  class="m1 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Volumen_Gastado_Muestra_1" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m2 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Volumen_Gastado_Muestra_2" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m3 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Volumen_Gastado_Muestra_3" style="width:100%; height:100%" type="number">
                </label>
            </div>  
            <div  class="m4 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Volumen_Gastado_Muestra_4" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m5 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Volumen_Gastado_Muestra_5" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m6 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Volumen_Gastado_Muestra_6" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m7 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Volumen_Gastado_Muestra_7" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m8 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Volumen_Gastado_Muestra_8" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m9 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Volumen_Gastado_Muestra_9" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Volumen_Gastado_Muestra_10" style="width:100%; height:100%" type="number">
                </label>
            </div>
        </section>

        <section class="grupo15">
            <div class="pj borde">
                <label style="font-size: 12px">Resultado</label>
            </div>

            <div  class="m1 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Resultado_Muestra_1" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m2 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Resultado_Muestra_2" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m3 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Resultado_Muestra_3" style="width:100%; height:100%" type="number">
                </label>
            </div>  
            <div  class="m4 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Resultado_Muestra_4" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m5 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Resultado_Muestra_5" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m6 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Resultado_Muestra_6" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m7 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Resultado_Muestra_7" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m8 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Resultado_Muestra_8" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m9 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Resultado_Muestra_9" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Resultado_Muestra_10" style="width:100%; height:100%" type="number">
                </label>
            </div>
        </section>

        <section class="grupo16">
            <div class="pj borde">
                <label style="font-size: 12px">%RSD</label>
            </div>

            <div  class="m1 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.RSD_Muestra_1" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m2 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.RSD_Muestra_2" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m3 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.RSD_Muestra_3" style="width:100%; height:100%" type="number">
                </label>
            </div>  
            <div  class="m4 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.RSD_Muestra_4" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m5 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.RSD_Muestra_5" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m6 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.RSD_Muestra_6" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m7 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.RSD_Muestra_7" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m8 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.RSD_Muestra_8" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m9 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.RSD_Muestra_9" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.RSD_Muestra_10" style="width:100%; height:100%" type="number">
                </label>
            </div>
        </section>


        <section class="grupo17">
            <div class="pj borde">
                <label style="font-size: 12px">%Recuperación</label>
            </div>

            <div  class="m1 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Recuperacion_Muestra_1" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m2 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Recuperacion_Muestra_2" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m3 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Recuperacion_Muestra_3" style="width:100%; height:100%" type="number">
                </label>
            </div>  
            <div  class="m4 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Recuperacion_Muestra_4" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m5 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Recuperacion_Muestra_5" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m6 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Recuperacion_Muestra_6" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m7 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Recuperacion_Muestra_7" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m8 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Recuperacion_Muestra_8" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m9 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Recuperacion_Muestra_9" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Recuperacion_Muestra_10" style="width:100%; height:100%" type="number">
                </label>
            </div>
        </section>

        <section class="grupo18">
            <div  class="pj borde">
                <label style="font-size: 12px">Resultado promedio</label>
            </div>

            <div class="m1 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Resultado_Promedio_Muestra_1" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m2 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Resultado_Promedio_Muestra_2" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div class="m3 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Resultado_Promedio_Muestra_3" style="width:100%; height:100%" type="number">
                </label>
            </div>  
            <div  class="m4 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Resultado_Promedio_Muestra_4" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m5 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Resultado_Promedio_Muestra_5" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m6 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Resultado_Promedio_Muestra_6" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m7 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Resultado_Promedio_Muestra_7" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div  class="m8 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Resultado_Promedio_Muestra_8" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div class="m9 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Resultado_Promedio_Muestra_9" style="width:100%; height:100%" type="number">
                </label>
            </div>
            <div class="m10 borde">
                <label style="font-size: 12px; width:100%; height:100%">
                    <input v-model="formulario.Resultado_Promedio_Muestra_10" style="width:100%; height:100%" type="number">
                </label>
            </div>
        </section>

        <section class="grupo19-2">
            <div class="pj">
                <label style="font-size: 12px; width:100%">Estandarización Agente titulante
                    <input v-model="formulario.Estandarizacion_Agente_Titulante" type="text" style="width:84%">
                </label>
            </div>
        </section>

        <section class="grupo20">
            <div class="pj borde">

                <div class="secciones">
                    <label style="font-size: 12px; width:100%">Nombre agente titulante: 
                        <input v-model="formulario.Nombre_Agente_Titulante" style="width:65%; border:none;" type="text">
                    </label>
                    <label style="font-size: 12px; width:100%">Nombre patrón: 
                        <input v-model="formulario.Nombre_Patron" style="width:74%; border:none;" type="text">
                    </label>
                    <label style="font-size: 12px; width:100%">Concentración patrón: 
                        <input v-model="formulario.Concentracion_Patron" style="width:68%; border:none;" type="text">
                    </label>
                    <label style="font-size: 12px; width:100%">Alícuota patrón (ml): 
                        <input v-model="formulario.Alicuota_Patron" style="width:70%; border:none;" type="number">
                    </label>
                    <label style="font-size: 12px; width:100%">Gasto blanco: 
                        <input v-model="formulario.Gasto_Blanco" style="width:77%; border:none;" type="number">
                    </label>
                </div>
            </div>

            <div class="pj borde">

                <div class="secciones">
                    <label style="font-size: 12px; width:100%">Gasto titulante: 
                        <input v-model="formulario.Gasto_Titulante" style="width:75%; border:none;" type="number">
                    </label>
                    <label style="font-size: 12px; width:100%">1: 
                        <input v-model="formulario.Gasto_Titulante_1" style="width:96%; border:none;" type="number">
                    </label>
                    <label style="font-size: 12px; width:100%">2: 
                        <input v-model="formulario.Gasto_Titulante_2" style="width:96%; border:none;" type="number">
                    </label>
                    <label style="font-size: 12px; width:100%">3: 
                        <input v-model="formulario.Gasto_Titulante_3" style="width:96%; border:none;" type="number">
                    </label>
                    <label style="font-size: 12px; width:100%">Promedio (ml): 
                        <input v-model="formulario.Gasto_Titulante_Promedio" style="width:76%; border:none;" type="number">
                    </label>
                </div>
            </div>

            <div class="pj borde">
                <label style="font-size: 12px; width:100%">Concentración titulante: 
                    <input v-model="formulario.Agente_Concentracion_Titulante" style="width:64%; border:none;" type="number">
                </label>
            </div>
        </section>


        <section class="informacion1" style="text-align: left;">
            <label style="text-align: left; font-size: 10px;"> <span style="font-weight: bold">%RSD ≤ 10%, %Recuperación 90% a 110%, parámetro Cloruro: %RSD &lt; 5% y %Recuperación entre 95 a 105%,</span></label>
            <br>
         <label style="text-align: left; font-size: 10px; font-weight: bold">Nota: La medición de cloro lobre aplica solo para ensayos de determinación de Nitrogeno total.
             T°obs: Temperatura observada, T°corr: Temperatura corregida aplicando el factor de corrección, MR: metrial de referencia, MC: muestra control </label>
        </section>

        <section class="grupo19">
            <label style=" font-size: 12px; width:100%">Condiciones agua de análisis: ph: <input v-model="formulario.Condicion_Agua_de_Analisis_pH" type="number" style="width:30%;">  </label>
            <label style="font-size: 12px;">Conductividad μs/cm: <input v-model="formulario.Conductividad" type="number">  </label>
            <label style=" font-size: 12px;">T°Obs: <input v-model="formulario.Temperatura_Observada" type="number"> </label>
            <label style=" font-size: 12px;">T°Corre: <input v-model="formulario.Temperatura_Corregida" type="number"> </label>
            <label style="font-size: 12px;">(T° Obs*: Temperatura Observada T°Corr*: Temperatura corregida aplicando el factor de corrección) </label>
        </section>

        <section class="grupo22">

            <label style="font-weight: bold; font-size: 12px">Realizado por: <input v-model="formulario.Realizado_Por" type="text"></label>

            <label style="font-size: 12px;">Revisado por: <input v-model="formulario.Revisado_Por" type="text"></label>
            <label style="font-size: 12px;">Aprobado por: <input v-model="formulario.Aprobado_Por" type="text"></label>
            
        </section>

        <section class="grupo21">
            <p style="color: blue; font-size: 10px">PT-6F-6 (22°versión) <br> 27-07-2022</p>

            <p style="color: blue; font-size: 10px">Página 1</p>

            <p style="color: blue; font-size: 10px">Laboratorio de Servicios Analiticos <br> Avda. Angamos 0610, Pabellón Ñ-1 2° piso * Antofagasta <br>
            Fono 552355613 - 552355633 <br> LSA@UCN.CL, ADM.LSA@UCN.CL</p>
        </section>


        <button @click="confirmarActualizacion(formulario)">Actualizar</button>
        <button @click="confirmarEnvio(formulario)">Duplicar</button>

        </div>

    </div>
</template>


<script>
import axios from 'axios';

import { getUserInfo } from '@/helpers/api-services/Auth.service';

import { isLoggedIn } from '@/helpers/api-services/Auth.service';

export default{
    data(){
        return {
            dato: '',
            respuesta: '',
            mostrar: '',
            rut_empleado: '',
            formulario:{
                Numero_Informe: '',
                Fecha_Hora_Inicio: '',
                Fecha_Hora_Termino: '',
                Tipo_de_Muestra: '',
                Otro_Tipo_de_Muestra:'',
                Numero_de_Muestras: '',
                Identificacion_Muestra: '',
                Tratamiento_Preliminar: '',
                Otro_Tratamiento_Preliminar: '',
                Analisis_de: '',
                Metodo_de_Ensayo: '',
                Agente_Titulante: '',
                Fecha_Estandarizacion: '',
                Concentracion_Titulante: '',
                Expresado_Como: '',
                Otro_Expresado_Como: '',
                Resultado_Final: '',
                Otro_Resultado_Final: '',
                Temperatura_Estufa: '',
                Temperatura_Manto: '',

                Ph_Inicial_Muestra_1: '',
                Ph_Inicial_Muestra_2: '',
                Ph_Inicial_Muestra_3: '',
                Ph_Inicial_Muestra_4: '',
                Ph_Inicial_Muestra_5: '',
                Ph_Inicial_Muestra_6: '',
                Ph_Inicial_Muestra_7: '',
                Ph_Inicial_Muestra_8: '',
                Ph_Inicial_Muestra_9: '',
                Ph_Inicial_Muestra_10: '',

                Ph_Ajustado_Muestra_1: '',
                Ph_Ajustado_Muestra_2: '',
                Ph_Ajustado_Muestra_3: '',
                Ph_Ajustado_Muestra_4: '',
                Ph_Ajustado_Muestra_5: '',
                Ph_Ajustado_Muestra_6: '',
                Ph_Ajustado_Muestra_7: '',
                Ph_Ajustado_Muestra_8: '',
                Ph_Ajustado_Muestra_9: '',
                Ph_Ajustado_Muestra_10: '',

                Cloro_Total_Muestra_1: '',
                Cloro_Total_Muestra_2: '',
                Cloro_Total_Muestra_3: '',
                Cloro_Total_Muestra_4: '',
                Cloro_Total_Muestra_5: '',
                Cloro_Total_Muestra_6: '',
                Cloro_Total_Muestra_7: '',
                Cloro_Total_Muestra_8: '',
                Cloro_Total_Muestra_9: '',
                Cloro_Total_Muestra_10: '',

                Factor_de_Dilucion_Muestra1: '',
                Factor_de_Dilucion_Muestra2: '',
                Factor_de_Dilucion_Muestra3: '',
                Factor_de_Dilucion_Muestra4: '',
                Factor_de_Dilucion_Muestra5: '',
                Factor_de_Dilucion_Muestra6: '',
                Factor_de_Dilucion_Muestra7: '',
                Factor_de_Dilucion_Muestra8: '',
                Factor_de_Dilucion_Muestra9: '',
                Factor_de_Dilucion_Muestra10: '',

                Alicuota_Muestra_1: '',
                Alicuota_Muestra_2: '',
                Alicuota_Muestra_3: '',
                Alicuota_Muestra_4: '',
                Alicuota_Muestra_5: '',
                Alicuota_Muestra_6: '',
                Alicuota_Muestra_7: '',
                Alicuota_Muestra_8: '',
                Alicuota_Muestra_9: '',
                Alicuota_Muestra_10: '',

                Volumen_Gastado_Muestra_1: '',
                Volumen_Gastado_Muestra_2: '',
                Volumen_Gastado_Muestra_3: '',
                Volumen_Gastado_Muestra_4: '',
                Volumen_Gastado_Muestra_5: '',
                Volumen_Gastado_Muestra_6: '',
                Volumen_Gastado_Muestra_7: '',
                Volumen_Gastado_Muestra_8: '',
                Volumen_Gastado_Muestra_9: '',
                Volumen_Gastado_Muestra_10: '',

                Resultado_Muestra_1: '',
                Resultado_Muestra_2: '',
                Resultado_Muestra_3: '',
                Resultado_Muestra_4: '',
                Resultado_Muestra_5: '',
                Resultado_Muestra_6: '',
                Resultado_Muestra_7: '',
                Resultado_Muestra_8: '',
                Resultado_Muestra_9: '',
                Resultado_Muestra_10: '',

                RSD_Muestra_1:'',
                RSD_Muestra_2:'',
                RSD_Muestra_3:'',
                RSD_Muestra_4:'',
                RSD_Muestra_5:'',
                RSD_Muestra_6:'',
                RSD_Muestra_7:'',
                RSD_Muestra_8:'',
                RSD_Muestra_9:'',
                RSD_Muestra_10:'',

                Recuperacion_Muestra_1: '',
                Recuperacion_Muestra_2: '',
                Recuperacion_Muestra_3: '',
                Recuperacion_Muestra_4: '',
                Recuperacion_Muestra_5: '',
                Recuperacion_Muestra_6: '',
                Recuperacion_Muestra_7: '',
                Recuperacion_Muestra_8: '',
                Recuperacion_Muestra_9: '',
                Recuperacion_Muestra_10: '',

                Resultado_Promedio_Muestra_1:'',
                Resultado_Promedio_Muestra_2:'',
                Resultado_Promedio_Muestra_3:'',
                Resultado_Promedio_Muestra_4:'',
                Resultado_Promedio_Muestra_5:'',
                Resultado_Promedio_Muestra_6:'',
                Resultado_Promedio_Muestra_7:'',
                Resultado_Promedio_Muestra_8:'',
                Resultado_Promedio_Muestra_9:'',
                Resultado_Promedio_Muestra_10:'',

                Estandarizacion_Agente_Titulante: '',

                Nombre_Agente_Titulante: '',
                Nombre_Patron: '',
                Concentracion_Patron: '',
                Alicuota_Patron: '',
                Gasto_Blanco: '',

                Gasto_Titulante: '',
                Gasto_Titulante_1: '',
                Gasto_Titulante_2: '',
                Gasto_Titulante_3: '',
                Gasto_Titulante_Promedio: '',

                Agente_Concentracion_Titulante:'',

                ConcentraciónTitulante: '',

                Condicion_Agua_de_Analisis_pH: '',
                Conductividad: '',
                Temperatura_Observada: '',
                Temperatura_Corregida: '',

                Realizado_Por: '',
                Revisado_Por: '',
                Aprobado_Por: '',

                tecnica: this.idTecnica,


                
            }
        }
    },
    props:{
        data: Number,
        idTecnica: Number,
        formularios: Array,
    },
    mounted(){
        this.retornarDatoUsuario();
    },
    watch:{
        respuesta(valor){
            if(valor!=''){
                this.rellenar(this.formulario,valor);
            }
        }
    },
    methods: {
        retornarDatoUsuario(){
            if(isLoggedIn()){
                this.datosUser = getUserInfo();
                console.log('Obteniendo datos del usuario.')
                console.log(this.datosUser.rut);
                this.rut_empleado = this.datosUser.rut;
                console.log(this.$route.params.RUM);
            }
        },
        confirmarActualizacion(formulario){
            const mensaje = "¿Estás seguro de que quieres realizar está acción?\n\n" + 
                            "Una vez confirmado, el sistema actualizará el registro."
            if(window.confirm(mensaje)){
                console.log("Se ha confirmado la acción");
                this.editarFormulario(formulario,'No');
            }
            else{
                console.log("Acción cancelada");
            }
        },
        confirmarEnvio(formulario){
            const mensaje = "¿Estás seguro de que quieres realizar está acción?\n\n" +
                            "Una vez confirmado, el sistema creará un nuevo registro"
            if(window.confirm(mensaje)){
                this.enviarFormulario(formulario);
            }
        },
        rellenar(formulario,valor){
            console.log('ENTRANDO');
            axios.post('http://127.0.0.1:8000/api/actualizar-formulario/'+ valor).then(response => {
                console.log('respuesta');
                console.log(this.data);

                console.log(response.data);

                if(response.data.length > 0){
                    this.tecnica = response.data[response.data.length-1].tecnica;

                    const campos_formulario = Object.keys(formulario);
                    for (let i = 0; i < (response.data.length -1); i++) {
                        const valor = response.data[i].Valor;
                        this.formulario[campos_formulario[i]] = valor;
                    }

                    this.mostrar= 'Si';

                }
            })
            .catch(error => {
                console.log(this.$route.params.id_formulario);
                console.log('Error', error);
            });
            console.log(formulario);
            //for(let key in formulario){
            //    formulario[key] = '';
            //}
        },
        
        editarFormulario(formulario,clonar){
            axios.put('http://127.0.0.1:8000/api/editar-formulario/'+this.respuesta,formulario).then(response => {
                console.log('respuesta');
                console.log(response);
                if(clonar == 'No'){
                    //this.$router.back();
                }
            })
            .catch(error => {
                console.log('Error', error);
            });

            this.$bvToast.toast('Se ha actualizado con exito',{
                    title: "Estimado Usuario",
                    variant: 'success',
                    solid: true,
                    appendToast: true,
                    toaster: 'b-toaster-top-center'
                });
            setTimeout(() =>{
                this.$router.back();
            }, 2000);
        },
        enviarFormulario(formulario){
            axios.post('http://127.0.0.1:8000/api/crear-formulario/'+this.$route.params.RUM+'/'+this.rut_empleado,formulario).then(response => {
                console.log('respuesta');
                console.log(response);
            })
            .catch(error => {
                console.log('Error', error);
            });

            this.$bvToast.toast('Se ha creado un nuevo registro con exito',{
                    title: "Estimado Usuario",
                    variant: 'success',
                    solid: true,
                    appendToast: true,
                    toaster: 'b-toaster-top-center'
                });
            setTimeout(() =>{
                this.$router.back();
            }, 2000);
        },
    }
}
</script>


<style scoped>
    .borde{
        border: 1px solid #333;
    }

    .imagenes{
        display: grid;
        grid-template-columns: 33% 33% 33%;
    }

    .ucn img{
        width: 100px;
        height: 100px;
    }

    .lsa img{
        width: 300px;
        height: 100px;
        margin-left: 100px;
    }

    /**    FORMULARIO 2   */

    .grupo1{
        display: grid;
        grid-template-columns: repeat(3,33.3%);
    }

    .grupo2{
        display: grid;
        grid-template-columns: 80% 20%;
    }

    .grupo3{
        display:grid;
        grid-template-columns: 100%;
    }
    
    .grupo4{
        display:grid;
        grid-template-columns: repeat(5,20%);
    }

    .grupo5{
        display: grid;
        grid-template-columns: 100%;
    }
    .grupo6{
        display:grid;
        grid-template-columns: repeat(2,50%);
    }

    .grupo7{
        display:grid;
        grid-template-columns: 50% 25% 25%;
    }

    .grupo8, .grupo9, .grupo10, .grupo11,.grupo12, .grupo13, .grupo14,
    .grupo15, .grupo16, .grupo17, .grupo18{
        display:grid;
        grid-template-columns: 110px repeat(9,9.09%) auto;
    }

    .grupo20{
        display:grid;
        grid-template-columns: repeat(3,33.33%);
    }

    .grupo20 .secciones{
        display:grid;
        grid-template-columns: 100%;
    }
    .grupo19{
        display: grid;
        grid-template-columns:  repeat(5,20%);
    }
    .grupo22{
        display:grid;
        grid-template-columns: repeat(3,33.33%);
    }

    .grupo21{
        display:grid;
        grid-template-columns: repeat(3,33.33%);
        margin-top: 2%;
    }
</style>