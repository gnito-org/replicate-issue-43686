<?php

namespace App\Controller;

use App\Security\Voter\TestVoter;
use App\Service\Structure;
use App\Service\Theme;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class TestController extends AbstractController
{
    #[Route('/test-attribute', name: 'test_attribute')]
    #[IsGranted(TestVoter::TEST_VOTER, subject: ['structure' => 'structure', 'theme' => 'theme'])]
    public function testAttribute(Structure $structure, Theme $theme): Response
    {
        return new Response();
    }

    #[Route('/test-in-code-associative', name: 'test_in_code_associative')]
    public function testInCodeAssociative(Security $security, Structure $structure, Theme $theme): Response
    {
        $security->isGranted(TestVoter::TEST_VOTER, ['structure' => $structure, 'theme' => $theme]);
        return new Response();
    }

    #[Route('/test-in-code-basic', name: 'test_in_code_basic')]
    public function testInCode(Security $security, Structure $structure, Theme $theme): Response
    {
        $security->isGranted(TestVoter::TEST_VOTER, [$structure, $theme]);
        return new Response();
    }
}
