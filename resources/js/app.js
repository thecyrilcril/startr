import './bootstrap';

import Alpine from 'alpinejs';
import persist from '@alpinejs/persist'

window.Alpine = Alpine;


Alpine.plugin(persist);

Alpine.store('darkMode', {
    dark: Alpine.$persist(true),
    toggle() {this.dark = !this.dark}
});

Alpine.start();
