import React from "react";
import { useState } from "react";
import { Link } from 'react-router-dom';
import '../style/Styles.js';

const RegisterPage = () => {
  const [firstname, setFirstname] = useState('');
  const [lastname, setLastname] = useState('');
  const [mail, setMail] = useState('');
  const [mobile, setMobile] = useState('');
  const [password, setPassword] = useState('');
  const handleSubmit = (event) => {
    event.preventDefault();
    // Vérifiez les informations de connexion ici
  };
  // const clickOnRegister=()=>{
  //   ReactDOM.render(<RegisterPage />, document.getElementById('Login'));
 
  // }

  return (

    <form id="Login" onSubmit={handleSubmit} >
      
      <br/><h3>Je crée mon compte</h3><br/> <br/><br/>
      <input
        type="text"
        placeholder="Nom *"
        value={lastname}
        onChange={(e) => setLastname(e.target.value)}
      />
      <input
        type="text"
        placeholder="Prénom *"
        value={firstname}
        onChange={(e) => setFirstname(e.target.value)}
        
      /><br/><br/><br/>
      <input
        type="email"
        placeholder="Adresse email *"
        value={mail}
        onChange={(e) => setMail(e.target.value)}
        
      />
      <input
        type="text"
        placeholder="Téléphone *"
        value={mobile}
        onChange={(e) => setMobile(e.target.value)}
        
      /><br/><br/><br/>
      <input
        type="password"
        placeholder="Mot de passe *"
        value={password}
        onChange={(e) => setPassword(e.target.value)}
        
      />
      <input
        type="password"
        placeholder="Confirmation du mot de passe *"
        value={password}
        onChange={(e) => setPassword(e.target.value)}
        
      /><br/><br/><br/>
      <div>
        <input type = "checkbox"></input>
        <h9> Je souhaite recevoir toute l’actualité A Rosa-je par SMS et Email ***</h9>
      </div>
      <br/>
      <Link to="/account" className="btn btn-outline-success" type="submit">S'inscrire</Link>
      <p className="parag">En m’inscrivant, je certifie avoir plus de 18 ans et j’accepte l’intégralité des CGV et Données Personnelles. <br/>Si vous souhaitez recevoir les informations et bons plans A Rosa-je, merci de cocher la case "Je souhaite recevoir toute l’actualité A Rosa-je.</p>
      
    </form>
    

    
  );
}
export default RegisterPage;
