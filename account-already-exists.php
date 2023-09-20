<head>
    <style>
        @font-face {
            font-family: Roboto;
            src: url(fonts/Roboto/Roboto-Regular.ttf) format("truetype");
            font-weight: 400;
            font-style: normal;
        }

        .div-1,
        .div-2,
        .div-3 {
            box-shadow: 0 0 13px #67646438;
        }

        .div-1 {
            top: -39%;
            right: -28%;
            width: 71%;
            height: 47%;
            background: linear-gradient(144deg, #515ada33, #efd5ff3d);
            position: absolute;
            rotate: -30deg;
        }

        .div-2 {
            left: -50%;
            rotate: 142deg;
            position: absolute;
            background: linear-gradient(45deg, #d797ffb0, #515ada85);
            width: 75%;
            height: 46%;
        }

        .div-3 {
            left: 53%;
            overflow: hidden;
            rotate: 45deg;
            width: 35%;
            height: 59%;
            background: linear-gradient(45deg, #515ada3d, #efd5ff5e);
            position: absolute;
            bottom: -37%;
        }

        html {
            font-family: Roboto;
            background: linear-gradient(70deg, #efd5ff 0%, #515ada 100%);
            height: 100%;
            overflow: hidden;
            contain: content;
        }

        .heading {
            z-index: 1;
            font-size: 26px;
            margin: auto;
            display: flex;
            top: 100px;
            position: relative;
            color: #5c2280e0;
            justify-content: center;
        }
        .p{
            font-size: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
    top: 175px;
        }
        .p a{
            text-decoration: none;
        }
        a:hover{
            color:black;
            transition: .2s;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="div-1"></div>
    <div class="div-2"></div>
    <div class="div-3"></div>

    <div class="heading">
        <h2>Nalog već postoji.</h2>
    </div>

    <div class="p">
       <p>  <a href="login/login.php">Prijavite se</a> </p>
       <p>  <a href="register/register.php"> Registrujte se </a></p>
    </div>
</body>