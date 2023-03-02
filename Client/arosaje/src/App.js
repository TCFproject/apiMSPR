import './App.css';
import { BrowserRouter as Router, Route, Routes, BrowserRouter } from 'react-router-dom';
import  HomePage from './pages/HomePage';
import  LoginPage from './pages/LoginPage';
import React from 'react';
import Navbar from './pages/Navbar';

import AboutPage from './pages/AboutPage';
import ContactPage from './pages/ContactPage';
import Footer from './pages/Footer';
import AccountPage from './pages/AccountPage';
import RegisterPage from './pages/RegisterPage';
import ErrorPage from './util/ErrorPage';
import AddPlante from './pages/AddPlante';
import AddEntretien from './pages/AddEntretien';

function App() {
  return (
    <BrowserRouter>
      <div className="App">
        <Navbar />
        <Routes>
          <Route path="/" element={<HomePage />} />
          <Route path="/login" element={<LoginPage />} />
          <Route path="/about" element={<AboutPage />} />
          <Route path="/contact" element={<ContactPage />} />
          <Route path="/register" element={<RegisterPage />} />
          <Route path="/account" element={<AccountPage />} />
          <Route path="/account/addPlante" element={<AddPlante />} />
          <Route path="/account/addEntretien" element={<AddEntretien />} />
          <Route path="*" element={<ErrorPage />} />
        </Routes>
        <Footer />
      </div>
    </BrowserRouter>
  );
}

export default App;
