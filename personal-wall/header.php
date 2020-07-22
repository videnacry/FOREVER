
        <div class="nabvar navbar-dark bg-primary text-light px-4 pt-2 d-flex justify-content-between sticky-top">
            <h2 class="nabvar-brand">Goldtato</h2>
            <div>
                <button class="btn" type="button">
                    <h3><i class="fas fa-bell text-light"></i></h3>
                </button>
                <button class="btn" type="button" data-toggle="collapse" data-target="#user-options">
                    <h3><i class="fas fa-user text-light"></i></h3>
                </button>
                <div class="collapse navbar-collapse" id="user-options">
                    <form action="../login/forms/logout.php" method="get">
                        <button id="log-out" class="btn btn-block btn-light mb-2">Log out</button>
                    </form>
                </div>
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="user-options" data-toggle="collapse" role="button">
                        <h3><i class="fas fa-user text-light"></i></h3>
                    </a>
                    <div class="dropdown-menu">
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item">Update information</a>
                    </div>
                </div>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                  </div>
                </li>
            </div>
        </div> 