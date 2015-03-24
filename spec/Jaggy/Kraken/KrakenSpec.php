<?php

namespace spec\Jaggy\Kraken;

use Prophecy\Argument;
use PhpSpec\ObjectBehavior;
use Jaggy\Kraken\Vcs\VcsInterface;

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
    public function let(VcsInterface $vcs)
    {
        $this->beConstructedWith($vcs);
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
     * it updates the version annotations of the modified files
     *
     * @test
     * @return void
     */
    public function it_updates_the_version_annotations_of_the_modified_files()
    {
        $this->patch()->bump('spec/support/User.php.mock')->shouldContain('0.1.1');
    }


    /**
     * Custom matchers.
     *
     * @return array
     */
    public function getMatchers()
    {
        return [
            'contain' => function ($subject, $string) {
                return (strpos($subject, $string) !== false);
            }
        ];
    }
}
