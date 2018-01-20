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
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/css/style.less":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/js/script.js":
/***/ (function(module, exports) {

var shop = {
    message: function message(text) {
        $.jGrowl(text);
    }
};
$(document).ready(function () {
    //Для изменения количества
    $("[name=product_count]").change(function (e) {
        var current = $(this);
        var count = +current.val();
        if (count <= 0) {
            var item = current.closest(".cart-item");
            var input = item.find(".cart-item-delete");
            var form = input.closest("form");
            form.submit();
        }

        var form = current.closest("form");
        var data = form.serialize();
        var id = form.find("input[name='product_id']").val();
        var url = form.attr("action");
        $.ajax({
            url: url + "/" + id,
            type: 'POST',
            data: data
        }).always(function (data) {
            var result = JSON.parse(data);
            shop.message(result.text);
        });
    });

    $(".product-item form").submit(function (event) {
        event.preventDefault();
        var data = $(this).serialize();
        var url = $(this).attr("action");
        $.ajax({
            url: url,
            type: 'POST',
            data: data
        }).always(function (data) {
            var result = JSON.parse(data);
            shop.message(result.text);
        });
    });
    $(".cart-item form").submit(function (event) {
        event.preventDefault();
        var self = $(this);
        var id = $(this).find("input[name='product_id']").val();
        var data = $(this).serialize();
        var url = $(this).attr("action");
        $.ajax({
            url: url + "/" + id,
            type: 'DELETE',
            data: data
        }).always(function (data) {
            var result = JSON.parse(data);
            shop.message(result.text);
            $(self).parent().remove();
        });
    });
});

/***/ }),

/***/ 0:
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__("./resources/assets/js/script.js");
module.exports = __webpack_require__("./resources/assets/css/style.less");


/***/ })

/******/ });