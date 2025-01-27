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

export interface MD_Titulos {
    [policyId: string]: {
      [assetName: string]: {
        id?: number;
        name?: string;
        image?: string;
        description?: string;
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
        curso?: string;
      };
    };
  };

export type Resultado<T> =
  | { type: "ok"; data: T }
  | { type: "error"; error: Error };