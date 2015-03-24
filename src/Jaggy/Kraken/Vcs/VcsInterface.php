<?php
namespace Jaggy\Kraken\Vcs;

/**
 * Version control system interface.
 *
 * @package     Jaggy\Kraken\Vcs
 * @author      Jaggy Gauran <jaggygauran@gmail.com>
 * @license     http://opensource.org/licenses/MIT The MIT License (MIT)
 * @version     Release: 0.1.0
 * @link        http://github.com/jaggy/kraken
 * @since       Class available since Release 0.1.0
 */
interface VcsInterface
{

    /**
     * Return all the modified files.
     *
     */
    public function modified();
}
