<?php
      require('backend_header.php');
?>
    <div class="container">
        <div class="jumbotron">
            <h1>文献搜索</h1>
            <hr>
            <form enctype="multipart/form-data" method="post" class="form-horizontal" action="/index.php/report/report_insert">
                <div class="control-group">
                    <label class="control-label" for="inputEmail">选择搜索类型</label>
                    <div class="controls">
                    <select name="type" id="">
                        <option value="material">文献资料</option>
                        <option value="proposal">研究大纲</option>
                        <option value="report">研究报告</option>
                    </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputEmail">提纲/报告编号:</label>
                    <div class="controls">
                    <input type="text" name="">
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
<?php
      require('backend_footer.php');
?>
