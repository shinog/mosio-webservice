<?php

// /app/Config/email.php

class EmailConfig {

    // Gmailを例
    public $zoho = array(
        'host' => 'ssl://smtp.zoho.com',
        'port' => 465,
        'username' => 'info@mosio.me', // ユーザ名
        'password' => '*****',           // パスワード
		'transport' => 'Smtp'
    );
	
	public $heteml = array(
        'host' => 'mail507.heteml.jp',
        'port' => 465,
        'username' => 'mosio@falca.co',
        'password' => 'mosio0930',
       
    );
	
	public $gmail = array(
        'host' => 'ssl://smtp.gmail.com',
        'port' => 465,
        'username' => 'shibireruotona@gmail.com',
        'password' => '*****',
        'transport' => 'Smtp'
    );
}