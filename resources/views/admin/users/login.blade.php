<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台登录</title>
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <link rel="shortcut icon" href="/favicon.ico" type="/image/x-icon" />
    <link rel="stylesheet" href="/css/x-admin/font.css">
	<link rel="stylesheet" href="/css/x-admin/xadmin.css">
    <script type="text/javascript" src="/js/jquery-3.1.0.min.js"></script>
    <script src="/other/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/js/x-admin/xadmin.js"></script>


    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="login-bg">

    <div class="login layui-anim layui-anim-up">
        <div class="message">管理员登录</div>
        <div id="darkbannerwrap"></div>
        <form class="layui-form" method="post" action="{{ url('/admin/login') }}" >
            {{ csrf_field() }}
            <input name="username" placeholder="用户名"  type="text" lay-verify="required" class="layui-input" value="{{ old('username') }}" >
            <hr class="hr15">
            <input name="password" lay-verify="required" placeholder="密码"  type="password" class="layui-input">
            <hr class="hr15">
            <div style="color: red;">
                @if ($errors->has('username'))
                   <span class="help-block">
                       <strong>{{ $errors->first('username') }}</strong>
                   </span>
                @endif
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <input id="submit" value="登录" lay-submit lay-filter="login"  style="width:100%;" type="submit">
            <hr class="hr20" >
        </form>
    </div>

    <script>
        $(function  () {
            {{--$('#submit').click(function () {--}}
                {{--layui.use('form', function(){--}}
                    {{--var form = layui.form;--}}
                    {{--layer.msg('玩命卖萌中', function(){--}}
                        {{--//关闭后的操作--}}
                    {{--});--}}

                    {{--var data = {};--}}
                    {{--data['username'] = $('input[name=username]').val();--}}
                    {{--data['password'] = $('input[name=password]').val();--}}
                    {{--data['_token']   = $('input[name=_token]').val();--}}

                    {{--$.ajax({--}}
                        {{--url: "{{ url('/admin/login') }}",--}}
                        {{--data: data,--}}
                        {{--type: 'post',--}}
                        {{--success: function (msg) {--}}
                            {{--console.log(data);--}}
                            {{--console.log(msg);--}}
                        {{--}--}}
                    {{--})--}}
                    {{--return false;--}}
                    {{--//监听提交--}}
{{--//                    form.on('submit(login)', function(data){--}}

{{--//                        alert(888)--}}
{{--//                        layer.msg(JSON.stringify(data.field),function(){--}}
{{--//                            location.href='/admin/home';--}}
{{--//                        });--}}
{{--//                        return false;--}}
{{--//                    });--}}
                {{--});--}}
            {{--});--}}

        })

    </script>
</body>
</html>