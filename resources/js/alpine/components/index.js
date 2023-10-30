import Alpine from 'alpinejs';
import Axios from 'axios';
import header from './header';
import customers from './customers'

window.axios = Axios.default;

window.header = header;
window.customers = customers;

Alpine.data('header', header);
Alpine.data('customers', customers);

Alpine.start();


