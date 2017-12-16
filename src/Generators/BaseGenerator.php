<?php

namespace Eagle\Generator\Generators;

use Eagle\Generator\Utils\FileUtil;

class BaseGenerator
{
    public function rollbackFile($path, $fileName)
    {
        if (file_exists($path.$fileName)) {
            return FileUtil::deleteFile($path, $fileName);
        }

        return false;
    }
}
