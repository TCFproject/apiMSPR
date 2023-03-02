import React from 'react';
import { Link, useNavigate } from 'react-router-dom';
import "../style/profil.css"
import "../style/popup.css"
import profilImage from '../img/Logo_Client.png'

import PostContainer from './PostContainer';
import { accountService } from '../service/accountService';

const AccountPage = () => {
  let navigate = useNavigate();

  const logout = () =>{
    accountService.logout()
    navigate('/');
  }
// const [buttonAddPlante, setAddPlante] = useState(false);
// const [buttonAddEntretien, setAddEntretien] = useState(false);
    return (
        <div className="profile-page">
          <div className="left-column">
            <img id="profile-pic" src={profilImage} alt="Profile" />
            <h2>Utilisateur</h2>
          
          <div className="center-column">
            <h4>Client</h4>
            <ul>
              <li>Entretiens : <span>0</span></li>
              <li>Plantes : <span>0</span></li><br /><br />
              <Link to="addPlante" className="btn btn-outline-success" type="submit">Ajouter une plante</Link><br /><br />
              <Link to="addEntretien" className="btn btn-outline-success" type="submit">Ajouter un entretien</Link><br /><br />
              <button onClick={logout} type="button" class="btn btn-warning">Déconnexion</button>
            </ul>
            
          </div>
          
        </div>
        <PostContainer />
        {/* <AddEntretien trigger={buttonAddEntretien} setTrigger={setAddEntretien}>
          </AddEntretien> */}
        </div>
      );
}
export default AccountPage;