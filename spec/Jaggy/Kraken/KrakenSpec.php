<?php

namespace spec\Jaggy\Kraken;

use Prophecy\Argument;
use PhpSpec\ObjectBehavior;
use SebastianBergmann\Git\Git;

/**
 * Kraken specification.
 *
 * @package     spec\Jaggy\Kraken
 * @author      Jaggy Gauran <jaggygauran@gmail.com>
 * @license     http://opensource.org/licenses/MIT The MIT License (MIT)
 * @version     Release: 0.1.0
 * @link        http://github.com/jaggy/kraken
 * @since       Class available since Release 0.1.0
 */
class KrakenSpec extends ObjectBehavior
{
    /**
     * Test set up.
     *
     * @access public
     * @return void
     */
    public function let(Git $git)
    {
        $this->beConstructedWith($git);
    }


    /**
     * it is initializable
     *
     * @test
     * @access public
     * @return void
     */
    public function it_is_initializable()
    {
        $this->shouldHaveType('Jaggy\Kraken\Kraken');
    }


    /**
     * it returns all the files to be versioned
     *
     * @test
     * @access public
     * @return void
     */
    public function it_returns_all_the_files_to_be_versioned()
    {
        $modified = [
            'spec/Jaggy/Kraken/KrakenSpec.php',
            'src/Jaggy/Kraken/Kraken.php'
        ];

        //$this->getFiles()->shouldReturn($modified);
    }
}
