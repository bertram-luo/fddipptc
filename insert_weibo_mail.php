<?php
    header("Content-type:text/html;charset=utf-8");
    $weibo_data = file_get_contents("http://littleyou-littleyou.stor.sinaapp.com/weibo_mail_2.txt");
    $weibo_data = explode("\n",$weibo_data);
    foreach ($weibo_data as $key => $value) {
        $one_data = explode(":", $value);
        $remark = "hongliang_weibo_".$one_data[0].":".$one_data[1];
        $mail = $one_data[2];
        $url = "http://lclabs.sinaapp.com/index.php?name=mail&handle=add&json=1&mail={$mail}&remark={$remark}";
        $in_data = file_get_contents($url);
        $in_data = json_decode($in_data,true);
        if($in_data['className'] == "success"){
            echo "(".$remark.")----success!<br/>";
        }

    }

?>