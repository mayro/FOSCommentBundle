<?php

/*
 * This file is part of the FOSCommentBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * This file is part of the FOSCommentBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace FOS\CommentBundle\EventListener;

use FOS\CommentBundle\Event\CommentEvent;
use FOS\CommentBundle\Events;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Exception\PreconditionFailedHttpException;

/**
 * Blames a comment using Symfony2 security component.
 *
 * @author Thibault Duplessis <thibault.duplessis@gmail.com>
 */
class ClosedThreadListener implements EventSubscriberInterface
{
    /**
     * Disallows comments in a closed thread.
     *
     * @param \FOS\CommentBundle\Event\CommentEvent $event
     */
    public function onCommentPersist(CommentEvent $event)
    {
        $comment = $event->getComment();
        $thread = $comment->getThread();

        if (!$thread->isCommentable()) {
            throw new PreconditionFailedHttpException('Cannot add comment to a closed thread');
        }
    }

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return array(Events::COMMENT_PRE_PERSIST => 'onCommentPersist');
    }
}
