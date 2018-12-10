<?php

namespace App\Providers;

use App\Contracts\Repositories\VoucherRepositoryInterface;
use App\Repositories\VoucherRepository;

use Illuminate\Support\ServiceProvider;

use Aws\CognitoIdentityProvider\CognitoIdentityProviderClient;
use Aws\DynamoDb\DynamoDbClient;
use Aws\DynamoDb\Marshaler;
use Aws\Sdk;

class DataAccessServiceProvider extends ServiceProvider 
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerAws();
        $this->registerRepositories();
    }

    /** register aws sdk */
    protected function registerAws(){

        $this->app->singleton(Sdk::class, function (){
            $config = $this->app['config']->get('services.aws');
            return new Sdk($config);
        });

        $this->app->singleton(CognitoIdentityProviderClient::class, function($app){
            return $app[Sdk::class]->createCognitoIdentityProvider();
        });

        $this->app->singleton(DynamoDbClient::class, function($app){
            return $app[Sdk::class]->createDynamoDb();
        });


        $this->app->singleton(S3Client::class, function($app){
            return $app[Sdk::class]->createS3();
        });

    }

    protected function registerRepositories()
    {
        $this->app->singleton(VoucherRepositoryInterface::class, function(){
            return new VoucherRepository($this->app[DynamoDbClient::class], $this->app[Marshaler::class], $this->app['config']->get('aws'));
        });
    }
}