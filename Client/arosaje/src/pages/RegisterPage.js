import React from "react";
import { useState } from "react";
import '../style/Styles.js';
import axios from 'axios';
import { useNavigate } from 'react-router-dom';


const RegisterPage = () => {

  let navigate = useNavigate();

  const [name, setFirstname] = useState('');
  const [lastname, setLastname] = useState('');
  const [email, setMail] = useState('');
  const [phone, setMobile] = useState('');
  const [mdp, setPassword] = useState('');

  const handleSubmit = async (event) => {
    event.preventDefault();
    const form = event.target;
    const formData = new FormData(form);
    try {
      const response = await axios.post('http://arosaje-env-1.eba-yzz9mn8c.eu-west-3.elasticbeanstalk.com/api/v1/gardien', formData);
      const data = response.data;
      console.log(data);
      
    } catch (error) {
      console.error(error);
    }
    navigate('/login')
  }
   



  return (

    <form id="Register" onSubmit={handleSubmit} >
      
      <br/><h3>Je crée mon compte</h3><br/> <br/><br/>
      <input
        type="text"
        placeholder="Nom *"
        name="lastname"
        value={lastname}
        onChange={(e) => setLastname(e.target.value)}
      />
      <input
        type="text"
        placeholder="Prénom *"
        name="name"
        value={name}
        onChange={(e) => setFirstname(e.target.value)}
        
      /><br/><br/><br/>
      <input
        type="email"
        placeholder="Adresse email *"
        name="email"
        value={email}
        onChange={(e) => setMail(e.target.value)}
        
      />
      <input
        type="text"
        placeholder="Téléphone *"
        name="phone"
        value={phone}
        onChange={(e) => setMobile(e.target.value)}
        
      /><br/><br/><br/>
      <input
        type="password"
        placeholder="Mot de passe *"
        name="mdp"
        value={mdp}
        onChange={(e) => setPassword(e.target.value)}
        
      />
      <input
        type="password"
        placeholder="Confirmation du Mdp *"
        name="mdp"
        value={mdp}
        onChange={(e) => setPassword(e.target.value)}
        
      /><br/><br/><br/>
      <div>
        <input type = "checkbox"></input>
        <h9> Je souhaite recevoir toute l’actualité A Rosa-je par SMS et Email ***</h9>
      </div>
      <br/>
      <button className="btn btn-outline-success" type="submit">S'inscrire</button>
      <p className="parag">En m’inscrivant, je certifie avoir plus de 18 ans et j’accepte l’intégralité des CGV et Données Personnelles. <br/>Si vous souhaitez recevoir les informations et bons plans A Rosa-je, merci de cocher la case "Je souhaite recevoir toute l’actualité A Rosa-je.</p>
      
    </form>
    

    
  );
}
export default RegisterPage;
