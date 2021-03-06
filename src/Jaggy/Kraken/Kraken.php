<?php
namespace Jaggy\Kraken;

use Jaggy\Kraken\Vcs\VcsInterface;

/**
 * The file release manager class.
 *
 * @property    VcsInterface  vcs
 * @property    string  revision
 *
 * @uses        \Jaggy\Kraken\Vcs\VcsInterface
 * @uses        \Symfony\Component\Filesystem\Filesystem;
 *
 * @package     Jaggy\Kraken
 * @author      Jaggy Gauran <jaggygauran@gmail.com>
 * @license     http://opensource.org/licenses/MIT The MIT License (MIT)
 * @version     Release: 0.1.1
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
     * Revision type.
     *
     * @type string
     */
    protected $revision;

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


    /**
     * Patch revision.
     *
     * @return Kraken
     */
    public function patch()
    {
        $this->revision = 'patch';

        return $this;
    }


    /**
     * Patch revision.
     *
     * @return Kraken
     */
    public function minor()
    {
        $this->revision = 'minor';

        return $this;
    }


    /**
     * Patch revision.
     *
     * @return Kraken
     */
    public function major()
    {
        $this->revision = 'major';

        return $this;
    }


    /**
     * Update all the files.
     *
     * @return void
     */
    public function update()
    {
        $files = $this->vcs->modified();

        foreach ($files as $file) {
            $bump = $this->bump($file);

            if (! $bump) {
                continue;
            }

            file_put_contents($file, $bump);
        }
    }


    /**
     * Bump the version number.
     *
     * @param  string  $file
     * @return string
     */
    public function bump($file)
    {
        $content = file_get_contents($file);

        $matches = [];
        $pattern = '/(version\s+Release:\s?)(?<version>.+)/';

        // Look for the file version
        preg_match($pattern, $content, $matches);

        if (! array_key_exists('version', $matches)) {
            echo "{$file} has no annotation.\n";
            return false;
        }


        // Bump the version up.
        $version = $this->updateVersion($matches['version']);

        echo "Bumping {$file}: {$matches['version']} -> {$version}\n";
        // Return the parsed text.
        return preg_replace($pattern, "\${1}{$version}", $content);
    }


    /**
     * Update the version number.
     *
     * @param  string  $version
     * @return string
     */
    public function updateVersion($version)
    {
        // Split the version numbers.
        list($major, $minor, $patch) = explode('.', $version);

        ${$this->revision}++;

        // TODO: Find a way to make this shorter.
        switch ($this->revision) {
            case 'major':
                $minor = 0;
                $patch = 0;

                break;
            case 'minor':
                $patch = 0;

                break;
        }

        return implode('.', [$major, $minor, $patch]);
    }
}
