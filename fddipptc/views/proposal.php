<?php
	require('backend_header.php');
?>
<link href="/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<div class="container">
	<div class="jumbotron">
		<h1>研究提纲录入</h1>
		<hr>
		<form method='post' enctype="multipart/form-data" action="proposal/insert" class="form-horizontal">
			<div class="control-group">
				<label class="control-label" for="title">研究题目:</label>
				<div class="controls">
					<input class="input-xxlarge form-control" id="title" type="text" name="title" placeholder="研究题目"></input>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="file">研究提纲:</label>
				<div class="controls">
					<input type="file" name="userfile" id="file" class="form-control input--xxlarge" placeholder="选择文件"></input>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="keywordsID">关键词:</label>
				<div class="controls">
					<span id="keywords">
						<input class="input-small form-control" id="keywordsID" type="text" name="keywords[]" placeholder="关键词">
						<input class="input-small form-control" type="text" name="keywords[]" placeholder="关键词">
						<input class="input-small form-control" type="text" name="keywords[]" placeholder="关键词">
						<input class="input-small form-control" type="text" name="keywords[]" placeholder="关键词">
						<input class="input-small form-control" type="text" name="keywords[]" placeholder="关键词">
					</span>
					<button id="add_keywords"><i class="icon-plus"></i></button>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="ref_locsID">文献地点:</label>
				<div class="controls">
					<span id="ref_locs">
						<input class="inputform-control" id="ref_locsID" type="text" name="ref_locs[]" placeholder="中国大陆东北吉林长春朝阳区"  />
					</span>
					<button id="add_ref_locs"><i class="icon-plus"></i></button>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="govID">政府:</label>
				<div class="controls">
					<span id="gov_locs">
						<input class="input" id="govID" type="text" name="gov_locs[]" placeholder="上海市政府，杨浦区政府" />
					</span>
					<button id="add_gov_locs"><i class="icon-plus"></i></button>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="authorsID">大纲作者:</label>
				<div class="controls">
					<span id="authors">
						<input class="input-small form-control" id="authorsID" type="text" name="authors[]" placeholder="大纲作者" />
					</span>
					<button id="add_authors"><i class="icon-plus"></i></button>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" >大纲时间区间:</label>
				<div class="controls">
					<span class="input-append date" id="form_date1" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
						<input size="16" type="text" value="" name="start">
						<span class="add-on"><i class="icon-th"></i></span>
					</span>
					<span class="input-append date" id="form_date2" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
						<input size="16" type="text" value="" name="end">
						<span class="add-on"><i class="icon-th"></i></span>
					</span>
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
					<input class="btn btn-primary" type="submit" value="提交">
				</div>
			</div>
		</form>
	</div>
</div>
<script type="text/javascript" src="/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript">
	$('#form_date1').datetimepicker({
		language: 'fr',
		weekStart: 1,
		todayBtn: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
	});
	$('#form_date2').datetimepicker({
		language: 'fr',
		weekStart: 1,
		todayBtn: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
	});
</script>
<script>
	$(document).ready(function(){
		var maxAuthors = 8;
		var curAuthors = 5;
		$('#add_keywords').click(function(){
			if (curAuthors < maxAuthors){
				$('#keywords').append("<input class='input-small form-control' type='text' name='keywords[]' placeholder='关键词' />"); 
				curAuthors = curAuthors+1;
				return false;
			}else{return false;}
		});
    $('#add_ref_locs').click(function(){
      $('#ref_locs').append("<input class='input-small form-control' type='text' name='ref_locs[]' placeholder='地点' />"); 
      return false;
    });
		$('#add_gov_locs').click(function(){
			$('#gov_locs').append("<input class='input-small form-control' type='text' name='gov_locs[]' placeholder='政府' />"); 
			return false;
		});
		$('#add_authors').click(function(){
			$('#authors').append("<input class='input-small form-control' type='text' name='authors[]' placeholder='关键词' />"); 
			return false;
		});	
	});
</script>
<?php require('backend_footer.php')?>