import {
    Blockfrost,
    Data,
    Lucid,
    MintingPolicy,
    SpendingValidator,
    PolicyId,
    TxHash,
    fromHex,
    toHex,
    Unit,
    toUnit,
    fromUnit,
    Constr,
    fromText,
    WalletApi,
    Address,
    OutputDatum,
    Promise,
} from '@lucid-evolution/lucid';
import {validatorToAddress,mintingPolicyToId} from '@lucid-evolution/utils';
import { datos,diplomada1,estudiante, contratos } from "./diplomada.ts";


import { ParamsDiplomADA, ParamsInscripcion, Resultado } from './dadatipos';
import $ from "jquery";
import * as swal from 'sweetalert';

const showBalance = document.getElementById('showBalance');
const wallet = document.getElementById('wallet-1');
const walletAlert = document.getElementById('walletAlert');

interface JsonData {
    "721": {
        [policyId: string]: {
            [assetName: string]: {
                name: string;
                image: string | string[];
            };
        };
    };
}

//console.log("hola, demostra -> " + contratos);

const lucid = await Lucid(
    new Blockfrost(
        'https://cardano-preview.blockfrost.io/api/v0',
        'previewztdBFQVDQlFKY3O6TZJgzkZyyqRSu4vj',
    ),
    'Preview',
);

// const lucid = await Lucid.new(
//     new Blockfrost(
//          'https://cardano-preprod.blockfrost.io/api/v0',  // Cambia a la URL de preprod
//          'preprodztdBFQVDQlFKY3O6TZJgzkZyyqRSu4vj',  // Asegúrate de usar la clave de API correcta
//      ),
//      'Preprod',  // Cambia 'Preview' a 'Preprod'
// );

const setWallet = () => {
    const element = wallet?.getElementsByTagName('span')[0];
    element?.classList.remove('bg-danger');
    element!.style!.backgroundColor = '#14e914';
    walletAlert?.classList.add('d-none');
};

var walletApi: WalletApi;

export const conectar = async () => {
    walletApi = await window.cardano.eternl.enable();
    //console.log('llegue a este punto',walletApi);
    setWallet();
    lucid.selectWallet.fromAPI(walletApi);
    console.log("Primera Vista de Lucid, bajo conectar.")
    console.log(walletApi);
    //console.log(lucid.config.toString);
};

// console.log("Api ->" + api);
// const direccion = await lucid.wallet().address();
// console.log("Direccion aqui?? -" + direccion);


export const getBalance = async () => {
    const balance = await walletApi.getBalance();
    if (showBalance) {
        showBalance.innerHTML = `Balance Disponible: ${parseInt(balance.substr(3, 30),16)/1000000} ₳`;
    }
    return balance;
};  // Verificar codigo para cuando hay varios tokens ademas de ADA.  El codigo solo funciona bien si la wallet tiene solo Ada.

export const cardanoIsEnabled = async (): Promise<any> => {
    //console.log(await window.cardano.isEnabled());
    return await window.cardano.eternl.isEnabled();
};

export const address = async (): Promise<any> => {
    if (lucid) {
        console.log("2a. Vista de Lucid, bajo address.")
        console.log(lucid);
        const direccion = await lucid.wallet().address();
        //console.log('esta es la direccion: ',direccion); 
        return direccion;
    }
    return 'ERROR';
};
//console.log(lucid);
//console.log("output de address const -> " + address());

const addr = "addr_test1qp65draw5za4msm4sqp9wtv4yejvehecceml20cc6waewrjfqx4dgsjqxh2gql7zjr2776l3thnxgtcvjg3cm8dad3lqn484e6"; //await lucid.wallet().address();


