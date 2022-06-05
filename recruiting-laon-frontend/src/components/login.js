import React, { useState } from 'react';
import Axios from 'axios';
import axios from 'axios';

const Login = () => {
    const [email, setEmail] = useState([])
    const [password, setPassword] = useState([])
    const [token, setToken] = useState([])

    const handleLogin = () => {


        const headers = {
            'Content-Type': 'application/json',
            'Accept': '*/*'
        };

        const body = {
            email: email,
            password: password
        };

        axios.post('http://127.0.0.1:8000/api/login',
            body, { headers })
            .then(response => {
                console.log(response.data);
                localStorage.setItem("token", response.data.token);

            }).catch(error => {
                console.error(error);
            })

        console.log(email);
        console.log(password);
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