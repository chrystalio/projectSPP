

<link rel="stylesheet" href="assets/css/login.css">
<div class="container-fluid">
    <div class="row no-gutter">
        <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
        <div class="col-md-8 col-lg-6">
            <div class="login d-flex align-items-center py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-lg-8 mx-auto">
                            <h3 class="login-heading mb-4">Selamat Datang Admin!</h3>
                            
                            <form method="POST" action="model/loginModel.php">
                                <div class="form-label-group">
                                    <input type="text" id="username" name="username" class="form-control" placeholder="Username"
                                        required autofocus>
                                    <label for="username">Username</label>
                                </div>
                                <div class="form-label-group">
                                    <input type="password" id="inputPassword" name="password" class="form-control"
                                        placeholder="Password" required>
                                    <label for="inputPassword">Password</label>
                                </div>
                                <input type="hidden" name="action" value="login">
                                <button
                                    class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2"
                                    type="submit">Masuk</button>
                                <div class="text-center">
                                    <!-- <a class="small" href="#">Forgot password?</a></div> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
