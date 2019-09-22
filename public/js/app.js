/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/@vizuaalog/bulmajs/src/core.js":
/*!*****************************************************!*\
  !*** ./node_modules/@vizuaalog/bulmajs/src/core.js ***!
  \*****************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
const Bulma = {
    /**
     * Current BulmaJS version.
     * @type {String}
     */
    VERSION: '0.10.0',

    /**
     * An index of the registered plugins
     * @type {Object}
     */
    plugins: {},

    /**
     * Helper method to create a new plugin.
     * @param  {String} key The plugin's key
     * @param  {Object} options The options to be passed to the plugin
     * @return {Object} The newly created plugin instance
     */
    create(key, options) {
        if(!key || !Bulma.plugins.hasOwnProperty(key)) {
            throw new Error('[BulmaJS] A plugin with the key \''+key+'\' has not been registered.');
        }

        return Bulma.plugins[key].handler.create(options);
    },

    /**
     * Register a new plugin
     * @param  {String} key The key to register the plugin under
     * @param  {Object} plugin The plugin's main constructor
     * @param  {number?} priority The priority this plugin has over other plugins. Higher means the plugin is registered before lower.
     * @return {undefined}
     */
    registerPlugin(key, plugin, priority = 0) {
        if(!key) {
            throw new Error('[BulmaJS] Key attribute is required.');
        }
        
        this.plugins[key] = {
            priority: priority,
            handler: plugin
        };
    },

    /**
     * Parse the HTML DOM searching for data-bulma attributes. We will then pass
     * each element to the appropriate plugin to handle the required processing.
     * 
     * @return {undefined}
     */
    traverseDOM(root = document) {
        let elements = root.querySelectorAll(this.getPluginClasses());
        
        this.each(elements, (element) => {
            if(element.hasAttribute('data-bulma-attached')) {
                return;
            }

            let plugins = this.findCompatiblePlugins(element);

            this.each(plugins, (plugin) => {
                plugin.handler.parse(element);
            });
        });
    },

    /**
     * Return a string of classes to search the DOM for
     * @returns {string} The string containing the classes
     */
    getPluginClasses() {
        var classes = [];

        for(var key in this.plugins) {
            if(!this.plugins[key].handler.getRootClass()) {
                continue;
            }

            classes.push('.' + this.plugins[key].handler.getRootClass());
        }

        return classes.join(',');
    },

    /**
     * Search our plugins and find one that matches the element
     * @param {HTMLElement} element The element we want to match for
     * @returns {Object} The plugin that matched
     */
    findCompatiblePlugins(element) {
        let compatiblePlugins = [];

        let sortedPlugins = Object.keys(this.plugins)
            .sort((a, b) => this.plugins[a].priority < this.plugins[b].priority);

        this.each(sortedPlugins, (key) => {
            if(element.classList.contains(this.plugins[key].handler.getRootClass())) {
                compatiblePlugins.push(this.plugins[key]);
            }
        });

        return compatiblePlugins;
    },

    /**
     * Create an element and assign classes
     * @param {string} name The name of the element to create
     * @param {array} classes An array of classes to add to the element
     * @return {HTMLElement} The newly created element
     */
    createElement(name, classes) {
        if(!classes) {
            classes = [];
        }

        if(typeof classes === 'string') {
            classes = [classes];
        }

        let elem = document.createElement(name);

        this.each(classes, (className) => {
            elem.classList.add(className);
        });

        return elem;
    },

    /**
     * Helper method to normalise a plugin finding an element.
     * @param {string} query The CSS selector to query for
     * @param {HTMLElement|null} context The element we want to search within
     * @param {boolean} nullable Do we except a null response?
     * @returns {null|HTMLElement} The element we found, or null if allowed.
     * @throws {TypeError}
     */
    findElement(query, context = document, nullable = false) {
        if(!query && !nullable) {
            throw new TypeError('First argument to `findElement` required. Null given.');
        }

        if(!query) {
            return null;
        }

        if(query.toString() === '[object HTMLElement]') {
            return query;
        }

        return context.querySelector(query);
    },

    /**
     * Find an element otherwise create a new one.
     * @param {string} query The CSS selector query to find
     * @param {HTMLElement|null} parent The parent we want to search/create within
     * @param {[string]} elemName The name of the element to create
     * @param {[array]} classes The classes to apply to the element
     * @returns {HTMLElement} The HTML element we found or created
     */
    findOrCreateElement(query, parent = null, elemName = 'div', classes = []) {
        var elem = this.findElement(query, parent);

        if(!elem) {
            if(classes.length === 0) {
                classes = query.split('.').filter((item) => {
                    return item;
                });
            }

            var newElem = this.createElement(elemName, classes);

            if(parent) {
                parent.appendChild(newElem);
            }

            return newElem;
        }

        return elem;
    },

    /**
     * For loop helper
     * @param {*} objects The array/object to loop through
     * @param {*} callback The callback used for each item
     */
    each(objects, callback) {
        let i;

        for(i = 0; i < objects.length; i++) {
            callback(objects[i], i);
        }
    }
};

