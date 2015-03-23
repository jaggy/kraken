# Versioner

This is a, for now, PHP DocBlock version updater.

In most PHP files, there are annotations pertaining to the file version and it was quite tedious to update them.
Since most of us tend to miss some here and now.

## Docblock

    /**
     * Some comment about the file here.
     *
     * @package     Package\Name\Here
     * @author      Gauran <jaggygauran@gmail.com>
     * @license     http://www.wtfpl.net/ Do What The Fuck You Want To Public License
     * @version     Release: 1.0.0
     * @link        https://github.com/jaggy/versioner
     * @since       Class available since Release 0.1.0
     */

## Installation and Usage

To install just alias the script.

    alias uv='perl /path/to/versioner/versioner.pl';

Take note, using this will update all your _modified_ files and update their version annotation

    uv [major, minor, patch]
