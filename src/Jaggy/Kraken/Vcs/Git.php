<?php
namespace Jaggy\Kraken\Vcs;

/**
 * Git wrapper.
 *
 * @package     Jaggy\Kraken\Vcs
 * @author      Jaggy Gauran <jaggygauran@gmail.com>
 * @license     http://opensource.org/licenses/MIT The MIT License (MIT)
 * @version     Release: 0.1.0
 * @link        http://github.com/jaggy/kraken
 * @since       Class available since Release 0.1.0
 */
class Git implements VcsInterface
{
    /**
     * Create a git instance.
     *
     * @param  string  $repository
     * @return Git
     */
    public function __construct($repository)
    {
    }

    /**
     * Return all the modified files.
     *
     * @return array
     */
    public function modified()
    {
    }
}
