<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Unbolt</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                padding: 10px;
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

        </style>
        <script>
            function GetData ()
            {
                data = "id=1";
                request = new ajaxRequest()
                request.open("GET", "/getdata/5", true)
                request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")   // При использовании обьекта FormData это почему-то не нужно

                request.onreadystatechange = function()
                {
                    if (this.readyState == 4)
                        if (this.status == 200)
                            if (this.responseText != null)
                            {
//                                alert(this.responseText);
                                var response = JSON.parse(this.responseText);

                                for (var key in response) 
                                {
                                    // этот код будет вызван для каждого свойства объекта
                                    // ..и выведет имя свойства и его значение
                                    // alert( "Ключ: " + key + " значение: " + response[key] );
                                    newdiv = document.createElement('div');
                                    newdiv.innerHTML  = response[key].translation_id + ' -> ' 
                                                    + response[key].word + ' -> ' 
                                                    + response[key].translation + ' -> ' 
                                                    + response[key].learned;

                                    Data.appendChild(newdiv);
                                }
                            }
                }
                request.send(data)

                function ajaxRequest()
                {
                    try { var request = new XMLHttpRequest() }

                    catch(e1) {
                        try { request = new ActiveXObject("Msxml2.XMLHTTP") }
                        catch(e2) {
                            try { request = new ActiveXObject("Microsoft.XMLHTTP") }
                            catch(e3) {
                                request = false
                            } 
                        } 
                    }
                    return request
                }
            }
        </script>
    </head>
    <body>
        <!--form action="/getdata/3" method="GET">
            <input type="submit" value="GetData"">
        </form-->

        <input type="button" value="GetData2" onclick="GetData()">
        <p></p>
        <div id='Data'>
        </div>
    </body>
</html>