if ((await cardanoIsEnabled()) && showBalance && wallet) {
    //console.log('active el servicio del api');
    getBalance();
    setWallet();
}
$.get('data_inscripcion/',function(dat){
    estudiante['nombre'] = dat[0]['nombre'];
    estudiante['apellido'] = dat[0]['apellido'];
    estudiante['cedula'] = dat[0]['cedula'];
    estudiante['sexo'] = dat[0]['sexo'];
    estudiante['fecha_nac'] = dat[0]['fecha_nac'];
    console.log(estudiante);
});
export const crearTitulos = async (): Promise<Resultado<any>> => {
    //let resultado: Resultado<any> = { type: "error", error: new Error("No se pudo crear el titulo") };
    try {cardanoIsEnabled 
        if (lucid) {
            //console.log("Creando NFT de Titulos y Notas ...");
            const dadaPM_TitulosyNotas: MintingPolicy = {
                 type: "PlutusV3",
                 script: contratos.scripts.pm_titulosNotas
            }

            const dadaVal_Validacion: SpendingValidator = {
                type: "PlutusV3",
                script: contratos.scripts.val_verificacion
            }

            //console.log("cree las variables de los contratos V3.")
            
            const dadaValDireccion: string = validatorToAddress("Preview",dadaVal_Validacion);
            //console.log("pase validtortoAddress");
            const direccionEstudiante: Address = await lucid.wallet().address();
            const tokenName_Titulos = "dtitulo0917";
            const tokenName_Notas = "dADANotas0917";
            const titulos_tokenName = fromText(tokenName_Titulos);
            const notas_tokenName = fromText(tokenName_Notas);
            const titulosynotas_pid: PolicyId = mintingPolicyToId(dadaPM_TitulosyNotas);
            const titulos_dada: Unit = toUnit(titulosynotas_pid, titulos_tokenName);
            const notas_dada: Unit = toUnit(titulosynotas_pid, notas_tokenName);
            const titulosyNotasRedeemer = BigInt(1);
            const mintRedeemer = Data.to(titulosyNotasRedeemer);

            console.log(dadaPM_TitulosyNotas);
            console.log("validator address -> " + dadaValDireccion);
            console.log("address -> " + direccionEstudiante);
            console.log("Nombre Token Titulos: " + tokenName_Titulos + " -> " + titulos_tokenName);
            console.log("Nombre Token Notas: " + tokenName_Notas + " -> " + notas_tokenName);
            console.log("pid            -> " + titulosynotas_pid)
            console.log("NFT Titulos    -> " + titulos_dada);
            console.log("NFT Notas      -> " + notas_dada);
            console.log(fromUnit(titulos_dada));
            console.log(fromUnit(notas_dada));
            console.log("redeeemer      -> " + titulosyNotasRedeemer);
            console.log(mintRedeemer);

<<<<<<< HEAD
            // console.log('le di al boton');
=======

>>>>>>> 2b09e5176c35976b3bd6a74a895ea74218b5c151
            const jsonData = {
                [titulosynotas_pid]: {
                    [tokenName_Titulos]: {
                        id: 1,
                        name: "Diplomada Titulo Certificado",
                        image: "https://shorturl.at/NRvjj",
                        description: "Diplomada Titulo"
                    },
                    [tokenName_Notas]: {
                        id: 1,
                        name: "Diplomada Notas Certificadas",
                        image: "https://shorturl.at/NRvjj",
                        description: "Diplomada Notas Certificadas"
                    },
                    "datos_estudiante": {
                        hash: "fac7b8513f4b985174e88a02ee8165fc",
                        nombres:estudiante['nombre'],
                        apellidos: estudiante['apellido'],
                        cedula:estudiante['cedula'],
                        sexo: estudiante['sexo'],
                        fehca_nac:estudiante['fecha_nac']
                    },
                },
            };
            console.log('llegue a este punto');
            const datum_crudo = Data.to(BigInt(1));
            console.log("Datum crudo: -> " + datum_crudo);
            const datum: OutputDatum = {kind: "inline", value: datum_crudo};

             const tx = await lucid
                 .newTx()
                 .mintAssets({
                    [titulos_dada]: BigInt(2),
                    [notas_dada]: BigInt(2),
                  }, mintRedeemer)
                 .pay.ToAddress(direccionEstudiante, { [titulos_dada]: BigInt(1), [notas_dada]: BigInt(1), lovelace: BigInt(2000000)})
                 .pay.ToContract(dadaValDireccion, datum , { [titulos_dada]: BigInt(1), [notas_dada]: BigInt(1), lovelace: BigInt(2000000)})
                 .attach.MintingPolicy(dadaPM_TitulosyNotas)
                 .attachMetadata(721, jsonData)
                 .complete({localUPLCEval: false});

             const signedTx = await tx.sign.withWallet().complete();
             console.log('signedTX '+signedTx);
             const txHash = await signedTx.submit();
             console.log("txHash -> " + txHash);
             const success = await lucid!.awaitTx(txHash)
             console.log("Funciono -> " + success);
            
            const mensaje = "por aqui si es";
            console.log(mensaje);

       return { type: "ok", data: txHash };
        }
    } catch (error) {
        console.log("error -> " + error);
        if (error instanceof Error) return { type: "error", error: error };
        return { type: "error", error: new Error(error as string) };
    }
}
$.get('data_inscripcion/',function(data){
    datos['nombres']=data[0]['nombre'];
    datos['apellidos']=data[0]['apellido'];
    datos['cedula']=data[0]['cedula'];
    datos['sexo']=data[0]['sexo'];
    datos['fecha_nac']=data[0]['fecha_nac'];
    datos['direccion']=data[0]['direccion'];
    datos['telefono_habitacion']=data[0]['telefono_habitacion'];
    datos['telefono_otros']=data[0]['telefono_otros'];
    datos['celular']=data[0]['celular'];
    datos['correo']=data[0]['correo'];
})
var ParamsDiplomADA = {};

    $.get('certificar/'+$('#id_estudiante').val(),function(data){
        //console.log(data);
        // diplomada1['nombres']=data[0]['nombre'];
        // diplomada1['apellido']=data[0]['apellido'];
        // diplomada1['cedula']=data[0]['cedula'];
        // diplomada1['curso']=data[0]['curso'];
        // diplomada1['notas']=data[0]['notas'];
      
        ParamsDiplomADA = {
            nombres: data[0]['nombre'], 
            apellidos: data[0]['apellido'], 
            cedula: data[0]['cedula'], 
            nombre_curso: data[0]['curso'],
            notas: data[0]['notas']  
        };
        console.log('estoy llenando el params',ParamsDiplomADA);
    });


