import React, { useState } from 'react';
import { BrowserRouter, Routes, Route, Link } from 'react-router-dom';
import RegisterPage from './RegisterPage';
import { ReactDOM, render } from 'react';

const LoginPage = () => {
  const [username, setUsername] = useState('');
  const [password, setPassword] = useState('');

  const handleSubmit = (event) => {
    event.preventDefault();
    // Vérifiez les informations de connexion ici
  };
  const clickOnRegister=()=>{
    ReactDOM.render(<RegisterPage />, document.getElementById('Login'));
 
  }

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
      <button className="btn btn-outline-success" type="submit">Se connecter</button><br/><br/>
      <Link to="/register" className="btn btn-outline-success" type="submit" onClick={clickOnRegister}>Crée un compte</Link>
      
    </form>
    
    
  );
};

export default LoginPage;