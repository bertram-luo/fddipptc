<?php
      require('backend_header.php');
?>
    <link href="/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
        <div class="container">
            <div class="jumbotron">
                <h1>参考资料录入</h1>
                <form action="/index.php/reference/reference_1" method="post">
                <legend class="text-warning">第一步:文献基本信息录入</legend>
                <table class="table-condensed">
                    <tbody>
                    <tr>
                        <td>文献类型</td>
                        <td>
                            <select class="form-control" name="reference_type" value="<?php echo $reference_type;?>">
                            <option value="B">图书</option>
                            <option value="C">公司公告</option>
                            <option value="G">政府文件</option>
                            <option value="J">研究报告</option>
                            <option value="N">新闻消息</option>
                            <option value="S">公共舆论</option>
                            <option value="T">统计年鉴</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                    	<td>第一作者</td>
                    	<td><input type="text" name="all_name" placeholder="作者全名,示例：李鹏飞" value="<?php echo $all_name;?>">
                        <input type="text" name="short_name" placeholder="作者简称,示例：LPF" value="<?php echo $short_name;?>"</td>
                    </tr>
                    <tr>
                    <td>文献日期</td>
                        <td>
                            <div class="controls input-append date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                            <input size="16" type="text" value="" name="publish_date" value="<?php echo $publish_date;?>">
                            <span class="add-on"><i class="icon-th"></i></span>
                            </div>
                        </td>   
                    </tr>
                    <tr>
                    	<td>文献标题</td>
						<td><input  class="form-control" type="text" name="title" placeholder="文献标题" value="<?php echo $title;?>"></td>
                    </tr>
                    <tr>
                    	<td><input  class="btn btn-primary" type="submit" value="下一步"></td>
                    </tr>
                    </tbody>
                </table>
                </form>
            </div>
        </div>
<script type="text/javascript" src="/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript">
    $('.form_date').datetimepicker({
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
<?php
      require('backend_footer.php');
?>
