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
                <h2 style="text-align:center; color: rgb(50, 50, 237); font-size:16px">TÉCNICA POTENCIOMETRICA</h2>
                <h3 style="text-align:center; color:rgb(50, 50, 237); font-size: 10px;">25° Versión</h3>
            </div>

            <div class="lsa">
                <img src="@/assets/isologo-LSA.png">
            </div>

        </section>


        <section class="grupo1">
            <div class="informe borde">
                <h3 style="font-size: 12px;">Informe N°</h3>
                <input style="width:100%; text-align: center;" type="text" v-model="formulario.Numero_Informe">
            </div>
            <div class="meto borde">
                <h3 style="font-size: 12px">Fecha y hora de inicio:</h3>
                <input style="transform: scale(0.8); width: 100%; text-align: center; border:none;" v-model="formulario.Fecha_Hora_Inicio" type="datetime-local">
            </div>
            <div class="fechaI borde">
                <label style="font-size: 12px; font-weight: bold;">Analisis de:
                <input type="radio" style="transform: scale(0.7);" name="analisis" value="Cianuro" v-model="formulario.Analisis_de"> <span style="font-size: 9px;">Cianuro</span>
                <input type="radio" style="transform: scale(0.7);" name="analisis" value ="AmoniacoExpresadoComo" v-model="formulario.Analisis_de"> <span style="font-size: 9px;">Amoniaco Expresado como:</span>
                <input type="radio" style="transform: scale(0.7);" name="analisis-2" value="Fluoruro" v-model="formulario.Analisis_de"> <span style="font-size: 9px;">Fluoruro</span>
                <input type="radio" style="transform: scale(0.7);" name="analisis-2" value="Sulfuro" v-model="formulario.Analisis_de"> <span style="font-size: 9px;">Sulfuro</span>
                <input type="radio" style="transform: scale(0.7);" name="analisis-2" value="Otro" v-model="formulario.Analisis_de"> <span style="font-size: 9px;">Otro <input style="width:80px" type="text" v-model="formulario.Otro_Analisis_de" ></span>
                </label>
                
            </div>
            <div class="fechaF borde">
                <h3 style="font-size: 12px">Metodología:</h3>
                <input style="width:100%; text-align: center;" type="text" v-model="formulario.Metodologia">
            </div>

            <div class="analis borde">
                <h3 style="font-size: 12px">Fecha y hora de término:</h3>
                <input style="transform: scale(0.8); width: 100%; text-align: center; border:none;" type="datetime-local" v-model="formulario.Fecha_Hora_Termino">
            </div>
            <div class="tipoM borde">
                <label style="font-size: 12px; font-weight: bold; margin-bottom:2px">Tipo de Muestra Agua:
                <input type="radio" style="transform: scale(0.7);" name="analisis2" value="Potable" v-model="formulario.Tipo_de_Muestra_Agua"> <span style="font-size: 9px;">Potable</span>
                <input type="radio" style="transform: scale(0.7);" name="analisis2" value="Residual" v-model="formulario.Tipo_de_Muestra_Agua"> <span style="font-size: 9px;">Residual:</span>
                <input type="radio" style="transform: scale(0.7);" name="analisis2" value="Industrial" v-model="formulario.Tipo_de_Muestra_Agua"> <span style="font-size: 9px;">Industrial</span>
                <input type="radio" style="transform: scale(0.7);" name="analisis2" value="Osmosis" v-model="formulario.Tipo_de_Muestra_Agua"> <span style="font-size: 9px;">Osmosis</span>
                <input type="radio" style="transform: scale(0.7);" name="analisis2" value="Otro" v-model="formulario.Tipo_de_Muestra_Agua"> <span style="font-size: 9px;">Otro <input style="width:80px" type="text" v-model="formulario.Otro_Tipo_de_Muestra_Agua"></span>
                </label>

                <label style="font-size: 12px; font-weight: bold; margin-bottom: 0%;">Tipo de Muestra: 
                <input type="radio" style="transform: scale(0.7);" name="analisis2" value="Mineral" v-model="formulario.Tipo_de_Muestra"> <span style="font-size: 9px;">Mineral</span>
                <input type="radio" style="transform: scale(0.7);" name="analisis2" value="Suelos" v-model="formulario.Tipo_de_Muestra"> <span style="font-size: 9px;">Suelos:</span>
                <input type="radio" style="transform: scale(0.7);" name="analisis2" value="Otro"> <span style="font-size: 9px;">Otro <input style="width:80px" type="text" v-model="formulario.Otro_Tipo_de_Muestra"></span>
                </label>

            </div>
        </section>

        <section style="width:100%;" class="id_muestra borde">
            <label class="borde" style="font-size: 12px; width:100%; margin-bottom: 0%; font-weight: bold;">Identificación de la muestra
            <input style="width:85%; text-align: center; border: none" type="text" v-model="formulario.id_Muestra">
            
            </label>
        </section>

        <section class="grupo2">
            <div class="muestra1 borde">
                <label style="font-size:12px;">M1 Blanco <input style="width:100%; border:none; text-align:center;" type="text"></label>
            </div>

            <div class="muestra2 borde">
                <label style="font-size:12px;">M2 BCO FORT <input style="width:100%; border:none; text-align:center;" type="text"></label>
            </div>

            <div class="muestra3 borde">
                <label style="font-size:12px;">M3 BCO FORT. D <input style="width:100%; border:none; text-align:center;" type="text"></label>
            </div>
            <div class="muestra4 borde">
                <label style="font-size:12px;">M4 Muestra <input style="width:100%; border:none; text-align:center;" type="text"> </label>
            </div>
            <div class="muestra5 borde">
                <label style="font-size:12px;">M5 Fort. <input style="width:100%; border:none; text-align:center;" type="text"> </label>
            </div>
            <div class="muestra6 borde">
                <label style="font-size:12px;">M6 Fort D <input style="width:100%; border:none; text-align:center;" type="text"> </label>
            </div>
            <div class="muestra7 borde">
                <label style="font-size:12px;">M7 <input style="width:100%; border:none; text-align:center;" type="text"> </label>
            </div>
            <div class="muestra8 borde">
                <label style="font-size:12px;">M8 <input style="width:100%; border:none; text-align:center;" type="text"> </label>
            </div>
            <div class="muestra9 borde">
                <label style="font-size:12px;">M9 <input style="width:100%; border:none; text-align:center;" type="text"> </label>
            </div>
            <div class="muestra10 borde">
                <label style="font-size:12px;">M10 <input style="width:100%; border:none; text-align:center;" type="text"> </label>
            </div>

            <div class="compuesto1 borde"><label style="font-size: 10px; font-weight: bold; width:100%">*PbCO3 (g):
            
            <input style="width:40%; border:none; text-align:center;" type="number" v-model="formulario.PbCO3_Muestra_1">
            </label></div>
            <div class="compuesto2 borde"><label style="font-size: 10px; font-weight: bold; ">*PbCO3 (g):
            <input style="width:40%; border:none; text-align:center;" type="number" v-model="formulario.PbCO3_Muestra_2">
            </label></div>
            <div class="compuesto3 borde"><label style="font-size: 10px; font-weight: bold;">*PbCO3 (g):
            <input style="width:40%; border:none; text-align:center;" type="number" v-model="formulario.PbCO3_Muestra_3">
            </label></div>
            <div class="compuesto4 borde"><label style="font-size: 10px; font-weight: bold;">*PbCO3 (g):
            <input style="width:40%; border:none; text-align:center;" type="number" v-model="formulario.PbCO3_Muestra_4">
            </label></div>
            <div class="compuesto5 borde"><label style="font-size: 10px; font-weight: bold;">*PbCO3 (g):
            <input style="width:40%; border:none; text-align:center;" type="number" v-model="formulario.PbCO3_Muestra_5">
            </label></div>
            <div class="compuesto6 borde"><label style="font-size: 10px; font-weight: bold;">*PbCO3 (g):
            <input style="width:40%; border:none; text-align:center;" type="number" v-model="formulario.PbCO3_Muestra_6">
            </label></div>
            <div class="compuesto7 borde"><label style="font-size: 10px; font-weight: bold;">*PbCO3 (g):
            <input style="width:40%; border:none; text-align:center;" type="number" v-model="formulario.PbCO3_Muestra_7">
            </label></div>
            <div class="compuesto8 borde"><label style="font-size: 10px; font-weight: bold;">*PbCO3 (g):
            <input style="width:40%; border:none; text-align:center;" type="number" v-model="formulario.PbCO3_Muestra_8">
            </label></div>
            <div class="compuesto9 borde"><label style="font-size: 10px; font-weight: bold;">*PbCO3 (g):
            <input style="width:40%; border:none; text-align:center;" type="number" v-model="formulario.PbCO3_Muestra_9">
            </label></div>
            <div class="compuesto10 borde"><label style="font-size: 10px; font-weight: bold;">*PbCO3 (g):
            <input style="width:40%; border:none; text-align:center;" type="number" v-model="formulario.PbCO3_Muestra_10">
            </label></div>

            <div class="fechaInicio1 borde"><h4 style="font-size: 9px;">Fecha y hora de inicio</h4>
            
                <input style="transform: scale(0.8); font-size: 14px; width: 100%; text-align: center; border:none;" type="datetime-local" v-model="formulario.Fecha_Hora_Inicial_Muestra_1">
            </div>

            <div class="fechaInicio2 borde"><h4 style="font-size: 9px;">Fecha y hora de inicio</h4>
                <input style="transform: scale(0.8); font-size: 14px; width: 100%; text-align: center; border:none;" type="datetime-local" v-model="formulario.Fecha_Hora_Inicial_Muestra_2">
            </div>

            <div class="fechaInicio3 borde"><h4 style="font-size: 9px;">Fecha y hora de inicio</h4>
                <input style="transform: scale(0.8); font-size: 14px; width: 100%; text-align: center; border:none;" type="datetime-local" v-model="formulario.Fecha_Hora_Inicial_Muestra_3">
            </div>

            <div class="fechaInicio4 borde"><h4 style="font-size: 9px;">Fecha y hora de inicio</h4>
                <input style="transform: scale(0.8); font-size: 14px; width: 100%; text-align: center; border:none;" type="datetime-local" v-model="formulario.Fecha_Hora_Inicial_Muestra_4">
            </div>
            <div class="fechaInicio5 borde"><h4 style="font-size: 9px;">Fecha y hora de inicio</h4>
            
                <input style="transform: scale(0.8); font-size: 14px; width: 100%; text-align: center; border:none;" type="datetime-local" v-model="formulario.Fecha_Hora_Inicial_Muestra_5">
            </div>

            <div class="fechaInicio6 borde"><h4 style="font-size: 9px;">Fecha y hora de inicio</h4>
                <input style="transform: scale(0.8); font-size: 14px; width: 100%; text-align: center; border:none;" type="datetime-local" v-model="formulario.Fecha_Hora_Inicial_Muestra_6">
            </div>

            <div class="fechaInicio7 borde"><h4 style="font-size: 9px;">Fecha y hora de inicio</h4>
                <input style="transform: scale(0.8); font-size: 14px; width: 100%; text-align: center; border:none;" type="datetime-local" v-model="formulario.Fecha_Hora_Inicial_Muestra_7">
            </div>

            <div class="fechaInicio8 borde"><h4 style="font-size: 9px;">Fecha y hora de inicio</h4>
                <input style="transform: scale(0.8); font-size: 14px; width: 100%; text-align: center; border:none;" type="datetime-local" v-model="formulario.Fecha_Hora_Inicial_Muestra_8">
            </div>

            <div class="fechaInicio9 borde"><h4 style="font-size: 9px;">Fecha y hora de inicio</h4>
                <input style="transform: scale(0.8); font-size: 14px; width: 100%; text-align: center; border:none;" type="datetime-local" v-model="formulario.Fecha_Hora_Inicial_Muestra_9">
            </div>

            <div class="fechaInicio10 borde"><h4 style="font-size: 9px;">Fecha y hora de inicio</h4>
                <input style="transform: scale(0.8); font-size: 14px; width: 100%; text-align: center; border:none;" type="datetime-local" v-model="formulario.Fecha_Hora_Inicial_Muestra_10">
            </div>


        </section>

        <section class="grupo3">
            <div style=" width:100%;" class="curva borde"><label style="width:100%; font-weight:bold;">Curva de calibración Unidades de concentración:
                <input type="radio" name="Curva" value="mg / L" v-model="formulario.CurvaCalibracion_Unidad_de_Concentracion"> <span style="font-size: 11px;">mg / L</span>
                <input type="radio" name="Curva" value="ug / L" v-model="formulario.CurvaCalibracion_Unidad_de_Concentracion"> <span style="font-size: 11px;">ug / L</span>
            </label></div>

            <div class="pendiente borde"><label style="font-weight: bold; width:100%;">Pendiente (mv)
                <input style="width:72%; border:none; text-align:center; border: none;" type="number" v-model="formulario.Pendiente">
            </label></div>
        </section>

        <section class="grupo4">
            <div  class="concentracion borde">
                <label style="font-size:12px; margin-top: 4%;">Concentración</label>
            </div>
            <div  class="st1 borde">
                <label style="font-size:12px;">St.1: <input style="width:100%; border:none; text-align:center;" type="text"></label>
            </div>
            <div  class="st2 borde">
                <label style="font-size:12px;">St.2: <input style="width:100%; border:none; text-align:center;" type="text"></label>
            </div>
            <div  class="st3 borde">
                <label style="font-size:12px;">St.3: <input style="width:100%; border:none; text-align:center;" type="text"></label>
            </div>
            <div  class="st4 borde">
                <label style="font-size:12px;">St.4: <input style="width:100%; border:none; text-align:center;" type="text"></label>
            </div>
            <div  class="st5 borde">
                <label style="font-size:12px;">St.5: <input style="width:100%; border:none; text-align:center;" type="text"></label>
            </div>
        </section>

        <section class="grupo5">
            <div class="Energia borde"><h4>E(mV)</h4></div>
            <div  class="contenedor1 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Energia_St_1"></div>
            <div  class="contenedor2 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Energia_St_2"></div>
            <div  class="contenedor3 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Energia_St_3"></div>
            <div  class="contenedor4 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Energia_St_4"></div>
            <div  class="contenedor5 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Energia_St_5"></div>
        </section>

        <section class="grupo6">
            <div class="Tobs borde"><h4>T°Obs*</h4></div>
            <div class="Tcorr borde"><h4>T°Corr*</h4></div>
            <div  class="contenedor1 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Temperatura_Observacion_St_1"></div>
            <div  class="contenedor1 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Temperatura_Correlacion_St_1"></div>
            <div  class="contenedor1 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Temperatura_Observacion_St_2"></div>
            <div  class="contenedor1 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Temperatura_Correlacion_St_2"></div>
            <div  class="contenedor1 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Temperatura_Observacion_St_3"></div>
            <div  class="contenedor1 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Temperatura_Correlacion_St_3"></div>
            <div  class="contenedor1 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Temperatura_Observacion_St_4"></div>
            <div  class="contenedor1 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Temperatura_Correlacion_St_4"></div>
            <div  class="contenedor1 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Temperatura_Observacion_St_5"></div>
            <div  class="contenedor1 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Temperatura_Correlacion_St_5"></div>
        </section>

        <section class="grupo7">
            <div style=" width: 100%;" class="analisisMuestra borde"><label style="width:100%; font-weight: bold;">Análisis de Muestras: Valores informados
            <input type="radio" name="ANAMuestra" value="mg / L" v-model="formulario.Analisis_Valor_Informado"> <span style="font-size: 11px;">mg / L</span>
            <input type="radio" name="ANAMuestra" value="mg / Kg" v-model="formulario.Analisis_Valor_Informado"> <span style="font-size: 11px;">mg / Kg</span>
            <input type="radio" name="ANAMuestra" value="ug / L" v-model="formulario.Analisis_Valor_Informado"> <span style="font-size: 11px;">ug / L</span>
            <input type="radio" name="ANAMuestra" value="%" v-model="formulario.Analisis_Valor_Informado"> <span style="font-size: 11px;">%</span>
            
            </label>
            </div>
        </section>

        <section class="grupo8">
            <div class="muestra borde"><h4>Muestra</h4></div>
            <div class="M1 borde"><h4>M1</h4></div>
            <div class="M2 borde"><h4>M2</h4></div>
            <div class="M3 borde"><h4>M3</h4></div>
            <div class="M4 borde"><h4>M4</h4></div>
            <div class="M5 borde"><h4>M5</h4></div>
            <div class="M6 borde"><h4>M6</h4></div>
            <div class="M7 borde"><h4>M7</h4></div>
            <div class="M8 borde"><h4>M8</h4></div>
            <div class="M9 borde"><h4>M9</h4></div>
            <div class="M10 borde"><h4>M10</h4></div>
        </section>

        <section class="grupo9">
            <div class="aforo borde"><h4>Aforo (ml)</h4></div>
            <div  class="contenido1 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Aforo_Muestra_1"></div>
            <div  class="contenido2 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Aforo_Muestra_2"></div>
            <div  class="contenido3 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Aforo_Muestra_3"></div>
            <div  class="contenido4 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Aforo_Muestra_4"></div>
            <div  class="contenido5 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Aforo_Muestra_5"></div>
            <div  class="contenido6 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Aforo_Muestra_6"></div>
            <div  class="contenido7 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Aforo_Muestra_7"></div>
            <div  class="contenido8 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Aforo_Muestra_8"></div>
            <div  class="contenido9 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Aforo_Muestra_9"></div>
            <div  class="contenido10 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Aforo_Muestra_10"></div>
        </section>
        <section class="grupo9">
            <div class="aforo borde"><h4>Alícuota (ml)</h4></div>
            <div  class="contenido1 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Alicuota_Muestra_1"></div>
            <div  class="contenido2 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Alicuota_Muestra_2"></div>
            <div  class="contenido3 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Alicuota_Muestra_3"></div>
            <div  class="contenido4 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Alicuota_Muestra_4"></div>
            <div  class="contenido5 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Alicuota_Muestra_5"></div>
            <div  class="contenido6 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Alicuota_Muestra_6"></div>
            <div  class="contenido7 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Alicuota_Muestra_7"></div>
            <div  class="contenido8 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Alicuota_Muestra_8"></div>
            <div  class="contenido9 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Alicuota_Muestra_9"></div>
            <div  class="contenido10 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Alicuota_Muestra_10"></div>
        </section>

        <section class="grupo10">
            <div class="ph borde"><h4>ph / T°c</h4></div>
            <div  class="contenido1 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Ph_Temperatura_Muestra_1"></div>
            <div  class="contenido2 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Ph_Temperatura_Muestra_2"></div>
            <div  class="contenido3 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Ph_Temperatura_Muestra_3"></div>
            <div  class="contenido4 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Ph_Temperatura_Muestra_4"></div>
            <div  class="contenido5 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Ph_Temperatura_Muestra_5"></div>
            <div  class="contenido6 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Ph_Temperatura_Muestra_6"></div>
            <div  class="contenido7 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Ph_Temperatura_Muestra_7"></div>
            <div  class="contenido8 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Ph_Temperatura_Muestra_8"></div>
            <div  class="contenido9 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Ph_Temperatura_Muestra_9"></div>
            <div  class="contenido10 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Ph_Temperatura_Muestra_10"></div>
        </section>

        <section class="grupo11">
            <div class="qfc borde"><h4>qFc qFd</h4></div>

            <div  class="contenido1 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Fc_Fd_Muestra_1"></div>
            <div  class="contenido2 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Fc_Fd_Muestra_2"></div>
            <div  class="contenido3 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Fc_Fd_Muestra_3"></div>
            <div  class="contenido4 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Fc_Fd_Muestra_4"></div>
            <div  class="contenido5 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Fc_Fd_Muestra_5"></div>
            <div  class="contenido6 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Fc_Fd_Muestra_6"></div>
            <div  class="contenido7 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Fc_Fd_Muestra_7"></div>
            <div  class="contenido8 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Fc_Fd_Muestra_8"></div>
            <div  class="contenido9 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Fc_Fd_Muestra_9"></div>
            <div  class="contenido10 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Fc_Fd_Muestra_10"></div>
        </section>

        <section class="grupo12">
            <div class="energia borde"><h4>E (mV)</h4></div>
            <div  class="contenido1 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Energia_Muestra_1"></div>
            <div  class="contenido2 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Energia_Muestra_2"></div>
            <div  class="contenido3 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Energia_Muestra_3"></div>
            <div  class="contenido4 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Energia_Muestra_4"></div>
            <div  class="contenido5 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Energia_Muestra_5"></div>
            <div  class="contenido6 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Energia_Muestra_6"></div>
            <div  class="contenido7 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Energia_Muestra_7"></div>
            <div  class="contenido8 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Energia_Muestra_8"></div>
            <div  class="contenido9 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Energia_Muestra_9"></div>
            <div  class="contenido10 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Energia_Muestra_10"></div>
        </section>

        <section class="grupo13">
            <div class="concentracion borde"><h4 style="font-size: 12px;">Concentración (mg/L)</h4></div>

            <div  class="contenido1 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Concentracion_Muestra_1"></div>
            <div  class="contenido2 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Concentracion_Muestra_2"></div>
            <div  class="contenido3 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Concentracion_Muestra_3"></div>
            <div  class="contenido4 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Concentracion_Muestra_4"></div>
            <div  class="contenido5 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Concentracion_Muestra_5"></div>
            <div  class="contenido6 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Concentracion_Muestra_6"></div>
            <div  class="contenido7 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Concentracion_Muestra_7"></div>
            <div  class="contenido8 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Concentracion_Muestra_8"></div>
            <div  class="contenido9 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Concentracion_Muestra_9"></div>
            <div  class="contenido10 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Concentracion_Muestra_10"></div>
        </section>

        <section class="grupo14">
            <div class="concentracionF borde"><h4 style="font-size: 12px;">Concentración final (mg/L)</h4></div>

            <div  class="contenido1 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Concentracion_Final_Muestra_1"></div>
            <div  class="contenido2 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Concentracion_Final_Muestra_2"></div>
            <div  class="contenido3 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Concentracion_Final_Muestra_3"></div>
            <div  class="contenido4 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Concentracion_Final_Muestra_4"></div>
            <div  class="contenido5 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Concentracion_Final_Muestra_5"></div>
            <div  class="contenido6 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Concentracion_Final_Muestra_6"></div>
            <div  class="contenido7 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Concentracion_Final_Muestra_7"></div>
            <div  class="contenido8 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Concentracion_Final_Muestra_8"></div>
            <div  class="contenido9 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Concentracion_Final_Muestra_9"></div>
            <div  class="contenido10 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Concentracion_Final_Muestra_10"></div>

        </section>

        <section class="grupo15">
            <div class="resultadoF borde"><h4>Resultado Final</h4></div>

            <div  class="contenido1 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Resultado_Final_Muestra_1"></div>
            <div  class="contenido2 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Resultado_Final_Muestra_2"></div>
            <div  class="contenido3 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Resultado_Final_Muestra_3"></div>
            <div  class="contenido4 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Resultado_Final_Muestra_4"></div>
            <div  class="contenido5 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Resultado_Final_Muestra_5"></div>
            <div  class="contenido6 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Resultado_Final_Muestra_6"></div>
            <div  class="contenido7 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Resultado_Final_Muestra_7"></div>
            <div  class="contenido8 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Resultado_Final_Muestra_8"></div>
            <div  class="contenido9 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Resultado_Final_Muestra_9"></div>
            <div  class="contenido10 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Resultado_Final_Muestra_10"></div>
        </section>

        <section class="grupo16">
            <div class="promedio borde"><h4>Promedio</h4></div>

            <div  class="contenido1 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Promedio_Muestra_1"></div>
            <div  class="contenido2 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Promedio_Muestra_2"></div>
            <div  class="contenido3 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Promedio_Muestra_3"></div>
            <div  class="contenido4 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Promedio_Muestra_4"></div>
            <div  class="contenido5 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Promedio_Muestra_5"></div>
            <div  class="contenido6 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Promedio_Muestra_6"></div>
            <div  class="contenido7 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Promedio_Muestra_7"></div>
            <div  class="contenido8 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Promedio_Muestra_8"></div>
            <div  class="contenido9 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Promedio_Muestra_9"></div>
            <div  class="contenido10 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Promedio_Muestra_10"></div>
        </section>

        <section class="grupo17">
            <div class="rsd borde"><h4>%RSD</h4></div>
            <div  class="contenido1 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.RSD_Muestra_1"></div>
            <div  class="contenido2 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.RSD_Muestra_2"></div>
            <div  class="contenido3 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.RSD_Muestra_3"></div>
            <div  class="contenido4 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.RSD_Muestra_4"></div>
            <div  class="contenido5 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.RSD_Muestra_5"></div>
            <div  class="contenido6 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.RSD_Muestra_6"></div>
            <div  class="contenido7 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.RSD_Muestra_7"></div>
            <div  class="contenido8 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.RSD_Muestra_8"></div>
            <div  class="contenido9 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.RSD_Muestra_9"></div>
            <div  class="contenido10 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.RSD_Muestra_10"></div>
        </section>

        <section class="grupo18">
            <div class="recuperacion borde"><h4 style="font-size: 12px;">%Recuperación</h4></div>

            <div  class="contenido1 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Recuperacion_Muestra_1"></div>
            <div  class="contenido2 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Recuperacion_Muestra_2"></div>
            <div  class="contenido3 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Recuperacion_Muestra_3"></div>
            <div  class="contenido4 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Recuperacion_Muestra_4"></div>
            <div  class="contenido5 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Recuperacion_Muestra_5"></div>
            <div  class="contenido6 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Recuperacion_Muestra_6"></div>
            <div  class="contenido7 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Recuperacion_Muestra_7"></div>
            <div  class="contenido8 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Recuperacion_Muestra_8"></div>
            <div  class="contenido9 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Recuperacion_Muestra_9"></div>
            <div  class="contenido10 borde"><input style="width:100%; text-align:center; border: none;" type="number" v-model="formulario.Recuperacion_Muestra_10"></div>

        </section>

        <section class="informacion1" style="text-align: left;">
            <label style="text-align: left; font-size: 10px;"> <span style="font-weight: bold">Control de calidad: Analizar en paralelo: </span>Un blanco reactivo - un ensayo
            duplicado - un estándar de concentración conocida, cercano al valor normado (agua potable). Pendientes: Fluoruro
         (-55 a -60 mV para aguas potables, residuales y crudas)- Nitrógeno amoniacal, Amoniaco (-54 a 60 mV Aguas potables y Crudas),
         -58 a -60 mV Aguas residuales, Cianuro (-54 a -60 mV Aguas potables y residual), RSD ≤ al 10% ; %Recuperación (90 a 110%)</label>
         <label style="text-align: left; font-size: 10px;">*Registrar los gramos PbCO3 utilizados en el análisis (solo para análisis de Cianuro) </label>
        </section>

        <section class="grupo19">
            <label style=" font-size: 10px;">Condiciones agua de análisis: ph: <input type="number" v-model="formulario.Condicion_Agua_De_Analisis_pH">  </label>
            <label style="font-size: 10px;">Conductividad μs/cm: <input type="number" v-model="formulario.Conductividad">  </label>
            <label style=" font-size: 10px;">T°Obs: <input type="number" v-model="formulario.Temperatura_Observada" > </label>
            <label style=" font-size: 10px;">T°Corre: <input type="number" v-model="formulario.Temperatura_Corregida"> </label>
            <label style="font-size: 10px;">(T° Obs*: Temperatura Observada T°Corr*: Temperatura corregida aplicando el factor de corrección) </label>
        </section>

        <section class="grupo20">
            <div>
                <label style="font-size: 12px;">Observaciones:</label>
                <textarea style="resize: horizontal; min-width: 100px; max-width: 400px; width:100%; font-size: 10px;"></textarea>
            </div>

    
            <label style="font-weight: bold; font-size: 12px">Realizado por: <input type="text" v-model="formulario.Realizado_Por"></label>

            <label style="font-size: 12px;">Revisado por: <input type="text" v-model="formulario.Revisado_Por"></label>
            <label style="font-size: 12px;">Aprobado por: <input type="text" v-model="formulario.Aprobado_Por"></label>
            
        </section>

        <section class="grupo21">
            <p style="color: blue; font-size: 10px">PT-6F-10 (25°versión) <br> 11-11-2021</p>

            <p style="color: blue; font-size: 10px">Página 1</p>

            <p style="color: blue; font-size: 10px">Laboratorio de Servicios Analiticos <br> Avda. Angamos 0610, Pabellón Ñ-1 2° piso * Antofagasta <br>
            Fono 552355613 - 552355633 <br> LSA@UCN.CL, ADM.LSA@UCN.CL</p>
        </section>
        <button @click="confirmarActualizacion(formulario)">Actualizacion</button>
        <button @click="confirmarEnvio(formulario)">Guardar</button>
    </div>
    </div>
    
