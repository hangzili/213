<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>笑话展示</title>
</head>
<body>
    <table border="1">
        <tr>
            <td>ID</td>
            <td>笑话内容</td>
            <td>操作</td>
        </tr>
        @foreach($list as $k=>$v)
        <tr>
            <td>{{ $v['id'] }}</td>
            <td>{{ mb_substr($v['content'],0,10) }}.......</td>
            <td>
                <a href="/exam/content?id={{ $v['id'] }}">查看详情</a>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>