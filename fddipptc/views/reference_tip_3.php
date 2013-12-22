<?php
      require('backend_header.php');
?>
    <link rel="stylesheet" href="/js/ke/default.css" />
        <script charset="utf-8" src="/js/ke/kindeditor-min.js"></script>
        <script charset="utf-8" src="/js/ke/zh_CN.js"></script>
        <script>
            var editor;
            KindEditor.ready(function(K) {
                editor = K.create('textarea[name="contents"]', {
                    resizeType : 1,
                    allowPreviewEmoticons : false,
                    allowImageUpload : false,
                    items : [
                        'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
                        'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
                        'insertunorderedlist', 'link']
                });
            });
        </script>

            <div class="container">
                <div class="jumbotron">
                <h1>文章内容录入|针对舆论消息</h1>
                <?php echo "文献编号:$m_id;";?>
            <form method='post' enctype="multipart/form-data" action="/index.php/reference/reference_3" class="form-horizontal">
                <legend class="text-success">第三步:文章内容录入</legend>
                <input type="hidden" name="m_id" value="<?php echo $m_id;?>">
                <div class="control-group">
                    <label class="control-label" for="inputEmail">文献全文:</label>
                    <div class="controls">
                        <textarea rows="3" name="contents" placeholder="文献全文" style="height:260px;">文献全文</textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputEmail">消息活跃区域:</label>
                    <div class="controls" >
                    <span id="messages">
                      <input class="form-control" type="text" name="messages[]" placeholder="消息活跃区域">
                    </span>
                    <button id="add_messages"><span class="add-on"><i class="icon-plus"></i>增加</span></button>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputEmail">文献摘取意见:</label>
                    <div class="controls" >
                    <span id="comments">
                      <input class="form-control" type="text" name="comments[]" placeholder="文献摘取意见">
                    </span>
                    <button id="add_comments"><span class="add-on"><i class="icon-plus"></i>增加</span></button>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputEmail">文献摘取图片:</label>
                    <div class="controls">
                    <input type="file" name="photo" class="form-control" placeholder="文献摘取图片">
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
    $('#add_messages').click(function(){
          $('#messages').append("<input class='form-control' type='text' name='messages[]' placeholder='消息活跃区域' />");
          return false;
    });
    $('#add_comments').click(function(){
          $('#comments').append("<input class='form-control' type='text' name='comments[]' placeholder='文献摘取意见' />");
          return false;
    });
   });
</script>
    
<?php
      require('backend_footer.php');

?>
