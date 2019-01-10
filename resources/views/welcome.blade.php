<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Unbolt</title>

        <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2018.3.1017/styles/kendo.common-material.min.css" />
        <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2018.3.1017/styles/kendo.material.min.css" />
        <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2018.3.1017/styles/kendo.material.mobile.min.css" />

        <script src="https://kendo.cdn.telerik.com/2018.3.1017/js/jquery.min.js"></script>
        <script src="https://kendo.cdn.telerik.com/2018.3.1017/js/kendo.all.min.js"></script>

        <!--link rel="stylesheet" href="css/kendo.common.min.css" />
        <link rel="stylesheet" href="css/kendo.default.min.css" />
        <link rel="stylesheet" href="css/kendo.default.mobile.min.css" />

        <script src="js/jquery.min.js"></script>
        <script src="js/kendo.all.min.js"></script-->
        </head>

        <script>
            function GetData (val)
            {
                data = "id=1";
                request = new ajaxRequest()
                request.open("GET", "/getdata/" + val, true)
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
    <body>
        <div id="example">
            <div id="grid"></div>

            <script>
                $(document).ready(function () {
                    $("#grid").kendoGrid({
                        dataSource: {   
                            transport: {   
                                read: {
                                    type: "GET",
                                    url: 'http://127.0.0.1:8000/getdata/0',
                                    contentType: "application/json; charset=utf-8",
                                    dataType: "json",
                                }
                            }
                        },
                        pageSize:40, 
                /*        schema: {
                            data: function(response) {
                                return response.json;
                            }
                        },                  */

                        schema: {
                            data: "SupplierSearchResult.SupplierList",
                            type: 'json'
                        },   
                        height: 550,
                        autoBind: true,
                        groupable: false,
                        sortable: true,
                        pageable: {
                            refresh: false,
                            pageSizes: false,
                            buttonCount: 3
                        },
                        columns: [{
                            field: "word",
                            title: "Word",
                            width: 240
                        }, {
                            field: "translation",
                            title: "Translation"
                        }, {
                            field: " ",
                            title: ""
                        }]
                    });
                });

                var words = [ 
                        {   Word: "word1",
                            Translation: "translation1"
                        },
                        {   Word: "word2",
                            Translation: "translation2"
                        },
                        {   Word: "word3",
                            Translation: "translation3" 
                        },
                        {   Word: "word4",
                            Translation: "translation4" 
                        } 
                    ];

            </script>
        </div>

        <style type="text/css">
            .customer-photo {
                display: inline-block;
                width: 32px;
                height: 32px;
                border-radius: 50%;
                background-size: 32px 35px;
                background-position: center center;
                vertical-align: middle;
                line-height: 32px;
                box-shadow: inset 0 0 1px #999, inset 0 0 10px rgba(0,0,0,.2);
                margin-left: 5px;
            }

            .customer-name {
                display: inline-block;
                vertical-align: middle;
                line-height: 32px;
                padding-left: 3px;
            }
        </style>






            <!--form action="/getdata/3" method="GET">
                <input type="submit" value="GetData"">
            </form-->

            <input type="button" value="GetData2" onclick="GetData(0)">
            <p>a</p>
            <div id='Data'></div>
    </body>
</html>