document.addEventListener('DOMContentLoaded', () => {
    if(window.hasOwnProperty('bulmaOptions') && window.bulmaOptions.autoParseDocument === false) {
        return;
    }

    Bulma.traverseDOM();
});

/* harmony default export */ __webpack_exports__["default"] = (Bulma);


/***/ }),

/***/ "./node_modules/@vizuaalog/bulmajs/src/dismissableComponent.js":
/*!*********************************************************************!*\
  !*** ./node_modules/@vizuaalog/bulmajs/src/dismissableComponent.js ***!
  \*********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return DismissableComponent; });
/* harmony import */ var _plugin__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./plugin */ "./node_modules/@vizuaalog/bulmajs/src/plugin.js");


/**
 * @module DismissableComponent
 * @since  0.2.0
 * @author  Thomas Erbe <vizuaalog@gmail.com>
 */
class DismissableComponent extends _plugin__WEBPACK_IMPORTED_MODULE_0__["default"] {
    /**
     * Returns an object containing the default options for this plugin.
     * @returns {object} The default options object.
     */
    static defaultOptions() {
        return {
            isDismissable: false,
            destroyOnDismiss: true,
            element: null
        };
    }

    /**
     * Plugin constructor
     * @param  {string} name Plugin's name
     * @param  {Object} options Plugin's options
     * @return {this} The new plugin instance
     */
    constructor(name, options) {
        super(options);

        /**
         * The name of this component, this will be used as the root class
         * @type {string}
         */
        this.name = name;

        /**
        * Body text.
        * @type {string}
        */
        this.body = this.option('body');
        
        /**
        * Color modifier.
        * @type {string} Possible values are null, primary, info, success, warning, danger
        */
        this.color = this.option('color');
        
        /**
        * How long to wait before auto dismissing the component.
        * @type {int|null} If null component must be dismissed manually.
        */
        this.dismissInterval = this.option('dismissInterval') ? this.createDismissInterval(this.option('dismissInterval')) : null;
        
        /**
        * Does this component have a dismiss button?
        * @type {Boolean}
        */
        this.isDismissable = this.option('isDismissable');
        
        /**
        * Should this component be destroyed when it is dismissed.
        * @type {Boolean}
        */
        this.destroyOnDismiss = this.option('destroyOnDismiss');
        
        /**
        * The root element.
        * @type {HTMLElement|null} If this is not provided a new element will be created.
        */
        this.element = this.option('element');

        if(!this.element) {
            this.createRootElement();
            this.parent.appendChild(this.element);
        }
        
        this.element.setAttribute('data-bulma-attached', 'attached');
        
        /**
        * The element used to close the component.
        * @type {HTMLElement}
        */
        this.closeButton = this.option('closeButton', this.createCloseButton());

        if(this.body) {
            this.insertBody();
        }

        if(this.color) {
            this.setColor();
        }
    }

