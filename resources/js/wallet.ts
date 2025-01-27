import { cardanoIsEnabled, conectar, getBalance } from './demostra';
const wallet = document.getElementById('wallet-1');

wallet?.addEventListener('click', async () => {
    await conectar();
    await getBalance();
    //console.log('llegue a conectar',await conectar());
});
