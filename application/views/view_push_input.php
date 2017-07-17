<!DOCTYPE html>
<html lang="ja">
<head>
	<title>PUSH通知　通知内容入力</title>
        <link rel="stylesheet" href="<?=base_url() ?>css/style.css" type="text/css" />
</head>
<body>

    <h1>PUSH通知管理　通知内容入力</h1>
    <?php echo $_SESSION['valid_user'] ? 'ログイン中です　　<a href='.$this->config->item('base_url')."/logout".'>ログアウト</a>' : '' ?>
    <?php echo validation_errors(); ?>
    <?php echo form_open('push'); ?>
    <fieldset>
        <h2>通知内容</h2>
        <p class="attention">*は必須項目です</p>
        <table class="push_send">
            <tbody>
                <tr class="colm">
                    <th>タイトル<span>*</span></th>
                    <td><input type="text" id="title" class="width350" name="title" value="<?php echo set_value('title', isset($title) ? $title : ''); ?>" /></td>
                </tr>
                <tr class="colm">
                    <th>本文<span>*</span></th>
                    <td><textarea id="text" class="textarea_text800_4 interval_b10" name="text"><?php echo set_value('text', isset($text) ? $text : ''); ?></textarea>
                    </td>
                </tr>
                <tr>
                    <th rowspan="2" class="rows_v_top">送信日時<span>*</span></th>
                    <td>
                        <input type="radio" name="send_time_type" value="now" checked="checked">今すぐ
                        <input type="radio" name="send_time_type" value="time" disabled>時間指定
                    </td>
                </tr>
                <tr class="colm">
                    <td><input type="text" id="send_time" name="send_time" value="<?php echo set_value('send_time', isset($send_time) ? $send_time : ''); ?>" disabled /></td>
                </tr>
                <tr class="colm">
                    <th>送信対象<span>*</span></th>
                    <td><?php echo form_dropdown('send_target', $sendTargets); ?></td>
                </tr>
                <tr class="colm">
                    <th>備考</th>
                    <td><textarea id="note" class="textarea_text800_4" name="note"><?php echo set_value('note', isset($note) ? $note : ''); ?></textarea></td>
                </tr>
            </tbody>
        </table>
    </fieldset>
    <p class="submit">
        <input type="reset" value="リセット" />
        <input type="submit" value="通知内容確認" />
    </p>
     <p>    
         <a href=<?php echo $this->config->item('base_url')."/menu";?>>メニューに戻る</a>
     </p>
</body>
</html>