    /**
     * Create the main element.
     * @return {undefined}
     */
    createRootElement() {
        this.element = document.createElement('div');
        
        this.element.classList.add(this.name);
        this.hide();
    }

    /**
     * Show the component.
     * @return {undefined}
     */
    show() {
        this.element.classList.remove('is-hidden');
    }

    /**
     * Hide the component.
     * @return {undefined}
     */
    hide() {
        this.element.classList.add('is-hidden');
    }

    /**
     * Insert the body text into the component.
     * @return {undefined}
     */
    insertBody() {
        this.element.innerHTML = this.body;
    }

    /**
     * Create the element that will be used to close the component.
     * @return {HTMLElement} The newly created close button
     */
    createCloseButton() {
        var closeButton = document.createElement('button');
        closeButton.setAttribute('type', 'button');
        closeButton.classList.add('delete');

        return closeButton;
    }

    /**
     * Create an interval to dismiss the component after the set number of ms.
     * @param  {int} interval The time to wait before dismissing the component
     * @return {undefined}
     */
    createDismissInterval(interval) {
        return setInterval(() => {
            this.handleCloseEvent();
        }, interval);
    }

    /**
     * Insert the close button before our content.
     * @return {undefined}
     */
    prependCloseButton() {
        this.element.insertBefore(this.closeButton, this.element.firstChild);
    }

    /**
     * Setup the event listener for the close button.
     * @return {undefined}
     */
    setupCloseEvent() {
        this.closeButton.addEventListener('click', this.handleCloseEvent.bind(this));
    }

    /**
     * Handle the event when our close button is clicked.
     * @return {undefined}
     */
    handleCloseEvent() {
        if(this.destroyOnDismiss) {
            this.destroy();
        } else {
            this.hide();
        }
    }

    /**
     * Set the colour of the component.
     * @return {undefined}
     */
    setColor() {
        this.element.classList.add('is-' + this.color);
    }

    /**
     * Destroy the component, removing the event listener, interval and element.
     * @return {undefined}
     */
    destroy() {
        if(this.closeButton) {
            this.closeButton.removeEventListener('click', this.handleCloseEvent.bind(this));
        }

        clearInterval(this.dismissInterval);

        this.parent.removeChild(this.element);
        this.parent = null;
        this.element = null;
    }
}

/***/ }),

/***/ "./node_modules/@vizuaalog/bulmajs/src/plugin.js":
/*!*******************************************************!*\
  !*** ./node_modules/@vizuaalog/bulmajs/src/plugin.js ***!
  \*******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return Plugin; });
/**
 * Base plugin class. Provides basic, common functionality.
 * @class Plugin
 * @since 0.7.0
 * @author  Thomas Erbe <vizuaalog@gmail.com>
 */
class Plugin {
    /**
     * Helper method used by the Bulma core to create a new instance.
     * @param  {Object?} options The options object for this instance
     * @return {Plugin|boolean} The newly created instance or false if method is not used
     */
    static create() {
        return false;
    }

    /**
     * Handle parsing the DOM elements.
     * @param {HTMLElement?} element The root element for this instance
     * @return {Plugin|boolean} The new plugin instance, or false if method is not used
     */
    static parse() {
        return false;
    }
    
    /**
     * Returns a string containing the element class this plugin supports.
     * @returns {string} The class name.
     * @throws {Error} Thrown if this method has not been replaced.
     */
    static getRootClass() {
        throw new Error('The getRootClass method should have been replaced by the plugin being created.');
    }

    /**
     * Returns an object containing the default options for this plugin.
     * @returns {object} The default options object.
     */
    static defaultOptions() {
        return {};
    }

    /**
     * Create a plugin.
     * @param {object} options The options for this plugin
     */
    constructor(options = {}) {
        this.options = {...this.constructor.defaultOptions(), ...options};

        this.parent = this.option('parent', document.body);
    }

