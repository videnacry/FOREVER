<div class="nabvar navbar-dark bg-primary text-light px-4 pt-2 d-flex justify-content-between sticky-top">
  <h2>FOREVER</h2>
  <div class="d-flex">
    <button class="btn" type="button" id="home-redirect">
      <h5><i class="fas fa-home text-light"></i></h5>
    </button>
    <button id="open-chat" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
      <h5><i class="fas fa-bell text-light"></i></h5>
    </button>
    <div class="nav-item d-inline">
      <a class="nav-link width-fit mx-auto" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <h5><i class="fas fa-user text-light"></i></h5>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <pre id="chat-content">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque magni illo aliquid, iusto veniam libero nobis sunt reiciendis maiores. Quae incidunt quisquam laboriosam quasi placeat ullam maxime, veritatis inventore alias!
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi minus molestias porro! Odit eos autem exercitationem suscipit adipisci iusto omnis nobis ratione harum, consequuntur consectetur repellat tempore similique perspiciatis voluptate.
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eius itaque deleniti quia aperiam, ab praesentium aliquam necessitatibus excepturi molestiae hic sit incidunt odit exercitationem non alias velit, numquam placeat magnam.
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium, sunt tenetur incidunt nobis amet placeat autem odit ex aliquid expedita rerum unde? Accusantium odio et ex dolores, deleniti aliquam quod.
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum repellendus eligendi odio aliquid, quod impedit molestias nesciunt nam? Molestias ducimus quo quae maiores dolore perspiciatis tempora aspernatur qui eius! Corporis?
        </pre>
      </div>
      <div class="modal-footer">
        <div class="form-group col-12">
          <label for="message-text" class="col-form-label">Message:</label>
          <textarea id="new-message" class="form-control" id="message-text"></textarea>
        </div>
        <button id="send-message" type="button" class="btn btn-primary">Send Message</button>
      </div>
    </div>
  </div>
</div>