<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Meu Cadastro
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Alterar meu cadastro</a></li>
                    </ul>

                </li>


                <li class="nav-item">
                    <a class="nav-link" href="/alterar_cadastros">Visualizar cadastros</a>
                </li>




            </ul>
            <form action="/logout" method="POST">
                @csrf
                <a href="/logout" class="btn btn-outline-danger" onclick="event.preventDefault();this.closest('form').submit();">Sair</a>
            </form>
        </div>
    </div>
</nav>