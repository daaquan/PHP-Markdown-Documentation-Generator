<?php

namespace DocsMd\Console;

use DocsMd\Console\DocsMdCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Command line interface used to extract markdown-formatted documentation from classes
 * @package DocsMd\Console
 */
class CLI extends Application
{
    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Input\OutputInterface $output
     * @return int
     */
    public function run(InputInterface $input = null, OutputInterface $output = null)
    {
        $this->add(new DocsMdCommand());
        return parent::run($input, $output);
    }
}
