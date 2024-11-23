<?php

require 'vendor/autoload.php';

use Google\Cloud\Bigtable\Admin\V2\BigtableTableAdminClient;
use Google\Cloud\Bigtable\Admin\V2\ColumnFamily;
use Google\Cloud\Bigtable\Admin\V2\Table;
use Google\Cloud\Core\ExponentialBackoff;

// Remplacez avec les informations de votre projet, instance et table
$projectId = 'your-project-id';
$instanceId = 'your-instance-id';
$tableId = 'your-table-id';
$familyId = 'cf1';

// Crée un client BigtableTableAdmin
$tableAdminClient = new BigtableTableAdminClient([
    'projectId' => $projectId,
]);

// Chemin vers l'instance Bigtable
$instanceName = $tableAdminClient->instanceName($projectId, $instanceId);

// Crée une famille de colonnes
$columnFamily = (new ColumnFamily())->setGcRule(['max_num_versions' => 10]);
$columnFamilies = [$familyId => $columnFamily];

// Crée une table avec la famille de colonnes
$table = (new Table())
    ->setColumnFamilies($columnFamilies);

// Configure la réplication pour la table (optionnel)
$table->setGranularity('MILLIS');

// Crée la table
$tableAdminClient->createTable($instanceName, $tableId, $table);

print("Table $tableId created with column family $familyId\n");
