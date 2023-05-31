<?php
namespace Tha\Core\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class Thacli extends Command
{
    const NAME = 'name';

    /**
     * @inheritDoc
     */
    protected function configure()
    {
        $options = [
			new InputOption(
				self::NAME,
				null,
				InputOption::VALUE_REQUIRED,
				'Name'
			)
		];

        $this->setName('tha:run')
			->setDescription('Demo command line')
			->setDefinition($options);

        parent::configure();
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return null|int
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('<info>Success Message.</info>');
        $output->writeln('<error>An error encountered.</error>');
        if ($name = $input->getOption(self::NAME)) {
			$output->writeln("Hello " . $name);
		} else {
			$output->writeln("Hello World");
		}

		return $this;
    }
}