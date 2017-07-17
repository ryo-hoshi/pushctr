<!DOCTYPE html>
 <html lang="ja">
 <head>
     <meta charset="UTF-8">
     <title>push通知　ログイン画面</title>
 </head>
 <body>
     <h1>push通知　ログイン画面</h1>
     <h2>ユーザ情報入力</h2>
    <?php echo validation_errors(); ?>
    <?php echo form_open('login'); ?>
     <p>
         ユーザID:&nbsp;&nbsp;&nbsp;
         <input type="text" id="user_id" name="user_id" value="<?php echo set_value('user_id'); ?>" />
     </p>
     <p>
         パスワード:
         <input type="password" id="password" name="password" value="<?php echo set_value('password'); ?>" />
     </p>
    <p class="submit">
        <input type="submit" value="ログイン" />
    </p>
 </body>
 </html>