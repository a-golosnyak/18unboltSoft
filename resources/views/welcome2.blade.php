<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Unbolt</title>

        <link rel="stylesheet" href="css/kendo.common.min.css" />
        <link rel="stylesheet" href="css/kendo.default.min.css" />
        <link rel="stylesheet" href="css/kendo.default.mobile.min.css" />

        <script src="js/jquery.min.js"></script>
        <script src="js/kendo.all.min.js"></script>
        </head>
    <body>
        <div id="example">
            <div id="grid"></div>
            <script>
                $(document).ready(function () {
                    $("#grid").kendoGrid({
         //               dataSource: words,
                        dataSource: {   
                            transport: {   
                              read: {
                                url: "http://127.0.0.1:8000/getdata/5",
                                data: {
                                  tags: "nature",
                                  format: "json"
                                },
                                dataType: "json", // "jsonp" is required for cross-domain requests; use "json" for same-domain requests
                                jsonp: "jsoncallback",
                              }
                            },
                            schema: {
                                data: "translation1",
                                model: {
                                    fields: {
                                        published: {type: "date"}
                                    }
                                }
                            }
                        },
                        height: 550,
                        groupable: true,
                        sortable: true,
                        pageable: {
                            refresh: true,
                            pageSizes: true,
                            buttonCount: 5
                        },
                        columns: [{
                            field: "Word",
                            title: "Word",
                            width: 240
                        }, {
                            field: "Translation",
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

            <input type="button" value="GetData2" onclick="GetData()">
            <p></p>
            <div id='Data'>
        </div>
    </body>
</html>
