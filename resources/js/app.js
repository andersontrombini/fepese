require('./bootstrap');

import Inscricao from "./inscricao/inscricao";
import Cidades from "./cidades/cidades";
import Estados from "./estados/estados";

window.Inscricao = new Inscricao();
window.Cidades = new Cidades();
window.Estados = new Estados();