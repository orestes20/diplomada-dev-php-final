import { parametrizer } from "./utils";
import { DiplomadaConfig, Resultado } from "./dadaTipos.ts";

const contratosNoParametrizados: DiplomadaConfig = {
    scripts: {
      pm_nftAdmin: "58bd01010032323232323223225333004323232323253323300a3001300b3754004264a666016600460186ea80104c8c8c8c8c8c8c8c94ccc058c0600084c94ccc050c02c0045288a99980a19b87480080045288a50375a602e602a6ea803058dd6980b000980b0011bae30140013014002375c602400260240046eb4c040004c034dd50020b1bae300e300c37540046e1d200016300c300d002300b001300b00230090013006375400229309b2b1bae0015734aae7555cf2ab9f5742ae881",      
      pm_titulosNotas: "58760101003232323232232232253330063232323232533300b3370e900018061baa00113232533300d3370e90000008a511533300d3370e90010008a5114a06eb400cdd7180718069baa00116300d300e002300c001300c002300a0013008375400229309b2b1bae001375c002ae6955ceaab9e5742ae89",
      pm_incripcion: "58820101003232323232232232253330063232323232533300b3370e900018061baa00113232533300d3370e90000008a511533300d3370e90010008a511533300d3370e90020008a5114a06eb400cdd7180718069baa00116300d300e002300c001300c002300a0013008375400229309b2b1bae001375c002ae6955ceaab9e5742ae89",
      pm_diploma: "5883010100323232323223223225333006323232323232533300c3370e9001000899191919251375a00c602260240046020002601c6ea800854ccc030cdc3a400000226464944dd68021bae300f300e37540042c60186ea8004c034c038008c030004c030008c028004c020dd50008a4c26cac6eb8004dd7000ab9a5573aaae795d0aba201",
      val_verificacion: "5883010100323232323223223225333006323232323232533300c3370e9001000899191919251375a00c602260240046020002601c6ea800854ccc030cdc3a400000226464944dd68021bae300f300e37540042c60186ea8004c034c038008c030004c030008c028004c020dd50008a4c26cac6eb8004dd7000ab9a5573aaae795d0aba201"
    }
    };

const dirAdminPKH: string = "2a698c0e2fb4a9969b64db566dd92fc89227390b25400bc855db473b4469706c6f6d6164614e465441646d";
const nftAdmin: string = "2a698c0e2fb4a9969b64db566dd92fc89227390b25400bc855db473b4469706c6f6d6164614e465441646d";  
export const dadaValScriptHash: string = "39c520d0627aafa728f7e4dd10142b77c257813c36f57e2cb88f72a5";
 

export const contratos: DiplomadaConfig = {
    scripts: {
        pm_nftAdmin: parametrizer(contratosNoParametrizados.scripts.pm_nftAdmin, [dirAdminPKH]),
        pm_diploma: parametrizer(contratosNoParametrizados.scripts.pm_diploma, [nftAdmin, dadaValScriptHash]),
        pm_titulosNotas: parametrizer(contratosNoParametrizados.scripts.pm_titulosNotas, [nftAdmin, dadaValScriptHash]),
        pm_incripcion: parametrizer(contratosNoParametrizados.scripts.pm_incripcion,[nftAdmin, dadaValScriptHash]), 
        val_verificacion: contratosNoParametrizados.scripts.val_verificacion
    }
    };

export var datos = {
    nombres: "", 
    apellidos: "", 
    cedula: "", 
    sexo: "", 
    fecha_nac: "", 
    direccion: "", 
    telefono_habitacion: "", 
    telefono_otros: "", 
    celular: "", 
    correo: "",
    curso: "Licenciatura en Desarrollo de Aplicacioneses en Cardano",
    url: "https://shorturl.at/NRvjj"
};

export var diplomada1 = {
    nombres: "",
    apellido: "",
    cedula: "",
    curso: "",
    notas: ""
}; 

export var estudiante = {
    nombre: "",
    apellido: "",
    cedula: "",
    sexo: "",
    fecha_nac: ""
}