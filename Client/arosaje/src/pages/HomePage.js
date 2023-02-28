import React from 'react';
import Typography from '@mui/material/Typography';
import Grid from '@mui/material/Grid';
import { Link } from 'react-router-dom';
import RegisterPage from './RegisterPage';
import { ReactDOM } from 'react';
import { Button } from 'bootstrap';
import { RegisterButton } from '../style/Styles';
import { margin } from '@mui/system';
const HomePage = () => {

  return (
          <div id="Home" className="App" >
            

          
            <Grid item xs={7} sx={{ paddingLeft: "20px", paddingTop: "20px" }}>  
                                  <Typography
                                  align='left'
                                  paragraph
                                  variant='h4'   
                                  >
                                        <span style={{ color:'#2DDE34'}}>Connectez-vous.</span> <br />
                                        <span style={{ color:'#2DDE34'}}>Organisez-vous.</span> <br />
                                        <span>Laissez vos plantes entre de bonnes mains.</span>
                                  </Typography>
                              </Grid><br/><br/>
                              <div>
                              <Typography
                                  align='center'
                                  paragraph
                                  variant='h6'   
                                  >   
                                <span>Gagnez votre temps, et prenez soin de vos plantes   </span>
                                <Link  to="/register" type="button" class="btn btn-outline-success" >Créer gratuitement un compte</Link><br/>
                                </Typography>

                              </div>
                              
          </div>

  );


  }
export default HomePage;

