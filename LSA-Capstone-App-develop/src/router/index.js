import Vue from 'vue'
import VueRouter from 'vue-router'
//import HomeView from '../views/HomeView.vue'
import LoginView from '../views/Login.vue'
import USU004_admPersonal from '../views/USU004_admPersonal'
import MUS001 from '../views/MUS001-Formulario.vue'
import MUS002 from '../views/MUS002-Ingreso.vue'
import MUS003 from '../views/MUS003-vistaQm-AQm.vue'
import MUS004 from '../views/MUS004-vistaSuperv-Jefe.vue'
import MUS006 from '../views/MUS006-vistaGerente.vue'
import MUS007 from '../views/MUS007-vistaAdmFinanza.vue'
import NotFound from '../views/vistaNoEncontrada.vue'
import USU002_admEmpresa from '../views/USU002_admEmpresa'
import USU003_admSolicitante from '../views/USU003_admSolicitante'
import USU005_admDisponibilidad from '../views/USU005_admDisponibilidad'
import admMuestraQuimico from '../views/admMuestra-quimico/admMuestra-quimico'
import admMuestraGerente from '../views/admMuestra-gerente/admMuestra-gerente'
import admMuestraFinanzas from '../views/admMuestra-finanzas/admMuestra-finanzas'
import admMuestraSolicitante from '../views/admMuestra-solicitante/admMuestra-solicitante'
import admMuestraSupervisor from  '../views/admMuestra-supervisor/admMuestra-supervisor'
import ANA001 from '../views/ANA001-RelacionDatos'
import ANA002 from '../views/ANA002-AdmMatriz'
import ANA003 from '../views/ANA003-AdmParam'
import ANA004 from '../views/ANA004-AdmMetodologia'
import ANA005 from '../views/ANA005-AdmNorma'


import ingresoResultados from '../views/ingresoResultados.vue'

import ingresoResultadosSupervisor from '../views/ingresoResultado-supervisor/ingresoResultado-supervisor.vue'

import MAM005 from '../views/MAM005-visualizarProveedores' 
import MAM006 from '../views/SolicitudesCompra'
import MAM007 from '../views/MAM007-visualizarMovimientos'
import MAM008 from '../views/SolicitudesProducto'
import MAM009 from '../views/visualizarEquipos'
import MAM010 from '../views/visualizarReactivos'
import ingresarSolicitud from '../views/ingresarSolicitud'
import MAM011 from '../views/visualizarSolicitudesCompra'
import MAM012 from '../views/visualizarSolicitudesMateriales'
import MAMvistaInicio from '../views/MAM-vistaInicio'
import materialesAseo from '../views/visaMaterialesAseo'
import materialReactivo from '../views/vistaReactivos'
import vistaEquipo from '../views/vistaEquipos'
import vistaProveedores from '../views/vistaProveedores'

import USU001_vistaInicio from '../views/USU001_vistaInicio'
import { isLoggedIn } from "@/helpers/api-services/Auth.service";
import admUsuario from '../views/admUsuario.vue' 
import admPerfil from '../views/USU001_vistaPerfil.vue'
import Restringido from '../views/vistaNoAutorizada.vue'
import store from "@/store/store";



// TODO: implementar manera mas segura de guarda info de usuario
import jscookie from "js-cookie";

Vue.use(VueRouter)

