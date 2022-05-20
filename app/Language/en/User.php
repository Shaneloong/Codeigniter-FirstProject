<?php 

return [
    'email' => [
        'is_unique' => 'This email is already registered'
    ],
    'password_confirmation' => [
        'required' =>'Please confirm the password',
        'matches' => 'Please enter the same password again'
    ]
];