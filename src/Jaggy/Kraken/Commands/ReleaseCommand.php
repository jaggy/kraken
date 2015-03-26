<?php
namespace Jaggy\Kraken\Commands;

use Jaggy\Kraken\Kraken;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Formatter\OutputFormatterStyle;

/**
 * Release the Kraken!
 *
 * @package     Jaggy\Kraken\Release
 * @author      Jaggy Gauran <jaggygauran@gmail.com>
 * @license     http://opensource.org/licenses/MIT The MIT License (MIT)
 * @version     Release: 0.1.1
 * @link        http://github.com/jaggy/kraken
 * @since       Class available since Release 0.1.0
 */
class ReleaseCommand extends Command
{
    /**
     * Create a command instance.
     *
     * @return ReleaseCommand
     */
    public function __construct(Kraken $kraken)
    {
        parent::__construct();

        $this->kraken = $kraken;
    }

    /**
     * Configure
     *
     * @return void
     */
    public function configure()
    {
        $this->setName('release');
        $this->setDescription('Update all the modified file versions.');

        $this->addArgument('type', InputArgument::REQUIRED);

    }


    /**
     * Execute the command.
     *
     * @return void
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $type = $input->getArgument('type');

        if (! in_array($type, ['major', 'minor', 'patch'])) {
            throw new \InvalidArgumentException('Invalid argument supplied: [major, minor, patch]');
        }

        $kraken = call_user_func_array([$this->kraken, $type], []);
        $kraken->update();
    }
}
