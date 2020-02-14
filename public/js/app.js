/******/
(function (modules) { // webpackBootstrap
    /******/ 	// The module cache
    /******/
    var installedModules = {};
    /******/
    /******/ 	// The require function
    /******/
    function __webpack_require__(moduleId) {
        /******/
        /******/ 		// Check if module is in cache
        /******/
        if (installedModules[moduleId]) {
            /******/
            return installedModules[moduleId].exports;
            /******/
        }
        /******/ 		// Create a new module (and put it into the cache)
        /******/
        var module = installedModules[moduleId] = {
            /******/            i: moduleId,
            /******/            l: false,
            /******/            exports: {}
            /******/
        };
        /******/
        /******/ 		// Execute the module function
        /******/
        modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
        /******/
        /******/ 		// Flag the module as loaded
        /******/
        module.l = true;
        /******/
        /******/ 		// Return the exports of the module
        /******/
        return module.exports;
        /******/
    }

    /******/
    /******/
    /******/ 	// expose the modules object (__webpack_modules__)
    /******/
    __webpack_require__.m = modules;
    /******/
    /******/ 	// expose the module cache
    /******/
    __webpack_require__.c = installedModules;
    /******/
    /******/ 	// define getter function for harmony exports
    /******/
    __webpack_require__.d = function (exports, name, getter) {
        /******/
        if (!__webpack_require__.o(exports, name)) {
            /******/
            Object.defineProperty(exports, name, {enumerable: true, get: getter});
            /******/
        }
        /******/
    };
    /******/
    /******/ 	// define __esModule on exports
    /******/
    __webpack_require__.r = function (exports) {
        /******/
        if (typeof Symbol !== 'undefined' && Symbol.toStringTag) {
            /******/
            Object.defineProperty(exports, Symbol.toStringTag, {value: 'Module'});
            /******/
        }
        /******/
        Object.defineProperty(exports, '__esModule', {value: true});
        /******/
    };
    /******/
    /******/ 	// create a fake namespace object
    /******/ 	// mode & 1: value is a module id, require it
    /******/ 	// mode & 2: merge all properties of value into the ns
    /******/ 	// mode & 4: return value when already ns object
    /******/ 	// mode & 8|1: behave like require
    /******/
    __webpack_require__.t = function (value, mode) {
        /******/
        if (mode & 1) value = __webpack_require__(value);
        /******/
        if (mode & 8) return value;
        /******/
        if ((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
        /******/
        var ns = Object.create(null);
        /******/
        __webpack_require__.r(ns);
        /******/
        Object.defineProperty(ns, 'default', {enumerable: true, value: value});
        /******/
        if (mode & 2 && typeof value != 'string') for (var key in value) __webpack_require__.d(ns, key, function (key) {
            return value[key];
        }.bind(null, key));
        /******/
        return ns;
        /******/
    };
    /******/
    /******/ 	// getDefaultExport function for compatibility with non-harmony modules
    /******/
    __webpack_require__.n = function (module) {
        /******/
        var getter = module && module.__esModule ?
            /******/            function getDefault() {
                return module['default'];
            } :
            /******/            function getModuleExports() {
                return module;
            };
        /******/
        __webpack_require__.d(getter, 'a', getter);
        /******/
        return getter;
        /******/
    };
    /******/
    /******/ 	// Object.prototype.hasOwnProperty.call
    /******/
    __webpack_require__.o = function (object, property) {
        return Object.prototype.hasOwnProperty.call(object, property);
    };
    /******/
    /******/ 	// __webpack_public_path__
    /******/
    __webpack_require__.p = "/";
    /******/
    /******/
    /******/ 	// Load entry module and return exports
    /******/
    return __webpack_require__(__webpack_require__.s = 0);
    /******/
})
    /************************************************************************/
    /******/ ({

    /***/ "./node_modules/alpinejs/src/component.js":
    /*!************************************************!*\
  !*** ./node_modules/alpinejs/src/component.js ***!
  \************************************************/
    /*! exports provided: default */
    /***/ (function (module, __webpack_exports__, __webpack_require__) {

        "use strict";
        __webpack_require__.r(__webpack_exports__);
        /* harmony export (binding) */
        __webpack_require__.d(__webpack_exports__, "default", function () {
            return Component;
        });
        /* harmony import */
        var _utils__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./utils */ "./node_modules/alpinejs/src/utils.js");
        /* harmony import */
        var _directives_for__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./directives/for */ "./node_modules/alpinejs/src/directives/for.js");
        /* harmony import */
        var _directives_bind__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./directives/bind */ "./node_modules/alpinejs/src/directives/bind.js");
        /* harmony import */
        var _directives_show__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./directives/show */ "./node_modules/alpinejs/src/directives/show.js");
        /* harmony import */
        var _directives_if__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./directives/if */ "./node_modules/alpinejs/src/directives/if.js");
        /* harmony import */
        var _directives_model__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./directives/model */ "./node_modules/alpinejs/src/directives/model.js");
        /* harmony import */
        var _directives_on__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./directives/on */ "./node_modules/alpinejs/src/directives/on.js");


        class Component {
            constructor(el) {
                this.$el = el

                const dataAttr = this.$el.getAttribute('x-data')
                const dataExpression = dataAttr === '' ? '{}' : dataAttr
                const initExpression = this.$el.getAttribute('x-init')
                const createdExpression = this.$el.getAttribute('x-created')
                const mountedExpression = this.$el.getAttribute('x-mounted')

                const unobservedData = Object(_utils__WEBPACK_IMPORTED_MODULE_0__["saferEval"])(dataExpression, {})

                // Construct a Proxy-based observable. This will be used to handle reactivity.
                this.$data = this.wrapDataInObservable(unobservedData)

                // After making user-supplied data methods reactive, we can now add
                // our magic properties to the original data for access.
                unobservedData.$el = this.$el
                unobservedData.$refs = this.getRefsProxy()

                this.nextTickStack = []
                unobservedData.$nextTick = (callback) => {
                    this.nextTickStack.push(callback)
                }

                this.showDirectiveStack = []
                this.showDirectiveLastElement

                var initReturnedCallback
                if (initExpression) {
                    // We want to allow data manipulation, but not trigger DOM updates just yet.
                    // We haven't even initialized the elements with their Alpine bindings. I mean c'mon.
                    this.pauseReactivity = true
                    initReturnedCallback = this.evaluateReturnExpression(this.$el, initExpression)
                    this.pauseReactivity = false
                }

                if (createdExpression) {
                    console.warn('AlpineJS Warning: "x-created" is deprecated and will be removed in the next major version. Use "x-init" instead.')
                    this.pauseReactivity = true
                    Object(_utils__WEBPACK_IMPORTED_MODULE_0__["saferEvalNoReturn"])(this.$el.getAttribute('x-created'), this.$data)
                    this.pauseReactivity = false
                }

                // Register all our listeners and set all our attribute bindings.
                this.initializeElements(this.$el)

                // Use mutation observer to detect new elements being added within this component at run-time.
                // Alpine's just so darn flexible amirite?
                this.listenForNewElementsToInitialize()

                if (typeof initReturnedCallback === 'function') {
                    // Run the callback returned form the "x-init" hook to allow the user to do stuff after
                    // Alpine's got it's grubby little paws all over everything.
                    initReturnedCallback.call(this.$data)
                }

                if (mountedExpression) {
                    console.warn('AlpineJS Warning: "x-mounted" is deprecated and will be removed in the next major version. Use "x-init" (with a callback return) for the same behavior.')
                    // Run an "x-mounted" hook to allow the user to do stuff after
                    // Alpine's got it's grubby little paws all over everything.
                    Object(_utils__WEBPACK_IMPORTED_MODULE_0__["saferEvalNoReturn"])(mountedExpression, this.$data)
                }
            }

            wrapDataInObservable(data) {
                var self = this

                const proxyHandler = {
                    set(obj, property, value) {
                        // Set the value converting it to a "Deep Proxy" when required
                        // Note that if a project is not a valid object, it won't be converted to a proxy
                        const setWasSuccessful = Reflect.set(obj, property, Object(_utils__WEBPACK_IMPORTED_MODULE_0__["deepProxy"])(value, proxyHandler))

                        // Don't react to data changes for cases like the `x-created` hook.
                        if (self.pauseReactivity) return setWasSuccessful

                        Object(_utils__WEBPACK_IMPORTED_MODULE_0__["debounce"])(() => {
                            self.updateElements(self.$el)

                            // Walk through the $nextTick stack and clear it as we go.
                            while (self.nextTickStack.length > 0) {
                                self.nextTickStack.shift()()
                            }
                        }, 0)()

                        return setWasSuccessful
                    },
                    get(target, key) {
                        // Provide a way to determine if this object is an Alpine proxy or not.
                        if (key === "$isAlpineProxy") return true

                        // Just return the flippin' value. Gawsh.
                        return target[key]
                    }
                }

                return Object(_utils__WEBPACK_IMPORTED_MODULE_0__["deepProxy"])(data, proxyHandler)
            }

            walkAndSkipNestedComponents(el, callback, initializeComponentCallback = () => {
            }) {
                Object(_utils__WEBPACK_IMPORTED_MODULE_0__["walk"])(el, el => {
                    // We've hit a component.
                    if (el.hasAttribute('x-data')) {
                        // If it's not the current one.
                        if (!el.isSameNode(this.$el)) {
                            // Initialize it if it's not.
                            if (!el.__x) initializeComponentCallback(el)

                            // Now we'll let that sub-component deal with itself.
                            return false
                        }
                    }

                    return callback(el)
                })
            }

            initializeElements(rootEl, extraVars = () => {
            }) {
                this.walkAndSkipNestedComponents(rootEl, el => {
                    // Don't touch spawns from for loop
                    if (el.__x_for_key !== undefined) return false

                    this.initializeElement(el, extraVars)
                }, el => {
                    el.__x = new Component(el)
                })

                this.executeAndClearRemainingShowDirectiveStack()

                // Walk through the $nextTick stack and clear it as we go.
                while (this.nextTickStack.length > 0) {
                    this.nextTickStack.shift()()
                }
            }

            initializeElement(el, extraVars) {
                // To support class attribute merging, we have to know what the element's
                // original class attribute looked like for reference.
                if (el.hasAttribute('class') && Object(_utils__WEBPACK_IMPORTED_MODULE_0__["getXAttrs"])(el).length > 0) {
                    el.__x_original_classes = el.getAttribute('class').split(' ')
                }

                this.registerListeners(el, extraVars)
                this.resolveBoundAttributes(el, true, extraVars)
            }

            updateElements(rootEl, extraVars = () => {
            }) {
                this.walkAndSkipNestedComponents(rootEl, el => {
                    // Don't touch spawns from for loop (and check if the root is actually a for loop in a parent, don't skip it.)
                    if (el.__x_for_key !== undefined && !el.isSameNode(this.$el)) return false

                    this.updateElement(el, extraVars)
                }, el => {
                    el.__x = new Component(el)
                })

                this.executeAndClearRemainingShowDirectiveStack()

                // Walk through the $nextTick stack and clear it as we go.
                while (this.nextTickStack.length > 0) {
                    this.nextTickStack.shift()()
                }
            }

            executeAndClearRemainingShowDirectiveStack() {
                // The goal here is to start all the x-show transitions
                // and build a nested promise chain so that elements
                // only hide when the children are finished hiding.
                this.showDirectiveStack.reverse().map(thing => {
                    return new Promise(resolve => {
                        thing(finish => {
                            resolve(finish)
                        })
                    })
                }).reduce((nestedPromise, promise) => {
                    return nestedPromise.then(() => {
                        return promise.then(finish => finish())
                    })
                }, Promise.resolve(() => {
                }))

                // We've processed the handler stack. let's clear it.
                this.showDirectiveStack = []
                this.showDirectiveLastElement = undefined
            }

            updateElement(el, extraVars) {
                this.resolveBoundAttributes(el, false, extraVars)
            }

            registerListeners(el, extraVars) {
                Object(_utils__WEBPACK_IMPORTED_MODULE_0__["getXAttrs"])(el).forEach(({type, value, modifiers, expression}) => {
                    switch (type) {
                        case 'on':
                            Object(_directives_on__WEBPACK_IMPORTED_MODULE_6__["registerListener"])(this, el, value, modifiers, expression, extraVars)
                            break;

                        case 'model':
                            Object(_directives_model__WEBPACK_IMPORTED_MODULE_5__["registerModelListener"])(this, el, modifiers, expression, extraVars)
                            break;
                        default:
                            break;
                    }
                })
            }

            resolveBoundAttributes(el, initialUpdate = false, extraVars) {
                Object(_utils__WEBPACK_IMPORTED_MODULE_0__["getXAttrs"])(el).forEach(({type, value, modifiers, expression}) => {
                    switch (type) {
                        case 'model':
                            Object(_directives_bind__WEBPACK_IMPORTED_MODULE_2__["handleAttributeBindingDirective"])(this, el, 'value', expression, extraVars)
                            break;

                        case 'bind':
                            // The :key binding on an x-for is special, ignore it.
                            if (el.tagName.toLowerCase() === 'template' && value === 'key') return

                            Object(_directives_bind__WEBPACK_IMPORTED_MODULE_2__["handleAttributeBindingDirective"])(this, el, value, expression, extraVars)
                            break;

                        case 'text':
                            var output = this.evaluateReturnExpression(el, expression, extraVars);

                            // If nested model key is undefined, set the default value to empty string.
                            if (output === undefined && expression.match(/\./).length) {
                                output = ''
                            }

                            el.innerText = output
                            break;

                        case 'html':
                            el.innerHTML = this.evaluateReturnExpression(el, expression, extraVars)
                            break;

                        case 'show':
                            var output = this.evaluateReturnExpression(el, expression, extraVars)

                            Object(_directives_show__WEBPACK_IMPORTED_MODULE_3__["handleShowDirective"])(this, el, output, modifiers, initialUpdate)
                            break;

                        case 'if':
                            var output = this.evaluateReturnExpression(el, expression, extraVars)

                            Object(_directives_if__WEBPACK_IMPORTED_MODULE_4__["handleIfDirective"])(el, output, initialUpdate)
                            break;

                        case 'for':
                            Object(_directives_for__WEBPACK_IMPORTED_MODULE_1__["handleForDirective"])(this, el, expression, initialUpdate)
                            break;

                        case 'cloak':
                            el.removeAttribute('x-cloak')
                            break;

                        default:
                            break;
                    }
                })
            }

            evaluateReturnExpression(el, expression, extraVars = () => {
            }) {
                return Object(_utils__WEBPACK_IMPORTED_MODULE_0__["saferEval"])(expression, this.$data, {
                    ...extraVars(),
                    $dispatch: this.getDispatchFunction(el),
                })
            }

            evaluateCommandExpression(el, expression, extraVars = () => {
            }) {
                return Object(_utils__WEBPACK_IMPORTED_MODULE_0__["saferEvalNoReturn"])(expression, this.$data, {
                    ...extraVars(),
                    $dispatch: this.getDispatchFunction(el),
                })
            }

            getDispatchFunction(el) {
                return (event, detail = {}) => {
                    el.dispatchEvent(new CustomEvent(event, {
                        detail,
                        bubbles: true,
                    }))
                }
            }

            listenForNewElementsToInitialize() {
                const targetNode = this.$el

                const observerOptions = {
                    childList: true,
                    attributes: true,
                    subtree: true,
                }

                const observer = new MutationObserver((mutations) => {
                    for (let i = 0; i < mutations.length; i++) {
                        // Filter out mutations triggered from child components.
                        const closestParentComponent = mutations[i].target.closest('[x-data]')
                        if (!(closestParentComponent && closestParentComponent.isSameNode(this.$el))) return

                        if (mutations[i].type === 'attributes' && mutations[i].attributeName === 'x-data') {
                            const rawData = Object(_utils__WEBPACK_IMPORTED_MODULE_0__["saferEval"])(mutations[i].target.getAttribute('x-data'), {})

                            Object.keys(rawData).forEach(key => {
                                if (this.$data[key] !== rawData[key]) {
                                    this.$data[key] = rawData[key]
                                }
                            })
                        }

                        if (mutations[i].addedNodes.length > 0) {
                            mutations[i].addedNodes.forEach(node => {
                                if (node.nodeType !== 1) return

                                if (node.matches('[x-data]')) {
                                    node.__x = new Component(node)
                                    return
                                }

                                this.initializeElements(node)
                            })
                        }
                    }
                })

                observer.observe(targetNode, observerOptions);
            }

            getRefsProxy() {
                var self = this

                // One of the goals of this is to not hold elements in memory, but rather re-evaluate
                // the DOM when the system needs something from it. This way, the framework is flexible and
                // friendly to outside DOM changes from libraries like Vue/Livewire.
                // For this reason, I'm using an "on-demand" proxy to fake a "$refs" object.
                return new Proxy({}, {
                    get(object, property) {
                        if (property === '$isAlpineProxy') return true

                        var ref

                        // We can't just query the DOM because it's hard to filter out refs in
                        // nested components.
                        self.walkAndSkipNestedComponents(self.$el, el => {
                            if (el.hasAttribute('x-ref') && el.getAttribute('x-ref') === property) {
                                ref = el
                            }
                        })

                        return ref
                    }
                })
            }
        }


        /***/
    }),

    /***/ "./node_modules/alpinejs/src/directives/bind.js":
    /*!******************************************************!*\
  !*** ./node_modules/alpinejs/src/directives/bind.js ***!
  \******************************************************/
    /*! exports provided: handleAttributeBindingDirective */
    /***/ (function (module, __webpack_exports__, __webpack_require__) {

        "use strict";
        __webpack_require__.r(__webpack_exports__);
        /* harmony export (binding) */
        __webpack_require__.d(__webpack_exports__, "handleAttributeBindingDirective", function () {
            return handleAttributeBindingDirective;
        });
        /* harmony import */
        var _utils__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../utils */ "./node_modules/alpinejs/src/utils.js");


        function handleAttributeBindingDirective(component, el, attrName, expression, extraVars) {
            var value = component.evaluateReturnExpression(el, expression, extraVars)

            if (attrName === 'value') {
                // If nested model key is undefined, set the default value to empty string.
                if (value === undefined && expression.match(/\./).length) {
                    value = ''
                }

                if (el.type === 'radio') {
                    el.checked = el.value == value
                } else if (el.type === 'checkbox') {
                    if (Array.isArray(value)) {
                        // I'm purposely not using Array.includes here because it's
                        // strict, and because of Numeric/String mis-casting, I
                        // want the "includes" to be "fuzzy".
                        let valueFound = false
                        value.forEach(val => {
                            if (val == el.value) {
                                valueFound = true
                            }
                        })

                        el.checked = valueFound
                    } else {
                        el.checked = !!value
                    }
                } else if (el.tagName === 'SELECT') {
                    updateSelect(el, value)
                } else {
                    el.value = value
                }
            } else if (attrName === 'class') {
                if (Array.isArray(value)) {
                    const originalClasses = el.__x_original_classes || []
                    el.setAttribute('class', Object(_utils__WEBPACK_IMPORTED_MODULE_0__["arrayUnique"])(originalClasses.concat(value)).join(' '))
                } else if (typeof value === 'object') {
                    Object.keys(value).forEach(classNames => {
                        if (value[classNames]) {
                            classNames.split(' ').forEach(className => el.classList.add(className))
                        } else {
                            classNames.split(' ').forEach(className => el.classList.remove(className))
                        }
                    })
                } else {
                    const originalClasses = el.__x_original_classes || []
                    const newClasses = value.split(' ')
                    el.setAttribute('class', Object(_utils__WEBPACK_IMPORTED_MODULE_0__["arrayUnique"])(originalClasses.concat(newClasses)).join(' '))
                }
            } else if (['disabled', 'readonly', 'required', 'checked', 'hidden', 'selected'].includes(attrName)) {
                // Boolean attributes have to be explicitly added and removed, not just set.
                if (!!value) {
                    el.setAttribute(attrName, '')
                } else {
                    el.removeAttribute(attrName)
                }
            } else {
                el.setAttribute(attrName, value)
            }
        }

        function updateSelect(el, value) {
            const arrayWrappedValue = [].concat(value).map(value => {
                return value + ''
            })

            Array.from(el.options).forEach(option => {
                option.selected = arrayWrappedValue.includes(option.value || option.text)
            })
        }


        /***/
    }),

    /***/ "./node_modules/alpinejs/src/directives/for.js":
    /*!*****************************************************!*\
  !*** ./node_modules/alpinejs/src/directives/for.js ***!
  \*****************************************************/
    /*! exports provided: handleForDirective */
    /***/ (function (module, __webpack_exports__, __webpack_require__) {

        "use strict";
        __webpack_require__.r(__webpack_exports__);
        /* harmony export (binding) */
        __webpack_require__.d(__webpack_exports__, "handleForDirective", function () {
            return handleForDirective;
        });
        /* harmony import */
        var _utils__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../utils */ "./node_modules/alpinejs/src/utils.js");


        function handleForDirective(component, el, expression, initialUpdate) {
            const {single, bunch, iterator1, iterator2} = parseFor(expression)

            var items = component.evaluateReturnExpression(el, bunch)

            // As we walk the array, we'll also walk the DOM (updating/creating as we go).
            var previousEl = el
            items.forEach((i, index, group) => {
                const currentKey = getThisIterationsKeyFromTemplateTag(component, el, single, iterator1, iterator2, i, index, group)
                let currentEl = previousEl.nextElementSibling

                // Let's check and see if the x-for has already generated an element last time it ran.
                if (currentEl && currentEl.__x_for_key !== undefined) {
                    // If the the key's don't match.
                    if (currentEl.__x_for_key !== currentKey) {
                        // We'll look ahead to see if we can find it further down.
                        var tmpCurrentEl = currentEl
                        while (tmpCurrentEl) {
                            // If we found it later in the DOM.
                            if (tmpCurrentEl.__x_for_key === currentKey) {
                                // Move it to where it's supposed to be in the DOM.
                                el.parentElement.insertBefore(tmpCurrentEl, currentEl)
                                // And set it as the current element as if we just created it.
                                currentEl = tmpCurrentEl
                                break
                            }

                            tmpCurrentEl = (tmpCurrentEl.nextElementSibling && tmpCurrentEl.nextElementSibling.__x_for_key !== undefined) ? tmpCurrentEl.nextElementSibling : false
                        }
                    }

                    // Temporarily remove the key indicator to allow the normal "updateElements" to work
                    delete currentEl.__x_for_key

                    currentEl.__x_for_alias = single
                    currentEl.__x_for_value = i
                    component.updateElements(currentEl, () => {
                        return {[currentEl.__x_for_alias]: currentEl.__x_for_value}
                    })
                } else {
                    // There are no more .__x_for_key elements, meaning the page is first loading, OR, there are
                    // extra items in the array that need to be added as new elements.

                    // Let's create a clone from the template.
                    const clone = document.importNode(el.content, true);
                    // Insert it where we are in the DOM.
                    el.parentElement.insertBefore(clone, currentEl)

                    // Set it as the current element.
                    currentEl = previousEl.nextElementSibling

                    // And transition it in if it's not the first page load.
                    Object(_utils__WEBPACK_IMPORTED_MODULE_0__["transitionIn"])(currentEl, () => {
                    }, initialUpdate)

                    // Now, let's walk the new DOM node and initialize everything,
                    // including new nested components.
                    // Note we are resolving the "extraData" alias stuff from the dom element value so that it's
                    // always up to date for listener handlers that don't get re-registered.
                    currentEl.__x_for_alias = single
                    currentEl.__x_for_value = i
                    component.initializeElements(currentEl, () => {
                        return {[currentEl.__x_for_alias]: currentEl.__x_for_value}
                    })
                }

                currentEl.__x_for_key = currentKey

                previousEl = currentEl
            })

            // Now that we've added/updated/moved all the elements for the current state of the loop.
            // Anything left over, we can get rid of.
            var nextElementFromOldLoop = (previousEl.nextElementSibling && previousEl.nextElementSibling.__x_for_key !== undefined) ? previousEl.nextElementSibling : false

            while (nextElementFromOldLoop) {
                const nextElementFromOldLoopImmutable = nextElementFromOldLoop
                const nextSibling = nextElementFromOldLoop.nextElementSibling

                Object(_utils__WEBPACK_IMPORTED_MODULE_0__["transitionOut"])(nextElementFromOldLoop, () => {
                    nextElementFromOldLoopImmutable.remove()
                })

                nextElementFromOldLoop = (nextSibling && nextSibling.__x_for_key !== undefined) ? nextSibling : false
            }
        }

// This was taken from VueJS 2.* core. Thanks Vue!
        function parseFor(expression) {
            const forIteratorRE = /,([^,\}\]]*)(?:,([^,\}\]]*))?$/
            const stripParensRE = /^\(|\)$/g
            const forAliasRE = /([\s\S]*?)\s+(?:in|of)\s+([\s\S]*)/

            const inMatch = expression.match(forAliasRE)
            if (!inMatch) return
            const res = {}
            res.bunch = inMatch[2].trim()
            const single = inMatch[1].trim().replace(stripParensRE, '')
            const iteratorMatch = single.match(forIteratorRE)
            if (iteratorMatch) {
                res.single = single.replace(forIteratorRE, '').trim()
                res.iterator1 = iteratorMatch[1].trim()
                if (iteratorMatch[2]) {
                    res.iterator2 = iteratorMatch[2].trim()
                }
            } else {
                res.single = single
            }
            return res
        }

        function getThisIterationsKeyFromTemplateTag(component, el, single, iterator1, iterator2, i, index, group) {
            const keyAttr = Object(_utils__WEBPACK_IMPORTED_MODULE_0__["getXAttrs"])(el, 'bind').filter(attr => attr.value === 'key')[0]

            let keyAliases = {[single]: i}
            if (iterator1) keyAliases[iterator1] = index
            if (iterator2) keyAliases[iterator2] = group

            return keyAttr
                ? component.evaluateReturnExpression(el, keyAttr.expression, () => keyAliases)
                : index
        }


        /***/
    }),

    /***/ "./node_modules/alpinejs/src/directives/if.js":
    /*!****************************************************!*\
  !*** ./node_modules/alpinejs/src/directives/if.js ***!
  \****************************************************/
    /*! exports provided: handleIfDirective */
    /***/ (function (module, __webpack_exports__, __webpack_require__) {

        "use strict";
        __webpack_require__.r(__webpack_exports__);
        /* harmony export (binding) */
        __webpack_require__.d(__webpack_exports__, "handleIfDirective", function () {
            return handleIfDirective;
        });
        /* harmony import */
        var _utils__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../utils */ "./node_modules/alpinejs/src/utils.js");


        function handleIfDirective(el, expressionResult, initialUpdate) {
            if (el.nodeName.toLowerCase() !== 'template') console.warn(`Alpine: [x-if] directive should only be added to <template> tags. See https://github.com/alpinejs/alpine#x-if`)

            const elementHasAlreadyBeenAdded = el.nextElementSibling && el.nextElementSibling.__x_inserted_me === true

            if (expressionResult && !elementHasAlreadyBeenAdded) {
                const clone = document.importNode(el.content, true);

                el.parentElement.insertBefore(clone, el.nextElementSibling)

                el.nextElementSibling.__x_inserted_me = true

                Object(_utils__WEBPACK_IMPORTED_MODULE_0__["transitionIn"])(el.nextElementSibling, () => {
                }, initialUpdate)
            } else if (!expressionResult && elementHasAlreadyBeenAdded) {
                Object(_utils__WEBPACK_IMPORTED_MODULE_0__["transitionOut"])(el.nextElementSibling, () => {
                    el.nextElementSibling.remove()
                }, initialUpdate)
            }
        }


        /***/
    }),

    /***/ "./node_modules/alpinejs/src/directives/model.js":
    /*!*******************************************************!*\
  !*** ./node_modules/alpinejs/src/directives/model.js ***!
  \*******************************************************/
    /*! exports provided: registerModelListener */
    /***/ (function (module, __webpack_exports__, __webpack_require__) {

        "use strict";
        __webpack_require__.r(__webpack_exports__);
        /* harmony export (binding) */
        __webpack_require__.d(__webpack_exports__, "registerModelListener", function () {
            return registerModelListener;
        });
        /* harmony import */
        var _on__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./on */ "./node_modules/alpinejs/src/directives/on.js");


        function registerModelListener(component, el, modifiers, expression, extraVars) {
            // If the element we are binding to is a select, a radio, or checkbox
            // we'll listen for the change event instead of the "input" event.
            var event = (el.tagName.toLowerCase() === 'select')
            || ['checkbox', 'radio'].includes(el.type)
            || modifiers.includes('lazy')
                ? 'change' : 'input'

            const listenerExpression = `${expression} = rightSideOfExpression($event, ${expression})`

            Object(_on__WEBPACK_IMPORTED_MODULE_0__["registerListener"])(component, el, event, modifiers, listenerExpression, () => {
                return {
                    ...extraVars(),
                    rightSideOfExpression: generateModelAssignmentFunction(el, modifiers, expression),
                }
            })
        }

        function generateModelAssignmentFunction(el, modifiers, expression) {
            if (el.type === 'radio') {
                // Radio buttons only work properly when they share a name attribute.
                // People might assume we take care of that for them, because
                // they already set a shared "x-model" attribute.
                if (!el.hasAttribute('name')) el.setAttribute('name', expression)
            }

            return (event, currentValue) => {
                if (event instanceof CustomEvent) {
                    return event.detail
                } else if (el.type === 'checkbox') {
                    // If the data we are binding to is an array, toggle it's value inside the array.
                    if (Array.isArray(currentValue)) {
                        return event.target.checked ? currentValue.concat([event.target.value]) : currentValue.filter(i => i !== event.target.value)
                    } else {
                        return event.target.checked
                    }
                } else if (el.tagName.toLowerCase() === 'select' && el.multiple) {
                    return modifiers.includes('number')
                        ? Array.from(event.target.selectedOptions).map(option => {
                            return parseFloat(option.value || option.text)
                        })
                        : Array.from(event.target.selectedOptions).map(option => {
                            return option.value || option.text
                        })
                } else {
                    return modifiers.includes('number')
                        ? parseFloat(event.target.value)
                        : (modifiers.includes('trim') ? event.target.value.trim() : event.target.value)
                }
            }
        }


        /***/
    }),

    /***/ "./node_modules/alpinejs/src/directives/on.js":
    /*!****************************************************!*\
  !*** ./node_modules/alpinejs/src/directives/on.js ***!
  \****************************************************/
    /*! exports provided: registerListener */
    /***/ (function (module, __webpack_exports__, __webpack_require__) {

        "use strict";
        __webpack_require__.r(__webpack_exports__);
        /* harmony export (binding) */
        __webpack_require__.d(__webpack_exports__, "registerListener", function () {
            return registerListener;
        });
        /* harmony import */
        var _utils__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../utils */ "./node_modules/alpinejs/src/utils.js");


        function registerListener(component, el, event, modifiers, expression, extraVars = {}) {
            if (modifiers.includes('away')) {
                const handler = e => {
                    // Don't do anything if the click came form the element or within it.
                    if (el.contains(e.target)) return

                    // Don't do anything if this element isn't currently visible.
                    if (el.offsetWidth < 1 && el.offsetHeight < 1) return

                    // Now that we are sure the element is visible, AND the click
                    // is from outside it, let's run the expression.
                    runListenerHandler(component, expression, e, extraVars)

                    if (modifiers.includes('once')) {
                        document.removeEventListener(event, handler)
                    }
                }

                // Listen for this event at the root level.
                document.addEventListener(event, handler)
            } else {
                const listenerTarget = modifiers.includes('window')
                    ? window : (modifiers.includes('document') ? document : el)

                const handler = e => {
                    if (isKeyEvent(event)) {
                        if (isListeningForASpecificKeyThatHasntBeenPressed(e, modifiers)) {
                            return
                        }
                    }

                    if (modifiers.includes('prevent')) e.preventDefault()
                    if (modifiers.includes('stop')) e.stopPropagation()

                    const returnValue = runListenerHandler(component, expression, e, extraVars)

                    if (returnValue === false) {
                        e.preventDefault()
                    } else {
                        if (modifiers.includes('once')) {
                            listenerTarget.removeEventListener(event, handler)
                        }
                    }
                }

                listenerTarget.addEventListener(event, handler)
            }
        }

        function runListenerHandler(component, expression, e, extraVars) {
            return component.evaluateCommandExpression(e.target, expression, () => {
                return {...extraVars(), '$event': e}
            })
        }

        function isKeyEvent(event) {
            return ['keydown', 'keyup'].includes(event)
        }

        function isListeningForASpecificKeyThatHasntBeenPressed(e, modifiers) {
            let keyModifiers = modifiers.filter(i => {
                return !['window', 'document', 'prevent', 'stop'].includes(i)
            })

            // If no modifier is specified, we'll call it a press.
            if (keyModifiers.length === 0) return false

            // If one is passed, AND it matches the key pressed, we'll call it a press.
            if (keyModifiers.length === 1 && keyModifiers[0] === keyToModifier(e.key)) return false

            // The user is listening for key combinations.
            const systemKeyModifiers = ['ctrl', 'shift', 'alt', 'meta', 'cmd', 'super']
            const selectedSystemKeyModifiers = systemKeyModifiers.filter(modifier => keyModifiers.includes(modifier))

            keyModifiers = keyModifiers.filter(i => !selectedSystemKeyModifiers.includes(i))

            if (selectedSystemKeyModifiers.length > 0) {
                const activelyPressedKeyModifiers = selectedSystemKeyModifiers.filter(modifier => {
                    // Alias "cmd" and "super" to "meta"
                    if (modifier === 'cmd' || modifier === 'super') modifier = 'meta'

                    return e[`${modifier}Key`]
                })

                // If all the modifiers selected are pressed, ...
                if (activelyPressedKeyModifiers.length === selectedSystemKeyModifiers.length) {
                    // AND the remaining key is pressed as well. It's a press.
                    if (keyModifiers[0] === keyToModifier(e.key)) return false
                }
            }

            // We'll call it NOT a valid keypress.
            return true
        }

        function keyToModifier(key) {
            switch (key) {
                case '/':
                    return 'slash'
                case ' ':
                case 'Spacebar':
                    return 'space'
                default:
                    return Object(_utils__WEBPACK_IMPORTED_MODULE_0__["kebabCase"])(key)
            }
        }


        /***/
    }),

    /***/ "./node_modules/alpinejs/src/directives/show.js":
    /*!******************************************************!*\
  !*** ./node_modules/alpinejs/src/directives/show.js ***!
  \******************************************************/
    /*! exports provided: handleShowDirective */
    /***/ (function (module, __webpack_exports__, __webpack_require__) {

        "use strict";
        __webpack_require__.r(__webpack_exports__);
        /* harmony export (binding) */
        __webpack_require__.d(__webpack_exports__, "handleShowDirective", function () {
            return handleShowDirective;
        });
        /* harmony import */
        var _utils__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../utils */ "./node_modules/alpinejs/src/utils.js");


        function handleShowDirective(component, el, value, modifiers, initialUpdate = false) {
            const handle = (resolve) => {
                if (!value) {
                    if (el.style.display !== 'none') {
                        Object(_utils__WEBPACK_IMPORTED_MODULE_0__["transitionOut"])(el, () => {
                            resolve(() => {
                                el.style.display = 'none'
                            })
                        }, initialUpdate)
                    } else {
                        resolve(() => {
                        })
                    }
                } else {
                    if (el.style.display !== '') {
                        Object(_utils__WEBPACK_IMPORTED_MODULE_0__["transitionIn"])(el, () => {
                            if (el.style.length === 1) {
                                el.removeAttribute('style')
                            } else {
                                el.style.removeProperty('display')
                            }
                        }, initialUpdate)
                    }

                    // Resolve immediately, only hold up parent `x-show`s for hidin.
                    resolve(() => {
                    })
                }
            }

            // The working of x-show is a bit complex because we need to
            // wait for any child transitions to finish before hiding
            // some element. Also, this has to be done recursively.

            // If x-show.immediate, foregoe the waiting.
            if (modifiers.includes('immediate')) {
                handle(finish => finish())
                return
            }

            // x-show is encountered during a DOM tree walk. If an element
            // we encounter is NOT a child of another x-show element we
            // can execute the previous x-show stack (if one exists).
            if (component.showDirectiveLastElement && !component.showDirectiveLastElement.contains(el)) {
                component.executeAndClearRemainingShowDirectiveStack()
            }

            // We'll push the handler onto a stack to be handled later.
            component.showDirectiveStack.push(handle)

            component.showDirectiveLastElement = el
        }


        /***/
    }),

    /***/ "./node_modules/alpinejs/src/index.js":
    /*!********************************************!*\
  !*** ./node_modules/alpinejs/src/index.js ***!
  \********************************************/
    /*! exports provided: default */
    /***/ (function (module, __webpack_exports__, __webpack_require__) {

        "use strict";
        __webpack_require__.r(__webpack_exports__);
        /* harmony import */
        var _component__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./component */ "./node_modules/alpinejs/src/component.js");
        /* harmony import */
        var _utils__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./utils */ "./node_modules/alpinejs/src/utils.js");


        const Alpine = {
            start: async function () {
                if (!Object(_utils__WEBPACK_IMPORTED_MODULE_1__["isTesting"])()) {
                    await Object(_utils__WEBPACK_IMPORTED_MODULE_1__["domReady"])()
                }

                this.discoverComponents(el => {
                    this.initializeComponent(el)
                })

                // It's easier and more performant to just support Turbolinks than listen
                // to MutationOberserver mutations at the document level.
                document.addEventListener("turbolinks:load", () => {
                    this.discoverUninitializedComponents(el => {
                        this.initializeComponent(el)
                    })
                })

                this.listenForNewUninitializedComponentsAtRunTime(el => {
                    this.initializeComponent(el)
                })
            },

            discoverComponents: function (callback) {
                const rootEls = document.querySelectorAll('[x-data]');

                rootEls.forEach(rootEl => {
                    callback(rootEl)
                })
            },

            discoverUninitializedComponents: function (callback, el = null) {
                const rootEls = (el || document).querySelectorAll('[x-data]');

                Array.from(rootEls)
                    .filter(el => el.__x === undefined)
                    .forEach(rootEl => {
                        callback(rootEl)
                    })
            },

            listenForNewUninitializedComponentsAtRunTime: function (callback) {
                const targetNode = document.querySelector('body');

                const observerOptions = {
                    childList: true,
                    attributes: true,
                    subtree: true,
                }

                const observer = new MutationObserver((mutations) => {
                    for (let i = 0; i < mutations.length; i++) {
                        if (mutations[i].addedNodes.length > 0) {
                            mutations[i].addedNodes.forEach(node => {
                                // Discard non-element nodes (like line-breaks)
                                if (node.nodeType !== 1) return

                                // Discard any changes happening within an existing component.
                                // They will take care of themselves.
                                if (node.parentElement && node.parentElement.closest('[x-data]')) return

                                this.discoverUninitializedComponents((el) => {
                                    this.initializeComponent(el)
                                }, node.parentElement)
                            })
                        }
                    }
                })

                observer.observe(targetNode, observerOptions)
            },

            initializeComponent: function (el) {
                if (!el.__x) {
                    el.__x = new _component__WEBPACK_IMPORTED_MODULE_0__["default"](el)
                }
            }
        }

        if (!Object(_utils__WEBPACK_IMPORTED_MODULE_1__["isTesting"])()) {
            window.Alpine = Alpine
            window.Alpine.start()
        }

        /* harmony default export */
        __webpack_exports__["default"] = (Alpine);


        /***/
    }),

    /***/ "./node_modules/alpinejs/src/utils.js":
    /*!********************************************!*\
  !*** ./node_modules/alpinejs/src/utils.js ***!
  \********************************************/
    /*! exports provided: domReady, arrayUnique, isTesting, kebabCase, walk, debounce, saferEval, saferEvalNoReturn, isXAttr, getXAttrs, replaceAtAndColonWithStandardSyntax, transitionIn, transitionOut, transition, deepProxy */
    /***/ (function (module, __webpack_exports__, __webpack_require__) {

        "use strict";
        __webpack_require__.r(__webpack_exports__);
        /* harmony export (binding) */
        __webpack_require__.d(__webpack_exports__, "domReady", function () {
            return domReady;
        });
        /* harmony export (binding) */
        __webpack_require__.d(__webpack_exports__, "arrayUnique", function () {
            return arrayUnique;
        });
        /* harmony export (binding) */
        __webpack_require__.d(__webpack_exports__, "isTesting", function () {
            return isTesting;
        });
        /* harmony export (binding) */
        __webpack_require__.d(__webpack_exports__, "kebabCase", function () {
            return kebabCase;
        });
        /* harmony export (binding) */
        __webpack_require__.d(__webpack_exports__, "walk", function () {
            return walk;
        });
        /* harmony export (binding) */
        __webpack_require__.d(__webpack_exports__, "debounce", function () {
            return debounce;
        });
        /* harmony export (binding) */
        __webpack_require__.d(__webpack_exports__, "saferEval", function () {
            return saferEval;
        });
        /* harmony export (binding) */
        __webpack_require__.d(__webpack_exports__, "saferEvalNoReturn", function () {
            return saferEvalNoReturn;
        });
        /* harmony export (binding) */
        __webpack_require__.d(__webpack_exports__, "isXAttr", function () {
            return isXAttr;
        });
        /* harmony export (binding) */
        __webpack_require__.d(__webpack_exports__, "getXAttrs", function () {
            return getXAttrs;
        });
        /* harmony export (binding) */
        __webpack_require__.d(__webpack_exports__, "replaceAtAndColonWithStandardSyntax", function () {
            return replaceAtAndColonWithStandardSyntax;
        });
        /* harmony export (binding) */
        __webpack_require__.d(__webpack_exports__, "transitionIn", function () {
            return transitionIn;
        });
        /* harmony export (binding) */
        __webpack_require__.d(__webpack_exports__, "transitionOut", function () {
            return transitionOut;
        });
        /* harmony export (binding) */
        __webpack_require__.d(__webpack_exports__, "transition", function () {
            return transition;
        });
        /* harmony export (binding) */
        __webpack_require__.d(__webpack_exports__, "deepProxy", function () {
            return deepProxy;
        });

// Thanks @stimulus:
// https://github.com/stimulusjs/stimulus/blob/master/packages/%40stimulus/core/src/application.ts
        function domReady() {
            return new Promise(resolve => {
                if (document.readyState == "loading") {
                    document.addEventListener("DOMContentLoaded", resolve)
                } else {
                    resolve()
                }
            })
        }

        function arrayUnique(array) {
            var a = array.concat();
            for (var i = 0; i < a.length; ++i) {
                for (var j = i + 1; j < a.length; ++j) {
                    if (a[i] === a[j])
                        a.splice(j--, 1);
                }
            }

            return a;
        }

        function isTesting() {
            return navigator.userAgent, navigator.userAgent.includes("Node.js")
            || navigator.userAgent.includes("jsdom")
        }

        function kebabCase(subject) {
            return subject.replace(/([a-z])([A-Z])/g, '$1-$2').replace(/[_\s]/, '-').toLowerCase()
        }

        function walk(el, callback) {
            if (callback(el) === false) return

            let node = el.firstElementChild

            while (node) {
                walk(node, callback)

                node = node.nextElementSibling
            }
        }

        function debounce(func, wait) {
            var timeout
            return function () {
                var context = this, args = arguments
                var later = function () {
                    timeout = null
                    func.apply(context, args)
                }
                clearTimeout(timeout)
                timeout = setTimeout(later, wait)
            }
        }

        function saferEval(expression, dataContext, additionalHelperVariables = {}) {
            return (new Function(['$data', ...Object.keys(additionalHelperVariables)], `var result; with($data) { result = ${expression} }; return result`))(
                dataContext, ...Object.values(additionalHelperVariables)
            )
        }

        function saferEvalNoReturn(expression, dataContext, additionalHelperVariables = {}) {
            return (new Function(['dataContext', ...Object.keys(additionalHelperVariables)], `with(dataContext) { ${expression} }`))(
                dataContext, ...Object.values(additionalHelperVariables)
            )
        }

        function isXAttr(attr) {
            const name = replaceAtAndColonWithStandardSyntax(attr.name)

            const xAttrRE = /x-(on|bind|data|text|html|model|if|for|show|cloak|transition|ref)/

            return xAttrRE.test(name)
        }

        function getXAttrs(el, type) {
            return Array.from(el.attributes)
                .filter(isXAttr)
                .map(attr => {
                    const name = replaceAtAndColonWithStandardSyntax(attr.name)

                    const typeMatch = name.match(/x-(on|bind|data|text|html|model|if|for|show|cloak|transition|ref)/)
                    const valueMatch = name.match(/:([a-zA-Z\-:]+)/)
                    const modifiers = name.match(/\.[^.\]]+(?=[^\]]*$)/g) || []

                    return {
                        type: typeMatch ? typeMatch[1] : null,
                        value: valueMatch ? valueMatch[1] : null,
                        modifiers: modifiers.map(i => i.replace('.', '')),
                        expression: attr.value,
                    }
                })
                .filter(i => {
                    // If no type is passed in for filtering, bypassfilter
                    if (!type) return true

                    return i.type === type
                })
        }

        function replaceAtAndColonWithStandardSyntax(name) {
            if (name.startsWith('@')) {
                return name.replace('@', 'x-on:')
            } else if (name.startsWith(':')) {
                return name.replace(':', 'x-bind:')
            }

            return name
        }

        function transitionIn(el, callback, forceSkip = false) {
            if (forceSkip) return callback()

            const attrs = getXAttrs(el, 'transition')

            if (attrs.length < 1) return callback()

            const enter = (attrs.find(i => i.value === 'enter') || {expression: ''}).expression.split(' ').filter(i => i !== '')
            const enterStart = (attrs.find(i => i.value === 'enter-start') || {expression: ''}).expression.split(' ').filter(i => i !== '')
            const enterEnd = (attrs.find(i => i.value === 'enter-end') || {expression: ''}).expression.split(' ').filter(i => i !== '')

            transition(el, enter, enterStart, enterEnd, callback, () => {
            })
        }

        function transitionOut(el, callback, forceSkip = false) {
            if (forceSkip) return callback()

            const attrs = getXAttrs(el, 'transition')

            if (attrs.length < 1) return callback()

            const leave = (attrs.find(i => i.value === 'leave') || {expression: ''}).expression.split(' ').filter(i => i !== '')
            const leaveStart = (attrs.find(i => i.value === 'leave-start') || {expression: ''}).expression.split(' ').filter(i => i !== '')
            const leaveEnd = (attrs.find(i => i.value === 'leave-end') || {expression: ''}).expression.split(' ').filter(i => i !== '')

            transition(el, leave, leaveStart, leaveEnd, () => {
            }, callback)
        }

        function transition(el, classesDuring, classesStart, classesEnd, hook1, hook2) {
            const originalClasses = el.__x_original_classes || []
            el.classList.add(...classesStart)
            el.classList.add(...classesDuring)

            requestAnimationFrame(() => {
                const duration = Number(getComputedStyle(el).transitionDuration.replace('s', '')) * 1000

                hook1()

                requestAnimationFrame(() => {
                    // Don't remove classes that were in the original class attribute.
                    el.classList.remove(...classesStart.filter(i => !originalClasses.includes(i)))
                    el.classList.add(...classesEnd)

                    setTimeout(() => {
                        hook2()

                        // Adding an "isConnected" check, in case the callback
                        // removed the element from the DOM.
                        if (el.isConnected) {
                            el.classList.remove(...classesDuring.filter(i => !originalClasses.includes(i)))
                            el.classList.remove(...classesEnd.filter(i => !originalClasses.includes(i)))
                        }
                    }, duration);
                })
            });
        }

        function deepProxy(target, proxyHandler) {
            // If target is null, return it.
            if (target === null) return target;

            // If target is not an object, return it.
            if (typeof target !== 'object') return target;

            // If target is a DOM node (like in the case of this.$el), return it.
            if (target instanceof Node) return target

            // If target is already an Alpine proxy, return it.
            if (target['$isAlpineProxy']) return target;

            // Otherwise proxy the properties recursively.
            // This enables reactivity on setting nested data.
            // Note that if a project is not a valid object, it won't be converted to a proxy
            for (let property in target) {
                target[property] = deepProxy(target[property], proxyHandler)
            }

            return new Proxy(target, proxyHandler)
        }


        /***/
    }),

    /***/ "./node_modules/turbolinks/dist/turbolinks.js":
    /*!****************************************************!*\
  !*** ./node_modules/turbolinks/dist/turbolinks.js ***!
  \****************************************************/
    /*! no static exports found */
    /***/ (function (module, exports, __webpack_require__) {

        var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_RESULT__;/*
Turbolinks 5.2.0
Copyright © 2018 Basecamp, LLC
 */
        (function () {
            var t = this;
            (function () {
                (function () {
                    this.Turbolinks = {
                        supported: function () {
                            return null != window.history.pushState && null != window.requestAnimationFrame && null != window.addEventListener
                        }(), visit: function (t, r) {
                            return e.controller.visit(t, r)
                        }, clearCache: function () {
                            return e.controller.clearCache()
                        }, setProgressBarDelay: function (t) {
                            return e.controller.setProgressBarDelay(t)
                        }
                    }
                }).call(this)
            }).call(t);
            var e = t.Turbolinks;
            (function () {
                (function () {
                    var t, r, n, o = [].slice;
                    e.copyObject = function (t) {
                        var e, r, n;
                        r = {};
                        for (e in t) n = t[e], r[e] = n;
                        return r
                    }, e.closest = function (e, r) {
                        return t.call(e, r)
                    }, t = function () {
                        var t, e;
                        return t = document.documentElement, null != (e = t.closest) ? e : function (t) {
                            var e;
                            for (e = this; e;) {
                                if (e.nodeType === Node.ELEMENT_NODE && r.call(e, t)) return e;
                                e = e.parentNode
                            }
                        }
                    }(), e.defer = function (t) {
                        return setTimeout(t, 1)
                    }, e.throttle = function (t) {
                        var e;
                        return e = null, function () {
                            var r;
                            return r = 1 <= arguments.length ? o.call(arguments, 0) : [], null != e ? e : e = requestAnimationFrame(function (n) {
                                return function () {
                                    return e = null, t.apply(n, r)
                                }
                            }(this))
                        }
                    }, e.dispatch = function (t, e) {
                        var r, o, i, s, a, u;
                        return a = null != e ? e : {}, u = a.target, r = a.cancelable, o = a.data, i = document.createEvent("Events"), i.initEvent(t, !0, r === !0), i.data = null != o ? o : {}, i.cancelable && !n && (s = i.preventDefault, i.preventDefault = function () {
                            return this.defaultPrevented || Object.defineProperty(this, "defaultPrevented", {
                                get: function () {
                                    return !0
                                }
                            }), s.call(this)
                        }), (null != u ? u : document).dispatchEvent(i), i
                    }, n = function () {
                        var t;
                        return t = document.createEvent("Events"), t.initEvent("test", !0, !0), t.preventDefault(), t.defaultPrevented
                    }(), e.match = function (t, e) {
                        return r.call(t, e)
                    }, r = function () {
                        var t, e, r, n;
                        return t = document.documentElement, null != (e = null != (r = null != (n = t.matchesSelector) ? n : t.webkitMatchesSelector) ? r : t.msMatchesSelector) ? e : t.mozMatchesSelector
                    }(), e.uuid = function () {
                        var t, e, r;
                        for (r = "", t = e = 1; 36 >= e; t = ++e) r += 9 === t || 14 === t || 19 === t || 24 === t ? "-" : 15 === t ? "4" : 20 === t ? (Math.floor(4 * Math.random()) + 8).toString(16) : Math.floor(15 * Math.random()).toString(16);
                        return r
                    }
                }).call(this), function () {
                    e.Location = function () {
                        function t(t) {
                            var e, r;
                            null == t && (t = ""), r = document.createElement("a"), r.href = t.toString(), this.absoluteURL = r.href, e = r.hash.length, 2 > e ? this.requestURL = this.absoluteURL : (this.requestURL = this.absoluteURL.slice(0, -e), this.anchor = r.hash.slice(1))
                        }

                        var e, r, n, o;
                        return t.wrap = function (t) {
                            return t instanceof this ? t : new this(t)
                        }, t.prototype.getOrigin = function () {
                            return this.absoluteURL.split("/", 3).join("/")
                        }, t.prototype.getPath = function () {
                            var t, e;
                            return null != (t = null != (e = this.requestURL.match(/\/\/[^\/]*(\/[^?;]*)/)) ? e[1] : void 0) ? t : "/"
                        }, t.prototype.getPathComponents = function () {
                            return this.getPath().split("/").slice(1)
                        }, t.prototype.getLastPathComponent = function () {
                            return this.getPathComponents().slice(-1)[0]
                        }, t.prototype.getExtension = function () {
                            var t, e;
                            return null != (t = null != (e = this.getLastPathComponent().match(/\.[^.]*$/)) ? e[0] : void 0) ? t : ""
                        }, t.prototype.isHTML = function () {
                            return this.getExtension().match(/^(?:|\.(?:htm|html|xhtml))$/)
                        }, t.prototype.isPrefixedBy = function (t) {
                            var e;
                            return e = r(t), this.isEqualTo(t) || o(this.absoluteURL, e)
                        }, t.prototype.isEqualTo = function (t) {
                            return this.absoluteURL === (null != t ? t.absoluteURL : void 0)
                        }, t.prototype.toCacheKey = function () {
                            return this.requestURL
                        }, t.prototype.toJSON = function () {
                            return this.absoluteURL
                        }, t.prototype.toString = function () {
                            return this.absoluteURL
                        }, t.prototype.valueOf = function () {
                            return this.absoluteURL
                        }, r = function (t) {
                            return e(t.getOrigin() + t.getPath())
                        }, e = function (t) {
                            return n(t, "/") ? t : t + "/"
                        }, o = function (t, e) {
                            return t.slice(0, e.length) === e
                        }, n = function (t, e) {
                            return t.slice(-e.length) === e
                        }, t
                    }()
                }.call(this), function () {
                    var t = function (t, e) {
                        return function () {
                            return t.apply(e, arguments)
                        }
                    };
                    e.HttpRequest = function () {
                        function r(r, n, o) {
                            this.delegate = r, this.requestCanceled = t(this.requestCanceled, this), this.requestTimedOut = t(this.requestTimedOut, this), this.requestFailed = t(this.requestFailed, this), this.requestLoaded = t(this.requestLoaded, this), this.requestProgressed = t(this.requestProgressed, this), this.url = e.Location.wrap(n).requestURL, this.referrer = e.Location.wrap(o).absoluteURL, this.createXHR()
                        }

                        return r.NETWORK_FAILURE = 0, r.TIMEOUT_FAILURE = -1, r.timeout = 60, r.prototype.send = function () {
                            var t;
                            return this.xhr && !this.sent ? (this.notifyApplicationBeforeRequestStart(), this.setProgress(0), this.xhr.send(), this.sent = !0, "function" == typeof (t = this.delegate).requestStarted ? t.requestStarted() : void 0) : void 0
                        }, r.prototype.cancel = function () {
                            return this.xhr && this.sent ? this.xhr.abort() : void 0
                        }, r.prototype.requestProgressed = function (t) {
                            return t.lengthComputable ? this.setProgress(t.loaded / t.total) : void 0
                        }, r.prototype.requestLoaded = function () {
                            return this.endRequest(function (t) {
                                return function () {
                                    var e;
                                    return 200 <= (e = t.xhr.status) && 300 > e ? t.delegate.requestCompletedWithResponse(t.xhr.responseText, t.xhr.getResponseHeader("Turbolinks-Location")) : (t.failed = !0, t.delegate.requestFailedWithStatusCode(t.xhr.status, t.xhr.responseText))
                                }
                            }(this))
                        }, r.prototype.requestFailed = function () {
                            return this.endRequest(function (t) {
                                return function () {
                                    return t.failed = !0, t.delegate.requestFailedWithStatusCode(t.constructor.NETWORK_FAILURE)
                                }
                            }(this))
                        }, r.prototype.requestTimedOut = function () {
                            return this.endRequest(function (t) {
                                return function () {
                                    return t.failed = !0, t.delegate.requestFailedWithStatusCode(t.constructor.TIMEOUT_FAILURE)
                                }
                            }(this))
                        }, r.prototype.requestCanceled = function () {
                            return this.endRequest()
                        }, r.prototype.notifyApplicationBeforeRequestStart = function () {
                            return e.dispatch("turbolinks:request-start", {data: {url: this.url, xhr: this.xhr}})
                        }, r.prototype.notifyApplicationAfterRequestEnd = function () {
                            return e.dispatch("turbolinks:request-end", {data: {url: this.url, xhr: this.xhr}})
                        }, r.prototype.createXHR = function () {
                            return this.xhr = new XMLHttpRequest, this.xhr.open("GET", this.url, !0), this.xhr.timeout = 1e3 * this.constructor.timeout, this.xhr.setRequestHeader("Accept", "text/html, application/xhtml+xml"), this.xhr.setRequestHeader("Turbolinks-Referrer", this.referrer), this.xhr.onprogress = this.requestProgressed, this.xhr.onload = this.requestLoaded, this.xhr.onerror = this.requestFailed, this.xhr.ontimeout = this.requestTimedOut, this.xhr.onabort = this.requestCanceled
                        }, r.prototype.endRequest = function (t) {
                            return this.xhr ? (this.notifyApplicationAfterRequestEnd(), null != t && t.call(this), this.destroy()) : void 0
                        }, r.prototype.setProgress = function (t) {
                            var e;
                            return this.progress = t, "function" == typeof (e = this.delegate).requestProgressed ? e.requestProgressed(this.progress) : void 0
                        }, r.prototype.destroy = function () {
                            var t;
                            return this.setProgress(1), "function" == typeof (t = this.delegate).requestFinished && t.requestFinished(), this.delegate = null, this.xhr = null
                        }, r
                    }()
                }.call(this), function () {
                    var t = function (t, e) {
                        return function () {
                            return t.apply(e, arguments)
                        }
                    };
                    e.ProgressBar = function () {
                        function e() {
                            this.trickle = t(this.trickle, this), this.stylesheetElement = this.createStylesheetElement(), this.progressElement = this.createProgressElement()
                        }

                        var r;
                        return r = 300, e.defaultCSS = ".turbolinks-progress-bar {\n  position: fixed;\n  display: block;\n  top: 0;\n  left: 0;\n  height: 3px;\n  background: #0076ff;\n  z-index: 9999;\n  transition: width " + r + "ms ease-out, opacity " + r / 2 + "ms " + r / 2 + "ms ease-in;\n  transform: translate3d(0, 0, 0);\n}", e.prototype.show = function () {
                            return this.visible ? void 0 : (this.visible = !0, this.installStylesheetElement(), this.installProgressElement(), this.startTrickling())
                        }, e.prototype.hide = function () {
                            return this.visible && !this.hiding ? (this.hiding = !0, this.fadeProgressElement(function (t) {
                                return function () {
                                    return t.uninstallProgressElement(), t.stopTrickling(), t.visible = !1, t.hiding = !1
                                }
                            }(this))) : void 0
                        }, e.prototype.setValue = function (t) {
                            return this.value = t, this.refresh()
                        }, e.prototype.installStylesheetElement = function () {
                            return document.head.insertBefore(this.stylesheetElement, document.head.firstChild)
                        }, e.prototype.installProgressElement = function () {
                            return this.progressElement.style.width = 0, this.progressElement.style.opacity = 1, document.documentElement.insertBefore(this.progressElement, document.body), this.refresh()
                        }, e.prototype.fadeProgressElement = function (t) {
                            return this.progressElement.style.opacity = 0, setTimeout(t, 1.5 * r)
                        }, e.prototype.uninstallProgressElement = function () {
                            return this.progressElement.parentNode ? document.documentElement.removeChild(this.progressElement) : void 0
                        }, e.prototype.startTrickling = function () {
                            return null != this.trickleInterval ? this.trickleInterval : this.trickleInterval = setInterval(this.trickle, r)
                        }, e.prototype.stopTrickling = function () {
                            return clearInterval(this.trickleInterval), this.trickleInterval = null
                        }, e.prototype.trickle = function () {
                            return this.setValue(this.value + Math.random() / 100)
                        }, e.prototype.refresh = function () {
                            return requestAnimationFrame(function (t) {
                                return function () {
                                    return t.progressElement.style.width = 10 + 90 * t.value + "%"
                                }
                            }(this))
                        }, e.prototype.createStylesheetElement = function () {
                            var t;
                            return t = document.createElement("style"), t.type = "text/css", t.textContent = this.constructor.defaultCSS, t
                        }, e.prototype.createProgressElement = function () {
                            var t;
                            return t = document.createElement("div"), t.className = "turbolinks-progress-bar", t
                        }, e
                    }()
                }.call(this), function () {
                    var t = function (t, e) {
                        return function () {
                            return t.apply(e, arguments)
                        }
                    };
                    e.BrowserAdapter = function () {
                        function r(r) {
                            this.controller = r, this.showProgressBar = t(this.showProgressBar, this), this.progressBar = new e.ProgressBar
                        }

                        var n, o, i;
                        return i = e.HttpRequest, n = i.NETWORK_FAILURE, o = i.TIMEOUT_FAILURE, r.prototype.visitProposedToLocationWithAction = function (t, e) {
                            return this.controller.startVisitToLocationWithAction(t, e)
                        }, r.prototype.visitStarted = function (t) {
                            return t.issueRequest(), t.changeHistory(), t.loadCachedSnapshot()
                        }, r.prototype.visitRequestStarted = function (t) {
                            return this.progressBar.setValue(0), t.hasCachedSnapshot() || "restore" !== t.action ? this.showProgressBarAfterDelay() : this.showProgressBar()
                        }, r.prototype.visitRequestProgressed = function (t) {
                            return this.progressBar.setValue(t.progress)
                        }, r.prototype.visitRequestCompleted = function (t) {
                            return t.loadResponse()
                        }, r.prototype.visitRequestFailedWithStatusCode = function (t, e) {
                            switch (e) {
                                case n:
                                case o:
                                    return this.reload();
                                default:
                                    return t.loadResponse()
                            }
                        }, r.prototype.visitRequestFinished = function (t) {
                            return this.hideProgressBar()
                        }, r.prototype.visitCompleted = function (t) {
                            return t.followRedirect()
                        }, r.prototype.pageInvalidated = function () {
                            return this.reload()
                        }, r.prototype.showProgressBarAfterDelay = function () {
                            return this.progressBarTimeout = setTimeout(this.showProgressBar, this.controller.progressBarDelay)
                        }, r.prototype.showProgressBar = function () {
                            return this.progressBar.show()
                        }, r.prototype.hideProgressBar = function () {
                            return this.progressBar.hide(), clearTimeout(this.progressBarTimeout)
                        }, r.prototype.reload = function () {
                            return window.location.reload()
                        }, r
                    }()
                }.call(this), function () {
                    var t = function (t, e) {
                        return function () {
                            return t.apply(e, arguments)
                        }
                    };
                    e.History = function () {
                        function r(e) {
                            this.delegate = e, this.onPageLoad = t(this.onPageLoad, this), this.onPopState = t(this.onPopState, this)
                        }

                        return r.prototype.start = function () {
                            return this.started ? void 0 : (addEventListener("popstate", this.onPopState, !1), addEventListener("load", this.onPageLoad, !1), this.started = !0)
                        }, r.prototype.stop = function () {
                            return this.started ? (removeEventListener("popstate", this.onPopState, !1), removeEventListener("load", this.onPageLoad, !1), this.started = !1) : void 0
                        }, r.prototype.push = function (t, r) {
                            return t = e.Location.wrap(t), this.update("push", t, r)
                        }, r.prototype.replace = function (t, r) {
                            return t = e.Location.wrap(t), this.update("replace", t, r)
                        }, r.prototype.onPopState = function (t) {
                            var r, n, o, i;
                            return this.shouldHandlePopState() && (i = null != (n = t.state) ? n.turbolinks : void 0) ? (r = e.Location.wrap(window.location), o = i.restorationIdentifier, this.delegate.historyPoppedToLocationWithRestorationIdentifier(r, o)) : void 0
                        }, r.prototype.onPageLoad = function (t) {
                            return e.defer(function (t) {
                                return function () {
                                    return t.pageLoaded = !0
                                }
                            }(this))
                        }, r.prototype.shouldHandlePopState = function () {
                            return this.pageIsLoaded()
                        }, r.prototype.pageIsLoaded = function () {
                            return this.pageLoaded || "complete" === document.readyState
                        }, r.prototype.update = function (t, e, r) {
                            var n;
                            return n = {turbolinks: {restorationIdentifier: r}}, history[t + "State"](n, null, e)
                        }, r
                    }()
                }.call(this), function () {
                    e.HeadDetails = function () {
                        function t(t) {
                            var e, r, n, s, a, u;
                            for (this.elements = {}, n = 0, a = t.length; a > n; n++) u = t[n], u.nodeType === Node.ELEMENT_NODE && (s = u.outerHTML, r = null != (e = this.elements)[s] ? e[s] : e[s] = {
                                type: i(u),
                                tracked: o(u),
                                elements: []
                            }, r.elements.push(u))
                        }

                        var e, r, n, o, i;
                        return t.fromHeadElement = function (t) {
                            var e;
                            return new this(null != (e = null != t ? t.childNodes : void 0) ? e : [])
                        }, t.prototype.hasElementWithKey = function (t) {
                            return t in this.elements
                        }, t.prototype.getTrackedElementSignature = function () {
                            var t, e;
                            return function () {
                                var r, n;
                                r = this.elements, n = [];
                                for (t in r) e = r[t].tracked, e && n.push(t);
                                return n
                            }.call(this).join("")
                        }, t.prototype.getScriptElementsNotInDetails = function (t) {
                            return this.getElementsMatchingTypeNotInDetails("script", t)
                        }, t.prototype.getStylesheetElementsNotInDetails = function (t) {
                            return this.getElementsMatchingTypeNotInDetails("stylesheet", t)
                        }, t.prototype.getElementsMatchingTypeNotInDetails = function (t, e) {
                            var r, n, o, i, s, a;
                            o = this.elements, s = [];
                            for (n in o) i = o[n], a = i.type, r = i.elements, a !== t || e.hasElementWithKey(n) || s.push(r[0]);
                            return s
                        }, t.prototype.getProvisionalElements = function () {
                            var t, e, r, n, o, i, s;
                            r = [], n = this.elements;
                            for (e in n) o = n[e], s = o.type, i = o.tracked, t = o.elements, null != s || i ? t.length > 1 && r.push.apply(r, t.slice(1)) : r.push.apply(r, t);
                            return r
                        }, t.prototype.getMetaValue = function (t) {
                            var e;
                            return null != (e = this.findMetaElementByName(t)) ? e.getAttribute("content") : void 0
                        }, t.prototype.findMetaElementByName = function (t) {
                            var r, n, o, i;
                            r = void 0, i = this.elements;
                            for (o in i) n = i[o].elements, e(n[0], t) && (r = n[0]);
                            return r
                        }, i = function (t) {
                            return r(t) ? "script" : n(t) ? "stylesheet" : void 0
                        }, o = function (t) {
                            return "reload" === t.getAttribute("data-turbolinks-track")
                        }, r = function (t) {
                            var e;
                            return e = t.tagName.toLowerCase(), "script" === e
                        }, n = function (t) {
                            var e;
                            return e = t.tagName.toLowerCase(), "style" === e || "link" === e && "stylesheet" === t.getAttribute("rel")
                        }, e = function (t, e) {
                            var r;
                            return r = t.tagName.toLowerCase(), "meta" === r && t.getAttribute("name") === e
                        }, t
                    }()
                }.call(this), function () {
                    e.Snapshot = function () {
                        function t(t, e) {
                            this.headDetails = t, this.bodyElement = e
                        }

                        return t.wrap = function (t) {
                            return t instanceof this ? t : "string" == typeof t ? this.fromHTMLString(t) : this.fromHTMLElement(t)
                        }, t.fromHTMLString = function (t) {
                            var e;
                            return e = document.createElement("html"), e.innerHTML = t, this.fromHTMLElement(e)
                        }, t.fromHTMLElement = function (t) {
                            var r, n, o, i;
                            return o = t.querySelector("head"), r = null != (i = t.querySelector("body")) ? i : document.createElement("body"), n = e.HeadDetails.fromHeadElement(o), new this(n, r)
                        }, t.prototype.clone = function () {
                            return new this.constructor(this.headDetails, this.bodyElement.cloneNode(!0))
                        }, t.prototype.getRootLocation = function () {
                            var t, r;
                            return r = null != (t = this.getSetting("root")) ? t : "/", new e.Location(r)
                        }, t.prototype.getCacheControlValue = function () {
                            return this.getSetting("cache-control")
                        }, t.prototype.getElementForAnchor = function (t) {
                            try {
                                return this.bodyElement.querySelector("[id='" + t + "'], a[name='" + t + "']")
                            } catch (e) {
                            }
                        }, t.prototype.getPermanentElements = function () {
                            return this.bodyElement.querySelectorAll("[id][data-turbolinks-permanent]")
                        }, t.prototype.getPermanentElementById = function (t) {
                            return this.bodyElement.querySelector("#" + t + "[data-turbolinks-permanent]")
                        }, t.prototype.getPermanentElementsPresentInSnapshot = function (t) {
                            var e, r, n, o, i;
                            for (o = this.getPermanentElements(), i = [], r = 0, n = o.length; n > r; r++) e = o[r], t.getPermanentElementById(e.id) && i.push(e);
                            return i
                        }, t.prototype.findFirstAutofocusableElement = function () {
                            return this.bodyElement.querySelector("[autofocus]")
                        }, t.prototype.hasAnchor = function (t) {
                            return null != this.getElementForAnchor(t)
                        }, t.prototype.isPreviewable = function () {
                            return "no-preview" !== this.getCacheControlValue()
                        }, t.prototype.isCacheable = function () {
                            return "no-cache" !== this.getCacheControlValue()
                        }, t.prototype.isVisitable = function () {
                            return "reload" !== this.getSetting("visit-control")
                        }, t.prototype.getSetting = function (t) {
                            return this.headDetails.getMetaValue("turbolinks-" + t)
                        }, t
                    }()
                }.call(this), function () {
                    var t = [].slice;
                    e.Renderer = function () {
                        function e() {
                        }

                        var r;
                        return e.render = function () {
                            var e, r, n, o;
                            return n = arguments[0], r = arguments[1], e = 3 <= arguments.length ? t.call(arguments, 2) : [], o = function (t, e, r) {
                                r.prototype = t.prototype;
                                var n = new r, o = t.apply(n, e);
                                return Object(o) === o ? o : n
                            }(this, e, function () {
                            }), o.delegate = n, o.render(r), o
                        }, e.prototype.renderView = function (t) {
                            return this.delegate.viewWillRender(this.newBody), t(), this.delegate.viewRendered(this.newBody)
                        }, e.prototype.invalidateView = function () {
                            return this.delegate.viewInvalidated()
                        }, e.prototype.createScriptElement = function (t) {
                            var e;
                            return "false" === t.getAttribute("data-turbolinks-eval") ? t : (e = document.createElement("script"), e.textContent = t.textContent, e.async = !1, r(e, t), e)
                        }, r = function (t, e) {
                            var r, n, o, i, s, a, u;
                            for (i = e.attributes, a = [], r = 0, n = i.length; n > r; r++) s = i[r], o = s.name, u = s.value, a.push(t.setAttribute(o, u));
                            return a
                        }, e
                    }()
                }.call(this), function () {
                    var t, r, n = function (t, e) {
                        function r() {
                            this.constructor = t
                        }

                        for (var n in e) o.call(e, n) && (t[n] = e[n]);
                        return r.prototype = e.prototype, t.prototype = new r, t.__super__ = e.prototype, t
                    }, o = {}.hasOwnProperty;
                    e.SnapshotRenderer = function (e) {
                        function o(t, e, r) {
                            this.currentSnapshot = t, this.newSnapshot = e, this.isPreview = r, this.currentHeadDetails = this.currentSnapshot.headDetails, this.newHeadDetails = this.newSnapshot.headDetails, this.currentBody = this.currentSnapshot.bodyElement, this.newBody = this.newSnapshot.bodyElement
                        }

                        return n(o, e), o.prototype.render = function (t) {
                            return this.shouldRender() ? (this.mergeHead(), this.renderView(function (e) {
                                return function () {
                                    return e.replaceBody(), e.isPreview || e.focusFirstAutofocusableElement(), t()
                                }
                            }(this))) : this.invalidateView()
                        }, o.prototype.mergeHead = function () {
                            return this.copyNewHeadStylesheetElements(), this.copyNewHeadScriptElements(), this.removeCurrentHeadProvisionalElements(), this.copyNewHeadProvisionalElements()
                        }, o.prototype.replaceBody = function () {
                            var t;
                            return t = this.relocateCurrentBodyPermanentElements(), this.activateNewBodyScriptElements(), this.assignNewBody(), this.replacePlaceholderElementsWithClonedPermanentElements(t)
                        }, o.prototype.shouldRender = function () {
                            return this.newSnapshot.isVisitable() && this.trackedElementsAreIdentical()
                        }, o.prototype.trackedElementsAreIdentical = function () {
                            return this.currentHeadDetails.getTrackedElementSignature() === this.newHeadDetails.getTrackedElementSignature()
                        }, o.prototype.copyNewHeadStylesheetElements = function () {
                            var t, e, r, n, o;
                            for (n = this.getNewHeadStylesheetElements(), o = [], e = 0, r = n.length; r > e; e++) t = n[e], o.push(document.head.appendChild(t));
                            return o
                        }, o.prototype.copyNewHeadScriptElements = function () {
                            var t, e, r, n, o;
                            for (n = this.getNewHeadScriptElements(), o = [], e = 0, r = n.length; r > e; e++) t = n[e], o.push(document.head.appendChild(this.createScriptElement(t)));
                            return o
                        }, o.prototype.removeCurrentHeadProvisionalElements = function () {
                            var t, e, r, n, o;
                            for (n = this.getCurrentHeadProvisionalElements(), o = [], e = 0, r = n.length; r > e; e++) t = n[e], o.push(document.head.removeChild(t));
                            return o
                        }, o.prototype.copyNewHeadProvisionalElements = function () {
                            var t, e, r, n, o;
                            for (n = this.getNewHeadProvisionalElements(), o = [], e = 0, r = n.length; r > e; e++) t = n[e], o.push(document.head.appendChild(t));
                            return o
                        }, o.prototype.relocateCurrentBodyPermanentElements = function () {
                            var e, n, o, i, s, a, u;
                            for (a = this.getCurrentBodyPermanentElements(), u = [], e = 0, n = a.length; n > e; e++) i = a[e], s = t(i), o = this.newSnapshot.getPermanentElementById(i.id), r(i, s.element), r(o, i), u.push(s);
                            return u
                        }, o.prototype.replacePlaceholderElementsWithClonedPermanentElements = function (t) {
                            var e, n, o, i, s, a, u;
                            for (u = [], o = 0, i = t.length; i > o; o++) a = t[o], n = a.element, s = a.permanentElement, e = s.cloneNode(!0), u.push(r(n, e));
                            return u
                        }, o.prototype.activateNewBodyScriptElements = function () {
                            var t, e, n, o, i, s;
                            for (i = this.getNewBodyScriptElements(), s = [], e = 0, o = i.length; o > e; e++) n = i[e], t = this.createScriptElement(n), s.push(r(n, t));
                            return s
                        }, o.prototype.assignNewBody = function () {
                            return document.body = this.newBody
                        }, o.prototype.focusFirstAutofocusableElement = function () {
                            var t;
                            return null != (t = this.newSnapshot.findFirstAutofocusableElement()) ? t.focus() : void 0
                        }, o.prototype.getNewHeadStylesheetElements = function () {
                            return this.newHeadDetails.getStylesheetElementsNotInDetails(this.currentHeadDetails)
                        }, o.prototype.getNewHeadScriptElements = function () {
                            return this.newHeadDetails.getScriptElementsNotInDetails(this.currentHeadDetails)
                        }, o.prototype.getCurrentHeadProvisionalElements = function () {
                            return this.currentHeadDetails.getProvisionalElements()
                        }, o.prototype.getNewHeadProvisionalElements = function () {
                            return this.newHeadDetails.getProvisionalElements()
                        }, o.prototype.getCurrentBodyPermanentElements = function () {
                            return this.currentSnapshot.getPermanentElementsPresentInSnapshot(this.newSnapshot)
                        }, o.prototype.getNewBodyScriptElements = function () {
                            return this.newBody.querySelectorAll("script")
                        }, o
                    }(e.Renderer), t = function (t) {
                        var e;
                        return e = document.createElement("meta"), e.setAttribute("name", "turbolinks-permanent-placeholder"), e.setAttribute("content", t.id), {
                            element: e,
                            permanentElement: t
                        }
                    }, r = function (t, e) {
                        var r;
                        return (r = t.parentNode) ? r.replaceChild(e, t) : void 0
                    }
                }.call(this), function () {
                    var t = function (t, e) {
                        function n() {
                            this.constructor = t
                        }

                        for (var o in e) r.call(e, o) && (t[o] = e[o]);
                        return n.prototype = e.prototype, t.prototype = new n, t.__super__ = e.prototype, t
                    }, r = {}.hasOwnProperty;
                    e.ErrorRenderer = function (e) {
                        function r(t) {
                            var e;
                            e = document.createElement("html"), e.innerHTML = t, this.newHead = e.querySelector("head"), this.newBody = e.querySelector("body")
                        }

                        return t(r, e), r.prototype.render = function (t) {
                            return this.renderView(function (e) {
                                return function () {
                                    return e.replaceHeadAndBody(), e.activateBodyScriptElements(), t()
                                }
                            }(this))
                        }, r.prototype.replaceHeadAndBody = function () {
                            var t, e;
                            return e = document.head, t = document.body, e.parentNode.replaceChild(this.newHead, e), t.parentNode.replaceChild(this.newBody, t)
                        }, r.prototype.activateBodyScriptElements = function () {
                            var t, e, r, n, o, i;
                            for (n = this.getScriptElements(), i = [], e = 0, r = n.length; r > e; e++) o = n[e], t = this.createScriptElement(o), i.push(o.parentNode.replaceChild(t, o));
                            return i
                        }, r.prototype.getScriptElements = function () {
                            return document.documentElement.querySelectorAll("script")
                        }, r
                    }(e.Renderer)
                }.call(this), function () {
                    e.View = function () {
                        function t(t) {
                            this.delegate = t, this.htmlElement = document.documentElement
                        }

                        return t.prototype.getRootLocation = function () {
                            return this.getSnapshot().getRootLocation()
                        }, t.prototype.getElementForAnchor = function (t) {
                            return this.getSnapshot().getElementForAnchor(t)
                        }, t.prototype.getSnapshot = function () {
                            return e.Snapshot.fromHTMLElement(this.htmlElement)
                        }, t.prototype.render = function (t, e) {
                            var r, n, o;
                            return o = t.snapshot, r = t.error, n = t.isPreview, this.markAsPreview(n), null != o ? this.renderSnapshot(o, n, e) : this.renderError(r, e)
                        }, t.prototype.markAsPreview = function (t) {
                            return t ? this.htmlElement.setAttribute("data-turbolinks-preview", "") : this.htmlElement.removeAttribute("data-turbolinks-preview")
                        }, t.prototype.renderSnapshot = function (t, r, n) {
                            return e.SnapshotRenderer.render(this.delegate, n, this.getSnapshot(), e.Snapshot.wrap(t), r)
                        }, t.prototype.renderError = function (t, r) {
                            return e.ErrorRenderer.render(this.delegate, r, t)
                        }, t
                    }()
                }.call(this), function () {
                    var t = function (t, e) {
                        return function () {
                            return t.apply(e, arguments)
                        }
                    };
                    e.ScrollManager = function () {
                        function r(r) {
                            this.delegate = r, this.onScroll = t(this.onScroll, this), this.onScroll = e.throttle(this.onScroll)
                        }

                        return r.prototype.start = function () {
                            return this.started ? void 0 : (addEventListener("scroll", this.onScroll, !1), this.onScroll(), this.started = !0)
                        }, r.prototype.stop = function () {
                            return this.started ? (removeEventListener("scroll", this.onScroll, !1), this.started = !1) : void 0
                        }, r.prototype.scrollToElement = function (t) {
                            return t.scrollIntoView()
                        }, r.prototype.scrollToPosition = function (t) {
                            var e, r;
                            return e = t.x, r = t.y, window.scrollTo(e, r)
                        }, r.prototype.onScroll = function (t) {
                            return this.updatePosition({x: window.pageXOffset, y: window.pageYOffset})
                        }, r.prototype.updatePosition = function (t) {
                            var e;
                            return this.position = t, null != (e = this.delegate) ? e.scrollPositionChanged(this.position) : void 0
                        }, r
                    }()
                }.call(this), function () {
                    e.SnapshotCache = function () {
                        function t(t) {
                            this.size = t, this.keys = [], this.snapshots = {}
                        }

                        var r;
                        return t.prototype.has = function (t) {
                            var e;
                            return e = r(t), e in this.snapshots
                        }, t.prototype.get = function (t) {
                            var e;
                            if (this.has(t)) return e = this.read(t), this.touch(t), e
                        }, t.prototype.put = function (t, e) {
                            return this.write(t, e), this.touch(t), e
                        }, t.prototype.read = function (t) {
                            var e;
                            return e = r(t), this.snapshots[e]
                        }, t.prototype.write = function (t, e) {
                            var n;
                            return n = r(t), this.snapshots[n] = e
                        }, t.prototype.touch = function (t) {
                            var e, n;
                            return n = r(t), e = this.keys.indexOf(n), e > -1 && this.keys.splice(e, 1), this.keys.unshift(n), this.trim()
                        }, t.prototype.trim = function () {
                            var t, e, r, n, o;
                            for (n = this.keys.splice(this.size), o = [], t = 0, r = n.length; r > t; t++) e = n[t], o.push(delete this.snapshots[e]);
                            return o
                        }, r = function (t) {
                            return e.Location.wrap(t).toCacheKey()
                        }, t
                    }()
                }.call(this), function () {
                    var t = function (t, e) {
                        return function () {
                            return t.apply(e, arguments)
                        }
                    };
                    e.Visit = function () {
                        function r(r, n, o) {
                            this.controller = r, this.action = o, this.performScroll = t(this.performScroll, this), this.identifier = e.uuid(), this.location = e.Location.wrap(n), this.adapter = this.controller.adapter, this.state = "initialized", this.timingMetrics = {}
                        }

                        var n;
                        return r.prototype.start = function () {
                            return "initialized" === this.state ? (this.recordTimingMetric("visitStart"), this.state = "started", this.adapter.visitStarted(this)) : void 0
                        }, r.prototype.cancel = function () {
                            var t;
                            return "started" === this.state ? (null != (t = this.request) && t.cancel(), this.cancelRender(), this.state = "canceled") : void 0
                        }, r.prototype.complete = function () {
                            var t;
                            return "started" === this.state ? (this.recordTimingMetric("visitEnd"), this.state = "completed", "function" == typeof (t = this.adapter).visitCompleted && t.visitCompleted(this), this.controller.visitCompleted(this)) : void 0
                        }, r.prototype.fail = function () {
                            var t;
                            return "started" === this.state ? (this.state = "failed", "function" == typeof (t = this.adapter).visitFailed ? t.visitFailed(this) : void 0) : void 0
                        }, r.prototype.changeHistory = function () {
                            var t, e;
                            return this.historyChanged ? void 0 : (t = this.location.isEqualTo(this.referrer) ? "replace" : this.action, e = n(t), this.controller[e](this.location, this.restorationIdentifier), this.historyChanged = !0)
                        }, r.prototype.issueRequest = function () {
                            return this.shouldIssueRequest() && null == this.request ? (this.progress = 0, this.request = new e.HttpRequest(this, this.location, this.referrer), this.request.send()) : void 0
                        }, r.prototype.getCachedSnapshot = function () {
                            var t;
                            return !(t = this.controller.getCachedSnapshotForLocation(this.location)) || null != this.location.anchor && !t.hasAnchor(this.location.anchor) || "restore" !== this.action && !t.isPreviewable() ? void 0 : t
                        }, r.prototype.hasCachedSnapshot = function () {
                            return null != this.getCachedSnapshot()
                        }, r.prototype.loadCachedSnapshot = function () {
                            var t, e;
                            return (e = this.getCachedSnapshot()) ? (t = this.shouldIssueRequest(), this.render(function () {
                                var r;
                                return this.cacheSnapshot(), this.controller.render({
                                    snapshot: e,
                                    isPreview: t
                                }, this.performScroll), "function" == typeof (r = this.adapter).visitRendered && r.visitRendered(this), t ? void 0 : this.complete()
                            })) : void 0
                        }, r.prototype.loadResponse = function () {
                            return null != this.response ? this.render(function () {
                                var t, e;
                                return this.cacheSnapshot(), this.request.failed ? (this.controller.render({error: this.response}, this.performScroll), "function" == typeof (t = this.adapter).visitRendered && t.visitRendered(this), this.fail()) : (this.controller.render({snapshot: this.response}, this.performScroll), "function" == typeof (e = this.adapter).visitRendered && e.visitRendered(this), this.complete())
                            }) : void 0
                        }, r.prototype.followRedirect = function () {
                            return this.redirectedToLocation && !this.followedRedirect ? (this.location = this.redirectedToLocation, this.controller.replaceHistoryWithLocationAndRestorationIdentifier(this.redirectedToLocation, this.restorationIdentifier), this.followedRedirect = !0) : void 0
                        }, r.prototype.requestStarted = function () {
                            var t;
                            return this.recordTimingMetric("requestStart"), "function" == typeof (t = this.adapter).visitRequestStarted ? t.visitRequestStarted(this) : void 0
                        }, r.prototype.requestProgressed = function (t) {
                            var e;
                            return this.progress = t, "function" == typeof (e = this.adapter).visitRequestProgressed ? e.visitRequestProgressed(this) : void 0
                        }, r.prototype.requestCompletedWithResponse = function (t, r) {
                            return this.response = t, null != r && (this.redirectedToLocation = e.Location.wrap(r)), this.adapter.visitRequestCompleted(this)
                        }, r.prototype.requestFailedWithStatusCode = function (t, e) {
                            return this.response = e, this.adapter.visitRequestFailedWithStatusCode(this, t)
                        }, r.prototype.requestFinished = function () {
                            var t;
                            return this.recordTimingMetric("requestEnd"), "function" == typeof (t = this.adapter).visitRequestFinished ? t.visitRequestFinished(this) : void 0
                        }, r.prototype.performScroll = function () {
                            return this.scrolled ? void 0 : ("restore" === this.action ? this.scrollToRestoredPosition() || this.scrollToTop() : this.scrollToAnchor() || this.scrollToTop(), this.scrolled = !0)
                        }, r.prototype.scrollToRestoredPosition = function () {
                            var t, e;
                            return t = null != (e = this.restorationData) ? e.scrollPosition : void 0, null != t ? (this.controller.scrollToPosition(t), !0) : void 0
                        }, r.prototype.scrollToAnchor = function () {
                            return null != this.location.anchor ? (this.controller.scrollToAnchor(this.location.anchor), !0) : void 0
                        }, r.prototype.scrollToTop = function () {
                            return this.controller.scrollToPosition({x: 0, y: 0})
                        }, r.prototype.recordTimingMetric = function (t) {
                            var e;
                            return null != (e = this.timingMetrics)[t] ? e[t] : e[t] = (new Date).getTime()
                        }, r.prototype.getTimingMetrics = function () {
                            return e.copyObject(this.timingMetrics)
                        }, n = function (t) {
                            switch (t) {
                                case"replace":
                                    return "replaceHistoryWithLocationAndRestorationIdentifier";
                                case"advance":
                                case"restore":
                                    return "pushHistoryWithLocationAndRestorationIdentifier"
                            }
                        }, r.prototype.shouldIssueRequest = function () {
                            return "restore" === this.action ? !this.hasCachedSnapshot() : !0
                        }, r.prototype.cacheSnapshot = function () {
                            return this.snapshotCached ? void 0 : (this.controller.cacheSnapshot(), this.snapshotCached = !0)
                        }, r.prototype.render = function (t) {
                            return this.cancelRender(), this.frame = requestAnimationFrame(function (e) {
                                return function () {
                                    return e.frame = null, t.call(e)
                                }
                            }(this))
                        }, r.prototype.cancelRender = function () {
                            return this.frame ? cancelAnimationFrame(this.frame) : void 0
                        }, r
                    }()
                }.call(this), function () {
                    var t = function (t, e) {
                        return function () {
                            return t.apply(e, arguments)
                        }
                    };
                    e.Controller = function () {
                        function r() {
                            this.clickBubbled = t(this.clickBubbled, this), this.clickCaptured = t(this.clickCaptured, this), this.pageLoaded = t(this.pageLoaded, this), this.history = new e.History(this), this.view = new e.View(this), this.scrollManager = new e.ScrollManager(this), this.restorationData = {}, this.clearCache(), this.setProgressBarDelay(500)
                        }

                        return r.prototype.start = function () {
                            return e.supported && !this.started ? (addEventListener("click", this.clickCaptured, !0), addEventListener("DOMContentLoaded", this.pageLoaded, !1), this.scrollManager.start(), this.startHistory(), this.started = !0, this.enabled = !0) : void 0
                        }, r.prototype.disable = function () {
                            return this.enabled = !1
                        }, r.prototype.stop = function () {
                            return this.started ? (removeEventListener("click", this.clickCaptured, !0), removeEventListener("DOMContentLoaded", this.pageLoaded, !1), this.scrollManager.stop(), this.stopHistory(), this.started = !1) : void 0
                        }, r.prototype.clearCache = function () {
                            return this.cache = new e.SnapshotCache(10)
                        }, r.prototype.visit = function (t, r) {
                            var n, o;
                            return null == r && (r = {}), t = e.Location.wrap(t), this.applicationAllowsVisitingLocation(t) ? this.locationIsVisitable(t) ? (n = null != (o = r.action) ? o : "advance", this.adapter.visitProposedToLocationWithAction(t, n)) : window.location = t : void 0
                        }, r.prototype.startVisitToLocationWithAction = function (t, r, n) {
                            var o;
                            return e.supported ? (o = this.getRestorationDataForIdentifier(n), this.startVisit(t, r, {restorationData: o})) : window.location = t
                        }, r.prototype.setProgressBarDelay = function (t) {
                            return this.progressBarDelay = t
                        }, r.prototype.startHistory = function () {
                            return this.location = e.Location.wrap(window.location), this.restorationIdentifier = e.uuid(), this.history.start(), this.history.replace(this.location, this.restorationIdentifier)
                        }, r.prototype.stopHistory = function () {
                            return this.history.stop()
                        }, r.prototype.pushHistoryWithLocationAndRestorationIdentifier = function (t, r) {
                            return this.restorationIdentifier = r, this.location = e.Location.wrap(t), this.history.push(this.location, this.restorationIdentifier)
                        }, r.prototype.replaceHistoryWithLocationAndRestorationIdentifier = function (t, r) {
                            return this.restorationIdentifier = r, this.location = e.Location.wrap(t), this.history.replace(this.location, this.restorationIdentifier)
                        }, r.prototype.historyPoppedToLocationWithRestorationIdentifier = function (t, r) {
                            var n;
                            return this.restorationIdentifier = r, this.enabled ? (n = this.getRestorationDataForIdentifier(this.restorationIdentifier), this.startVisit(t, "restore", {
                                restorationIdentifier: this.restorationIdentifier,
                                restorationData: n,
                                historyChanged: !0
                            }), this.location = e.Location.wrap(t)) : this.adapter.pageInvalidated()
                        }, r.prototype.getCachedSnapshotForLocation = function (t) {
                            var e;
                            return null != (e = this.cache.get(t)) ? e.clone() : void 0
                        }, r.prototype.shouldCacheSnapshot = function () {
                            return this.view.getSnapshot().isCacheable();
                        }, r.prototype.cacheSnapshot = function () {
                            var t, r;
                            return this.shouldCacheSnapshot() ? (this.notifyApplicationBeforeCachingSnapshot(), r = this.view.getSnapshot(), t = this.lastRenderedLocation, e.defer(function (e) {
                                return function () {
                                    return e.cache.put(t, r.clone())
                                }
                            }(this))) : void 0
                        }, r.prototype.scrollToAnchor = function (t) {
                            var e;
                            return (e = this.view.getElementForAnchor(t)) ? this.scrollToElement(e) : this.scrollToPosition({
                                x: 0,
                                y: 0
                            })
                        }, r.prototype.scrollToElement = function (t) {
                            return this.scrollManager.scrollToElement(t)
                        }, r.prototype.scrollToPosition = function (t) {
                            return this.scrollManager.scrollToPosition(t)
                        }, r.prototype.scrollPositionChanged = function (t) {
                            var e;
                            return e = this.getCurrentRestorationData(), e.scrollPosition = t
                        }, r.prototype.render = function (t, e) {
                            return this.view.render(t, e)
                        }, r.prototype.viewInvalidated = function () {
                            return this.adapter.pageInvalidated()
                        }, r.prototype.viewWillRender = function (t) {
                            return this.notifyApplicationBeforeRender(t)
                        }, r.prototype.viewRendered = function () {
                            return this.lastRenderedLocation = this.currentVisit.location, this.notifyApplicationAfterRender()
                        }, r.prototype.pageLoaded = function () {
                            return this.lastRenderedLocation = this.location, this.notifyApplicationAfterPageLoad()
                        }, r.prototype.clickCaptured = function () {
                            return removeEventListener("click", this.clickBubbled, !1), addEventListener("click", this.clickBubbled, !1)
                        }, r.prototype.clickBubbled = function (t) {
                            var e, r, n;
                            return this.enabled && this.clickEventIsSignificant(t) && (r = this.getVisitableLinkForNode(t.target)) && (n = this.getVisitableLocationForLink(r)) && this.applicationAllowsFollowingLinkToLocation(r, n) ? (t.preventDefault(), e = this.getActionForLink(r), this.visit(n, {action: e})) : void 0
                        }, r.prototype.applicationAllowsFollowingLinkToLocation = function (t, e) {
                            var r;
                            return r = this.notifyApplicationAfterClickingLinkToLocation(t, e), !r.defaultPrevented
                        }, r.prototype.applicationAllowsVisitingLocation = function (t) {
                            var e;
                            return e = this.notifyApplicationBeforeVisitingLocation(t), !e.defaultPrevented
                        }, r.prototype.notifyApplicationAfterClickingLinkToLocation = function (t, r) {
                            return e.dispatch("turbolinks:click", {
                                target: t,
                                data: {url: r.absoluteURL},
                                cancelable: !0
                            })
                        }, r.prototype.notifyApplicationBeforeVisitingLocation = function (t) {
                            return e.dispatch("turbolinks:before-visit", {data: {url: t.absoluteURL}, cancelable: !0})
                        }, r.prototype.notifyApplicationAfterVisitingLocation = function (t) {
                            return e.dispatch("turbolinks:visit", {data: {url: t.absoluteURL}})
                        }, r.prototype.notifyApplicationBeforeCachingSnapshot = function () {
                            return e.dispatch("turbolinks:before-cache")
                        }, r.prototype.notifyApplicationBeforeRender = function (t) {
                            return e.dispatch("turbolinks:before-render", {data: {newBody: t}})
                        }, r.prototype.notifyApplicationAfterRender = function () {
                            return e.dispatch("turbolinks:render")
                        }, r.prototype.notifyApplicationAfterPageLoad = function (t) {
                            return null == t && (t = {}), e.dispatch("turbolinks:load", {
                                data: {
                                    url: this.location.absoluteURL,
                                    timing: t
                                }
                            })
                        }, r.prototype.startVisit = function (t, e, r) {
                            var n;
                            return null != (n = this.currentVisit) && n.cancel(), this.currentVisit = this.createVisit(t, e, r), this.currentVisit.start(), this.notifyApplicationAfterVisitingLocation(t)
                        }, r.prototype.createVisit = function (t, r, n) {
                            var o, i, s, a, u;
                            return i = null != n ? n : {}, a = i.restorationIdentifier, s = i.restorationData, o = i.historyChanged, u = new e.Visit(this, t, r), u.restorationIdentifier = null != a ? a : e.uuid(), u.restorationData = e.copyObject(s), u.historyChanged = o, u.referrer = this.location, u
                        }, r.prototype.visitCompleted = function (t) {
                            return this.notifyApplicationAfterPageLoad(t.getTimingMetrics())
                        }, r.prototype.clickEventIsSignificant = function (t) {
                            return !(t.defaultPrevented || t.target.isContentEditable || t.which > 1 || t.altKey || t.ctrlKey || t.metaKey || t.shiftKey)
                        }, r.prototype.getVisitableLinkForNode = function (t) {
                            return this.nodeIsVisitable(t) ? e.closest(t, "a[href]:not([target]):not([download])") : void 0
                        }, r.prototype.getVisitableLocationForLink = function (t) {
                            var r;
                            return r = new e.Location(t.getAttribute("href")), this.locationIsVisitable(r) ? r : void 0
                        }, r.prototype.getActionForLink = function (t) {
                            var e;
                            return null != (e = t.getAttribute("data-turbolinks-action")) ? e : "advance"
                        }, r.prototype.nodeIsVisitable = function (t) {
                            var r;
                            return (r = e.closest(t, "[data-turbolinks]")) ? "false" !== r.getAttribute("data-turbolinks") : !0
                        }, r.prototype.locationIsVisitable = function (t) {
                            return t.isPrefixedBy(this.view.getRootLocation()) && t.isHTML()
                        }, r.prototype.getCurrentRestorationData = function () {
                            return this.getRestorationDataForIdentifier(this.restorationIdentifier)
                        }, r.prototype.getRestorationDataForIdentifier = function (t) {
                            var e;
                            return null != (e = this.restorationData)[t] ? e[t] : e[t] = {}
                        }, r
                    }()
                }.call(this), function () {
                    !function () {
                        var t, e;
                        if ((t = e = document.currentScript) && !e.hasAttribute("data-turbolinks-suppress-warning")) for (; t = t.parentNode;) if (t === document.body) return console.warn("You are loading Turbolinks from a <script> element inside the <body> element. This is probably not what you meant to do!\n\nLoad your application\u2019s JavaScript bundle inside the <head> element instead. <script> elements in <body> are evaluated with each page change.\n\nFor more information, see: https://github.com/turbolinks/turbolinks#working-with-script-elements\n\n\u2014\u2014\nSuppress this warning by adding a `data-turbolinks-suppress-warning` attribute to: %s", e.outerHTML)
                    }()
                }.call(this), function () {
                    var t, r, n;
                    e.start = function () {
                        return r() ? (null == e.controller && (e.controller = t()), e.controller.start()) : void 0
                    }, r = function () {
                        return null == window.Turbolinks && (window.Turbolinks = e), n()
                    }, t = function () {
                        var t;
                        return t = new e.Controller, t.adapter = new e.BrowserAdapter(t), t
                    }, n = function () {
                        return window.Turbolinks === e
                    }, n() && e.start()
                }.call(this)
            }).call(this), true && module.exports ? module.exports = e : true && !(__WEBPACK_AMD_DEFINE_FACTORY__ = (e),
                __WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
                    (__WEBPACK_AMD_DEFINE_FACTORY__.call(exports, __webpack_require__, exports, module)) :
                    __WEBPACK_AMD_DEFINE_FACTORY__),
            __WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__))
        }).call(this);

        /***/
    }),

    /***/ "./node_modules/webpack/buildin/module.js":
    /*!***********************************!*\
  !*** (webpack)/buildin/module.js ***!
  \***********************************/
    /*! no static exports found */
    /***/ (function (module, exports) {

        module.exports = function (module) {
            if (!module.webpackPolyfill) {
                module.deprecate = function () {
                };
                module.paths = [];
                // module.parent = undefined by default
                if (!module.children) module.children = [];
                Object.defineProperty(module, "loaded", {
                    enumerable: true,
                    get: function () {
                        return module.l;
                    }
                });
                Object.defineProperty(module, "id", {
                    enumerable: true,
                    get: function () {
                        return module.i;
                    }
                });
                module.webpackPolyfill = 1;
            }
            return module;
        };


        /***/
    }),

    /***/ "./resources/js/app.js":
    /*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
    /*! no exports provided */
    /***/ (function (module, __webpack_exports__, __webpack_require__) {

        "use strict";
        __webpack_require__.r(__webpack_exports__);
        /* harmony import */
        var alpinejs_src__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! alpinejs/src */ "./node_modules/alpinejs/src/index.js");
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


        window.jdenticon = __webpack_require__(/*! ./jdenticon */ "./resources/js/jdenticon.js");

        var Turbolinks = __webpack_require__(/*! turbolinks */ "./node_modules/turbolinks/dist/turbolinks.js");

        Turbolinks.start();
        Turbolinks.setProgressBarDelay(50);
        document.addEventListener('turbolinks:load', function () {
            // Login Profilbild
            if (document.getElementById('profilepicname') !== null) {
                document.getElementById('profilepicname').addEventListener('input', function () {
                    document.getElementById('pic').setAttribute('data-jdenticon-value', this.value);
                    window.jdenticon();
                });
            }

            window.livewire.rescan();
            window.jdenticon();
        });
        document.addEventListener('livewire:load', function () {
            window.livewire.hook('afterDomUpdate', function () {
                alpinejs_src__WEBPACK_IMPORTED_MODULE_0__["default"].start();
            });
        });

        /***/
    }),

    /***/ "./resources/js/bootstrap.js":
    /*!***********************************!*\
  !*** ./resources/js/bootstrap.js ***!
  \***********************************/
    /*! no static exports found */
    /***/ (function (module, exports) {

// window._ = require('lodash');

        /**
         * We'll load jQuery and the Bootstrap jQuery plugin which provides support
         * for JavaScript based Bootstrap features such as modals and tabs. This
         * code may be modified to fit the specific needs of your application.
         */
// try {
// window.$ = window.jQuery = require('jquery');
// } catch (e) {}

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

        /***/
    }),

    /***/ "./resources/js/jdenticon.js":
    /*!***********************************!*\
  !*** ./resources/js/jdenticon.js ***!
  \***********************************/
    /*! no static exports found */
    /***/ (function (module, exports, __webpack_require__) {

        /* WEBPACK VAR INJECTION */
        (function (module) {
            var __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;

            function _typeof(obj) {
                if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") {
                    _typeof = function _typeof(obj) {
                        return typeof obj;
                    };
                } else {
                    _typeof = function _typeof(obj) {
                        return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
                    };
                }
                return _typeof(obj);
            }

// Jdenticon 2.2.0 | jdenticon.com | MIT licensed | (c) 2014-2019 Daniel Mester Pirttijärvi
            (function (v, E) {
                var A = E(v, v && v.jQuery);
                true && "exports" in module ? module.exports = A : true ? !(__WEBPACK_AMD_DEFINE_ARRAY__ = [], __WEBPACK_AMD_DEFINE_RESULT__ = (function () {
                    return A;
                }).apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__),
                __WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__)) : undefined;
            })("undefined" !== typeof self ? self : this, function (v, E) {
                function A(a, b, c) {
                    for (var d = document.createElementNS("http://www.w3.org/2000/svg", b), f = 2; f + 1 < arguments.length; f += 2) {
                        d.setAttribute(arguments[f], arguments[f + 1]);
                    }

                    a.appendChild(d);
                }

                function P(a) {
                    this.b = Math.min(Number(a.getAttribute("width")) || 100, Number(a.getAttribute("height")) || 100);

                    for (this.a = a; a.firstChild;) {
                        a.removeChild(a.firstChild);
                    }

                    a.setAttribute("viewBox", "0 0 " + this.b + " " + this.b);
                    a.setAttribute("preserveAspectRatio", "xMidYMid meet");
                }

                function Q(a) {
                    this.b = a;
                    this.a = '<svg xmlns="http://www.w3.org/2000/svg" width="' + a + '" height="' + a + '" viewBox="0 0 ' + a + " " + a + '" preserveAspectRatio="xMidYMid meet">';
                }

                function T(a) {
                    "undefined" != typeof MutationObserver && new MutationObserver(function (b) {
                        for (var c = 0; c < b.length; c++) {
                            for (var d = b[c], f = d.addedNodes, e = 0; f && e < f.length; e++) {
                                var h = f[e];
                                if (1 == h.nodeType) if (m.B(h)) a(h); else {
                                    h = h.querySelectorAll(m.C);

                                    for (var l = 0; l < h.length; l++) {
                                        a(h[l]);
                                    }
                                }
                            }

                            "attributes" == d.type && m.B(d.target) && a(d.target);
                        }
                    }).observe(document.body, {
                        childList: !0,
                        attributes: !0,
                        attributeFilter: [m.o, m.v, "width", "height"],
                        subtree: !0
                    });
                }

                function t(a, b, c) {
                    return parseInt(a.substr(b, c), 16);
                }

                function x(a) {
                    return (10 * a + .5 | 0) / 10;
                }

                function R() {
                    this.j = "";
                }

                function H(a) {
                    this.b = {};
                    this.h = a;
                    this.a = a.b;
                }

                function I(a, b) {
                    var c = a.canvas.width,
                        d = a.canvas.height;
                    a.save();
                    this.b = a;
                    b ? this.a = b : (this.a = Math.min(c, d), a.translate((c - this.a) / 2 | 0, (d - this.a) / 2 | 0));
                    a.clearRect(0, 0, this.a, this.a);
                }

                function S(a) {
                    this.h = a;
                    this.c = B.a;
                }

                function U(a, b) {
                    a = b.R(a);
                    return [w.i(a, b.J, b.I(0)), w.i(a, b.A, b.w(.5)), w.i(a, b.J, b.I(1)), w.i(a, b.A, b.w(1)), w.i(a, b.A, b.w(0))];
                }

                function V(a) {
                    return function (b) {
                        for (var c = [], d = 0; d < b.length; d++) {
                            for (var f = b[d], e = 28; 0 <= e; e -= 4) {
                                c.push((f >>> e & 15).toString(16));
                            }
                        }

                        return c.join("");
                    }(function (b) {
                        for (var c = 1732584193, d = 4023233417, f = 2562383102, e = 271733878, h = 3285377520, l = [c, d, f, e, h], q = 0; q < b.length; q++) {
                            for (var n = b[q], g = 16; 80 > g; g++) {
                                var k = n[g - 3] ^ n[g - 8] ^ n[g - 14] ^ n[g - 16];
                                n[g] = k << 1 | k >>> 31;
                            }

                            for (g = 0; 80 > g; g++) {
                                k = (c << 5 | c >>> 27) + (20 > g ? (d & f ^ ~d & e) + 1518500249 : 40 > g ? (d ^ f ^ e) + 1859775393 : 60 > g ? (d & f ^ d & e ^ f & e) + 2400959708 : (d ^ f ^ e) + 3395469782) + h + n[g], h = e, e = f, f = d << 30 | d >>> 2, d = c, c = k | 0;
                            }

                            l[0] = c = l[0] + c | 0;
                            l[1] = d = l[1] + d | 0;
                            l[2] = f = l[2] + f | 0;
                            l[3] = e = l[3] + e | 0;
                            l[4] = h = l[4] + h | 0;
                        }

                        return l;
                    }(function (b) {
                        function c(q, n) {
                            for (var g = [], k = -1, p = 0; p < n; p++) {
                                k = p / 4 | 0, g[k] = (g[k] || 0) + (f[q + p] << 8 * (3 - (p & 3)));
                            }

                            for (; 16 > ++k;) {
                                g[k] = 0;
                            }

                            return g;
                        }

                        var d = encodeURI(b),
                            f = [];
                        b = 0;
                        var e,
                            h = [];

                        for (e = 0; e < d.length; e++) {
                            if ("%" == d[e]) {
                                var l = t(d, e + 1, 2);
                                e += 2;
                            } else l = d.charCodeAt(e);

                            f[b++] = l;
                        }

                        f[b++] = 128;

                        for (e = 0; e + 64 <= b; e += 64) {
                            h.push(c(e, 64));
                        }

                        d = b - e;
                        e = c(e, d);
                        64 < d + 8 && (h.push(e), e = c(0, 0));
                        e[15] = 8 * b - 8;
                        h.push(e);
                        return h;
                    }(a)));
                }

                function C(a) {
                    a |= 0;
                    return 0 > a ? "00" : 16 > a ? "0" + a.toString(16) : 256 > a ? a.toString(16) : "ff";
                }

                function J(a, b, c) {
                    c = 0 > c ? c + 6 : 6 < c ? c - 6 : c;
                    return C(255 * (1 > c ? a + (b - a) * c : 3 > c ? b : 4 > c ? a + (b - a) * (4 - c) : a));
                }

                function K(a, b, c, d) {
                    function f(n, g) {
                        var k = h[n];
                        k && 1 < k.length || (k = g);
                        return function (p) {
                            p = k[0] + p * (k[1] - k[0]);
                            return 0 > p ? 0 : 1 < p ? 1 : p;
                        };
                    }

                    var e = "object" == _typeof(c) && c || a.config || b.jdenticon_config || {},
                        h = e.lightness || {};
                    b = e.saturation || {};
                    a = "color" in b ? b.color : b;
                    b = b.grayscale;
                    var l = e.backColor,
                        q = e.padding;
                    return {
                        R: function R(n) {
                            var g = e.hues,
                                k;
                            g && 0 < g.length && (k = g[0 | .999 * n * g.length]);
                            return "number" == typeof k ? (k / 360 % 1 + 1) % 1 : n;
                        },
                        A: "number" == typeof a ? a : .5,
                        J: "number" == typeof b ? b : 0,
                        w: f("color", [.4, .8]),
                        I: f("grayscale", [.3, .9]),
                        F: w.parse(l),
                        padding: "number" == typeof c ? c : "number" == typeof q ? q : d
                    };
                }

                function F(a, b) {
                    this.x = a;
                    this.y = b;
                }

                function B(a, b, c, d) {
                    this.b = a;
                    this.c = b;
                    this.h = c;
                    this.a = d;
                }

                function L(a, b, c, d, f, e) {
                    function h(r, y, W, G, M) {
                        G = G ? t(b, G, 1) : 0;
                        y = y[t(b, W, 1) % y.length];
                        a.G(k[p[r]]);

                        for (r = 0; r < M.length; r++) {
                            n.c = new B(c + M[r][0] * g, d + M[r][1] * g, g, G++ % 4), y(n, g, r);
                        }

                        a.H();
                    }

                    function l(r) {
                        if (0 <= r.indexOf(N)) for (var y = 0; y < r.length; y++) {
                            if (0 <= p.indexOf(r[y])) return !0;
                        }
                    }

                    e.F && a.m(e.F);
                    var q = .5 + f * e.padding | 0;
                    f -= 2 * q;
                    var n = new S(a),
                        g = 0 | f / 4;
                    c += 0 | q + f / 2 - 2 * g;
                    d += 0 | q + f / 2 - 2 * g;
                    f = t(b, -7) / 268435455;
                    var k = U(f, e),
                        p = [];

                    for (e = 0; 3 > e; e++) {
                        var N = t(b, 8 + e, 1) % k.length;
                        if (l([0, 4]) || l([2, 3])) N = 1;
                        p.push(N);
                    }

                    h(0, O.K, 2, 3, [[1, 0], [2, 0], [2, 3], [1, 3], [0, 1], [3, 1], [3, 2], [0, 2]]);
                    h(1, O.K, 4, 5, [[0, 0], [3, 0], [3, 3], [0, 3]]);
                    h(2, O.O, 1, null, [[1, 1], [2, 1], [2, 2], [1, 2]]);
                    a.finish();
                }

                function D(a, b, c) {
                    if ("string" === typeof a) {
                        if (m.L) {
                            a = document.querySelectorAll(a);

                            for (var d = 0; d < a.length; d++) {
                                D(a[d], b, c);
                            }
                        }
                    } else if (d = m.B(a)) if (b = z.u(b) || null != b && z.s(b) || z.u(a.getAttribute(m.v)) || a.hasAttribute(m.o) && z.s(a.getAttribute(m.o))) a = d == m.D ? new H(new P(a)) : new I(a.getContext("2d")), L(a, b, 0, 0, a.a, K(u, v, c, .08));
                }

                function u() {
                    m.L && D(m.C);
                }

                function X() {
                    var a = (u.config || v.jdenticon_config || {}).replaceMode;
                    "never" != a && (u(), "observe" == a && T(D));
                }

                P.prototype = {
                    m: function m(a, b) {
                        b && A(this.a, "rect", "width", "100%", "height", "100%", "fill", a, "opacity", b);
                    },
                    c: function c(a, b) {
                        A(this.a, "path", "fill", a, "d", b);
                    }
                };
                Q.prototype = {
                    m: function m(a, b) {
                        b && (this.a += '<rect width="100%" height="100%" fill="' + a + '" opacity="' + b.toFixed(2) + '"/>');
                    },
                    c: function c(a, b) {
                        this.a += '<path fill="' + a + '" d="' + b + '"/>';
                    },
                    toString: function toString() {
                        return this.a + "</svg>";
                    }
                };
                var m = {
                    D: 1,
                    N: 2,
                    v: "data-jdenticon-hash",
                    o: "data-jdenticon-value",
                    L: "undefined" !== typeof document && "querySelectorAll" in document,
                    B: function B(a) {
                        if (a) {
                            var b = a.tagName;
                            if (/svg/i.test(b)) return m.D;
                            if (/canvas/i.test(b) && "getContext" in a) return m.N;
                        }
                    }
                };
                m.C = "[" + m.v + "],[" + m.o + "]";
                var O = {
                    O: [function (a, b) {
                        var c = .42 * b;
                        a.f([0, 0, b, 0, b, b - 2 * c, b - c, b, 0, b]);
                    }, function (a, b) {
                        var c = 0 | .5 * b;
                        a.b(b - c, 0, c, 0 | .8 * b, 2);
                    }, function (a, b) {
                        var c = 0 | b / 3;
                        a.a(c, c, b - c, b - c);
                    }, function (a, b) {
                        var c = .1 * b,
                            d = 6 > b ? 1 : 8 > b ? 2 : 0 | .25 * b;
                        c = 1 < c ? 0 | c : .5 < c ? 1 : c;
                        a.a(d, d, b - c - d, b - c - d);
                    }, function (a, b) {
                        var c = 0 | .15 * b,
                            d = 0 | .5 * b;
                        a.g(b - d - c, b - d - c, d);
                    }, function (a, b) {
                        var c = .1 * b,
                            d = 4 * c;
                        3 < d && (d |= 0);
                        a.a(0, 0, b, b);
                        a.f([d, d, b - c, d, d + (b - d - c) / 2, b - c], !0);
                    }, function (a, b) {
                        a.f([0, 0, b, 0, b, .7 * b, .4 * b, .4 * b, .7 * b, b, 0, b]);
                    }, function (a, b) {
                        a.b(b / 2, b / 2, b / 2, b / 2, 3);
                    }, function (a, b) {
                        a.a(0, 0, b, b / 2);
                        a.a(0, b / 2, b / 2, b / 2);
                        a.b(b / 2, b / 2, b / 2, b / 2, 1);
                    }, function (a, b) {
                        var c = .14 * b,
                            d = 4 > b ? 1 : 6 > b ? 2 : 0 | .35 * b;
                        c = 8 > b ? c : 0 | c;
                        a.a(0, 0, b, b);
                        a.a(d, d, b - d - c, b - d - c, !0);
                    }, function (a, b) {
                        var c = .12 * b,
                            d = 3 * c;
                        a.a(0, 0, b, b);
                        a.g(d, d, b - c - d, !0);
                    }, function (a, b) {
                        a.b(b / 2, b / 2, b / 2, b / 2, 3);
                    }, function (a, b) {
                        var c = .25 * b;
                        a.a(0, 0, b, b);
                        a.l(c, c, b - c, b - c, !0);
                    }, function (a, b, c) {
                        var d = .4 * b;
                        c || a.g(d, d, 1.2 * b);
                    }],
                    K: [function (a, b) {
                        a.b(0, 0, b, b, 0);
                    }, function (a, b) {
                        a.b(0, b / 2, b, b / 2, 0);
                    }, function (a, b) {
                        a.l(0, 0, b, b);
                    }, function (a, b) {
                        var c = b / 6;
                        a.g(c, c, b - 2 * c);
                    }]
                };
                R.prototype = {
                    f: function f(a) {
                        for (var b = "M" + x(a[0].x) + " " + x(a[0].y), c = 1; c < a.length; c++) {
                            b += "L" + x(a[c].x) + " " + x(a[c].y);
                        }

                        this.j += b + "Z";
                    },
                    g: function g(a, b, c) {
                        c = c ? 0 : 1;
                        var d = x(b / 2),
                            f = x(b);
                        this.j += "M" + x(a.x) + " " + x(a.y + b / 2) + "a" + d + "," + d + " 0 1," + c + " " + f + ",0a" + d + "," + d + " 0 1," + c + " " + -f + ",0";
                    }
                };
                H.prototype = {
                    m: function m(a) {
                        a = /^(#......)(..)?/.exec(a);
                        var b = a[2] ? t(a[2], 0) / 255 : 1;
                        this.h.m(a[1], b);
                    },
                    G: function G(a) {
                        this.c = this.b[a] || (this.b[a] = new R());
                    },
                    H: function H() {
                    },
                    f: function f(a) {
                        this.c.f(a);
                    },
                    g: function g(a, b, c) {
                        this.c.g(a, b, c);
                    },
                    finish: function finish() {
                        for (var a in this.b) {
                            this.h.c(a, this.b[a].j);
                        }
                    }
                };
                I.prototype = {
                    m: function m(a) {
                        var b = this.b,
                            c = this.a;
                        b.fillStyle = w.M(a);
                        b.fillRect(0, 0, c, c);
                    },
                    G: function G(a) {
                        this.b.fillStyle = w.M(a);
                        this.b.beginPath();
                    },
                    H: function H() {
                        this.b.fill();
                    },
                    f: function f(a) {
                        var b = this.b,
                            c;
                        b.moveTo(a[0].x, a[0].y);

                        for (c = 1; c < a.length; c++) {
                            b.lineTo(a[c].x, a[c].y);
                        }

                        b.closePath();
                    },
                    g: function g(a, b, c) {
                        var d = this.b;
                        b /= 2;
                        d.moveTo(a.x + b, a.y + b);
                        d.arc(a.x + b, a.y + b, b, 0, 2 * Math.PI, c);
                        d.closePath();
                    },
                    finish: function finish() {
                        this.b.restore();
                    }
                };
                S.prototype = {
                    f: function f(a, b) {
                        var c = b ? -2 : 2,
                            d = this.c,
                            f = [];

                        for (b = b ? a.length - 2 : 0; b < a.length && 0 <= b; b += c) {
                            f.push(d.l(a[b], a[b + 1]));
                        }

                        this.h.f(f);
                    },
                    g: function g(a, b, c, d) {
                        a = this.c.l(a, b, c, c);
                        this.h.g(a, c, d);
                    },
                    a: function a(_a, b, c, d, f) {
                        this.f([_a, b, _a + c, b, _a + c, b + d, _a, b + d], f);
                    },
                    b: function b(a, _b, c, d, f, e) {
                        a = [a + c, _b, a + c, _b + d, a, _b + d, a, _b];
                        a.splice((f || 0) % 4 * 2, 2);
                        this.f(a, e);
                    },
                    l: function l(a, b, c, d, f) {
                        this.f([a + c / 2, b, a + c, b + d / 2, a + c / 2, b + d, a, b + d / 2], f);
                    }
                };
                var z = {
                        u: function u(a) {
                            return /^[0-9a-f]{11,}$/i.test(a) && a;
                        },
                        s: function s(a) {
                            return V(null == a ? "" : "" + a);
                        }
                    },
                    w = {
                        S: function S(a, b, c) {
                            return "#" + C(a) + C(b) + C(c);
                        },
                        parse: function parse(a) {
                            if (/^#[0-9a-f]{3,8}$/i.test(a)) {
                                if (6 > a.length) {
                                    var b = a[1],
                                        c = a[2],
                                        d = a[3];
                                    a = a[4] || "";
                                    return "#" + b + b + c + c + d + d + a + a;
                                }

                                if (7 == a.length || 8 < a.length) return a;
                            }
                        },
                        M: function M(a) {
                            var b = t(a, 7, 2);
                            if (isNaN(b)) return a;
                            var c = t(a, 1, 2),
                                d = t(a, 3, 2);
                            a = t(a, 5, 2);
                            return "rgba(" + c + "," + d + "," + a + "," + (b / 255).toFixed(2) + ")";
                        },
                        P: function P(a, b, c) {
                            if (0 == b) return a = C(255 * c), "#" + a + a + a;
                            b = .5 >= c ? c * (b + 1) : c + b - c * b;
                            c = 2 * c - b;
                            return "#" + J(c, b, 6 * a + 2) + J(c, b, 6 * a) + J(c, b, 6 * a - 2);
                        },
                        i: function i(a, b, c) {
                            var d = [.55, .5, .5, .46, .6, .55, .55][6 * a + .5 | 0];
                            return w.P(a, b, .5 > c ? c * d * 2 : d + (c - .5) * (1 - d) * 2);
                        }
                    };
                B.prototype = {
                    l: function l(a, b, c, d) {
                        var f = this.b + this.h,
                            e = this.c + this.h;
                        return 1 === this.a ? new F(f - b - (d || 0), this.c + a) : 2 === this.a ? new F(f - a - (c || 0), e - b - (d || 0)) : 3 === this.a ? new F(this.b + b, e - a - (c || 0)) : new F(this.b + a, this.c + b);
                    }
                };
                B.a = new B(0, 0, 0, 0);

                u.drawIcon = function (a, b, c, d) {
                    if (!a) throw Error("No canvas specified.");
                    a = new I(a, c);
                    L(a, z.u(b) || z.s(b), 0, 0, c, K(u, v, d, 0));
                };

                u.toSvg = function (a, b, c) {
                    var d = new Q(b),
                        f = new H(d);
                    L(f, z.u(a) || z.s(a), 0, 0, b, K(u, v, c, .08));
                    return d.toString();
                };

                u.update = D;
                u.version = "2.2.0";
                E && (E.fn.jdenticon = function (a, b) {
                    this.each(function (c, d) {
                        D(d, a, b);
                    });
                    return this;
                });
                "function" === typeof setTimeout && setTimeout(X, 0);
                return u;
            });
            /* WEBPACK VAR INJECTION */
        }.call(this, __webpack_require__(/*! ./../../node_modules/webpack/buildin/module.js */ "./node_modules/webpack/buildin/module.js")(module)))

        /***/
    }),

    /***/ "./resources/sass/app.scss":
    /*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
    /*! no static exports found */
    /***/ (function (module, exports) {

// removed by extract-text-webpack-plugin

        /***/
    }),

    /***/ 0:
    /*!*************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/app.scss ***!
  \*************************************************************/
    /*! no static exports found */
    /***/ (function (module, exports, __webpack_require__) {

        __webpack_require__(/*! D:\laragon\www\quiz\resources\js\app.js */"./resources/js/app.js");
        module.exports = __webpack_require__(/*! D:\laragon\www\quiz\resources\sass\app.scss */"./resources/sass/app.scss");


        /***/
    })

    /******/
});
