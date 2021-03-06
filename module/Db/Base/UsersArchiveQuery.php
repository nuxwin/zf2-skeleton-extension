<?php

namespace Base;

use \UsersArchive as ChildUsersArchive;
use \UsersArchiveQuery as ChildUsersArchiveQuery;
use \Exception;
use \PDO;
use Map\UsersArchiveTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'users_archive' table.
 *
 * 
 *
 * @method     ChildUsersArchiveQuery orderByid($order = Criteria::ASC) Order by the id column
 * @method     ChildUsersArchiveQuery orderBy_role_id($order = Criteria::ASC) Order by the _role_id column
 * @method     ChildUsersArchiveQuery orderBytitle($order = Criteria::ASC) Order by the title column
 * @method     ChildUsersArchiveQuery orderByfirstName($order = Criteria::ASC) Order by the firstName column
 * @method     ChildUsersArchiveQuery orderBylastName($order = Criteria::ASC) Order by the lastName column
 * @method     ChildUsersArchiveQuery orderBypassword($order = Criteria::ASC) Order by the password column
 * @method     ChildUsersArchiveQuery orderByemail($order = Criteria::ASC) Order by the email column
 * @method     ChildUsersArchiveQuery orderByusername($order = Criteria::ASC) Order by the username column
 * @method     ChildUsersArchiveQuery orderByauthenticationType($order = Criteria::ASC) Order by the authenticationType column
 * @method     ChildUsersArchiveQuery orderBysystemAdministrator($order = Criteria::ASC) Order by the systemAdministrator column
 * @method     ChildUsersArchiveQuery orderByuserData($order = Criteria::ASC) Order by the userData column
 * @method     ChildUsersArchiveQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildUsersArchiveQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method     ChildUsersArchiveQuery orderByArchivedAt($order = Criteria::ASC) Order by the archived_at column
 *
 * @method     ChildUsersArchiveQuery groupByid() Group by the id column
 * @method     ChildUsersArchiveQuery groupBy_role_id() Group by the _role_id column
 * @method     ChildUsersArchiveQuery groupBytitle() Group by the title column
 * @method     ChildUsersArchiveQuery groupByfirstName() Group by the firstName column
 * @method     ChildUsersArchiveQuery groupBylastName() Group by the lastName column
 * @method     ChildUsersArchiveQuery groupBypassword() Group by the password column
 * @method     ChildUsersArchiveQuery groupByemail() Group by the email column
 * @method     ChildUsersArchiveQuery groupByusername() Group by the username column
 * @method     ChildUsersArchiveQuery groupByauthenticationType() Group by the authenticationType column
 * @method     ChildUsersArchiveQuery groupBysystemAdministrator() Group by the systemAdministrator column
 * @method     ChildUsersArchiveQuery groupByuserData() Group by the userData column
 * @method     ChildUsersArchiveQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildUsersArchiveQuery groupByUpdatedAt() Group by the updated_at column
 * @method     ChildUsersArchiveQuery groupByArchivedAt() Group by the archived_at column
 *
 * @method     ChildUsersArchiveQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildUsersArchiveQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildUsersArchiveQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildUsersArchiveQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildUsersArchiveQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildUsersArchiveQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildUsersArchive findOne(ConnectionInterface $con = null) Return the first ChildUsersArchive matching the query
 * @method     ChildUsersArchive findOneOrCreate(ConnectionInterface $con = null) Return the first ChildUsersArchive matching the query, or a new ChildUsersArchive object populated from the query conditions when no match is found
 *
 * @method     ChildUsersArchive findOneByid(int $id) Return the first ChildUsersArchive filtered by the id column
 * @method     ChildUsersArchive findOneBy_role_id(int $_role_id) Return the first ChildUsersArchive filtered by the _role_id column
 * @method     ChildUsersArchive findOneBytitle(string $title) Return the first ChildUsersArchive filtered by the title column
 * @method     ChildUsersArchive findOneByfirstName(string $firstName) Return the first ChildUsersArchive filtered by the firstName column
 * @method     ChildUsersArchive findOneBylastName(string $lastName) Return the first ChildUsersArchive filtered by the lastName column
 * @method     ChildUsersArchive findOneBypassword(string $password) Return the first ChildUsersArchive filtered by the password column
 * @method     ChildUsersArchive findOneByemail(string $email) Return the first ChildUsersArchive filtered by the email column
 * @method     ChildUsersArchive findOneByusername(string $username) Return the first ChildUsersArchive filtered by the username column
 * @method     ChildUsersArchive findOneByauthenticationType(int $authenticationType) Return the first ChildUsersArchive filtered by the authenticationType column
 * @method     ChildUsersArchive findOneBysystemAdministrator(boolean $systemAdministrator) Return the first ChildUsersArchive filtered by the systemAdministrator column
 * @method     ChildUsersArchive findOneByuserData(string $userData) Return the first ChildUsersArchive filtered by the userData column
 * @method     ChildUsersArchive findOneByCreatedAt(string $created_at) Return the first ChildUsersArchive filtered by the created_at column
 * @method     ChildUsersArchive findOneByUpdatedAt(string $updated_at) Return the first ChildUsersArchive filtered by the updated_at column
 * @method     ChildUsersArchive findOneByArchivedAt(string $archived_at) Return the first ChildUsersArchive filtered by the archived_at column *

 * @method     ChildUsersArchive requirePk($key, ConnectionInterface $con = null) Return the ChildUsersArchive by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsersArchive requireOne(ConnectionInterface $con = null) Return the first ChildUsersArchive matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUsersArchive requireOneByid(int $id) Return the first ChildUsersArchive filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsersArchive requireOneBy_role_id(int $_role_id) Return the first ChildUsersArchive filtered by the _role_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsersArchive requireOneBytitle(string $title) Return the first ChildUsersArchive filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsersArchive requireOneByfirstName(string $firstName) Return the first ChildUsersArchive filtered by the firstName column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsersArchive requireOneBylastName(string $lastName) Return the first ChildUsersArchive filtered by the lastName column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsersArchive requireOneBypassword(string $password) Return the first ChildUsersArchive filtered by the password column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsersArchive requireOneByemail(string $email) Return the first ChildUsersArchive filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsersArchive requireOneByusername(string $username) Return the first ChildUsersArchive filtered by the username column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsersArchive requireOneByauthenticationType(int $authenticationType) Return the first ChildUsersArchive filtered by the authenticationType column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsersArchive requireOneBysystemAdministrator(boolean $systemAdministrator) Return the first ChildUsersArchive filtered by the systemAdministrator column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsersArchive requireOneByuserData(string $userData) Return the first ChildUsersArchive filtered by the userData column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsersArchive requireOneByCreatedAt(string $created_at) Return the first ChildUsersArchive filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsersArchive requireOneByUpdatedAt(string $updated_at) Return the first ChildUsersArchive filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsersArchive requireOneByArchivedAt(string $archived_at) Return the first ChildUsersArchive filtered by the archived_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUsersArchive[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildUsersArchive objects based on current ModelCriteria
 * @method     ChildUsersArchive[]|ObjectCollection findByid(int $id) Return ChildUsersArchive objects filtered by the id column
 * @method     ChildUsersArchive[]|ObjectCollection findBy_role_id(int $_role_id) Return ChildUsersArchive objects filtered by the _role_id column
 * @method     ChildUsersArchive[]|ObjectCollection findBytitle(string $title) Return ChildUsersArchive objects filtered by the title column
 * @method     ChildUsersArchive[]|ObjectCollection findByfirstName(string $firstName) Return ChildUsersArchive objects filtered by the firstName column
 * @method     ChildUsersArchive[]|ObjectCollection findBylastName(string $lastName) Return ChildUsersArchive objects filtered by the lastName column
 * @method     ChildUsersArchive[]|ObjectCollection findBypassword(string $password) Return ChildUsersArchive objects filtered by the password column
 * @method     ChildUsersArchive[]|ObjectCollection findByemail(string $email) Return ChildUsersArchive objects filtered by the email column
 * @method     ChildUsersArchive[]|ObjectCollection findByusername(string $username) Return ChildUsersArchive objects filtered by the username column
 * @method     ChildUsersArchive[]|ObjectCollection findByauthenticationType(int $authenticationType) Return ChildUsersArchive objects filtered by the authenticationType column
 * @method     ChildUsersArchive[]|ObjectCollection findBysystemAdministrator(boolean $systemAdministrator) Return ChildUsersArchive objects filtered by the systemAdministrator column
 * @method     ChildUsersArchive[]|ObjectCollection findByuserData(string $userData) Return ChildUsersArchive objects filtered by the userData column
 * @method     ChildUsersArchive[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildUsersArchive objects filtered by the created_at column
 * @method     ChildUsersArchive[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildUsersArchive objects filtered by the updated_at column
 * @method     ChildUsersArchive[]|ObjectCollection findByArchivedAt(string $archived_at) Return ChildUsersArchive objects filtered by the archived_at column
 * @method     ChildUsersArchive[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class UsersArchiveQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\UsersArchiveQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\UsersArchive', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildUsersArchiveQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildUsersArchiveQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildUsersArchiveQuery) {
            return $criteria;
        }
        $query = new ChildUsersArchiveQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildUsersArchive|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(UsersArchiveTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = UsersArchiveTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildUsersArchive A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, _role_id, title, firstName, lastName, password, email, username, authenticationType, systemAdministrator, userData, created_at, updated_at, archived_at FROM users_archive WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);            
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildUsersArchive $obj */
            $obj = new ChildUsersArchive();
            $obj->hydrate($row);
            UsersArchiveTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildUsersArchive|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildUsersArchiveQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(UsersArchiveTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildUsersArchiveQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(UsersArchiveTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterByid(1234); // WHERE id = 1234
     * $query->filterByid(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterByid(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsersArchiveQuery The current query, for fluid interface
     */
    public function filterByid($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(UsersArchiveTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(UsersArchiveTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsersArchiveTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the _role_id column
     *
     * Example usage:
     * <code>
     * $query->filterBy_role_id(1234); // WHERE _role_id = 1234
     * $query->filterBy_role_id(array(12, 34)); // WHERE _role_id IN (12, 34)
     * $query->filterBy_role_id(array('min' => 12)); // WHERE _role_id > 12
     * </code>
     *
     * @param     mixed $_role_id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsersArchiveQuery The current query, for fluid interface
     */
    public function filterBy_role_id($_role_id = null, $comparison = null)
    {
        if (is_array($_role_id)) {
            $useMinMax = false;
            if (isset($_role_id['min'])) {
                $this->addUsingAlias(UsersArchiveTableMap::COL__ROLE_ID, $_role_id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($_role_id['max'])) {
                $this->addUsingAlias(UsersArchiveTableMap::COL__ROLE_ID, $_role_id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsersArchiveTableMap::COL__ROLE_ID, $_role_id, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterBytitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterBytitle('%fooValue%'); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsersArchiveQuery The current query, for fluid interface
     */
    public function filterBytitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $title)) {
                $title = str_replace('*', '%', $title);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UsersArchiveTableMap::COL_TITLE, $title, $comparison);
    }

    /**
     * Filter the query on the firstName column
     *
     * Example usage:
     * <code>
     * $query->filterByfirstName('fooValue');   // WHERE firstName = 'fooValue'
     * $query->filterByfirstName('%fooValue%'); // WHERE firstName LIKE '%fooValue%'
     * </code>
     *
     * @param     string $firstName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsersArchiveQuery The current query, for fluid interface
     */
    public function filterByfirstName($firstName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($firstName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $firstName)) {
                $firstName = str_replace('*', '%', $firstName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UsersArchiveTableMap::COL_FIRSTNAME, $firstName, $comparison);
    }

    /**
     * Filter the query on the lastName column
     *
     * Example usage:
     * <code>
     * $query->filterBylastName('fooValue');   // WHERE lastName = 'fooValue'
     * $query->filterBylastName('%fooValue%'); // WHERE lastName LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lastName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsersArchiveQuery The current query, for fluid interface
     */
    public function filterBylastName($lastName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lastName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $lastName)) {
                $lastName = str_replace('*', '%', $lastName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UsersArchiveTableMap::COL_LASTNAME, $lastName, $comparison);
    }

    /**
     * Filter the query on the password column
     *
     * Example usage:
     * <code>
     * $query->filterBypassword('fooValue');   // WHERE password = 'fooValue'
     * $query->filterBypassword('%fooValue%'); // WHERE password LIKE '%fooValue%'
     * </code>
     *
     * @param     string $password The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsersArchiveQuery The current query, for fluid interface
     */
    public function filterBypassword($password = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($password)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $password)) {
                $password = str_replace('*', '%', $password);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UsersArchiveTableMap::COL_PASSWORD, $password, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByemail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByemail('%fooValue%'); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsersArchiveQuery The current query, for fluid interface
     */
    public function filterByemail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $email)) {
                $email = str_replace('*', '%', $email);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UsersArchiveTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the username column
     *
     * Example usage:
     * <code>
     * $query->filterByusername('fooValue');   // WHERE username = 'fooValue'
     * $query->filterByusername('%fooValue%'); // WHERE username LIKE '%fooValue%'
     * </code>
     *
     * @param     string $username The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsersArchiveQuery The current query, for fluid interface
     */
    public function filterByusername($username = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($username)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $username)) {
                $username = str_replace('*', '%', $username);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UsersArchiveTableMap::COL_USERNAME, $username, $comparison);
    }

    /**
     * Filter the query on the authenticationType column
     *
     * Example usage:
     * <code>
     * $query->filterByauthenticationType(1234); // WHERE authenticationType = 1234
     * $query->filterByauthenticationType(array(12, 34)); // WHERE authenticationType IN (12, 34)
     * $query->filterByauthenticationType(array('min' => 12)); // WHERE authenticationType > 12
     * </code>
     *
     * @param     mixed $authenticationType The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsersArchiveQuery The current query, for fluid interface
     */
    public function filterByauthenticationType($authenticationType = null, $comparison = null)
    {
        if (is_array($authenticationType)) {
            $useMinMax = false;
            if (isset($authenticationType['min'])) {
                $this->addUsingAlias(UsersArchiveTableMap::COL_AUTHENTICATIONTYPE, $authenticationType['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($authenticationType['max'])) {
                $this->addUsingAlias(UsersArchiveTableMap::COL_AUTHENTICATIONTYPE, $authenticationType['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsersArchiveTableMap::COL_AUTHENTICATIONTYPE, $authenticationType, $comparison);
    }

    /**
     * Filter the query on the systemAdministrator column
     *
     * Example usage:
     * <code>
     * $query->filterBysystemAdministrator(true); // WHERE systemAdministrator = true
     * $query->filterBysystemAdministrator('yes'); // WHERE systemAdministrator = true
     * </code>
     *
     * @param     boolean|string $systemAdministrator The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsersArchiveQuery The current query, for fluid interface
     */
    public function filterBysystemAdministrator($systemAdministrator = null, $comparison = null)
    {
        if (is_string($systemAdministrator)) {
            $systemAdministrator = in_array(strtolower($systemAdministrator), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(UsersArchiveTableMap::COL_SYSTEMADMINISTRATOR, $systemAdministrator, $comparison);
    }

    /**
     * Filter the query on the userData column
     *
     * Example usage:
     * <code>
     * $query->filterByuserData('fooValue');   // WHERE userData = 'fooValue'
     * $query->filterByuserData('%fooValue%'); // WHERE userData LIKE '%fooValue%'
     * </code>
     *
     * @param     string $userData The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsersArchiveQuery The current query, for fluid interface
     */
    public function filterByuserData($userData = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($userData)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $userData)) {
                $userData = str_replace('*', '%', $userData);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UsersArchiveTableMap::COL_USERDATA, $userData, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsersArchiveQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(UsersArchiveTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(UsersArchiveTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsersArchiveTableMap::COL_CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $updatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsersArchiveQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(UsersArchiveTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(UsersArchiveTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsersArchiveTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query on the archived_at column
     *
     * Example usage:
     * <code>
     * $query->filterByArchivedAt('2011-03-14'); // WHERE archived_at = '2011-03-14'
     * $query->filterByArchivedAt('now'); // WHERE archived_at = '2011-03-14'
     * $query->filterByArchivedAt(array('max' => 'yesterday')); // WHERE archived_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $archivedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUsersArchiveQuery The current query, for fluid interface
     */
    public function filterByArchivedAt($archivedAt = null, $comparison = null)
    {
        if (is_array($archivedAt)) {
            $useMinMax = false;
            if (isset($archivedAt['min'])) {
                $this->addUsingAlias(UsersArchiveTableMap::COL_ARCHIVED_AT, $archivedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($archivedAt['max'])) {
                $this->addUsingAlias(UsersArchiveTableMap::COL_ARCHIVED_AT, $archivedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UsersArchiveTableMap::COL_ARCHIVED_AT, $archivedAt, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildUsersArchive $usersArchive Object to remove from the list of results
     *
     * @return $this|ChildUsersArchiveQuery The current query, for fluid interface
     */
    public function prune($usersArchive = null)
    {
        if ($usersArchive) {
            $this->addUsingAlias(UsersArchiveTableMap::COL_ID, $usersArchive->getid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the users_archive table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UsersArchiveTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            UsersArchiveTableMap::clearInstancePool();
            UsersArchiveTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UsersArchiveTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(UsersArchiveTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            UsersArchiveTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            UsersArchiveTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // UsersArchiveQuery
