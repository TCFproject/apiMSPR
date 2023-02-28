import React, { useState } from 'react';
import { Link } from 'react-router-dom';

const AddPlante = () =>{
    const [nom, setNom] = useState('');
    const [nomLatin, setNomLatin] = useState('');
  
    const handleSubmit = (event) => {
      event.preventDefault();
  
    };

    return(
   
        <form id="Plante" onSubmit={handleSubmit} >
      
        <br/><h3>Ajoutez votre plante</h3><br/> <br/><br/>
        <input
          type="text"
          placeholder="Nom de la plante"
          value={nom}
          onChange={(e) => setNom(e.target.value)}
        /><br/><br/>
        <input
          type="Text"
          placeholder="Nom latin"
          value={nomLatin}
          onChange={(e) => setNomLatin(e.target.value)}
          
        /><br/><br/><br/>
              
        <label htmlFor="photoInput">Insérer une photo :</label>
        <input type="file" id="photoInput" name="photo" accept="image/*" />
        
        <Link to="/account" className="btn btn-outline-success" type="submit">Ajouter</Link><br/><br/>

        
      </form>
      
  

    );
}
export default AddPlante;