/**
* @preserve HTML5 Shiv 3.7.3 | @afarkas @jdalton @jon_neal @rem | MIT/GPL2 Licensed
*/
!function(e,c){
/*--------------------------------------------------------------------------*/
/**
   * Creates a style sheet with the given CSS text and adds it to the document.
   * @private
   * @param {Document} ownerDocument The document.
   * @param {String} cssText The CSS text.
   * @returns {StyleSheet} The style element.
   */
function n(e,t){var n=e.createElement("p"),r=e.getElementsByTagName("head")[0]||e.documentElement;return n.innerHTML="x<style>"+t+"</style>",r.insertBefore(n.lastChild,r.firstChild)}
/**
   * Returns the value of `html5.elements` as an array.
   * @private
   * @returns {Array} An array of shived element node names.
   */function i(){var e=y.elements;return"string"==typeof e?e.split(" "):e}
/**
   * Extends the built-in list of html5 elements
   * @memberOf html5
   * @param {String|Array} newElements whitespace separated list or array of new element names to shiv
   * @param {Document} ownerDocument The context document.
   */function t(e,t){var n=y.elements;"string"!=typeof n&&(n=n.join(" ")),"string"!=typeof e&&(e=e.join(" ")),y.elements=n+" "+e,m(t)}
/**
   * Returns the data associated to the given document
   * @private
   * @param {Document} ownerDocument The document.
   * @returns {Object} An object of data.
   */function l(e){var t=v[e[g]];return t||(t={},p++,e[g]=p,v[p]=t),t}
/**
   * returns a shived element for the given nodeName and document
   * @memberOf html5
   * @param {String} nodeName name of the element
   * @param {Document|DocumentFragment} ownerDocument The context document.
   * @returns {Object} The shived element.
   */function r(e,t,n){return t||(t=c),E?t.createElement(e):(n||(n=l(t)),!(r=n.cache[e]?n.cache[e].cloneNode():h.test(e)?(n.cache[e]=n.createElem(e)).cloneNode():n.createElem(e)).canHaveChildren||d.test(e)||r.tagUrn?r:n.frag.appendChild(r));var r}
/**
   * returns a shived DocumentFragment for the given document
   * @memberOf html5
   * @param {Document} ownerDocument The context document.
   * @returns {Object} The shived DocumentFragment.
   */function a(e,t){if(e||(e=c),E)return e.createDocumentFragment();for(var n=(t=t||l(e)).frag.cloneNode(),r=0,a=i(),o=a.length;r<o;r++)n.createElement(a[r]);return n}
/**
   * Shivs the `createElement` and `createDocumentFragment` methods of the document.
   * @private
   * @param {Document|DocumentFragment} ownerDocument The document.
   * @param {Object} data of the document.
   */function o(t,n){n.cache||(n.cache={},n.createElem=t.createElement,n.createFrag=t.createDocumentFragment,n.frag=n.createFrag()),t.createElement=function(e){
//abort shiv
return y.shivMethods?r(e,t,n):n.createElem(e)},t.createDocumentFragment=Function("h,f","return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&("+
// unroll the `createElement` calls
i().join().replace(/[\w\-:]+/g,function(e){return n.createElem(e),n.frag.createElement(e),'c("'+e+'")'})+");return n}")(y,n.frag)}
/*--------------------------------------------------------------------------*/
/**
   * Shivs the given document.
   * @memberOf html5
   * @param {Document} ownerDocument The document to shiv.
   * @returns {Document} The shived document.
   */function m(e){e||(e=c);var t=l(e);return!y.shivCSS||f||t.hasCSS||(t.hasCSS=!!n(e,
// corrects block display not defined in IE6/7/8/9
"article,aside,dialog,figcaption,figure,footer,header,hgroup,main,nav,section{display:block}mark{background:#FF0;color:#000}template{display:none}")),E||o(e,t),e}
/*--------------------------------------------------------------------------*/
/**
   * The `html5` object is exposed so that more elements can be shived and
   * existing shiving can be detected on iframes.
   * @type Object
   * @example
   *
   * // options can be changed before the script is included
   * html5 = { 'elements': 'mark section', 'shivCSS': false, 'shivMethods': false };
   */
/*jshint evil:true */
/** version */
var s="3.7.3",u=e.html5||{},d=/^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i,h=/^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i,f,g="_html5shiv",p=0,v={},E;
/** Preset options */!function(){try{var e=c.createElement("a");e.innerHTML="<xyz></xyz>",
//if the hidden property is implemented we can assume, that the browser supports basic HTML5 Styles
f="hidden"in e,E=1==e.childNodes.length||function(){
// assign a false positive if unable to shiv
c.createElement("a");var e=c.createDocumentFragment();return void 0===e.cloneNode||void 0===e.createDocumentFragment||void 0===e.createElement}()}catch(e){
// assign a false positive if detection fails => unable to shiv
E=f=!0}}();var y={
/**
     * An array or space separated string of node names of the elements to shiv.
     * @memberOf html5
     * @type Array|String
     */
elements:u.elements||"abbr article aside audio bdi canvas data datalist details dialog figcaption figure footer header hgroup main mark meter nav output picture progress section summary template time video",
/**
     * current version of html5shiv
     */
version:s,
/**
     * A flag to indicate that the HTML5 style sheet should be inserted.
     * @memberOf html5
     * @type Boolean
     */
shivCSS:!1!==u.shivCSS,
/**
     * Is equal to true if a browser supports creating unknown/HTML5 elements
     * @memberOf html5
     * @type boolean
     */
supportsUnknownElements:E,
/**
     * A flag to indicate that the document's `createElement` and `createDocumentFragment`
     * methods should be overwritten.
     * @memberOf html5
     * @type Boolean
     */
shivMethods:!1!==u.shivMethods,
/**
     * A string to describe the type of `html5` object ("default" or "default print").
     * @memberOf html5
     * @type String
     */
type:"default",
// shivs the document according to the specified `html5` object options
shivDocument:m,
//creates a shived element
createElement:r,
//creates a shived documentFragment
createDocumentFragment:a,
//extends list of elements
addElements:t};
/*--------------------------------------------------------------------------*/
// expose html5
e.html5=y,
// shiv the document
m(c),"object"==typeof module&&module.exports&&(module.exports=y)}("undefined"!=typeof window?window:this,document);