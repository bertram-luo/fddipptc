<?php
      require('backend_header.php');
?>
<div class="container">
    <div class="jumbotron">
    <h1>选择内容录入针对类型</h1>
    <?php echo "文献编号:$m_id;";?>
    <hr>
    </div>
    <div class="bs-docs-example">
    <div class="span3">
        <blockquote><a href="/index.php/reference/select_ref?type=tip_1">针对研究文献,政府文件,公司文件,新闻消息,统计年鉴</a>
        </blockquote>
    </div>
    <div class="span3">
        <blockquote><a href="/index.php/reference/select_ref?type=tip_2">针对书籍</a>
        </blockquote>        
    </div>
    <div class="span3">
        <blockquote><a href="/index.php/reference/select_ref?type=tip_3">针对舆论消息</a>
        </blockquote>        
    </div>        
    </div>
        

</div>

</body> 
</html>
<?php

?>
