/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;
/******/
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
/******/ 	// identity function for calling harmony imports with the correct context
/******/ 	__webpack_require__.i = function(value) { return value; };
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
/******/ 	return __webpack_require__(__webpack_require__.s = 172);
/******/ })
/************************************************************************/
/******/ ({

/***/ 166:
/***/ (function(module, exports) {

var config = window.config = {};

config.ResponsiveBootstrapToolkitVisibilityDivs = {
    'xs': $('<div class="device-xs 				  hidden-sm-up"></div>'),
    'sm': $('<div class="device-sm hidden-xs-down hidden-md-up"></div>'),
    'md': $('<div class="device-md hidden-sm-down hidden-lg-up"></div>'),
    'lg': $('<div class="device-lg hidden-md-down hidden-xl-up"></div>'),
    'xl': $('<div class="device-xl hidden-lg-down			  "></div>')
};

/***********************************************
 *        Animation Settings
 ***********************************************/
function animate(options) {
    var animationName = "animated " + options.name;
    var animationEnd = "webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend";
    $(options.selector).addClass(animationName).one(animationEnd, function () {
        $(this).removeClass(animationName);
    });
}

$(function () {
    var $itemActions = $(".item-actions-dropdown");

    $(document).on('click', function (e) {
        if (!$(e.target).closest('.item-actions-dropdown').length) {
            $itemActions.removeClass('active');
        }
    });

    $('.item-actions-toggle-btn').on('click', function (e) {
        e.preventDefault();

        var $thisActionList = $(this).closest('.item-actions-dropdown');

        $itemActions.not($thisActionList).removeClass('active');

        $thisActionList.toggleClass('active');
    });
});

/***********************************************
 *        NProgress Settings
 ***********************************************/
var npSettings = {
    easing: 'ease',
    speed: 500
};

NProgress.configure(npSettings);
$(function () {
    setSameHeights();

    var resizeTimer;

    $(window).resize(function () {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(setSameHeights, 150);
    });
});

function setSameHeights($container) {

    $container = $container || $('.sameheight-container');

    var viewport = ResponsiveBootstrapToolkit.current();

    $container.each(function () {

        var $items = $(this).find(".sameheight-item");

        // Get max height of items in container
        var maxHeight = 0;

        $items.each(function () {
            $(this).css({ height: 'auto' });
            maxHeight = Math.max(maxHeight, $(this).innerHeight());
        });

        // Set heights of items
        $items.each(function () {
            // Ignored viewports for item
            var excludedStr = $(this).data('exclude') || '';
            var excluded = excludedStr.split(',');

            // Set height of element if it's not excluded on
            if (excluded.indexOf(viewport) === -1) {
                $(this).innerHeight(maxHeight);
            }
        });
    });
}

$(function () {

    $('#sidebar-menu, #customize-menu').metisMenu({
        activeClass: 'open'
    });

    $('#sidebar-collapse-btn').on('click', function (event) {
        event.preventDefault();

        $("#app").toggleClass("sidebar-open");
    });

    $("#sidebar-overlay").on('click', function () {
        $("#app").removeClass("sidebar-open");
    });
});
$(function () {
    $('.nav-profile > li > a').on('click', function () {
        var $el = $(this).next();

        animate({
            name: 'flipInX',
            selector: $el
        });
    });
});

$(function () {

    $("body").addClass("loaded");
});

/***********************************************
 *        NProgress Settings
 ***********************************************/

// start load bar
NProgress.start();

// end loading bar
NProgress.done();

/***/ }),

/***/ 172:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(166);


/***/ })

/******/ });