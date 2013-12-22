<?php
      require('backend_header.php');
?>
    <link rel="stylesheet" href="/js/ke/default.css" />
        <script charset="utf-8" src="/js/ke/kindeditor-min.js"></script>
        <script charset="utf-8" src="/js/ke/zh_CN.js"></script>
        <script>
            var editor;
            KindEditor.ready(function(K) {
                editor = K.create('textarea[name="toc"]', {
                    resizeType : 1,
                    allowPreviewEmoticons : false,
                    allowImageUpload : false,
                    items : [
                        'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
                        'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
                        'insertunorderedlist', 'link']
                });
            });
            KindEditor.ready(function(K) {
                editor = K.create('textarea[name="preface"]', {
                    resizeType : 1,
                    allowPreviewEmoticons : false,
                    allowImageUpload : false,
                    items : [
                        'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
                        'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
                        'insertunorderedlist', 'link']
                });
            });
            KindEditor.ready(function(K) {
                editor = K.create('textarea[name="comment"]', {
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
                <h1>文章内容录入|针对书籍</h1>
                <?php echo "文献编号:$m_id;";?>
                <form method='post' enctype="multipart/form-data" action="/index.php/reference/reference_tip_2" class="form-horizontal">
                <legend class="text-success">第三步:文章内容录入</legend>
                <input type="hidden" name="m_id" value="<?php echo $m_id;?>">
                <div class="control-group">
                    <label class="control-label" for="inputEmail">书籍目录:</label>
                    <div class="controls">
                        <textarea rows="3" name="toc" placeholder="书籍目录" style="height:260px;">书籍目录</textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputEmail">书籍目录附件:</label>
                    <div class="controls">
                    <input type="file" name="directory_attach" class="form-control" placeholder="书籍目录附件">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputEmail">书籍序言:</label>
                    <div class="controls">
                        <textarea rows="3" name="preface" placeholder="书籍序言" style="height:260px;">书籍目录</textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputEmail">书籍序言附件:</label>
                    <div class="controls">
                    <input type="file" name="preface_attach" class="form-control" placeholder="书籍序言附件">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputEmail">书籍评论:</label>
                    <div class="controls">
                        <textarea rows="3" name="comment" placeholder="书籍目录" style="height:260px;">书籍评论</textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputEmail">书籍评论附件:</label>
                    <div class="controls">
                    <input type="file" name="comment_attach" class="form-control" placeholder="书籍评论附件">
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
    
<?php
      require('backend_footer.php');

?>
