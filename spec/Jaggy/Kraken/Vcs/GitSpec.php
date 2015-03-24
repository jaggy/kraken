<?php
namespace spec\Jaggy\Kraken\Vcs;

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
    public function let()
    {
        $this->beConstructedWith(__DIR__);
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
}
