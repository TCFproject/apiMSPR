import React from 'react';
import Typography from '@mui/material/Typography';
import Grid from '@mui/material/Grid';
const HomePage = () => {
    const name = "A Rosa-je";

//   const handleSubmit = (event) => {
//     event.preventDefault();
//     // Vérifiez les informations de connexion ici
//   };
    const  clickWithParams = (parameter1)=>{
      console.log(parameter1);
    }

  return (
    <div className="App">
      
     {/*  <h1 class = "typeSelector_label__L4ZOj typeSelector_labelLarge__aQBzx" >{name}</h1> */}

      <Grid item xs={7} sx={{ paddingLeft: "20px", paddingTop: "20px" }}>  
                            <Typography
                            align='left'
                            paragraph
                            variant='h4'   
                            >
                                  <div style={{ color:'#2DDE34'}}>Connectez-vous.</div> 
                                  <div style={{ color:'#2DDE34'}}>Organisez vous.</div>
                                  <span>Mettez vos plantes dans les bonnes mains.</span>
                            </Typography>
                        </Grid>
                        <div>
                          <span>Gagnez votre temps, et prenez soin de vos plantes   </span>
                          <button  type="button" class="btn btn-outline-success" onClick={ () => clickWithParams('crées to compte') }>Créer gratuitement un compte</button><br/>

                        </div>
                        
      
    </div>
  );
}

export default HomePage;