    /**
     * Find an option by key.
     * @param {string} key The option key to find.
     * @param {any} defaultValue Default value if an option with key is not found.
     * @returns {any} The value of the option we found, or defaultValue if none found.
     */
    option(key, defaultValue = null) {
        if(!this.options.hasOwnProperty(key) || this.options[key] === null) {
            if(typeof defaultValue === 'function') {
                return defaultValue();
            }
            
            return defaultValue;
        }

        return this.options[key];
    }
}

/***/ }),

/***/ "./node_modules/@vizuaalog/bulmajs/src/plugins/accordion.js":
/*!******************************************************************!*\
  !*** ./node_modules/@vizuaalog/bulmajs/src/plugins/accordion.js ***!
  \******************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../core */ "./node_modules/@vizuaalog/bulmajs/src/core.js");
/* harmony import */ var _plugin__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../plugin */ "./node_modules/@vizuaalog/bulmajs/src/plugin.js");



/**
 * @module Accordion
 * @since  0.3.0
 * @author  Thomas Erbe <vizuaalog@gmail.com>
 */
class Accordion extends _plugin__WEBPACK_IMPORTED_MODULE_1__["default"] {
    /**
     * Helper method used by the Bulma core to create a new instance.
     * @param  {Object} options The plugin's options
     * @return {Accordion} The newly created instance
     */
    static create(options) {
        return new Accordion(options);
    }

    /**
     * Handle parsing the DOM.
     * @param {HTMLElement} element The root element for this accordion
     * @return {undefined}
     */
    static parse(element) {
        new Accordion({
            element
        });
    }

    /**
     * Returns a string containing the element class this plugin supports.
     * @returns {string} The class name.
     */
    static getRootClass() {
        return 'accordions';
    }

    /**
     * Plugin constructor
     * @param  {Object} options The plugin's options
     * @return {this} The new plugin instance
     */
    constructor(options) {
        super(options);

        // Work out the parent if it hasn't been supplied as an option.
        if(this.parent === null) {
            this.parent = this.option('element').parentNode;
        }

        /**
         * Accordion element.
         * @type {string}
         */
        this.element = this.option('element');
        this.element.setAttribute('data-bulma-attached', 'attached');

        /**
         * Accordion items
         * @type {Array}
         */
        this.accordions = this.findAccordions();

        /**
         * Toggle buttons for each accordion item
         * @type {Array}
         */
        this.toggleButtons = this.findToggleButtons();

        this.addToggleButtonEvents();
    }

    /**
     * Find the accordion items within this accordions element
     * @returns {Array} The accordion elements found
     */
    findAccordions() {
        return this.element.querySelectorAll('.accordion');
    }

    /**
     * Find the toggle buttons within this accordions element
     * @returns {Array} The toggle buttons found
     */
    findToggleButtons() {
        let buttons = [];

        _core__WEBPACK_IMPORTED_MODULE_0__["default"].each(this.accordions, (accordion) => {
            buttons.push(accordion.querySelector('button.toggle'));
        });

        return buttons;
    }

    /**
     * Add click events to toggle buttons
     * @return {undefined}
     */
    addToggleButtonEvents() {
        _core__WEBPACK_IMPORTED_MODULE_0__["default"].each(this.toggleButtons, (toggleButton, index) => {
            // If the button is null, the accordion item has no toggle button
            if(toggleButton !== null) {
                toggleButton.addEventListener('click', (event) => {
                    this.handleToggleClick(event, index);
                });
            }
        });
    }

    /**
     * Handle the click
     * @param {Object} event The event object
     * @param {number} index Index of the accordion to toggle
     * @return {undefined}
     */
    handleToggleClick(event, index) {
        this.toggleAccordionVisibility(this.accordions[index]);
    }

    /**
     * Show or hide the accordion
     * @param {HTMLElement} accordion The accordion element
     * @return {undefined}
     */
    toggleAccordionVisibility(accordion) {
        _core__WEBPACK_IMPORTED_MODULE_0__["default"].each(this.accordions, function(a) {
            a.classList.remove('is-active');
        });

        if(accordion.classList.contains('is-active')) {
            accordion.classList.remove('is-active');
        } else {
            accordion.classList.add('is-active');
        }
    }

