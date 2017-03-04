<?php
namespace Kambo\Tests\Database\Protocolx\Integration;

use Kambo\Tests\Database\Protocolx\Persistence\DatabaseTestCase;

use Kambo\Database\Protocolx\Adapter\Protocolx;
use Kambo\Database\Protocolx\Mysqlx;
use Kambo\Database\Protocolx\Schema;

/**
 * Integration test for the Session object.
 *
 * @package Kambo\Tests\Database\Protocolx\Integration
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class NodeSessionTest extends DatabaseTestCase
{
    /**
     * Performs operation returned by getSetUpOperation().
     */
    protected function setUp()
    {
        $this->databaseSeed();
        parent::setUp();
    }

    /**
     * testCreateSchema
     *
     * @return void
     */
    public function testCreateSchema()
    {
        $session           = $this->getSessionForTest();
        $testingSchemaName = 'test_schema';

        $this->databaseQuery("DROP DATABASE IF EXISTS ".$testingSchemaName);

        $session->createSchema($testingSchemaName);

        $fetchedRows = $this->databaseFetch(
            "SHOW DATABASES LIKE '".$testingSchemaName."'"
        );

        $schemaName = '';
        foreach ($fetchedRows as $row) {
             $schemaName = reset($row);
        }

        $this->assertEquals($testingSchemaName, $schemaName);
    }

    /**
     * testCreateSchemaIfTheSchemaAlreadyExists
     * test creating alrayd existing schema
     * @return void
     *
     * @expectedException \Kambo\Database\Protocolx\Exception\MysqlxException
     */
    public function testCreateSchemaIfTheSchemaAlreadyExists()
    {
        $session           = $this->getSessionForTest();
        $testingSchemaName = 'test_schema';

        $session->createSchema($testingSchemaName);
    }

    /**
     * testGetSchemas
     *
     * @return void
     */
    public function testGetSchemas()
    {
        $session = $this->getSessionForTest();
        $schemas = $session->getSchemas();

        $this->assertInternalType('array', $schemas);
        $this->assertGreaterThan(0, count($schemas));
        $this->assertInstanceOf(Schema::class, $schemas[0]);
    }

    /**
     * testGetSchemas
     *
     * @return void
     */
    public function testDropSchema()
    {
        $session = $this->getSessionForTest();

        $testingSchemaName = 'schema_for_drop';
        $this->databaseQuery(
            "CREATE DATABASE IF NOT EXISTS ".$testingSchemaName
        );

        $schemas = $session->dropSchema($testingSchemaName);

        $fetchedRows = $this->databaseFetch(
            "SHOW DATABASES LIKE '".$testingSchemaName."'"
        );

        // Database should not exists
        $this->assertEquals(0, count($fetchedRows));
    }

    /**
     * testGetSchema
     *
     * @return void
     */
    public function testGetSchema()
    {
        $session = $this->getSessionForTest();
        $schema  = $session->getSchema('test_database');

        $this->assertInstanceOf(Schema::class, $schema);
    }

    /**
     * testExecuteQuery
     *
     * @return void
     */
    public function testExecuteQuery()
    {
        $expectedData = [
            [
                "{\"_id\": 1001, \"foo\": \"bar\"}",
                "1001"
            ],
            [
                "{\"_id\": 1002, \"foo\": \"bar\"}",
                "1002"
            ],
            [
                "{\"_id\": 1003, \"baz\": \"qux\"}",
                "1003"
            ],
            [
                "{\"_id\": 1004, \"baz\": \"qux\"}",
                "1004"
            ],
            [
                "{\"_id\": 1005, \"baz\": \"qux\", \"foo\": \"bar\"}",
                "1005"
            ],
            [
                "{\"_id\": 1006, \"baz\": \"qux\", \"foo\": \"bar\"}",
                "1006"
            ],
            [
                "{\"_id\": 1007, \"answer\": 42}",
                "1007"
            ],
            [
                "{\"_id\": 1008, \"answer\": 84}",
                "1008"
            ],
            [
                "{\"_id\": 1009, \"foo\": \"bar\", \"answer\": 42}",
                "1009"
            ],
            [
                "{\"_id\": 1010, \"foo\": \"bar\", \"answer\": 84}",
                "1010"
            ],
            [
                "{\"_id\": 1011, \"foo\": {\"bar\": {\"baz\": {\"qux\""
                . ": {\"answer\": 42}}}}}",
                "1011"
            ],
            [
                "{\"_id\": 1012, \"foo\": \"barbar\", \"answer\": 84}",
                "1012"
            ]
        ];
        $databaseConfig = $this->getDatabaseConfig();

        $session = $this->getSessionForTest();
        $data    = $session->sql(
            'SELECT * FROM '.$databaseConfig['database'].'.test_collection'
        );

        $this->assertEquals($expectedData, $data->fetchAll());
    }

    /**
     * testExecuteQueryColumns
     *
     * @return void
     */
    public function testExecuteQueryColumns()
    {
        $expectedColumnsMetadata = [
            [
                'type' => 'BYTES',
                'name' => 'doc',
                'originalName' => 'doc',
                'table' => 'test_collection',
                'originalTable' => 'test_collection',
                'schema' => 'test_database'
            ],
            [
                'type' => 'BYTES',
                'name' => '_id',
                'originalName' => '_id',
                'table' => 'test_collection',
                'originalTable' => 'test_collection',
                'schema' => 'test_database'
            ]
        ];

        $columnsNames = ['doc','_id'];

        $databaseConfig = $this->getDatabaseConfig();

        $session = $this->getSessionForTest();
        $data    = $session->sql(
            'SELECT * FROM '.$databaseConfig['database'].'.test_collection'
        );

        $this->assertEquals($expectedColumnsMetadata, $data->getColumns());
        $this->assertEquals($columnsNames, $data->getColumnNames());
    }

    /**
     * testInsertQuery
     *
     * @return void
     */
    public function testInsertQuery()
    {
        $databaseConfig = $this->getDatabaseConfig();

        $session = $this->getSessionForTest();
        $result  = $session->sql(
            "INSERT INTO `"
            .$databaseConfig['database']
            ."`.`update_table` (foo) VALUES ('bar')"
        );

        $this->assertEquals(1, $result->getLastInsertId());
        $this->assertEquals(1, $result->getAffectedRowsCount());
    }

    /**
     * testWrongQuery
     *
     * @return void
     *
     * @expectedException \Kambo\Database\Protocolx\Exception\MysqlxException
     */
    public function testWrongQuery()
    {
        $session = $this->getSessionForTest();
        $session->sql('SELECT * FROM test_collection');
    }

    /**
     * testInvalidQuery
     *
     * @return void
     *
     * @expectedException \Kambo\Database\Protocolx\Exception\MysqlxException
     */
    public function testInvalidQuery()
    {
        $session = $this->getSessionForTest();
        $session->sql('xxxx');
    }

    /**
     * getSessionForTest
     *
     * @return void
     */
    private function getSessionForTest()
    {
        $connectionConfig  = $this->getDatabaseConfig();
        $sessionParameters = [
            'host' => $connectionConfig['host'],
            'port' => 33060,
            'dbUser' => $connectionConfig['user'],
            'dbPassword' => $connectionConfig['password']
        ];

        $mysqlx = new Mysqlx(new Protocolx());
        return $mysqlx->getNodeSession($sessionParameters);
    }
}
