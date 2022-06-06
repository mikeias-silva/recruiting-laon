import Axios from 'axios';
import React, { useEffect, useState } from 'react'
import { useParams } from 'react-router-dom';
import Rodape from './Rodape';

const Detalhes = () => {
  const { filmeId } = useParams();
  const [filme, setFilme] = useState([]);

  useEffect(() => {
    const getFilme = () => {
      const headers = {
        'Accept': '*/*',
        "Content-Type": "application/json",
        'Authorization': 'Bearer ' + localStorage.getItem('token')
      };
      Axios.get(`http://localhost:8000/api/catalogo/${filmeId}`, { headers })
        .then(response => {
          setFilme(response.data)

        }).catch(error => alert(error))
    }
    getFilme()
  }, [filmeId])

  return (
    <div>
      <div className="row">
        <div id='poster' className=' col-4 m-5'>
          <div id='div-img-detalhe'>
            <img id='img-detalhe' src={filme.image} alt="" />
          </div>
        </div>
        <div id='info' className='col-6'>
          <div>
            <h1>{filme.titulo}</h1>
            <p>Titulo original: {filme.titulo_original}</p>
            <p>Ano: {filme.lancamento}</p>
            <p>Duração: {filme.minutos} min</p>
          </div>
          <div>
            <span>Sinopse</span>
            <p>{filme.sinopse}</p>
            <div className="row">
              <div className="col">
                <span>Elenco</span>
                <p>{filme.elenco}</p>
              </div>
              <div className="col">
                <span>Prêmios</span>
                <p>{filme.premios}</p>
              </div>
              <div className="row">
                <div className="col">
                  <span>Diretor</span>
                  <p>{filme.direcao}</p>
                </div>
                <div className="col">
                  <span>Avaliações</span>
                  <p>{filme.avaliacoes}</p>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <Rodape />
    </div>
  )
}

export default Detalhes