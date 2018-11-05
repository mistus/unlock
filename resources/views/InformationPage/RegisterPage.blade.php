<html>
    <head>
        <title>Laravel</title>

        <link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

        <style>
            body {
                margin: 0;
                padding: 0;
                width: 100%;
                height: 100%;
                /*color: #B0BEC5;*/
                display: table;
                font-weight: 100;
                /*font-family: 'Lato';*/
            }

            /* 内容のpadding */
            .container {
                padding: 100px;
                text-align: center;
                display: table-cell;
                /*vertical-align: middle;*/
            }


            /* Input、button用 */
            h1 {
                position: relative;
                text-align: center;
            }
            h1 span {
                position: relative;
                z-index: 2;
                display: inline-block;
                margin: 0 2.5em;
                padding: 0 1em;
                background-color: #fff;
                text-align: left;
            }
            h1::before {
                position: absolute;
                top: 50%;
                z-index: 1;
                content: '';
                display: block;
                width: 100%;
                height: 1px;
                background-color: #ccc;
            }

            /* 表用 */
            .register form{
                height:32px;
                width:240px;
                position:relative;
            }
            .register form input[type=text]{
                width:240px;
                height:32px;
                padding:4px 40px 4px 8px;
                border:none;
                -webkit-border-radius:32px;
                -moz-border-radius:32px;
                border-radius:32px;
                -webkit-appearance: none;
                outline: 0;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                position:absolute;
                background:#EEEEEE;
                top:0;
                right:0;
                backface-visibility: hidden;
                -webkit-transition: 0.25s ease-out;
                -moz-transition: 0.25s ease-out;
                -o-transition: 0.25s ease-out;
                transition: 0.25s ease-out;
            }
            .register form input[type=text]:focus{
                background:#F6F6F6;
            }
            .register form button{
                width:64px;
                height:32px;
                color:#fff;
                border:none;
                -webkit-border-radius:16px;
                -moz-border-radius:16px;
                border-radius:16px;
                background:#1B73BA;
                display:inline-block;
                -webkit-appearance: none;
                outline: 0;
                position:absolute;
                top:0;
                right:0;
                cursor:pointer;
                backface-visibility: hidden;
                -webkit-transition: 0.3s ease-out;
                -moz-transition: 0.3s ease-out;
                -o-transition: 0.3s ease-out;
                transition: 0.3s ease-out;
            }
            .register form button:hover{
                opacity:0.8;
            }
        </style>
    </head>
    <body>
    @extends('bar.bar')
        <div class="container">
            <h1><span>スーパーアカウント登録ページ</span></h1>
            <div class="register">
                <form action="register/" method="post">
                    <input type="text" name="nickname" value="ニックネームを入力">
                    <button type="submit">登録する</button>
                </form>
            </div>
        </div>
    </body>
</html>