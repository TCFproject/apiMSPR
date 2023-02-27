import React from 'react';
import { useState } from 'react';
const ContactPage = () =>{
 

  const [email, setEmail] = useState('');
  const [subject, setSubject] = useState('');
  const [message, setMessage] = useState('');

  const handleSubmit = (event) => {
    event.preventDefault();
    console.log(`Email: ${email}, Subject: ${subject}, Message: ${message}`);
    // Replace the console.log statement with the code to actually send the email
  };

  return (
    <form onSubmit={handleSubmit}>
      <br/><h3>Contactez-nous</h3><br/><br/>
      <div class="mb-3">
      <label>
       
        <input placeholder="Email" class="form-control" type="email" value={email} onChange={(e) => setEmail(e.target.value)} />
      </label>
      </div>
      <div class="mb-3">
      
      <label>
        
        <input placeholder="Objet" class="form-control"  type="text" value={subject} onChange={(e) => setSubject(e.target.value)} />
      </label>
      
      </div>
      <div class="mb-3">
      <label>
        <textarea placeholder="Message" class="form-control" value={message} onChange={(e) => setMessage(e.target.value)} />
      </label>
      </div>
      <button className="btn btn-outline-success" type="submit">Envoyer</button><br/><br/>
    </form>

  );
}
export default ContactPage;