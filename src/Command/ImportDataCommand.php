<?php

namespace App\Command;

use GuzzleHttp\Client;
use App\Entity\Project;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'ImportDataCommand',
    description: 'Importe un fichier xml en base de donné',
)]
class ImportDataCommand extends Command
{
    private $client;

    public function __construct(Client $client, EntityManagerInterface $entityManager)
    {
        $this->client = $client;
        $this->entityManager = $entityManager;
        
        parent::__construct(); 
    }

    protected function configure(): void
    {
        $this
            ->setName('app:import-data')
            ->setDescription('importe un fichier XML')
            ->addArgument('file', InputArgument::OPTIONAL, 'Url du fichier xml à importer')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $url = $input->getArgument('file');
        $response = $this->client->get($url);
        $xml = $response->getBody()->getContents();

        $data = simplexml_load_string($xml);

        foreach ($data->project as $projectData) {
            $project = new Project();
            $project->setStartDate(new \DateTime($projectData->start_date));
            $project->setName((string) $projectData->name);
            $project->setPriceSold((int) $projectData->price_sold);
            $project->setType((string) $projectData->type);
            $project->setEstimatedTimeToCompletion((int) $projectData->times->estimated_time_to_completion);
            $project->setSpentTime((int) $projectData->times->spent_time);
            $project->setTechnology((string) $projectData->technology);
            $project->setCompany((string) $projectData->company);
            $project->setWorkers(explode(', ', (string) $projectData->workers));
        
            $this->entityManager->persist($project);
            
        }
            $this->entityManager->flush();


        $io = new SymfonyStyle($input, $output);
        $io->success('File imported successfully');

        return 0;
    }
}

