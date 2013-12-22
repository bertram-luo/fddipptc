<?php
      require('backend_header.php');
?>
            <div class="container">
                <div class="jumbotron">
                <h1>参考资料录入</h1>
                <?php echo "文献编号:$m_id;";?>

                <form method='post' action="/index.php/reference/reference_2" class="form-horizontal">
                <legend class="text-warning">第二步:文献详细信息录入</legend>
                <input type="hidden" name="m_id" value="<?php echo $m_id;?>">
                <div class="control-group">
                    <label class="control-label" for="inputEmail">作者:</label>
                    <div class="controls">
                    <span id="authors">
                        <?php
                        foreach($authorsArr as $v){
                            print <<<HTML
                        <input class="input-small form-control" type="text" name="authors[]" placeholder="作者" value="{$v}"/>
HTML;
                        }
                        ?>
                    </span>
                    <button id="add_authors"><span class="add-on"><i class="icon-plus"></i>增加</span></button>
                    </div>
                </div>
        		<div class="control-group">
                    <label class="control-label" for="inputEmail">主要人物:</label>
                    <div class="controls">
                    <input class="input-xlarge form-control" type="text" name="persons" placeholder="主要人物" value="<?php echo $persons;?>"></input>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputEmail">文献地点:</label>
                    <div class="controls">
                    <input   class="input-xxlarge form-control" type="text" name=" $ref_loc" placeholder="文献地点,例如：中国大陆东北吉林长春朝阳区" value="<?php echo $ref_loc ?>"></input>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputEmail">政府:</label>
                    <div class="controls" >
                    <span id="gov_loc">
                    <?php
                        foreach ($gov_locArr as $key => $value) {
                            print <<<HTML
                      <input class="input" type="text" name="gov_loc[]" placeholder="政府,例如：上海市政府，杨浦区政府" value="{$v}"/>
HTML;
                        }
                    ?>
                    </span>
                    <button id="add_gov_loc"><span class="add-on"><i class="icon-plus"></i>增加</span></button>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputEmail">关键词:</label>
                    <div class="controls" >
                    <span id="keywords">
                    <?php
                        foreach($keywordsArr as $v){
                            print <<<HTML
                            <input class="input-small form-control" type="text" name="keywords[]" placeholder="关键词" value="{$v}">
HTML;
}
?>
                    </span>
                    <button id="add_keywords"><span class="add-on"><i class="icon-plus"></i>增加</span></button>
                    </div>
                </div>
                
                <div class="control-group">
                    <label class="control-label" for="inputEmail">文献基层来源:</label>
                    <div class="controls">
                        <input class="input-xxlarge form-control" type="text" name="from_where" placeholder="文献基层来源,多个以;分号隔开" value="<?php echo $from_where ?>"></input>   
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputEmail">文献摘取来源:</label>
                    <div class="controls">
                        <textarea rows="3" name="from_write" placeholder="文献摘取来源,多个以;分号隔开" ><?php echo $from_write ?></textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputEmail">文献摘取来源网址:</label>
                    <div class="controls">
                        <textarea rows="3" name="from_url" placeholder="文献摘取来源网址"><?php echo $from_url ?></textarea>
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
          $('#authors').append("<input class='input-small form-control' type='text' name='authors[]' placeholder='作者' />");
          return false;
    });
   });
</script>
    
   </body> 
</html>
<?php

?>
