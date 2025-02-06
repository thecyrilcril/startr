import './bootstrap';

import Alpine from 'alpinejs';
import persist from '@alpinejs/persist'

import Precognition from 'laravel-precognition-alpine';

import * as FilePond from 'filepond';

import 'filepond/dist/filepond.min.css';
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type';
import FilePondPluginFileValidateSize from 'filepond-plugin-file-validate-size';

import Choices from 'choices.js';
import "choices.js/public/assets/styles/choices.css";

import flatpickr from "flatpickr";
import 'flatpickr/dist/themes/confetti.css';

window.Alpine = Alpine;
window.FilePond = FilePond;
window.FilePondPluginImagePreview = FilePondPluginImagePreview;
window.FilePondPluginFileValidateType = FilePondPluginFileValidateType;
window.FilePondPluginFileValidateSize = FilePondPluginFileValidateSize;
window.Choices = Choices;

Alpine.plugin(persist);

Alpine.store('darkMode', {
    dark: Alpine.$persist(true),
    toggle() {this.dark = !this.dark}
});

Alpine.plugin(Precognition);
Alpine.start();
