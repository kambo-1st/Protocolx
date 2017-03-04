<?php
namespace Kambo\Tests\Database\Protocolx\Unit\Operations;

use Kambo\Database\Protocolx\Client\Operations\Result\Transformer;

use Kambo\Database\Protocolx\Client\Result\DataResult;
use Kambo\Database\Protocolx\Client\Mysqlx\Error;
use Kambo\Database\Protocolx\Client\Mysqlx\Resultset\ColumnMetaData;
use Kambo\Database\Protocolx\Client\Mysqlx\Resultset\Row;
//use Kambo\Database\Protocolx\Client\Mysqlx\Notice\SessionStateChanged;
use Kambo\Database\Protocolx\Client\Mysqlx\Notice\Frame;

/**
 * Unit test for the Transformer class.
 *
 * @package Kambo\Tests\Database\Protocolx\Unit\Operations
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class TransformerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests ConstructResultData method
     *
     * @return void
     */
    public function testConstructResultDataNoData()
    {
        $transformer = new Transformer();
        $resultData  = $transformer->constructResultData([]);

        $this->assertNull($resultData);
    }

    /**
     * Tests ConstructResultData method
     *
     * @return void
     */
    public function testConstructResultData()
    {
        $columnData = new ColumnMetaData();
        $columnData->setName('id');

        $parsedMessages = [
            [
                'type' => 12,
                'data' => $columnData,
            ],
            [
                'type' => 17,
                'data' => '',
            ],
        ];

        $transformer = new Transformer();
        $resultData  = $transformer->constructResultData($parsedMessages);
        $columnsMetadata = [
            [
                'type' => '',
                'name'=>'id',
                'originalName'=> '',
                'table'=>'',
                'originalTable'=> '',
                'schema' => ''
            ]
        ];

        $this->assertInstanceOf(DataResult::class, $resultData);
        $this->assertEquals($columnsMetadata, $resultData->getColumns());
    }

    /**
     * Tests ConstructResultData method with error, an exception must be thrown
     *
     * @return void
     *
     * @expectedException \Kambo\Database\Protocolx\Exception\MysqlxException
     */
    public function testConstructResultDataError()
    {
        $parsedMessages = [
            [
                'type' => 1,
                'data' => new Error(),
            ]
        ];

        $transformer = new Transformer();
        $resultData  = $transformer->constructResultData($parsedMessages);
    }

    /**
     * Tests ConstructResultData method with contructing row data
     *
     * @return void
     */
    public function testConstructResultDataRowData()
    {

        $mockedRow = $this->getMockBuilder(Row::class)
                          ->disableOriginalConstructor()
                          ->getMock();


        $mockedRow->expects($this->once())
                  ->method('getFieldList')
                  ->will(
                     $this->returnValue(
                         [
                             'row', 'row'
                         ]
                     )
                   );

        $parsedMessages = [
            [
                'type' => 13,
                'data' => $mockedRow,
            ],
            [
                'type' => 17,
                'data' => '',
            ],
        ];

        $transformer = new Transformer();
        $resultData  = $transformer->constructResultData($parsedMessages);
        $resultRows  = [
            [
                'row',
                'row'
            ]
        ];

        $this->assertInstanceOf(DataResult::class, $resultData);
        $this->assertEquals($resultRows, $resultData->getRows());
    }

    /**
     * Tests ConstructResultData method with contructing row data
     *
     * @return void
     */
    /*public function testConstructResultDataNotice()
    {
        $notice = new Frame();
        $notice->setPayload('foo');
        $notice->setType(3);

        $parsedMessages = [
            [
                'type' => 11,
                'data' => $notice,
            ],
            [
                'type' => 17,
                'data' => '',
            ],
        ];

        $transformer = new Transformer();
        $resultData  = $transformer->constructResultData($parsedMessages);
    }*/
}