var dumyParams = { 
    nombres: datos['nombres'], 
    apellidos: datos['apellidos'], 
    cedula: datos['cedula'], 
    sexo: datos['sexo'], 
    fecha_nac: datos['fecha_nac'], 
    direccion: datos['direccion'], 
    telefono_habitacion: datos['telefono_habitacion'], 
    telefono_otros: datos['telefono_otros'], 
    celular: datos['celular'], 
    correo: datos['correo'],
    curso: "Licenciatura en Desarrollo de Aplicacioneses en Cardano",
    url: "https://shorturl.at/NRvjj"
}

// var ParamsDiplomADA = {
//     nombres: diplomada1['nombres'], 
//     apellidos: diplomada1['apellido'], 
//     cedula: diplomada1['cedula'], 
//     nombre_curso: diplomada1['curso'],
//     notas: diplomada1['notas']  
// };
// console.log(ParamsDiplomADA);

// console.log(dumyParams,datos);
const hastala = document.getElementById("hastala");
    if (hastala) {
        hastala.addEventListener("click", async function () {
            console.log(datos);
            var demo = crearInscripcion(datos);
        if ((await demo).type == 'error') {
            alert('debe Reconectar la billetera');
        }
        if ((await demo).type == 'ok') {
            $.get('hash/'+(await demo).data,function(data1){
                console.log('entre a revisar el hash');
                if (data1) {
                    alert('NFTs creados verifique su billetera');
                }else{
                    alert('Ocurrio un problema al crear los NFTs intente nuevamente');
                }
            });
        }
    });
    }

    $(document).ready( function () {
        $('#salir').click(function() {
            const prueba = window.cardano;
            console.log('hice click aqui: ',prueba);
        } );
    } );


const hastala1 = document.getElementById("hastala1");
    if (hastala1) {
        hastala1.addEventListener("click", async function () {
        const demo = await crearTitulos();
        if(demo['data'] !== undefined){
            
            //colocar las notificaciones verificando demo en el campo type
        }
    });
    }


    //conexcion con la walet y minteo del proceso de datos
const diplomada = document.getElementById("diplomada");
//console.log('hola llegue a diplomada',diplomada);
    if (diplomada) {
        diplomada.addEventListener("click", async function () {
            //console.log(lucid);
            //console.log(ParamsDiplomADA);
            var demo = crearDiplomADA(ParamsDiplomADA);
            if ((await demo).type == 'error') {
                alert('debe Reconectar la billetera');
                //console.log("debe Reconectar la billetera");
            }else{
                
            }
    })};
    //colocar las notificaciones verificando demo en el campo type
    //await crearTitulos();


    $(document).ready( function () {
        $('#salir').click(function() {
            const prueba = window.cardano.eternl;
            console.log('hice click aqui: ',prueba);
        } );
    } );

