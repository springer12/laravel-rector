<?php

declare(strict_types=1);

namespace TYPO3\CMS\Extbase\Utility;

if (class_exists(ExtensionUtility::class)) {
    return;
}

final class ExtensionUtility
{
    public static function registerPlugin($extensionName, $pluginName, $pluginTitle, $pluginIcon = null): void
    {
    }
}
