<nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
    <a href="" class="navbar-brand p-0">
        <h1 class="m-0">NdundaTech</h1>
        <!-- <img src="../public/dgital/img/logo.png" alt="Logo"> -->
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav mx-auto py-0">
            <a href="index" class="nav-item nav-link <?php if($active == "home"){echo "active"; } ?>">Home</a>
            <a href="about" class="nav-item nav-link <?php if($active == "about"){echo "active"; } ?>">About</a>
            <a href="service" class="nav-item nav-link <?php if($active == "service"){echo "active"; } ?>"">Service</a>
            <!-- <a href="project.html" class="nav-item nav-link">Project</a> -->
            <!-- <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                <div class="dropdown-menu m-0">
                    <a href="team.html" class="dropdown-item">Our Team</a>
                    <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                    <a href="404.html" class="dropdown-item">404 Page</a>
                </div>
            </div> -->
            <a href="contact" class="nav-item nav-link <?php if($active == "contact"){echo "active"; } ?>">Contact</a>
        </div>

        <a href="#create_store" data-toggle="modal" class="btn rounded-pill py-2 px-4 ms-3 d-none d-lg-block">Login</a>
    </div>
</nav>

<!-- Add Store Modal -->
<div class="modal fade" id="create_store">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Fill All Required Fields</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form method="post">
                <div class="form-group">
                    <label class="form-label" for="email">Email</label>
                    <input type="email" name="user_email" placeholder="staff@makueni.go.ke" class="form-control form-control-lg" required>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <label class="form-label" for="password">Password</label>
                        <a class="link link-primary link-sm"  tabindex="-1" href="reset_password">Forgot password?</a>
                    </div>
                    <div class="form-control-wrap">
                        <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                            <em class="passcode-icon icon-show icon ni ni-eye"></em>
                            <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                        </a>
                        <input type="password" name="user_password" class="form-control form-control-lg" id="password">
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-lg btn-primary btn-block" name="Login">Login</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
