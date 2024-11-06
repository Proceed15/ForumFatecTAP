// resources/js/your-component.jsx

import React from 'react';
import ReactDOM from 'react-dom';

declare global {
    interface Window {
      users: any;
    }
  }

const CardUsuarios = () => {
    const users = window.users;

    return (
        <div>
            <h2>Lista de Usuários</h2>
            <ul>
                {users.map((user:any) => (
                    <li key={user.id}>
                        <h5>{user.name}</h5>
                        <p>{user.email}</p>
                    </li>
                ))}
            </ul>
        </div>
    );
};

export default CardUsuarios
