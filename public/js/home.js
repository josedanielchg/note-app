/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/components/change_view.js":
/*!************************************************!*\
  !*** ./resources/js/components/change_view.js ***!
  \************************************************/
/***/ (() => {

document.addEventListener("click", function (e) {
  var changeViewBttns = document.getElementById("change-view-bttn");
  var gridView = changeViewBttns.querySelector(".grid");
  var listView = changeViewBttns.querySelector(".list");
  var notesSection = document.getElementById("notes-section");

  if (e.target == changeViewBttns || changeViewBttns.contains(e.target)) {
    if (gridView.classList.contains("active")) {
      gridView.classList.remove("active");
      listView.classList.add("active");
      notesSection.classList.add("grid");
      notesSection.classList.remove("list");
    } else if (listView.classList.contains("active")) {
      listView.classList.remove("active");
      gridView.classList.add("active");
      notesSection.classList.add("list");
      notesSection.classList.remove("grid");
    }
  }
});

/***/ }),

/***/ "./resources/js/components/dropdown-home.js":
/*!**************************************************!*\
  !*** ./resources/js/components/dropdown-home.js ***!
  \**************************************************/
/***/ (() => {

var dropdownCardActive = false;
var dropdownHeaderActive = false;
document.addEventListener("click", function (e) {
  var dropdownsCard = Array.from(document.querySelectorAll(".card-container .dropdown"));
  var dropdownHeader = document.querySelector(".header-container .dropdown"); //Dropdown card

  if (dropdownCardActive) {
    dropdownsCard.find(function (el) {
      return el.classList.contains("active");
    }).classList.remove("active");
    dropdownCardActive = false;
  } else if (e.target.matches(".dropdown-menu-bttn")) {
    e.target.closest(".card-container").lastElementChild.classList.add("active");
    dropdownCardActive = true;
  } //Dropdown header


  if (dropdownHeaderActive) {
    if (!e.target.matches(".header-container .dropdown *") && !e.target.matches(".header-container .dropdown") || e.target.matches(".close-bttn")) {
      dropdownHeader.classList.remove("active");
      dropdownHeaderActive = false;
    }
  } else if (e.target.matches(".dropdown-user-img")) {
    e.target.closest(".header-container").lastElementChild.classList.add("active");
    dropdownHeaderActive = true;
  }
});

/***/ }),

/***/ "./resources/js/components/menu.js":
/*!*****************************************!*\
  !*** ./resources/js/components/menu.js ***!
  \*****************************************/
/***/ (() => {

var menuIsActive = false;
document.addEventListener("click", function (e) {
  var menuBttn = document.getElementById("sidebar-button");
  var menu = document.getElementById("menu");
  var menuContainer = menu.querySelector(".menu-container");

  if (menuIsActive) {
    if (e.target.matches(".bttn-close") || e.target != menu && !menuContainer.contains(e.target)) {
      menu.classList.remove("active");
      menuIsActive = false;
    }
  } else if (e.target == menuBttn || menuBttn.contains(e.target)) {
    menu.classList.add("active");
    menuIsActive = true;
  }
});

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
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!******************************!*\
  !*** ./resources/js/home.js ***!
  \******************************/
__webpack_require__(/*! ./components/dropdown-home */ "./resources/js/components/dropdown-home.js");

__webpack_require__(/*! ./components/menu */ "./resources/js/components/menu.js");

__webpack_require__(/*! ./components/change_view */ "./resources/js/components/change_view.js");
})();

/******/ })()
;