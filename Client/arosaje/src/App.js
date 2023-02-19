
import './App.css';
import { BrowserRouter } from 'react-router-dom';
import { BrowserRouter as Router, Route, Link } from 'react-router-dom';
import  HomePage from './pages/HomePage';
import  LoginPage from './pages/LoginPage';
import React from 'react';
import Navbar from './pages/Navbar';
import Footer from './pages/Footer';
import About from './pages/AboutPage';


function App() {

  return (

        <div className='App'>
         <Navbar /> 
         <Footer />
          {/* <HomePage /> */}
          {/* <About /> */}
        </div>

    //     <BrowserRouter>
    //         <Router>
    //             <Route path="/" element={<HomePage />} />
    //             <Route path='login' element={<LoginPage />} />
        
    //   </Router>
    // </BrowserRouter>
);

}

export default App;
