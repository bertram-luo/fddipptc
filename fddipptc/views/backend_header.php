<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta name="description" content>
	<meta name="author" content="contender-luopo">
	<link rel="shortcut icon" href="/icon/fudan.ico">
	<title>Start Template for Bootstrap</title>
	<!--Bootstrap core CSS-->
    <link href="/css/bootstrap.css" rel="stylesheet" media="screen">
    <script type="text/javascript" src="/js/jquery-1.8.3.min.js" charset="UTF-8"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
</head>
<body>
    <div id="navbar-example" class="navbar navbar-static">
      <div class="navbar-inner">
        <div class="container" style="width:auto;">
            <!-- 三个导航块,一个大的,二个下拉 -->
          <a class="brand" href="/index.php/backend">FDDI 政策规划训练营</a>
          <ul class="nav" role="navigation">
            <li class="dropdown">
                <a id="drop3" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">数据录入<b class="caret"></b></a>
                <ul class="dropdown-menu" role="menu" aria-labeledby="drop3">
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="/index.php/reference">研究资料</a></li>
                    <li role="presentation" class="divider"></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="/index.php/proposal">研究提纲</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="/index.php/report">研究报告</a></li>
                    
                </ul>
            </li>
            <li class="dropdown">
                <a id="drop3" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">信息查询检索<b class="caret"></b></a>
                <ul class="dropdown-menu" role="menu" aria-labeledby="drop3">
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="/index.php/search">信息查询检索</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a id="drop2" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">用户管理<b class="caret"></b></a>
                <ul class="dropdown-menu" role="menu" aria-labeledby="drop2">
                    <!--以后价格判断，只有特定用户才能添加用户-->
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="/index.php/useradd">添加用户</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="/index.php/passwd">修改密码</a></li>
                </ul>
            </li>
            
          </ul>
          <ul class="nav pull-right">
            <li id="fat-menu" class="dropdown">
                <a id="drop3" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['valid_username']; ?><b class="caret"></b></a>
                <ul class="dropdown-menu" role="menu" aria-labeledby="drop3">
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="/index.php/logout">登出</a></li>
                </ul>
            </li>
          </ul>
        </div>
      </div> <!-- /navbar-example -->
    </div>


