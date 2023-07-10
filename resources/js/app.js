import './bootstrap';
import { createApp } from 'vue';

import {Nav, Proprietarios, Veiculos, Revisoes, RegistraVeiculo, RegistraProprietario, RegistraRevisao, Relatorios} from './components/index';


const app = createApp({});

app.component('nav-component', Nav);
app.component('proprietarios', Proprietarios);
app.component('relatorios', Relatorios);
app.component('veiculos', Veiculos);
app.component('revisoes', Revisoes);
app.component('registra-veiculo', RegistraVeiculo);
app.component('registra-proprietario', RegistraProprietario);
app.component('registra-revisao', RegistraRevisao);

app.mount('#app');
