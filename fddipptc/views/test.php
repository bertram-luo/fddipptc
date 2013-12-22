<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta name="description" content>
	<meta name="author" content="contender-luopo">
	<link rel="shortcut icon" href="/icon/fudan.ico">
	<title>Start Template for Bootstrap</title>
	<!--Bootstrap core CSS-->
	

	<style>
    [touch-action="none"]{ -ms-touch-action: none; touch-action: none; }[touch-action="pan-x"]{ -ms-touch-action: pan-x; touch-action: pan-x; }[touch-action="pan-y"]{ -ms-touch-action: pan-y; touch-action: pan-y; }[touch-action="scroll"],[touch-action="pan-x pan-y"],[touch-action="pan-y pan-x"]{ -ms-touch-action: pan-x pan-y; touch-action: pan-x pan-y; }
     </style>
</head>
<body style ryt13131="1">
<div class="navbar navbar-default navbar-fixed-top">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/fddipptc.css" rel="stylesheet">
    <link href="/css/navbar-fixed-top.css" rel="stylesheet">
    <link href="/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

	<div class="container">
        <div class="navbar-header"> 
	        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        </button>
	        <a class="navbar-brand" href="/index.php/backend">FDDI 政策规划训练营</a>
		</div>
		
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">数据录入<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="divider"></li>
                        <li><a href="/index.php/reference">研究资料</a></li>
                        <li><a href="/index.php/proposal">研究提纲</a></li>
                        <li><a href="/index.php/report">研究报告</a></li>
                        <li class="divider"></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">数据检索<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="divider"></li>
                        <li><a href="search_reference">研究资料</a></li>
                        <li><a href="search_report_proposal">研究提纲</a></li>
                        <li><a href="search_report">研究报告</a></li>
                        <li class="divider"></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">用户管理<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="/index.php/backend/useradd">添加用户</a></li>
                        <li><a href="#">修改密码</a></li>
                        <li class="divider"></li>
                    </ul>
                <li>
            </ul>
            
            <ul class="nav navbar-nav navbar-right">
                <?php
                    $valid_username = $_SESSION['valid_username'];
                    echo "<li>欢迎你，亲爱的 $valid_username</li>";
                ?>
                <li class="active"><a href="/index.php/logout">登出</a></li> 
            </ul>
        </div>
    </div>
</div>

		<div class="well">
			<div id="datetimepicker4" class="input-append">
		    	<input data-format="yyyy-MM-dd" type="text"></input>
				<span class="add-on">
				<i data-time-icon="icon-time" data-date-icon="icon-calendar">
				</i>
			 	</span>
			</div>
		</div>
    <script src="/js/jquery-1.10.2.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/bootstrap-datetimepicker.min.js"></script>
    <script language="javascript" type="text/javascript" src="/js/My97DatePicker/WdatePicker.js"></script>
    <script type="text/javascript">
  $(document).ready(function() {
    $('#datetimepicker4').datetimepicker({
      pickTime: false
    });
  });
</script>
    </body>
 
</html>
