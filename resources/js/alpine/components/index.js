import Alpine from 'alpinejs';
import Axios from 'axios';

import tags from './tags';
import header from './header';
import customers from './customers'
import schedules  from './schedules.js';

window.axios = Axios.default;

window.tags = tags;
window.header = header;
window.schedules = schedules;
window.customers = customers;

Alpine.data('tags', tags);
Alpine.data('header', header);
Alpine.data('schedules', schedules);
Alpine.data('customers', customers);

Alpine.start();


