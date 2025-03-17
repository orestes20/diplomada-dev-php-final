export type CborHex = string;
export type POSIXTime = number;

export type DiplomadaConfig = {
    scripts: {
      pm_nftAdmin: CborHex;
      pm_diploma: CborHex;
      pm_titulosNotas: CborHex;
      pm_incripcion: CborHex;
      val_verificacion: CborHex;
    };
    currenTime?: POSIXTime;
  };

export type ParamsDiplomADA = {
    nombres: string;
    apellidos: string;
    cedula: string;
    nombre_curso: string;
    estatus_aprobatoria: string;
    direccion: string;
<<<<<<< HEAD
    notas: number;
=======
    notas: string;
    creditos: number;
>>>>>>> 2b09e5176c35976b3bd6a74a895ea74218b5c151
  };

export type ParamsInscripcion = {
    nombres: string;
    apellidos: string;
    cedula: string;
    sexo: string;
    fecha_nac: string;
    direccion: string;
    telefono_habitacion: string;
    telefono_otros: string;
    celular: string;
    correo: string;
    curso: string;
    url: string;
  };

export interface MD_DiplomADA {
  [policyId: string]: MD_PolicyId;
}

export interface MD_PolicyId {
  [assetName: string]: MD_AssetName | MD_Datos_Estudiante;
  "datos_estudiante": MD_Datos_Estudiante;  
}

export interface MD_AssetName {
  id?: number;
  name?: string;
  image?: string;
  description?: string;
}

export interface MD_Datos_Estudiante {
  hash?: string;
  nombres?: string;
  apellidos?: string;
  cedula?: string;
  sexo?: string;
  fecha_nac?: string;
  direccion?: string;
  telefono_habitacion?: string;
  telefono_otros?: string;
  celular?: string;
  correo?: string;
  notas?: string;
  curso?: string;
  nombre_curso?: string;
  creditos?: number;
}

// export interface MDasdf_DiplomADA {
//     [policyId: string]: {
//       [assetName: string]: {
//         id?: number;
//         name?: string;
//         image?: string;
//         description?: string;
//       };
//       datos_estudiante?: (MD_Datos_Estudiante) | null;
//     };
//   };
  
// export interface MD_Titulos {
//     [policyId: string]: {
//       [assetName: string]: {
//         id?: number;
//         name?: string;
//         image?: string;
//         description?: string;
//         hash?: string;
//         nombres?: string;
//         apellidos?: string;
//         cedula?: string;
//         sexo?: string;
//         fecha_nac?: string;
//         direccion?: string;
//         telefono_habitacion?: string;
//         telefono_otros?: string;
//         celular?: string;
//         correo?: string;
//         curso?: string;
//       };
//     };
//   };

export type Resultado<T> =
  | { type: "ok"; data: T }
  | { type: "error"; error: Error };