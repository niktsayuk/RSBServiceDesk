<?php
    $all_profile = "SELECT * FROM `profile`";
    $all_city = "SELECT * FROM `city`";
    $all_users = "SELECT * FROM `users`";
    $all_categories = "SELECT * FROM `categories`";
    $_SELECT_USER_PROFILE = "SELECT users.*, profile.name, city.region_city FROM `users` 
                            JOIN `profile` ON users.id_profile=profile.id
                            JOIN `city` ON users.id_city=city.id";
    $_SELECT_CLIENT_PROFILE = "SELECT clients.*, profile.name, city.region_city FROM `clients` 
                            JOIN `profile` ON clients.id_profile=profile.id
                            JOIN `city` ON clients.id_city=city.id";
?>