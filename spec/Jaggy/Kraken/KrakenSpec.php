<?php

namespace spec\Jaggy\Kraken;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class KrakenSpec extends ObjectBehavior
{
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
}
