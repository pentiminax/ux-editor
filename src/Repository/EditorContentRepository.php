<?php

namespace Pentiminax\UX\Editor\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Pentiminax\UX\Editor\Entity\EditorContent;

/**
 * @extends ServiceEntityRepository<EditorContent>
 */
class EditorContentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EditorContent::class);
    }

    public function save(EditorContent $content, bool $flush = false): void
    {
        $this->getEntityManager()->persist($content);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
