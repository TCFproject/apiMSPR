import  LoginPage from './LoginPage';
import AboutPage from './AboutPage';

import React from 'react';

import HomePage from './HomePage';
import { BrowserRouter,Link,Route,Routes } from 'react-router-dom';
import ContactPage from './ContactPage';
const Navbar = ()=>{
  
    // const clickOnBotaniste = ()=>{
    
    //     ReactDOM.render(<LoginPage />, document.getElementById('Homepage'))
           
    // }
    // const clickOnConnection=()=>{
      
    //   ReactDOM.render(<LoginPage />,document.getElementById('Homepage'))
 
    // }
    // const clickOnLogo=()=>{

    // }
    return(
      <BrowserRouter>
        <nav className="navbar navbar-expand-lg bg-body-tertiary">
        <div className="container-fluid">
          <Link to="/" className="navbar-brand">A Rosa-je</Link>
          <button className="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span className="navbar-toggler-icon"></span>
          </button>
          <div className="collapse navbar-collapse" id="navbarSupportedContent">
            <ul className="navbar-nav me-auto mb-2 mb-lg-0">
              <li className="nav-item">
                <a className="nav-link active" aria-current="page" href="#">Accueil</a>
              </li>
              <li className="nav-item">
                <Link to="/Contact"className="nav-link" href="#">Contact</Link>
              </li>
              <li className="nav-item">
                <Link to="/about" className="nav-link" href="#">A propos</Link>
              </li>
              <li className="nav-item dropdown">
                <a className="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Services
                </a>
                
                <ul className="dropdown-menu">
                  <li><a className="dropdown-item" href="#">Garder des Plantes</a></li>
                  <li><a className="dropdown-item" href="#">Proposer des plantes à gardé</a></li>
                  <li><hr className="dropdown-divider"/></li>
                  <li><Link to="/Login" className="dropdown-item" href="#">Nos Botanistes sont à votre écoute</Link></li>
                </ul>
              </li>

            </ul>
            <form className="d-flex" role="search">
              <input className="form-control me-2" type="connexion" placeholder="Rechercher" aria-label="connexion"/>
              <Link to="/Login" className="btn btn-outline-success" type="submit">Connexion</Link>
            </form>
          </div>
        </div>
      </nav> 

      <Routes>
        <Route path="/" element={<HomePage />}></Route>
        <Route path="/Login" element={<LoginPage />}></Route>
        <Route path="/about" element={<AboutPage />}></Route>
        <Route path="/Contact" element={<ContactPage />}></Route>
      </Routes>

      </BrowserRouter>

    );
}
export default Navbar;
// function Navbar(){
//     return(

//     );
// }