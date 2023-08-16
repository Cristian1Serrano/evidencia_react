import React, { Component } from 'react';

class MiComponente extends Component {
  constructor(props) {
    super(props);
    this.state = {
      mostrarPublicaciones: true  // Inicialmente, mostramos las últimas publicaciones
    };
  }

  cambiarVista = () => {
    // Cambiar el estado para alternar entre mostrar las últimas publicaciones y los datos del usuario
    this.setState({ mostrarPublicaciones: !this.state.mostrarPublicaciones });
  }

  render() {
    return (
      <div class="container-fluid d-flex flex-column">
        <div class="row flex-nowrap overflow-x-hidden">
          <div class="bg-white col-auto col-md-4 col-lg-4 col-xl-3 col-xxl-2 min-vh-100" id="sidebar_home">
            {/* ... (resto de tu código) */}
            <ul class="sidebar_ul flex-column d-flex">
              {/* ... (otros elementos del menú) */}
              <li class="nav-item">
                {/* Agregamos una condición para el enlace "Perfil" */}
                <a href="#" class="nav-link" onClick={this.cambiarVista}>
                  <i class="fa-regular fa-user li_sidebar_home"></i>
                  <span class="fs-4 ms-3 d-none d-sm-inline">Perfil</span>
                </a>
              </li>
              {/* ... (otros elementos del menú) */}
            </ul>
          </div>

          {/* Condición para mostrar "últimas publicaciones" o "perfil" */}
          <div class="container-fluid div_publicaciones_home flex-fill overflow-hidden" style={{ background: '#F2F3F5' }}>
            {this.state.mostrarPublicaciones ? (
              <div>
                <div class="titulo_publicaciones bg-white">
                  <span class="fs-4 fw-bold">ULTIMAS PUBLICACIONES</span>
                </div>
                {/* ... (resto de las publicaciones) */}
              </div>
            ) : (
              <div>
                {/* Aquí mostrar los datos del usuario */}
                {/* Por ejemplo: */}
                <div class="datos_usuario">
                  <span>{this.props.user.email}</span>
                  <span>terapeuta</span>
                  {/* ... (otros datos del usuario) */}
                </div>
              </div>
            )}
          </div>
        </div>
      </div>
    );
  }
}

export default MiComponente;
