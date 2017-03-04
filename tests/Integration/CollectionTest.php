<?php
namespace Kambo\Tests\Database\Protocolx\Integration;

use Kambo\Tests\Database\Protocolx\Persistence\DatabaseTestCase;

use Kambo\Database\Protocolx\Adapter\Protocolx;
use Kambo\Database\Protocolx\Mysqlx;

/**
 * Integration test for the Collection object.
 *
 * @package Kambo\Tests\Database\Protocolx\Integration
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class CollectionTest extends DatabaseTestCase
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
        $collection = $this->getCollectionForTest('test_collection');
        $this->assertEquals('test_collection', $collection->getName());
    }

    /**
     * testExistsInDatabase
     *
     * @return void
     */
    public function testExistsInDatabase()
    {
        $collection = $this->getCollectionForTest('test_collection');
        $this->assertTrue($collection->existsInDatabase());
    }

    /**
     * testFind
     *
     * @return void
     */
    public function testFind()
    {
        $collection = $this->getCollectionForTest('test_collection');
        $find       = $collection->find(null);

        $data     = $find->execute()->fetchAll();
        $expected = [
            [
                "_id" => 1001,
                "foo" => "bar"
            ],
            [
                "_id" => 1002,
                "foo" => "bar"
            ],
            [
                "_id" => 1003,
                "baz" => "qux"
            ],
            [
                "_id" => 1004,
                "baz" => "qux"
            ],
            [
                "_id" => 1005,
                "baz" => "qux",
                "foo" => "bar"
            ],
            [
                "_id" => 1006,
                "baz" => "qux",
                "foo" => "bar"
            ],
            [
                "_id" => 1007,
                "answer" => 42
            ],
            [
                "_id" => 1008,
                "answer" => 84
            ],
            [
                "_id" => 1009,
                "foo" => "bar",
                "answer" => 42
            ],
            [
                "_id" => 1010,
                "foo" => "bar",
                "answer" => 84
            ],
            [
                '_id' => 1011,
                'foo' => [
                    'bar' => [
                        'baz' =>
                        [
                            'qux' => [
                                'answer' => 42,
                            ],
                        ],
                    ],
                ],
            ],
            [
                '_id' => 1012,
                'foo' => 'barbar',
                'answer' => 84,
            ]
        ];

        $this->assertEquals($expected, $data);
    }

    /**
     * testFindWithId
     *
     * @return void
     */
    public function testFindWithId()
    {
        $collection = $this->getCollectionForTest('test_collection');
        $find       = $collection->find(['_id' => '1003']);
        $data       = $find->execute()->fetchAll();

        $expected = [
            [
                "_id" => 1003,
                "baz" => "qux"
            ]
        ];

        $this->assertEquals($expected, $data);
    }

    /**
     * testFindWithId
     *
     * @return void
     */
    public function testFindWithIds()
    {
        $collection = $this->getCollectionForTest('test_collection');
        $find       = $collection->find(['_id' => ['$in'=> ['1003', '1004']]]);
        $data       = $find->execute()->fetchAll();

        $expected = [
            [
                "_id" => 1003,
                "baz" => "qux"
            ],
            [
                "_id" => 1004,
                "baz" => "qux"
            ]
        ];

        $this->assertEquals($expected, $data);
    }

    /**
     * testFindWithSpecificField
     *
     * @return void
     */
    public function testFindWithSpecificField()
    {
        $expected = [
            [
                "_id" => 1003,
                "baz" => "qux"
            ],
            [
                "_id" => 1004,
                "baz" => "qux"
            ],
            [
                "_id" => 1005,
                "baz" => "qux",
                "foo" => "bar"
            ],
            [
                "_id" => 1006,
                "baz" => "qux",
                "foo" => "bar"
            ]
        ];

        $collection = $this->getCollectionForTest('test_collection');
        $find       = $collection->find(['baz' => 'qux']);
        $data       = $find->execute()->fetchAll();

        $this->assertEquals($expected, $data);
    }

    /**
     * testFindAccordingNumber
     *
     * @return void
     */
    public function testFindAccordingNumber()
    {
        $expected = [
            [
                "_id" => 1008,
                "answer" => 84
            ],
            [
                "_id" => 1010,
                "foo" => "bar",
                "answer" => 84
            ],
            [
                '_id' => 1012,
                'foo' => 'barbar',
                'answer' => 84,
            ],
        ];

        $collection = $this->getCollectionForTest('test_collection');
        $find       = $collection->find(['answer' => ['$gt'=>44]]); //answer > 44
        $data       = $find->execute()->fetchAll();

        $this->assertEquals($expected, $data);
    }

    /**
     * testFindAccordingTwoPaths
     *
     * @return void
     */
    public function testFindAccordingTwoPaths()
    {
        $expected = [
            [
                "_id" => 1005,
                "baz" => "qux",
                "foo" => "bar"
            ],
            [
                "_id" => 1006,
                "baz" => "qux",
                "foo" => "bar"
            ]
        ];

        $collection = $this->getCollectionForTest('test_collection');
        $find       = $collection->find(['baz' => 'qux', 'foo' => 'bar']); //answer > 44
        $data       = $find->execute()->fetchAll();

        $this->assertEquals($expected, $data);
    }

    /**
     * testFindAccordingTwoPaths
     *
     * @return void
     */
    public function testFindAccordingThreePaths()
    {
        $expected = [
            [
                "_id" => 1005,
                "baz" => "qux",
                "foo" => "bar"
            ]
        ];

        $collection = $this->getCollectionForTest('test_collection');
        $find       = $collection->find(
            [
                '_id'=> 1005,
                'baz' => 'qux',
                'foo' => 'bar'
            ]
        );

        $data = $find->execute()->fetchAll();

        $this->assertEquals($expected, $data);
    }

    /**
     * testFindAccordingTwoPaths
     *
     * @return void
     */
    public function testFindOrOperator()
    {
        $expected = [
            [
                "_id" => 1001,
                "foo" => "bar"
            ],
            [
                "_id" => 1002,
                "foo" => "bar"
            ],
            [
                "_id" => 1005,
                "baz" => "qux",
                "foo" => "bar"
            ],
            [
                "_id" => 1006,
                "baz" => "qux",
                "foo" => "bar"
            ],
            [
                "_id" => 1007,
                "answer" => 42
            ],
            [
                "_id" => 1009,
                "foo" => "bar",
                "answer" => 42
            ],
            [
                "_id" => 1010,
                "foo" => "bar",
                "answer" => 84
            ]
        ];

        $collection = $this->getCollectionForTest('test_collection');
        $find       = $collection->find(['$or' => ["foo" => "bar", "answer" => 42]]);
        $data       = $find->execute()->fetchAll();

        $this->assertEquals($expected, $data);
    }

    /**
     * testFindAccordingTwoPaths
     *
     * @return void
     */
    public function testFindNested()
    {
        $expected = [
            [
                "_id" => 1011,
                "foo" => [
                    "bar" => [
                        "baz" => [
                            "qux" => [
                                "answer" => 42
                            ]
                        ]
                    ]
                ]
            ]
        ];

        $collection = $this->getCollectionForTest('test_collection');
        $find       = $collection->find([["foo.bar.baz.qux.answer" => 42]]);
        $data       = $find->execute()->fetchAll();

        $this->assertEquals($expected, $data);
    }

    /**
     * testFindLimit
     *
     * @return void
     */
    public function testFindLimit()
    {
        $expected = [
            [
                "_id" => 1001,
                "foo" => "bar"
            ],
            [
                "_id" => 1002,
                "foo" => "bar"
            ],
            [
                "_id" => 1003,
                "baz" => "qux"
            ]
        ];

        $collection = $this->getCollectionForTest('test_collection');
        $find       = $collection->find(null);
        $find->limit(3);

        $data = $find->execute()->fetchAll();

        $this->assertEquals($expected, $data);
    }

    /**
     * testFindInNonExistingCollection
     *
     * @return void
     *
     * @expectedException \Kambo\Database\Protocolx\Exception\MysqlxException
     */
    public function testFindInNonExistingCollection()
    {
        $collection = $this->getCollectionForTest('not_existing_collection');
        $find       = $collection->find(null);
        $find->execute()->fetchAll();
    }

    /**
     * testFindProjection
     *
     * @return void
     */
    public function testFindProjection()
    {
        $expected = [
            [
                "_id" => "1001"
            ],
            [
                "_id" => "1002"
            ],
            [
                "_id" => "1003"
            ]
        ];

        $collection = $this->getCollectionForTest('test_collection');
        $find       = $collection->find(null);

        $find->fields(['_id']);
        $find->limit(3);

        $data = $find->execute()->fetchAll();

        $this->assertEquals($expected, $data);
    }

    /**
     * testAdd
     *
     * @return void
     */
    public function testCollectionAdd()
    {
        $collection = $this->getCollectionForTest('test_collection');
        $add        = $collection->add([['new'=> ['foo'=>'bar']]]);

        $operationResult = $add->execute();

        $this->assertEquals(1, $operationResult->getAffectedItemsCount());

        $collection = $this->getCollectionForTest('test_collection');
        $find       = $collection->find(null);
        $documents = $find->execute()->fetchAll();

        $insertedDocument = [];
        foreach ($documents as $document) {
            if (isset($document['new'])) {
                unset($document['_id']);
                $insertedDocument = $document;
            }
        }

        $this->assertEquals(['new'=> ['foo'=>'bar']], $insertedDocument);
    }

    /**
     * testAddMultiple
     *
     * @return void
     */
    public function testCollectionAddMultiple()
    {
        $expectedDocuments = [
            [
                "new" => [
                    "foo" => "bar"
                ]
            ],
            [
                "other" => [
                    "foo" => "bar"
                ]
            ]
        ];

        $collection = $this->getCollectionForTest('test_collection');
        $add        = $collection->add([['new'=> ['foo'=>'bar']], ['other'=> ['foo'=>'bar']],]);

        $operationResult = $add->execute();

        $this->assertEquals(2, $operationResult->getAffectedItemsCount());

        $collection = $this->getCollectionForTest('test_collection');
        $find       = $collection->find(null);
        $documents  = $find->execute()->fetchAll();

        $insertedDocuments = [];
        foreach ($documents as $document) {
            if (isset($document['new']) || isset($document['other'])) {
                unset($document['_id']);
                $insertedDocuments[] = $document;
            }
        }

        $this->assertEquals($expectedDocuments, $insertedDocuments);
    }

    /**
     * testCollectionModifyUpdateSetItem
     *
     * @return void
     */
    public function testCollectionModifyUpdateSetItem()
    {
        $expectedDocument = [
            [
                "_id" => 1010,
                "foo" => "bar2",
                "answer" => 84
            ]
        ];

        $collection = $this->getCollectionForTest('test_collection');

        $modifyCollection = $collection->modify(['_id'=>1010]);
        $modifyCollection->setItem('foo', 'bar2');
        $operationResult = $modifyCollection->execute();

        $this->assertEquals(1, $operationResult->getAffectedItemsCount());

        $find     = $collection->find(['_id' => 1010]);
        $document = $find->execute()->fetchAll();

        $this->assertEquals($expectedDocument, $document);
    }

    /**
     * testCollectionModifySetNewItem
     *
     * @return void
     */
    public function testCollectionModifySetNewItem()
    {
        $expectedDocument = [
            [
                "_id" => 1010,
                "foo" => "bar",
                "hello" => "how",
                "answer" => 84
            ]
        ];

        $collection = $this->getCollectionForTest('test_collection');

        $modifyCollection = $collection->modify(['_id'=>1010]);
        $modifyCollection->setItem('hello', 'how');
        $operationResult = $modifyCollection->execute();

        $this->assertEquals(1, $operationResult->getAffectedItemsCount());

        $find     = $collection->find(['_id' => 1010]);
        $document = $find->execute()->fetchAll();

        $this->assertEquals($expectedDocument, $document);
    }

    /**
     * testCollectionModifyUnsetItem
     *
     * @return void
     */
    public function testCollectionModifyUnsetItem()
    {
        $expectedDocument = [
            [
                "_id" => 1010,
                "answer" => 84
            ]
        ];

        $collection = $this->getCollectionForTest('test_collection');

        $modifyCollection = $collection->modify(['_id'=>1010]);
        $modifyCollection->unsetItem('foo');
        $operationResult = $modifyCollection->execute();

        $this->assertEquals(1, $operationResult->getAffectedItemsCount());

        $find     = $collection->find(['_id' => 1010]);
        $document = $find->execute()->fetchAll();

        $this->assertEquals($expectedDocument, $document);
    }

    /**
     * testCollectionModifySetNewItem
     *
     * @return void
     */
    public function testCollectionModifyArrayInsert()
    {
        $this->markTestIncomplete(
            'Array insert is not functional.'
        );

        $expectedDocument = array (
          array (
            'doc' => array (
              '_id' => 1010,
              'foo' => 'bar',
              'hello' => [
                'foo' => 'bar'
              ],
              'answer' => 84,
            ),
          ),
        );

        $collection = $this->getCollectionForTest('test_collection');

        $modifyCollection = $collection->modify(['_id'=>1010]);
        $modifyCollection->arrayInsert('hello', ['foo' => 'bar']);
        $data = $modifyCollection->execute();
    }

    /**
     * Tests remove selected document (with id 1010) from the collection.
     *
     * @return void
     */
    public function testCollectionRemove()
    {
        $collection = $this->getCollectionForTest('test_collection');

        $removeOperation = $collection->remove(['_id'=>1010]);
        $data            = $removeOperation->execute();

        $this->assertEquals(1, $data->getAffectedItemsCount());
        $find = $collection->find(['_id' => 1010]);
        $data = $find->execute()->fetchAll();

        $this->assertEquals([], $data);
    }

    /**
     * Tests remove of all documents from the collection.
     *
     * @return void
     */
    public function testCollectionRemoveAll()
    {
        $collection = $this->getCollectionForTest('test_collection');

        $modifyCollection = $collection->remove();
        $data = $modifyCollection->execute();

        $this->assertEquals(12, $data->getAffectedItemsCount());
        $find = $collection->find();
        $data = $find->execute()->fetchAll();

        $this->assertEquals([], $data);
    }

    /**
     * Tests remove documents on the collection with limit.
     *
     * @return void
     */
    public function testCollectionRemoveLimit()
    {
        $expectedDocuments = [
            [
                "_id" => 1009,
                "foo" => "bar",
                "answer" => 42
            ],
            [
                "_id" => 1010,
                "foo" => "bar",
                "answer" => 84
            ],
            [
                "_id" => 1011,
                "foo" => [
                    "bar" => [
                        "baz" => [
                            "qux" => [
                                "answer" => 42
                            ]
                        ]
                    ]
                ]
            ],
            [
                "_id" => 1012,
                "foo" => "barbar",
                "answer" => 84
            ]
        ];
        $collection = $this->getCollectionForTest('test_collection');

        $modifyCollection = $collection->remove();
        $modifyCollection->limit(8);
        $data = $modifyCollection->execute();

        $this->assertEquals(8, $data->getAffectedItemsCount());
        $find = $collection->find();
        $data = $find->execute()->fetchAll();

        $this->assertEquals($expectedDocuments, $data);
    }

    /**
     * Get collection for testing from the database
     *
     * @return void
     */
    private function getCollectionForTest($collectionName)
    {
        $connectionConfig  = $this->getDatabaseConfig();
        $sessionParameters = [
            'host' => $connectionConfig['host'],
            'port' => 33060,
            'dbUser' => $connectionConfig['user'],
            'dbPassword' => $connectionConfig['password']
        ];

        $mysqlx     = new Mysqlx(new Protocolx());
        $collection = $mysqlx->getNodeSession($sessionParameters)
                             ->getSchema($connectionConfig['database'])
                             ->getCollection($collectionName);

        return $collection;
    }
}
