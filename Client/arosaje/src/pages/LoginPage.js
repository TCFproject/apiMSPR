import React, { useState } from 'react';
import { Link } from 'react-router-dom';
const LoginPage = () => {
  const [username, setUsername] = useState('');
  const [password, setPassword] = useState('');

  const handleSubmit = (event) => {
    event.preventDefault();

  };


  return (

    <form id="Login" onSubmit={handleSubmit} >
      
      <br/><h3>Connectez-vous à <br/> votre compte</h3><br/> <br/><br/>
      <input
        type="text"
        placeholder="Nom d'utilisateur"
        value={username}
        onChange={(e) => setUsername(e.target.value)}
      /><br/><br/>
      <input
        type="password"
        placeholder="Mot de passe"
        value={password}
        onChange={(e) => setPassword(e.target.value)}
        
      /><br/><br/><br/>


      <Link to="/account" className="btn btn-outline-success" type="submit">Se connecter</Link><br/><br/>
      <Link to="/register" className="btn btn-outline-success" type="submit">Crée un compte</Link>
      
    </form>
    

    
  );
};

export default LoginPage;