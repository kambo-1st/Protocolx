<?php
namespace Kambo\Tests\Database\Protocolx\Integration;

use Kambo\Tests\Database\Protocolx\Persistence\DatabaseTestCase;

use Kambo\Database\Protocolx\Adapter\Protocolx;
use Kambo\Database\Protocolx\Mysqlx;
use Kambo\Database\Protocolx\Collection;
use Kambo\Database\Protocolx\Table;

/**
 * Integration test for the Session object.
 *
 * @package Kambo\Tests\Database\Protocolx\Integration
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class SchemaTest extends DatabaseTestCase
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
     * testGetSession
     *
     * @return void
     */
    public function testGetName()
    {
        $schema = $this->getSchemaForTest('test_database');
        $this->assertEquals('test_database', $schema->getName());
    }

    /**
     * testExistsInDatabase
     *
     * @return void
     */
    public function testExistsInDatabase()
    {
        $schema = $this->getSchemaForTest('test_database');
        $this->assertTrue($schema->existsInDatabase());
    }

    /**
     * testExistsInDatabase
     *
     * @return void
     */
    public function testExistsInDatabaseNotExists()
    {
        $schema = $this->getSchemaForTest('non_existing_schema');
        $this->assertFalse($schema->existsInDatabase());
    }

    /**
     * testGetCollections
     *
     * @return void
     */
    public function testGetCollections()
    {
        $schema      = $this->getSchemaForTest('test_database');
        $collections = $schema->getCollections();

        $this->assertInternalType('array', $collections);
        $this->assertEquals(2, count($collections));
        $this->assertInstanceOf(Collection::class, $collections[0]);
        $this->assertInstanceOf(Collection::class, $collections[1]);
    }

    /**
     * testGetCollections
     *
     * @return void
     */
    public function testGetCollection()
    {
        $schema     = $this->getSchemaForTest('test_database');
        $collection = $schema->getCollection('test_collection');

        $this->assertInstanceOf(Collection::class, $collection);
    }

    /**
     * testCreateCollection
     *
     * @return void
     */
    public function testCreateCollection()
    {
        $schema     = $this->getSchemaForTest('test_database');
        $collection = $schema->createCollection('php_collection');

        $this->assertInstanceOf(Collection::class, $collection);

        $connectionConfig = $this->getDatabaseConfig();
        $fetchedRows      = $this->databaseFetch("SHOW TABLES IN ".$connectionConfig['database']);

        $tables = [];
        foreach ($fetchedRows as $row) {
            $tables[] = reset($row);
        }

        $this->assertTrue(in_array('php_collection', $tables));
    }

    /**
     * testCreateCollection
     *
     * @return void
     */
    public function testDropCollection()
    {
        $schema     = $this->getSchemaForTest('test_database');
        $collection = $schema->dropCollection('delete_collection');

        $connectionConfig = $this->getDatabaseConfig();
        $fetchedRows      = $this->databaseFetch("SHOW TABLES IN ".$connectionConfig['database']);

        $tables = [];
        foreach ($fetchedRows as $row) {
            $tables[] = reset($row);
        }

        $existingTables = [
            'delete_table',
            'test_collection',
            'test_table',
            'update_table'
        ];
        $this->assertEquals($existingTables, $tables);
    }

    /**
     * testGetTables
     *
     * @return void
     */
    public function testGetTables()
    {
        $schema = $this->getSchemaForTest('test_database');
        $tables = $schema->getTables();

        $this->assertInternalType('array', $tables);
        $this->assertEquals(3, count($tables));
        $this->assertInstanceOf(Table::class, $tables[0]);
        $this->assertInstanceOf(Table::class, $tables[1]);
        $this->assertInstanceOf(Table::class, $tables[2]);
    }

    /**
     * testGetTable
     *
     * @return void
     */
    /*public function testGetTable()
    {
        $this->markTestIncomplete(
          'Tables has not been implemented yet.'
        );
        $schema = $this->getSchemaForTest('test_database');
        $table  = $schema->getTable('test_table');

        $this->assertInstanceOf(Collection::class, $table);
    }*/

    /**
     * testCreateCollection
     *
     * @return void
     */
    /*public function testDropTable()
    {
        $this->markTestIncomplete(
          'Tables has not been implemented yet.'
        );
        $schema     = $this->getSchemaForTest('test_database');
        $collection = $schema->dropTable('delete_table');

        $connectionConfig = $this->getDatabaseConfig();
        $fetchedRows      = $this->databaseFetch("SHOW TABLES IN ".$connectionConfig['database']);

        $tables = [];
        foreach ($fetchedRows as $row) {
            $tables[] = reset($row);
        }

        $this->assertEquals(['test_collection', 'test_table'], $tables);
    }*/

    /**
     * getSchemaForTest
     *
     * @return void
     */
    private function getSchemaForTest($schemaName)
    {
        $connectionConfig  = $this->getDatabaseConfig();
        $sessionParameters = [
            'host' => $connectionConfig['host'],
            'port' => 33060,
            'dbUser' => $connectionConfig['user'],
            'dbPassword' => $connectionConfig['password']
        ];

        $mysqlx = new Mysqlx(new Protocolx());

        return $mysqlx->getNodeSession($sessionParameters)
                      ->getSchema($schemaName);
    }
}
