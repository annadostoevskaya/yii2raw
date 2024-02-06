/**
 * Author: github.com/annadostoevskaya
 * E-mail: iwantknow.aboutjt68h43@gmail.com
 * Create: 2024-02-05 00:18:08
 * 
 * Description: 
 * - TODO(annad): Pass arguments by URL
 * - TODO(annad): One Component - Multiple Routes
 */

(((global, factory) => {
  typeof exports === 'object' && typeof module !== 'undefined' ? factory(exports) :
  typeof define === 'function' && define.amd ? define(['exports'], factory) :
  (global = global || self, factory(global.ReactRouter = {}));
})(this, ((exports) => { 'use strict';

  const { useEffect, useState } = React;

  exports.Router = ({routes, _404}) => {
    const [route, setRoute] = useState(window.location.hash);

    const handleRoute = () => setRoute(window.location.hash);

    useEffect(() => {
      window.addEventListener("hashchange", handleRoute);
      return () => window.removeEventListener("hashchange", handleRoute);
    }, []);

    let content = _404 ?? '404: Not Found';

    routes.map(r => {
      if (r.path == route) content = r.content();
    });

    return content;
  }
})));
