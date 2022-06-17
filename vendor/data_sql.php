<?php
    $all_profile = "SELECT * FROM `profile`";
    $all_city = "SELECT * FROM `city`";
    $all_users = "SELECT * FROM `users`";
    $all_categories = "SELECT * FROM `categories`";
    $_SELECT_TASK = "SELECT task.*, users.*, clients.*, id_categories.name, terminals.* FROM `task` 
                    JOIN `users` ON task.id_user=users.id 
                    JOIN `clients`ON task.id_user=clients.id
                    JOIN `categories` ON task.id_categories=categories.id
                    JOIN `terminals` ON task.id_terminal=terminals.id";
    $_SELECT_USER_PROFILE = "SELECT users.*, profile.name, city.region_city FROM `users` 
                            JOIN `profile` ON users.id_profile=profile.id
                            JOIN `city` ON users.id_city=city.id";
    $_SELECT_CLIENT_PROFILE = "SELECT clients.*, profile.name, city.region_city FROM `clients` 
                            JOIN `profile` ON clients.id_profile=profile.id
                            JOIN `city` ON clients.id_city=city.id";
?>