    /**
     * Destroy the accordion
     * @return {undefined}
     */
    destroy() {
        this.element = null;
    }
}

_core__WEBPACK_IMPORTED_MODULE_0__["default"].registerPlugin('accordion', Accordion);

/* harmony default export */ __webpack_exports__["default"] = (Accordion);


/***/ }),

/***/ "./node_modules/@vizuaalog/bulmajs/src/plugins/dropdown.js":
/*!*****************************************************************!*\
  !*** ./node_modules/@vizuaalog/bulmajs/src/plugins/dropdown.js ***!
  \*****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../core */ "./node_modules/@vizuaalog/bulmajs/src/core.js");
/* harmony import */ var _plugin__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../plugin */ "./node_modules/@vizuaalog/bulmajs/src/plugin.js");



/**
 * @module Dropdown
 * @since  0.1.0
 * @author  Thomas Erbe <vizuaalog@gmail.com>
 */
class Dropdown extends _plugin__WEBPACK_IMPORTED_MODULE_1__["default"] {
    /**
     * Handle parsing the DOMs data attribute API.
     * @param {HtmlElement} element The root element for this instance
     * @return {undefined}
     */
    static parse(element) {
        new Dropdown({
            element: element
        });
    }

    /**
     * Returns a string containing the element class this plugin supports.
     * @returns {string} The class name.
     * @throws {Error} Thrown if this method has not been replaced.
     */
    static getRootClass() {
        return 'dropdown';
    }

    /**
     * Plugin constructor
     * @param  {Object} options The options object for this plugin
     * @return {this} The newly created instance
     */
    constructor(options) {
        super(options);

        // Work out the parent if it hasn't been supplied as an option.
        if(this.parent === null) {
            this.parent = this.option('element').parentNode;
        }

        /**
         * The root dropdown element.
         * @type {HTMLElement}
         */
        this.element = this.option('element');
        this.element.setAttribute('data-bulma-attached', 'attached');

        /**
         * The element to trigger when clicked.
         * @type {HTMLElement}
         */
        this.trigger = this.element.querySelector('.dropdown-trigger');

        this.registerEvents();
    }

    /**
     * Register all the events this module needs.
     * @return {undefined}
     */
    registerEvents() {
        this.trigger.addEventListener('click', this.handleTriggerClick.bind(this));
    }

    /**
     * Handle the click event on the trigger.
     * @return {undefined}
     */
    handleTriggerClick() {
        if(this.element.classList.contains('is-active')) {
            this.element.classList.remove('is-active');
        } else {
            this.element.classList.add('is-active');
        }
    }
}

_core__WEBPACK_IMPORTED_MODULE_0__["default"].registerPlugin('dropdown', Dropdown);

/* harmony default export */ __webpack_exports__["default"] = (Dropdown);


/***/ }),

/***/ "./node_modules/@vizuaalog/bulmajs/src/plugins/message.js":
/*!****************************************************************!*\
  !*** ./node_modules/@vizuaalog/bulmajs/src/plugins/message.js ***!
  \****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../core */ "./node_modules/@vizuaalog/bulmajs/src/core.js");
/* harmony import */ var _dismissableComponent__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../dismissableComponent */ "./node_modules/@vizuaalog/bulmajs/src/dismissableComponent.js");



/**
 * @module Message
 * @since  0.1.0
 * @author  Thomas Erbe <vizuaalog@gmail.com>
 * @extends DismissableComponent
 */
class Message extends _dismissableComponent__WEBPACK_IMPORTED_MODULE_1__["default"] {
    /**
     * Helper method used by the Bulma core to create a new instance.
     * @param  {Object} options THe options object for this instance
     * @return {Message} The newly created message instance
     */
    static create(options) {
        return new Message(options);
    }

