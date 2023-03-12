

import React, { useEffect, useState } from 'react';
import axios from 'axios';

//import { useNavigate } from 'react-router-dom';
function PostContainer() {
  //let navigate = useNavigate();
    const [entretiens, setEntretien] = useState([])
    //  const affichage = () => {
    //   fetch('http://reader-saga.com/botaniste/list', { mode: 'no-cors' })
    //       .then(response => response.json())
    //         .then(data => {
    //           setEntretien(data)
    //         })
    //         .catch(error => {
    //           //console.error(error);
    //           });
      
    //  }
    
     


    
    // const get = async (event) => {
    //   const form = event.target;
    // const formData = new FormData(form);
    // try {
    //   const response = await axios.post('http://reader-saga.com/botaniste/list', formData);
    //   const data = response.data;
    //   console.log(data);
      
    // } catch (error) {
    //   console.error(error);
    // }
     
    //   console.log('ui');
      
    // }

     useEffect(()=> {
      fetch('http://arosaje-env-1.eba-yzz9mn8c.eu-west-3.elasticbeanstalk.com/api/v1/plante/getAll')
      
      .then(response => {
        
        
         console.log(response);
      return   response.json()
      })
      .then(data => {
        
      console.log(data);
        setEntretien(data.sort((a,b)=>b.id - a.id))})
        .catch(error => {
        
          console.error(error);
          });

     });
     


    return(
        <div id="post" className="center-column">Annonce d'entretien
        <div className="content">
          {/* <h2>Plante 1</h2>
          <p>Date de publication</p>
          <p>A gardé</p>
          <button>Envoyer une demande de garde</button>
          <p>#plante #arosaje</p> */}
          
        </div>
        
            {
                entretiens.map(entretien =>(
                 
                  <div className="content">
                        <h2>{entretien.nom}</h2> 
                        <h2>{entretien.type}</h2>
                        <h2>A gardé</h2>
                        <p>{entretien.description}</p>
                        <button>Envoyer une demande de garde</button>
                        
                  </div>  
                ))
            }
        
        
      </div>

    );
}
export default PostContainer;