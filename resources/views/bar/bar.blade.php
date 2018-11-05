<html>
    <head>
        <title>Laravel</title>

        <link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

        <style>
            .cp_stepflow07 {
                font-size: 80%;
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                margin: 0 0 1em;
                padding: 0;
            }
            .cp_stepflow07 > li {
                position: relative;
                display: block;
                width: auto;
                margin: 0;
                padding: 0;
                list-style: none;
                text-align: center;
                text-overflow: ellipsis;
                color: #b0bec5;
                -ms-flex: 1;
                -moz-flex: 1;
                -webkit-box-flex: 1;
                flex: 1;
            }
            .cp_stepflow07 > li .bubble::after,
            .cp_stepflow07 > li .bubble::before {
                position: absolute;
                top: 0px;
                right: 50%;
                left: 50%;
                display: block;
                width: 90%;
                height: 8px;
                content: '';
                transform: translateX(-50%);
                background-color: #b0bec5;
            }
            .cp_stepflow07 > li .bubble + span {
                display: block;
                margin-top: 1em;
            }
            .cp_stepflow07 > li.completed,
            .cp_stepflow07 > li.completed .bubble {
                color: #00acc1;
            }
            .cp_stepflow07 > li.completed .bubble,
            .cp_stepflow07 > li.completed .bubble::after,
            .cp_stepflow07 > li.completed .bubble::before {
                background-color: #4dd0e1;
            }
            .cp_stepflow07 > li.active,
            .cp_stepflow07 > li.active .bubble {
                font-weight: bold;
                color: #f57c00;
            }
            .cp_stepflow07 > li.active .bubble,
            .cp_stepflow07 > li.active .bubble::after,
            .cp_stepflow07 > li.active .bubble::before {
                background-color: #fb8c00;
            }
        </style>
    </head>
    <body>
    <ul class="cp_stepflow07">
        <li class="completed"><span class="bubble"></span><span><a href="/information">一覧ページ</a></span></li>
        <li class="completed"><span class="bubble"></span><span><a href="/registerPage">登録ページ</a></span></li>
    </ul>
    </body>
</html>
