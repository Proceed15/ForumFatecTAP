import React from 'react'
import { Container } from './SidebarItemStyles'

interface SidebarItemProps {
  Icon: React.ComponentType;
  Text: string;
  href: string;
}

const SidebarItem: React.FC<SidebarItemProps> = ({ Icon, Text, href }) => {
  
  return (
    <a href={href}>
      <Container>
        <Icon />
        <span>{Text}</span>
      </Container>
    </a>
    
  );
}

export default SidebarItem


 

