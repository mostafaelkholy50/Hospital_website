<?php
include "./share/head.php";
include "./share/header.php";
?>
<style>
    .hero-bg {
        background-image: url('./assets/image/pexels-olly-3769151.jpg');
        background-size: cover;
        background-position: center;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        text-align: center;
        position: relative;
        ;
    }

    .hero-text h1 {
        font-size: 3rem;
        font-weight: bold;
        margin-bottom: 20px;
        text-shadow: 2px 2px 4px black;
    }

    .hero-text p {
        font-size: 1.5rem;
        margin-bottom: 30px;
        text-shadow: 2px 2px 4px black;
    }

    .btn-custom {
        font-size: 1.2rem;
        padding: 12px 30px;
        margin: 10px;
        width: 200px;
        border-radius: 50px;
    }

    .btn-login {
        background-color: #28a745;
        color: white;
        border: none;
        transition: background-color 0.3s ease;
    }

    .btn-login:hover {
        background-color: #218838;
    }

    .btn-register {
        background-color: #007bff;
        color: white;
        border: none;
        transition: background-color 0.3s ease;
    }

    .btn-register:hover {
        background-color: #0056b3;
    }


    .btn-custom:hover {
        opacity: 0.9;
    }


    .navbar {
        background-color: #f8f9fa;
    }

    .navbar-nav .nav-link {
        color: #555;
    }

    .navbar-nav .nav-link:hover {
        color: #007bff;
    }

    .navbar-brand span {
        color: #007bff;
    }


    #attendance-container {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }


    .card {
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }


    .table th {
        background-color: #007bff;
        color: white;
    }

    .table th,
    .table td {
        text-align: center;
        padding: 12px;
        font-size: 16px;
    }
</style>
</head>

<body>

    <div class="hero-bg">
        <div class="p-3 mb-2 bg-black text-white bg-opacity-25">
            <div class="hero-text text-start">
                <h1>Welcome in hospital Wepsite</h1>
                <p>We are here for your health and care. </br>
                    We provide you with the best medical services in a comfortable and safe environment</p>
            </div>
            <a href="<?= url('pages/login.php') ?>" class="btn btn-custom btn-login">PATIENT Login</a>
            <a href="<?= url('pages/register.php') ?>" class="btn btn-custom btn-register">PATIENT register</a>
            <a href="<?= url('pages/doctor_log.php') ?>" class="btn btn-custom btn-login">doctor Login</a>
        </div>
    </div>

    <?php
    include "./share/footer.php";
    ?>