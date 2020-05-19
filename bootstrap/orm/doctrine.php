<?php

/**
 * ORM boot loader
 * 
 * PHP version 7
 * 
 * @category Framework
 * @package  HTTP
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository gpl-3.0
 * @link     pbgroupeu.wordpress.com
 */
use Doctrine\Common\Cache\ArrayCache;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Types\Type;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;
use Ramsey\Uuid\Doctrine\UuidType;

$container->add(
    EntityManagerInterface::class,
    function () use ($container) {
        $isDevMode = $_ENV['APPLICATION_MODE'] === 'development';
        $proxyDir = $container->get('app.cache') . '/' . $_ENV['DT_PROXY'];
        $cache = null;
        $useSimpleAnnotationReader = false;
        $solid = [
            $container->get('app.root') . '/' . $_ENV['PB_SOLID'],
            $container->get('app.root') . '/' . $_ENV['PB_OAUTH'],
        ];

        if (!$isDevMode) {
            $cache = new ArrayCache;
        }
        $config = Setup::createAnnotationMetadataConfiguration($solid, $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);

        $connectionParams = array(
            'dbname' => $_ENV['DB_DATABASE'],
            'user' => $_ENV['DB_USER'],
            'password' => $_ENV['DB_PASSWORD'],
            'host' => 'localhost',
            'driver' => 'pdo_mysql',
        );

        Type::addType('uuid', UuidType::class);

        $conn = DriverManager::getConnection($connectionParams);

        /**
         * Entity manager
         * 
         * @var EntityManagerInterface $entityManager
         */
        $entityManager = EntityManager::create($conn, $config);

        return $entityManager;
    }
)->addTag('doctrine.em');