<?php
    $all_profile = "SELECT * FROM `profile`";
    $all_city = "SELECT * FROM `city`";
    $all_users = "SELECT * FROM `users`";
    $all_categories = "SELECT * FROM `categories`";
    $_SELECT_USER_PROFILE = "SELECT users.*, profile.name FROM `users` JOIN `profile` ON users.id_profile=profile.id";
?>