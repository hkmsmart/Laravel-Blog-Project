<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>CodePen - Offline page</title>
    <style type="text/css">
        body {
            width: 100%;
            min-height: 100vh;
            display: relative;
            margin: 0;
            padding: 0;
            background: -webkit-linear-gradient(-45deg, #183850 0, #183850 25%, #192C46 50%, #22254C 75%, #22254C 100%);
        }
        .wrapper {
            position: absolute;
            top: 50%;
            left: 50%;
            align-items: center;
            justify-content: center;
            -webkit-transform: translate(-50%, -50%);
            -moz-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            -o-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            text-align: center;
        }
        h1 {
            color: white;
            font-family: arial;
            font-weight: bold;
            font-size: 50px;
            letter-spacing: 5px;
            line-height: 1rem;
            text-shadow: 0 0 3px white;
        }
        h4 {
            color: #f1f1f1;
            font-family: arial;
            font-weight: 300;
            font-size: 16px;
        }
        .button {
            display: block;
            margin: 20px 0 0;
            padding: 15px 30px;
            background: #22254C;
            color: white;
            font-family: arial;
            letter-spacing: 5px;
            border-radius: .4rem;
            text-decoration: none;
            box-shadow: 0 0 15px #22254C;
        }
    </style>
</head>
<body>
<!-- partial:index.partial.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="wrapper">
    <h1>Bakım Modu </h1>
    <h4>Site Yapım Aşamasındadır.</h4>

    <a href="{{route('home')}}" class="button">Sayfayı Yenile </a>
</div>
</body>
</html>
<!-- partial -->

</body>
</html>
