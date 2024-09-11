<?php
include_once '../../controllers/CustomerController.php';
require_once '../../models/CustomerModel.php';

$controller = new CustomerController();
$controller->delete($_GET['id']);