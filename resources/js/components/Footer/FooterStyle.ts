import styled from "styled-components";

export const StyledFooter = styled.footer`
  background-color: #1A202C;
  color: white;
  padding: 1rem 0;

  .container {
    text-align: center;
  }

  .list-inline {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    justify-content: center;
  }

  .list-inline-item {
    margin: 0 0.5rem;
  }

  a {
    color: white;
    text-decoration: none;
    font-size: 1.5rem;

    &:hover {
      text-decoration: underline;
    }
  }

  p {
    margin-top: 1rem;
    margin-bottom: 0;
  }
`;
