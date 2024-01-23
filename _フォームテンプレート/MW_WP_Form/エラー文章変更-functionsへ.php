// - MW WP FORM エラー文変更
// - 「mwform_error_message_mw-wp-form-XXX」XXX -> form ID
function my_error_message($error, $key, $rule){
    if($key === 'お名前' && $rule === 'noempty'){
        return '※お名前を入力してください。';
    }
    if($key === 'ふりがな' && $rule === 'noempty'){
        return '※ふりがなを入力してください。';
    }
    if($key === '電話番号' && $rule === 'noempty'){
        return '※電話番号を入力してください。';
    }
    if($key === 'メールアドレス' && $rule === 'noempty'){
        return '※メールアドレスを入力してください。';
    }
    if($key === 'ご利用人数' && $rule === 'noempty'){
        return '※ご利用人数を入力してください。';
    }
    if($key === 'ご利用用途' && $rule === 'noempty'){
        return '※ご利用用途を選択してください。';
    }
    if($key === '※お問い合わせ内容' && $rule === 'noempty'){
        return '※お問い合わせ内容をご入力ください。';
    }
    return $error;
}
add_filter( 'mwform_error_message_mw-wp-form-XXX', 'my_error_message', 10, 3 );