</template>


<script>
import { getUserInfo } from '@/helpers/api-services/Auth.service';

import { isLoggedIn } from '@/helpers/api-services/Auth.service';

import axios from 'axios';
export default {
    data(){
        return{
            respuesta: '',
            mostrar: '',
            rut_empleado: '',
            //formulario 1;
            formulario:{
                Numero_Informe: '',
                Fecha_Hora_Inicio: '',
                Fecha_Hora_Termino:'',
                Metodologia: '',
                //Analisis de
                Analisis_de: '',

                Otro_Analisis_de: '',

                //Tipo de Muestra
                Tipo_de_Muestra_Agua: '',

                Otro_Tipo_de_Muestra_Agua: '',

                Tipo_de_Muestra: '',
                Otro_Tipo_de_Muestra: '',
                
                id_Muestra: '',

                //Apartado PbCO3 (g)
                PbCO3_Muestra_1:'',
                PbCO3_Muestra_2:'',
                PbCO3_Muestra_3:'',
                PbCO3_Muestra_4:'',
                PbCO3_Muestra_5:'',
                PbCO3_Muestra_6:'',
                PbCO3_Muestra_7:'',
                PbCO3_Muestra_8:'',
                PbCO3_Muestra_9:'',
                PbCO3_Muestra_10:'',

                //Fecha y hora de inicio por cada muestra siguiendo la plantilla
                Fecha_Hora_Inicial_Muestra_1:'',
                Fecha_Hora_Inicial_Muestra_2:'',
                Fecha_Hora_Inicial_Muestra_3:'',
                Fecha_Hora_Inicial_Muestra_4:'',
                Fecha_Hora_Inicial_Muestra_5:'',
                Fecha_Hora_Inicial_Muestra_6:'',
                Fecha_Hora_Inicial_Muestra_7:'',
                Fecha_Hora_Inicial_Muestra_8:'',
                Fecha_Hora_Inicial_Muestra_9:'',
                Fecha_Hora_Inicial_Muestra_10:'',
                
                CurvaCalibracion_Unidad_de_Concentracion: '',
                Pendiente: '',

                //Concentraciones ST 1-5

                Energia_St_1:'',
                Energia_St_2:'',
                Energia_St_3:'',
                Energia_St_4:'',
                Energia_St_5:'',

                //Temperatura Obs y Corr

                Temperatura_Observacion_St_1:'',
                Temperatura_Observacion_St_2:'',
                Temperatura_Observacion_St_3:'',
                Temperatura_Observacion_St_4:'',
                Temperatura_Observacion_St_5:'',

                Temperatura_Correlacion_St_1:'',
                Temperatura_Correlacion_St_2:'',
                Temperatura_Correlacion_St_3:'',
                Temperatura_Correlacion_St_4:'',
                Temperatura_Correlacion_St_5:'',

                //Analisis de muestras valores informados
                Analisis_Valor_Informado: '',

                //Apartado de muestras desde M1 A M10

                Aforo_Muestra_1:'',
                Aforo_Muestra_2:'',
                Aforo_Muestra_3:'',
                Aforo_Muestra_4:'',
                Aforo_Muestra_5:'',
                Aforo_Muestra_6:'',
                Aforo_Muestra_7:'',
                Aforo_Muestra_8:'',
                Aforo_Muestra_9:'',
                Aforo_Muestra_10:'',

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


                //Apartado de ph / T°C

                Ph_Temperatura_Muestra_1:'',
                Ph_Temperatura_Muestra_2:'',
                Ph_Temperatura_Muestra_3:'',
                Ph_Temperatura_Muestra_4:'',
                Ph_Temperatura_Muestra_5:'',
                Ph_Temperatura_Muestra_6:'',
                Ph_Temperatura_Muestra_7:'',
                Ph_Temperatura_Muestra_8:'',
                Ph_Temperatura_Muestra_9:'',
                Ph_Temperatura_Muestra_10:'',

                //Apartado qFc qfd
                Fc_Fd_Muestra_1:'',
                Fc_Fd_Muestra_2:'',
                Fc_Fd_Muestra_3:'',
                Fc_Fd_Muestra_4:'',
                Fc_Fd_Muestra_5:'',
                Fc_Fd_Muestra_6:'',
                Fc_Fd_Muestra_7:'',
                Fc_Fd_Muestra_8:'',
                Fc_Fd_Muestra_9:'',
                Fc_Fd_Muestra_10:'',


                // Apartado de Energia E
                Energia_Muestra_1:'',
                Energia_Muestra_2:'',
                Energia_Muestra_3:'',
                Energia_Muestra_4:'',
                Energia_Muestra_5:'',
                Energia_Muestra_6:'',
                Energia_Muestra_7:'',
                Energia_Muestra_8:'',
                Energia_Muestra_9:'',
                Energia_Muestra_10:'',


                // Apartado de concentración

                Concentracion_Muestra_1:'',
                Concentracion_Muestra_2:'',
                Concentracion_Muestra_3:'',
                Concentracion_Muestra_4:'',
                Concentracion_Muestra_5:'',
                Concentracion_Muestra_6:'',
                Concentracion_Muestra_7:'',
                Concentracion_Muestra_8:'',
                Concentracion_Muestra_9:'',
                Concentracion_Muestra_10:'',

                //Apartado de concentración final (mg/L)

                Concentracion_Final_Muestra_1:'',
                Concentracion_Final_Muestra_2:'',
                Concentracion_Final_Muestra_3:'',
                Concentracion_Final_Muestra_4:'',
                Concentracion_Final_Muestra_5:'',
                Concentracion_Final_Muestra_6:'',
                Concentracion_Final_Muestra_7:'',
                Concentracion_Final_Muestra_8:'',
                Concentracion_Final_Muestra_9:'',
                Concentracion_Final_Muestra_10:'',

                //Apartado de Resultado Final

                Resultado_Final_Muestra_1: '',
                Resultado_Final_Muestra_2: '',
                Resultado_Final_Muestra_3: '',
                Resultado_Final_Muestra_4: '',
                Resultado_Final_Muestra_5: '',
                Resultado_Final_Muestra_6: '',
                Resultado_Final_Muestra_7: '',
                Resultado_Final_Muestra_8: '',
                Resultado_Final_Muestra_9: '',
                Resultado_Final_Muestra_10: '',


                //Apartado Promedio

                Promedio_Muestra_1: '',
                Promedio_Muestra_2: '',
                Promedio_Muestra_3: '',
                Promedio_Muestra_4: '',
                Promedio_Muestra_5: '',
                Promedio_Muestra_6: '',
                Promedio_Muestra_7: '',
                Promedio_Muestra_8: '',
                Promedio_Muestra_9: '',
                Promedio_Muestra_10: '',

                // Apartado %RSD

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

                // Apartado %Recuperacion

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

                Condicion_Agua_De_Analisis_pH: '',
                Conductividad: '',
                Temperatura_Observada: '',
                Temperatura_Corregida: '',

                Realizado_Por: '',
                Revisado_Por: '',
                Aprobado_Por: '',

                tecnica: this.idTecnica,
            },
        }
    },
    props:{
        data: Number,
        idTecnica: Number,
        formularios: Array,
    },
    mounted(){
        //this.rellenar(this.formulario);
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

    .grupo1{
        display:grid;
        grid-template-columns: 35% 20% 45%;
    }

    .grupo2{
        display: grid;
        grid-template-columns: repeat(10,10%);
    }
    .grupo2 h3,.grupo3 h3{
        font-size: 12px;
    }
    
    .grupo3{
        display: grid;
        grid-template-columns: 60% 40%;
    }

    .grupo4, .grupo5{
        display: grid;
        grid-template-columns: repeat(6,16.666%);
    }
    
    .grupo4 h4, .grupo5 h4, .grupo6 h4, .grupo7 h4, .grupo8 h4, .grupo9 h4, .grupo10 h4, .grupo11 h4, .grupo12 h4
    , .grupo13 h4, .grupo14 h4, .grupo15 h4, .grupo16 h4, .grupo17 h4, .grupo18 h4{
        font-size: 12px;
    }

    .grupo6{
        display: grid;
        grid-template-columns: repeat(12,8.33%);
    }

    .grupo8, .grupo9, .grupo10, .grupo11, .grupo12, .grupo13, .grupo14, .grupo15, .grupo16, .grupo17, .grupo18{
        display: grid;
        grid-template-columns: 110px repeat(10,9.0909%);
    }

    .grupo19{
        display: grid;
        grid-template-columns:  repeat(5,20%);
    }
    .grupo20{
        display: grid;
        grid-template-columns: repeat(4,25%);
    }

    .grupo21{
        display:grid;
        grid-template-columns: repeat(3,33.33%);
        margin-top: 2%;
    }
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


</style>