<?php
namespace App\Helpers;

use Config;
use Storage;

/**
 * Helper for working with custom configuration files
 *
 * Class ConfigWriter
 * @package App\Helpers
 */
class ConfigWriter
{
    /**
     * @var \Illuminate\Contracts\Filesystem\Filesystem
     */
    private $storage;

    /**
     * Config filename without extension
     *
     * @var string
     */
    private $config = "website";

    /**
     *  Create a new config writer
     */
    public function __construct()
    {
        $this->storage = Storage::disk("config");
    }

    /**
     *  Save current custom config to file
     *
     * @param string $config
     */
    public function save(string $config = null)
    {
        $config = $config ?: $this->config;
        $this->storage->put($config . ".php", "<?php\n return " . var_export(Config::get($config), true) .";");
    }
}