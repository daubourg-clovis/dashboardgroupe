<?php

$options = [
    'cost' => 12,
];
echo password_hash("1234", PASSWORD_BCRYPT, $options);