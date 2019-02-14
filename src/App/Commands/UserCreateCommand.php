<?php
/**
 * Class/file UsersCommand.php
 *
 * @author John Pluto Solutions <john@pluto.solutions>
 * Date: 2/14/2019
 * Time: 10:11 PM
 */

namespace Console\App\Commands;

use Console\App\Entity\User;
use Console\App\Repository\UserRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class UserCreateCommand extends Command
{
    protected function configure()
    {
        $this->setName('user-create')
            ->setDescription('Create a new user functionality!')
            ->setHelp('Create a new user')
            ->addArgument('username', InputArgument::REQUIRED, 'Username')
            ->addArgument('password', InputArgument::REQUIRED, 'Password');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $created = User::consoleCreate($input->getArgument('username'), $input->getArgument('password'));
//            $userRepository->create($created);
            $output->writeln(sprintf('Created a new user successfully! [ username : , %s, password : %s]', $created->getUsername(), $created->getUserpassword()));
        } catch (exception $e) {
            $output->writeln($e->getMessage());
        }
    }
}
