<?php

namespace Ob\CampaignBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class SnapshotCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('campaign:generate:snapshots')
            ->setDescription('Generate snapshots for templates')
            ->addArgument('limit', InputArgument::OPTIONAL, 'How many images to process', 10)
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $limit = $input->getArgument('limit');

        // In 2.4 these deps would be injected in the service definition
        $entityManager = $this->getContainer()->get('doctrine')->getManager();
        $snappy = $this->getContainer()->get('ob_campaign.snapshot');

        $templates = $this->getTemplates($entityManager, $limit);

        foreach ($templates as $template) {
            $output->writeln("Generating snapshot for template " . $template->getName());

            $html = $template->getCode();
            $imagePath = $snappy->render($html);

            $template->setSnapshot($imagePath);
        }

        $entityManager->flush();
    }

    // This should go in a repository class
    private function getTemplates($entityManager, $limit)
    {
        $templates = $entityManager->getRepository('ObCampaignBundle:Template')->findBy(
            array('snapshot' => null),
            null,
            $limit
        );

        return $templates;
    }
}
