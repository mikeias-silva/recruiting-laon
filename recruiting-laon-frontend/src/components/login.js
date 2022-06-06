import React, { useState } from 'react';
import axios from 'axios';

const Login = ({ isAuthenticated, setIsAuthenticated }) => {
    // axiosInstance.defaults.timeout = 10000;
    // axios.ax
    const [email, setEmail] = useState([]);
    const [password, setPassword] = useState([]);
   
    const handleLogin = () => {
        const headers = {
            'Accept': '/',
            "Content-Type": "application/json",

        };
        const body = {
            email: email,
            password: password
        };

        axios.post('http://localhost:8000/api/login', body, { headers })
            .then(response => {
                localStorage.setItem("token", response.data.token);
                setIsAuthenticated(true);

            })
            .catch(error => {
                alert(error);
                console.error(error);
            })
    }


    return (
        <div className='container'>
            <div className='login'>
                <div className='flex-container'>
                    <div id='teste'>
                        <h3 id='title-login'>Entrar</h3>
                        <small id='message-login'>Bem vindo(a) de volta!</small>
                    </div>
                    <input
                        id='email'
                        className='flex-item'
                        type="email"
                        placeholder='Email'
                        defaultValue={email}
                        onChange={(e) => setEmail(e.target.value)}
                    />
                    <input
                        id='password'
                        className='flex-item'
                        type="password"
                        placeholder='Senha'
                        defaultValue={password}
                        onChange={(e) => setPassword(e.target.value)}
                    />
                    <button type='submit' onClick={handleLogin} id="btn-entrar">Entrar</button>
                </div>
            </div>
        </div>
    )
}

export default Login