import {
    applyParamsToScript,
    applyDoubleCborEncoding,
  } from 'https://unpkg.com/lucid-cardano/web/mod.js';

export function parametrizer(validatorScript: any, params: any[]): any 
    {
        return applyDoubleCborEncoding(applyParamsToScript(validatorScript, params))
    }; 
