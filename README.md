# kambo protocolx
[![Build Status](https://img.shields.io/travis/kambo-1st/Protocolx.svg?branch=master&style=flat-square)](https://travis-ci.org/kambo-1st/Protocolx)
[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/g/kambo-1st/Protocolx.svg?style=flat-square)](https://scrutinizer-ci.com/g/kambo-1st/Protocolx/?branch=master)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)

Native implementation of new MySQL communication protocol (protocol x). Library does not depended on any existing MySQL database extension or on any other additional C extension.

**This library is experimental and work in progress!**
**Library at this moment does not perform input escaping or using prepared statements (both is very much work in progress)!**

## Install

Prefered way to install library is with composer:
```sh
composer require kambo/protocolx
```

## Basic usage

### Create server session
```php
// Connection parameters
$connectionParameters = [
	'host' => 'databasehost',
    'port' => 33060,
    'dbUser' => 'username',
    'dbPassword' => 'password'
];
// Create instance of Mysqlx working throught new MySQL protocolx
$mysqlx = new Mysqlx(new Protocolx());
// Creates a NodeSession instance representing a connection to one MySQL server.
$serverSession = $mysqlx->getNodeSession($sessionParameters);
```

### Working with server session

```php
// Get a specified database schema (database).
$testDatabaseSchema = $serverSession->getSchema('test_database');
```

### Working with schema

```php
// Gets all collections in the schema (database).
$testDatabaseSchema->getCollections();

// Gets particular collection from the schema (database).
$testingCollection = $testDatabaseSchema->getCollection('testing_collection');

// Create new collection named "new_collection"
$newCollection = $testDatabaseSchema->createCollection('new_collection');

// Drop existing collection from schema
$testDatabaseSchema->dropCollection('new_collection');
```

### Working with collection

#### Add operation

```php
// Modified existing document with id 1010
$modifyDocument = $testingCollection->modify(['_id'=>1010]);
$modifyDocument->setItem('foo', 'bar');
$operationResult = $modifyDocument->execute(); // Execute operation
```

#### Modify operation

```php
// Add new document to the collection
$addOperation = $testingCollection->add([['new'=> ['foo'=>'bar']]]);
$addOperation->execute(); // Execute operation
```

#### Remove operation
```php
// Remove document with id 1010 from collection
$removeOperation = $collection->remove(['_id'=>1010]);
$removeOperation->execute(); // Execute operation
```

#### Find operation
```php
// Returns all documents in  collection
$findOperation = $testingCollection->find(null);
$collectionDocuments = $findOperation->execute()->fetchAll(); // Execute operation

// Returns only document with specific id
$findOperation = $testingCollection->find(['_id' => '1003']);
$collectionDocuments = $findOperation->execute()->fetchAll(); // Execute operation

// Library at this moment support just Mongo query language, thus:
// ['answer' => ['$gt'=>44]] will return all documents which have
// in answer field value bigger then 44.
$findOperation = $testingCollection->find(['answer' => ['$gt'=>44]]);
$collectionDocuments = $findOperation->execute()->fetchAll(); // Execute operation
```

## License
The MIT License (MIT), https://opensource.org/licenses/MIT
