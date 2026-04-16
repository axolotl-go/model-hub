import { initAllThree } from './three-viewer';


import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    initAllThree();
});

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

