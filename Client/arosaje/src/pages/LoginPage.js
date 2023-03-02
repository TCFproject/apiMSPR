import React, { useState } from 'react';
import { Link } from 'react-router-dom';
import profilImage from '../img/Logo_Client.png';
import axios from 'axios';
import { useNavigate } from 'react-router-dom';

const LoginPage = () => {
  let navigate = useNavigate();
  const [email, setEmail] = useState('');
  const [mdp, setPassword] = useState('');

  const handleSubmit = async (event) => {
    event.preventDefault();
    const form = event.target;
    const formData = new FormData(form);
    // try {
    //   const response = await axios.post('http://reader-saga.com/proprietaire', formData);
    //   const data = response.data;
    //   console.log(data);

      
    // } catch (error) {
    //   console.error(error);
    // }
    // //navigate('/account')
    try {
      const response = await fetch('http://reader-saga.com/proprietaire',{ mode: 'no-cors' }, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: formData,
      });
      const result = await response.json();
      console.log(result);
    } catch (error) {
      //console.error(error);
    }
  }
  return (

    <form id="Login" onSubmit={handleSubmit} >
      <img id="profile-pic" src={profilImage} alt="Profile" />
      <br/><h3>Connectez-vous à <br/> votre compte</h3><br/> <br/><br/>
      <input
        type="text"
        placeholder="Email"
        name="email"
        value={email}
        onChange={(e) => setEmail(e.target.value)}
      /><br/><br/>
      <input
        type="password"
        placeholder="Mot de passe"
        name="mdp"
        value={mdp}
        onChange={(e) => setPassword(e.target.value)}
        
      /><br/><br/><br/>


      <button className="btn btn-outline-success" type="submit">Se connecter</button><br/><br/>
      <Link to="/register" className="btn btn-outline-success" type="submit">Crée un compte</Link>
      
    </form>
    

    
  );
};

export default LoginPage;