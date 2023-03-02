import React, { useState } from 'react';
import { Link } from 'react-router-dom';
import "../style/popup.css"
import axios from 'axios';
import { useNavigate } from 'react-router-dom';
const AddEntretien = (props) =>{
  let navigate = useNavigate();
    const [title, setTitre] = useState('');
    const [intitule, setIntitule] = useState('');
    const [date, setDate] = useState('');
  
    const handleSubmit = async (event) => {
      event.preventDefault();
      const form = event.target;
      const formData = new FormData(form);
      try {
      const response = await axios.post('http://reader-saga.com/proprietaire/postEntretien', formData)
      const data = response.data;
      console.log(data);
      
    } catch (error) {
      console.error(error);
    }
    navigate('/account')
  
  }

    return(

              <form id="Entretien" onSubmit={handleSubmit} >
            
              <br/><h3>Crée une annonce d'entretien</h3><br/> <br/><br/>
              <input
                type="text"
                placeholder="Titre de votre entretien"
                name="title"
                value={title}
                onChange={(e) => setTitre(e.target.value)}
              /><br/><br/>
              <input
                type="Text"
                placeholder="L'intitule d'entretien"
                name="intitule"
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
              <br/><br/>
              <Link className="btn btn-outline-success" type="submit">Ajouter</Link>
              
              <br/>
              
              
            </form>

  

    );
}
export default AddEntretien;