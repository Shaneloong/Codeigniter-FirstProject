<?php 

return [
    'email' => [
        'is_unique' => '电子邮箱已被注册'
    ],
    'password_confirmation' => [
        'required' =>'请确认输入密码',
        'matches' => '请确保密码与确认密码相同'
    ]
];