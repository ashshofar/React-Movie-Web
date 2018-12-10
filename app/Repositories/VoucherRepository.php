<?php

namespace App\Repositories;

use App\Entities\Voucher;
use App\Entities\EntityCollection;


use Aws\DynamoDb\DynamoDbClient;
use Aws\DynamoDb\Marshaler;

use App\Contracts\Repositories\VoucherRepositoryInterface;

class VoucherRepository implements VoucherRepositoryInterface
{
    protected $type = 'voucher';

    public function __construct(DynamoDbClient $dbClient, Marshaler $marshaler, $awsConfig) {
        $this->config = $awsConfig;
        // $this->dbClient = $dbClient;
        $this->dbClient = DynamoDbClient::factory(array(
            'region' => 'ap-southeast-1',
            'version'  => 'latest',
            'endpoint' => 'http://localhost:8000',
            'credentials' => [
                'key' => 'fakeMyKeyId',
                'secret' => 'fakeSecretAccessKey'
            ]
        ));
        $this->marshaler = $marshaler;
        $this->table = 'vouchers3';
    }

    public function list() {

        //query parameters
        $query = [
            'TableName' => $this->table,
            'Key' => $this->marshaler->marshalItem(array_filter([
                'id' => 'e99e580c-bc3c-486b-a6c9-13342c6c4877',
                'price' => 123
            ]))
        ];

        //fetch list of items from db
        $result = $this->dbClient->getItem($query);

        return $this->createEntity($result['Item']);

        // return $result;

        //create json page token if last key exist. otherwise just set it null
        $pageToken = $result['LastEvaluatedKey'] ? $this->marshaler->unmarshalJson( $result['LastEvaluatedKey']) : null;

        //parse & create the list from raw result, then return it
        return EntityCollection::make($result['Items'])
            ->transform([$this, 'createEntity'])
            ->setPageToken($pageToken);
    }

    public function save(Voucher $voucher) {
        // dd($this->table);
        $this->dbClient->putItem([
            'TableName' => $this->table,
            'Item' => $this->marshaler->marshalItem(array_filter([
                // 'type' => $this->type,
                'id' => $voucher->id,
                'title' => $voucher->title,
                'price' => 123
            ],
                function ($item) { return isset($item); } //remove any null element from the array
            ))
        ]);

        return true;
    }

    public function createEntity($rawData) {

        //parse raw topic data
        $item = $this->marshaler->unmarshalItem($rawData);

        return new Voucher([
            'id' => $item['id'],
            'title' => $item['title'],
            'store' => $item['store'] ?? null,
            'offer' => $item['offer'] ?? null,
            'coin' => $item['coin'] ?? 0
        ]);
    }
}