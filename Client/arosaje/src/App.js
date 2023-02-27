
import './App.css';
import { BrowserRouter as Router, Route, Routes, BrowserRouter } from 'react-router-dom';
import  HomePage from './pages/HomePage';
import  LoginPage from './pages/LoginPage';
import React from 'react';
import Navbar from './pages/Navbar';
import { Switch } from '@mui/material';
import AboutPage from './pages/AboutPage';
import ContactPage from './pages/ContactPage';
import Footer from './pages/Footer';
import RegisterPage from './pages/RegisterPage';
import AccountPage from './pages/AccountPage';


function App() {

  return (
   <BrowserRouter>
          <div className="App">
              <Navbar />
              <AccountPage />
              
                <Routes>
                <Route exact path="/" component={HomePage}/>
                <Route path="/login" component={LoginPage}/>
                <Route path="/about" component={AboutPage}/>
                <Route path="/contact" component={ContactPage}/>
                </Routes>
                <Footer />
                </div>

                </BrowserRouter>



);

}

export default App;
