<?php
    namespace Lddt\MainBundle\Repository;
    use Lddt\MainBundle\Entity\Draw;
    /**
     * DrawRepository
     *
     * This class was generated by the Doctrine ORM. Add your own custom
     * repository methods below.
     */
    class DrawRepository extends \Doctrine\ORM\EntityRepository{
        public function findAllDraws(){
            $q = $this->getEntityManager()
                ->createQuery('SELECT d,c FROM LddtMainBundle:Draw d INNER JOIN d.category c');
            return $q->getResult();
        }
        /**
         * Autre syntaxe de requete
         * @param $category
         * @return array
         */
        public function findAllDrawsByCat($category){
            $q= $this->createQueryBuilder('d')
                     ->join('d.category', 'c')
                     ->where('d.category = :cat')
                     ->setParameter('cat', $category)
                     ->addSelect('c')
                     ->orderBy('d.category', 'DESC');
            return $q->getQuery()->getResult();
        }
    }
