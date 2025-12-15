/**
 * Configuración inicial de librerías.
 * 
 * Importa y configura Axios para peticiones HTTP.
 * 
 * @author Joaquín <joaquinmscollo@gmail.com>
 */

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
