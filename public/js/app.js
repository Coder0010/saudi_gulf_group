/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/***/ (() => {

eval("\n\nfunction createEditor(inputID) {\n  var inputName = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 'description';\n\n  if ($(\"#\".concat(inputID)).length) {\n    new Quill(\"#\".concat(inputID), {\n      modules: {\n        toolbar: quillToolbarOptions\n      },\n      placeholder: 'Words can be like x-rays if you use them properly...',\n      theme: 'snow'\n    });\n    $(\"form\").submit(function (e) {\n      $(this).append(\"<textarea name='\" + inputName + \"' style='display:none'>\" + document.querySelector(\"#\".concat(inputID)).children[0].innerHTML + \"</textarea>\");\n    });\n  }\n}\n\n$(document).ready(function () {\n  window.quillToolbarOptions = [[{\n    'header': [1, 2, 3, 4, 5, false]\n  }], ['bold', 'italic', 'underline', 'strike'], ['blockquote', 'code-block'], [{\n    'header': 1\n  }, {\n    'header': 2\n  }], [{\n    'list': 'ordered'\n  }, {\n    'list': 'bullet'\n  }], [{\n    'script': 'sub'\n  }, {\n    'script': 'super'\n  }], [{\n    'indent': '-1'\n  }, {\n    'indent': '+1'\n  }]]; // createEditor('description_editor')\n  // createEditor('welcome_section_description_editor')\n  // createEditor('coupon_section_description_editor')\n  // createEditor('story_section_description_editor')\n  // createEditor('service_section_description_editor')\n  // createEditor('portfolio_section_description_editor')\n  // createEditor('general_section_description_editor')\n  // createEditor('contact_us_section_description_editor')\n\n  if ($(\".select-2\").length) {\n    $(\".select-2\").select2({\n      width: \"100%\",\n      maximumSelectionLength: 4\n    });\n  }\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvYXBwLmpzLmpzIiwibWFwcGluZ3MiOiJBQUFhOztBQUViLFNBQVNBLFlBQVQsQ0FBc0JDLE9BQXRCLEVBQTBEO0FBQUEsTUFBM0JDLFNBQTJCLHVFQUFmLGFBQWU7O0FBQ3RELE1BQUlDLENBQUMsWUFBS0YsT0FBTCxFQUFELENBQWlCRyxNQUFyQixFQUE2QjtBQUN6QixRQUFJQyxLQUFKLFlBQWNKLE9BQWQsR0FBeUI7QUFDckJLLE1BQUFBLE9BQU8sRUFBRTtBQUNMQyxRQUFBQSxPQUFPLEVBQUVDO0FBREosT0FEWTtBQUlyQkMsTUFBQUEsV0FBVyxFQUFFLHNEQUpRO0FBS3JCQyxNQUFBQSxLQUFLLEVBQUU7QUFMYyxLQUF6QjtBQU9BUCxJQUFBQSxDQUFDLENBQUMsTUFBRCxDQUFELENBQVVRLE1BQVYsQ0FBaUIsVUFBVUMsQ0FBVixFQUFhO0FBQzFCVCxNQUFBQSxDQUFDLENBQUMsSUFBRCxDQUFELENBQVFVLE1BQVIsQ0FDSSxxQkFBb0JYLFNBQXBCLEdBQStCLHlCQUEvQixHQUNNWSxRQUFRLENBQUNDLGFBQVQsWUFBMkJkLE9BQTNCLEdBQXNDZSxRQUF0QyxDQUErQyxDQUEvQyxFQUFrREMsU0FEeEQsR0FFQSxhQUhKO0FBS0gsS0FORDtBQU9IO0FBQ0o7O0FBRURkLENBQUMsQ0FBQ1csUUFBRCxDQUFELENBQVlJLEtBQVosQ0FBa0IsWUFBWTtBQUMxQkMsRUFBQUEsTUFBTSxDQUFDWCxtQkFBUCxHQUE2QixDQUN6QixDQUFDO0FBQ0csY0FBVSxDQUFDLENBQUQsRUFBSSxDQUFKLEVBQU8sQ0FBUCxFQUFVLENBQVYsRUFBYSxDQUFiLEVBQWdCLEtBQWhCO0FBRGIsR0FBRCxDQUR5QixFQUl6QixDQUFDLE1BQUQsRUFBUyxRQUFULEVBQW1CLFdBQW5CLEVBQWdDLFFBQWhDLENBSnlCLEVBS3pCLENBQUMsWUFBRCxFQUFlLFlBQWYsQ0FMeUIsRUFNekIsQ0FBQztBQUNHLGNBQVU7QUFEYixHQUFELEVBRUc7QUFDQyxjQUFVO0FBRFgsR0FGSCxDQU55QixFQVd6QixDQUFDO0FBQ0csWUFBUTtBQURYLEdBQUQsRUFFRztBQUNDLFlBQVE7QUFEVCxHQUZILENBWHlCLEVBZ0J6QixDQUFDO0FBQ0csY0FBVTtBQURiLEdBQUQsRUFFRztBQUNDLGNBQVU7QUFEWCxHQUZILENBaEJ5QixFQXFCekIsQ0FBQztBQUNHLGNBQVU7QUFEYixHQUFELEVBRUc7QUFDQyxjQUFVO0FBRFgsR0FGSCxDQXJCeUIsQ0FBN0IsQ0FEMEIsQ0E0QjFCO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUEsTUFBSUwsQ0FBQyxDQUFDLFdBQUQsQ0FBRCxDQUFlQyxNQUFuQixFQUEyQjtBQUN2QkQsSUFBQUEsQ0FBQyxDQUFDLFdBQUQsQ0FBRCxDQUFlaUIsT0FBZixDQUF1QjtBQUFFQyxNQUFBQSxLQUFLLEVBQUUsTUFBVDtBQUFrQkMsTUFBQUEsc0JBQXNCLEVBQUU7QUFBMUMsS0FBdkI7QUFDSDtBQUNKLENBeENEIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL2pzL2FwcC5qcz82ZDQwIl0sInNvdXJjZXNDb250ZW50IjpbIid1c2Ugc3RyaWN0JztcblxuZnVuY3Rpb24gY3JlYXRlRWRpdG9yKGlucHV0SUQsIGlucHV0TmFtZSA9ICdkZXNjcmlwdGlvbicpIHtcbiAgICBpZiAoJChgIyR7aW5wdXRJRH1gKS5sZW5ndGgpIHtcbiAgICAgICAgbmV3IFF1aWxsKGAjJHtpbnB1dElEfWAsIHtcbiAgICAgICAgICAgIG1vZHVsZXM6IHtcbiAgICAgICAgICAgICAgICB0b29sYmFyOiBxdWlsbFRvb2xiYXJPcHRpb25zXG4gICAgICAgICAgICB9LFxuICAgICAgICAgICAgcGxhY2Vob2xkZXI6ICdXb3JkcyBjYW4gYmUgbGlrZSB4LXJheXMgaWYgeW91IHVzZSB0aGVtIHByb3Blcmx5Li4uJyxcbiAgICAgICAgICAgIHRoZW1lOiAnc25vdydcbiAgICAgICAgfSk7XG4gICAgICAgICQoXCJmb3JtXCIpLnN1Ym1pdChmdW5jdGlvbiAoZSkge1xuICAgICAgICAgICAgJCh0aGlzKS5hcHBlbmQoXG4gICAgICAgICAgICAgICAgXCI8dGV4dGFyZWEgbmFtZT0nXCIrIGlucHV0TmFtZSArXCInIHN0eWxlPSdkaXNwbGF5Om5vbmUnPlwiXG4gICAgICAgICAgICAgICAgICAgICsgZG9jdW1lbnQucXVlcnlTZWxlY3RvcihgIyR7aW5wdXRJRH1gKS5jaGlsZHJlblswXS5pbm5lckhUTUwgK1xuICAgICAgICAgICAgICAgIFwiPC90ZXh0YXJlYT5cIlxuICAgICAgICAgICAgKTtcbiAgICAgICAgfSk7XG4gICAgfVxufVxuXG4kKGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbiAoKSB7XG4gICAgd2luZG93LnF1aWxsVG9vbGJhck9wdGlvbnMgPSBbXG4gICAgICAgIFt7XG4gICAgICAgICAgICAnaGVhZGVyJzogWzEsIDIsIDMsIDQsIDUsIGZhbHNlXVxuICAgICAgICB9XSxcbiAgICAgICAgWydib2xkJywgJ2l0YWxpYycsICd1bmRlcmxpbmUnLCAnc3RyaWtlJ10sXG4gICAgICAgIFsnYmxvY2txdW90ZScsICdjb2RlLWJsb2NrJ10sXG4gICAgICAgIFt7XG4gICAgICAgICAgICAnaGVhZGVyJzogMVxuICAgICAgICB9LCB7XG4gICAgICAgICAgICAnaGVhZGVyJzogMlxuICAgICAgICB9XSxcbiAgICAgICAgW3tcbiAgICAgICAgICAgICdsaXN0JzogJ29yZGVyZWQnXG4gICAgICAgIH0sIHtcbiAgICAgICAgICAgICdsaXN0JzogJ2J1bGxldCdcbiAgICAgICAgfV0sXG4gICAgICAgIFt7XG4gICAgICAgICAgICAnc2NyaXB0JzogJ3N1YidcbiAgICAgICAgfSwge1xuICAgICAgICAgICAgJ3NjcmlwdCc6ICdzdXBlcidcbiAgICAgICAgfV0sXG4gICAgICAgIFt7XG4gICAgICAgICAgICAnaW5kZW50JzogJy0xJ1xuICAgICAgICB9LCB7XG4gICAgICAgICAgICAnaW5kZW50JzogJysxJ1xuICAgICAgICB9XSxcbiAgICBdO1xuICAgIC8vIGNyZWF0ZUVkaXRvcignZGVzY3JpcHRpb25fZWRpdG9yJylcbiAgICAvLyBjcmVhdGVFZGl0b3IoJ3dlbGNvbWVfc2VjdGlvbl9kZXNjcmlwdGlvbl9lZGl0b3InKVxuICAgIC8vIGNyZWF0ZUVkaXRvcignY291cG9uX3NlY3Rpb25fZGVzY3JpcHRpb25fZWRpdG9yJylcbiAgICAvLyBjcmVhdGVFZGl0b3IoJ3N0b3J5X3NlY3Rpb25fZGVzY3JpcHRpb25fZWRpdG9yJylcbiAgICAvLyBjcmVhdGVFZGl0b3IoJ3NlcnZpY2Vfc2VjdGlvbl9kZXNjcmlwdGlvbl9lZGl0b3InKVxuICAgIC8vIGNyZWF0ZUVkaXRvcigncG9ydGZvbGlvX3NlY3Rpb25fZGVzY3JpcHRpb25fZWRpdG9yJylcbiAgICAvLyBjcmVhdGVFZGl0b3IoJ2dlbmVyYWxfc2VjdGlvbl9kZXNjcmlwdGlvbl9lZGl0b3InKVxuICAgIC8vIGNyZWF0ZUVkaXRvcignY29udGFjdF91c19zZWN0aW9uX2Rlc2NyaXB0aW9uX2VkaXRvcicpXG5cbiAgICBpZiAoJChcIi5zZWxlY3QtMlwiKS5sZW5ndGgpIHtcbiAgICAgICAgJChcIi5zZWxlY3QtMlwiKS5zZWxlY3QyKHsgd2lkdGg6IFwiMTAwJVwiICwgbWF4aW11bVNlbGVjdGlvbkxlbmd0aDogNCB9KTtcbiAgICB9XG59KTtcbiJdLCJuYW1lcyI6WyJjcmVhdGVFZGl0b3IiLCJpbnB1dElEIiwiaW5wdXROYW1lIiwiJCIsImxlbmd0aCIsIlF1aWxsIiwibW9kdWxlcyIsInRvb2xiYXIiLCJxdWlsbFRvb2xiYXJPcHRpb25zIiwicGxhY2Vob2xkZXIiLCJ0aGVtZSIsInN1Ym1pdCIsImUiLCJhcHBlbmQiLCJkb2N1bWVudCIsInF1ZXJ5U2VsZWN0b3IiLCJjaGlsZHJlbiIsImlubmVySFRNTCIsInJlYWR5Iiwid2luZG93Iiwic2VsZWN0MiIsIndpZHRoIiwibWF4aW11bVNlbGVjdGlvbkxlbmd0aCJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/app.js\n");

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n// extracted by mini-css-extract-plugin\n//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvc2Fzcy9hcHAuc2Nzcy5qcyIsIm1hcHBpbmdzIjoiO0FBQUEiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvc2Fzcy9hcHAuc2Nzcz80OTEwIl0sInNvdXJjZXNDb250ZW50IjpbIi8vIGV4dHJhY3RlZCBieSBtaW5pLWNzcy1leHRyYWN0LXBsdWdpblxuZXhwb3J0IHt9OyJdLCJuYW1lcyI6W10sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/sass/app.scss\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/app": 0,
/******/ 			"css/app": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkIds[i]] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["css/app"], () => (__webpack_require__("./resources/js/app.js")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["css/app"], () => (__webpack_require__("./resources/sass/app.scss")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;