    /**
     * Handle parsing the DOMs data attribute API.
     * @param {HTMLElement} element The root element for this plugin
     * @return {undefined}
     */
    static parse(element) {
        let closeBtn = element.querySelector('.delete');
        let dismissInterval = element.getAttribute('data-dismiss-interval');

        let options = {
            body: null,
            parent: element.parentNode,
            element: element,
            closeButton: closeBtn,
            isDismissable: !!closeBtn,
            destroyOnDismiss: true
        };

        if(dismissInterval) {
            options['dismissInterval'] = parseInt(dismissInterval);
        }

        new Message(options);
    }

    /**
     * Returns a string containing the element class this plugin supports.
     * @returns {string} The class name.
     * @throws {Error} Thrown if this method has not been replaced.
     */
    static getRootClass() {
        return 'message';
    }

    /**
     * Plugin constructor
     * @param  {Object} options The options object for this plugin
     * @return {this} The newly created instance
     */
    constructor(options) {
        super('message', options);

        /**
         * The size of the message
         * @type {String} Possible values are small, normal, medium or large
         */
        this.size = this.option('size');

        /**
         * The title of the message
         * @type {String}
         */
        this.title = this.option('title');

        if(this.title) {
            this.createMessageHeader();
        }

        // TODO: Move this into the DismissableComponent class. Due to the required
        // changes between different components, we may need a way to trigger this
        // when the component is ready.
        if(this.isDismissable) {
            if(!this.option('closeButton')) {
                this.prependCloseButton();
            }

            this.setupCloseEvent();
        }

        if(this.size) {
            this.setSize();
        }
    }

    /**
     * Create the message header
     * @return {undefined}
     */
    createMessageHeader() {
        let header = document.createElement('div');
        header.classList.add('message-header');

        header.innerHTML = '<p>' + this.title + '</p>';

        this.title = header;

        this.element.insertBefore(this.title, this.element.firstChild);
    }

    /**
     * Set the size of the message.
     * @return {undefined}
     */
    setSize() {
        this.element.classList.add('is-' + this.size);
    }

    /**
     * Insert the body text into the component.
     * @return {undefined}
     */
    insertBody() {
        let body = document.createElement('div');
        body.classList.add('message-body');
        body.innerHTML = this.body;

        this.element.appendChild(body);
    }

    /**
     * Insert the close button before our content.
     * @return {undefined}
     */
    prependCloseButton() {
        this.title.appendChild(this.closeButton);
    }
}

_core__WEBPACK_IMPORTED_MODULE_0__["default"].registerPlugin('message', Message);

/* harmony default export */ __webpack_exports__["default"] = (Message);


/***/ }),

/***/ "./node_modules/@vizuaalog/bulmajs/src/plugins/notification.js":
/*!*********************************************************************!*\
  !*** ./node_modules/@vizuaalog/bulmajs/src/plugins/notification.js ***!
  \*********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../core */ "./node_modules/@vizuaalog/bulmajs/src/core.js");
/* harmony import */ var _dismissableComponent__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../dismissableComponent */ "./node_modules/@vizuaalog/bulmajs/src/dismissableComponent.js");



/**
 * @module Notification
 * @since  0.1.0
 * @author  Thomas Erbe <vizuaalog@gmail.com>
 * @extends DismissableComponent
 */
class Notification extends _dismissableComponent__WEBPACK_IMPORTED_MODULE_1__["default"] {
    /**
     * Helper method used by the Bulma core to create a new instance.
     * @param  {Object} options The options object for this instance
     * @return {Notification} The newly created instance
     */
    static create(options) {
        return new Notification(options);
    }

    /**
     * Handle parsing the DOMs data attribute API.
     * @param {HTMLElement} element The root element for this instance
     * @return {undefined}
     */
    static parse(element) {
        let closeBtn = element.querySelector('.delete');
        let dismissInterval = element.getAttribute('data-dismiss-interval');

        let options = {
            body: null,
            parent: element.parentNode,
            element: element,
            closeButton: closeBtn,
            isDismissable: !!closeBtn,
            destroyOnDismiss: true
        };

        if(dismissInterval) {
            options['dismissInterval'] = parseInt(dismissInterval);
        }

        new Notification(options);
    }

