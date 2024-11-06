import React from 'react';
import './app.css';
import ReactDOM from 'react-dom/client';
import ExampleComponent from './components/ExampleComponent';
import Menu from './components/Navbar/Menu'
import Footer from './components/Footer/Footer'
import CardUsuarios from './components/CardUsuario/CardUsuario';

const rootElement = document.getElementById('app');
const footerElement = document.getElementById('footer');
const cardElement = document.getElementById('usuarios');

if (rootElement) {
    const root = ReactDOM.createRoot(rootElement);
    root.render(<Menu />);
}

if (footerElement) {
    const root = ReactDOM.createRoot(footerElement);
    root.render(<Footer/>);
}

if (cardElement) {
    const root = ReactDOM.createRoot(cardElement);
    root.render(<CardUsuarios/>);
}

