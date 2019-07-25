<?php
spl_autoload_register(function ($class) {

    // project-specific namespaces prefix
    $prefix = 'App\\Classes\\';

    // base directory for the namespace prefix
    $base_dir = __DIR__ . '/classes/';

    // does the class use the namespace prefix?
    $len =  strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        // no, move to the next registered autoloader
        return;
    }

    // get the relative class name
    $relative_class = substr($class, $len);

    // full directory
    $file = $base_dir . str_replace('\\', DIRECTORY_SEPARATOR, $relative_class) . '.php';

    // if the file exist, require it
    if (file_exists($file)) {

        require $file;

    }

});