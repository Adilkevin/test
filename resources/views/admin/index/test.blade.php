<html>

<head>
	{{--<title>test highlight</title>--}}
	<title>我的上传实施</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<script type="text/javascript" src="/js/jquery-3.1.0.min.js"></script>

	<!--highlighter-->
	{{--<link type="text/css" rel="stylesheet" href="/syntaxhighlighter/styles/shCore.css" />--}}
	{{--<link type="text/css" rel="stylesheet" href="/syntaxhighlighter/styles/shThemeDefault.css" />--}}
	{{--<script type="text/javascript" src="/syntaxhighlighter/scripts/shCore.js"></script>--}}
	{{--<script type="text/javascript" src="/syntaxhighlighter/scripts/shAutoloader.js"></script>--}}
	{{--<script type="text/javascript" src="/syntaxhighlighter/highlightCode.js"></script>--}}

	{{--<link href="/uploadify/uploadify.css" rel="stylesheet" type="text/css" />--}}
	{{--<script type="text/javascript" src="/uploadify/jquery.uploadify.js"></script>--}}



</head>

<body>

<div  >
                        <input type="file" name="FileUpload" id="FileUpload">
                        <a class="layui-btn layui-btn-mini" id="btn_uploadimg">上传图片</a>
                    </div>

<script>
$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
       $(function () {
           $("#btn_uploadimg").click(function () {
			   var formFile = new FormData();
               var fileObj = document.getElementById("FileUpload").files[0]; // js 获取文件对象
               if (typeof (fileObj) == "undefined" || fileObj.size <= 0) {
                   alert("请选择图片");
                   return;
               }
			   formFile.files = fileObj; //加入文件对象
               console.log('fileObj: ');
               console.log(fileObj);
               console.log('formFile: ');
               console.log(formFile);

			   console.log('formFile: ');
console.log(formFile.files);
               //第一种  XMLHttpRequest 对象
               //var xhr = new XMLHttpRequest();
               //xhr.open("post", "/Admin/Ajax/VMKHandler.ashx", true);
               //xhr.onload = function () {
               //    alert("上传完成!");
               //};
               //xhr.send(formFile);

               //第二种 ajax 提交

               var data = formFile;
               
               $.ajax({
                   url: "{{ url('admin/uploadFileAjax') }}",
                   data: formFile.files,
                   type: "post",
                   dataType: "json",
//                   cache: false,//上传文件无需缓存
                   processData: false,//用于对data参数进行序列化处理 这里必须false
                   contentType: false, //必须
                   success: function (result) {
					   console.log(result);
                       alert("上传完成!");
                   },
               })
           })
       })

   </script>


</body>


</html>