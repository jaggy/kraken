<?php
namespace Jaggy\Kraken;

use RuntimeException;

/**
 * Shell wrapper for executing commands.
 *
 * @property    string  path
 *
 * @uses        RuntimeException
 *
 * @package     Jaggy\Kraken
 * @author      Jaggy Gauran <jaggygauran@gmail.com>
 * @license     http://opensource.org/licenses/MIT The MIT License (MIT)
 * @version     Release: 0.1.0
 * @link        http://github.com/jaggy/kraken
 * @since       Class available since Release 0.1.0
 */
class Shell
{
    /**
     * Path to execute the commands on.
     *
     * @type string
     */
    protected $path;


    /**
     * Create a shell instance.
     *
     * @param  string  $path
     * @return Shell
     */
    public function __construct($path = '')
    {
        $this->path = $path;

        if (! $path) {
            $this->path = getcwd();
        }
    }


    /**
     * Set the path.
     *
     * @param  string  $path
     * @return void
     */
    public function setPath($path)
    {
        $this->path = $path;
    }


    /**
     * Execute a CLI command.
     *
     * @param  string  $command
     * @return mixed
     */
    public function execute($command)
    {
        // Store the current directory.
        $current_directory = getcwd();

        // Go to the directory to execute the command on.
        chdir($this->path);

        // Execute the command.
        exec($command, $output, $response);

        // Throw execption if command fails.
        if ($response !== 0) {
            throw new RuntimeException($output);
        }

        // Return the output.
        return implode("\n", $output);
    }
}