    /**
     * Returns a string containing the element class this plugin supports.
     * @returns {string} The class name.
     * @throws {Error} Thrown if this method has not been replaced.
     */
    static getRootClass() {
        return 'notification';
    }

    /**
     * Plugin constructor
     * @param  {Object} options The options object for this plugin
     * @return {this} The newly created instance
     */
    constructor(options) {
        super('notification', options);

        // TODO: Move this into the DismissableComponent class. Due to the required
        // changes between different components, we may need a way to trigger this
        // when the component is ready.
        if(this.isDismissable) {
            if(!options.hasOwnProperty('closeButton')) {
                this.prependCloseButton();
            }

            this.setupCloseEvent();
        }
    }
}

_core__WEBPACK_IMPORTED_MODULE_0__["default"].registerPlugin('notification', Notification);

/* harmony default export */ __webpack_exports__["default"] = (Notification);


/***/ }),

/***/ "./node_modules/@vizuaalog/bulmajs/src/plugins/tabs.js":
/*!*************************************************************!*\
  !*** ./node_modules/@vizuaalog/bulmajs/src/plugins/tabs.js ***!
  \*************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../core */ "./node_modules/@vizuaalog/bulmajs/src/core.js");
/* harmony import */ var _plugin__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../plugin */ "./node_modules/@vizuaalog/bulmajs/src/plugin.js");



/**
 * @module Tabs
 * @since  0.4.0
 * @author  Thomas Erbe <vizuaalog@gmail.com>
 */
class Tabs extends _plugin__WEBPACK_IMPORTED_MODULE_1__["default"] {
    /**
     * Helper method used by the Bulma core to create a new instance.
     * @param  {Object} options The options object for this instance
     * @returns {Tabs} The newly created instance
     */
    static create(options) {
        return new Tabs(options);
    }

    /**
     * Handle parsing the DOMs data attribute API.
     * @param {HTMLElement} element The root element for this instance
     * @returns {undefined}
     */
    static parse(element) {
        let hover = element.hasAttribute('data-hover') ? true : false;

        let options = {
            element: element,
            hover: hover
        };

        new Tabs(options);
    }

    /**
     * The root class used for initialisation
     * @returns {string} The class this plugin is responsible for
     */
    static getRootClass() {
        return 'tabs-wrapper';
    }

    /**
     * Returns an object containing the default options for this plugin.
     * @returns {object} The default options object.
     */
    static defaultOptions() {
        return {
            hover: false
        };
    }

    /**
     * Plugin constructor
     * @param  {Object} options The options object for this plugin
     * @return {this} The newly created instance
     */
    constructor(options) {
        super(options);

        /**
         * The root tab element
         * @param {HTMLElement}
         */
        this.element = this.option('element');
        this.element.setAttribute('data-bulma-attached', 'attached');

        /**
         * Whether the tabs should be changed when the nav item is hovered over
         * @param {boolean}
         */
        this.hover = this.option('hover');

        /**
         * The tab nav container
         * @param {HTMLElement}
         */
        this.nav = this.findNav();

        /**
         * The tab's nav items
         * @param {HTMLElement[]}
         */
        this.navItems = this.findNavItems();

        /**
         * The tab content container
         * @param {HTMLElement}
         */
        this.content = this.findContent();

        /**
         * The tab's content items
         * @param {HTMLElement[]}
         */
        this.contentItems = this.findContentItems();

        this.setupNavEvents();
    }

    /**
     * Find the tab navigation container.
     * @returns {HTMLElement} The navigation container
     */
    findNav() {
        return this.element.querySelector('.tabs');
    }

    /**
     * Find each individual tab item
     * @returns {HTMLElement[]} An array of the found items
     */
    findNavItems() {
        return this.nav.querySelectorAll('li');
    }

