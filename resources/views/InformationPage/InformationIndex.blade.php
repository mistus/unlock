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


            /* タイトル用 */
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
            .cp_table *, .cp_table *:before, .cp_table *:after {
                -webkit-box-sizing: border-box;
                box-sizing: border-box;
            }
            .cp_table {
                width: 100%;
                border-collapse: collapse;
                border-right: 1px solid #dddddd;
            }
            .cp_table thead th {
                padding: 10px 15px;
                border-right: 1px solid #ffffff;
                border-bottom: 1px solid #ffffff;
                background: #dddddd;
            }
            .cp_table thead th:last-child {
                border-right: 1px solid #dddddd;
            }
            .cp_table tbody th {
                padding: 10px 15px;
                vertical-align: top;
                border-bottom: 1px solid #ffffff;
                background: #dddddd;
                white-space: nowrap;
            }
            .cp_table tbody tr:last-child th {
                border-bottom: 1px solid #dddddd;
            }
            .cp_table tbody td {
                padding: 10px 15px;
                vertical-align: top;
                border-bottom: 1px solid #dddddd;
                border-left: 1px solid #dddddd;
                background: #ffffff;
            }
            @media only screen and (max-width:480px) {
                .cp_table thead {
                    display: none;
                }
                .cp_table tbody th {
                    display: block;
                }
                .cp_table tbody td {
                    display: block;
                    padding: 10px 5px;
                }
                .cp_table tbody td::before {
                    font-weight: bold;
                    float: left;/*上のth要素が長い場合こちらを解除すると1段落下り見やすくなります*/
                    padding: 0.5em 0;
                    content: attr(label);
                }
                .cp_table tbody td p {
                    padding: 0.5em 0 0 1em;
                    margin: 0;
                }
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1><span>スーパー一覧ページ</span></h1>

            <table class="cp_table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ニックネーム</th>
                        <th>実績数</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>テスト</th>
                        <td label="ニックネーム"><p>キュウリ</p></td>
                        <td label="実績数"><p>100</p></td>
                    </tr>
                    @foreach ($accountAchievements as $accountAchievement)
                        <tr>
                            <th>
                                <a href="accountDetailPage/{{$accountAchievement->getAccountId()}}">
                                    {{$accountAchievement->getAccountId()}}
                                </a>
                            </th>
                            <td label="ニックネーム"><p>{{$accountAchievement->getNickName()}}</p></td>
                            <td label="実績数"><p>{{$accountAchievement->getAchievements()->count()}}</p></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>