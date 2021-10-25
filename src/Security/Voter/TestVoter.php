<?php

namespace App\Security\Voter;

use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;

class TestVoter extends Voter
{
    public const TEST_VOTER = 'test_voter';

    protected function supports(string $attribute, $subject): bool
    {
        return $attribute === self::TEST_VOTER;
    }

    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token): bool
    {
        dd($subject);
    }
}
