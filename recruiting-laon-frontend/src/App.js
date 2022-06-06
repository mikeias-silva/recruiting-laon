import './App.css';
import { BrowserRouter, Routes, Route, Navigate } from 'react-router-dom'
import NavBar from './components/NavBar';
import Login from './components/login';
import Home from './components/Home';
import Detalhes from './components/Detalhes';
import Cadastrar from './components/Cadastrar';
import { useState } from 'react';

function App() {
  const [isAuthenticated, setIsAuthenticated] = useState(false);

  return (
    <div className="App">
      <NavBar />
      <BrowserRouter>
        <Routes path='/'>
          <Route index element={isAuthenticated ? <Home /> : <Navigate to="/login" />} />
          <Route path="/login"
            element={!isAuthenticated ? <Login isAuthenticated={isAuthenticated} setIsAuthenticated={setIsAuthenticated} /> : <Navigate to="/" />}
          />
          <Route path='detalhes/:filmeId' element={isAuthenticated ? <Detalhes /> : <Navigate to="/login" />} />
          <Route path='cadastrar' element={isAuthenticated ? <Cadastrar /> : <Navigate to="/login" />} />
        </Routes>
      </BrowserRouter>
    </div>
  );
}

export default App;
