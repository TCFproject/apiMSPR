
import React from 'react';
import { Link } from 'react-router-dom';
import logo from "../img/logoarosaje.png";
import "../style/home.css"
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

        <nav className="navbar navbar-expand-lg bg-body-tertiary">
        <div className="container-fluid">
          {/* <Link to="/" className="navbar-brand">A Rosa-je</Link> */}
          <img className="logo" src={logo} alt="Logo" />
          <button className="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span className="navbar-toggler-icon"></span>
          </button>
          <div className="collapse navbar-collapse" id="navbarSupportedContent">
            <ul className="navbar-nav me-auto mb-2 mb-lg-0">
              <li className="nav-item">
                <Link to="/" className="nav-link active" aria-current="page" href="#">Accueil</Link>
              </li>
              <li className="nav-item">
                <Link to="/contact"className="nav-link" href="#">Contact</Link>
              </li>
              <li className="nav-item">
                <Link to="/about" className="nav-link" href="#">A propos</Link>
              </li>


            </ul>
            <form className="d-flex" role="search">
              <input className="form-control me-2" type="recherche" placeholder="Rechercher" aria-label="recherche"/>
              <button class="btn btn-outline-success" type="submit">Rechercher</button>
              <Link to="/login" className="btn btn-outline-success" type="submit">Connexion</Link>
            </form>
          </div>
        </div>
      </nav> 




    );
}
export default Navbar;
// function Navbar(){
//     return(

//     );
// }