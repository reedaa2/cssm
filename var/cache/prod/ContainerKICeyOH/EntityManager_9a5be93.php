<?php

namespace ContainerKICeyOH;

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{
    private $valueHolder612b1 = null;
    private $initializereb7da = null;
    private static $publicProperties91085 = [
        
    ];
    public function getConnection()
    {
        $this->initializereb7da && ($this->initializereb7da->__invoke($valueHolder612b1, $this, 'getConnection', array(), $this->initializereb7da) || 1) && $this->valueHolder612b1 = $valueHolder612b1;
        return $this->valueHolder612b1->getConnection();
    }
    public function getMetadataFactory()
    {
        $this->initializereb7da && ($this->initializereb7da->__invoke($valueHolder612b1, $this, 'getMetadataFactory', array(), $this->initializereb7da) || 1) && $this->valueHolder612b1 = $valueHolder612b1;
        return $this->valueHolder612b1->getMetadataFactory();
    }
    public function getExpressionBuilder()
    {
        $this->initializereb7da && ($this->initializereb7da->__invoke($valueHolder612b1, $this, 'getExpressionBuilder', array(), $this->initializereb7da) || 1) && $this->valueHolder612b1 = $valueHolder612b1;
        return $this->valueHolder612b1->getExpressionBuilder();
    }
    public function beginTransaction()
    {
        $this->initializereb7da && ($this->initializereb7da->__invoke($valueHolder612b1, $this, 'beginTransaction', array(), $this->initializereb7da) || 1) && $this->valueHolder612b1 = $valueHolder612b1;
        return $this->valueHolder612b1->beginTransaction();
    }
    public function getCache()
    {
        $this->initializereb7da && ($this->initializereb7da->__invoke($valueHolder612b1, $this, 'getCache', array(), $this->initializereb7da) || 1) && $this->valueHolder612b1 = $valueHolder612b1;
        return $this->valueHolder612b1->getCache();
    }
    public function transactional($func)
    {
        $this->initializereb7da && ($this->initializereb7da->__invoke($valueHolder612b1, $this, 'transactional', array('func' => $func), $this->initializereb7da) || 1) && $this->valueHolder612b1 = $valueHolder612b1;
        return $this->valueHolder612b1->transactional($func);
    }
    public function wrapInTransaction(callable $func)
    {
        $this->initializereb7da && ($this->initializereb7da->__invoke($valueHolder612b1, $this, 'wrapInTransaction', array('func' => $func), $this->initializereb7da) || 1) && $this->valueHolder612b1 = $valueHolder612b1;
        return $this->valueHolder612b1->wrapInTransaction($func);
    }
    public function commit()
    {
        $this->initializereb7da && ($this->initializereb7da->__invoke($valueHolder612b1, $this, 'commit', array(), $this->initializereb7da) || 1) && $this->valueHolder612b1 = $valueHolder612b1;
        return $this->valueHolder612b1->commit();
    }
    public function rollback()
    {
        $this->initializereb7da && ($this->initializereb7da->__invoke($valueHolder612b1, $this, 'rollback', array(), $this->initializereb7da) || 1) && $this->valueHolder612b1 = $valueHolder612b1;
        return $this->valueHolder612b1->rollback();
    }
    public function getClassMetadata($className)
    {
        $this->initializereb7da && ($this->initializereb7da->__invoke($valueHolder612b1, $this, 'getClassMetadata', array('className' => $className), $this->initializereb7da) || 1) && $this->valueHolder612b1 = $valueHolder612b1;
        return $this->valueHolder612b1->getClassMetadata($className);
    }
    public function createQuery($dql = '')
    {
        $this->initializereb7da && ($this->initializereb7da->__invoke($valueHolder612b1, $this, 'createQuery', array('dql' => $dql), $this->initializereb7da) || 1) && $this->valueHolder612b1 = $valueHolder612b1;
        return $this->valueHolder612b1->createQuery($dql);
    }
    public function createNamedQuery($name)
    {
        $this->initializereb7da && ($this->initializereb7da->__invoke($valueHolder612b1, $this, 'createNamedQuery', array('name' => $name), $this->initializereb7da) || 1) && $this->valueHolder612b1 = $valueHolder612b1;
        return $this->valueHolder612b1->createNamedQuery($name);
    }
    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializereb7da && ($this->initializereb7da->__invoke($valueHolder612b1, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializereb7da) || 1) && $this->valueHolder612b1 = $valueHolder612b1;
        return $this->valueHolder612b1->createNativeQuery($sql, $rsm);
    }
    public function createNamedNativeQuery($name)
    {
        $this->initializereb7da && ($this->initializereb7da->__invoke($valueHolder612b1, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializereb7da) || 1) && $this->valueHolder612b1 = $valueHolder612b1;
        return $this->valueHolder612b1->createNamedNativeQuery($name);
    }
    public function createQueryBuilder()
    {
        $this->initializereb7da && ($this->initializereb7da->__invoke($valueHolder612b1, $this, 'createQueryBuilder', array(), $this->initializereb7da) || 1) && $this->valueHolder612b1 = $valueHolder612b1;
        return $this->valueHolder612b1->createQueryBuilder();
    }
    public function flush($entity = null)
    {
        $this->initializereb7da && ($this->initializereb7da->__invoke($valueHolder612b1, $this, 'flush', array('entity' => $entity), $this->initializereb7da) || 1) && $this->valueHolder612b1 = $valueHolder612b1;
        return $this->valueHolder612b1->flush($entity);
    }
    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializereb7da && ($this->initializereb7da->__invoke($valueHolder612b1, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializereb7da) || 1) && $this->valueHolder612b1 = $valueHolder612b1;
        return $this->valueHolder612b1->find($className, $id, $lockMode, $lockVersion);
    }
    public function getReference($entityName, $id)
    {
        $this->initializereb7da && ($this->initializereb7da->__invoke($valueHolder612b1, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializereb7da) || 1) && $this->valueHolder612b1 = $valueHolder612b1;
        return $this->valueHolder612b1->getReference($entityName, $id);
    }
    public function getPartialReference($entityName, $identifier)
    {
        $this->initializereb7da && ($this->initializereb7da->__invoke($valueHolder612b1, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializereb7da) || 1) && $this->valueHolder612b1 = $valueHolder612b1;
        return $this->valueHolder612b1->getPartialReference($entityName, $identifier);
    }
    public function clear($entityName = null)
    {
        $this->initializereb7da && ($this->initializereb7da->__invoke($valueHolder612b1, $this, 'clear', array('entityName' => $entityName), $this->initializereb7da) || 1) && $this->valueHolder612b1 = $valueHolder612b1;
        return $this->valueHolder612b1->clear($entityName);
    }
    public function close()
    {
        $this->initializereb7da && ($this->initializereb7da->__invoke($valueHolder612b1, $this, 'close', array(), $this->initializereb7da) || 1) && $this->valueHolder612b1 = $valueHolder612b1;
        return $this->valueHolder612b1->close();
    }
    public function persist($entity)
    {
        $this->initializereb7da && ($this->initializereb7da->__invoke($valueHolder612b1, $this, 'persist', array('entity' => $entity), $this->initializereb7da) || 1) && $this->valueHolder612b1 = $valueHolder612b1;
        return $this->valueHolder612b1->persist($entity);
    }
    public function remove($entity)
    {
        $this->initializereb7da && ($this->initializereb7da->__invoke($valueHolder612b1, $this, 'remove', array('entity' => $entity), $this->initializereb7da) || 1) && $this->valueHolder612b1 = $valueHolder612b1;
        return $this->valueHolder612b1->remove($entity);
    }
    public function refresh($entity)
    {
        $this->initializereb7da && ($this->initializereb7da->__invoke($valueHolder612b1, $this, 'refresh', array('entity' => $entity), $this->initializereb7da) || 1) && $this->valueHolder612b1 = $valueHolder612b1;
        return $this->valueHolder612b1->refresh($entity);
    }
    public function detach($entity)
    {
        $this->initializereb7da && ($this->initializereb7da->__invoke($valueHolder612b1, $this, 'detach', array('entity' => $entity), $this->initializereb7da) || 1) && $this->valueHolder612b1 = $valueHolder612b1;
        return $this->valueHolder612b1->detach($entity);
    }
    public function merge($entity)
    {
        $this->initializereb7da && ($this->initializereb7da->__invoke($valueHolder612b1, $this, 'merge', array('entity' => $entity), $this->initializereb7da) || 1) && $this->valueHolder612b1 = $valueHolder612b1;
        return $this->valueHolder612b1->merge($entity);
    }
    public function copy($entity, $deep = false)
    {
        $this->initializereb7da && ($this->initializereb7da->__invoke($valueHolder612b1, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializereb7da) || 1) && $this->valueHolder612b1 = $valueHolder612b1;
        return $this->valueHolder612b1->copy($entity, $deep);
    }
    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializereb7da && ($this->initializereb7da->__invoke($valueHolder612b1, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializereb7da) || 1) && $this->valueHolder612b1 = $valueHolder612b1;
        return $this->valueHolder612b1->lock($entity, $lockMode, $lockVersion);
    }
    public function getRepository($entityName)
    {
        $this->initializereb7da && ($this->initializereb7da->__invoke($valueHolder612b1, $this, 'getRepository', array('entityName' => $entityName), $this->initializereb7da) || 1) && $this->valueHolder612b1 = $valueHolder612b1;
        return $this->valueHolder612b1->getRepository($entityName);
    }
    public function contains($entity)
    {
        $this->initializereb7da && ($this->initializereb7da->__invoke($valueHolder612b1, $this, 'contains', array('entity' => $entity), $this->initializereb7da) || 1) && $this->valueHolder612b1 = $valueHolder612b1;
        return $this->valueHolder612b1->contains($entity);
    }
    public function getEventManager()
    {
        $this->initializereb7da && ($this->initializereb7da->__invoke($valueHolder612b1, $this, 'getEventManager', array(), $this->initializereb7da) || 1) && $this->valueHolder612b1 = $valueHolder612b1;
        return $this->valueHolder612b1->getEventManager();
    }
    public function getConfiguration()
    {
        $this->initializereb7da && ($this->initializereb7da->__invoke($valueHolder612b1, $this, 'getConfiguration', array(), $this->initializereb7da) || 1) && $this->valueHolder612b1 = $valueHolder612b1;
        return $this->valueHolder612b1->getConfiguration();
    }
    public function isOpen()
    {
        $this->initializereb7da && ($this->initializereb7da->__invoke($valueHolder612b1, $this, 'isOpen', array(), $this->initializereb7da) || 1) && $this->valueHolder612b1 = $valueHolder612b1;
        return $this->valueHolder612b1->isOpen();
    }
    public function getUnitOfWork()
    {
        $this->initializereb7da && ($this->initializereb7da->__invoke($valueHolder612b1, $this, 'getUnitOfWork', array(), $this->initializereb7da) || 1) && $this->valueHolder612b1 = $valueHolder612b1;
        return $this->valueHolder612b1->getUnitOfWork();
    }
    public function getHydrator($hydrationMode)
    {
        $this->initializereb7da && ($this->initializereb7da->__invoke($valueHolder612b1, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializereb7da) || 1) && $this->valueHolder612b1 = $valueHolder612b1;
        return $this->valueHolder612b1->getHydrator($hydrationMode);
    }
    public function newHydrator($hydrationMode)
    {
        $this->initializereb7da && ($this->initializereb7da->__invoke($valueHolder612b1, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializereb7da) || 1) && $this->valueHolder612b1 = $valueHolder612b1;
        return $this->valueHolder612b1->newHydrator($hydrationMode);
    }
    public function getProxyFactory()
    {
        $this->initializereb7da && ($this->initializereb7da->__invoke($valueHolder612b1, $this, 'getProxyFactory', array(), $this->initializereb7da) || 1) && $this->valueHolder612b1 = $valueHolder612b1;
        return $this->valueHolder612b1->getProxyFactory();
    }
    public function initializeObject($obj)
    {
        $this->initializereb7da && ($this->initializereb7da->__invoke($valueHolder612b1, $this, 'initializeObject', array('obj' => $obj), $this->initializereb7da) || 1) && $this->valueHolder612b1 = $valueHolder612b1;
        return $this->valueHolder612b1->initializeObject($obj);
    }
    public function getFilters()
    {
        $this->initializereb7da && ($this->initializereb7da->__invoke($valueHolder612b1, $this, 'getFilters', array(), $this->initializereb7da) || 1) && $this->valueHolder612b1 = $valueHolder612b1;
        return $this->valueHolder612b1->getFilters();
    }
    public function isFiltersStateClean()
    {
        $this->initializereb7da && ($this->initializereb7da->__invoke($valueHolder612b1, $this, 'isFiltersStateClean', array(), $this->initializereb7da) || 1) && $this->valueHolder612b1 = $valueHolder612b1;
        return $this->valueHolder612b1->isFiltersStateClean();
    }
    public function hasFilters()
    {
        $this->initializereb7da && ($this->initializereb7da->__invoke($valueHolder612b1, $this, 'hasFilters', array(), $this->initializereb7da) || 1) && $this->valueHolder612b1 = $valueHolder612b1;
        return $this->valueHolder612b1->hasFilters();
    }
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;
        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $instance, 'Doctrine\\ORM\\EntityManager')->__invoke($instance);
        $instance->initializereb7da = $initializer;
        return $instance;
    }
    protected function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config, \Doctrine\Common\EventManager $eventManager)
    {
        static $reflection;
        if (! $this->valueHolder612b1) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolder612b1 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
        }
        $this->valueHolder612b1->__construct($conn, $config, $eventManager);
    }
    public function & __get($name)
    {
        $this->initializereb7da && ($this->initializereb7da->__invoke($valueHolder612b1, $this, '__get', ['name' => $name], $this->initializereb7da) || 1) && $this->valueHolder612b1 = $valueHolder612b1;
        if (isset(self::$publicProperties91085[$name])) {
            return $this->valueHolder612b1->$name;
        }
        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder612b1;
            $backtrace = debug_backtrace(false, 1);
            trigger_error(
                sprintf(
                    'Undefined property: %s::$%s in %s on line %s',
                    $realInstanceReflection->getName(),
                    $name,
                    $backtrace[0]['file'],
                    $backtrace[0]['line']
                ),
                \E_USER_NOTICE
            );
            return $targetObject->$name;
        }
        $targetObject = $this->valueHolder612b1;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();
        return $returnValue;
    }
    public function __set($name, $value)
    {
        $this->initializereb7da && ($this->initializereb7da->__invoke($valueHolder612b1, $this, '__set', array('name' => $name, 'value' => $value), $this->initializereb7da) || 1) && $this->valueHolder612b1 = $valueHolder612b1;
        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder612b1;
            $targetObject->$name = $value;
            return $targetObject->$name;
        }
        $targetObject = $this->valueHolder612b1;
        $accessor = function & () use ($targetObject, $name, $value) {
            $targetObject->$name = $value;
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();
        return $returnValue;
    }
    public function __isset($name)
    {
        $this->initializereb7da && ($this->initializereb7da->__invoke($valueHolder612b1, $this, '__isset', array('name' => $name), $this->initializereb7da) || 1) && $this->valueHolder612b1 = $valueHolder612b1;
        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder612b1;
            return isset($targetObject->$name);
        }
        $targetObject = $this->valueHolder612b1;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();
        return $returnValue;
    }
    public function __unset($name)
    {
        $this->initializereb7da && ($this->initializereb7da->__invoke($valueHolder612b1, $this, '__unset', array('name' => $name), $this->initializereb7da) || 1) && $this->valueHolder612b1 = $valueHolder612b1;
        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder612b1;
            unset($targetObject->$name);
            return;
        }
        $targetObject = $this->valueHolder612b1;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);
            return;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $accessor();
    }
    public function __clone()
    {
        $this->initializereb7da && ($this->initializereb7da->__invoke($valueHolder612b1, $this, '__clone', array(), $this->initializereb7da) || 1) && $this->valueHolder612b1 = $valueHolder612b1;
        $this->valueHolder612b1 = clone $this->valueHolder612b1;
    }
    public function __sleep()
    {
        $this->initializereb7da && ($this->initializereb7da->__invoke($valueHolder612b1, $this, '__sleep', array(), $this->initializereb7da) || 1) && $this->valueHolder612b1 = $valueHolder612b1;
        return array('valueHolder612b1');
    }
    public function __wakeup()
    {
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
    }
    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializereb7da = $initializer;
    }
    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializereb7da;
    }
    public function initializeProxy() : bool
    {
        return $this->initializereb7da && ($this->initializereb7da->__invoke($valueHolder612b1, $this, 'initializeProxy', array(), $this->initializereb7da) || 1) && $this->valueHolder612b1 = $valueHolder612b1;
    }
    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder612b1;
    }
    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder612b1;
    }
}

if (!\class_exists('EntityManager_9a5be93', false)) {
    \class_alias(__NAMESPACE__.'\\EntityManager_9a5be93', 'EntityManager_9a5be93', false);
}
