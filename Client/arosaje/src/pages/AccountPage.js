import React from 'react';
import { Link, useNavigate } from 'react-router-dom';
import { useEffect, useState } from 'react';
import "../style/profil.css"
import "../style/popup.css"
import profilImage from '../img/Logo_Client.png'

import PostContainer from './PostContainer';
import { accountService } from '../service/accountService';

const AccountPage = () => {
  let navigate = useNavigate();
  const [user, setUser] = useState([])
  const [entretiens, setEntretien] = useState([])
  const logout = () =>{
    accountService.logout()
    navigate('/');
  }
  useEffect(()=> {
    fetch('http://arosaje-env-1.eba-yzz9mn8c.eu-west-3.elasticbeanstalk.com/api/v1/gardien/getAll')
    
    .then(response => {
      
      
       console.log(response);
    return   response.json()
    })
    .then(data => {
      
    //console.log(data);
    const name = data.sort((a,b)=>b.id - a.id);
    const fullname = name[0].nom + " " +name[0].prenom
   
      setUser(fullname)})
      .catch(error => {
      
        console.error(error);
        });

   });

   useEffect(()=> {
    fetch('http://arosaje-env-1.eba-yzz9mn8c.eu-west-3.elasticbeanstalk.com/api/v1/plante/getAll')
    
    .then(response => {
      
      
       console.log(response);
    return   response.json()
    })
    .then(data => {
      const res2 = data.sort((a,b)=>b.id - a.id);
      const res3 = res2[0].id
      setEntretien(res3)})
      
      .catch(error => {
      
        console.error(error);
        });

   });
   

  
   
// const [buttonAddPlante, setAddPlante] = useState(false);
// const [buttonAddEntretien, setAddEntretien] = useState(false);
    return (
        <div className="profile-page">
          <div className="left-column">
            <img id="profile-pic" src={profilImage} alt="Profile" />
            <h2>{user}</h2>
          
          <div className="center-column">
            <h4>Proprietaire</h4>
            <ul>
              <li>Entretiens : <span>{entretiens}
              </span></li>
              <li>Plantes : <span>{entretiens}</span></li><br /><br />
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