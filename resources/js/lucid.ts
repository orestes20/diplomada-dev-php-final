import { Blockfrost, Lucid } from '@lucid-evolution/lucid';

const lucid = await Lucid.new(
    new Blockfrost(
        'https://cardano-preview.blockfrost.io/api/v0',
        'previewztdBFQVDQlFKY3O6TZJgzkZyyqRSu4vj',
    ),
    'Preview',
);

const api = await window.cardano.nami.enable();
lucid.selectWallet(api);

//console.log(api);
