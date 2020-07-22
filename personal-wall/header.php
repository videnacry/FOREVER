
        <div class="nabvar navbar-dark bg-primary text-light px-4 pt-2 d-flex justify-content-between sticky-top">
            <h2>Goldtato</h2>
            <div class="d-flex">
                <button class="btn mt-22" type="button" id="home-redirect">
                    <h3><i class="fas fa-home text-light"></i></h3>
                </button>
                <button class="btn mt-22" type="button">
                    <h3><i class="fas fa-bell text-light"></i></h3>
                </button>
                <div class="nav-item dropdown d-inline">
                  <a class="nav-link dropdown-toggle width-fit mx-auto" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <h3><i class="fas fa-user text-light"></i></h3>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a id="profile-redirect" class="dropdown-item" href="profile.php">Profile</a>
                    <a id="update-redirect" class="dropdown-item" href="configuration.php">Update information</a>
                    <div class="dropdown-divider"></div>
                    <form action="../login/forms/logout.php" method="get">
                        <button id="log-out" class="btn btn-block btn-light mb-2">Log out</button>
                    </form>
                  </div>
                </div>
            </div>
        </div> 