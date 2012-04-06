<?php

/**
 * This file is part of the FOSCommentBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

return array(
    new \Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
    new \Symfony\Bundle\TwigBundle\TwigBundle(),
    new \Symfony\Bundle\SecurityBundle\SecurityBundle(),
    new \Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
    new \Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
    new \Symfony\Bundle\AsseticBundle\AsseticBundle(),

    new \FOS\RestBundle\FOSRestBundle(),
    new \FOS\CommentBundle\FOSCommentBundle(),
    new \JMS\SerializerBundle\JMSSerializerBundle($this),

    new \FOS\CommentBundle\Tests\Functional\Bundle\CommentBundle\CommentBundle(),
);