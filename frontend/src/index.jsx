/**
 * Author: github.com/annadostoevskaya
 * E-mail: iwantknow.aboutjt68h43@gmail.com
 * Create: 2024-02-05 00:59:02
 *
 * Description: <empty>
 */

const { useEffect, useRef, useState } = React;
const { Router } = ReactRouter;

function NavBar({routes})
{
  let references = routes.map((r, key) => <a key={ key } href={ r.path }>{ r.title }|</a>);
  return (<nav>{references}</nav>);
}

function Home()
{
  return <p>Home Page</p>;
}

function Contact()
{
  return <p>Contact Page</p>;
}

function About()
{
  return <p>About Page</p>;
}

function _404()
{
  return <p>Sorry... Nothing was found!</p>;
}

function Competition({id})
{
  return <p>Competition #{id}</p>;
}

function Locale({ currentLocale, locales, onChange })
{
  let options = locales.map((locale, key) => <option key={ key } value={ locale.code }>{ locale.title }</option>);
  return (<select name="locales" value={ currentLocale } onChange={ onChange }>{ options }</select>);
}

function Loading()
{
  const renderCounter  = useRef(0);
  renderCounter.current = renderCounter.current + 1;

  [isLoaded, setIsLoaded] = useState(false);
  [locale, setLocale] = useState(i18n.getlocale());

  if (!isLoaded)
  {
    i18n.init(locale, () => { setIsLoaded(true); });
    return <p>Loading...</p>;
  }

  var routes = [
    {
      title: i18n._('nav.home'),
      path: '',
      content: () => { return <Home /> },
    },

    {
      title: i18n._('nav.contact'),
      path: '#/contact',
      content: () => { return <Contact /> },
    },

    {
      title: i18n._('nav.about'),
      path: '#/about',
      content: () => { return <About /> },
    },

    {
      title: i18n._('nav.competition'),
      path: '#/competition',
      content: (urlSearchParams) => { return <Competition id={ urlSearchParams.get('id') } /> }
    },
  ];

  var locales = [
    { title: i18n._('settings.eng'), code: 'en' },
    { title: i18n._('settings.rus'), code: 'ru' }
  ];

  const changeLocale = (e) => {
    i18n.setlocale(e.target.value);
    setIsLoaded(false);
    setLocale(e.target.value);
  }
  
  return (<>
    <Locale currentLocale={ locale } locales={ locales } onChange={ changeLocale } />
    <NavBar routes={ routes } />
    <main>
      <Router routes={ routes } _404={ <_404 /> } />
    </main>
    <h1>Renders: {renderCounter.current}</h1>
  </>);
}

function Root() { return <Loading />; }
