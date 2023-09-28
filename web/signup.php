<?php

function show() {
    $username = (isset($_SESSION['userData'])) ? true : false;
    if($username) logged();
    else  logout();
}

function logout() {
    ?>
    <section class="container py-4">
        <article>
            <div class="row">

                <div class="col-md-3"></div>

                <div class="col-md-6 col-sm-12">
                    <div class="card shadow text-center">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>
                                    SignUp
                                </h2>
                            </div>
                        </div>
                        <div class="card-body">
                            <form class="row g-3 " action="<?=$_ENV['PAGE_SERVE']?>/http/controllers/signupController.php" method="post">

                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <span class="input-group-text" id="name">Complete Name</span>
                                            <input type="text" class="form-control" id="name" aria-describedby="name" name="name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <span class="input-group-text" id="username">User</span>
                                            <input type="text" class="form-control" id="user" aria-describedby="username" name="user" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <span class="input-group-text" id="email">Mail</span>
                                            <input type="email" class="form-control" id="mail" aria-describedby="email" name="mail" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <span class="input-group-text" id="password">Password</span>
                                            <input type="password" class="form-control" id="pass" name="pass" aria-describedby="password" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <span class="input-group-text" id="birthday">Birthday</span>
                                            <input type="date" class="form-control" id="date" name="date" aria-describedby="birthday" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label" for="tyc">
                                        <input class="form-check-input" type="checkbox" name="tyc" value="acepto" id="tyc" required>
                                        Aceptar terminos y condiciones
                                    </label>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-outline-primary" type="submit">Submit form</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-3"></div>

            </div>
        </article>
    </section>
    <?php
}

function logged() {
    
}

?>