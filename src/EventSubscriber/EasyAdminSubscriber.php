<?php

namespace App\EventSubscriber;

use App\Entity\Category;
use EasyCorp\Bundle\EasyAdminBundle\Event\AfterEntityDeletedEvent;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

readonly class EasyAdminSubscriber implements EventSubscriberInterface
{
    public function __construct(
        private string $projectDir
    )
    {
    }

    public static function getSubscribedEvents(): array
    {
        return [
            AfterEntityDeletedEvent::class => ["deletePhysicalImage"],
        ];
    }

    public function deletePhysicalImage(AfterEntityDeletedEvent $event): void
    {
        $entity = $event->getEntityInstance();
        if (!($entity instanceof Category)) {
            return;
        }
        $imgpath =
            $this->projectDir .
            "/public/images/categories/" .
            $entity->getThumbnail();
        if (file_exists($imgpath)) {
            unlink($imgpath);
        }
    }
}