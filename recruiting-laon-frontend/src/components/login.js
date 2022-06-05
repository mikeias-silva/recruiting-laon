import React, { useState } from 'react'

const Login = () => {
    const [email, setEmail] = useState([])
    const [password, setPassword] = useState([])

    const handleLogin = () => {

        let requestOptions = {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ email: email, password: password })
        }
        fetch("http://localhost:8000/api/login", requestOptions)
            .then((response) => response.json())
            .then((json) => {
                console.log(json);
            })
        console.log(email);
        console.log(password);
    }
    return (
        <div>
            <label htmlFor="">E-mail</label>
            <input
                type="email"
                placeholder='Insira seu email'
                defaultValue={email}
                onChange={(e) => setEmail(e.target.value)}
            />
            <label htmlFor="">Senha</label>
            <input
                type="password"
                placeholder='Insira sua senha'
                defaultValue={password}
                onChange={(e) => setPassword(e.target.value)}
            />
            <button type='submit' onClick={handleLogin}>Entrar</button>
        </div>
    )
}

export default Login