    /**
     * Find the tab content container.
     * @returns {HTMLElement} The content container
     */
    findContent() {
        return this.element.querySelector('.tabs-content');
    }

    /**
     * Find each individual content item
     * @returns {HTMLElement[]} An array of the found items
     */
    findContentItems() {
        // We have to use the root here as the querySelectorAll API doesn't
        // support using '>' as the first character. So we have to have a
        // class to start with.
        return this.element.querySelectorAll('.tabs-content > ul > li');
    }

    /**
     * Setup the events to handle tab changing
     * @returns {void}
     */
    setupNavEvents() {
        _core__WEBPACK_IMPORTED_MODULE_0__["default"].each(this.navItems, (navItem, index) => {
            navItem.addEventListener('click', () => {
                this.handleNavClick(navItem, index);
            });

            if(this.hover) {
                navItem.addEventListener('mouseover', () => {
                    this.handleNavClick(navItem, index);
                });
            }
        });
    }

    /**
     * Handle the changing of the visible tab
     * @param {HTMLelement} navItem The nav item we are changing to
     * @param {number} index The internal index of the nav item we're changing to
     * @returns {void}
     */
    handleNavClick(navItem, index) {
        _core__WEBPACK_IMPORTED_MODULE_0__["default"].each(this.navItems, (navItem) => {
            navItem.classList.remove('is-active');
        });

        _core__WEBPACK_IMPORTED_MODULE_0__["default"].each(this.contentItems, (contentItem) => {
            contentItem.classList.remove('is-active');
        });

        navItem.classList.add('is-active');
        this.contentItems[index].classList.add('is-active');
    }
}

_core__WEBPACK_IMPORTED_MODULE_0__["default"].registerPlugin('tabs', Tabs);

/* harmony default export */ __webpack_exports__["default"] = (Tabs);


/***/ }),

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
__webpack_require__(/*! ./bootstrap */ "./resources/js/bootstrap.js"); // window.Vue = require('vue');
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


document.addEventListener('DOMContentLoaded', function () {
  // Get all "navbar-burger" elements
  var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0); // Check if there are any navbar burgers

  if ($navbarBurgers.length > 0) {
    // Add a click event on each of them
    $navbarBurgers.forEach(function ($el) {
      $el.addEventListener('click', function () {
        // Get the target from the "data-target" attribute
        var target = $el.dataset.target;
        var $target = document.getElementById(target); // Toggle the class on both the "navbar-burger" and the "navbar-menu"

        $el.classList.toggle('is-active');
        $target.classList.toggle('is-active');
      });
    });
  }
}); // import Bulma from '@vizuaalog/bulmajs';

__webpack_require__(/*! @vizuaalog/bulmajs/src/plugins/message */ "./node_modules/@vizuaalog/bulmajs/src/plugins/message.js");

__webpack_require__(/*! @vizuaalog/bulmajs/src/plugins/notification */ "./node_modules/@vizuaalog/bulmajs/src/plugins/notification.js");

__webpack_require__(/*! @vizuaalog/bulmajs/src/plugins/accordion */ "./node_modules/@vizuaalog/bulmajs/src/plugins/accordion.js");

__webpack_require__(/*! @vizuaalog/bulmajs/src/plugins/tabs */ "./node_modules/@vizuaalog/bulmajs/src/plugins/tabs.js");

__webpack_require__(/*! @vizuaalog/bulmajs/src/plugins/dropdown */ "./node_modules/@vizuaalog/bulmajs/src/plugins/dropdown.js"); // require('./bulma-extensions');

/***/ }),

/***/ "./resources/js/bootstrap.js":
/*!***********************************!*\
  !*** ./resources/js/bootstrap.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */
try {// window.$ = window.jQuery = require('jquery');
} catch (e) {}
/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */
//
// window.axios = require('axios');
//
// window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */


var token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {// window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
  console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/app.scss ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! D:\laragon\www\quiz\resources\js\app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! D:\laragon\www\quiz\resources\sass\app.scss */"./resources/sass/app.scss");


/***/ })

/******/ });