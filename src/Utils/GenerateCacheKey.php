<?php

namespace creditzombies\LogViewer\Utils;

use creditzombies\LogViewer\Facades\LogViewer;
use creditzombies\LogViewer\LogFile;
use creditzombies\LogViewer\LogIndex;

class GenerateCacheKey
{
    public static function for(mixed $object, ?string $namespace = null): string
    {
        $key = '';

        if ($object instanceof LogFile) {
            $key = self::baseKey().':file:'.md5($object->path);
        }

        if ($object instanceof LogIndex) {
            $key = self::for($object->file).':'.$object->identifier;
        }

        if (is_string($object)) {
            $key = self::baseKey().':'.$object;
        }

        if (! empty($namespace)) {
            $key .= ':'.$namespace;
        }

        return $key;
    }

    protected static function baseKey(): string
    {
        return 'log-viewer:'.LogViewer::version();
    }
}
