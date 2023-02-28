import React, { useState } from 'react';
import { Link } from 'react-router-dom';

const AddEntretien = () =>{
    const [titre, setTitre] = useState('');
    const [intitule, setIntitule] = useState('');
    const [date, setDate] = useState('');
  
    const handleSubmit = (event) => {
      event.preventDefault();
  
    };

    return(
   
        <form id="Entretien" onSubmit={handleSubmit} >
      
        <br/><h3>Crée une annonce d'entretien</h3><br/> <br/><br/>
        <input
          type="text"
          placeholder="Titre de votre entretien"
          value={titre}
          onChange={(e) => setTitre(e.target.value)}
        /><br/><br/>
        <input
          type="Text"
          placeholder="L'intitule d'entretien"
          value={intitule}
          onChange={(e) => setIntitule(e.target.value)}
          
        /><br/><br/><br/>
        <input
          type="Date"
          placeholder="Date d'entretien"
          value={date}
          onChange={(e) => setDate(e.target.value)}
          
        /><br/><br/><br/>
        
        <label htmlFor="photoInput">Insérer une photo :</label>
        <input type="file" id="photoInput" name="photo" accept="image/*" />

        <Link to="/account" className="btn btn-outline-success" type="submit">Ajouter</Link><br/><br/>

        
      </form>
      
  

    );
}
export default AddEntretien;