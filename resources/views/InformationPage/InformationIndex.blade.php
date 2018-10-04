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
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
                margin-bottom: 40px;
            }

            .quote {
                font-size: 24px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Laravel Tst</div>
                <div class="quote">{{ Inspiring::quote() }}</div>

                <table>
                    <tr>
                        <th>ID</th>
                        <th>ニックネーム</th>
                        <th>実績数</th>
                    </tr>

                    {{--<tr>--}}
                        {{--<td>1</td>--}}
                        {{--<td>キュウリ</td>--}}
                        {{--<td>304</td>--}}
                    {{--</tr>--}}

                    @foreach ($accountAchievements as $accountAchievement)
                        <tr>
                            <th>{{$accountAchievement->getAccountId()}}</th>
                            <th>{{$accountAchievement->getNickName()}}</th>
                            <th>{{$accountAchievement->getAchievements()->count()}}</th>
                        </tr>
                    @endforeach

                </table>


            </div>
        </div>
    </body>
</html>
