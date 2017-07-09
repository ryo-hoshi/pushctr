<!DOCTYPE html>
 <html lang="ja">
 <head>
     <meta charset="UTF-8">
     <title>push通知　メニュー画面</title>
 </head>
 <body>
     <h1>push通知　メニュー画面</h1>
     <h2>メニュー</h2>
     <p>
         <a href=<?php echo $this->config->item('base_url')."/push";?>>通知を送る</a>
     </p>
     <p>    
         <a href=<?php echo $this->config->item('base_url')."/history";?>>通知履歴</a>
     </p>
 </body>
 </html>