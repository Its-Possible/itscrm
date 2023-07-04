import Alpine from 'alpinejs';
import header from './header';
import customers from './customers'

window.header = header;
window.customers = customers;

Alpine.data('header', header);
Alpine.data('customers', customers)
