<?php
	require('backend_header.php');

?>
    <div class="container">
        <div class="jumbotron">
        	<h1 align="left">提纲列表：</h1>
            <legend>请选择对应提纲上传报告内容</legend>
            <?php
            if(count($pro_list)<1){
                echo "请先上传提纲！<a href='/index.php/proposal'>提纲录入</a>";
            }else{
                foreach ($pro_list as $key => $row) {
                echo <<<HTML
                <div class="bs-docs-example span8">
                    <address>
                    <strong>
HTML;
                    echo $row->title;
                    echo <<<HTML
                      </strong><br>
HTML;
                    echo '报告id：'.$row->p_id."<br/>";
                    echo '作者：'.str_replace('|','， ',$row->authors)."<br/>";
                    echo '关键词：'.str_replace('|','，',$row->keywords)."<br/>";
                    echo '文献地点:'.htmlspecialchars($row->ref_locs)."<br/>";
                    echo '政府：'.str_replace('|',',',$row->gov_locs)."<br/>";
                    echo '大纲时间:'.htmlspecialchars($row->start)." ".htmlspecialchars($row->end);
                    echo <<<HTML
                    <address>
                      <strong>文件地址</strong><br>
HTML;
                    echo "<a href='{$row->userfile}'>{$row->userfile}</a>";
                    if(isset($row->report->report_id) && isset($row->report->userfile)){
                        echo '<br><strong>报告地址</strong><br>'."<a href='{$row->report->userfile}'>{$row->report->userfile}</a>";
                    }else{
                        echo "<a class='btn' style='margin-left:100px;' href='report/add_report?p_id={$row->p_id}'>添加报告</a>"; 
                    }
                    echo "</address></div>";

                }
                            
            }   

        
        ?>
        </div>
    </div>
<?php
	require('backend_footer.php');
?>
