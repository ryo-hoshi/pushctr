<!DOCTYPE html>
 <html lang="ja">
 <head>
     <meta charset="UTF-8">
     <title>push通知　履歴画面</title>
     <link rel="stylesheet" href="<?=$this->config->item('base_url') ?>/css/style.css" type="text/css" />
 </head>
 <body>
     <h1>push通知　履歴画面</h1>
     <h2>通知履歴</h2>

    <table border="1" class="push_send">
        <tbody>
            <tr>
                <td class="hist_title hist_head_color">タイトル</td>
                <td class="hist_text hist_head_color">本文</td>
                <td class="hist_send_time hist_head_color">送信時間</td>
                <td class="hist_send_target_name hist_head_color">送信対象</td>
                <td class="hist_note hist_head_color">備考</td>
            </tr>
            <?php
              foreach($result as $row) {
                  echo "<tr>";
                    echo "<td class='hist_title'>" . html_escape($row->title) . "</td>";
                    echo "<td class='hist_text'>" . html_escape($row->text) . "</td>";
                    echo "<td class='hist_send_time'>" . html_escape($row->send_time) . "</td>";
                    echo "<td class='hist_send_target_name'>" . html_escape($row->send_target_name) . "</td>";
                    echo "<td class='hist_note'>" . html_escape($row->note) . "</td>";
                  echo "</tr>";
               }
            ?>
        </tbody>
    </table>
     <p>    
         <a href=<?php echo $this->config->item('base_url')."/menu";?>>メニューに戻る</a>
     </p>
     
 </body>
 </html>