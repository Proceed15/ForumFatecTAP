import styled from 'styled-components';

export const Container = styled.div`
  display: flex;
  align-items: center;
  background-color: #1A202C; 
  font-size: 20px;
  color: white;
  padding: 10px;
  cursor: pointer;
  border-radius: 10px;
  margin: 0 15px 20px;
  transition: transform 0.3s ease, box-shadow 0.3s ease; 

  > svg {
    margin: 0 20px;
  }

  &:hover {
    background-color: black;
    transform: scale(1.05); 
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
  }
`;