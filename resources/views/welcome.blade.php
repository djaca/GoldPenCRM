<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->

        <style>
            html, body {
                {{--background: url({{ asset('images/desk-bg.jpg') }}) no-repeat center center fixed;--}}
                background-color: white;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 800;
                height: auto;
                padding: 25px 40px 0px 40px;
                /*overflow: auto;*/
            }

            h1{
                color: #cc9933;
                /*font-size: 40px;*/
            }

            hr{
                display: block;
                height: 1px;
                border: 0;
                border-top: 1px solid #cc9933;;
                margin: 1em 30%;
                padding: 0 200px;
            }

            .content {
                text-align: center;
            }

            .links > a {
                color: #66cc33;
                font-size: 32px;
                font-weight: 800;
                text-decoration: none;
            }

            .links > a:hover {
                color: darkred;
            }
        </style>

    </head>
    <body>
        <div class="content">

            <h1>Simplify the process for tracking interactions with potential customers. </h1>
            <br>

            <img src="images/prospect_logger_logo2.svg" width="auto" height="64px" alt="Sunny Tree Software">

            <br>
            <img src="images/goldpen-display.png" width="auto" height="450px" alt="Sunny Tree Software">
            <br>

            <hr>

            <div class="links">
                <a href="http://www.sunnytree.org">
                    crafted with <span style="color:darkred; text-decoration:underline;">&#10084</span> by<br>
                    <img src="images/sunny_tree_logo_color_green.svg" width="auto" height="100px" alt="Sunny Tree Software">
                </a>
            </div>


        </div>
    </body>
</html>
