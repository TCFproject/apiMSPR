import React, { useState } from 'react';
import { Link } from 'react-router-dom';
import axios from 'axios';
import { useNavigate } from 'react-router-dom';

const AddPlante = () =>{
  let navigate = useNavigate();
    const [nom, setNom] = useState('');
    const [nom_latin, setNomLatin] = useState('');
  
    const handleSubmit = async (event) => {
      event.preventDefault();
      const form = event.target;
      const formData = new FormData(form);
      try {
        const response = await axios.post('http://reader-saga.com/proprietaire/newPlant',formData)
        const data = response.data;
        console.log(data);
        
      } catch (error) {
        console.error(error);
      }
      navigate('/account')
    
    }

    return(
   
        <form id="Plante" onSubmit={handleSubmit} >
      
        <br/><h3>Ajoutez votre plante</h3><br/> <br/><br/>
        <input
          type="text"
          placeholder="Nom de la plante"
          name="nom"
          value={nom}
          onChange={(e) => setNom(e.target.value)}
        /><br/><br/>
        <input
          type="Text"
          placeholder="Nom latin"
          name="nom_latin"
          value={nom_latin}
          onChange={(e) => setNomLatin(e.target.value)}
          
        /><br/><br/><br/>
              
        <label htmlFor="photoInput">Insérer une photo :</label>
        <input type="file" id="photoInput" name="photo" accept="image/*" />
        <br/><br/>
        <Link className="btn btn-outline-success" type="submit">Ajouter</Link><br/><br/>

        
      </form>
      
  

    );
}
export default AddPlante;