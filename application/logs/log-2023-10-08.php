<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-10-08 06:37:44 --> Severity: Notice --> Undefined variable: freelancer_id C:\xampp\htdocs\geeks_for_geeks\application\models\Freelancer_model.php 121
ERROR - 2023-10-08 06:52:36 --> Severity: Notice --> Undefined property: FreelancerRegistration::$freelancer_model C:\xampp\htdocs\geeks_for_geeks\application\controllers\FreelancerRegistration.php 242
ERROR - 2023-10-08 06:52:36 --> Severity: error --> Exception: Call to a member function delete_collab() on null C:\xampp\htdocs\geeks_for_geeks\application\controllers\FreelancerRegistration.php 242
ERROR - 2023-10-08 06:52:41 --> Severity: Notice --> Undefined property: FreelancerRegistration::$freelancer_model C:\xampp\htdocs\geeks_for_geeks\application\controllers\FreelancerRegistration.php 242
ERROR - 2023-10-08 06:52:41 --> Severity: error --> Exception: Call to a member function delete_collab() on null C:\xampp\htdocs\geeks_for_geeks\application\controllers\FreelancerRegistration.php 242
ERROR - 2023-10-08 07:17:45 --> Query error: Cannot delete or update a parent row: a foreign key constraint fails (`mast`.`customers`, CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)) - Invalid query: DELETE FROM `users`
WHERE `id` = '8'
ERROR - 2023-10-08 07:41:05 --> -----------------
