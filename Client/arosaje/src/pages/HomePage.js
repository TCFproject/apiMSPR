import React from 'react';
import Typography from '@mui/material/Typography';
import Grid from '@mui/material/Grid';
import { BrowserRouter,Link,Route,Routes } from 'react-router-dom';
import RegisterPage from './RegisterPage';
import { ReactDOM } from 'react';
import { Button } from 'bootstrap';
const HomePage = () => {

  function clickOnRegister(){
    
  ReactDOM.render(<RegisterPage />, document.getElementById('Homepage'));
 
}




  return (
    // <BrowserRouter>
          <div id="Home" className="App" >
            
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
                              <Typography
                                  align='right'
                                  paragraph
                                  variant='h6'   
                                  >
                                    
                                <span>Gagnez votre temps, et prenez soin de vos plantes   </span>
                                <button type="button" class="btn btn-outline-success" onClick={clickOnRegister} >Créer gratuitement un compte</button><br/>
                                </Typography>
                              </div>
                              
          </div>

  );

  }
export default HomePage;