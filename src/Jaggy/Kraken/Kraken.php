<?php
namespace Jaggy\Kraken;

use SebastianBergmann\Git\Git;

/**
 * The file release manager class.
 *
 * @property    Git  git
 *
 * @uses        \SebastianBergmann\Git\Git
 *
 * @package     Jaggy\Kraken
 * @author      Jaggy Gauran <jaggygauran@gmail.com>
 * @license     http://opensource.org/licenses/MIT The MIT License (MIT)
 * @version     Release: 0.1.0
 * @link        http://github.com/jaggy/kraken
 * @since       Class available since Release 0.1.0
 */
class Kraken
{
    /**
     * Git wrapper instance.
     *
     * @type Git
     */
    protected $git;


    /**
     * Create a Kraken instance.
     *
     * @param  Git  $git
     * @return Kraken
     */
    public function __construct(Git $git)
    {
        $this->git = $git;
    }
}
