<?php
namespace Jaggy\Kraken\Vcs;

use Jaggy\Kraken\Shell;

/**
 * Git wrapper.
 *
 * @property    \Jaggy\Kraken\Shell  shell
 *
 * @uses        \Jaggy\Kraken\Shell
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
     * Shell instance.
     *
     * @type Shell
     */
    protected $shell;


    /**
     * Create a git instance.
     *
     * @param  Shell  $shell
     * @return Git
     */
    public function __construct(Shell $shell)
    {
        $this->shell = $shell;
    }

    /**
     * Return all the modified files.
     *
     * @return array
     */
    public function modified()
    {
        $status = $this->shell->execute('git status');

        $matches = [];
        $pattern = '/\s+modified:\s+(?<files>.+)/';

        preg_match_all($pattern, $status, $matches, PREG_PATTERN_ORDER);

        return $matches['files'];
    }
}
