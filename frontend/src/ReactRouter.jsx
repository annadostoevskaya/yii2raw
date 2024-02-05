/**
 * Author: github.com/annadostoevskaya
 * E-mail: iwantknow.aboutjt68h43@gmail.com
 * Create: 2024-02-05 00:18:08
 * 
 * Description: 
 * - TODO(annad): Pass arguments by URL
 */

(((global, factory) => {
  typeof exports === 'object' && typeof module !== 'undefined' ? factory(exports) :
  typeof define === 'function' && define.amd ? define(['exports'], factory) :
  (global = global || self, factory(global.ReactRouter = {}));
})(this, ((exports) => { 'use strict';
  
  exports.Router = ({routes, _404}) => {
    let initialized = useRef(false);
    const [route, setRoute] = useState(window.location.hash);
    
    const handleRoute = ((e) => {
      setRoute(window.location.hash);
    });
  
    if (initialized.current === false)
    {
      window.addEventListener("hashchange", handleRoute);
      initialized.current = true;
    }
  
    let content = _404 ?? '404: Not Found';
  
    routes.map(r => {
      if (r.path == route) content = r.content();
    });
  
    return content;
  }
})));
