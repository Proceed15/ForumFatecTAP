import React from 'react'
import { Container, Content } from './SidebarStyles'
import { 
  FaTimes, 
  FaHome, 
  FaRegSun, 
  FaUserAlt, 
  FaChartBar
} from 'react-icons/fa';

import { BiLogIn, BiLogOut } from "react-icons/bi";
import { BsFillPersonPlusFill } from "react-icons/bs";
import { CgProfile } from "react-icons/cg";
import SidebarItem from '../SidebarItem/SidebarItem';

interface SidebarProps {
    isActive:boolean;
    setActive: (active: boolean) => void;
}

const Sidebar: React.FC<SidebarProps> = ({isActive, setActive}) => {

  const closeSidebar = () => {
    setActive(false)
  }

  return (
    <Container sidebar={isActive}>
      <FaTimes onClick={closeSidebar} />  
      <Content>
        <SidebarItem Icon={FaHome} Text="Início" href = "users" />
        <SidebarItem Icon={BsFillPersonPlusFill} Text="Cadastre-se" href = "register" />
        <SidebarItem Icon={CgProfile} Text="Perfil" href = "Users" />
        <SidebarItem Icon={BiLogIn} Text="Logar" href = "Users" />
        <SidebarItem Icon={BiLogOut} Text="Sair" href = "Users" />
        <SidebarItem Icon={FaRegSun} Text="Configurações" href = "Users" />
      </Content>
    </Container>
  )
}

export default Sidebar 