/**
 *
 * @constructor
 */
let html = document.querySelector('html')

function Wic(){
   const btn = '.wic-contast-btn'
   const body = 'body'



   document.querySelectorAll(btn).forEach(el=>
   {
      el.addEventListener('click',switchHandler, false)
   })

   function switchHandler(event){
      if (html.style.filter !=''){
         html.style.filter = ''
         deleteCookie('gray')
      }else{
         html.style.filter = 'grayscale(100%)'
         setCookie('gray',true)
      }

   }
}

window.addEventListener("load", function(event) {
   Wic()
   if (getCookie('gray')){
      html.style.filter= 'grayscale(100%)'
   }
});

/**
 *
 * @param name
 * @return {string|undefined}
 */

function getCookie(name) {
   let matches = document.cookie.match(new RegExp(
       "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
   ));
   return matches ? decodeURIComponent(matches[1]) : undefined;
}

/**
 *
 * @param name
 * @param value
 * @param options
 */
function setCookie(name, value, options = {}) {

   options = {
      path: '/',
      // при необходимости добавьте другие значения по умолчанию
      ...options
   };

   if (options.expires instanceof Date) {
      options.expires = options.expires.toUTCString();
   }

   let updatedCookie = encodeURIComponent(name) + "=" + encodeURIComponent(value);

   for (let optionKey in options) {
      updatedCookie += "; " + optionKey;
      let optionValue = options[optionKey];
      if (optionValue !== true) {
         updatedCookie += "=" + optionValue;
      }
   }

   document.cookie = updatedCookie;
}

/**
 *
 * @param name
 */
function deleteCookie(name) {
   setCookie(name, "", {
      'max-age': -1
   })
}