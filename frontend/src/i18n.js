/**
 * @author github.com/annadostoevskaya
 * @email iwantknow.aboutjt68h43@gmail.com
 * @create date 2024-02-25 20:21:22
 * @modify date 2024-02-29 23:21:29
 * @desc [description]
 */
(((global, factory) => {
    typeof exports === 'object' && typeof module !== 'undefined' ? factory(exports) :
    typeof define === 'function' && define.amd ? define(['exports'], factory) :
    (global = global || self, factory(global.i18n = {}));
  })(this, ((exports) => { 'use strict';
  
    let messages_ = {};
  
    const init = (locale, cb = null) => {  
      fetch(`/api/i18n/${locale}.json`, {
        method: 'GET',
        headers: {Accept: 'application/json'},
        mode: 'cors',
        cache: 'default'
      }).then((res) => {
        // TODO(annad): Error handling
        if (!res.ok) { throw new Error(`HTTP Error! Status: ${res.status}`); }
  
        return res.json();
      }).then((messages) => {
        messages_ = messages;
        if (cb !== null) cb();
      }).catch((err) => {
        throw err;
      });
    }
  
    const setlocale = (locale) => {
      // TODO(annad): set domain=.localhost
      document.cookie = `settings.locale=${locale}; max-age=324000; samesite=lax`; // NOTE(annad): 324000, 3 month.
    }
  
    const getlocale = () => {
      let cookie = document.cookie.match(/(?:^|; )settings\.locale=([^;]*)/);
      let locale = cookie ? decodeURIComponent(cookie.at(1)) : 'ru';
      return locale;
    }
  
    const _ = (id) => {
      if(messages_[id] === undefined)
        return id;
      
      return messages_[id];
    }
  
    exports._ = _;
    exports.init = init;
    exports.getlocale = getlocale;
    exports.setlocale = setlocale;
  })));
  