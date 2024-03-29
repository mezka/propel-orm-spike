<?php

namespace Base;

use \LikedMedias as ChildLikedMedias;
use \LikedMediasQuery as ChildLikedMediasQuery;
use \Exception;
use \PDO;
use Map\LikedMediasTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'liked_medias' table.
 *
 *
 *
 * @method     ChildLikedMediasQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildLikedMediasQuery orderByProfileId($order = Criteria::ASC) Order by the profile_id column
 *
 * @method     ChildLikedMediasQuery groupById() Group by the id column
 * @method     ChildLikedMediasQuery groupByProfileId() Group by the profile_id column
 *
 * @method     ChildLikedMediasQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildLikedMediasQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildLikedMediasQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildLikedMediasQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildLikedMediasQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildLikedMediasQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildLikedMediasQuery leftJoinFollows($relationAlias = null) Adds a LEFT JOIN clause to the query using the Follows relation
 * @method     ChildLikedMediasQuery rightJoinFollows($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Follows relation
 * @method     ChildLikedMediasQuery innerJoinFollows($relationAlias = null) Adds a INNER JOIN clause to the query using the Follows relation
 *
 * @method     ChildLikedMediasQuery joinWithFollows($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Follows relation
 *
 * @method     ChildLikedMediasQuery leftJoinWithFollows() Adds a LEFT JOIN clause and with to the query using the Follows relation
 * @method     ChildLikedMediasQuery rightJoinWithFollows() Adds a RIGHT JOIN clause and with to the query using the Follows relation
 * @method     ChildLikedMediasQuery innerJoinWithFollows() Adds a INNER JOIN clause and with to the query using the Follows relation
 *
 * @method     \FollowsQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildLikedMedias findOne(ConnectionInterface $con = null) Return the first ChildLikedMedias matching the query
 * @method     ChildLikedMedias findOneOrCreate(ConnectionInterface $con = null) Return the first ChildLikedMedias matching the query, or a new ChildLikedMedias object populated from the query conditions when no match is found
 *
 * @method     ChildLikedMedias findOneById(int $id) Return the first ChildLikedMedias filtered by the id column
 * @method     ChildLikedMedias findOneByProfileId(int $profile_id) Return the first ChildLikedMedias filtered by the profile_id column *

 * @method     ChildLikedMedias requirePk($key, ConnectionInterface $con = null) Return the ChildLikedMedias by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLikedMedias requireOne(ConnectionInterface $con = null) Return the first ChildLikedMedias matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildLikedMedias requireOneById(int $id) Return the first ChildLikedMedias filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLikedMedias requireOneByProfileId(int $profile_id) Return the first ChildLikedMedias filtered by the profile_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildLikedMedias[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildLikedMedias objects based on current ModelCriteria
 * @method     ChildLikedMedias[]|ObjectCollection findById(int $id) Return ChildLikedMedias objects filtered by the id column
 * @method     ChildLikedMedias[]|ObjectCollection findByProfileId(int $profile_id) Return ChildLikedMedias objects filtered by the profile_id column
 * @method     ChildLikedMedias[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class LikedMediasQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\LikedMediasQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'lazygram', $modelName = '\\LikedMedias', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildLikedMediasQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildLikedMediasQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildLikedMediasQuery) {
            return $criteria;
        }
        $query = new ChildLikedMediasQuery();
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
     * @return ChildLikedMedias|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(LikedMediasTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = LikedMediasTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildLikedMedias A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, profile_id FROM liked_medias WHERE id = :p0';
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
            /** @var ChildLikedMedias $obj */
            $obj = new ChildLikedMedias();
            $obj->hydrate($row);
            LikedMediasTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildLikedMedias|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildLikedMediasQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(LikedMediasTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildLikedMediasQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(LikedMediasTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLikedMediasQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(LikedMediasTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(LikedMediasTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LikedMediasTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the profile_id column
     *
     * Example usage:
     * <code>
     * $query->filterByProfileId(1234); // WHERE profile_id = 1234
     * $query->filterByProfileId(array(12, 34)); // WHERE profile_id IN (12, 34)
     * $query->filterByProfileId(array('min' => 12)); // WHERE profile_id > 12
     * </code>
     *
     * @see       filterByFollows()
     *
     * @param     mixed $profileId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLikedMediasQuery The current query, for fluid interface
     */
    public function filterByProfileId($profileId = null, $comparison = null)
    {
        if (is_array($profileId)) {
            $useMinMax = false;
            if (isset($profileId['min'])) {
                $this->addUsingAlias(LikedMediasTableMap::COL_PROFILE_ID, $profileId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($profileId['max'])) {
                $this->addUsingAlias(LikedMediasTableMap::COL_PROFILE_ID, $profileId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LikedMediasTableMap::COL_PROFILE_ID, $profileId, $comparison);
    }

    /**
     * Filter the query by a related \Follows object
     *
     * @param \Follows|ObjectCollection $follows The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildLikedMediasQuery The current query, for fluid interface
     */
    public function filterByFollows($follows, $comparison = null)
    {
        if ($follows instanceof \Follows) {
            return $this
                ->addUsingAlias(LikedMediasTableMap::COL_PROFILE_ID, $follows->getId(), $comparison);
        } elseif ($follows instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(LikedMediasTableMap::COL_PROFILE_ID, $follows->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByFollows() only accepts arguments of type \Follows or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Follows relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildLikedMediasQuery The current query, for fluid interface
     */
    public function joinFollows($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Follows');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Follows');
        }

        return $this;
    }

    /**
     * Use the Follows relation Follows object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \FollowsQuery A secondary query class using the current class as primary query
     */
    public function useFollowsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinFollows($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Follows', '\FollowsQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildLikedMedias $likedMedias Object to remove from the list of results
     *
     * @return $this|ChildLikedMediasQuery The current query, for fluid interface
     */
    public function prune($likedMedias = null)
    {
        if ($likedMedias) {
            $this->addUsingAlias(LikedMediasTableMap::COL_ID, $likedMedias->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the liked_medias table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(LikedMediasTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            LikedMediasTableMap::clearInstancePool();
            LikedMediasTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(LikedMediasTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(LikedMediasTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            LikedMediasTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            LikedMediasTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // LikedMediasQuery
