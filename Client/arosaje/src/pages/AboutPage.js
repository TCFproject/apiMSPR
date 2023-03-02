import React from 'react';
import image from "../img/NosBotanisteSontToujursALEcoute.jpg"
const AboutPage = () =>{
 
    return(

         <div class="conteneur">
             <div class="texte">
                 <h2>Nous sommes A Rosa-je, le leader dans le conseil dans le domaine du jardinage</h2>
                 <h2>Nos botaniste sont toujoutrs à l'écoute, et vous offrent du conseil pour l'entretien de vos plantes </h2>
                                           
                     </div>
                 <img className="photo" src={image} alt="Profile" />
                </div>

    );
}
export default AboutPage;