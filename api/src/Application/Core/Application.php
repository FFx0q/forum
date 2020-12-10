<?php
    namespace Society\Application\Core;

    use DI\ContainerBuilder;
    use Psr\Container\ContainerInterface;
    use Slim\App;
    use Slim\Factory\AppFactory;
    use Slim\Factory\ServerRequestCreatorFactory;
    use Symfony\Component\Dotenv\Dotenv;
    use Society\Application\Handlers\HttpErrorHandler;
    use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;

    class Application
    {
        private string $configPath = __DIR__.'/../../../config';
        private ContainerInterface $container;
        private App $app;

        public function __construct()
        {
            $dotenv = new Dotenv();
            $dotenv->load($this->configPath. '/.env');

            $containerBuilder = new ContainerBuilder();

            $settings = require_once($this->configPath. '/settings.php');
            $settings($containerBuilder);
        
            $dependencies = require_once($this->configPath. '/dependencies.php');
            $dependencies($containerBuilder);
        
            $repositories = require_once($this->configPath. '/repositories.php');
            $repositories($containerBuilder);

            $this->container = $containerBuilder->build();

            $this->setupSlim();
        }

        private function setupSlim()
        {
            AppFactory::setContainer($this->container);
            $this->app = AppFactory::create();
            $callableResolver = $this->app->getCallableResolver();

            $routes = require_once ($this->configPath. '/routes.php');
            $routes($this->app);

            $responseFactory = $this->app->getResponseFactory();
            $errorHandler = new HttpErrorHandler($callableResolver, $responseFactory);
            $displayErrorDetails = $this->container->get('settings')['displayErrorDetails'];
            
            $this->app->addRoutingMiddleware();
        
            $errorMiddleware = $this->app->addErrorMiddleware($displayErrorDetails, false, false);
            $errorMiddleware->setDefaultErrorHandler($errorHandler);
        }

        public function handle()
        {
            $requestCreator = ServerRequestCreatorFactory::create();
            $request = $requestCreator->createServerRequestFromGlobals();

            $response = $this->app->handle($request);
            $emitter = new SapiEmitter();
            $emitter->emit($response);
        }
    }