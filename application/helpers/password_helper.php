<?php

/**
 * ハッシュ化したパスワードを取得
 * 
 * @param $password パスワード入力値
 * @return ハッシュ化したパスワード
 */
function get_hashed_password($password)
{
    if (empty($password)) {
        return null;
    } else {
        $val = $password."16e701e4193de3e2e59fd";
        return hash("sha256", $val);
    }
}

