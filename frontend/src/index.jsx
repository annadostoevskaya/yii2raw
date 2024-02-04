/**
 * Author: github.com/annadostoevskaya
 * E-mail: iwantknow.aboutjt68h43@gmail.com
 * Create: 2024-02-05 00:59:02
 *
 * Description: <empty>
 */

const { Children, useRef, useState } = React;
const { Router } = ReactRouter;

function Reference({title, href})
{
  return <a href={ href }>{ title }|</a>;
}

function NavBar({routes})
{
  let references = routes.map((r, key) => <Reference key={ key } title={ r.title } href={ r.path } />);
  return (<div className="nav-bar">
    {references}
  </div>);
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
  return <p>About Page</p>
}

function _404()
{
  return <p>Sorry... Nothing was found!</p>
}

function Root()
{
  routes = [
    {
      title: 'Home',
      path: '#/',
      content: () => { return <Home /> },
    },

    {
      title: 'Contact',
      path: '#/contact',
      content: () => { return <Contact /> },
    },

    {
      title: 'About',
      path: '#/about',
      content: () => { return <About /> },
    },
  ];

  return <>
    <NavBar routes={ routes } />
    <main>
      <Router routes={ routes } _404={<_404 />} />
    </main>
  </>
}
