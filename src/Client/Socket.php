<?php
namespace Kambo\Database\Protocolx\Client;

/**
 * Thin wrapper around the socket extension.
 *
 * @package Kambo\Database\Protocolx\Client
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class Socket
{
    /**
     * Socket resource (endpoint for communication)
     *
     * @var resource
     */
    private $socket;

    /**
     * Simple wrapper around php socket.
     */
    public function __construct()
    {
        $this->socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

        socket_set_option(
            $this->socket,
            SOL_SOCKET,
            SO_RCVTIMEO,
            [
                "sec"=>0,
                "usec"=>50000
            ]
        );
    }

    /**
     * Initiates a connection on a socket.
     * This is just a thin wrapper around socket_connect function.
     *
     * @link http://php.net/manual/en/function.socket-connect.php
     *
     * @param string $address The address parameter is either an IPv4 address in dotted-quad notation (e.g. 127.0.0.1)
     *                        if socket is AF_INET a valid IPv6 address (e.g. ::1) if IPv6 support is enabled
     *                        and socket is AF_INET6 or the pathname of a Unix domain socket, if the socket family
     *                        is AF_UNIX.
     * @param int     $port   The port on the remote host to which a connection should be made.
     *
     * @return bool TRUE on success or FALSE on failure.
     */
    public function connect($address, $port)
    {
        return socket_connect($this->socket, $address, $port);
    }

    /**
     * Writes the given buffer to the socket.
     * This is just a thin wrapper around socket_write function.
     *
     * @link http://php.net/manual/en/function.socket-write.php
     *
     * @param string $data The data to be written.
     *
     * @return mixed Returns the number of bytes successfully written to the socket or FALSE on failure.
     */
    public function write($data)
    {
        return socket_write($this->socket, $data, strlen($data));
    }

    /**
     * Reads data from the socket.
     * This is just a thin wrapper around socket_read function.
     *
     * @link http://php.net/manual/en/function.socket-read.php
     *
     * @return bool socket_read() returns the data as a string on success, or FALSE on error
     *                            (including if the remote host has closed the connection).
     */
    public function read()
    {
        $out = '';
        while ($data = socket_read($this->socket, 2048)) {
            $out .= $data;
        }

        return $out;
    }

    /**
     * Closes a socket resource.
     * This is just a thin wrapper around socket_close function.
     *
     * @link http://php.net/manual/en/function.socket-close.php
     *
     * @return void No value is returned.
     */
    public function close()
    {
        socket_close($this->socket);
    }
}
