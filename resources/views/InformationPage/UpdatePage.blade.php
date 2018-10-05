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

            /* チェックボックス用 */
            .cp_ipcheck {
                width: 90%;
                margin: 2em auto;
                text-align: left;
            }
            .cp_ipcheck ul {
                margin: 0.5rem 0.5rem 2rem 0.5rem;
                padding: 0.5rem 1rem;
                list-style: none;
                border: 1px solid #cccccc;
            }
            .cp_ipcheck .list_item {
                margin: 0 0 0.5rem 0;
                padding: 0;
            }
            .cp_ipcheck label {
                line-height: 135%;
                position: relative;
                margin: 0.5rem;
                cursor: pointer;
            }
            .cp_ipcheck .option-input05 {
                position: relative;
                margin: 0 1rem 0 0;
                cursor: pointer;
            }
            .cp_ipcheck .option-input05:before {
                position: absolute;
                z-index: 1;
                top: 0.125rem;
                left: 0.1875rem;
                width: 0.75rem;
                height: 0.375rem;
                content: '';
                -webkit-transition: -webkit-transform 0.4s cubic-bezier(0.45, 1.8, 0.5, 0.75);
                transition:         transform 0.4s cubic-bezier(0.45, 1.8, 0.5, 0.75);
                -webkit-transform: rotate(-45deg) scale(0, 0);
                transform: rotate(-45deg) scale(0, 0);
                border: 2px solid #da3c41;
                border-top-style: none;
                border-right-style: none;
            }
            .cp_ipcheck .option-input05:checked:before {
                -webkit-transform: rotate(-45deg) scale(1, 1);
                transform: rotate(-45deg) scale(1, 1);
            }
            .cp_ipcheck .option-input05:after {
                position: absolute;
                top: -0.125rem;
                left: 0;
                width: 1rem;
                height: 1rem;
                content: '';
                cursor: pointer;
                border: 2px solid #f2f2f2;
                background: #ffffff;
            }
        </style>
    </head>
    <body>
        <div class="container" >
            <h1><span>スーパー一覧ページ</span></h1>
            <h3><span>アカウントID: {{$accountAchievement->getAccountId()}} ニックネーム: {{$accountAchievement->getNickName()}}</span></h3>
            <table class="cp_table cp_ipcheck" >
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>大分類</th>
                        <th>中分類</th>
                        <th>実績名</th>
                        <th>実績内容</th>
                        <th>チェック</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>テスト</th>
                        <td label="大分類"><p>大キュウリ</p></td>
                        <td label="中分類"><p>中キュウリ</p></td>
                        <td label="実績名"><p>キュウリ食べ</p></td>
                        <td label="実績内容"><p>キュウリを食べる</p></td>
                        <td label="チェック"><p><input type="checkbox" class="option-input05" checked /></p></td>
                    </tr>

                    @foreach ($achievementMasters as $achievementMaster)
                        <tr>
                            <th>{{$achievementMaster->getId()}}</th>
                            <td label="大分類"><p>{{$achievementMaster->getCategory()}}</p></td>
                            <td label="中分類"><p>{{$achievementMaster->getSubcategory()}}</p></td>
                            <td label="実績名"><p>{{$achievementMaster->getName()}}</p></td>
                            <td label="実績内容"><p>{{$achievementMaster->getContent()}}</p></td>
                            <td label="チェック">
                                <p>
                                    <input type="checkbox" class="option-input05"
                                           {{$accountAchievement->hasAchievement($achievementMaster->getId()) ? "checked" : ""}}/>
                                </p>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>