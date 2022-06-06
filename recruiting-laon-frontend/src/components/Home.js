import React, { useEffect, useState } from 'react'
import axios from 'axios';
import { Link } from 'react-router-dom';
import Rodape from './Rodape';
const Home = () => {
  const [filmes, setFilmes] = useState([]);
  const [series, setSeries] = useState([]);

  useEffect(() => {
    const filmes = () => {
      const headers = {
        'Accept': '*/*',
        "Content-Type": "application/json",
        'Authorization': 'Bearer ' + localStorage.getItem('token')
      };
      axios.get('http://localhost:8000/api/catalogo', { headers })
        .then(response => {
          setFilmes(response.data.filmes)
          setSeries(response.data.series)
        })
        .catch(error => { console.error(error) })
    }
    filmes()
  }, [])

  return (
    <div className='container'>
      <div id='lita-filmes' className='row'>
        <h3>Filmes</h3>
        {
          filmes.map(filme => (
            <div key={filme.id} className="col-2 m-0">
              <div id='div-img'>
                <Link to={`detalhes/${filme.id}`} key={filme.id}>
                  <img id='image' src={filme.image} alt="" />
                </Link>

              </div>
            </div>
          ))
        }
      </div>

      <Rodape />
    </div >
  )
}

export default Home