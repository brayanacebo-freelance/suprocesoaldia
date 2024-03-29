<?php

// autoload_classmap.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'Action' => $baseDir . '/app/models/Action.php',
    'ActionsController' => $baseDir . '/app/controllers/ActionsController.php',
    'ActionsTableSeeder' => $baseDir . '/app/database/seeds/ActionsTableSeeder.php',
    'Assistant' => $baseDir . '/app/models/Assistant.php',
    'AssistantsController' => $baseDir . '/app/controllers/AssistantsController.php',
    'BaseController' => $baseDir . '/app/controllers/BaseController.php',
    'CitiesController' => $baseDir . '/app/controllers/CitiesController.php',
    'City' => $baseDir . '/app/models/City.php',
    'CityTableSeeder' => $baseDir . '/app/database/seeds/CityTableSeeder.php',
    'Client' => $baseDir . '/app/models/Client.php',
    'ClientController' => $baseDir . '/app/controllers/ClientController.php',
    'ClientsController' => $baseDir . '/app/controllers/ClientsController.php',
    'ClientsRepository' => $baseDir . '/app/repositories/ClientsRepository.php',
    'CreateActionsTable' => $baseDir . '/app/database/migrations/2014_02_15_235324_create_actions_table.php',
    'CreateAssistantsTable' => $baseDir . '/app/database/migrations/2014_02_15_234437_create_assistants_table.php',
    'CreateCitiesTable' => $baseDir . '/app/database/migrations/2014_02_15_235834_create_cities_table.php',
    'CreateClientsTable' => $baseDir . '/app/database/migrations/2014_02_15_234041_create_clients_table.php',
    'CreateDepartmentsTable' => $baseDir . '/app/database/migrations/2014_02_15_235804_create_departments_table.php',
    'CreateMovementTable' => $baseDir . '/app/database/migrations/2014_02_15_235720_create_movement_table.php',
    'CreateNotificationTypesTable' => $baseDir . '/app/database/migrations/2014_02_15_235406_create_notification_types_table.php',
    'CreateOfficesTable' => $baseDir . '/app/database/migrations/2014_02_26_002715_create_offices_table.php',
    'CreateProcessTypesTable' => $baseDir . '/app/database/migrations/2014_02_15_235057_create_process_types_table.php',
    'CreateProcessesTable' => $baseDir . '/app/database/migrations/2014_02_15_234958_create_processes_table.php',
    'CreateUsersTable' => $baseDir . '/app/database/migrations/2014_02_15_233520_create_users_table.php',
    'DatabaseSeeder' => $baseDir . '/app/database/seeds/DatabaseSeeder.php',
    'Department' => $baseDir . '/app/models/Department.php',
    'DepartmentsController' => $baseDir . '/app/controllers/DepartmentsController.php',
    'DepartmentsTableSeeder' => $baseDir . '/app/database/seeds/DepartmentsTableSeeder.php',
    'HomeController' => $baseDir . '/app/controllers/HomeController.php',
    'IlluminateQueueClosure' => $vendorDir . '/laravel/framework/src/Illuminate/Queue/IlluminateQueueClosure.php',
    'MailController' => $baseDir . '/app/controllers/MailController.php',
    'Movement' => $baseDir . '/app/models/Movement.php',
    'MovementsController' => $baseDir . '/app/controllers/MovementsController.php',
    'MovementsRepository' => $baseDir . '/app/repositories/MovementsRepository.php',
    'NotificationType' => $baseDir . '/app/models/NotificationType.php',
    'NotificationTypeController' => $baseDir . '/app/controllers/NotificationTypeController.php',
    'NotificationTypesTableSeeder' => $baseDir . '/app/database/seeds/NotificationTypesTableSeeder.php',
    'Office' => $baseDir . '/app/models/Office.php',
    'OfficesController' => $baseDir . '/app/controllers/OfficesController.php',
    'OfficesTableSeeder' => $baseDir . '/app/database/seeds/OfficesTableSeeder.php',
    'Process' => $baseDir . '/app/models/Process.php',
    'ProcessType' => $baseDir . '/app/models/ProcessType.php',
    'ProcessTypeController' => $baseDir . '/app/controllers/ProcessTypeController.php',
    'ProcessTypeTableSeeder' => $baseDir . '/app/database/seeds/ProcessTypeTableSeeder.php',
    'ProcessesController' => $baseDir . '/app/controllers/ProcessesController.php',
    'ProcessesRepository' => $baseDir . '/app/repositories/ProcessesRepository.php',
    'SessionHandlerInterface' => $vendorDir . '/symfony/http-foundation/Symfony/Component/HttpFoundation/Resources/stubs/SessionHandlerInterface.php',
    'TestCase' => $baseDir . '/app/tests/TestCase.php',
    'User' => $baseDir . '/app/models/User.php',
    'UsersController' => $baseDir . '/app/controllers/UsersController.php',
    'UsersSeeder' => $baseDir . '/app/database/seeds/UsersSeeder.php',
    'Way\\Generators\\Generators\\ControllerGenerator' => $vendorDir . '/way/generators/src/Way/Generators/Generators/ControllerGenerator.php',
    'Way\\Generators\\Generators\\FormDumperGenerator' => $vendorDir . '/way/generators/src/Way/Generators/Generators/FormDumperGenerator.php',
    'Way\\Generators\\Generators\\Generator' => $vendorDir . '/way/generators/src/Way/Generators/Generators/Generator.php',
    'Way\\Generators\\Generators\\MigrationGenerator' => $vendorDir . '/way/generators/src/Way/Generators/Generators/MigrationGenerator.php',
    'Way\\Generators\\Generators\\ModelGenerator' => $vendorDir . '/way/generators/src/Way/Generators/Generators/ModelGenerator.php',
    'Way\\Generators\\Generators\\RequestedCacheNotFound' => $vendorDir . '/way/generators/src/Way/Generators/Generators/Generator.php',
    'Way\\Generators\\Generators\\ResourceGenerator' => $vendorDir . '/way/generators/src/Way/Generators/Generators/ResourceGenerator.php',
    'Way\\Generators\\Generators\\ScaffoldGenerator' => $vendorDir . '/way/generators/src/Way/Generators/Generators/ScaffoldGenerator.php',
    'Way\\Generators\\Generators\\SeedGenerator' => $vendorDir . '/way/generators/src/Way/Generators/Generators/SeedGenerator.php',
    'Way\\Generators\\Generators\\TestGenerator' => $vendorDir . '/way/generators/src/Way/Generators/Generators/TestGenerator.php',
    'Way\\Generators\\Generators\\ViewGenerator' => $vendorDir . '/way/generators/src/Way/Generators/Generators/ViewGenerator.php',
);
