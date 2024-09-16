import './bootstrap';
import Search from './live-serach';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
if (document.querySelector('.header-search-icon')) {
    new Search();
    
}
