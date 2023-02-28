import React from 'react';
import { Link } from 'react-router-dom';
import "../style/profil.css"
import profilImage from '../img/Logo_Client.png'
import LoginPage from './LoginPage';
import AddPlante from './AddPlante';
const AccountPage = () => {
  const addPlante = () =>{
      //this.state.
      
  }
    return (
        <div className="profile-page">
          <div className="left-column">
            <img id="profile-pic" src={profilImage} alt="Profile" />
            <h2>Utilisateur</h2>
          
          <div className="center-column">
            <h4>Client</h4>
            <ul>
              <li>Entretiens</li>
              <li>Plantes</li>
              <button className="btn btn-outline-success" type="submit">Ajouter une plante</button><br />
              <button  className="btn btn-outline-success" type="submit">Ajouter un entretien</button>
            </ul>
            
          </div>
          
        </div>
        <div id="post" className="center-column">Annonce
          <div class="content">
            <h2>Plante 1</h2>
            <p>Date de publication</p>
            <p>A gardé</p>
            <button>Like</button>
            {/* <button>Commenter</button> */}
            <button>Partager</button>
            <p>#plant #arosaje</p>
            <a href="#">Lien</a>
          </div>
          <div class="content">
            <h2>Plante 2</h2>
            <p>Date de publication</p>
            <p>A gardé</p>
            <button>Like</button>
            <button>Partager</button>
            <p>#plant #arosaje</p>
            <a href="#">Lien</a>
          </div>
          
        </div>
            
        </div>
      );
}
export default AccountPage;