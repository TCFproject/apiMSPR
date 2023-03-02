

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
    
      // axios.get('http://reader-saga.com/botaniste/list',{mode: 'no-cors'})
      //   .then(response => {
      //       //setEntretien(response.data)
      //       console.log(response.data);
      //     })
            
              
      //   .catch(error => {
      //        console.log(error);
      // });


    
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
      fetch('http://reader-saga.com/botaniste/list', { method: 'get', mode:'no-cors'})
      
      .then(response => {
         //console.log(response);
        return response.json()
      })
      .then(data => {
        
        setEntretien(data)})
        .catch(error => {
        
          //console.error(error);
          });
     console.log(entretiens);
     }, []);
     


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
                        <h2>{entretien.nomLatin}</h2>
                        <p>A gardé</p>
                        <button>Envoyer une demande de garde</button>
                        
                  </div>  
                ))
            }
        
        
      </div>

    );
}
export default PostContainer;