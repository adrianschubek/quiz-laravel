/*
 * Copyright (c) 2020. Adrian Schubek
 * https://adriansoftware.de
 */

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// window.Vue = require('vue');
//
// /**
//  * Next, we will create a fresh Vue application instance and attach it to
//  * the page. Then, you may begin adding components to this application
//  * or customize the JavaScript scaffolding to fit your unique needs.
//  */
//
// Vue.component('example-component', require('./components/ExampleComponent.vue'));
//
// const app = new Vue({
//     el: '#app'
// });


// Bulma NavBar Burger Script
// document.addEventListener('turbolinks:load', function () {
//     // Get all "navbar-burger" elements
//     const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
//
//     // Check if there are any navbar burgers
//     if ($navbarBurgers.length > 0) {
//
//         // Add a click event on each of them
//         $navbarBurgers.forEach(function ($el) {
//             $el.addEventListener('click', function () {
//
//                 // Get the target from the "data-target" attribute
//                 let target = $el.dataset.target;
//                 let $target = document.getElementById(target);
//
//                 // Toggle the class on both the "navbar-burger" and the "navbar-menu"
//                 $el.classList.toggle('is-active');
//                 $target.classList.toggle('is-active');
//
//             });
//         });
//     }
//
// });

// import Bulma from '@vizuaalog/bulmajs';
// require('@vizuaalog/bulmajs/src/plugins/message');
// require('@vizuaalog/bulmajs/src/plugins/notification');
// require('@vizuaalog/bulmajs/src/plugins/accordion');
// require('@vizuaalog/bulmajs/src/plugins/tabs');
// require('@vizuaalog/bulmajs/src/plugins/dropdown');
//
// require('./bulma-extensions');

// noinspection ES6UnusedImports
import Alpine from "alpinejs/src";

window.jdenticon = require('./jdenticon');
let Turbolinks = require("turbolinks");
Turbolinks.start();

Turbolinks.setProgressBarDelay(200);

document.addEventListener('turbolinks:load', () => {
    // Login Profilbild
    if (document.getElementById('profilepicname') !== null) {
        document.getElementById('profilepicname').addEventListener('input', function () {
            document.getElementById('pic').setAttribute('data-jdenticon-value', this.value);
            window.jdenticon()
        })
    }

    window.livewire.rescan();
    window.jdenticon();
});

// document.addEventListener('livewire:load', () => {
//     window.livewire.hook('afterDomUpdate', () => {
//         Alpine.start()
//     })
// });
// let NProgress = require("nprogress/nprogress");
// document.addEventListener("turbolinks:click", () => {
//     NProgress.start();
//     console.log("start")
// });
//
// document.addEventListener("turbolinks:render", () => {
//     NProgress.done();
//     NProgress.remove();
//     console.log("end")
// });
