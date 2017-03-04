<?php
namespace Kambo\Database\Protocolx;

use Kambo\Database\Protocolx\Adapter\Protocolx;
use Kambo\Database\Protocolx\NodeSession;

/**
 * Mysqlx session factory.
 * Creates a session for connecting to the MySQL database. At this moment factory supports just a Node type of session
 * connection. This means that the only one physical connection to exactly one MySQL server can be created, there is
 * no support for the databases cluster.
 *
 * @package Kambo\Database\Protocolx
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class Mysqlx
{
    /**
     * Protocol adapter for handling connection to the server.
     *
     * @var Protocolx
     */
    private $connectionAdapter;

    /**
     * Creates new Mysqlx session factory with provided protocol adapter.
     *
     * @param Protocolx $connectionAdapter Protocol adapter for handling connection to the server.
     */
    public function __construct(Protocolx $connectionAdapter)
    {
        $this->connectionAdapter = $connectionAdapter;
    }

    /**
     * Creates a NodeSession instance representing a connection to one MySQL server.
     *
     * @param array $parameters A key=>value array with connection parameters such as username, password, port,
     *                          host and prefered authentication method.
     *
     *                          Connection parameters:
     *
     *                          dbUser     mandatory, database username
     *                          dbPassword mandatory, database password
     *                          host       optional,  host name/ IP adress of the MySQL server (defualt: localhost)
     *                          port       optional,  port of the MySQL server (defualt: 33060)
     *                          authMethod optional,  Name of an authentication mehod to use, only MYSQL41 is now
     *                                                supported (defualt MYSQL41)
     *
     *                          Example of configuration:
     *
     *                          [
     *                              'host' => 'localhost',
     *                              'port' => 33060,
     *                              'dbUser' => 'root',
     *                              'dbPassword' => 'password',
     *                              'authMethod' => 'MYSQL41',
     *                          ]
     *
     * @return Session Returns a Session object on success.
     */
    public function getNodeSession(array $parameters)
    {
        $parameters = $this->setDefualtParameters($parameters);

        $this->connectionAdapter->connect($parameters);

        return new NodeSession($this->connectionAdapter);
    }

    /**
     * Set defualt connection parameters
     *
     * @param Array $parameters Connection parameters
     *
     * @return Array Connection parameters with defualt values.
     */
    private function setDefualtParameters(array $parameters)
    {
        $parameters['port'] = (isset($parameters['port']))
            ? $parameters['port']
            : 33060;
        $parameters['host'] = (isset($parameters['host']))
            ? $parameters['host']
            : 'localhost';

        $parameters['authMethod'] = (isset($parameters['authMethod']))
            ? $parameters['authMethod']
            : 'MYSQL41';

        return $parameters;
    }
}
