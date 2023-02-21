import React from "react";
import {
  Box,
  Container,
  Row,
  Column,
  FooterLink,
  Heading,
} from "../style/Styles";
  
const Footer = () => {
  return (
    <footer class="py-3 my-4" min-height= "100%">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
    </ul>
    <p class="text-center text-muted">© 2022 Company, Inc</p>
  </footer>
    // <Box>

    //   <Container>
    //     <Row>
    //       <Column>
    //         <Heading>About Us</Heading>
    //         <FooterLink href="#">Aim</FooterLink>

    //       </Column>
    //       <Column>
    //         <Heading>Services</Heading>
    //         <FooterLink href="#">Writing</FooterLink>

    //       </Column>
    //       <Column>
    //         <Heading>Contact Us</Heading>

    //       </Column>
    //       <Column>
    //         <Heading>Social Media</Heading>
    //         <FooterLink href="#">
    //           <i className="fab fa-facebook-f">
    //             <span style={{ marginLeft: "10px" }}>
    //               Facebook
    //             </span>
    //           </i>
    //         </FooterLink>
    //         <FooterLink href="#">
    //           <i className="fab fa-instagram">
    //             <span style={{ marginLeft: "10px" }}>
    //               Instagram
    //             </span>
    //           </i>
    //         </FooterLink>
    //       </Column>
    //     </Row>
    //   </Container>
    // </Box>
  );
};
export default Footer;