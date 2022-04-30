<?php
    $all_profile = "SELECT * FROM `profile`";
    $all_users = "SELECT * FROM `users`";
    $all_categories = "SELECT * FROM `categories`";

    $sa_user_to_id_profile = "SELECT users.*, profile.name FROM `users` JOIN `profile` ON users.id_profile=profile.id";

    
?>