export const crearInscripcion = async (params: ParamsInscripcion): Promise<Resultado<any>> => {
    
        try {cardanoIsEnabled 
            if (lucid) {
                const dadaPM_Inscripcion: MintingPolicy = {
                     type: "PlutusV3",
                     script: contratos.scripts.pm_incripcion
                }
    
                const dadaVal_Validacion: SpendingValidator = {
                    type: "PlutusV3",
                    script: contratos.scripts.val_verificacion
                }
    
                //console.log("cree las variables de los contratos V3.")
                
                const dadaValDireccion: string = validatorToAddress("Preview",dadaVal_Validacion);
                //console.log("pase validtortoAddress");
                const direccionEstudiante: Address = await lucid.wallet().address();
                const tokenName_Inscripcion = dumyParams.cedula;
                const nftInscripcion_tokenName = fromText(tokenName_Inscripcion);
                const nftInscripcion_pid: PolicyId = mintingPolicyToId(dadaPM_Inscripcion);
                const inscripcion_dada: Unit = toUnit(nftInscripcion_pid, nftInscripcion_tokenName);
                const inscripcionRedeemer = BigInt(1);
                const mintRedeemer = Data.to(inscripcionRedeemer);
    
                // console.log(dadaPM_TitulosyNotas);
                // console.log("validator address -> " + dadaValDireccion);
                // console.log("address -> " + direccionEstudiante);
                // console.log("Nombre Token Titulos: " + tokenName_Titulos + " -> " + titulos_tokenName);
                // console.log("Nombre Token Notas: " + tokenName_Notas + " -> " + notas_tokenName);
                // console.log("pid            -> " + titulosynotas_pid)
                // console.log("NFT Titulos    -> " + titulos_dada);
                // console.log("NFT Notas      -> " + notas_dada);
                // console.log(fromUnit(titulos_dada));
                // console.log(fromUnit(notas_dada));
                // console.log("redeeemer      -> " + titulosyNotasRedeemer);
                // console.log(mintRedeemer);
    
    
                const jsonData = {
                    [nftInscripcion_pid]: {
                        [tokenName_Inscripcion]: {
                            id: 1,
                            name: "Diplomada Inscripcion 1",
                            image: params.url,
                            description: "Diplomada Titulo Test"
                        },                        
                        "datos_estudiante": {
                            hash: "fac7b8513f4b985174e88a02ee8165fc",
                            nombres: params.nombres,
                            apellidos: params.apellidos,
                            cedula: params.cedula,
                            // sexo: params.sexo,
                            // fecha_nac: params.fecha_nac,
                            // direccion: params.direccion,
                            // telefono_habitacion: params.telefono_habitacion,
                            // telefono_otros: params.telefono_otros,
                            // celular: params.celular,
                            // correo: params.correo,
                            curso: "Diplomada en Desarrollo de Aplicacopmes en Cardano"
                        },
                    },
                };
           
                const datum_crudo = Data.to(BigInt(1));
                //console.log("Datum crudo: -> " + datum_crudo);
                const datum: OutputDatum = {kind: "inline", value: datum_crudo};
    
                 const tx = await lucid
                     .newTx()
                     .mintAssets({[inscripcion_dada]: BigInt(2)}, mintRedeemer)
                     .pay.ToAddress(direccionEstudiante, { [inscripcion_dada]: BigInt(1), lovelace: BigInt(2000000)})
                     .pay.ToContract(dadaValDireccion, datum , { [inscripcion_dada]: BigInt(1), lovelace: BigInt(2000000)})
                     .attach.MintingPolicy(dadaPM_Inscripcion)
                     .attachMetadata(721, jsonData)
                     .complete({localUPLCEval: false});
    
    
                 const signedTx = await tx.sign.withWallet().complete();
    
                 const txHash = await signedTx.submit();
                 console.log("txHash -> " + txHash);
                 const success = await lucid!.awaitTx(txHash)
                 console.log("Funciono -> " + success);
                 const mensaje = "por aqui si es";
                 //console.log(mensaje);
    
           return { type: "ok", data: txHash };
            }
        } catch (error) {
            console.log("error -> " + error);
            if (error instanceof Error) return { type: "error", error: error };
            return { type: "error", error: new Error(error as string) };
        }
    }

    export const crearDiplomADA = async (params: ParamsDiplomADA): Promise<Resultado<any>> => {
    
        try {cardanoIsEnabled 
            if (lucid) {
                console.log("Creando DiplomADA NFT v2...");
                const dadaPM_DiplomADA: MintingPolicy = {
                     type: "PlutusV3",
                     script: contratos.scripts.pm_diploma
                }
                const dadaVal_Validacion: SpendingValidator = {
                    type: "PlutusV3",
                    script: contratos.scripts.val_verificacion
                }
    
                //console.log("cree las variables de los contratos V3.")
                
                const dadaValDireccion: string = validatorToAddress("Preview", dadaVal_Validacion);
                console.log("pase validtortoAddress ->" + dadaValDireccion);
                const direccionEstudiante: Address = await lucid.wallet().address();
                const tokenName_DiplomADA = params.cedula;
                const nftDiplomADA_tokenName = fromText(tokenName_DiplomADA);
                const nftDiplomADA_pid: PolicyId = mintingPolicyToId(dadaPM_DiplomADA);
                const diplomada_unit: Unit = toUnit(nftDiplomADA_pid, nftDiplomADA_tokenName);
                const diplomadaRedeemer = BigInt(1);
                const mintRedeemer = Data.to(diplomadaRedeemer);
    
                // console.log(dadaPM_DiplomADA);
                // console.log("validator address -> " + dadaValDireccion);
                // console.log("address -> " + direccionEstudiante);
                // console.log("Nombre Token DiplomADA: " + tokenName_DiplomADA);
                // console.log("pid            -> " + nftDiplomADA_pid)
                // console.log("NFT DiplomADA  -> " + nftDiplomADA_tokenName);
                // console.log(fromUnit(diplomada_unit));
                // console.log("redeeemer      -> " + diplomadaRedeemer);
                // console.log(mintRedeemer);

                 const jsonData = {
                    [nftDiplomADA_pid]: {
                        [tokenName_DiplomADA]: {
                            id: 1,
                            name: "DiplomADA 1",
                            image: "https://rb.gy/j11dx7",
                            description: "Diplomada TEST"
                        },
                        "datos_estudiante": {
                            hash: "fac7b8513f4b985174e88a02ee8165fc",
                            nombres: params.nombres,
                            apellidos: params.apellidos,
                            cedula: params.cedula,
                            notas: params.notas,
                            curso: params.nombre_curso,
                        },
                    },
                };

                // const stringData: string = JSON.stringify(jsonData);
                console.log("METADATA: ...");
                console.log(jsonData);
           
                const datum_crudo = Data.to(BigInt(1));
                console.log("Datum crudo: -> " + datum_crudo);
                const datum: OutputDatum = {kind: "inline", value: datum_crudo};
    
                 const tx = await lucid
                     .newTx()
                     .mintAssets({[diplomada_unit]: BigInt(2)}, mintRedeemer)
                     .pay.ToAddress(direccionEstudiante, { [diplomada_unit]: BigInt(1), lovelace: BigInt(2000000)})
                     .pay.ToContract(dadaValDireccion, datum , { [diplomada_unit]: BigInt(1), lovelace: BigInt(2000000)})
                     .attach.MintingPolicy(dadaPM_DiplomADA)
                     .attachMetadata(721, jsonData)
                     .complete({localUPLCEval: false});

                console.log("Creamos Transaction sin error!");


                  const signedTx = await tx.sign.withWallet().complete();
    
                 const txHash = await signedTx.submit();
                 console.log("txHash -> " + txHash);
                //  const success = await lucid!.awaitTx(txHash)
                //  console.log("Funciono -> " + success);
                 const mensaje = "por aqui si es";
                 console.log(mensaje);
    
            // const txHash = "Aqui val el txHash";

           return { type: "ok", data: txHash };
            }
        } catch (error) {
            console.log("error -> " + error);
            if (error instanceof Error) return { type: "error", error: error };
            return { type: "error", error: new Error(error as string) };
        }
    }