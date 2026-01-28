<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin SignIn | Epic Gamers Computer</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/logo.png" />
</head>

<body class="main-body3">

    <div class="container-fluid justify-content-center" style="margin-top: 100px;">
        <div class="row align-content-center">

            <div class="col-12">
                <div class="row">

                    <div class="col-12 logo2"></div>
                    <div class="col-12">
                        <p class="text-center title6">Hi, Welcome to Epic Gamers Computer Dashboard.</p>
                    </div>

                </div>
            </div>

            <div class="col-12 p-3">
                <div class="row">
                     

                    <div class="offset-4 offset-lg-3 col-12 col-lg-6 d-block border border-2 rounded bg-gradient">
                        <div class="row g-3">
                            <div class="col-12">
                                <p class="title2">Sign In to your Account.</p>
                            </div>
                            <div class="col-12">
                                <label class="form-label text-secondary fs-4 fw-bold">Email</label>
                                <input type="email" class="form-control bg-warning" style="border-color: rgb(4, 188, 255); border-width: 4px;" placeholder="ex : john@gmail.com" id="e" />
                            </div>
                            <div class="col-12 col-lg-6 d-grid mt-2 mb-4">
                                <button class="signInbutton" onclick="adminVerificationCode();">Send Verification Code</button>
                            </div>
                            <div class="col-12 col-lg-6 d-grid mt-2 mb-4">
                                <button class="changeButton">Back to Log In</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--  -->

            <div class="modal" tabindex="-1" id="verificationModal">
                <div class="modal-dialog">
                    <div class="modal-content bg-info">
                        <div class="modal-header">
                            <h5 class="modal-title">Admin Verification</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <label class="form-label">Enter Your Verification Code</label>
                            <input type="text" class="form-control bg-warning" id="vcode">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="adminVerify();">Verify</button>
                        </div>
                    </div>
                </div>
            </div>

            <!--  -->
            <!-- footer -->
            <div class="col-12 d-none d-lg-block bm-5 b1 mt-2">
                <p class="text-center">&copy; 2024 egcomputer.lk || All Rights Reserved</p>
            </div>
            <!-- footer -->

        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>