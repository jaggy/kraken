<?php
namespace spec\Jaggy\Kraken\Vcs;

use Jaggy\Kraken\Shell;
use Prophecy\Argument;
use PhpSpec\ObjectBehavior;

/**
 * Git wrapper specification.
 *
 * @package     spec\Jaggy\Kraken\Vcs
 * @author      Jaggy Gauran <jaggygauran@gmail.com>
 * @license     http://opensource.org/licenses/MIT The MIT License (MIT)
 * @version     Release: 0.1.0
 * @link        http://github.com/jaggy/kraken
 * @since       Class available since Release 0.1.0
 */
class GitSpec extends ObjectBehavior
{
    /**
     * Set up the tests.
     *
     * @return void
     */
    public function let(Shell $shell)
    {
        $this->beConstructedWith($shell);
    }

    /**
     * it is initializable
     *
     * @return void
     */
    function it_is_initializable()
    {
        $this->shouldHaveType('Jaggy\Kraken\Vcs\Git');
        $this->shouldHaveType('Jaggy\Kraken\Vcs\VcsInterface');
    }


    /**
     * it returns all the modified files
     *
     * @test
     * @return void
     */
    public function it_returns_all_the_modified_files(Shell $shell)
    {
        $mock    = file_get_contents('spec/support/git.mock');
        $command = Argument::exact('git status');

        $shell->execute($command)->willReturn($mock);

        $files = [
            '.gitignore',
            'spec/Jaggy/Kraken/KrakenSpec.php',
            'src/Jaggy/Kraken/Kraken.php'
        ];

        $this->modified()->shouldReturn($files);
    }
}