const routes = [
  {
    path: "/restringido",
    name: "Restringido",
    component: Restringido,
    meta: {
      title: "Sistema restringido",
      allowAnonymous: true
    }
  },
  {
    path: '/perfil',
    name: 'perfil',
    component: admPerfil,
    meta: {
      title: "Perfil Usuario",

    }
  },
  {
    path: '/inicio',
    name: 'inicio',
    component: USU001_vistaInicio,
    meta: {
      title: "Dashboard"
    }

  },
  {
    path: "*",
    name: "NotFound",
    component: NotFound,
    meta: {
      title: "LSA - pagina desconocida",
      allowAnonymous: true
    }
  },
  {
    path: '/',
    name: 'login',
    component: LoginView,
    meta: {
      title: "Inicio Sesión",
      allowAnonymous: true
    }
  },
  {
    path: '/admPersonal',
    name: 'admPersonal',
    component: USU004_admPersonal,
    meta: {
      title: "LSA - Administración Personal",
      authorize: [1, 2, 6, 0]
    }

  }, {
    path: '/admUsuario',
    name: 'admUsuario',
    component: admUsuario,
    meta: {
      title: "LSA - Administración Usuarios",
      authorize: [0]
    }

  },
  {
    path: '/admDisponibilidad',
    name: 'admDisponibilidad',
    component: USU005_admDisponibilidad,
    meta: {
      title: "LSA - Administración Disponibilidad",
      authorize: [7, 1, 2, 0, 6]
    }

  },
  {
    path: '/admEmpresa',
    name: 'admEmpresa',
    component: USU002_admEmpresa,
    meta: {
      title: "LSA - Administración Empresa",
      authorize: [2, 6, 0, 1]
    }

  },
  {
    path: '/admSolicitante',
    name: 'admSolicitante',
    component: USU003_admSolicitante,
    meta: {
      title: "LSA - Administración Solicitante",
      authorize: [2, 6, 0, 1]

    }

  },
  {
    path: '/recepcion/muestra',
    name: 'ingresoMuestra',
    component: MUS001,
    meta: {
      title: "LSA"
    }

  },
  {
    path: '/IngMuesLab',
    name: 'IngresoLab',
    component: MUS002,
    meta: {
      title: "LSA"
    }


  },
  {
    path: '/AdmMuesQm',
    name: 'AdminQm',
    component: MUS003,
    meta: {
      title: "LSA"
    }

  },
  {
    path: '/admmuestra',
    name: 'AdminMuestra',
    component: MUS004,
    meta: {
      title: "LSA - Administración Muestra"
    }
  }, 
  {
    path: '/laboratorio/admmuestra',
    name: 'AdminMuestraLab',
    component: admMuestraQuimico,
    meta: {
      title: "LSA - Administración Muestra"
    }
  }, 
  {
    path: '/supervisor/admmuestra',
    name: 'AdminMuestraSupervisor',
    component: admMuestraSupervisor,
    meta: {
      title: "LSA - Administración Muestra",
      authorize: [2,7,6,0]
    }
  },
  
  {
    path: '/finanzas/admmuestra',
    name: 'AdminMuestraFinanzas',
    component: admMuestraFinanzas,
    meta: {
      title: "LSA - Administración Muestra",
      authorize: [7,0]
    }
  }, 
  {
    path: '/gerente/admmuestra',
    name: 'AdminMuestraGerente',
    component: admMuestraGerente,
    meta: {
      title: "LSA - Administración Muestra"
    }
  },
  {
    path: '/solicitante/admmuestra',
    name: 'AdminMuestraSolicitante',
    component: admMuestraSolicitante,
    meta: {
      title: "LSA - Administración Muestra"
    }
  },
  {

    path: '/Gerente',
    name: 'vistaGerente',
    component: MUS006,
    meta: {
      title: "ADM - No autorizado"
    }
  },
  {

    path: '/AdmFin',
    name: 'AdmFinanzas',
    component: MUS007,
    meta: {
      title: "ADM - No autorizado"
    }

  },

  {

    path: '/AdmElementos',
    name: 'admElementos',
    component: ANA001,
    meta: {
      title: "LSA - Administración Elementos",
      authorize: [2, 6, 0]
    }

  },
  {

    path: '/AdmMatriz',
    name: 'AdmMatriz',
    component: ANA002,
    meta: {
      title: "LSA - Administración Elementos",
      authorize: [2, 6, 0]
    }

  },

  {

    path: '/AdmParam',
    name: 'AdmParam',
    component: ANA003,
    meta: {
      title: "LSA - Administración Elementos",
      authorize: [2, 6, 0]
    }

  },

  {

    path: '/AdmMetodologia',
    name: 'AdmMetodologia',
    component: ANA004,
    meta: {
      title: "LSA - Administración Elementos",
      authorize: [2, 6, 0]
    }

  },

  {

    path: '/AdmNorma',
    name: 'AdmNorma',
    component: ANA005,
    meta: {
      title: "LSA - Administración Elementos",
      authorize: [2, 6, 0]
    }

  },

  {
    path: '/visualizarProveedores',
    name: 'visualizarProveedores',
    component: MAM005,
    meta: {
      title: "LSA - Visualizar Proveedores",
      authorize: [9]
    }
  },

  {
    path: '/SolicitudesCompra',
    name: 'SolicitudesComopra',
    component: MAM006
  },

  {
    path: '/visualizarMovimientos',
    name: 'visualizarMovimientos',
    component: MAM007
  },

  {
    path: '/SolicitudesProducto',
    name: 'SolicitudesProducto',
    component: MAM008
  },

  {
    path: '/ingresarSolicitud',
    name: 'ingresarSolicitud',
    component: ingresarSolicitud
  },
  {
    path: '/visualizarEquipos',
    name: 'visualizarEquipos',
    component: MAM009
  },
  {
    path: '/visualizarReactivos',
    name: 'visualizarReactivos',
    component: MAM010
  },
  {
    path: '/visualizarSolicitudesCompra',
    name: 'visualizarSolicitudesCompra',
    component: MAM011
  },
  {
    path: '/visualizarSolicitudesMateriales',
    name: 'visualizarSolicitudesMateriales',
    component: MAM012
  },

  {
    path: '/ingreso-resultados',
    name: '/ingreso-resultados',
    component: ingresoResultados
  },
  {
    path: '/ingreso-resultados-supervisor',
    name: '/ingreso-resultados-supervisor',
    component: ingresoResultadosSupervisor
  },
  {
    path:'/MAM-vistaInicio',
    name:'/MAM-vistaInicio',
    component: MAMvistaInicio
  },
  {
    path:'/materialesAseo',
    name: 'materialesAseo',
    component: materialesAseo
  },
  {
    path: '/materialReactivo',
    name: 'materialReactivo',
    component: materialReactivo
  },
  {
    path: '/vistaEquipo',
    name: 'vistaEquipo',
    component: vistaEquipo
  },
  {
    path: '/vistaProveedores',
    name: 'vistaProveedores',
    component: vistaProveedores
  }
 
]





const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

router.beforeEach((to, from, next) => {

  // Recuperar datos del usuario al Store en caso de recargar
  if (isLoggedIn() && store.getters.rol == null) {
    store.commit('setRol', JSON.parse(jscookie.get('userInfo')).role);
  }

  const { authorize } = to.meta;
  var currentUser = "";
  if (jscookie.get('userInfo') != null) {
    currentUser = JSON.parse(jscookie.get('userInfo'));
  }


  if (to.name == "login" && isLoggedIn()) {
    next({ path: "/inicio" })
  }
  else if (!to.meta.allowAnonymous && !isLoggedIn()) {
    //clearAuthToken();
    next({ name: "login" })
  }
  else {
    if (authorize) {

      // Checkear si la ruta se restringe por rol
      //if(authorize.length && !authorize.includes(currentUser.role)){
      if (authorize.length && !authorize.includes(currentUser.role)) {
        // rol no autorizado
        next({ name: "Restringido" })
      } else {
        next();
      }
    }
    next();
  }

})

export default router
