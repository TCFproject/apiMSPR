import React from 'react';
import Typography from '@mui/material/Typography';
import Grid from '@mui/material/Grid';
import { Link } from 'react-router-dom';
import RegisterPage from './RegisterPage';
import { ReactDOM } from 'react';
import { Button } from 'bootstrap';
import { RegisterButton } from '../style/Styles';
import { margin } from '@mui/system';
import imageGenerale from '../img/photoGeneral.jpg'
import "../style/home.css";
const HomePage = () => {

  return (
          <div id="Home" className="App" >
            
            <div className="home1">
          
            <Grid item xs={7} sx={{ paddingLeft: "20px", paddingTop: "20px" }}>  
                                  <Typography
                                  align='left'
                                  paragraph
                                  variant='h3'   
                                  >
                                    <br /><br /><br /><br />
                                        <span style={{ color:'#2DDE34'}}>Connectez-vous.</span> <br />
                                        <span style={{ color:'#2DDE34'}}>Organisez-vous.</span> <br />
                                        <span>Laissez vos plantes entre de bonnes mains.</span>
                                  </Typography>
                              </Grid><br/><br/>
                              </div>
                              <div><br/>
                              <Typography
                                  align='center'
                                  paragraph
                                  variant='h6'   
                                  >   
                                <span>Gagnez votre temps, et prenez soin de vos plantes   </span>
                                <Link  to="/register" type="button" class="btn btn-outline-success" >Créer gratuitement un compte</Link><br/><br/>
                                </Typography>
                      
                                <div class="conteneur">
                                      <div class="texte">
                                         <h1>Votre expert dans le conseil d'entretien des plantes</h1>
                                          
                                      </div>
                                      <img className="photo" src={imageGenerale} alt="Profile" />
                                </div>



                                
                              </div>
                              
          </div>

  );


  }
export default HomePage;

