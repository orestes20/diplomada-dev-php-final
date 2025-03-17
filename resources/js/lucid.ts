import { Blockfrost, Lucid } from '@lucid-evolution/lucid';

const lucid = await Lucid.new(
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
const api = await window.cardano.eternl.enable();
lucid.selectWallet(api);

//console.log(api);
