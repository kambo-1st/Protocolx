<?php
namespace Kambo\Tests\Database\Protocolx\Persistence;

use PHPUnit_Extensions_Database_DataSet_YamlDataSet as YamlDataSet;
use PHPUnit_Extensions_Database_DataSet_DefaultDataSet as DefaultDataSet;

abstract class DatabaseTestCase extends \PHPUnit_Extensions_Database_TestCase
{
    private static $pdoConnection = null;

    /**
     * Get database connection using the PDO connection for MySQL.
     *
     * @return PHPUnit_Extensions_Database_DB_DefaultDatabaseConnection
     */
    final public function getConnection()
    {
        if (!isset($this->pdoConnection)) {
            $this->pdoConnection = new \PDO(
                "mysql:host=".$GLOBALS['DB_HOST']
                .";dbname=".$GLOBALS['DB_DBNAME'],
                $GLOBALS['DB_USER'],
                $GLOBALS['DB_PASSWD']
            );
        }

        return $this->createDefaultDBConnection($this->pdoConnection);
    }

    /**
     * Prepare data set for database tests
     *
     * @return DefaultDataSet
     */
    public function getDataSet()
    {
        $reflection  = new \ReflectionClass($this);
        $fixturePath = dirname($reflection->getFileName()).'/fixtures.yml';
        if (file_Exists($fixturePath)) {
            return new YamlDataSet($fixturePath);
        }

        return new DefaultDataSet;
    }

    public function getDatabaseConfig()
    {
        return [
            'host' => $GLOBALS['DB_HOST'],
            'user' => $GLOBALS['DB_USER'],
            'password' => $GLOBALS['DB_PASSWD'],
            'database' => $GLOBALS['DB_DBNAME']
        ];
    }

    public function databaseSeed()
    {
        $this->getConnection();
        $databaseConfiguration = $this->getDatabaseConfig();

        $this->databaseQuery(
            'DROP DATABASE IF EXISTS '.$databaseConfiguration['database']
        );
        $this->databaseQuery(
            'CREATE DATABASE '.$databaseConfiguration['database']
        );
        $this->databaseQuery(
            'USE '.$databaseConfiguration['database']
        );

        $sqlData = file_get_contents(__DIR__.DIRECTORY_SEPARATOR.'schema.sql');

        $this->databaseQuery($sqlData);
    }

    public function databaseQuery($sql)
    {
        $this->pdoConnection->query($sql);
    }

    public function databaseFetch($sql)
    {
        $data   = [];
        $result = $this->pdoConnection->query($sql);

        while ($row = $result->fetch(\PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }

        $result->closeCursor();

        return $data;
    }
}
