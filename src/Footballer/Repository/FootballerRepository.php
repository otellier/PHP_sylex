<?php

namespace App\Footballer\Repository;

use App\Footballer\Entity\Footballer;
use Doctrine\DBAL\Connection;

/**
 * footballer repository.
 */
class footballerRepository
{
    /**
     * @var \Doctrine\DBAL\Connection
     */
    protected $db;

    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

   /**
    * Returns a collection of footballer.
    *
    * @param int $limit
    *   The number of  to return.
    * @param int $offset
    *   The number of footballer to skip.
    * @param array $orderBy
    *   Optionally, the order by info, in the $column => $direction format.
    *
    * @return array A collection of footballer, keyed by footballer id.
    */
   public function getAll()
   {
       $queryBuilder = $this->db->createQueryBuilder();
       $queryBuilder
           ->select('f.*')
           ->from('footballer', 'f');

       $statement = $queryBuilder->execute();
       $footballerData = $statement->fetchAll();
       $footballerEntityList = null;
       foreach ($footballerData as $footballerData) {
           $footballerEntityList[$footballerData['id']] = new Footballer($footballerData['id'], $footballerData['nom'], $footballerData['prenom'], $footballerData['poste'], $footballerData['idmaster']);
       }

       return $footballerEntityList;
   }

   /**
    * Returns an footballer object.
    *
    * @param $id
    *   The id of the footballer to return.
    *
    * @return array A collection of footballer, keyed by footballer id.
    */
   public function getByid($id)
   {
       $queryBuilder = $this->db->createQueryBuilder();
       $queryBuilder
           ->select('f.*')
           ->from('footballer', 'f')
           ->where('id = ?')
           ->setParameter(0, $id);
       $statement = $queryBuilder->execute();
       $footballerData = $statement->fetchAll();

       return new footballer($footballerData[0]['id'],$footballerData[0]['poste'], $footballerData[0]['nom'], $footballerData[0]['prenom'], $footballerData[0]['idmaster']);
   }

   public function getByMasterId($id)
   {
       $queryBuilder = $this->db->createQueryBuilder();
       $queryBuilder
           ->select('f.nom')
           ->from('footballer', 'f')
           ->where('id = ?')
           ->setParameter(0, $id);
       $statement = $queryBuilder->execute();
       $footballerData = $statement->fetchAll();

       return new footballer($footballerData[0]['id'],$footballerData[0]['poste'], $footballerData[0]['nom'], $footballerData[0]['prenom'], $footballerData[0]['idmaster']);
   }

    public function delete($id)
    {
        $queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder
          ->delete('footballer')
          ->where('id = :id')
          ->setParameter(':id', $id);

        $statement = $queryBuilder->execute();
    }

    public function update($parameters)
    {
        $queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder
          ->update('footballer')
          ->where('id = :id')
          ->setParameter(':id', $parameters['id']);

        if ($parameters['nom']) {
            $queryBuilder
              ->set('nom', ':nom')
              ->setParameter(':nom', $parameters['nom']);
        }

        if ($parameters['prenom']) {
            $queryBuilder
            ->set('prenom', ':prenom')
            ->setParameter(':prenom', $parameters['prenom']);
        }
        if ($parameters['poste']) {
            $queryBuilder
            ->set('poste', ':poste')
            ->setParameter(':poste', $parameters['poste']);
        }
        if ($parameters['idmaster']) {
            $queryBuilder
            ->set('idmaster', ':idmaster')
            ->setParameter(':idmaster', $parameters['idmaster']);
        }

        $statement = $queryBuilder->execute();
    }

    public function insert($parameters)
    {
        $queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder
          ->insert('footballer')
          ->values(
              array(
                'id' => ':id',
                'nom' => ':nom',
                'prenom' => ':prenom',
                'poste' => ':poste',
                'idmaster' => ':idmaster'
              )
          )
          ->setParameter(':id', $parameters['id'])
          ->setParameter(':nom', $parameters['nom'])
          ->setParameter(':prenom', $parameters['prenom'])
          ->setParameter(':poste', $parameters['poste'])
          ->setParameter(':idmaster', $parameters['idmaster']);

        $statement = $queryBuilder->execute();
    }
}
