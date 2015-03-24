<?php
namespace Jaggy\Kraken;

use Jaggy\Kraken\Vcs\VcsInterface;

/**
 * The file release manager class.
 *
 * @property    VcsInterface  vcs
 *
 * @uses        \Jaggy\Kraken\Vcs\VcsInterface
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
     * VCS wrapper instance.
     *
     * @type VcsInterface
     */
    protected $vcs;


    /**
     * Create a Kraken instance.
     *
     * @param  VcsInterface  $vcs
     * @return Kraken
     */
    public function __construct(VcsInterface $vcs)
    {
        $this->vcs = $vcs;
    }
}
