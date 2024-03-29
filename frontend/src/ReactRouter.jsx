/**
 * Author: github.com/annadostoevskaya
 * E-mail: iwantknow.aboutjt68h43@gmail.com
 * Create: 2024-02-05 00:18:08
 * 
 * Description: 
 * - TODO(annad): One Component - Multiple Routes, aliases
 */

(((global, factory) => {
  typeof exports === 'object' && typeof module !== 'undefined' ? factory(exports) :
  typeof define === 'function' && define.amd ? define(['exports'], factory) :
  (global = global || self, factory(global.ReactRouter = {}, global.React));
})(this, ((exports, React) => { 'use strict';

  const extractPath = (route) => {
    return route.split('?').at(0);
  }

  const extractParams = () => {
    let params = window.location.hash.split('?').pop();
    return new URLSearchParams(params);
  }

  exports.Router = ({ routes, _404 }) => {
    const [route, setRoute] = React.useState(window.location.hash);

    const handleRoute = () => setRoute(window.location.hash);

    React.useEffect(() => {
      window.addEventListener("hashchange", handleRoute);
      return () => window.removeEventListener("hashchange", handleRoute);
    }, []);

    let content = _404 ?? '404: Not Found';

    routes.map(r => {
      if (r.path == extractPath(route)) 
        content = r.content(extractParams(route));
    });

    return content;
  }
})));
