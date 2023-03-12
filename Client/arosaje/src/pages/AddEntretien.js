import React, { useState } from 'react';
import { Link } from 'react-router-dom';
import "../style/popup.css"
import axios from 'axios';
import { useNavigate } from 'react-router-dom';
const AddEntretien = (props) =>{
  let navigate = useNavigate();
    const [nom, setTitre] = useState('');
    const [type, setIntitule] = useState('');
    const [description, setMessage] = useState('');
  
    const handleSubmit = async (event) => {
      event.preventDefault();
      const form = event.target;
      const formData = new FormData(form);
      
      fetch('http://arosaje-env-1.eba-yzz9mn8c.eu-west-3.elasticbeanstalk.com/api/v1/plante', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({
          data: formData
        })
      })
        .then(response => response.json())
        .then(data => {
          console.log(data);
        })
        .catch(error => {
          console.error(error);
        });
        //----------
      
    navigate('/account')
  
  }

    return(

              <form id="Entretien" onSubmit={handleSubmit} >
            
              <br/><h3>Crée une annonce d'entretien</h3><br/> <br/><br/>
              <input
                type="text"
                placeholder="Titre de votre entretien"
                name="nom"
                value={nom}
                onChange={(e) => setTitre(e.target.value)}
              /><br/><br/>
              <input
                type="Text"
                placeholder="L'intitule d'entretien"
                name="type"
                value={type}
                onChange={(e) => setIntitule(e.target.value)}
                
              /><br/><br/><br/>
              {/* <input
                type="Date"
                placeholder="Date d'entretien"
                value={date}
                onChange={(e) => setDate(e.target.value)}
                
              /><br/><br/><br/> */}
              <label>
              <textarea 
              placeholder="Description" 
              class="form-control" 
              name="description"
              value={description} 
              onChange={(e) => setMessage(e.target.value)} />

              </label><br/><br/> 
              <label htmlFor="photoInput">Insérer une photo :</label>
              <input type="file" id="photoInput" name="photo" accept="image/*" />
              <br/><br/>
              <Link className="btn btn-outline-success" type="submit">Ajouter</Link>
              
              <br/>
              
              
            </form>

  

    );
}
export default AddEntretien;