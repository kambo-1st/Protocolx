<?php
namespace Kambo\Database\Protocolx\Client\Operations\Result;

use Kambo\Database\Protocolx\Client\Mysqlx\Notice\SessionStateChanged;
use Kambo\Database\Protocolx\Client\Mysqlx\ServerMessages\Type;

use Kambo\Database\Protocolx\Client\Result\DataResult;
use Kambo\Database\Protocolx\Client\Result\Metadata;

use Kambo\Database\Protocolx\Exception\MysqlxException;

/**
 * Transforms recevied messages to result data.
 *
 * @package Kambo\Database\Protocolx\Client\Operations\Result
 * @author  Bohuslav Simek <bohuslav@simek.si>
 * @license MIT
 */
class Transformer
{
    private $noticeClassMap = [
        3 => SessionStateChanged::class
    ];

    public function constructResultData($parsedMessages, $jsonDecode = false)
    {
        $columns = [];
        $rows    = [];
        $notices = [];

        $receivedData = false;

        foreach ($parsedMessages as $parsedMessage) {
            switch ($parsedMessage['type']) {
                case Type::RESULTSET_COLUMN_META_DATA_VALUE:
                    $messageData = $parsedMessage['data'];
                    $columns[]   = [
                        'type' => (string)$messageData->getType(),
                        'name' => (string)$messageData->getName(),
                        'originalName' => (string)$messageData->getOriginalName(),
                        'table' => (string)$messageData->getTable(),
                        'originalTable' => (string)$messageData->getOriginalTable(),
                        'schema' => (string)$messageData->getSchema(),
                    ];

                    break;
                case Type::RESULTSET_ROW_VALUE:
                    $rows[] = $this->transformRowValues(
                        $parsedMessage['data'],
                        $jsonDecode
                    );

                    break;
                case Type::NOTICE_VALUE:
                    $notices = array_merge(
                        $this->decode($parsedMessage['data']),
                        $notices
                    );

                    break;

                case Type::ERROR_VALUE:
                    throw new MysqlxException(
                        $parsedMessage['data']->getMsg(),
                        $parsedMessage['data']->getCode()
                    );

                case Type::SQL_STMT_EXECUTE_OK_VALUE:
                    $receivedData = true;

                    break;
            }
        }

        $result = null;

        if ($receivedData) {
            $result = new DataResult(
                $columns,
                $rows,
                new Metadata($notices)
            );
        }

        return $result;
    }

    private function transformRowValues($messageData, $jsonDecode)
    {
        $rowData = [];
        foreach ($messageData->getFieldList() as $field) {
            $trimmedData = trim((string)$field, "\0");
            if ($jsonDecode) {
                $trimmedData = json_decode($trimmedData, true);
            }

            $rowData[] = $trimmedData;
        }

        return $rowData;
    }

    private function decode($notice)
    {
        $noticeClass = $this->noticeClassMap[$notice->getType()];

        $sessionStateChanged = new $noticeClass($notice->getPayload());
        $noticeValue         = $sessionStateChanged->getValue();

        $value = null;
        if ($noticeValue->hasVUnsignedInt()) {
            $value = $noticeValue->getVUnsignedInt();
        } elseif ($noticeValue->hasVString()) {
            $value = (string)$noticeValue->getVString()->getValue();
        }

        return [
            (string)$sessionStateChanged->getParam() => $value
        ];
    }
}
