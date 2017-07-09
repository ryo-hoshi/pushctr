<!DOCTYPE html>
<html lang="ja">
<head>
	<title>PUSH通知　通知内容確認</title>
        <link rel="stylesheet" href="<?=base_url() ?>css/style.css" type="text/css" />
</head>
<body>

    <h1>PUSH通知管理　通知内容確認</h1>
    <?php echo form_open('push/send'); ?>
    <fieldset>
        <h2>通知内容</h2>
        <table class="push_send">
            <tbody>
                <tr class="colm">
                    <th>タイトル</th>
                    <td><?php echo html_escape($title); ?></td>
                </tr>
                <tr class="colm">
                    <th>本文</th>
                    <td><?php echo html_escape($text); ?></td>
                </tr>
                <tr class="colm">
                    <th>送信日時</th>
                    <td><?php echo html_escape($send_time) !== null ? html_escape($send_time) : '今すぐ'; ?></td>
                </tr>
                <tr class="colm">
                    <th>送信対象</th>
                    <td><?php echo html_escape($sendTargets[$send_target]); ?></td>
                </tr>
                <tr class="col">
                    <th>備考</th>
                    <td><?php echo html_escape($note); ?></td>
                </tr>
            </tbody>
        </table>
    </fieldset>
    <p class="submit">
        <input type="button" value="戻る" onClick="location.href='<?=base_url() ?>push'" />
        <input type="submit" value="通知送信" />
    </p>

</body>
</html>