<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerDvhZTXz\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerDvhZTXz/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerDvhZTXz.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerDvhZTXz\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerDvhZTXz\App_KernelDevDebugContainer([
    'container.build_hash' => 'DvhZTXz',
    'container.build_id' => '460b9cc1',
    'container.build_time' => 1597763090,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerDvhZTXz');
