<?php
/**
 * Created by PhpStorm.
 * User: avengerweb
 * Date: 25.06.15
 * Time: 22:01
 */

namespace App\Helpers;

use Config;
use Storage;

/**
 * Helper for working with custom configuration file
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
     *  Save current custom website config to file
     *
     *  @return void
     */
    public function save()
    {
        $this->storage->put($this->config . ".php", "<?php\n return " . var_export(Config::get("website"), true) .";");
    }
}