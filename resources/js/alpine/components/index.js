import Alpine from 'alpinejs';
import Axios from 'axios';
import header from './header';
import customers from './customers'
import tags from './tags';

window.axios = Axios.default;

window.header = header;
window.customers = customers;
window.tags = tags;

Alpine.data('header', header);
Alpine.data('customers', customers);
Alpine.data('tags', tags);

Alpine.start();


