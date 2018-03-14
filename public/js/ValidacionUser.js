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
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 46);
/******/ })
/************************************************************************/
/******/ ({

/***/ 46:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(47);


/***/ }),

/***/ 47:
/***/ (function(module, exports, __webpack_require__) {

var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) { return typeof obj; } : function (obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; };

function gestionarErroresuser(input, errores) {
    var errors = false;
    input = $(input);
    if ((typeof errores === "undefined" ? "undefined" : _typeof(errores)) !== ( true ? "undefined" : _typeof(undefined))) {
        input.removeClass("is-invalid");
        input.addClass("is-invalid");
        input.nextAll(".valid-feedback").remove();
        var _iteratorNormalCompletion = true;
        var _didIteratorError = false;
        var _iteratorError = undefined;

        try {
            for (var _iterator = errores[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
                var error = _step.value;

                input.after("<div class=\"invalid-feedback\"><strong>" + error + "</strong></div>");
            }
        } catch (err) {
            _didIteratorError = true;
            _iteratorError = err;
        } finally {
            try {
                if (!_iteratorNormalCompletion && _iterator.return) {
                    _iterator.return();
                }
            } finally {
                if (_didIteratorError) {
                    throw _iteratorError;
                }
            }
        }

        errors = true;
    } else {
        input.removeClass("is-invalid");
        input.addClass("is-valid");
        input.nextAll(".invalid-feedback").remove();
    }
    console.log(errors);
    return errors;
}

function validateTargett(target) {
    var formData = new FormData();
    var input = event.target;

    formData.append(input.id, input.value);
    $(target).parent().next(".spinner").addClass("loader");
    axios.post('/register/validar', formData).then(function (response) {
        $(target).parent().next(".spinner").removeClass("loader");
        switch (input.id) {
            case "tipo":
                gestionarErroresuser(target, response.data.tipo);
                break;
            case "username":
                gestionarErroresuser(target, response.data.username);
                break;
            case "name":
                gestionarErroresuser(target, response.data.name);
                break;
            case "apellido":
                gestionarErroresuser(target, response.data.apellido);
                break;
            case "email":
                gestionarErroresuser(target, response.data.email);
                break;
            case "password":
                gestionarErroresuser(target, response.data.password);
                break;
        }
    }).catch(function (error) {
        console.log(error);
    });
}
function asociarValidacionUser() {
    $("#tipo, #username, #name, #apellido, #email ,#password ").on('change', function (e) {
        validateTargett(e.target);
    });

    $("#registrouser").click(function (e) {
        e.preventDefault();
        var submit = true;
        var formData = new FormData();
        formData.append('tipo', $("#tipo").val());
        formData.append('username', $("#username").val());
        formData.append('name', $("#name").val());
        formData.append('apellido', $("#apellido").val());
        formData.append('email', $("#email").val());
        formData.append('password', $("#password").val());

        axios.post('/register/validar', formData).then(function (response) {
            if (gestionarErroresuser("#tipo", response.data.tipo)) {
                submit = false;
            }

            if (gestionarErroresuser("#username", response.data.username)) {
                submit = false;
            }

            if (gestionarErroresuser("#name", response.data.name)) {
                submit = false;
            }

            if (gestionarErroresuser("#apellido", response.data.apellido)) {
                submit = false;
            }

            if (gestionarErroresuser("#email", response.data.email)) {
                submit = false;
            }

            if (gestionarErroresuser("#password", response.data.password)) {
                submit = false;
            }

            if (submit === true) {
                $("#userform").submit();
            }
        });
    });
}
$(function () {
    asociarValidacionUser();
});

/***/ })

/******/ });