<?php
      require('backend_header.php');
?>
<link href="/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

	<div class="container">
		<div class="jumbotron">
			<h1>研究报告录入</h1>
            <hr>
			<form enctype="multipart/form-data" method="post" class="form-horizontal" action="/index.php/report/report_insert">
				<div class="control-group">
                    <label class="control-label" for="no">提纲/报告编号:</label>
                    <div class="controls">
                    <input  class="input-large form-control" id="no" type="text" name="report_id" readonly value="<?php echo $pro_row->p_id;?>"></input>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="title">提纲标题:</label>
                    <div class="controls">
                    <input  class="input-xxlarge form-control"  id="title" type="text" name="title" readonly value="<?php echo $pro_row->title;?>"></input>
                    </div>
                </div>
				<div class="control-group">
                    <label class="control-label" for="fileID">报告文件:</label>
                    <div class="controls">
                    <input type="file" name="userfile" id="fileID" class="form-control" placeholder="选择文件">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="keywordsID">关键词:</label>
                    <div class="controls" >
                    <span id="keywords">
                      <input class="input-small form-control" id="keywordsID" type="text" name="keywords[]" placeholder="关键词">
                    </span>
                    <button id="add_keywords"><span class="add-on"><i class="icon-plus"></i>增加</span>
                    </button>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="ref_locsID">文献地点:</label>
                    <div class="controls">
                        <input class="input-xxlarge form-control" id="ref_locsID" type="text" name="ref_locs" placeholder="文献地点,例如：中国大陆东北吉林长春朝阳区" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="gov_locsID">政府:</label>
                    <div class="controls" >
                    <span id="gov_loc">
                      <input class="input" type="text"  id="gov_locsID" name="gov_locs[]" placeholder="政府,例如：上海市政府，杨浦区政府" />
                    </span>
                    <button id="add_gov_loc"><span class="add-on"><i class="icon-plus"></i>增加</span></button>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="authorsID">报告作者:</label>
                    <div class="controls">
                    <span id="authors">
                        <input class="input-small form-control" id="authorsID" type="text" name="authors[]" placeholder="大纲作者" />        
                    </span>
                    <button id="add_authors"><span class="add-on"><i class="icon-plus"></i>增加</span></button>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="timeID">大纲时间区间:</label>
                    <div class="controls">
                      <span class="input-append date form_date1" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                        <input size="16" type="text" id="timeID" value="" name="start">
                        <span class="add-on"><i class="icon-th"></i></span>    
                      </span>
                      <span class="input-append date form_date2" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                        <input size="16" type="text" value="" name="end">
                        <span class="add-on"><i class="icon-th"></i></span>   
                      </span>
                    </div>
                </div> 
                <div class="control-group">
                <div class="controls">
                        <input class="btn btn-primary"  type="submit" value="下一步"></td>
                    </div>
                </div>
			</form>
        </div>
    </div>
<script type="text/javascript" src="/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript">
    $('.form_date1').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });
    $('.form_date2').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });
    $('.form_date3').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });
</script>
    <script>
  $(document).ready(function(){
    var maxAuthors = 8;
    var curAuthors  = 1
    $('#add_keywords').click(function(){
          $('#keywords').append("<input class='input-small form-control' type='text' name='keywords[]' placeholder='关键词' />");
          return false;
    });
    $('#add_gov_loc').click(function(){
          $('#gov_loc').append("<input class='input form-control' type='text' name='gov_loc[]' placeholder='政府' />");
          return false;
    });
    $('#add_authors').click(function(){
          $('#authors').append("<input class='input-small form-control' type='text' name='authors[]' placeholder='大纲作者' />");
          return false;
    });
   });
</script>
<?php
      require('backend_footer.php');
?>
