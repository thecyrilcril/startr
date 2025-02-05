import './bootstrap';

import Alpine from 'alpinejs';
import persist from '@alpinejs/persist'

import * as FilePond from 'filepond';

import 'filepond/dist/filepond.min.css';
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type';
import FilePondPluginFileValidateSize from 'filepond-plugin-file-validate-size';

window.Alpine = Alpine;
window.FilePond = FilePond;
window.FilePondPluginImagePreview = FilePondPluginImagePreview;
window.FilePondPluginFileValidateType = FilePondPluginFileValidateType;
window.FilePondPluginFileValidateSize = FilePondPluginFileValidateSize;

Alpine.plugin(persist);

Alpine.store('darkMode', {
    dark: Alpine.$persist(true),
    toggle() {this.dark = !this.dark}
});

Alpine.start();
